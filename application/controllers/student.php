<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_student');
    }

    public function index(){

        $data['user'] = $this->model_student->select_user();
        $data['title'] = 'OBE SAMS Academic';

        $student_id = $this->session->userdata('idnum');

        $data['get_studentName'] = $this->model_student->get_studentName($student_id);
        $data['get_EY'] = $this->model_student->get_scoreEY($student_id);
        $data['get_class'] = $this->model_student->get_class($student_id);
        
        $data['class_list'] = $this->model_student->select_classSC($student_id);
        $multi_array = array();
        $i = 0;

        foreach ($data['class_list'] as $key2 => $val2) {
            $multi_array[$i++] = $this->model_student->get_po_courseSC($val2['courseID']);
        }

        $data['m_array'] = $multi_array[0];
        foreach($data['class_list'] as $key => $val) {
            $data['class_list'][$key]['score'] = $this->model_student->get_po_score($val['classID'], $student_id);
            $data['class_list'][$key]['grade'] = array();
            $data['class_list'][$key]['poID'] = $this->model_student->get_student_POID($val['classID'], $student_id);
            $i = 0;

            foreach($data['m_array'] as $key1 => $val1) {
                if($val1['status'] == "1"  && isset($data['class_list'][$key]['score'][$i])) {
                    $data['class_list'][$key]['grade'][$i] =  $data['class_list'][$key]['score'][$i]['score'];
                } else {
                    $data['class_list'][$key]['grade'][$i] = "";
                }

                $i++;
            }
        }


        $this->load->view('student/header', $data);
        $this->load->view('student/index', $data);
        $this->load->view('student/footer');


    }
    
}
