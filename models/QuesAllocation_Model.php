<?php
class QuesAllocation_Model extends CI_Model 
{
	 function getQuesByID($subjectID,$unitID)
	{
		$this->db->where('subjectID ',$subjectID );
		$this->db->where('unitID ',$unitID );
		$this->db->order_by('subjectID', 'ASC');
		$query = $this->db->get('question');
		$output = '';
		foreach ($query->result() as $row) {
			$output .= $row->subjectID.'">'.$row->subjectName.'</option>';
		}
		return $output;
	}

	function sendEmailByCourse($course_code,$enroll_no,$subjectID)
	{
	// $query=$this->db->query("SELECT email,enroll_no FROM student WHERE course_code = '$course_code' and enroll_no like '$enroll_no%'");	
$query=$this->db->query("SELECT student.email, student.enroll_no, subjects.subjectName,subjects.subCode FROM student INNER JOIN subjects ON student.course_code = subjects.course_code
WHERE (student.course_code = '$course_code') AND (student.enroll_no LIKE '$enroll_no%') and subjects.subjectID =$subjectID");	
	return $query->result();
	}

	function isChkAssignAlloted($course_code,$subjectID,$batchID)
	{
		$this->db->where('subjectID ',$subjectID);
		$this->db->where('course_code ',$course_code);
		$this->db->where('batchID ',$batchID);
		$query = $this->db->get('assignment');
		return $query->result();
	}

	function getUnitsBySubUnit($subjectID,$unitID)
	{
		$query=$this->db->query("SELECT  count(questionID) as quesCount from question where subjectID = $subjectID and unitID = $unitID");
		//return $query->result();
		$output = '';
		foreach ($query->result() as $row) {
			$output .= $row->quesCount;
		}
		return $output;
	}

	function insStudentAssignment($assignmentID,$course_code,$subjectID,$batchID)
	{

		$query=$this->db->query("SELECT enroll_no FROM student WHERE (course_code = '$course_code')");
		$studEnrollNo = '';
		foreach ($query->result() as $row) {
			$studEnrollNo .= $row->enroll_no.',';
		}
		$myArray = explode(',', $studEnrollNo);

		//echo sizeof($myArray)-1;
		for($x=0;$x<=sizeof($myArray)-2;$x++)
		{

			$questQuery=$this->db->query("SELECT questionID FROM question WHERE course_code = '$course_code' and subjectID=$subjectID  order by rand() limit 0,4");

		$randQuestID='';
		foreach ($questQuery->result() as $row) {
				$insData= array(
						'enroll_no' => $myArray[$x],
						'assignmentID' =>$assignmentID,
						'course_code' =>$course_code,
						'subjectID' =>$subjectID,
						'batchID' =>$batchID,
						'status' =>'Assigned',						
						'questionID' =>$row->questionID,
					);
			
			$this->db->insert('student_assignment',$insData);
		}
		}

		//print_r($myQuestArray);


		// $query=$this->db->query("INSERT INTO student_assignment (questionID,enroll_no,status,subjectID,batchID,course_code,assignmentID)
		// (SELECT  question.questionID,student.enroll_no,'Assigned',$subjectID,$batchID,'$course_code',$assignmentID FROM student INNER JOIN question ON student.course_code = question.course_code where subjectID = $subjectID order by rand() LIMIT 4 )");
	}


}