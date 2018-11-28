<?php
class StaffCorrection_Model extends CI_Model 
{

	
	function getSubjects()
	{
		$userEmail = $_SESSION['userEmail'];
		$query=$this->db->query("SELECT staffs_courses.subjectID,subjects.subjectName FROM staffmaster INNER JOIN staffs_courses ON staffmaster.staffID = staffs_courses.staffId INNER JOIN subjects ON staffs_courses.subjectID = subjects.subjectID WHERE staffmaster.staffEmail = '$userEmail'");
		return $query->result();
	}

	function getStudentAssignment($subjectID,$batchType,$batchYear)
	{
		$userEmail = $_SESSION['userEmail'];
		// $query=$this->db->query("SELECT DISTINCT staffs_students.enroll_no, student_assignment.status, student_assignment.filename, student.name FROM staffs_students INNER JOIN student_assignment ON staffs_students.enroll_no = student_assignment.enroll_no INNER JOIN staffmaster ON staffs_students.staffID = staffmaster.staffID INNER JOIN student ON student_assignment.enroll_no = student.enroll_no WHERE
		//      (staffmaster.staffEmail = '$userEmail') AND (student_assignment.subjectID = $subjectID)");
		// $query=$this->db->query("SELECT DISTINCT staffs_students.enroll_no, student_assignment.status, student_assignment.filename, student.name,student_assignment.noOfPages,student_assignment.noOfQuesAttended FROM staffs_students INNER JOIN student_assignment ON staffs_students.enroll_no = student_assignment.enroll_no INNER JOIN staffmaster ON staffs_students.staffID = staffmaster.staffID INNER JOIN student ON student_assignment.enroll_no = student.enroll_no WHERE
		//      (staffmaster.staffEmail = '$userEmail') AND (student_assignment.subjectID = $subjectID)");

		$query=$this->db->query("SELECT DISTINCT  staffs_students.enroll_no, student_assignment.status, student_assignment.filename, student.name, student_assignment.noOfPages, 
student_assignment.noOfQuesAttended FROM staffs_students INNER JOIN student_assignment ON staffs_students.enroll_no = student_assignment.enroll_no INNER JOIN staffmaster ON staffs_students.staffID = staffmaster.staffID INNER JOIN student ON student_assignment.enroll_no = student.enroll_no INNER JOIN
batchmaster ON staffs_students.batchID = batchmaster.batchID INNER JOIN batch_type ON batchmaster.batchType= batch_type.batchTypeID
WHERE     (batchmaster.batchYear = '$batchYear') AND (batch_type.batchName = '$batchType') AND (staffmaster.staffEmail = '$userEmail') AND 
(student_assignment.subjectID = $subjectID)");

		return $query->result();
	}
}