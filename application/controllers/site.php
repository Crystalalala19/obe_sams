<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_users');
	}

	public function index() {        
		$data['title'] = "OBE SAMS Academic";
        
        $this->load->library('form_validation');
        $this->load->library('encrypt');

        $this->form_validation->set_rules('idnum', 'ID Number', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $user_data = array(
                'idnum' => $this->input->post('idnum'),
                'is_logged_in' => 1,
                'role' => $this->model_users->scalar('user_account','role')
            );

            $this->session->set_userdata($user_data);
            redirect('site/members'); 
        }

		$this->load->view("index/header", $data);
		$this->load->view("index/view_home");
		$this->load->view("index/footer");
	}	

    //CALLBACKS and/or FUNCTIONS
	function members() {
		if($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'admin')
			redirect('admin');
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'teacher') {
			$data['user'] = $this->model_users->select_user();
			$data['title'] = "OBE SAMS Academic";
			 
			$this->load->view("teacher/header", $data);
			$this->load->view('teacher/index', $data);
			$this->load->view("teacher/footer");
		} 
        elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'student'){
            redirect('student');
        }
        elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'coordinator'){
            redirect('coordinator');
        }
		else
			$this->error_404();
	}

    function validate_credentials($query) {
        $data = array('idnum' => $this->input->post('idnum'));
        $pass = $this->input->post('password');
        if($this->model_users->can_log_in($data, $pass))
            return true;
        else {
            $this->form_validation->set_message('validate_credentials', 'Incorrect Username and/or Password combination.');
            return false;
        }
    }

    function download($file_type = '') {
        $this->load->helper('download');
        
        if($file_type == 'class') {
            $data = file_get_contents('uploads/Template Grades.csv');
            $name = 'Template Grades.csv';
        }
        elseif($file_type == 'pdf') {
            $data = file_get_contents('uploads/test.pdf');
            $name = 'Test for PDF.pdf';
        }

        force_download($name, $data); 
    }

    function error_404() {
        $data['title'] = 'Error 404';
        $this->load->view('error', $data);
    }

    function check_role() {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        
        if($this->session->userdata('role') != 'teacher')
            redirect('site');
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    //END CALLBACK and/or FUNCSTIONS

    public function course_list(){
        $this->check_role();

        $year = $this->uri->segment(3);

        if(empty($year)) {
            $message = 'Select an Academic Year to view assigned classes.';
            $message = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message);

            $data['info'] = $message;
        }

        $data['academic_year'] = $year;
        $data['first_sem'] = $this->model_users->get_1stSemester($year);
        $data['second_sem'] = $this->model_users->get_2ndSemester($year);
        $data['summer'] = $this->model_users->get_summer($year);
        $data['select_SY'] = $this->model_users->select_SY();

        $data['user'] = $this->model_users->select_user();
        $data['title'] = "OBE SAMS Academic";

        if($data['first_sem'] == FALSE) {
            $message1 = 'No classes assigned for First Semester. If you think this is a problem, please contact the Chairman.';
            $data['message1'] = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message1);
        } else {
            $data['message1'] = '';
        }

        if($data['second_sem'] == FALSE) {
            $message2 = 'No classes assigned for Second Semester. If you think this is a problem, please contact the Chairman.';
            $data['message2'] = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message2);
        } else {
            $data['message2'] = '';
        }

        if($data['summer'] == FALSE) {
            $message3 = 'No classes assigned for Summer. If you think this is a problem, please contact the Chairman.';
            $data['message3'] = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message3);
        } else {
            $data['message3'] = '';
        }

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/course_list', $data);
        $this->load->view("teacher/footer");
   }

    public function class_list(){
        $this->check_role();

        $this->load->library('form_validation');
        $this->load->library('csvimport');

        $class_id = $this->uri->segment(3);

        $data['class_list'] = $this->model_users->select_class($class_id);
        $data['select_schedule'] = $this->model_users->select_schedule($class_id);

        $select_schedule = $data['select_schedule'];
        $student_course = $select_schedule[0]->courseCode;
        $student_courseID = $this->model_users->get_courseID($student_course);

        $data['select_programName'] = $this->model_users->select_programName($student_courseID);
       
        $data['get_po'] = $this->model_users->get_po($student_courseID);

        $info = 'Can only upload once and cannot be edited after. Be sure to double-check and confirm.';
        $data['info'] = $this->model_users->notify_message('alert-danger', 'icon-exclamation', $info);

        foreach($data['class_list'] as $key => $val) {
            $data['class_list'][$key]['score'] = $this->model_users->get_studentPoGrade($val['studentID'], $class_id);
            $data['class_list'][$key]['poID'] = $this->model_users->get_studentPoID($val['studentID'], $class_id);
            $i = 0;

            foreach($data['get_po'] as $key1 => $val1) {
                if($val1['status'] == "1" && isset($data['class_list'][$key]['score'][$i])) {
                    $data['class_list'][$key]['score'][$i] =  $data['class_list'][$key]['score'][$i]['score'];
                } else {
                    $data['class_list'][$key]['score'][$i] = "";
                }

                $i++;
            }
        }

        $data['user'] = $this->model_users->select_user();
        $data['title'] = "OBE SAMS Academic";

        if($data['class_list'] == FALSE) {
            $message = 'Your class is empty. Please upload students list with its PO grades.';
            $data['message'] = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '99999';
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload()){
        }
        else{
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];

            if ($this->csvimport->get_array($file_path)) {
                $insert_data = array();
                $nonExistingCourse = array();
                $nonExistingTeacher = array();
                $to_insert_grade = array();
                $csv_array = $this->csvimport->get_array($file_path);
                $csv_array = array_filter(array_map('array_filter', $csv_array));
                $headers = $this->csvimport->get_headers();
                $po_courses = $this->model_users->get_poCourse($student_courseID);

                $this->db->trans_start();

                foreach ($csv_array as $row) {
                    $check_studentID = $this->model_users->check_studentRecord($row['Student ID']);
                    if(!$check_studentID) {
                        $this->load->library('encrypt');

                        $insert_data = array(
                            'student_id'=>$row['Student ID'],
                            'lname'=>$row['Last Name'],
                            'fname'=>$row['First Name']
                        );

                        $account_data = array(
                            'idnum'=>$row['Student ID'],
                            'role' => 'student',
                            'password' => $this->encrypt->sha1($row['Student ID'])
                        );

                        $result = $this->model_users->insert_student($insert_data);
                        $insert_id = $this->model_users->get_lastId();
                        $student_id = $this->model_users->get_newInsertStudent($insert_id);
                        $this->model_users->insert_studentAccount($account_data);
                    }
                    else
                        $student_id = $check_studentID;

                    $studentCourse_data = array(
                        'score' => array(),
                        'student_id' => $student_id,
                        'classID' => $class_id,
                        'poID' => array(), 
                        'courseID' => $student_courseID
                    ); 

                    for($x = 0, $index = 4; $x < count($po_courses); $x++, $index++) {
                        if($po_courses[$x]['status'] == '1') {
                            if($row[$headers[$index]] == NULL) {
                                $message = '<strong>Error: </strong>There\'s an empty score found. Please re-check activated PO\'s and your .CSV file.';
                                $message = $this->model_users->notify_message('alert-danger', 'icon-exclamation', $message);

                                $this->session->set_flashdata('message', $message);

                                redirect(current_url());
                            };
                            $studentCourse_data['score'][$x] = $row[$headers[$index]];
                            $studentCourse_data['poID'][$x] = $po_courses[$x]['poID'];
                        } else{
                            $studentCourse_data['score'][$x] = '';
                            $studentCourse_data['poID'][$x] = $po_courses[$x]['poID'];
                        }
                        error_reporting(E_ALL ^ E_NOTICE);
                    }

                    foreach($studentCourse_data['score'] as $key => $row2) {
                        $student_course_data = array();
                        $student_course_data['score'] = $row2;
                        $student_course_data['studentID'] = $studentCourse_data['student_id'];
                        $student_course_data['classID'] = $studentCourse_data['classID'];
                        $student_course_data['poID'] = $studentCourse_data['poID'][$key];
                        $student_course_data['courseID'] = $studentCourse_data['courseID'];
                        $student_course_data['year_level'] = $row['Year Level'];

                        $to_insert_grade[] = $student_course_data;
                    }
                }
                
                $this->model_users->insert_grades($to_insert_grade, $class_id);

                //Deletes uploaded file
                unlink($file_path);

                if($this->db->trans_status() === FALSE) {
                    $this->db->trans_rollback();
                    $message = '<strong>Error: </strong>Uploading grades.';
                    $message = $this->model_users->notify_message('alert-danger', 'icon-exclamation', $message);

                    $this->session->set_flashdata('message', $message);
                }
                else {
                    $this->db->trans_complete();
                    $message = '<strong>Success!</strong> Grades uploaded.';
                    $message = $this->model_users->notify_message('alert-success', 'icon-ok', $message);

                    $this->session->set_flashdata('message', $message);
                }
                redirect(current_url());
            }
            else {
                $message = '<strong>Error: </strong> Inserting .CSV file.';
                $message = $this->model_users->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }            
        }

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/class_list', $data);
        $this->load->view("teacher/footer");
    }

    public function scorecard(){
        $this->check_role();

        $student_id = $this->uri->segment(3);

        $data['get_studentName'] = $this->model_users->get_studentName($student_id);
        $data['get_scoreEY'] = $this->model_users->get_scoreEY($student_id);
        $data['get_class'] = $this->model_users->get_class($student_id);
        
        $data['class_list'] = $this->model_users->select_classSC($student_id);

        $class_list = $data['class_list'];

        $student_class = $data['class_list'];

        foreach($data['class_list'] as $key => $val) {
            $data['get_po'] = $this->model_users->get_poGeneral($student_id, $class_list[$key]['ID']);
            $data['class_list'][$key]['score'] = $this->model_users->get_studentPoGrade($val['studentID'], $student_class[$key]['ID']);
            $data['class_list'][$key]['poID'] = $this->model_users->get_studentPoID($val['studentID'], $student_class[$key]['ID']);
            
            $i = 0;
            foreach($data['class_list'][$key]['score'] as $key1 => $val1) {
                if($val1['score'] == "0") {
                    $data['class_list'][$key]['score'][$key1]['score'] = "";
                }
            }
            $i++;
        }

        $data['user'] = $this->model_users->select_user();
        $data['title'] = "OBE SAMS Academic";

	    $this->load->view("teacher/header", $data);
	    $this->load->view('teacher/scorecard', $data);
	    $this->load->view("teacher/footer");
    }

    public function student_list(){
        $this->check_role();
        
        $session_id = $this->session->userdata('idnum');
        $data['student_list'] = $this->model_users->student_list($session_id);  
        
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "OBE SAMS Academic";

        if($data['student_list'] == FALSE) {
            $message = 'No students found in record. Please add students to your assigned classes.';
            $data['message'] = $this->model_users->notify_message('alert-info', 'icon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/student_list', $data);
        $this->load->view("teacher/footer");
    }

    public function account() {
        $this->check_role();
        
        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_users->select_user();

        $teacher_id = $this->session->userdata('idnum');

        $this->form_validation->set_rules('cur_pass', 'Current Password', 'required|trim|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[6]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|trim|matches[new_pass]');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        elseif(!$this->model_users->check_password($teacher_id, $this->input->post('cur_pass'))) {
            $message = "<strong>Error:</strong> Invalid entered current password.";
            $message = $this->model_users->notify_message('alert-danger', 'icon-exclamation', $message);

            $data['message'] = $message;
        }
        else {
            $new_pass = $this->input->post('new_pass');

            $change_data = array(
                'password' => $this->encrypt->sha1($this->input->post('new_pass'))
            );

            $result = $this->model_users->change_pass($change_data, $teacher_id);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_users->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Password changed.';
                $message = $this->model_users->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/account', $data);
        $this->load->view('teacher/footer');
    }

    public function teacher_log(){
        $data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_users->select_user();
        $data['log'] = $this->model_users->log();

        $this->load->view('teacher/header', $data);
        $this->load->view('teacher/teacher_log', $data);
        $this->load->view('teacher/footer');
    }
}