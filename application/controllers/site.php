<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_users');
    }

    public function index() {
        $data['title'] = "Outcome-based Education";

        $this->load->view("index/header", $data);
        $this->load->view("index/view_home");
        $this->load->view("index/footer");
    }

    public function members() {

        if($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'admin') {
            $this->load->view('admin/index');
        }  
        elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'teacher') {
             
             $this->load->model("model_users");
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
      
      $this->load->model("model_users");
      $data['teacher_class'] = $this->model_users->teacher_class();
      $data['user'] = $this->model_users->select_user();
      $data['title'] = "Outcome-based Education";

      $this->load->view("teacher/header", $data);
      $this->load->view('teacher/course_list', $data);
      $this->load->view("teacher/footer");
   }

   function class_list(){
      
      $data['id'] = $this->uri->segment(4);
      $data['row'] = $this->model_admin->check_rowID('teacher', $id);

      $data['result'] = $this->model_users->select_class();
      $data['user'] = $this->model_users->select_user();
      $data['title'] = "Outcome-based Education";

      $this->load->view("teacher/header", $data);
      $this->load->view('teacher/class_list', $data);
      $this->load->view("teacher/footer");
   }

    function scorecard(){
      
      $this->load->model("model_users");
      $data['result'] = $this->model_users->select_class();
      $data['user'] = $this->model_users->select_user();
      $data['title'] = "Outcome-based Education";

      $this->load->view("teacher/header", $data);
      $this->load->view('teacher/scorecard', $data);
      $this->load->view("teacher/footer");
   }

}