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

	function select_courseList(){

        $query = $this->db->query("SELECT * FROM student_course 
                                            INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                            WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' ");

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
		return $query->result_array();

	}

    function get_po($id){

         $query = $this->db->query("SELECT * student_course INNER JOIN po_course ON student_course.pyID = po_course.ID
                                                            WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' AND student_course.classID = '".$id."' ");   
    }


    function select_programName($id){

        $query = $this->db->query("SELECT * FROM program_year INNER JOIN program ON program_year.programID = program.ID 
                                                              INNER JOIN student_course ON program_year.ID = student_course.pyID
                                                              WHERE student_course.classID = '".$id."' 
                                                              GROUP BY program.programName");

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

   	    $query = $this->db->query("SELECT DISTINCT studentID, student.lname, student.mname, student.fname, program_year.effective_year, program.programName 
                                                            FROM student_course 
                                                            INNER JOIN student ON student_course.studentID = student.student_id
   															INNER JOIN teacher_class ON student_course.classID = teacher_class.ID 
                                                            INNER JOIN program_year ON student_course.pyID = program_year.ID
                                                            INNER JOIN program ON program_year.programID = program.ID
   															WHERE teacher_class.teacherID = '".$this->session->userdata('teacher_id')."' ");
   	
   	    return $query->result();

   }




    function notify_message($alert_type, $glyphicon, $message){
        $output = '
        <div class="alert '.$alert_type.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert"><i class="icon-remove-sign"></i> <span style="visibility:hidden"aria-hidden="true">&times;</span> </button>
            <i class="icon-exclamation-sign" aria-hidden="true"></i> 
            '.$message.'
        </div>';

        return $output;
    }

   
}
?>