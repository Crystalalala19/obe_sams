<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      // Your own constructor code
   }

   public function index()
   {
      $data['title'] = "Outcome-based Education";

      $this->load->view("index/header", $data);
      $this->load->view("index/view_home");
      $this->load->view("index/footer");
   }
}