<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentDashboardCtrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Student_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}

	public function index()
	{
	$result['publishData']=$this->Student_Model->getPubAssignData($_SESSION['studEnrollNo'],'Published');
	$result['assignedData']=$this->Student_Model->getPubAssignData($_SESSION['studEnrollNo'],'Assigned');
	$result['submittedData']=$this->Student_Model->getPubAssignData($_SESSION['studEnrollNo'],'Submitted');
	$this->load->view('student_dashboard_view',$result);
	}


	
}
