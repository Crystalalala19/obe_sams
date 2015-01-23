<?php

class Model_users extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function scalar($teacher, $role){
		$this->db->where('teacher_id', $this->input->post('idnum'));
		$this->db->select($role);                                                                                                                     

		$query = $this->db->get($teacher);
		$row = $query->row_array();
		return $row['role'];
	}

	public function can_log_in($data, $pass){
        $this->load->library('encrypt');

		$query = $this->db->get_where('teacher', $data);
        if($query->num_rows() == 1) {

            $row = $query->row_array();
            $db_pass= $row['password'];

            $hashed = $this->encrypt->sha1($pass);

            echo $hashed;

            if($db_pass == $hashed) {
               return true;
            }
        }
        else {
            return false;
        }
	}


	
	function select_user(){		
		$query = $this->db->query("SELECT * FROM teacher WHERE teacher_id = '".$this->session->userdata('teacher_id')."'");

		return $query->result_array();
	}

	function teacher_class1(){

		$query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 1 ");

	function teacher_class(){
		$query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."'");

		return $query->result();
	}

	function teacher_class2(){

		$query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 2 ");

		return $query->result();

	}

	function teacher_class3(){

		$query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 'summer' ");

		return $query->result();

	}

	function course1(){

		$query = $this->db->query("SELECT courseCode, semester FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 1");

		return $query->result();
	}

	function course2(){

		$query = $this->db->query("SELECT  courseCode, semester FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 2");

		return $query->result();
	}

	function course3(){

		$query = $this->db->query("SELECT courseCode, semester FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."' AND semester = 'summer' ");

		return $query->result();
	}

	function select_class(){
		$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
																INNER JOIN program ON student_course.programID = program.ID
																INNER JOIN teacher_class ON student_course.classID = teacher_class.ID WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = 1");
		return $query->result();
	}

	function scorecard(){

		$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
																INNER JOIN teacher_class ON student_course.classID = teacher_class.ID WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = 1 AND student_course.studentID = 11101091");
		return $query->result();
	}

	function check_row($table, $id){
		$query = $this->db->get_where($table, array('ID' => $id));
		if($query->num_rows() > 0)
			return $query->row_array();
		else {
			return false;
		}
   }

   function student_list(){

   	$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
   															INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
   															INNER JOIN program ON student_course.programID = program.ID WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' ");
   	
   	return $query->result();

   }
}
?>