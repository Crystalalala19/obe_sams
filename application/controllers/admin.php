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

    public function index_add_po(){
        $data['title'] = 'Admin - Add PO';
        $data['message'] = '';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/add_po', $data);
        $this->load->view('admin/footer');
    }

    public function add_po(){
        if($_POST){
            $this->load->library('form_validation');

            if($this->form_validation->run() == FALSE){
                $this->index_add_po();
            }
            else{
                $data['title'] = "Admin - Add PO";
                $data['message'] = '<div class="alert alert-success" role="alert"><strong>Success!</strong></div>';

                $this->load->view('admin/header', $data);
                $this->load->view('admin/add_po', $data);
                $this->load->view('admin/footer');
            }
        }
        else{
            $this->index_add_po();
        }
    }

    public function index_upload_students(){
        $this->load->model('csv_model');
        $this->load->library('csvimport');
        
        $data['title'] = 'Admin - Upload Student List';
        $data['message'] = '';
        $data['programs'] = $this->csv_model->get_program();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/upload_students', $data);
        $this->load->view('admin/footer');
    }

    public function upload_students(){
        if($_POST){
            $this->load->library('form_validation');

            $this->form_validation->set_rules("program", "Program List", "required|trim");
            $this->form_validation->set_rules("userfile", "Upload CSV", "required|trim");

            if($this->form_validation->run() == FALSE){
                $this->index_upload_students();
            }
            else{
                $data['title'] = "Admin - Add PO";
                $data['message'] = '<div class="alert alert-success" role="alert"><strong>Success!</strong></div>';
                
                $this->load->view('admin/header', $data);
                $this->load->view('admin/upload_students', $data);
                $this->load->view('admin/footer');
            }
        }
        else{
            $this->index_upload_students();
        }
    }
}