<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coordinator extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_coordinator');
    }

    public function index(){
        $this->check_role();

        $data['user'] = $this->model_coordinator->select_user();
        $data['title'] = 'OBE SAMS Academic';

        
        $this->load->view('coordinator/header', $data);
        $this->load->view('coordinator/index', $data);
        $this->load->view('coordinator/footer');
    }

    function check_role() {
        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        
        if($this->session->userdata('role') != 'coordinator')
            redirect('site');
    }


    public function account() {
        $this->check_role();

        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_coordinator->select_user();

        $coordinator_id = $this->session->userdata('idnum');

        $this->form_validation->set_rules('cur_pass', 'Current Password', 'required|trim|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[6]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|trim|matches[new_pass]');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        elseif(!$this->model_coordinator->check_password($coordinator_id, $this->input->post('cur_pass'))) {
            $message = "<strong>Error:</strong> Invalid entered current password.";
            $message = $this->model_coordinator->notify_message('alert-danger', 'icon-exclamation', $message);

            $data['message'] = $message;
        }
        else {
            $new_pass = $this->input->post('new_pass');

            $change_data = array(
                'password' => $this->encrypt->sha1($this->input->post('new_pass'))
            );

            $result = $this->model_coordinator->change_pass($change_data, $coordinator_id);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_coordinator->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Password changed.';
                $message = $this->model_coordinator->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $this->load->view('coordinator/header', $data);
        $this->load->view('coordinator/account', $data);
        $this->load->view('coordinator/footer');
    }

    public function student_list() {
        $this->check_role();

        $data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_coordinator->select_user();
        $data['student_list'] = $this->model_coordinator->student_list();

        if($data['student_list'] == FALSE) {
            $message = 'No students found in record. Please add students to your assigned classes.';
            $data['message'] = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view('coordinator/header', $data);
        $this->load->view('coordinator/student_list', $data);
        $this->load->view('coordinator/footer');
    }

    public function class_list() {
        $this->check_role();

        $this->load->library('form_validation');

        $class_id = $this->uri->segment(3);

        $data['class_list'] = $this->model_coordinator->select_class($class_id);
        $data['select_schedule'] = $this->model_coordinator->select_schedule($class_id);

        $select_schedule = $data['select_schedule'];
        $student_course = $select_schedule[0]->courseCode;
        $student_courseID = $this->model_coordinator->get_courseID($student_course);

        $data['select_programName'] = $this->model_coordinator->select_programName($student_courseID);
       
        $data['get_po'] = $this->model_coordinator->get_po($student_courseID);

        foreach($data['class_list'] as $key => $val) {
            $data['class_list'][$key]['score'] = $this->model_coordinator->get_studentPoGrade($val['studentID'], $class_id);
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

        $data['user'] = $this->model_coordinator->select_user();
        $data['title'] = "OBE SAMS Academic";

        if($data['class_list'] == FALSE) {
            $message = 'This class is empty. Please tell the teacher assigned to this class to upload the PO scores.';
            $data['message'] = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message);
        } else {
            $data['message'] = '';
        }

        $this->load->view('coordinator/header', $data);
        $this->load->view('coordinator/class_list', $data);
        $this->load->view('coordinator/footer');
    }

    public function course_list() {
        $this->check_role();

        $year = $this->uri->segment(3);

        if(empty($year)) {
            $message = 'Select an Academic Year to view assigned classes.';
            $message = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message);

            $data['info'] = $message;
        }

        $data['academic_year'] = $year;
        $data['first_sem'] = $this->model_coordinator->get_1stSemester($year);
        $data['second_sem'] = $this->model_coordinator->get_2ndSemester($year);
        $data['summer'] = $this->model_coordinator->get_summer($year);
        $data['select_SY'] = $this->model_coordinator->select_SY();

        $data['user'] = $this->model_coordinator->select_user();
        $data['title'] = "OBE SAMS Academic";

        if($data['first_sem'] == FALSE) {
            $message1 = 'No classes assigned for First Semester. If you think this is a problem, please contact the Chairman.';
            $data['message1'] = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message1);
        } else {
            $data['message1'] = '';
        }

        if($data['second_sem'] == FALSE) {
            $message2 = 'No classes assigned for Second Semester. If you think this is a problem, please contact the Chairman.';
            $data['message2'] = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message2);
        } else {
            $data['message2'] = '';
        }

        if($data['summer'] == FALSE) {
            $message3 = 'No classes assigned for Summer. If you think this is a problem, please contact the Chairman.';
            $data['message3'] = $this->model_coordinator->notify_message('alert-info', 'icon-info-sign', $message3);
        } else {
            $data['message3'] = '';
        }

        $this->load->view("coordinator/header", $data);
        $this->load->view('coordinator/course_list', $data);
        $this->load->view("coordinator/footer");
    }

    public function scorecard(){
        $this->check_role();

        $student_id = $this->uri->segment(3);

        $data['get_studentName'] = $this->model_coordinator->get_studentName($student_id);
        $data['get_scoreEY'] = $this->model_coordinator->get_scoreEY($student_id);
        $data['get_class'] = $this->model_coordinator->get_class($student_id);
        
        $data['class_list'] = $this->model_coordinator->select_classSC($student_id);

        $class_list = $data['class_list'];

        $student_class = $data['class_list'];

        foreach($data['class_list'] as $key => $val) {
            $data['get_po'] = $this->model_coordinator->get_poGeneral($student_id, $class_list[$key]['ID']);
            $data['class_list'][$key]['score'] = $this->model_coordinator->get_studentPoGrade($val['studentID'], $student_class[$key]['ID']);            
        }

        $data['user'] = $this->model_coordinator->select_user();
        $data['title'] = "OBE SAMS Academic";

        $this->load->view("coordinator/header", $data);
        $this->load->view('coordinator/scorecard', $data);
        $this->load->view("coordinator/footer");
    }
}
