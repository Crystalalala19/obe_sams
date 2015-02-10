<?php

class Model_student extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_user(){     
        $query = $this->db->query("SELECT * FROM student WHERE student_id = '".$this->session->userdata('idnum')."'");

        return $query->result_array();
    }

}
?>    