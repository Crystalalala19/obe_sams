<?php

class Model_coordinator extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_user(){     
        $query = $this->db->query("SELECT * FROM program WHERE coordinator_id = '".$this->session->userdata('idnum')."'");

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

    function student_list() {
        $query = $this->db->query("SELECT student_course.studentID, student.fname, student.lname, program.coordinator_id, 
                                        program.programName, program_year.effective_year, 
                                        MAX(student_course.year_level) as year_level
                                        FROM student_course 
                                        INNER JOIN student ON student_course.studentID = student.student_id
                                        INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                        INNER JOIN course ON po_course.courseID = course.ID
                                        INNER JOIN program_year ON course.pyID = program_year.ID
                                        INNER JOIN program ON program_year.programID = program.ID
                                        WHERE program.coordinator_id = '".$this->session->userdata('idnum')."'
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
        $query = $this->db->query("SELECT * FROM teacher_class 
                                                INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
                                                WHERE teacher_class.ID = '".$id."' ");
        
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
        $query = $this->db->query("SELECT   teacher_class.group_num, teacher_class.courseCode, teacher_class.start_time, 
                                            teacher_class.end_time, teacher_class.days, teacher.fname, teacher.lname, teacher_class.ID
                                            FROM teacher_class
                                            INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id 
                                            INNER JOIN student_course ON teacher_class.ID = student_course.classID
                                            -- INNER JOIN student ON student_course.studentID = student.student_id
                                            INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                            INNER JOIN course ON po_course.courseID = course.ID
                                            INNER JOIN program_year ON course.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE program.coordinator_id = '".$this->session->userdata('idnum')."'
                                            AND teacher_class.semester = 1 
                                            AND teacher_class.school_year = '".$year."' 
                                            GROUP BY teacher_class.courseCode ");

        return $query->result();
    }

    function get_2ndSemester($year){
        $query = $this->db->query("SELECT   teacher_class.group_num, teacher_class.courseCode, teacher_class.start_time, 
                                            teacher_class.end_time, teacher_class.days, teacher.fname, teacher.lname, teacher_class.ID
                                            FROM teacher_class
                                            INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id 
                                            INNER JOIN student_course ON teacher_class.ID = student_course.classID
                                            -- INNER JOIN student ON student_course.studentID = student.student_id
                                            INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                            INNER JOIN course ON po_course.courseID = course.ID
                                            INNER JOIN program_year ON course.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE program.coordinator_id = '".$this->session->userdata('idnum')."'
                                            AND teacher_class.semester = 2 
                                            AND teacher_class.school_year = '".$year."'
                                            GROUP BY teacher_class.courseCode ");

        return $query->result();
    }

    function get_summer($year){
        $query = $this->db->query("SELECT   teacher_class.group_num, teacher_class.courseCode, teacher_class.start_time, 
                                            teacher_class.end_time, teacher_class.days, teacher.fname, teacher.lname, teacher_class.ID
                                            FROM teacher_class
                                            INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id 
                                            INNER JOIN student_course ON teacher_class.ID = student_course.classID
                                            -- INNER JOIN student ON student_course.studentID = student.student_id
                                            INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                            INNER JOIN course ON po_course.courseID = course.ID
                                            INNER JOIN program_year ON course.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE program.coordinator_id = '".$this->session->userdata('idnum')."'
                                            AND teacher_class.semester = 'summer' 
                                            AND teacher_class.school_year = '".$year."'
                                            GROUP BY teacher_class.courseCode ");

        return $query->result();
    }

    function select_SY(){
        $query = $this->db->query("SELECT * FROM teacher_class 
                                                    INNER JOIN student_course ON teacher_class.ID = student_course.classID
                                                    INNER JOIN student ON student_course.studentID = student.student_id
                                                    INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                                    INNER JOIN course ON po_course.courseID = course.ID
                                                    INNER JOIN program_year ON course.pyID = program_year.ID
                                                    INNER JOIN program ON program_year.programID = program.ID
                                                    WHERE program.coordinator_id = '".$this->session->userdata('idnum')."' 
                                                    GROUP BY school_year ORDER BY school_year");
        
        return $query->result();
    }

    function get_studentName($student_id) {
        $query = $this->db->query("SELECT student.student_id, student.fname, student.lname, 
                                        MAX(student_course.year_level) as year_level 
                                        FROM student_course 
                                        INNER JOIN student ON student_course.studentID = student.student_id
                                        WHERE student.student_id = '".$student_id."' 
                                             ");
        return $query->result();
    }

    function get_scoreEY($student_id) {
        $query = $this->db->query("SELECT * FROM student_course
                                            INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                            INNER JOIN course ON po_course.courseID = course.ID
                                            INNER JOIN program_year ON course.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE student_course.studentID = '".$student_id."' 
                                            GROUP BY student_course.studentID ");
        
        return $query->result_array();
    }

    function get_class($student_id) {
        $query = $this->db->query("SELECT DISTINCT semester, school_year FROM student_course 
                                    INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                    WHERE studentID = '".$student_id."' ");
        return $query->result();
    }

    function select_classSC($student_id) {
        $query = $this->db->query("SELECT student_course.poID, student_course.courseID, student_course.studentID, 
                                            student_course.classID, student_course.score, student_course.year_level,
                                            student_course.date, teacher.fname, teacher.lname, teacher_class.ID,
                                            teacher_class.courseCode
                                            FROM student_course 
                                            INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                            INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
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
}
?>    