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
}