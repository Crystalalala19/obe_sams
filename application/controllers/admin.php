<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
    }

    public function index(){
        $this->check_role();

        $data['title'] = 'OBE SAMS Academic';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }

    // CALLBACK and/or FUNCTIONS
    function alpha_dash_space($str_in) {
        if (! preg_match("/^([-a-z-9 ])+$/i", $str_in)) {
            $this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters, spaces, and dashes.');
            return FALSE;
        } 
        else 
            return TRUE;
    }

    function program_ajax() {
        $program_data = array(
            'programName' => rawurldecode($this->input->post('option'))
        );

        $result = $this->model_admin->get_programYears($program_data);
        echo json_encode($result);
    }

    function get_semester() {
        $date = getdate();

        if($date['mon'] >= 6 AND $date['mon'] <= 10)
            $semester = 1;
        elseif($date['mon'] >= 11 OR $date['mon'] <= 3)
            $semester = 2;
        else
            $semester = 'summer';

        return $semester;
    }

    function get_sy() {
        if($this->get_semester() == 'summer')
            $sy = date('Y')-1;
        else
            $sy = date('Y');

        return $sy;
    }

    function error_404() {
        $data['title'] = 'Error 404';
        $this->load->view('error', $data);
    }

    function download($file_type = '') {
        if(empty($file_type))
            $this->error_404();
        else {
            $this->load->helper('download');

            if($file_type == 'csv') {
                $data = file_get_contents('uploads/Template Upload Class.csv');
                $name = 'Template Upload Class.csv';
            }
            elseif($file_type == 'pdf') {
                $data = file_get_contents('uploads/test.pdf');
                $name = 'Test for PDF.pdf';
            }

            force_download($name, $data); 
        }
    }

    function upload() {
        $this->load->library('csvimport');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '99999';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()) {
            $message = $this->upload->display_errors('
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <i class="icon-exclamation-sign"></i>
                    <span class="sr-only">Error: </span>',
                '</div>');
            $this->session->set_flashdata('message', $message);
        }
        else {
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];

            if ($this->csvimport->get_array($file_path)) {
                $insert_data = array();
                $nonExistingCourse = array();
                $nonExistingTeacher = array();
                $ExistingCourseGroup = array();
                $csv_array = $this->csvimport->get_array($file_path, array('Teacher ID', 'Group Number', 'Course Code', 'Start Time', 'End Time', 'Days'));
                $csv_array = array_filter(array_map('array_filter', $csv_array));
                
                foreach ($csv_array as $row) {
                    if(!$this->model_admin->check_course($row['Course Code'])) {
                        $nonExistingCourse[] = $row['Course Code'];
                    }
                    elseif(!$this->model_admin->check_teacher($row['Teacher ID'])) {
                        $nonExistingTeacher[] = $row['Teacher ID'];
                    }    
                    elseif(!$this->model_admin->check_courseGroup($row['Course Code'], $row['Group Number'], $row['Teacher ID'])) {
                        $ExistingCourseGroup[] = '<br>Teacher ID: '.$row['Teacher ID'].' Grp # '.$row['Group Number'].' '.$row['Course Code'].'<br>';
                    }
                    else {
                        $insert_data[] = array(
                            'group_num'=>$row['Group Number'],
                            'courseCode'=>$row['Course Code'],
                            'start_time'=>$row['Start Time'],
                            'end_time'=>$row['End Time'],
                            'days'=>$row['Days'],
                            'semester'=> $this->get_semester(),
                            'school_year'=> $this->get_sy(),
                            'teacherID'=> $row['Teacher ID']
                        );
                    }
                }

                //Deletes uploaded file
                unlink($file_path);

                if(!empty($nonExistingTeacher))
                    $this->session->set_flashdata('non_existingTeacher', $nonExistingTeacher);
                if(!empty($nonExistingCourse))
                    $this->session->set_flashdata('non_existingCourse', $nonExistingCourse);
                if(!empty($ExistingCourseGroup))
                    $this->session->set_flashdata('existingCourseGroup', $ExistingCourseGroup);
                
                if(empty($nonExistingCourse) AND empty($nonExistingTeacher) AND empty($ExistingCourseGroup)) {
                    $result = $this->model_admin->insert_classes($insert_data);

                    if($result['is_success'] == FALSE) {
                        $message = '<strong>Error: </strong>'.  $result['db_error'];
                        $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                        $this->session->set_flashdata('message', $message);
                    }
                    else {
                        $message = '<strong>Success!</strong> Classes added.';
                        $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                        $this->session->set_flashdata('message', $message);
                    }
                }
            }
            else {
                $message = '<strong>Error: </strong> Inserting .CSV file.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
            }            
        }
        redirect('admin/teachers/upload');
    }

    function check_role() {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        
        if($this->session->userdata('role') != 'admin')
            redirect('site');
    }
    // END FUNCTIONS

    public function program_outcome() {
        $this->check_role();
        
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Program Outcomes';
       
        $program = $this->uri->segment(4);
        $year = $this->uri->segment(5);

        $program_data = array(
            'programName' => rawurldecode($program)
        );

        $program_id = $this->model_admin->get_programID($program_data);
        $year_id = $this->model_admin->get_programYearID($program_id ,$year);

        $year_data = array(
            'pyID' => $year_id
        );

        $data['program_info'] = $this->model_admin->get_programFull($program_data);
        $data['academic_year'] = $year;
        $data['course_list'] = $this->model_admin->get_courses($year_data);
        $data['po_list'] = $this->model_admin->get_pos($year_data);
        $data['year_id'] = $year_id;
        $multi_array = array();
        $i = 0;

        foreach($data['course_list'] as $key => $val) {
            $multi_array[$i++] = $this->model_admin->get_po_course($val['ID']);
        }

        $data['m_array'] = $multi_array;

        $this->load->library('form_validation');
        $this->form_validation->set_rules('po[]', 'PO check', 'trim');
        
        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        else {
            $pos_id = $this->input->post('po_id');
            $course_id = $this->input->post('course_id');
            $po_rows = $this->input->post('row');

            foreach($course_id as $key => $val) {
                $row = array();

                if(isset($po_rows[$key])) {
                    $row = $po_rows[$key];
                }

                if(!empty($row)) {
                    for($x = 0; $x < count($pos_id); $x++) {
                        $activate = 0;

                        for($y = 0; $y < count($row); $y++) {
                            if($row[$y] == $pos_id[$x]) {
                                $activate = 1;
                            }

                            $po_data = array(
                                'status' => $activate,
                                'poID' => $pos_id[$x],
                                'courseID' => $val
                            );

                            $to_insert[] = $po_data;
                        }
                    }
                } 
                else {
                    foreach($pos_id as $value) {
                        $po_data = array(
                                'status' => 0,
                                'poID' => $value,
                                'courseID' => $val
                            );
                        $to_insert[] = $po_data;
                    }
                }
            }

            $result = $this->model_admin->update_checks($to_insert);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error in updating.</strong>';
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);
            }
            else {
                $message = '<strong>Success!</strong> Program Outcomes updated.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);

                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_outcome', $data);
        $this->load->view('admin/footer');
    }

    public function add_program(){
        $this->check_role();

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Add new Curriculum';

        $data['program_list'] = $this->model_admin->check_rows('program');
        $program = $this->input->post('program');
        $year = $this->input->post('effective_year');

        $this->load->library('form_validation');

        $this->form_validation->set_rules("program", "Program Name", "required|trim");
        $this->form_validation->set_rules("effective_year", "Effective Year", "required|trim");
        $this->form_validation->set_rules("po_code[]", "PO Code", "required|trim|alpha_numeric");
        $this->form_validation->set_rules("po_attrib[]", "PO Attribute", "required|trim|callback_alpha_dash_space");
        $this->form_validation->set_rules("po_desc[]", "PO Description", "required|trim|callback_alpha_dash_space");
        $this->form_validation->set_rules("co_code[]", "Course Code", "required|trim|alpha_numeric");
        $this->form_validation->set_rules("co_desc[]", "Course Description", "required|trim|callback_alpha_dash_space");
        $this->form_validation->set_rules("year_level[]", "Year Level", "required|trim|numeric");
        $this->form_validation->set_rules("semester[]", "Semester", "required|trim|numeric");

        if($this->form_validation->run() == FALSE){
            $data['message'] = '';
        }
        elseif($this->model_admin->check_programYear($program, $year)) {
            $message = '<strong>The Effectivite Year</strong> of the selected <strong>Program</strong> already exists.';
            $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

            $data['message'] = $message;
        }
        else{
            $po_rows = $this->input->post('po_code');
            $attribs = $this->input->post('po_attrib');
            $descs = $this->input->post('po_desc');

            $course_rows = $this->input->post('co_code');
            $course_desc = $this->input->post('co_desc');
            $course_equi = $this->input->post('co_equi');
            $year_level = $this->input->post('year_level');
            $semester = $this->input->post('semester');

            $program = array(
                'programName' => rawurldecode($this->input->post('program'))
            );

            $year = $this->input->post('effective_year');

            $this->db->trans_start();

            $program_result = $this->model_admin->insert_programYear($program, $year);
            $program_year = $program_result;

            $po_id = array();

            foreach($po_rows as $key => $val){
                $po_fields = array(
                    'poCode' => $val,
                    'attribute' => $attribs[$key],
                    'description' => $descs[$key],
                    'pyID' => $program_year
                );
                $po_result = $this->model_admin->insert_po($po_fields);

                $po_id[] = $this->model_admin->get_lastId();
            }

            $exploded = array();

            foreach($course_equi as $key => $val) {
                $exploded[$key] = explode(", ", $val);                        
            }

            $course_id = array();

            foreach($course_rows as $key => $val) {
                $course_fields = array(
                    'CourseCode' => strtoupper($val),
                    'CourseDesc' => $course_desc[$key],
                    'pyID' => $program_year,
                    'year_level' => $year_level[$key],
                    'semester' => $semester[$key]
                );
                $course_result = $this->model_admin->insert_course($course_fields);

                $course_id[] = $this->model_admin->get_lastId();
            }

            foreach($course_id as $key => $val) {
                foreach($po_id as $key2 => $val2) {
                    $pc_field = array(
                        'status' => '0',
                        'poID' => $val2,
                        'courseID' => $val
                    );
                    $pc_result = $this->model_admin->insert_poCourse($pc_field);
                }
            }

            foreach($exploded as $key1 => $exploded_data) {
                $course_equi_array = array();
                
                foreach ($exploded_data as $key2 => $value) {
                    $course_equi_array[$key2]['CourseEquivalent'] = strtoupper($value);
                    $course_equi_array[$key2]['courseID'] = $course_id[$key1];
                }
                $equi_result = $this->model_admin->insert_equivalents($course_equi_array);
            }
            
            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                $message = '<strong>Error in adding Curriculum!</strong>';
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message;
            }
            else{
                $this->db->trans_complete();

                $message = '<strong>Success!</strong> Curriculum added.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);

                redirect('admin/programs/outcome/'. $this->input->post('program') . '/' . $year);
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_program', $data);
        $this->load->view('admin/footer'); 
    }

    public function view_programs() {
        $this->check_role();
        
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'View Curriculums';
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('program_name', 'Program Name', 'required|trim|max_length[8]|callback_alpha_dash_space');
        $this->form_validation->set_rules('full_name', 'Full Program Name', 'required|trim|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        else {
            $program_data = array(
                'programName' => strtoupper($this->input->post('program_name')),
                'programFullName' => strtoupper($this->input->post('full_name'))
            );
            $result = $this->model_admin->insert_program($program_data);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $this->session->set_flashdata('message', $message);
                redirect(base_url('admin/programs/add'));
            }
            else {
                $message = '<strong>Success!</strong> Program added.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(base_url('admin/programs/add'));
            }
        }
        
        $data['program_list'] = $this->model_admin->check_rows('program');

        if($data['program_list'] == FALSE) {
            $message = 'No programs found. Please consider adding.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_programs', $data);
        $this->load->view('admin/footer');
    }

    public function edit_program() {
        $this->check_role();

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Edit Curriculum';
        $data['message'] = '';

        $program = $this->uri->segment(4);
        $year = $this->uri->segment(5);

        $program_data = array(
            'programName' => rawurldecode($program)
        );

        $program_id = $this->model_admin->get_programID($program_data);
        $data['program_info'] = $this->model_admin->get_programFull($program_data);
        $year_id = $this->model_admin->get_programYearID($program_id ,$year);

        $year_data = array(
            'effective_year' => $year
        );

        $this->load->library('form_validation');

        $this->form_validation->set_rules("program_id", "Program ID", "required|trim");
        $this->form_validation->set_rules("program", "Program", "required|trim|callback_alpha_dash_space");
        $this->form_validation->set_rules("program_full", "Program Full Name", "required|trim|callback_alpha_dash_space");
        $this->form_validation->set_rules("po_code[]", "PO Code", "required|trim");
        $this->form_validation->set_rules("po_attrib[]", "PO Attribute", "required|trim");
        $this->form_validation->set_rules("po_desc[]", "PO Description", "required|trim");
        $this->form_validation->set_rules("co_code[]", "Course Code", "required|trim");
        $this->form_validation->set_rules("co_desc[]", "Course Description", "required|trim");
        

        if(!$this->model_admin->get_programYear($year_data)) {
            $message = '<strong>Program Year</strong> does not exist.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }
        elseif(!$this->model_admin->get_programID($program_data)) {
            $message = '<strong>Program</strong> does not exist.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }
        elseif($this->form_validation->run() == FALSE){
            $year_data2 = array(
                'pyID' => $year_id
            );

            $data['course_list'] = $this->model_admin->get_courses($year_data2);
            $data['program_data'] = $this->model_admin->get_curriculum($program, $year);

            $equivalent = array();
            $equivalent_data = array();
            $equivalent_implode = array();

            foreach($data['course_list'] as $key => $value) {
                $equivalent[] = $this->model_admin->get_equivalents($value['ID']);
            }

            foreach ($data['course_list'] as $key => $value) {
                    for($x=0; $x < count($equivalent[$key]); $x++) {
                        $equivalent_data[$key][$x] = $equivalent[$key][$x]['CourseEquivalent'];
                        if($equivalent_data[$key][$x] != NULL)
                        $equivalent_implode[$key] = implode(', ',$equivalent_data[$key]);
                    }
            }
  
            $data['equivalent'] = $equivalent_implode;

            $data['year'] = $this->model_admin->get_programYear($year_data);
        }
        else {
            $po_id = $this->input->post('po_id');
            $po_rows = $this->input->post('po_code');
            $attribs = $this->input->post('po_attrib');
            $descs = $this->input->post('po_desc');

            $course_rows = $this->input->post('co_code');
            $course_id = $this->input->post('co_id');
            $course_desc = $this->input->post('co_desc');
            $course_equi = $this->input->post('co_equi');

            $program_id = $this->input->post('program_id');
            $program = rawurldecode($this->input->post('program'));
            $program_full = $this->input->post('program_full');

            $po_data = array();
            $course_data = array();
            $exploded = array();

            foreach ($po_rows as $key => $value) {
                $po_update = array(
                    'ID' => $po_id[$key],
                    'attribute' => $attribs[$key],
                    'poCode' => $value,
                    'description' => $descs[$key],
                    'pyID' => $year_id
                );

                $po_data[] = $po_update;
            }

            foreach ($course_rows as $key => $value) {
                $co_update = array(
                    'ID' => $course_id[$key],
                    'CourseCode' => strtoupper($value),
                    'CourseDesc' => $course_desc[$key],
                    'pyID' => $year_id
                );

                $course_data[] = $co_update;
            }

            foreach($course_equi as $key => $val) {
                $exploded[$key] = explode(", ", $val);                        
            }

            $equivalent_data = array();
            $equivalent_delete = array();

            foreach ($exploded as $key => $exploded_data) {
                foreach ($exploded_data as $key2 => $value) {
                    if(!empty($value)) {
                        $equivalent_data[] = array(
                            'CourseEquivalent' => strtoupper($value),
                            'courseID' => $course_id[$key]
                        );

                        $equivalent_delete[] = $course_id[$key];
                    }
                }
            }

            $program_data = array(
                'programName' => strtoupper($program),
                'programFullName' => strtoupper($program_full)
            );
            
            $this->db->trans_start();

            $this->model_admin->update_program($program_id, $program_data);
            $this->model_admin->update_po($po_data);
            $this->model_admin->update_courses($course_data);
            $this->model_admin->delete_equivalents($equivalent_delete);
            $this->model_admin->update_equivalents($equivalent_data);

            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                $message = '<strong>Error in updating Curriculum!</strong>';
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message;
            }
            else{
                $this->db->trans_complete();

                $message = '<strong>Success!</strong> Curriculum updated.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);

                redirect(base_url('admin/programs/edit/'.$program.'/'.$year));
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_program', $data);
        $this->load->view('admin/footer');
    }

    public function delete_programYear() {
        $this->check_role();

        $program = $this->uri->segment(4);
        $year = $this->uri->segment(5);

        $program_data = array(
            'programName' => rawurldecode($program)
        );

        $year_data = array(
            'effective_year' => $year
        );

        if(!$this->model_admin->get_programYear($year_data)) {
            $message = '<strong>Program Year</strong> does not exist.';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $this->session->set_flashdata('message', $message);
            redirect('admin/programs/view');
        }
        elseif(!$this->model_admin->get_programID($program_data)) {
            $message = '<strong>Program</strong> does not exist.';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $this->session->set_flashdata('message', $message);
            redirect('admin/programs/view');
        }

        $program_id = $this->model_admin->get_programID($program_data);
        $result = $this->model_admin->delete_programYear($year, $program_id);

        if($result['is_success'] == FALSE) {
            $message = '<strong>Error in deleting.</strong>';
            $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);
        }
        else {
            $message = '<strong>Success!</strong> Effective Year deleted.';
            $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);
        }
        $this->session->set_flashdata('message', $message);
        redirect('admin/programs/view');
    }
    // END PROGRAM

    // TEACHER
    public function teachers() {
        $this->check_role();

        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('teacher_fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('teacher_lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('login_id', 'ID login', 'required|trim|alpha_numeric|min_length[10]|max_length[15]|is_unique[teacher.teacher_id]');
        $this->form_validation->set_message('is_unique', 'The entered %s already existed.');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        else {
            $teacher_data = array(
                'teacher_id' => $this->input->post('login_id'),
                'fname' => ucfirst(strtolower($this->input->post('teacher_fname'))),
                'lname' => ucfirst(strtolower($this->input->post('teacher_lname')))
            );

            $user_account = array(
                'idnum' => $this->input->post('login_id'),
                'role' => 'teacher',
                'password' => $this->encrypt->sha1($this->input->post('login_id'))
            );

            $teacher_result = $this->model_admin->insert_teacher($teacher_data, $user_account);

            if($teacher_result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $teacher_result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Teacher added.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Teachers';
        $data['teacher_list'] = $this->model_admin->get_teachers();
        
        if($data['teacher_list'] == FALSE) {
            $message = 'No teachers found in record. Please consider adding.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        } 
        else
            $data['message'] = '';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_teachers', $data);
        $this->load->view('admin/footer');
    }

    public function edit_teacher(){
        $this->check_role();

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Edit Teacher Information';
        $data['message'] = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('teacher_id', 'Teacher ID', 'required|trim|min_length[10]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('id', 'id', 'required|trim|numeric');
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $id = $this->uri->segment(4);
            if(!$this->model_admin->check_rowID('teacher', $id)) {
                $message = 'Teacher ID does not exists.';
                $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            }
            else {
                //Teacher's Information
                $data['row'] = $this->model_admin->check_rowID('teacher', $id);
            }
        }
        else {
            $update = array(
                'teacher_id' => $this->input->post('teacher_id'),
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname')
            );

            $result = $this->model_admin->update_teacher($this->input->post('id'), $update);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message;
            }
            else {
                $message = '<strong>Success!</strong> Teacher updated.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message2', $message);
                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_teacher', $data);
        $this->load->view('admin/footer');
    }

    public function upload_class() {
        $this->check_role();
        
        $this->load->library('form_validation');

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Assign Classes';
        $data['message'] = '';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/upload_class', $data);
        $this->load->view('admin/footer');
    }

    public function view_class() {
        $this->check_role();
        
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Assigned Classes';
        $message = '';

        $teacher_id = $this->uri->segment(4);
        $year = $this->uri->segment(5);

        $check_teacher = $this->model_admin->check_teacher($teacher_id);
        $check_class = $this->model_admin->check_teacherClass($teacher_id);

        if(empty($year)) {
            $message = 'Select an Academic Year to view assigned classes.';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);

            $data['info'] = $message;
        }
        
        if($check_teacher == FALSE) {
            $message = '<strong>Teacher ID</strong> does not exist!';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $data['message'] = $message;
        }
        elseif($check_class == FALSE) {
            $message = '<strong>Teacher</strong> has not been assigned with classes.';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $data['message'] = $message;
        }

        $data['academic_year'] = $year;
        $data['teacher_info'] = $this->model_admin->get_teacherInfo($teacher_id);
        $data['year_classes'] = $this->model_admin->get_teacherClasses($teacher_id);
        $data['first_sem'] = $this->model_admin->get_firstSem($teacher_id, $year);
        $data['second_sem'] = $this->model_admin->get_secondSem($teacher_id, $year);
        $data['summer'] = $this->model_admin->get_summer($teacher_id, $year);

        if($data['first_sem'] == FALSE) {
            $message1 = 'No classes assigned for First Semester.';
            $data['message1'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message1);
        }
        if($data['second_sem'] == FALSE) {
            $message2 = 'No classes assigned for Second Semester.';
            $data['message2'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message2);
        }if($data['summer'] == FALSE) {
            $message3 = 'No classes assigned for Summer.';
            $data['message3'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message3);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_classes', $data);
        $this->load->view('admin/footer');
    }

    public function view_class_scorecard() {
        $this->check_role();
        
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Students';

        $teacher_id = $this->uri->segment(4);
        $class_id = $this->uri->segment(6);

        $data['class_list'] = $this->model_admin->select_class($class_id);
        $data['select_schedule'] = $this->model_admin->select_schedule($class_id);
        $data['academic_year'] = $this->uri->segment(5);

        $select_schedule = $data['select_schedule'];
        $student_course = $select_schedule[0]['courseCode'];
        $student_courseID = $this->model_admin->get_courseID($student_course);
       
        $data['class_program'] = $this->model_admin->get_classProgram($student_course);
        $data['get_po'] = $this->model_admin->get_po($student_courseID);

        foreach($data['class_list'] as $key => $val) {
            $data['class_list'][$key]['score'] = $this->model_admin->get_studentPoGrade($val['studentID'], $class_id);
            $data['class_list'][$key]['grade'] = array();
            $data['class_list'][$key]['poID'] = $this->model_admin->get_studentPoID($val['studentID'], $class_id);
            $i = 0;

            foreach($data['get_po'] as $key1 => $val1) {
                if($val1['status'] == "1" && isset($data['class_list'][$key]['score'][$i])) {
                    $data['class_list'][$key]['grade'][$i] =  $data['class_list'][$key]['score'][$i]['score'];
                } else {
                    $data['class_list'][$key]['grade'][$i] = "";
                }
                $i++;
            }
        }

        if($data['class_list'] == FALSE) {
            $message = 'The assigned teacher has not yet uploaded his/her class.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        } 
        else
            $data['message'] = '';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_classes_scorecard', $data);
        $this->load->view('admin/footer');
    }
    // END TEACHER

    public function report_teacher() {
        $this->check_role();
        
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Teacher Reports';

        $year = $this->uri->segment(4);

        $data['academic_year'] = $year;
        $data['year_classes'] = $this->model_admin->get_teacherReport();
        $data['teacher_list'] = $this->model_admin->get_allTeachersClasses($year);
        // $data['teacher_list']['class_population'] = array();

        foreach ($data['teacher_list'] as $key => $value) {
            $data['teacher_list'][$key]['class_population'][] = $this->model_admin->check_teacherClassPopulation($value['ID']);
        }

        // print_r($data['teacher_list']);die();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_report_teacher', $data);
        $this->load->view('admin/footer');
    }

    public function report_student() {
        $this->check_role();
        
        $this->load->library('form_validation');

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Student Reports';

        $data['program_list'] = $this->model_admin->check_rows('program');
        $data['year_classes'] = $this->model_admin->get_teacherReport();
        $data['max_po'] = $this->model_admin->get_maxPoCode();

        $this->form_validation->set_rules('program', 'Program', 'trim');
        $this->form_validation->set_rules('year_level', 'Year Level', 'trim');
        $this->form_validation->set_rules('semester', 'Semester', 'trim');
        $this->form_validation->set_rules('academic_year', 'Academic Year', 'trim');
        $this->form_validation->set_rules('po_num', 'PO Number', 'trim');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
            $data['result'] = '';
        }
        else{
            if($this->input->post('program') == null or $this->input->post('year_level') == null or $this->input->post('semester') == null or $this->input->post('academic_year') == null or $this->input->post('po_num') == null) {
                $message = 'Please select filter(s) to search.';
                $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }

            $program = $this->input->post('program');
            $year_level = $this->input->post('year_level');
            $semester = $this->input->post('semester');
            $academic_year = $this->input->post('academic_year');
            $po_num = $this->input->post('po_num');

            $result = $this->model_admin->generate_studentReport($program, $year_level, $semester, $academic_year, $po_num);
            
            $data['result'] = $result;
            
            // print_r($result);die();
            
            if($result == FALSE) {
                $message = 'No results found. Try refining your search.';
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong>';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $data['message'] = $message; 
            }
        }
        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_report_student', $data);
        $this->load->view('admin/footer');
    }

    public function activity_log() {
        $this->check_role();
        
        $data['header'] = 'Activity Log';
        $data['title'] = 'OBE SAMS Academic';

        $data['activity_log'] = $this->model_admin->activity_log();
        $data['teacher_log'] = $this->model_admin->teacher_log();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/activity_log', $data);
    } 

    public function student_scorecard() {
        $this->check_role();
        
        $data['header'] = 'Student Scorecard';
        $data['title'] = 'OBE SAMS Academic';

        $student_id = $this->uri->segment(3);

        $data['get_studentName'] = $this->model_admin->get_studentName($student_id);
        $data['get_scoreEY'] = $this->model_admin->get_scoreEY($student_id);
        $data['get_class'] = $this->model_admin->get_class($student_id);
        
        $data['class_list'] = $this->model_admin->select_classSC($student_id);

        $class_list = $data['class_list'];

        $student_class = $data['class_list'];

        foreach($data['class_list'] as $key => $val) {
            $data['get_po'] = $this->model_admin->get_poGeneral($student_id, $class_list[$key]['ID']);
            $data['class_list'][$key]['score'] = $this->model_admin->get_studentPoGrade($val['studentID'], $student_class[$key]['ID']);
            $data['class_list'][$key]['poID'] = $this->model_admin->get_studentPoID($val['studentID'], $student_class[$key]['ID']);
            
            $i = 0;
            foreach($data['class_list'][$key]['score'] as $key1 => $val1) {
                if($val1['score'] == "0") {
                    $data['class_list'][$key]['score'][$key1]['score'] = "";
                }
            }
            $i++;
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_student_scorecard', $data);
        $this->load->view('admin/footer');
    }

    public function account() {
        $this->check_role();

        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $data['title'] = "OBE SAMS Academic";

        $account_id = $this->session->userdata('idnum');

        $this->form_validation->set_rules('cur_pass', 'Current Password', 'required|trim|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[6]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|trim|matches[new_pass]');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        elseif(!$this->model_admin->check_password($account_id, $this->input->post('cur_pass'))) {
            $message = "<strong>Error:</strong> Invalid entered current password.";
            $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

            $data['message'] = $message;
        }
        else {
            $new_pass = $this->input->post('new_pass');

            $change_data = array(
                'password' => $this->encrypt->sha1($this->input->post('new_pass'))
            );

            $result = $this->model_admin->change_pass($change_data, $account_id);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Password changed.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/account', $data);
        $this->load->view('admin/footer');
    }
}