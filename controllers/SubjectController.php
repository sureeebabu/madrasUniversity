<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubjectController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Subject_Model');
		$this->load->model('Course_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index($course_code)
	{
		//$searchbySemID = $this->input->post('searchBySem');
		//echo $course_code;
		$result['data']=$this->Subject_Model->dispSubjectRecords($course_code);
		$result['semesterData']=$this->Course_Model->getSemesterRecords();
		$result['course_code'] = $course_code;

		$this->load->view('list_subject_view',$result,$course_code);
	}

	public function searchBySemID($course_code)
	{
		$searchbySemID = $this->input->post('searchBySem');
		// echo "sem ID" . $searchbySemID;
		// echo "cous" . $course_code;
		// $result['selectedSemID'] = $searchbySemID;
		$result['semesterData']=$this->Course_Model->getSemesterRecords();
		 $result['data']=$this->Subject_Model->searchBySem($searchbySemID,$course_code);
		 $result['course_code'] = $course_code;
		 $this->load->view('list_subject_view',$result);
	}

	public function getCourseData()
	{
		$result['data']=$this->Subject_Model->getCourseRecords();
		$this->load->view('add_subject_view',$result);
	}

	public function getSemesterData()
	{
		$result['data']=$this->Course_Model->getSemesterRecords();
		$this->load->view('add_subject_view',$result);
	}

	public function insSubjectData(){
		$course_code =  $this->input->post('hfcourse_code');
		$insSubData= array(
						'subjectTypeID' => $this->input->post('sltSubjectType'),
						'subCode' => $this->input->post('txtSubjectCode'),
						'subjectName' => $this->input->post('txtSubjectName'),
						///'semestercount' => $this->input->post('txtSemesterCount'),
						'semesterID' => $this->input->post('sltSemester'),
						'course_code' => $this->input->post('hfcourse_code'),
						'credits' => $this->input->post('txtCredits'),
					);
		$this->db->insert('subjects',$insSubData);
		$_SESSION['msg'] = "New Subject Created";
		redirect("SubjectController/index/".$course_code);
	}

	public function addEditSubject($course_code){
		//echo $course_code;
		$data['course_code'] = $course_code;
		$data['mode'] = "Add New " ;
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$data['semesterData']=$this->Course_Model->getSemesterRecords();
		$this->load->view('add_subject_view',$data);
		
	}

	public function edit($subjectID,$course_code)
	{
		
		$row=$this->Subject_Model->getSubDataByID($subjectID);
		$data['mode'] = "Edit";
		$data['course_code'] = $course_code;
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$data['semesterData']=$this->Course_Model->getSemesterRecords();
		$data['r']=$row;
		$data['subjectID'] = $subjectID;
		//$result['courseData']=$this->Subject_Model->getCourseRecords();
		$this->load->view('add_subject_view',$data);
	}

	public function deleteFn($subjectID,$course_code){
		$subjectID=$this->db->where('subjectID',$subjectID);
		$this->db->delete('subjects',$subjectID);
		$_SESSION['msg'] = "Subject Deleted";
		redirect("SubjectController/index/".$course_code);
	}
	public function upSubjectData($subjectID)
	{
		$course_code =  $this->input->post('hfcourse_code');
		$data= array(
			'subjectTypeID' => $this->input->post('sltSubjectType'),
			'subCode' => $this->input->post('txtSubjectCode'),
			'subjectName' => $this->input->post('txtSubjectName'),
			'credits' => $this->input->post('txtCredits'),
			'semesterID' => $this->input->post('sltSemester'),
			'updatedAt' =>date("Y/m/d h:i:sa"),
		);
		$this->db->where('subjectID',$subjectID);
		$this->db->update('subjects',$data);
		$_SESSION['msg'] = "Subject Updated";
		redirect("SubjectController/index/".$course_code);
	}
	
}


	

