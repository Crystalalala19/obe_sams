<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	public function index(){
		$this->load->helper('url');
		$data['title'] = "Outcome-based Education";

		$this->load->view("header", $data);
		$this->load->view("view_home");
		$this->load->view("footer");
	}
}