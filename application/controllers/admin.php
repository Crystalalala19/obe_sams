<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
    }

    public function index(){
        $data['title'] = 'Admin - Dashboard';

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
    // END

    public function add_program(){
        $data['title'] = 'Admin - Add new Program';
        $data['header'] = 'Add new Program';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('program', 'Program Name', 'required|trim');
        $this->form_validation->set_rules('effective_year', "Effective Year", 'required|trim');
        $this->form_validation->set_rules("po_code[]", "PO Code", "required|trim");
        $this->form_validation->set_rules("po_attrib[]", "PO Attribute", "required|trim");
        $this->form_validation->set_rules("po_desc[]", "PO Description", "required|trim");
        $this->form_validation->set_rules("co_code[]", "Course Code", "required|trim");
        $this->form_validation->set_rules("co_desc[]", "Course Description", "required|trim");
        
        if($this->form_validation->run() == FALSE){
            $data['message'] = '';
        }
        else{
            $po_rows = $this->input->post('po_code');
            $attribs = $this->input->post('po_attrib');
            $descs = $this->input->post('po_desc');

            $course_rows = $this->input->post('co_code');
            $course_desc = $this->input->post('co_desc');
            $course_equi = $this->input->post('co_equi');

            $program = array(
                'programName' => $this->input->post('program'),
                'effective_year' => $this->input->post('effective_year')
            );

            $this->db->trans_start();
            $program_result = $this->model_admin->insert_program($program);
            $id = $this->model_admin->get_lastId();

            if($program_result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $program_result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message;
            }
            else {
                $po_fields = array();

                foreach($po_rows as $key => $val){
                    $po_fields[] = array(
                        'poCode' => $val,
                        'attribute' => $attribs[$key],
                        'description' => $descs[$key],
                        'programID' => $id
                    );
                }

                $po_result = $this->model_admin->insert_po($po_fields);

                $exploded = array();
                $course_equi_array = array();

                foreach($course_equi as $key => $val) {
                    $exploded[$key] = explode(", ", $val);                        
                }

                $course_id = array();

                foreach($course_rows as $key => $val ) {
                    $course_fields = array(
                        'CourseCode' => $val,
                        'CourseDesc' => $course_desc[$key],
                        'programID' => $id
                    );
                    $course_result = $this->model_admin->insert_course($course_fields);

                    $course_id[] = $this->model_admin->get_lastId();
                }

                foreach($exploded as $key1 => $exploded_data) {
                    // print_r($exploded_data);
                    
                    foreach ($exploded_data as $key2 => $value) {
                        $course_equi_array[$key2]['CourseEquivalent'] = $value;
                        $course_equi_array[$key2]['courseID'] = $course_id[$key1];
                    }
                    // print_r($course_equi_array);
                }
                
                // die();
                $equi_result = $this->model_admin->insert_equivalents($course_equi_array);

                if($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();

                    $message = '<strong>Error: </strong>'. $this->model_admin->show_error();
                    $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                    $data['message'] = $message;
                }
                else{
                    $this->db->trans_complete();

                    $message = '<strong>Success!</strong> Program added.';
                    $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                    $this->session->set_flashdata('message', $message);
                    redirect(current_url());
                }
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_program', $data);
        $this->load->view('admin/footer'); 
    }

    public function view_programs() {
        if(empty($url)) {
            $data['title'] = 'Admin - View Programs';
            $data['header'] = 'View Programs';
            $data['program_list'] = $this->model_admin->check_rows('program');

            if($data['program_list'] == FALSE) {
                $data['message'] = 'No programs found. Please consider adding.';
            }
            else {
                $data['message'] = '';
            }

            $this->load->view('admin/header', $data);
            $this->load->view('admin/view_programs', $data);
            $this->load->view('admin/footer');
        }
    }

    public function edit_program() {
        $data['title'] = 'Admin - Edit Program';
        $data['header'] = 'Edit Program';
        $data['message'] = '';

        $id = $this->uri->segment(4);

        if(!is_numeric($id)) {
            $data['message'] = 'Invalid supplied data.';
        }
        elseif(!$this->model_admin->check_rowID('program', $id)) {
            $data['message'] = 'Program does not exists.';
        }
        else {
            //Program's Information
            $data['row'] = $this->model_admin->check_rowID('program', $id);
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_program', $data);
        $this->load->view('admin/footer');
    }

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
                'role' => 'teacher',
                'password' => $this->encrypt->sha1($this->input->post('login_id'))
            );

            $teacher_result = $this->model_admin->insert_teacher($teacher_data);

            if($teacher_result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $teacher_result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Teacher added.';
                $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $this->view_teachers();
    }

    public function view_teachers() {
        $data['title'] = 'Admin - Teachers';
        $data['header'] = 'Teachers';
        $data['teacher_list'] = $this->model_admin->get_teachers();
        
        if($data['teacher_list'] == FALSE) {
            $message = 'No teachers found in record. Please consider adding.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'glyphicon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_teachers', $data);
        $this->load->view('admin/footer');
    }

    public function edit_teacher(){
        $data['title'] = 'Admin - Edit Teacher Information';
        $data['header'] = 'Edit Teacher Information';
        $data['message'] = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('teacher_id', 'Teacher ID', 'required|trim|max_length[11]|alpha_numeric');
        $this->form_validation->set_rules('id', 'id', 'required|trim|numeric');
        $this->form_validation->set_rules('fname', 'First Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('mname', 'Middle Name', 'required|trim|max_length[20]|callback_alpha_dash_space');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|max_length[20]|callback_alpha_dash_space');

        if($this->form_validation->run() == FALSE) {
            $id = $this->uri->segment(4);
            if(!$this->model_admin->check_rowID('teacher', $id)) {
                $message = 'ID number does not exists.';
                $data['message'] = $this->model_admin->notify_message('alert-info', 'glyphicon-info-sign', $message);
            }
            else {
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
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message;
            }
            else {
                $message = '<strong>Success!</strong> Teacher updated.';
                $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                $this->session->set_flashdata('message2', $message);
                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_teacher', $data);
        $this->load->view('admin/footer');
    }

    public function delete_teacher() {
        $id = $this->uri->segment(4);

        if(!$this->model_admin->check_rowID('teacher', $id)) {
            $message = 'ID number does not exists.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'glyphicon-info-sign', $message);
        }
        else {
            $delete = array('ID' => $id);

            $result = $this->model_admin->delete_teacher($delete);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message;
            }
            else {
                $message = '<strong>Success!</strong> Teacher deleted.';
                $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                $this->session->set_flashdata('message', $message);
                redirect('admin/teachers');
            }
        }
    }

    public function upload_students(){
        $this->load->library('csvimport');
        $this->load->library('form_validation');
       
        $data['title'] = 'Admin - Upload Student List';
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
                    $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                    $this->session->set_flashdata('message', $message);
                    redirect(current_url());
                }
                else {
                    $message = '<strong>Error: </strong>'.  $account_result['db_error'];
                    $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

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
        $data['title'] = 'Admin - Students List';
        $data['header'] = 'View Student List';
        $data['student_list'] = $this->model_admin->check_rows('student');

        if($data['student_list'] == FALSE) {
            $message = 'There are no currently students added.';
            $data['message'] = $this->model_admin->notify_message('alert-info', 'glyphicon-info-sign', $message);
        }
        else {
            $data['message'] = '';
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_students', $data);
        $this->load->view('admin/footer');
    }

    public function edit_student() {
        $data['title'] = 'Admin - Edit Student Information';
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
                $data['message'] = $this->model_admin->notify_message('alert-info', 'glyphicon-info-sign', $message);
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
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message;
            }
            else {
                $message = '<strong>Success!</strong> Student updated.';
                $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                $this->session->set_flashdata('message2', $message);
                redirect(current_url());
            }
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/edit_student', $data);
        $this->load->view('admin/footer');
    }

    public function assign_class() {
        $this->load->library('csvimport');
        $this->load->library('form_validation');

        $data['title'] = 'Admin - Assign Classes';
        $data['header'] = 'Assign Classes';
        
        $data['teacher_list'] = $this->model_admin->check_rows('teacher');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules('teacher', 'Teacher', 'required|trim');

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
                $csv_array = $this->csvimport->get_array($file_path, array('Group Number', 'Start Time', 'Time', 'Course Code'));
                
                foreach ($csv_array as $row) {
                    // var_dump($row);
                    
                    $insert_data = array(
                        'group_num'=>$row['Group Number'],
                        'start_time'=>$row['Start Time'],
                        'end_time'=>$row['Time'],
                        'courseCode'=>$row['Course Code'],
                        'teacherID'=> $this->input->post('teacher')
                    );
                    $result = $this->model_admin->insert_classes($insert_data);
                }

                $message = '<strong>Success!</strong> Classes added.';
                $message = $this->model_admin->notify_message('alert-success', 'glyphicon-ok-sign', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
            else {
                $result = $this->model_admin->insert_classes($insert_data);

                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_admin->notify_message('alert-danger', 'glyphicon-exclamation-sign', $message);

                $data['message'] = $message;
            }            
        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/assign_class', $data);
        $this->load->view('admin/footer');
    }
}