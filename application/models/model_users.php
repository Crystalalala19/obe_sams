<?php

class Model_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function scalar($teacher, $role){

		$this->db->where('teacher_id', $this->input->post('idnum'));
		$this->db->select($role);                                                                                                                     

		$query = $this->db->get($teacher);
		$row = $query->row_array();
		return $row['role'];
	}

	public function can_log_in(){

		$this->db->where('teacher_id', $this->input->post('idnum'));
		// $this->db->where('password', $this->encrypt->encode($this->input->post('password')));
		$query = $this->db->get('teacher');

        if($query->num_rows() == 1) {
            $row = $query->row();
            $password = $row->password;

            if($this->encrypt->decode($password) == $this->input->post('password')) {
                return true;
            }
        }
        else {
            return false;
        }
	}
}
?>