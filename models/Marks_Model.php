<?php
class Marks_Model extends CI_Model 
{

	
	function getQuesDetBySubject($enroll_no,$subjectID)
	{
		// $query=$this->db->query("SELECT * FROM student_assignment WHERE (enroll_no = '$enroll_no') and subjectID = $subjectID");
$query=$this->db->query("SELECT  student_assignment.ID, student_assignment.assignmentID,student_assignment.enroll_no, student_assignment.batchID, student_assignment.course_code,student_assignment.subjectID, student_assignment.questionID, student_assignment.status,student_assignment.filename, question.question
	FROM  student_assignment INNER JOIN question ON student_assignment.questionID = question.questionID
	WHERE  (student_assignment.enroll_no = '$enroll_no') AND (student_assignment.subjectID = $subjectID)");
	return $query->result();
	} 

	function getMarks($enroll_no,$assignmentID,$staffID)
	{
		// $query=$this->db->query("SELECT * FROM marks_details WHERE (enroll_no = '$enroll_no') and assignmentID = $assignmentID and correctedStaffID = $staffID ");
$query=$this->db->query("SELECT marks_details.markDetailsID, marks_details.assignmentID, marks_details.enroll_no, marks_details.questionID, marks_details.subjectID,marks_details.correctedStaffID, marks_details.obtainedMarks, question.question
FROM  marks_details INNER JOIN question ON marks_details.questionID = question.questionID
WHERE (marks_details.enroll_no = '$enroll_no') AND (marks_details.assignmentID = $assignmentID) AND (marks_details.correctedStaffID = $staffID)");
		return $query->result();	
	}

	// function getSubjectByEnrollNo($enroll_no)
	// {
	// 	$query=$this->db->query("SELECT SUM(marks_details.obtainedMarks) AS totalMarks, marks_details.subjectID, subjects.subCode, subjects.subjectName FROM marks_details INNER JOIN subjects ON marks_details.subjectID = subjects.subjectID  where marks_details.enroll_no = '$enroll_no'
	// 		GROUP BY marks_details.subjectID, subjects.subCode, subjects.subjectName");
	// 	return json_encode($query->result());
	// }
	function getInternalBySemID($enroll_no,$semesterID)
	{
	$query=$this->db->query("SELECT     SUM(marks_details.obtainedMarks) AS totalMarks, marks_details.subjectID, subjects.subCode, subjects.subjectName FROM  marks_details INNER JOIN subjects ON marks_details.subjectID = subjects.subjectID WHERE     (marks_details.enroll_no = '$enroll_no') and subjects.semesterID = $semesterID GROUP BY marks_details.subjectID, subjects.subCode, subjects.subjectName");
		//return json_encode($query->result());
		return $query->result();
	}
	
}