<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentMarksCtrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Marks_Model');
		$this->load->model('Course_Model');

		 if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}

	public function index()
	{	
		$result['semesterData']=$this->Course_Model->getSemesterRecords();
		$result['searchMode'] = "";
	    $this->load->view('student_marks_view',$result);
		 // $jsonData = $this->Marks_Model->getSubjectByEnrollNo($_SESSION['studEnrollNo']);
   //  	 $jsonData = json_encode($jsonData);
   //  	 $data = array (
   //          'data' => $jsonData
   //  	);
   //      $this->load->view('student_marks_view',$data);
	}

	public function getInternalMarksBySemID()
	{
		$result['searchMode'] = "search";
		$semesterID = $this->input->post('searchBySem');
		$studRegNo = $_SESSION['studEnrollNo'];
		$result['marksData']=$this->Marks_Model->getInternalBySemID($studRegNo,$semesterID);
		$result['semesterData']=$this->Course_Model->getSemesterRecords();
		$this->load->view('student_marks_view',$result);	
	}
	// public function getMarks($subjectID)
	// {
	// 	$marksData = $this->Marks_Model->getInternalMarks($_SESSION['studEnrollNo'],$subjectID);
 //    	$marksData = json_encode($marksData);
 //    	echo $marksData;
	// }

}