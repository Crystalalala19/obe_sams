<?php

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_program($data) {
        $this->db->insert('program', $data);
    }

    function check_rows($table) {
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }
}
?>