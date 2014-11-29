<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['title'] = "Admin Dashboard";

		$this->load->view("admin/header", $data);
      $this->load->view("admin/admin");
      $this->load->view("admin/footer");
	}
}