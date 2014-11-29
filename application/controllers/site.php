<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('model_users');
      $this->load->model('model_role');
      // Your own constructor code
   }

   public function index()
   {
      $data['title'] = "Outcome-based Education";

      $this->load->view("index/header", $data);
      $this->load->view("index/view_home");
      $this->load->view("index/footer");
   }

   public function signup(){
      $this->load->view('register/signup');
   }

   public function members(){

      if($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'admin'){
         $this->load->view('admin/admin');
      }  elseif($this->session->userdata('is_logged_in') && $this->session->userdata('role') == 'teacher'){
         $this->load->view('teacher/teacher');
      } 

         else{  
         redirect('site/restricted');
      }
   }

   public function restricted(){
      $this->load->view('index/restricted');
   }

   public function login_validation(){

      $this->load->library('form_validation');

    
      $this->form_validation->set_rules('idnum', 'ID Number', 'required|trim|xss_clean|callback_validate_credentials');
      //trim is for security and xss_clean is for email, CI function, prevents cross side scripting
      $this->form_validation->set_rules('password', 'Password', 'required|md5|trim');

      if ($this->form_validation->run()){
         //$this->load->model('model_users');
         $this->load->model('model_role');
         $data = array(
            'login_id' => $this->input->post('idnum'),
            'is_logged_in' => 1,
            'role' => $this->model_role->scalar('user_account','role')
         );

         $this->session->set_userdata($data);
         redirect('site/members'); 
      } else {
         $data['title'] = "Outcome-based Education";

         $this->load->view("index/header", $data);
         $this->load->view("index/view_home");
         $this->load->view("index/footer");
      }
   }

   public function validate_credentials($query){
      $this->load->model('model_users');

      if($this->model_users->can_log_in()){
         return true;
      } else {
         $this->form_validation->set_message('validate_credentials', 'Incorrect ID number/password.');
         return false;
      }
   }

   public function signup_validation(){

      $this->load->library('form_validation');

      $this->form_validation->set_rules('idnum', 'ID number', 'required|trim|alpha_numeric|min_length[10]|max_length[15]|xss_clean|is_unique[user_account.login_id]');
      $this->form_validation->set_rules('role', 'Role', 'required|trim|alpha');
      $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[32]');
      $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
      $this->form_validation->set_rules('lname', 'Last Name', 'required|trim|alpha|xss_clean');
      $this->form_validation->set_rules('mname', 'Middle Name', 'required|trim|alpha|xss_clean');
      $this->form_validation->set_rules('fname', 'First Name', 'required|trim|alpha|xss_clean');
      $this->form_validation->set_rules('courseID', 'courseID', 'required|trim|integer|xss_clean');
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[teacher.login_id]');


      $this->form_validation->set_message('is_unique', '%s already exists.');

      if($this->form_validation->run() == FALSE ){
        $this->load->view('register/signup');
      } else{
         $this->model_users->can_sign_in();
          $this->load->view('index/formsuccess');
      }  
   }

   public function logout(){
      $this->session->sess_destroy();
      redirect('site');
   }
}