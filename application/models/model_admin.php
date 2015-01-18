<?php

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function notify_message($alert_type, $glyphicon, $message){
        $output = '
        <div class="alert '.$alert_type.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <span class="glyphicon '.$glyphicon.'" aria-hidden="true"></span>
            '.$message.'
        </div>';

        return $output;
    }

    function check_query() {
        if($this->db->affected_rows() >= 0){
            $data['is_success'] = TRUE;

            return $data;
        }
        else{
            $data['is_success'] = FALSE;
            $data['db_error'] = $this->db->_error_message();

            return $data;
        }
    }

    function show_error() {
        return $this->db->_error_message();
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

    function check_rowID($table, $id) {
        $query = $this->db->get_where($table, array('ID' => $id));
        if($query->num_rows() > 0)
            return $query->row_array();
        else {
            return false;
        }
    }

    function get_lastId() {
        if($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        else {
            return FALSE;
        }
    }

    function if_id_exists($data){
        $this->db->select('student_id');
        $query = $this->db->get_where('student', array('student_id' => $data));
        if($query->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // PROGRAMS
    function insert_program($data) {
        $this->db->insert('program', $data);

        return $this->check_query();
    }

    function insert_programYear($data, $year) {
        $query = $this->db->get_where('program', $data);

        foreach($query->result_array() as $row) {
            $new = array(
                'effective_year' => $year,
                'programID' => $row['ID']
            );
        }

        $this->db->insert('program_year', $new);

        return $row['ID'];
    }

    function insert_po($data) {
        $this->db->insert_batch('po', $data);
    
        return $this->check_query();
    }

    function insert_course($data) {
        $this->db->insert('course', $data);

        return $this->check_query();
    }

    function insert_equivalents($data) {  
        $this->db->insert_batch('equivalent', $data);

        return $this->check_query();
    }

    function delete_program($data) {
        $query = $this->db->delete('program', $data);

        return $this->check_query();
    }

    function get_programYears($data) {
        $query1 = $this->db->get_where('program', $data);

        foreach ($query1->result_array() as $row) {
            $new = array(
            'programID' => $row['ID']
            );

            $query2 = $this->db->query("SELECT * FROM program_year WHERE programID = '".$row['ID']."' ORDER BY effective_year asc");
        }

        return $query2->result_array();
    }

    function get_year($data) {
        $query = $this->db->get_where('program_year', $data);
        
        if ($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['effective_year'];
        }
        else {
            return FALSE;
        }
    }

    function get_program($data) {
        $query = $this->db->get_where('program', $data);

        if($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['programName'];
        }
        else {
            return FALSE;
        }
    }

    // END PROGRAM

    // STUDENT
    function insert_csv($data) {
        $this->db->insert('student', $data);

        return $this->check_query();
    }

    function update_student($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('student', $data);

        return $this->check_query();
    }
    // END STUDENT

    // TEACHER
     function get_teachers() {
        $query = $this->db->get_where('teacher', array('role' => 'teacher'));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }

    function insert_teacher($data) {
        $this->db->insert('teacher', $data);

        return $this->check_query();
    }

    function update_teacher($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('teacher', $data);

        return $this->check_query();
    }

    function delete_teacher($data) {
        $query = $this->db->delete('teacher', $data);

        return $this->check_query();
    }
    // END TEACHER

    function insert_classes($data) {
        $this->db->insert('teacher_class', $data);

        return $this->check_query();
    }
}
?>