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

    function select_SY(){

        $query = $this->db->query("SELECT DISTINCT teacher_class.school_year, teacher_class.teacherID FROM student_course
                                                                             INNER JOIN teacher_class ON student_course.classID = teacher_class.ID  
                                                                             WHERE teacherID = '".$this->session->userdata('teacher_id')."' ");
        
        return $query->result();

    }

    function select_schedule($id){

        $query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
                                                                INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
                                                                WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = '".$id."' 
                                                                GROUP BY classID");
        return $query->result();

    }

	function select_class($id){

		$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
																INNER JOIN program_year ON student_course.pyID = program_year.ID
																INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
                                                                WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = '".$id."' 
                                                                ");
		return $query->result();
	}

	function scorecard($id){

		$query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
																INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
                                                                WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = 1 AND student_course.studentID = '".$id."'
                                                                GROUP BY student_course.studentID, student.lname, student.fname, student.mname ");
		return $query->result();
	}

	
   function student_list(){

   	$query = $this->db->query("SELECT DISTINCT studentID, student.lname, student.mname, student.fname, program_year.effective_year FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
                                                            INNER JOIN program_year ON student_course.pyID = program_year.ID
   															INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
   															WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' ");
   	
   	return $query->result();

   }
}
?>