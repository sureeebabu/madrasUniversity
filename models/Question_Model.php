<?php
class Question_Model extends CI_Model 
{

	
	function disQuestRecords()
	{
		$query=$this->db->query("SELECT * FROM unit INNER JOIN question ON unit.unitID = question.unitID order by questionID desc");
		return $query->result();
	}

	function getSubjectByCourseCode($course_code)
	{
		$this->db->where('course_code',$course_code);
		$this->db->order_by('subjectName', 'ASC');
		$query = $this->db->get('subjects');
		$output = '<option value="" >--Select Subject--</option>';
		foreach ($query->result() as $row) {
			$output .='<option value="'.$row->subjectID.'">'.$row->subjectName.'</option>';
		}
		return $output;
	}

	function searchByCourseSubject($course_code,$subjectID)
	{
		$query=$this->db->query("SELECT * FROM unit INNER JOIN question ON unit.unitID = question.unitID where course_code = '$course_code' and subjectID = $subjectID  order by unit.unitID asc");
		return $query->result();
	}

	function getUnit()
	{
		$query=$this->db->query("select * from unit order by unitName asc");
		return $query->result();
	}

	public function getQuestDataByID($questionID)
	{
		//select data from table std for corresponding sl no
		$this->db->where('questionID',$questionID);
		$query=$this->db->get('question');
		return $query->row();
	}
}