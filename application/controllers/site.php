<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('model_users');
	}

	public function index() {
		$data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_users->select_user();
        
		$this->load->view("index/header", $data);
		$this->load->view("index/view_home");
		$this->load->view("index/footer");
	}	

	public function members() {
		
		if($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'admin') {
			$this->load->view('admin/index');
		}  
		elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'teacher') {
			 
			 $data['user'] = $this->model_users->select_user();
			 $data['title'] = "Outcome-based Education";
			 
			 $this->load->view("teacher/header", $data);
			 $this->load->view('teacher/index', $data);
			 $this->load->view("teacher/footer");
		} 
		else{  
			redirect('site/restricted');
		}
	}

	public function restricted() {
		$this->load->view('index/restricted');
	}

   public function login_validation() {

        $this->load->library('form_validation');
        $this->load->library('encrypt');

        $this->form_validation->set_rules('idnum', 'ID Number', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run()) {
            $data = array(
                'teacher_id' => $this->input->post('idnum'),
                'is_logged_in' => 1,
                'role' => $this->model_users->scalar('teacher','role')
            );

            $this->session->set_userdata($data);
            redirect('site/members'); 
        } 
        else {
            $data['title'] = "Outcome-based Education";

            $this->load->view("index/header", $data);
            $this->load->view("index/view_home");
            $this->load->view("index/footer");
        }
    }

    public function validate_credentials($query) {
        $data = array('teacher_id' => $this->input->post('idnum'));
        $pass = $this->input->post('password');
        if($this->model_users->can_log_in($data, $pass)) {
            return true;
        } 
        else {
            $this->form_validation->set_message('validate_credentials', 'Incorrect ID or password.');
            return false;
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }


     function course_list(){

        $year = $this->uri->segment(3);

        $data['academic_year'] = $year;
        $data['first_sem'] = $this->model_users->get_1stSemester($year);
        $data['second_sem'] = $this->model_users->get_2ndSemester($year);
        $data['summer'] = $this->model_users->get_summer($year);
        $data['select_SY'] = $this->model_users->select_SY();
        
        //print_r($data['select_SY']);
        //die();

        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        if($data['first_sem'] == FALSE) {
            $message1 = 'No classes found in record. Please contact the administrator to assign you a class.';
            $data['message1'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message1);
        } else {
            $data['message1'] = '';
        }

        if($data['second_sem'] == FALSE) {
            $message2 = 'No classes found in record. Please contact the administrator to assign you a class.';
            $data['message2'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message2);
        } else {
            $data['message2'] = '';
        }

        if($data['summer'] == FALSE) {
            $message3 = 'No classes found in record. Please contact the administrator to assign you a class.';
            $data['message3'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message3);
        } else {
            $data['message3'] = '';
        }


        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/course_list', $data);
        $this->load->view("teacher/footer");
   }

    function class_list(){
        $this->load->library('csvimport');
        $this->load->library('form_validation');

        $class_id = $this->uri->segment(3);

        $data['class_list'] = $this->model_users->select_class($class_id);
        $data['select_schedule'] = $this->model_users->select_schedule($class_id);
        $data['select_programName'] = $this->model_users->select_programName($class_id);
        $data['get_po'] = $this->model_users->get_po($class_id);

        foreach($data['class_list'] as $key => $val) {
            $data['class_list'][$key]['score'] = $this->model_users->get_studentPOGRADE($val['studentID']);
            $data['class_list'][$key]['grade'] = array();
            $data['class_list'][$key]['poID'] = $this->model_users->get_student_poID($val['studentID']);
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

        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        if($data['class_list'] == FALSE) {
            $message = 'No students found in record. Please upload students list with its PO grade.';
            $data['message'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $select_schedule = $data['select_schedule'];
        $student_course = $select_schedule[0]->courseCode;
        $student_courseID = $this->model_users->get_courseID($student_course);

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
                $csv_array = $this->csvimport->get_array($file_path);
                $headers = $this->csvimport->get_headers();

                $po_courses = $this->model_users->get_poCourse($student_course);

                foreach ($csv_array as $row) {
                    $check_studentID = $this->model_users->check_studentRecord($row['Student ID']);
                    if(!$check_studentID) {
                        $insert_data = array(
                            'student_id'=>$row['Student ID'],
                            'lname'=>$row['Last Name'],
                            'fname'=>$row['First Name'],
                            'mname'=>$row['Middle Name']
                        );

                        $this->model_users->insert_student($insert_data);
                        $insert_id = $this->model_users->get_lastId();
                        $student_id = $this->model_users->get_newInsertStudent($insert_id);
                    }
                    else {
                        $student_id = $check_studentID;
                    }

                    $studentCourse_data = array(
                        'score' => array(),
                        'student_id' => $student_id,
                        'classID' => $class_id,
                        'poID' => array(), 
                        'courseID' => $student_courseID
                    ); 

                    for($x = 0, $index = 4; $x < count($po_courses); $x++, $index++) {
                        if($po_courses[$x]['status'] == '1') {
                            $studentCourse_data['score'][$x] = $row[$headers[$index]];

                            $studentCourse_data['poID'][$x] = $po_courses[$x]['poID'];
                        } else {
                            $studentCourse_data['score'][$x] = '';
                            $studentCourse_data['poID'][$x] = $po_courses[$x]['poID'];
                        }
                    }

                    foreach($studentCourse_data['score'] as $key => $row2) {
                        $student_course_data = array();
                        $student_course_data['score'] = $row2;
                        $student_course_data['studentID'] = $studentCourse_data['student_id'];
                        $student_course_data['classID'] = $studentCourse_data['classID'];
                        $student_course_data['poID'] = $studentCourse_data['poID'][$key];
                        $student_course_data['courseID'] = $studentCourse_data['courseID'];
                        $result = $this->model_users->insert_grades($student_course_data);
                    }
                }

                //Deletes uploaded file
                unlink($file_path);

                if($result['is_success'] == FALSE) {
                    $message = '<strong>Error: </strong>Uploading grades.';
                    $message = $this->model_admin->notify_message('alert-danger', 'icon-exclamation', $message);

                    $this->session->set_flashdata('message', $message);
                }
                else {
                    $message = '<strong>Success!</strong> Grades uploaded.';
                    $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                    $this->session->set_flashdata('message', $message);
                }
                redirect(current_url());
            }
            else {
                $message = '<strong>Error: </strong> Inserting .CSV file.';
                $message = $this->model_admin->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }            
        }

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/class_list', $data);
        $this->load->view("teacher/footer");
    }

    function scorecard(){
        $id = $this->uri->segment(3);

        $data['scorecard'] = $this->model_users->scorecard($id);
        $data['scorecard1stSem'] = $this->model_users->scorecard1stSem($id);
        $data['scorecard2ndSem'] = $this->model_users->scorecard2ndSem($id);
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        if($data['scorecard1stSem'] == FALSE) {
            $message = 'No courses found in record.';
            $data['message'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        if($data['scorecard2ndSem'] == FALSE) {
            $message1 = 'No courses found in record.';
            $data['message1'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message1);
        } else {
            $data['message1'] = '';
        }

	    $this->load->view("teacher/header", $data);
	    $this->load->view('teacher/scorecard', $data);
	    $this->load->view("teacher/footer");
    }

    function student_list(){
        $data['student_list'] = $this->model_users->student_list();  
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        if($data['student_list'] == FALSE) {
            $message = 'No students found in record. Please add students to your assigned classes.';
            $data['message'] = $this->model_users->notify_message('alert-danger', 'glyphicon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/student_list', $data);
        $this->load->view("teacher/footer");
    }
}