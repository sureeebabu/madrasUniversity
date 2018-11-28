<?php
class StaffCourse_Model extends CI_Model 
{

function getSubjectData($course_code)
	{
		$this->db->where('course_code ',$course_code );
		$this->db->order_by('subjectName', 'ASC');
		$query = $this->db->get('subjects');
		$output = '';
		foreach ($query->result() as $row) {
			
			$output .="<div class='ace-settings-item'>
			<input type='checkbox' name='chkSubjects[]' class='ace ace-checkbox-2 ace-save-state' id='$row->subjectID' autocomplete='off' value='$row->subjectID|$row->course_code' />
				<label class='lbl' for='$row->subjectID'>&nbsp;". $row->subjectName."</label>
			";
		}
		return $output;
	}
	

	function getStaffCourseByID($staffID)
	{
		$this->db->where('staffID',$staffID);
		$query=$this->db->get('staffs_courses');
		return $query->row();
	}

	function fetch_staffCourseDetailsByID($staffID)
	{
		$query=$this->db->query("SELECT subjects.subCode, subjects.subjectName, courses.courseName , courses.course_code FROM staffs_courses INNER JOIN subjects ON staffs_courses.subjectID = subjects.subjectID INNER JOIN courses ON staffs_courses.course_code = courses.course_code where staffs_courses.staffID = $staffID order by  courses.courseName ");

	    //header('Content-Type: application/json');
		return json_encode($query->result());
		//return $query->result();
	}

	
}