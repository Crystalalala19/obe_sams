<?php

class Model_coordinator extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_user(){     
        $query = $this->db->query("SELECT * FROM teacher WHERE teacher_id = '".$this->session->userdata('idnum')."'");

        return $query->result_array();
    }

    function check_password($data, $pass) {
        $query = $this->db->get_where('user_account', array('idnum'=>$data));
        if($query->num_rows() == 1) {

            $row = $query->row_array();
            $db_pass= $row['password'];

            $hashed = $this->encrypt->sha1($pass);

            if($db_pass == $hashed)
                return true;
            else
                return false;
        }
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

    function change_pass($data, $coordinator_id) {
        $this->db->where('idnum', $coordinator_id);
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

    function student_list($programName) {
        $query = $this->db->query("SELECT DISTINCT * FROM student_course 
                                                    INNER JOIN student ON student_course.studentID = student.student_id
                                                    INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                                    INNER JOIN course ON po_course.courseID = course.ID
                                                    INNER JOIN program_year ON course.pyID = program_year.ID
                                                    INNER JOIN program ON program_year.programID = program.ID
                                                    WHERE program.programName = '".$programName."'
                                                    GROUP BY student_course.studentID");
        return $query->result();
    }

    function check_program() {
        $query = $this->db->query("SELECT DISTINCT programName FROM program");

        return $query->result_array();
    }

    function select_class($id){
        $query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
                                    WHERE student_course.classID = '".$id."' 
                                    GROUP BY studentID ");
        
        return $query->result_array();
    }

    function select_schedule($id){
        $query = $this->db->query("SELECT * FROM teacher_class WHERE ID = '".$id."' ");
        
        return $query->result();
    }

    function get_courseID($course) {
        $query = $this->db->get_where('course', array('CourseCode' => $course));

        $row = $query->row_array();

        return $row['ID'];
    }

    function select_programName($id){
        $query = $this->db->query("SELECT * FROM program_year INNER JOIN program ON program_year.programID = program.ID 
                                                              INNER JOIN po ON program_year.ID = po.pyID
                                                              INNER JOIN po_course ON po.pyID = po_course.poID
                                                              INNER JOIN student_course ON po_course.poID = student_course.poID
                                                              WHERE student_course.classID = '".$id."' 
                                                              GROUP BY program.programName");

        return $query->result(); 
    }

    function get_po($id){
        $query = $this->db->query("SELECT * FROM po_course
                                            WHERE courseID = '".$id."'
                                            ");

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

    function get_1stSemester($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 1 AND school_year = '".$year."' ");

        return $query->result();
    }

    function get_2ndSemester($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 2 AND school_year = '".$year."' ");

        return $query->result();
    }

    function get_summer($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 'summer' AND school_year = '".$year."' ");

        return $query->result();
    }

    function select_SY(){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' 
                                                                          GROUP BY school_year ORDER BY school_year");
        
        return $query->result();
    }
}
?>    