<?php
	
	class Model_role extends CI_Model {

		public function scalar($user_account, $role){

				$this->db->where('login_id', $this->input->post('idnum'));
				$this->db->select($role);                                                                                                                     

				$query = $this->db->get($user_account);
				$row = $query->row_array();
				return $row['role'];
			}
	}

?>