<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MarksCtrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Marks_Model');
		$this->load->model('Staff_Model');
		$this->load->model('StudAssign_Model');

		 if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}


	public function index($enroll_no,$subjectID)
	{		
		

		$getAssignIDFromDB = $this->StudAssign_Model->getAssignmentID($subjectID,$enroll_no);
		foreach($getAssignIDFromDB as $row)
		{
			$assignIDDB = $row->assignmentID;	
		}
		foreach($this->Staff_Model->getStaffIDByEmail($_SESSION['userEmail']) as $row)
		{
			$staffIDDB = $row->staffID;	
		}

		$data['marksData'] = $this->Marks_Model->getMarks($enroll_no,$assignIDDB,$staffIDDB);


		if(count($data['marksData'])>0)
		{
			$data['mode'] = "marks";
			$data['marksData'] = $this->Marks_Model->getMarks($enroll_no,$assignIDDB,$staffIDDB);
		}
		else
		{
			$data['mode'] = "question";
			$data['questionData']=$this->Marks_Model->getQuesDetBySubject($enroll_no,$subjectID);	
		}

		$this->load->view('marks_view',$data);
	}

	function insInternalMarks($enroll_no,$subjectID)
	{
		foreach($this->Staff_Model->getStaffIDByEmail($_SESSION['userEmail']) as $row)
		{
			$staffIDFromDB = $row->staffID;	
		}
		
		$getAssignID = $this->StudAssign_Model->getAssignmentID($subjectID,$enroll_no);
		foreach($getAssignID as $row)
		{
			$assignIDFromDB = $row->assignmentID;	
		}
		
		$this->db->where('enroll_no',$enroll_no);
		$this->db->where('assignmentID',$assignIDFromDB);
		$this->db->where('correctedStaffID',$staffIDFromDB);
		$this->db->delete('marks_details');

		$grandTotal = $_POST['txtMarks'];



		foreach ($this->input->post('txtMarks') as $key => $value)
			 {
					$insMarksData= array(
						'enroll_no' => $enroll_no,
						'assignmentID' =>$assignIDFromDB,
						'subjectID' =>$subjectID,
						'questionID' =>  $_POST['hfQuestionID'][$key],
						'correctedStaffID' 	=> $staffIDFromDB,
						'obtainedMarks' =>$value,
						'totalInternalMarks' =>array_sum($grandTotal),
					);
     			$this->db->insert('marks_details',$insMarksData);
			 }

			$this->upStudMarkStatus($enroll_no,$subjectID);

			 redirect("StaffCorrectionCtrl/");
	}

	public function upStudMarkStatus($enroll_no,$subjectID)
	{
		$data= array(
					'status' => "Published",					
					);
						$this->db->where('enroll_no',$enroll_no);
						$this->db->where('subjectID',$subjectID);
						$this->db->update('student_assignment',$data);
		
	}
	
}

