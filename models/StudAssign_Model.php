<?php
class StudAssign_Model extends CI_Model 
{

	
	// function getAssignedSubjects($enroll_no)
	// {
	// 	$query=$this->db->query("SELECT  distinct  subjects.subjectName,subjects.subjectID,subjects.subCode
	// 		FROM subjects INNER JOIN student_assignment ON subjects.subjectID = student_assignment.subjectID
	// 		WHERE        (student_assignment.enroll_no = '$enroll_no')");
	// 	return $query->result();
	// }

	function getAssignedSubjects($enroll_no)
	{
	$query=$this->db->query("SELECT DISTINCT subjects.subjectName, subjects.subjectID, subjects.subCode, student_assignment.assignmentID FROM subjects INNER JOIN student_assignment ON subjects.subjectID = student_assignment.subjectID WHERE (student_assignment.enroll_no = '$enroll_no')");
		return $query->result();
	}

	function getAssignByID($enroll_no,$subjectID)
	{
		// $query=$this->db->query("SELECT distinct question.questionID, question.question,question.subjectID FROM question INNER JOIN student_assignment ON question.questionID = student_assignment.questionID WHERE (student_assignment.enroll_no = '$enroll_no') and (question.subjectID = $subjectID ) ");
$query=$this->db->query("SELECT DISTINCT question.questionID, question.question, question.subjectID, student_assignment.assignViewDate, student_assignment.assignSubmitDate FROM question INNER JOIN student_assignment ON question.questionID = student_assignment.questionID WHERE (student_assignment.enroll_no = '$enroll_no') and (question.subjectID = $subjectID ) ");
		return $query->result();
	}

	function getAssignmentID($subjectID,$enroll_no)
	{
		$query=$this->db->query("SELECT distinct assignmentID,noOfQuesAttended,noOfPages,filename,status FROM student_assignment WHERE (enroll_no = '$enroll_no') and (subjectID = $subjectID ) ");
		return $query->result();	
	}

	function chkGraceData($subjectID,$assignmentID)
	{
		$query=$this->db->query("SELECT * FROM assignment WHERE (assignmentID = $assignmentID) and (subjectID = $subjectID ) ");
		return $query->result();	
	}

}