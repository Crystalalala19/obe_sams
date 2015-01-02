<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_users');
        // Your own constructor code
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
            $this->load->view('teacher/teacher');
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
                'login_id' => $this->input->post('idnum'),
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
        if($this->model_users->can_log_in()) {
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
}