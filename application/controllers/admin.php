<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
    }

    // Sublime -> Preferences -> Settings - User
    // "translate_tabs_to_spaces": true,
    // "tab_size": 4,
    // "indent_to_bracket": true,
    // "detect_indentation": false

    public function index(){
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
        else {
            return TRUE;
        }
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

        if($date['mon'] >= 6 AND $date['mon'] <= 10) {
            $semester = 1;
        }
        elseif($date['mon'] >= 11 OR $date['mon'] <= 3) {
            $semester = 2;
        }
        else {
            $semester = 'summer';
        }
        
        return $semester;
    }
    // END FUNCTIONS

    public function program_outcome() {
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
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Add new Curriculum';

        $data['program_list'] = $this->model_admin->check_rows('program');
        $program = $this->input->post('program');
        $year = $this->input->post('effective_year');

        $this->load->library('form_validation');

        $this->form_validation->set_rules("program", "Program Name", "required|trim");
        $this->form_validation->set_rules("effective_year", "Effective Year", "required|trim");
        $this->form_validation->set_rules("po_code[]", "PO Code", "required|trim");
        $this->form_validation->set_rules("po_attrib[]", "PO Attribute", "required|trim");
        $this->form_validation->set_rules("po_desc[]", "PO Description", "required|trim");
        $this->form_validation->set_rules("co_code[]", "Course Code", "required|trim");
        $this->form_validation->set_rules("co_desc[]", "Course Description", "required|trim");
        
        if($this->form_validation->run() == FALSE){
            $data['message'] = '';
        }
        elseif($this->model_admin->check_programYear($program, $year)) {
            $message = '<strong>Effectivity Year</strong> for the <strong>Program</strong> already exists.';
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
            $course_equi_array = array();

            foreach($course_equi as $key => $val) {
                $exploded[$key] = explode(", ", $val);                        
            }

            $course_id = array();

            foreach($course_rows as $key => $val) {
                $course_fields = array(
                    'CourseCode' => $val,
                    'CourseDesc' => $course_desc[$key],
                    'pyID' => $program_year
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
                    $course_equi_array[$key2]['CourseEquivalent'] = $value;
                    $course_equi_array[$key2]['courseID'] = $course_id[$key1];
                }
            }
            
            $equi_result = $this->model_admin->insert_equivalents($course_equi_array);

            if($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();

                $message = '<strong>Error in adding Curriculum!</strong>';
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message;
            }
            else{
                $this->db->trans_complete();

                $message = '<strong>Success!</strong> Program added.';
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
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'View Curriculums';
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('program_name', 'Program Name', 'required|trim|max_length[8]|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        else {
            $program_data = array(
                'programName' => $this->input->post('program_name')
            );
            $result = $this->model_admin->insert_program($program_data);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
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
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Edit Curriculum';
        $data['message'] = '';

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
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }
        elseif(!$this->model_admin->get_programID($program_data)) {
            $message = '<strong>Program</strong> does not exist.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }
        else {
            $data['program'] = $this->model_admin->get_program($program_data);
            $data['program_list'] = $this->model_admin->check_rows('program');

            $data['year'] = $this->model_admin->get_programYear($year_data);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_program', $data);
        $this->load->view('admin/footer');
    }

    public function delete_programYear() {
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
        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('teacher_fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('teacher_mname', 'Middle Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('teacher_lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('login_id', 'ID login', 'required|trim|alpha_numeric|min_length[10]|max_length[15]|is_unique[teacher.teacher_id]');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        else {
            $teacher_data = array(
                'teacher_id' => $this->input->post('login_id'),
                'fname' => $this->input->post('teacher_fname'),
                'mname' => $this->input->post('teacher_mname'),
                'lname' => $this->input->post('teacher_lname'),
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

        $this->view_teachers();
    }

    public function view_teachers() {
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Teachers';
        $data['teacher_list'] = $this->model_admin->get_teachers();
        
        if($data['teacher_list'] == FALSE) {
            $message = 'No teachers found in record. Please consider adding.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_teachers', $data);
        $this->load->view('admin/footer');
    }

    public function edit_teacher(){
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Edit Teacher Information';
        $data['message'] = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('teacher_id', 'Teacher ID', 'required|trim|min_length[10]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('id', 'id', 'required|trim|numeric');
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('mname', 'Middle Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $id = $this->uri->segment(4);
            if(!$this->model_admin->check_rowID('teacher', $id)) {
                $message = 'ID number does not exists.';
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
                'mname' => $this->input->post('mname'),
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
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Upload Classes';
        $data['message'] = '';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/upload_class', $data);
        $this->load->view('admin/footer');
    }

    public function upload() {
        $this->load->library('csvimport');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '99999';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
            $message = $this->upload->display_errors('
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>
                    <i class="icon-exclamation-sign"></i>
                    <span class="sr-only">Error: </span>',
                '</div>');
            $this->session->set_flashdata('message', $message);
        }
        else{
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];

            if ($this->csvimport->get_array($file_path)) {
                $insert_data = array();
                $nonExistingCourse = array();
                $nonExistingTeacher = array();
                $csv_array = $this->csvimport->get_array($file_path, array('Teacher ID', 'Group Number', 'Course Code', 'Start Time', 'End Time', 'Days'));
                
                foreach ($csv_array as $row) {
                    if(!$this->model_admin->check_course($row['Course Code'])) {
                        $nonExistingCourse[] = $row['Course Code'];
                    }
                    elseif(!$this->model_admin->check_teacher($row['Teacher ID'])) {
                        $nonExistingTeacher[] = $row['Teacher ID'];
                    }    
                    else {
                        $insert_data[] = array(
                            'group_num'=>$row['Group Number'],
                            'courseCode'=>$row['Course Code'],
                            'start_time'=>$row['Start Time'],
                            'end_time'=>$row['End Time'],
                            'days'=>$row['Days'],
                            'semester'=> $this->get_semester(),
                            'school_year'=> date('Y'),
                            'teacherID'=> $row['Teacher ID']
                        );
                    }
                }

                //Deletes uploaded file
                unlink($file_path);

                if(!empty($nonExistingTeacher)) {
                    $this->session->set_flashdata('non_existingTeacher', $nonExistingTeacher);
                }
                if(!empty($nonExistingCourse)) {
                    $this->session->set_flashdata('non_existingCourse', $nonExistingCourse);
                }
                
                if(empty($nonExistingCourse) AND empty($nonExistingTeacher)) {
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

    public function view_class() {
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'View Classes';
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
            $message = '<strong>ID</strong> does not exist!';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $data['message'] = $message;
        }
        elseif($check_class == FALSE) {
            $message = '<strong>Teacher</strong> has no classes.';
            $message = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            $data['message'] = $message;
        }

        $data['academic_year'] = $year;
        $data['teacher_id'] = $teacher_id;
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
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'View Classes';

        $teacher_id = $this->uri->segment(4);
        $class_id = $this->uri->segment(6);

        $data['class_list'] = $this->model_admin->select_class($class_id);
        $data['select_schedule'] = $this->model_admin->select_schedule($class_id);
        $data['academic_year'] = $this->uri->segment(5);

        $select_schedule = $data['select_schedule'];
        $student_course = $select_schedule[0]['courseCode'];
        $student_courseID = $this->model_admin->get_courseID($student_course);
       
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
        } else {
            $data['message'] = '';
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_classes_scorecard', $data);
        $this->load->view('admin/footer');
    }

    // END TEACHER

    public function upload_students() {
        $this->load->library('csvimport');
        $this->load->library('form_validation');
       
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Upload Student List';
        
        $data['programs'] = $this->model_admin->check_rows('program');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('program', 'Program List', 'required|trim');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        elseif(!$this->upload->do_upload()){
            $data['message'] = $this->upload->display_errors('
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>',
            '</div>');;
        }
        else{
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                $insert_data = array();
                $csv_array = $this->csvimport->get_array($file_path);

                foreach ($csv_array as $row) {
                    if(!$this->model_admin->if_id_exists($row['student_id'])) {
                        $insert_data = array(
                            'student_id'=>$row['student_id'],
                            'lname'=>$row['lname'],
                            'fname'=>$row['fname'],
                            'mname'=>$row['mname'],
                            'programID'=> $this->input->post('program')
                        );
                    }
                    $result = $this->model_admin->insert_csv($insert_data);
                }

                if($result['is_success'] == TRUE) {
                    $message = '<strong>Success!</strong> Teacher added.';
                    $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                    $this->session->set_flashdata('message', $message);
                    redirect(current_url());
                }
                else {
                    $message = '<strong>Error: </strong>'.  $account_result['db_error'];
                    $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                    $data['message'] = $message;
                }
            }
            else {
                $data['message'] = 'File path error occured';
            }            
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/upload_students', $data);
        $this->load->view('admin/footer');
    }

    public function view_students(){
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'View Student List';
        $data['student_list'] = $this->model_admin->check_rows('student');

        if($data['student_list'] == FALSE) {
            $message = 'There are no currently students added.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
        }
        else {
            $data['message'] = '';
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_students', $data);
        $this->load->view('admin/footer');
    }

    public function edit_student() {
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Edit Student Information';
        $data['message'] = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('student_id', 'Student ID', 'required|trim|max_length[9]|numeric|');
        $this->form_validation->set_rules('id', 'id', 'required|trim|numeric');
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('mname', 'Middle Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $id = $this->uri->segment(4);

            if(!$this->model_admin->check_rowID('student', $id)) {
                $message = 'ID number does not exists.';
                $data['message'] = $this->model_admin->notify_message('alert-info', 'icon-info-sign', $message);
            }
            else {
                //Student's Information
                $data['row'] = $this->model_admin->check_rowID('student', $id);
            }
        }
        else {
            $id = $this->input->post('id');

            $update = array(
                'student_id' => $this->input->post('student_id'),
                'fname' => $this->input->post('fname'),
                'mname' => $this->input->post('mname'),
                'lname' => $this->input->post('lname')
            );

            $result = $this->model_admin->update_student($id, $update);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message;
            }
            else {
                $message = '<strong>Success!</strong> Student updated.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message2', $message);
                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_student', $data);
        $this->load->view('admin/footer');
    }

    public function report_teacher() {
        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Teacher Reports';

        $year = $this->uri->segment(4);

        $data['academic_year'] = $year;
        $data['year_classes'] = $this->model_admin->get_teacherReport();
        $data['teacher_list'] = $this->model_admin->get_allTeachersClasses($year);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_report_teacher', $data);
        $this->load->view('admin/footer');
    }

    public function report_student() {
        $this->load->library('form_validation');

        $data['title'] = 'OBE SAMS Academic';
        $data['header'] = 'Student Reports';

        $data['program_list'] = $this->model_admin->check_rows('program');
        $data['year_classes'] = $this->model_admin->get_teacherReport();

        $this->form_validation->set_rules('program', 'Program', 'trim');
        $this->form_validation->set_rules('year_level', 'Year Level', 'trim|numeric');
        $this->form_validation->set_rules('semester', 'Semester', 'trim');
        $this->form_validation->set_rules('academic_year', 'Academic Year', 'trim|numeric');


        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }else{
            print_r($this->input->post());die();
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_report_student', $data);
        $this->load->view('admin/footer');
    }

    public function download($file_type = '') {
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