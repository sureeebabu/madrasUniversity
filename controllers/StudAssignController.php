<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudAssignController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('StudAssign_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['qData'] = 0;
		$result['data']=$this->StudAssign_Model->getAssignedSubjects($_SESSION['studEnrollNo']);
		$result['questionData'] = 0;
		$this->load->view('student_assignment_view',$result);
	}

	public function dispAssign($subjectID,$assignID)
	{	
	$result['qData'] = 1;
	$result['data']=$this->StudAssign_Model->getAssignedSubjects($_SESSION['studEnrollNo']);
	$result['questionData']=$this->StudAssign_Model->getAssignByID($_SESSION['studEnrollNo'],$subjectID);
	$result['chkGraceData']=$this->StudAssign_Model->chkGraceData($subjectID,$assignID);

foreach ($this->StudAssign_Model->getAssignByID($_SESSION['studEnrollNo'],$subjectID) as $value) 
{
	if($value->assignViewDate == "0000-00-00 00:00:00")
	{
		    date_default_timezone_set("Asia/Kolkata");
	$data= array(
					'assignViewDate' => date("Y-m-d H:i:s"),
					'assignSubmitDate' => date("Y-m-d H:i:s", strtotime("+2 days")),
					);
						$this->db->where('enroll_no',$_SESSION['studEnrollNo']);
						$this->db->where('assignmentID',$assignID);
						$this->db->where('subjectID',$subjectID);
						$this->db->update('student_assignment',$data);	
	}
}

	$this->load->view('student_assignment_view',$result);
	}

	public function upload()
	{
		$config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 1000;
        $config['max_width'] = 1300;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('userfile'))
                {
                        
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('upload', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());

                    $this->load->view('success', $data);
                }
	}

	
}
