<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentSummaryController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		$this->load->model('Batch_Model');
		$this->load->model('AssignmentSummary_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['searchMode'] = "";
		$result['batchTypeData']=$this->Batch_Model->getBatchType();
		$result['batchYearData']=$this->Batch_Model->getBatchYear();
		$result['courseData']=$this->Course_Model->dispCourseRecords();
		$this->load->view('list_assignmentsummary_view',$result);
	}

	public function getAssignDetails(){
		$result['searchMode'] = "search";
		$searchByCourse = $this->input->post('searchByCourse');
		
		$batchYear = $this->input->post('searchByBatchYear');
		$batchType = $this->input->post('searchByBatchType');

$result['data']=$this->AssignmentSummary_Model->getAssignSummary($searchByCourse,$batchYear,$batchType);
		$result['courseData']=$this->Course_Model->dispCourseRecords();
		$result['batchTypeData']=$this->Batch_Model->getBatchType();
		$result['batchYearData']=$this->Batch_Model->getBatchYear();
		$this->load->view('list_assignmentsummary_view',$result);
	}
	  
	public function deleteFn($assignmentID){
		$this->db->where('assignmentID',$assignmentID);
		$this->db->delete('student_assignment');

		$this->db->where('assignmentID',$assignmentID);
		$this->db->delete('assignment');
		
		redirect("AssignmentSummaryController");
	}
}


	

