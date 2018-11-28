<?php
class Course_Model extends CI_Model 
{

	
	function dispCourseRecords()
	{
		// $query=$this->db->query("SELECT * FROM courses INNER JOIN semester ON semester.semesterID = courses.semesterID order By courses.courseName asc");
		$query=$this->db->query("SELECT * FROM courses order by courseName asc");
		return $query->result();
	}

	function getSemesterRecords()
	{
		$query=$this->db->query("select * from semester order by semesterName asc");
		return $query->result();
	}
	public function getCourseDataByID($courseID)
	{
		$this->db->where('courseID',$courseID);
		$query=$this->db->get('courses');
		return $query->row();
	}

	public function getCourseCount(){
		$query=$this->db->query("SELECT COUNT(courseID) as totalCourseCount FROM courses");
		return $query->result();
	}
}