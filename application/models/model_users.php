<?php

class Model_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function can_log_in(){

		$this->db->where('login_id', $this->input->post('idnum'));
		$this->db->where('password', md5($this->input->post('password')));
		
		$query = $this->db->get('user_account');

		if($query->num_rows() == 1){
			return true;
		} else{
			return false;
		}
	}

	public function can_sign_in(){

		$data = array(
			'login_id' => $this->input->post('idnum'),
			'role' => $this->input->post('role'),
			'password' => md5($this->input->post('password'))
			);

		$this->db->insert('user_account', $data);

		$data1 = array(
			'login_id' => $this->input->post('idnum'),
			'password' => md5($this->input->post('password')),
			'lname' => $this->input->post('lname'),
			'mname' => $this->input->post('mname'),
			'fname' => $this->input->post('fname'),
			'courseID' => $this->input->post('courseID'),
			'email' => $this->input->post('email')
			);

		$this->db->insert('teacher', $data1);

		/*$data3 = array(
			'username' => $this->input->post('idnum'),
			'password' => md5($this->input->post('password'))
			);

		$this->db->insert('admin', $data3);*/
	}
}
?>