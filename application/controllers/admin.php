<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $data['title'] = "Admin - Dashboard";

        $this->load->view("admin/header", $data);
        $this->load->view("admin/index");
        $this->load->view("admin/footer");
    }

    public function index_create_program(){
        $data['title'] = "Admin - Create Program";
        $data['message'] = '';

        $this->load->view("admin/header", $data);
        $this->load->view("admin/create_program", $data);
        $this->load->view("admin/footer");
    }

    public function create_program(){
        if($_POST){
            $this->load->library("form_validation");

            $this->form_validation->set_rules("program", "Program Name", "required|trim");
            $this->form_validation->set_rules("effective_year", "Effective Year", "required|trim");
            $this->form_validation->set_rules("po_num", "Program Outcome Number", "required|trim");
      
            if($this->form_validation->run() == FALSE){
                $this->index_create_program();
            }
            else{
                $data['title'] = "Admin - Create Program";
                $data['message'] = '<div class="alert alert-success" role="alert"><strong>Success!</strong></div>';

                $this->load->view("admin/header", $data);
                $this->load->view("admin/create_program", $data);
                $this->load->view("admin/footer");
            }
        }
        else{
            $this->index_create_program();
        }
    }
}