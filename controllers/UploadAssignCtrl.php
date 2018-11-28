<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UploadAssignCtrl extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		$this->load->model('Staff_Model');
		$this->load->model('StudAssign_Model');
		if(empty($this->session->userdata("userEmail")))
        {
        	redirect(site_url(),'login/index');
        }
	}


	public function index($id)
	{
		$result['data']=$this->StudAssign_Model->getAssignmentID($id,$_SESSION['studEnrollNo']);
		$this->load->view('uploadAssign_view',$result);
	}


	public function uploadDoc($assignmentID)
	{
		$file_data = $this->upload_file($assignmentID);
		$_SESSION['msg'] = "Document uploaded Successfully";
		redirect("StudAssignController/index");
	}

	function upload_file($assignmentID)
	{
		echo $assignmentID;
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'doc|docx|pdf';
		//$config['encrypt_name'] = TRUE;
		$config['file_name'] = $_SESSION['studEnrollNo'] .$_FILES["uploadFile"]['name'];
		$data= array(
					'filename' => $config['file_name'],
					'noOfQuesAttended'   =>  $this->input->post('txtNoOfQuesAttend'),
					'noOfPages'   =>  $this->input->post('txtNoOfPages'),
					'status'   => 'Submitted',
					);
		$this->db->where('assignmentID',$assignmentID);
		$this->db->where('enroll_no',$_SESSION['studEnrollNo']);
		$this->db->update('student_assignment',$data);
		$this->load->library('upload',$config);
		if($this->upload->do_upload('uploadFile'))
		{
			return $this->upload->data();
		}
		else
		{
			return $this->upload->display_errors();
		}



	}
	
}
