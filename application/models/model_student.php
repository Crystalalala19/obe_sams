<?php

class Model_student extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function select_user(){     
        $query = $this->db->query("SELECT * FROM student WHERE student_id = '".$this->session->userdata('idnum')."'");

        return $query->result_array();
    }

    function get_studentName($student_id) {
        $query = $this->db->query("SELECT student.student_id, student.fname, student.lname, MAX(student_course.year_level) as year_level FROM student 
                                            INNER JOIN student_course ON student.student_id = student_course.studentID
                                            WHERE student.student_id = '".$student_id."' 
                                            GROUP BY student.student_id");
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
                                            WHERE student_course.studentID = '".$student_id."' 
                                            GROUP BY student_course.classID");

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

            if($db_pass == $hashed)
                return true;
            else
                return false;
        }
    }

    function change_pass($data, $student_id) {
        $this->db->where('idnum', $student_id);
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

    function view_po($student_id) {
        $query = $this->db->query("SELECT * FROM student_course 
                                            INNER JOIN po_course ON student_course.poID = po_course.poID
                                            INNER JOIN po ON po_course.poID = po.ID
                                            INNER JOIN program_year ON po.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE student_course.studentID = '".$student_id."'
                                            GROUP BY po.ID ");

        return $query->result_array();
    }

    function student_year($student_id) {
        $query = $this->db->query("SELECT program.programFullName, program_year.effective_year, program.programName, program_year.programID, MAX(student_course.year_level) as year_level FROM student_course 
                                            INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                            INNER JOIN course ON po_course.courseID = course.ID
                                            INNER JOIN program_year ON course.pyID = program_year.ID
                                            INNER JOIN program ON program_year.programID = program.ID
                                            WHERE student_course.studentID = '".$student_id."'
                                            GROUP BY program_year.programID ");

        return $query->result_array();
    }

    function select_teacher($student_id) {
        $query = $this->db->query("SELECT teacher.fname, teacher.lname, student_course.studentID 
                                            FROM student_course 
                                            INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                            INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
                                            WHERE studentID = '".$student_id."' 
                                            GROUP BY teacher.teacher_id ");

        return $query->result_array();
    }

    function get_courses($student_id) {
        $query = $this->db->query("SELECT * FROM student_course 
                                    INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
                                    INNER JOIN course ON teacher_class.courseCode = course.CourseCode
                                    INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
                                    WHERE student_course.studentID  = '".$student_id."' 
                                    GROUP BY teacher_class.ID 
                                    ORDER BY teacher_class.courseCode ASC");

        return $query->result_array();
    }
}
?>    