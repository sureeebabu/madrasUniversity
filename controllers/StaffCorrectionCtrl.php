<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffCorrectionCtrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('StaffCorrection_Model');
		$this->load->model('Batch_Model');

		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$data['searchMode'] = "";
		$data['subjectData']=$this->StaffCorrection_Model->getSubjects();
		$data['batchTypeData']=$this->Batch_Model->getBatchType();
		$data['batchYearData']=$this->Batch_Model->getBatchYear();
		$this->load->view('staff_correction_view',$data);
	}

	public function getAssignBySubjectID()
	{

		$data['searchMode'] = "search";
		$subjectID = $this->input->post('searchBySubject');
		$batchType = $this->input->post('searchByBatchType');
		$batchYear = $this->input->post('searchByBatchYear');

		$data['subjectID'] = $subjectID;
$data['assignData']=$this->StaffCorrection_Model->getStudentAssignment($subjectID,$batchType,$batchYear);
		$data['batchTypeData']=$this->Batch_Model->getBatchType();
		$data['batchYearData']=$this->Batch_Model->getBatchYear();
		$data['subjectData']=$this->StaffCorrection_Model->getSubjects();
		$this->load->view('staff_correction_view',$data);
	}
	
}
