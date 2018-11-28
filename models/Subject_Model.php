<?php
class Subject_Model extends CI_Model 
{

	
	function dispSubjectRecords($course_code)
	{
		// $query=$this->db->query("SELECT * FROM subjects INNER JOIN subject_type ON subject_type.subjectTypeID = subjects.subjectTypeID where subjects.semesterID = ". $searchSemID);

		//echo $searchSemID;
		$query=$this->db->query("SELECT * FROM subjects INNER JOIN subject_type ON subject_type.subjectTypeID = subjects.subjectTypeID where course_code = '$course_code'");
 		return $query->result();
	}

	function searchBySem($searchSemID,$course_code)
	{
		$query=$this->db->query("SELECT * FROM subjects INNER JOIN subject_type ON subject_type.subjectTypeID = subjects.subjectTypeID where semesterID = ". $searchSemID ." and course_code ='$course_code'");
 		return $query->result();
	}

	function getCourseRecords()
	{
		$query=$this->db->query("select * from courses order by courseName asc");
		return $query->result();
	}

	function getSubjectsRecords()
	{
		$query=$this->db->query("select * from subjects order by subjectName asc");
		return $query->result();
	}

	function getSemesterRecords()
	{
		$query=$this->db->query("select * from semester order by semesterName asc");
		return $query->result();
	}

	public function getSubDataByID($subjectID)
	{
		//select data from table std for corresponding sl no

		$query=$this->db->query("SELECT * FROM subjects INNER JOIN subject_type ON subject_type.subjectTypeID = subjects.subjectTypeID where subjects.subjectID = ". $subjectID);
		// $this->db->where('subjectID',$subjectID);
		// $query=$this->db->get('subjects');
		return $query->row();
	}
}