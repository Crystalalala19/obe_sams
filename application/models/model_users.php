<?php

class Model_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function scalar($user_account, $role){

		$this->db->where('login_id', $this->input->post('idnum'));
		$this->db->select($role);                                                                                                                     

		$query = $this->db->get($user_account);
		$row = $query->row_array();
		return $row['role'];
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
}
?>