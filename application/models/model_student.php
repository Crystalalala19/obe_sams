<?php

class Model_student extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_user(){     
        $query = $this->db->query("SELECT * FROM student WHERE student_id = '".$this->session->userdata('idnum')."'");

        return $query->result_array();
    }

     function get_scoreEY($student_id) {
        $query = $this->db->query("SELECT * FROM student_effectiveyear INNER JOIN program_year ON student_effectiveyear.pyID = program_year.ID
                                                        INNER JOIN program ON program_year.programID = program.ID
                                                        WHERE student_id = '".$student_id."' ");
        
        return $query->result();
    }

    function get_studentName($student_id) {
        $query = $this->db->query("SELECt * FROM student WHERE student_id = '".$student_id."' ");
        return $query->result();
    }

    function get_class($student_id) {
        $query = $this->db->query("SELECT DISTINCT semester, school_year FROM student_course 
                                    INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                    WHERE studentID = '".$student_id."' ");
        return $query->result();
    }

    function select_classSC($student_id) {
        $query = $this->db->query("SELECT * FROM student_course 
                                            INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                            WHERE studentID = '".$student_id."' 
                                            GROUP BY classID");

        return $query->result_array();
    }

    function get_poGeneral($student_id, $classID) { 
        $query = $this->db->query("SELECT * FROM student_course 
                                            INNER JOIN po_course ON student_course.poID = po_course.poID
                                            WHERE student_course.studentID = '".$student_id."' AND student_course.classID = '".$classID."' 
                                            GROUP BY po_course.poID");
        
        return $query->result_array();
    }

    function get_studentPoGrade($student_id, $class_id){
        $query = $this->db->query("SELECT score FROM student_course
                                WHERE studentID = '".$student_id."' AND classID = '".$class_id."' ");

        return $query->result_array();
    }

    function get_studentPoID($student_id, $class_id) {
        $query = $this->db->query("SELECT poID FROM student_course
                                WHERE studentID = '".$student_id."' AND classID = '".$class_id."' ");

        return $query->result_array();
    }

    function notify_message($alert_type, $glyphicon, $message){
        $output = '
        <div class="alert '.$alert_type.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-remove"></i></button>
            <i class="'.$glyphicon.'"></i>
            '.$message.'
        </div>';

        return $output;
    }

    function check_password($data, $pass) {
        $query = $this->db->get_where('user_account', array('idnum'=>$data));
        if($query->num_rows() == 1) {

            $row = $query->row_array();
            $db_pass= $row['password'];

            $hashed = $this->encrypt->sha1($pass);

            if($db_pass != $hashed)
                return true;
        }
    }

    function change_pass($data, $teacher_id) {
        $this->db->where('idnum', $teacher_id);
        $query = $this->db->update('user_account', $data);

        return $this->check_query();
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
}
?>    