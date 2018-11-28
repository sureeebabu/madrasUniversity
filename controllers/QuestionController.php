<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		$this->load->model('Subject_Model');
		$this->load->model('Question_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		//$result['data']=$this->Question_Model->disQuestRecords();
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		//$data['subjectData']=$this->Subject_Model->getSubjectsRecords();
		$data['searchMode'] = "";
		$this->load->view('list_question_view',$data);
	}

	public function fetch_subject($courseCode){
			///$courseCode = $this->input->post('searchByCourse');		
		//echo "string" .$this->input->post('searchByCourse');
			echo $this->Question_Model->getSubjectByCourseCode($courseCode);
	}

	public function insQuestData(){
		$insData= array(
						'unitID' => $this->input->post('selUnit'),
						'subjectID' => $this->input->post('selSubject'),
						'course_code' => $this->input->post('selCourse'),
						'question' =>$this->input->post('txtQuestion'),
					);
					
					$this->db->insert('question',$insData);
					$_SESSION['msg'] = "New Question Created";
					redirect("QuestionController/index");
	}

	public function searchByCourseCodeSubject()
	{

	$searchbyCourseCode = $this->input->post('searchByCourse');
	$searchbySubject = $this->input->post('searchBySubject');
	$result['data']=$this->Question_Model->searchByCourseSubject($searchbyCourseCode,$searchbySubject);

	$result['courseData']=$this->Subject_Model->getCourseRecords();
	$result['subjectData']=$this->Subject_Model->getSubjectsRecords();
		
	$result['searchMode'] = "search";
	$this->load->view('list_question_view',$result);
	}

	public function addEditQuestions(){
		$data['mode'] = "Add New " ;
		$data['unitData']=$this->Question_Model->getUnit();
		$data['subjectData']=$this->Subject_Model->getSubjectsRecords();
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$this->load->view('add_question_view',$data);
	}

	public function edit($questID)
	{
		$row=$this->Question_Model->getQuestDataByID($questID);
		$data['mode'] = "Edit";
		$data['questionID'] = $questID;
		$data['unitData']=$this->Question_Model->getUnit();
		$data['subjectData']=$this->Subject_Model->getSubjectsRecords();
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$data['r']=$row;
		 $this->load->view('add_question_view',$data);
	}

	public function deleteFn($quesID){
		$quesID=$this->db->where('questionID',$quesID);
		$this->db->delete('question',$quesID);
		$_SESSION['msg'] = "Question Deleted";
		redirect("QuestionController");
	}
	public function updateQuesData($quesID)
	{
		$data= array(
					'unitID' => $this->input->post('selUnit'),
					'subjectID' => $this->input->post('selSubject'),
					'course_code' => $this->input->post('selCourse'),
					'question' =>$this->input->post('txtQuestion'),
					);
						$this->db->where('questionID',$quesID);
						$this->db->update('question',$data);

						$_SESSION['msg'] = "Question Updated";
						redirect("QuestionController/index");
	}
	
}


	

