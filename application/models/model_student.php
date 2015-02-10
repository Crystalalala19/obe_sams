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

    function get_po_courseSC($courseID) {
        $query = $this->db->query("SELECT * FROM po_course WHERE courseID = '".$courseID."' ");
        
        return $query->result_array();
    }

    function get_po_score($class_id, $student_id){
        $query = $this->db->query("SELECT score FROM student_course
                                WHERE studentID = '".$student_id."' AND classID = '".$class_id."' ");

        return $query->result_array();
    }
    
    function get_student_POID($class_id, $student_id) {
        $query = $this->db->query("SELECT poID FROM student_course
                                WHERE studentID = '".$student_id."' AND classID = '".$class_id."' ");

        return $query->result_array();
    }


}
?>    