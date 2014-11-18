<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    public function index()
    {
        $data['title'] = "Account";

        $this->load->view("pages/header", $data);
        $this->load->view("pages/view_account");
        $this->load->view("pages/footer");
    }
    public function create_map()
    {
        $this->load->library("form_validation");

        $this->form_validation->set_rules("courseCode", "Course Code", "required|trim|min_length[5]|max_length[12]|xss_clean");
        $this->form_validation->set_rules("courseName", "Course Name", "required");

        if($this->form_validation->run() == FALSE)
        {
            $data['title'] = "Account";

            $this->load->view("pages/header", $data);
            $this->load->view("pages/view_account");
            $this->load->view("pages/footer");
        }
    }
}