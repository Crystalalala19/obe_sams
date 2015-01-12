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
		//$query = $this->db->get_where('teacher',array('teacher_id=>1'));

		return $query->result_array();
	}

	function teacher_class(){

		$query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$this->session->userdata('teacher_id')."'");

		return $query->result();

	}

	function select_class(){

		$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
																INNER JOIN program ON student_course.programID = program.ID
																INNER JOIN teacher_class ON student_course.courseID = teacher_class.courseID 
																INNER JOIN scorecard ON student_course.programID = scorecard.programID WHERE student.courseID = teacher_class.teacherID = '".$this->session->userdata('teacher_id')."'");
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
}
?>