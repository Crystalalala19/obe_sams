<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
    }

    public function index(){
        $data['title'] = "Admin - Dashboard";

        $this->load->view("admin/header", $data);
        $this->load->view("admin/index");
        $this->load->view("admin/footer");
    }

    public function create_program(){
        $data['title'] = "Admin - Add new Program";

        $this->load->library("form_validation");

        $this->form_validation->set_rules("program", "Program Name", "required|trim");
        $this->form_validation->set_rules("effective_year", "Effective Year", "required|trim");
        // $this->form_validation->set_rules("po_code[]", "PO Code", "required|trim");
        
        if($this->form_validation->run() == FALSE){
            $this->load->view("admin/header", $data);
            $this->load->view("admin/create_program", $data);
            $this->load->view("admin/footer");
        }
        else{
            $fields = array();

            $rows = $this->input->post('po_code');
            $attribs = $this->input->post('po_attrib');
            $descs = $this->input->post('po_desc');

            $program = array(
                'programName' => $this->input->post('program'),
                'effective_year' => $this->input->post('effective_year')
            );

            $result = $this->model_admin->insert_program($program);
            $id = $this->model_admin->get_lastId();

            foreach($rows as $key => $val){
                $fields[] = array(
                    'poCode' => $val,
                    'attribute' => $attribs[$key],
                    'description' => $descs[$key],
                    'programID' => $id
                );
            }

            $this->model_admin->insert_po($fields);

            if($result['is_success'] == TRUE){
                $this->session->set_flashdata('message', $result['message']);
                redirect(current_url());
            }
            else{
                $data['message'] = $result['message'];
            }
            
            $this->load->view("admin/header", $data);
            $this->load->view("admin/create_program", $data);
            $this->load->view("admin/footer");
        }  
    }

    public function view_programs(){
        $table = 'program';
        $data['title'] = 'Admin - View Programs';
        $data['message'] = '';
        $data['program_list'] = $this->model_admin->check_rows($table);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_programs', $data);
        $this->load->view('admin/footer');
    }

    public function add_po(){
        $this->load->library('form_validation');

        if($this->form_validation->run() == FALSE){
            $data['title'] = 'Admin - Add PO';
            $data['message'] = '';

            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_po', $data);
            $this->load->view('admin/footer');
        }
        else{
            $data['title'] = "Admin - Add PO";
            $data['message'] = '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                <strong>Success!</strong>
            </div>';

            $this->load->view('admin/header', $data);
            $this->load->view('admin/add_po', $data);
            $this->load->view('admin/footer');
        }
    }

    public function upload_students(){
        $this->load->library('csvimport');
        $this->load->library('form_validation');
       
        $data['title'] = 'Admin - Upload Students List';

        $table = 'program';
        
        $data['programs'] = $this->model_admin->check_rows($table);

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
        $this->load->library('upload', $config);

        $this->form_validation->set_rules("program", "Program List", "required|trim");

        if($this->form_validation->run() == FALSE) {
            $data['message'] = '';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/upload_students', $data);
            $this->load->view('admin/footer');
        }
        elseif(!$this->upload->do_upload()){
            $data['message'] = $this->upload->display_errors('
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>',
            '</div>');;

            $this->load->view('admin/header', $data);
            $this->load->view('admin/upload_students', $data);
            $this->load->view('admin/footer');
        }
        else{
            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                $insert_data = array();
                $csv_array = $this->csvimport->get_array($file_path);

                foreach ($csv_array as $row) {
                    if(!$this->model_admin->if_id_exists($row['student_id'])) {
                        $insert_data = array(
                            'student_id'=>$row['student_id'],
                            'lname'=>$row['lname'],
                            'fname'=>$row['fname'],
                            'mname'=>$row['mname'],
                            'programID'=> $this->input->post('program')
                        );
                    }
                    $result = $this->model_admin->insert_csv($insert_data);
                }

                if($result['is_success'] == TRUE) {
                    $this->session->set_flashdata('message', $result['message']);
                    redirect(current_url());
                }
                else {
                    $data['message'] = $result['message'];
                }
            }
            else {
                $data['message'] = 'Error occured';
            }            
                $this->load->view('admin/header', $data);
                $this->load->view('admin/upload_students', $data);
                $this->load->view('admin/footer');
        }
    }

    public function students_list(){
        $table = 'student';
        $data['title'] = 'Admin - Students List';
        $data['message'] = '';
        $data['student_list'] = $this->model_admin->check_rows($table);

        $this->load->view('admin/header', $data);
        $this->load->view('admin/view_list', $data);
        $this->load->view('admin/footer');
    }
}