<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffCourseController extends CI_Controller {
	public $chk = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		$this->load->model('StaffCourse_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index($staffID)
	{
		$result['staffID'] = $staffID;
		$result['courseData']=$this->Course_Model->dispCourseRecords();
		//$result['data']=$this->StaffCourse_Model->getSubjectData();		
		$this->load->view('staff_course_view',$result);
	}

	public function fetch_subjectByCourseCode($course_code)
	{
		echo $this->StaffCourse_Model->getSubjectData($course_code);
	}

	public function fetch_staffCourseDetailsByID($staffID)
	{
		echo $this->StaffCourse_Model->fetch_staffCourseDetailsByID($staffID);
	}	

	public function insertStaffCourseData($staffID){
		
		$this->db->where('staffID',$staffID);
		$this->db->delete('staffs_courses');

		// $courseCodes = implode(",",$this->input->post('chkCourse'));
		// $subjectIDs = implode(",",$this->input->post('chkSubjects'));

		// echo $courseCodes."<br/>";
		// echo $subjectIDs ;

		 foreach ($this->input->post('chkSubjects') as $key => $value)
		 {

		 	$arrOne = explode("|",$value);
		 	//print_r($arrOne);

		 	// echo array_values($arrOne)[0];
		 	// echo array_values($arrOne)[1];
		 		$InsStaffData= array(
						'staffID' => $staffID,
						'course_code' =>array_values($arrOne)[1],
						'subjectID' =>array_values($arrOne)[0],
					);
		 		$this->db->insert('staffs_courses',$InsStaffData);
		 }
		
		$_SESSION['msg'] = "Course Assigned";
		 redirect("StaffController/index");
		
	}
	

	public function addEditStaff(){
		$data['mode'] = "Add New " ;
		$this->load->view('add_staff_view',$data);
	}

	public function edit($staffID)
	{
		$row=$this->Staff_Model->getStaffDataByID($staffID);
		$data['mode'] = "Edit";
		$data['staffID'] = $staffID;
		$data['r']=$row;
		$this->load->view('add_staff_view',$data);
		//redirect('Student/edit');
	}

	public function deleteFn($staffID){
		$staffID=$this->db->where('staffID',$staffID);
		$this->db->delete('staffmaster',$staffID);
		redirect("StaffController/index");
	}

	public function updateStaffData($staffID)
	{
		$data= array(
					'staffCode' => $this->input->post('txtStaffCode'),
					'staffName' => $this->input->post('txtStaffName'),
					'staffEmail' => $this->input->post('txtStaffEmail'),
					'staffMobNo' => $this->input->post('txtStaffMobNo'),
					'collegeName' => $this->input->post('txtCollegeName'),
					'staffAddress' =>$this->input->post('txtAddress'),		
					);
						$this->db->where('staffID',$staffID);
						$this->db->update('staffmaster',$data);
						redirect("StaffController/index");
		
	}

}
