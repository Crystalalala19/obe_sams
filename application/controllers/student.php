<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_student');
    }

    public function index(){
        if(!$this->session->userdata('is_logged_in')){
            redirect('site');
        }

        $data['user'] = $this->model_student->select_user();
        $data['title'] = 'OBE SAMS Academic';

        $student_id = $this->session->userdata('idnum');

        $data['get_studentName'] = $this->model_student->get_studentName($student_id);
        $data['get_EY'] = $this->model_student->get_scoreEY($student_id);
        $data['get_class'] = $this->model_student->get_class($student_id);

        $this->load->view('student/header', $data);
        $this->load->view('student/index', $data);
        $this->load->view('student/footer');
    }

    function scorecard(){
        if(!$this->session->userdata('is_logged_in')){
            redirect('site');
        }

        $data['user'] = $this->model_student->select_user();
        $data['title'] = 'OBE SAMS Academic';

        $student_id = $this->session->userdata('idnum');

        $data['get_studentName'] = $this->model_student->get_studentName($student_id);
        $data['get_EY'] = $this->model_student->get_scoreEY($student_id);
        $data['get_class'] = $this->model_student->get_class($student_id);
        
        $data['class_list'] = $this->model_student->select_classSC($student_id);

        $class_list = $data['class_list'];

        $student_class = $data['class_list'];

        foreach($data['class_list'] as $key => $val) {
            $data['get_po'] = $this->model_student->get_poGeneral($student_id, $class_list[$key]['ID']);
            $data['class_list'][$key]['score'] = $this->model_student->get_studentPoGrade($val['studentID'], $student_class[$key]['ID']);
            $data['class_list'][$key]['poID'] = $this->model_student->get_studentPoID($val['studentID'], $student_class[$key]['ID']);
            
            $i = 0;
            foreach($data['class_list'][$key]['score'] as $key1 => $val1) {
                if($val1['score'] == "0") {
                    $data['class_list'][$key]['score'][$key1]['score'] = "";
                }
            }
            $i++;
        }

        $this->load->view('student/header', $data);
        $this->load->view('student/scorecard', $data);
        $this->load->view('student/footer');
    }

    public function account() {
        $this->load->library('encrypt');
        $this->load->library('form_validation');

        $data['title'] = "OBE SAMS Academic";
        $data['user'] = $this->model_student->select_user();

        $teacher_id = $this->session->userdata('idnum');
        $pass = $this->input->post('new_pass');

        $this->form_validation->set_rules('cur_pass', 'Current Password', 'required|trim|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('new_pass', 'New Password', 'required|trim|min_length[6]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|trim|min_length[6]|max_length[15]|alpha_numeric|matches[new_pass]');

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
        }
        elseif($this->model_student->check_password($teacher_id, $pass)) {
            $message = "<strong>Error:</strong> Invalid entered current password.";
            $message = $this->model_student->notify_message('alert-danger', 'icon-exclamation', $message);

            $data['message'] = $message;
        }
        else {
            $new_pass = $this->input->post('new_pass');

            $change_data = array(
                'password' => $this->encrypt->sha1($this->input->post('new_pass'))
            );

            $result = $this->model_student->change_pass($change_data, $teacher_id);

            if($result['is_success'] == FALSE) {
                $message = '<strong>Error: </strong>'.  $result['db_error'];
                $message = $this->model_student->notify_message('alert-danger', 'icon-exclamation', $message);

                $data['message'] = $message; 
            }
            else {
                $message = '<strong>Success!</strong> Password changed.';
                $message = $this->model_student->notify_message('alert-success', 'icon-ok', $message);

                $this->session->set_flashdata('message', $message);
                redirect(current_url());
            }
        }

        $this->load->view('student/header', $data);
        $this->load->view('student/account', $data);
        $this->load->view('student/footer');
    }
}
