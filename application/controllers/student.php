<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_student');
    }

    public function index(){

        $data['user'] = $this->model_student->select_user();
        $data['title'] = 'OBE SAMS Academic';

        $this->load->view('student/header', $data);
        $this->load->view('student/index');
        $this->load->view('student/footer');
    }
    
}
