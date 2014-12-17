<?php

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function notify_message($message, $success){
        if($success == TRUE){
            $output = '
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
            '.$message;
        }
        else{
            $output = '
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            '.$this->db->_error_message();
        }

        $output .= '</div>';

        return $output;
    }

    function check_query($query) {
        if($query){
            $data['is_success'] = TRUE;
            $custom_message = '<strong>Success!</strong>';

            $data['message'] = $this->notify_message($custom_message, TRUE);
            return $data;
        }
        else{
            $data['is_success'] = FALSE;
            $custom_message = NULL;

            $data['message'] = $this->notify_message($custom_message, FALSE);
            return $data;
        }
    }

    function insert_program($data) {
        $query = $this->db->insert('program', $data);
        $outcome = $this->check_query($query);

        return $outcome;
    }

    function insert_po($data){
        $this->db->get_where('po', array('programID' => $this->get_lastId));
        $query = $this->db->insert_batch('po', $data);
        $outcome = $this->check_query($query);

        return $outcome;
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

    function get_lastId(){
        return $this->db->insert_id();
    }
}
?>