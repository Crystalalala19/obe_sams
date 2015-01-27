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

        $courseCode = $this->uri->segment(4);

        $data['teacher_class1'] = $this->model_users->teacher_class1($courseCode);
        $data['teacher_class2'] = $this->model_users->teacher_class2();
        $data['teacher_class3'] = $this->model_users->teacher_class3();
        $data['course1'] = $this->model_users->course1();
        $data['course2'] = $this->model_users->course2();
        $data['course3'] = $this->model_users->course3();
        $data['select_SY'] = $this->model_users->select_SY();
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/course_list', $data);
        $this->load->view("teacher/footer");
   }

   function class_list(){
      
        $id = $this->uri->segment(3);

        $data['class_list'] = $this->model_users->select_class($id);
        $data['select_schedule'] = $this->model_users->select_schedule($id);
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";


        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/class_list', $data);
        $this->load->view("teacher/footer");
    }

    function scorecard(){
      
        $id = $this->uri->segment(3);


        $data['scorecard'] = $this->model_users->scorecard($id);
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

	    $this->load->view("teacher/header", $data);
	    $this->load->view('teacher/scorecard', $data);
	    $this->load->view("teacher/footer");
    }

    function student_list(){

        $data['student_list'] = $this->model_users->student_list();  
        $data['user'] = $this->model_users->select_user();
        $data['title'] = "Outcome-based Education";

        $this->load->view("teacher/header", $data);
        $this->load->view('teacher/student_list', $data);
        $this->load->view("teacher/footer");
    }

}