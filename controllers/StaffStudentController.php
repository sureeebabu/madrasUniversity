<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffStudentController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Staff_Model');
		$this->load->model('Course_Model');
		$this->load->model('Subject_Model');
		$this->load->model('Batch_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$data['batchTypeData']=$this->Batch_Model->getBatchType();
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$data['staffData']=$this->Staff_Model->dispStaffRecords();
		$this->load->view('add_staffstudent_view',$data);
	}

	public function getNonAssignStudent($courseCode,$enroll_no,$staffID,$batchID)
	{
		echo $this->Staff_Model->getNonAssignStudents($courseCode,$enroll_no,$staffID,$batchID);
	}
	public function getAssignStudent($courseCode,$enroll_no,$staffID,$batchID)
	{
		echo $this->Staff_Model->getAssignedStudents($courseCode,$enroll_no,$staffID,$batchID);
	}

	public function insStaffStudent(){
	 $staffID=$this->input->post('sltStaff');
	foreach ($this->input->post('assignStud') as $key => $value)
	{
		$this->db->where('staffID', $staffID);
		$this->db->where('enroll_no', $value);
		$this->db->delete('staffs_students');
	}

		// $staffID=$this->db->where('staffID',$this->input->post('sltStaff'));
		// $this->db->delete('staffs_students',$staffID);
		//foreach ($this->input->post('chkStudent') as $key => $value)
		foreach ($this->input->post('nonAssignStud') as $key => $value)
			{
				    echo $value.",";
				$insStaffStudData= array(
						'enroll_no' => $value,
						'staffID' => $this->input->post('sltStaff'),
						'batchID' => $this->input->post('sltBatchType'),
						'course_code' => $this->input->post('sltCourse'),
						'subjectID' => $this->input->post('searchBySubject'),
					);
    			$this->db->insert('staffs_students',$insStaffStudData);
			}

			$_SESSION['msg'] = "Alloted Successfully";
			redirect("StaffStudentController");
	}

	 


}