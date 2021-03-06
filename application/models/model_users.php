<?php

class Model_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function scalar($user_account, $role){
		$this->db->where('idnum', $this->input->post('idnum'));
		$this->db->select($role);                                                                                                                     

		$query = $this->db->get($user_account);
		$row = $query->row_array();
		return $row['role'];
	}

	function can_log_in($data, $pass){
        $this->load->library('encrypt');

		$query = $this->db->get_where('user_account', $data);
        if($query->num_rows() == 1) {

            $row = $query->row_array();
            $db_pass= $row['password'];

            $hashed = $this->encrypt->sha1($pass);

            if($db_pass == $hashed) {
               return true;
            }
        }
        else {
            return false;
        }
	}
	
	function select_user(){		
		$query = $this->db->query("SELECT * FROM teacher WHERE teacher_id = '".$this->session->userdata('idnum')."'");

		return $query->result_array();
	}

  
    function get_1stSemester($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 1 AND school_year = '".$year."' ");

        return $query->result_array();
    }

    function get_2ndSemester($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 2 AND school_year = '".$year."' ");

        return $query->result_array();
    }

    function get_summer($year){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' AND semester = 'summer' AND school_year = '".$year."' ");

        return $query->result_array();
    }

    function select_SY(){
        $query = $this->db->query("SELECT DISTINCT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('idnum')."' 
                                                                          GROUP BY school_year ORDER BY school_year");
        
        return $query->result();
    }

    function select_schedule($id){
        $query = $this->db->query("SELECT * FROM teacher_class WHERE ID = '".$id."' ");
        
        return $query->result();
    }

	function select_class($id){
    	$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
                                    WHERE student_course.classID = '".$id."' 
                                    GROUP BY studentID ");
		
        return $query->result_array();
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

    function select_programName($id){
        $query = $this->db->query("SELECT * FROM program_year INNER JOIN program ON program_year.programID = program.ID 
                                                              INNER JOIN po ON program_year.ID = po.pyID
                                                              INNER JOIN po_course ON po.pyID = po_course.poID
                                                              INNER JOIN student_course ON po_course.poID = student_course.poID
                                                              WHERE student_course.classID = '".$id."' 
                                                              GROUP BY program.programName");

        return $query->result(); 
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

    function insert_student($data) {
        $this->db->insert('student', $data);

        return $this->check_query();
    }

    function insert_studentAccount($data) {
        $this->db->insert('user_account', $data);

        return $this->check_query();
    }

    function get_lastId() {
        if($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        else {
            return FALSE;
        }
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

    function check_studentRecord($data){
        $query = $this->db->get_where('student', array('student_id' => $data));
        if($query->num_rows() == 1) {
            $row = $query->row_array();

            return $row['student_id'];
        }
        else
            return false;
    }

    function get_newInsertStudent($insert_id) {
        $query = $this->db->get_where('student', array('ID' => $insert_id));
        if($query->num_rows() == 1) {
            $row = $query->row_array();

            return $row['student_id'];
        }
        else
            return false;
    }

    function get_poCourse($course_id) {
        $query = $this->db->query("SELECT status, po_course.poID, po_course.courseID FROM po_course INNER JOIN course ON course.ID = po_course.courseID WHERE po_course.courseID='".$course_id."' ");

        return $query->result_array();
    }

    function get_courseID($course) {
        $query = $this->db->get_where('course', array('CourseCode' => $course));

        $row = $query->row_array();

        return $row['ID'];
    }

    function insert_grades($data, $class_id) {
        $this->db->delete('student_course', array('classID' => $class_id)); 
        $this->db->insert_on_duplicate_update_batch('student_course', $data);  
        
        return $this->check_query();
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

    function get_studentName($student_id) {
        $query = $this->db->query("SELECT student.student_id, student.fname, student.lname, 
                                        MAX(student_course.year_level) as year_level 
                                        FROM student_course 
                                        INNER JOIN student ON student_course.studentID = student.student_id
                                        WHERE student.student_id = '".$student_id."' 
                                             ");
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
                                            AND teacher_class.teacherID = '".$this->session->userdata('idnum')."'  
                                            GROUP BY classID");

        return $query->result_array();
    }

    function student_list($session_id) {
        $query = $this->db->query("SELECT student_course.studentID, student.fname, student.lname,
                                    program.programName, program_year.effective_year, teacher_class.teacherID,
                                    MAX(student_course.year_level) as year_level
                                    FROM student_course 
                                    INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                    INNER JOIN student ON student_course.studentID = student.student_id
                                    INNER JOIN po_course ON student_course.courseID = po_course.courseID
                                    INNER JOIN course ON po_course.courseID = course.ID
                                    INNER JOIN program_year ON course.pyID = program_year.ID
                                    INNER JOIN program ON program_year.programID = program.ID
                                    WHERE teacher_class.teacherID = '".$session_id."' 
                                    GROUP BY student_course.studentID");
        return $query->result();
    }

    function get_poGeneral($student_id, $classID) { 
        $query = $this->db->query("SELECT * FROM student_course 
                                            INNER JOIN po_course ON student_course.poID = po_course.poID
                                            WHERE student_course.studentID = '".$student_id."' AND student_course.classID = '".$classID."' 
                                            GROUP BY po_course.poID");
        
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

    function change_pass($data, $teacher_id) {
        $this->db->where('idnum', $teacher_id);
        $query = $this->db->update('user_account', $data);

        return $this->check_query();
    }

    function log() {
        $query = $this->db->query("SELECT student_course.date, teacher_class.group_num, teacher_class.courseCode, teacher_class.start_time, teacher_class.end_time, teacher_class.days, teacher_class.ID 
                                  FROM student_course 
                                  INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                  WHERE teacher_class.teacherID = '".$this->session->userdata('idnum')."' 
                                  GROUP BY student_course.classID ORDER BY date DESC");

        return $query->result_array();
    }

    function check_teacherClassPopulation($class_id) {
        $query = $this->db->query("SELECT classID from student_course WHERE classID = '".$class_id."' ");

        if($query->num_rows() > 0)
            return true;
        else
            return false;
    }
}
?>