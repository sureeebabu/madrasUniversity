<?php
class AssignmentSummary_Model extends CI_Model 
{	
	function getAssignSummary($course_code,$batchYear,$batchName)
	{
		// $query=$this->db->query("SELECT  * FROM assignment INNER JOIN subjects ON assignment.subjectID = subjects.subjectID where assignment.course_code = '$course_code'");
$query=$this->db->query("SELECT assignment.assignmentID, assignment.dateOfAssignment,assignment.targetDate	, assignment.graceDate, assignment.course_code, assignment.subjectID,assignment.batchID,subjects.subjectTypeID, subjects.subCode, subjects.subjectName, subjects.semesterID,  subjects.credits, subjects.createdAt, subjects.updatedAt FROM assignment INNER JOIN subjects ON assignment.subjectID = subjects.subjectID INNER JOIN batchmaster ON assignment.batchID = batchmaster.batchID INNER JOIN batch_type ON batchmaster.batchType = batch_type.batchTypeID where assignment.course_code = '$course_code' and batchmaster.batchYear = '$batchYear' AND batch_type.batchName = '$batchName' ");
 		return $query->result();
	} 
	 
}