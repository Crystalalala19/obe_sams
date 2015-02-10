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
    
}
