<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CourseController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['data']=$this->Course_Model->dispCourseRecords();
		$this->load->view('list_course_view',$result);
	}

	public function getSemesterData()
	{
		$result['data']=$this->Course_Model->getSemesterRecords();
		$this->load->view('add_course_view',$result);
	}


	public function insertCourseData(){
		$insCourseData= array(
						'courseName' => $this->input->post('txtCourse'),
						'course_code' => $this->input->post('txtCoursecode'),
						//'branch' => $this->input->post('txtBranch'),
						//'semestercount' => $this->input->post('txtSemCount'),
						//'semesterID' =>$this->input->post('sltSemester'),
					);
					
					$this->db->insert('courses',$insCourseData);
					$_SESSION['msg'] = "Created New Course";
					redirect("CourseController/index");
	}

	public function addEditCourse(){
		$data['mode'] = "Add New " ;
		$data['semesterData']=$this->Course_Model->getSemesterRecords();
		$this->load->view('add_course_view',$data);
	}

	public function edit($courseID)
	{

		$row=$this->Course_Model->getCourseDataByID($courseID);
		$data['mode'] = "Edit";
		$data['semesterData']=$this->Course_Model->getSemesterRecords();
		$data['r']=$row;
		$data['courseID'] = $courseID;
		$this->load->view('add_course_view',$data);
	}

	public function deleteFn($courseID){
		$courseID=$this->db->where('courseID',$courseID);
		$this->db->delete('courses',$courseID);
		$_SESSION['msg'] = "Course Deleted";
		redirect("CourseController/index");
	}
	public function updateCourseData($courseID)
	{
		$data= array(
					'courseName' => $this->input->post('txtCourse'),
					'course_code' => $this->input->post('txtCoursecode'),
					'updatedAt' =>date("Y/m/d h:i:sa"),
					//'semestercount' => $this->input->post('txtSemCount'),
					//'semesterID' =>$this->input->post('sltSemester'),
					);
						$this->db->where('courseID',$courseID);
						$this->db->update('courses',$data);
						$_SESSION['msg'] = "Updated Course";
						redirect("CourseController/index");
	}
	
}


	

