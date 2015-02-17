<?php

class Model_admin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // General Functions
    function notify_message($alert_type, $glyphicon, $message){
        $output = '
        <div class="alert '.$alert_type.' alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-remove"></i></button>
            <i class="'.$glyphicon.'"></i>
            '.$message.'
        </div>';

        return $output;
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

    function check_rows($table) {
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return FALSE;
        }
    }

    function check_rowID($table, $id) {
        $query = $this->db->get_where($table, array('ID' => $id));
        if($query->num_rows() > 0)
            return $query->row_array();
        else {
            return false;
        }
    }

    function get_lastId() {
        if($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        }
        else {
            return FALSE;
        }
    }

    function if_id_exists($data){
        $this->db->select('student_id');
        $query = $this->db->get_where('student', array('student_id' => $data));
        if($query->num_rows() > 0) {
            return true;
        }
        else {
            return false;
        }
    }
    // End of General Functions

    // PROGRAMS
    function insert_program($data) {
        $this->db->insert('program', $data);

        return $this->check_query();
    }

    function insert_programYear($data, $year) {
        $query = $this->db->get_where('program', $data);

        foreach($query->result_array() as $row) {
            $new = array(
                'effective_year' => $year,
                'programID' => $row['ID']
            );
        }

        $this->db->insert('program_year', $new);

        return $this->db->insert_id();
    }

    function insert_po($data) {
        $this->db->insert('po', $data);
    
        return $this->check_query();
    }

    function insert_course($data) {
        $this->db->insert('course', $data);

        return $this->check_query();
    }

    function insert_equivalents($data) {  
        $this->db->insert_batch('equivalent', $data);

        return $this->check_query();
    }

    function insert_poCourse($data) {
        $this->db->insert('po_course', $data);

        return $this->check_query();
    }

    function update_po($data) {
        $query = $this->db->insert_on_duplicate_update_batch('po', $data);

        return $this->check_query();
    }

    function update_courses($data) {
        $query = $this->db->insert_on_duplicate_update_batch('course', $data);

        return $this->check_query();
    }

    function delete_program($data) {
        $query = $this->db->delete('program', $data);

        return $this->check_query();
    }

    function delete_programYear($year, $id) {
        $this->db->query("DELETE FROM program_year WHERE effective_year = '".$year."' AND programID = '".$id."' ");

        return $this->check_query();
    }

    function get_programYears($data) {
        $query1 = $this->db->get_where('program', $data);

        foreach ($query1->result_array() as $row) {
            $new = array(
            'programID' => $row['ID']
            );

            $query2 = $this->db->query("SELECT * FROM program_year WHERE programID = '".$row['ID']."' ORDER BY effective_year asc");
        }

        return $query2->result_array();
    }

    function get_programYear($data) {
        $query = $this->db->get_where('program_year', $data);
        
        if ($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['effective_year'];
        }
        else 
            return FALSE;
    }

    function get_programFull($data) {
        $query = $this->db->get_where('program', $data);

        if($query->num_rows() > 0){
            return $query->row_array();
        }
        else
            return FALSE;
    }

    function get_programYearID($program_id, $year) {
        $query = $this->db->query("SELECT * FROM program_year WHERE programID = '".$program_id."' AND effective_year = '".$year."' ");

        if($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['ID'];
        }
        else 
            return FALSE;
    }

    function get_programID($data) {
        $query = $this->db->get_where('program', $data);

        if($query->num_rows() > 0){
            $row = $query->row_array();
            return $row['ID'];
        }
        else
            return false;
    }

    function get_courses($data) {
        $query = $this->db->get_where('course', $data);

        return $query->result_array();
    }

    function get_pos($data) {
        $query = $this->db->get_where('po', $data);

        return $query->result_array();
    }

    function check_programYear($program, $year) {
        $query = $this->db->query("SELECT programName, effective_year FROM program 
                                  INNER JOIN program_year ON program.ID = program_year.programID 
                                  WHERE programName =  '".$program."' AND effective_year = '".$year."' ");
    
        if($query->num_rows() == 1)
            return true;
        else
            return false;
    }

    function check_course($course) {
        $query = $this->db->get_where('course', array('CourseCode' => $course));

        if($query->num_rows() > 0)
            return true;
        else
            return false;
    }

    function update_checks($data) {
        $this->db->insert_on_duplicate_update_batch('po_course', $data);

        return $this->check_query();
    }

    function populate_checks() {
        $query = $this->db->query("SELECT * FROM po_course");

        return $query->result_array();
    }

    function get_po_course($courseID) {
        $this->db->where('courseID', $courseID);
        $query = $this->db->get('po_course');

        return $query->result_array();
    }

    function get_curriculum($program, $year) {
        $query = $this->db->query("SELECT * FROM program 
                                  INNER JOIN program_year ON program.ID = program_year.programID
                                  INNER JOIN po ON program_year.ID = po.pyID
                                  WHERE program.programName = '".$program."' AND program_year.effective_year = '".$year."'
                                  GROUP BY poCode;
                                  ");

        return $query->result_array();
    }

    function get_equivalents($course_id) {
        $query = $this->db->get_where('equivalent', array('courseID' => $course_id));

        return $query->result_array();
    }
    // END PROGRAM

    // STUDENT
    function insert_csv($data) {
        $this->db->insert('student', $data);

        return $this->check_query();
    }

    function update_student($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('student', $data);

        return $this->check_query();
    }
    // END STUDENT

    // TEACHER
     function get_teachers() {
        $query = $this->db->get('teacher');
        if($query->num_rows() > 0)
            return $query->result_array();
        else 
            return FALSE;
    }

    function insert_teacher($data, $data2) {
        $this->db->insert('teacher', $data);
        $this->db->insert('user_account', $data2);

        return $this->check_query();
    }

    function update_teacher($id, $data) {
        $this->db->where('ID', $id);
        $this->db->update('teacher', $data);

        return $this->check_query();
    }

    function delete_teacher($data) {
        $this->db->delete('teacher', $data);

        return $this->check_query();
    }

    function get_allTeachersClasses($year) {
        $query = $this->db->query("SELECT teacher_class.ID, teacher.teacher_id, fname, mname, lname, group_num, start_time, end_time, days, semester, school_year, courseCode FROM teacher
                                  INNER JOIN teacher_class ON teacher.teacher_id = teacher_class.teacherID WHERE school_year = '".$year."'
                                  ");

        return $query->result_array();
    }

    function get_teacherClasses($teacher_id) {
        $query = $this->db->query("SELECT DISTINCT school_year FROM teacher_class WHERE teacherID = '".$teacher_id."' ");
    
        return $query->result_array();
    }

    function get_firstSem($teacher_id, $year) {
        $query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$teacher_id."' AND school_year = '".$year."' AND semester = '1' ");

        return $query->result_array();
    }

    function get_secondSem($teacher_id, $year) {
        $query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$teacher_id."' AND school_year = '".$year."' AND semester = '2' ");

        return $query->result_array();
    }

    function get_summer($teacher_id, $year) {
        $query = $this->db->query("SELECT * FROM teacher_class WHERE teacherID = '".$teacher_id."' AND school_year = '".$year."' AND semester = 'summer' ");

        return $query->result_array();
    }

    function check_teacher($id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $id));

        if($query->num_rows() == 1)
            return true;
        else
            return false; 
    }
    
    function insert_classes($data) {
        $this->db->insert_on_duplicate_update_batch('teacher_class',$data);  
        // $this->db->insert_batch('teacher_class', $data);

        return $this->check_query();
    }

    function check_teacherClass($teacher_id) {
        $query = $this->db->get_where('teacher_class', array('teacherID' => $teacher_id));

        if($query->num_rows() > 0)
            return true;
        else
            return false; 
    }

    function select_schedule($id){
        $query = $this->db->query("SELECT * FROM teacher_class WHERE ID = '".$id."' ");
        
        return $query->result_array();
    }

    function select_class($id){
        $query = $this->db->query("SELECT * FROM student_course INNER JOIN student ON student_course.studentID = student.student_id
                                    WHERE student_course.classID = '".$id."' 
                                    GROUP BY studentID ");
        
        return $query->result_array();
    }

    function get_courseID($course) {
        $query = $this->db->get_where('course', array('CourseCode' => $course));

        $row = $query->row_array();

        return $row['ID'];
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

    function get_teacherReport() {
        $query = $this->db->query("SELECT DISTINCT school_year FROM teacher_class");
    
        return $query->result_array();
    }
    
    function activity_log() {
        $query = $this->db->query("SELECT * FROM teacher_class GROUP BY date");

        return $query->result_array();
    }

    function teacher_log() {
        $query = $this->db->query("SELECT student_course.date, teacher.fname, teacher.mname, teacher.lname, 
                                        teacher_class.group_num, teacher_class.courseCode, teacher_class.start_time,
                                        teacher_class.end_time, teacher_class.days, teacher_class.ID,
                                        teacher.teacher_id, teacher_class.school_year
                                        FROM student_course
                                        INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                                        INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
                                        GROUP BY teacher_class.ID 
                                        ORDER BY student_course.date DESC");

        return $query->result_array();
    }

    function generate_studentReport($program, $year_level, $semester, $academic_year, $po_num) {
        $custom = "SELECT *, 
                    teacher.fname as tfname, teacher.lname as tlname, teacher.mname as tmname,
                    student.fname as sfname, student.lname as slname, student.mname as smname 
                    FROM program  
                    INNER JOIN program_year ON program.ID = program_year.programID
                    INNER JOIN po ON program_year.ID = po.pyID
                    INNER JOIN po_course ON po.ID = po_course.poID 
                    INNER JOIN student_course ON po_course.poID = student_course.poID
                    INNER JOIN student ON student_course.studentID = student.student_id
                    INNER JOIN teacher_class ON student_course.classID = teacher_class.ID
                    INNER JOIN teacher ON teacher_class.teacherID = teacher.teacher_id
                    WHERE 1
        ";

        if(!empty($program)) {
            $custom .= " AND programName = '".$program."' ";
        }

        if(!empty($year_level)) {
            if($year_level != "all")
                $custom .= " AND student_course.year_level = '".$year_level."' ";
        }

        if(!empty($semester)) {
            if($semester != "all")
                $custom .= " AND semester = '".$semester."' ";
        }

        if(!empty($academic_year)) {
            $custom .= " AND school_year = '".$academic_year."' ";
        }

        if(!empty($po_num)) {
            if($po_num != "all")
                $custom .= " AND poCode LIKE '%".$po_num."' ";
        }

        $custom .= " GROUP BY studentID;";

        $query = $this->db->query($custom);

        if($query->num_rows() > 0) 
            return $query->result_array();
        else
            return false;
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
        $query = $this->db->query("SELECT student.student_id, student.fname, student.mname, student.lname, 
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

    // END TEACHER
}
?>