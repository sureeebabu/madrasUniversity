<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestAlloController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Course_Model');
		$this->load->model('Subject_Model');
		$this->load->model('Batch_Model');
		$this->load->model('QuesAllocation_Model');
		if(empty($this->session->userdata("userEmail")))
		{
			redirect(site_url(),'login/index');
		}
	}
	
	public function index()
	{
		$data['batchTypeData']=$this->Batch_Model->getBatchType();
		$data['courseData']=$this->Subject_Model->getCourseRecords();
		$this->load->view('add_questAllocation_view',$data);
	}

	public function insAssignment(){

		$chkData['data'] =	$this->QuesAllocation_Model->isChkAssignAlloted($this->input->post('sltCourse'),$this->input->post('searchBySubject'),$this->input->post('sltBatch'));

		if (!empty($chkData['data'])) {
			$_SESSION['msg'] = "Assignment Already Alloted";
		}
		else
		{
			$insData= array(			
						//'targetDate' => $this->input->post('dtTargetDate'),
				'targetDate' => ($_POST['dtTargetDate']),
				'graceDate' => ($_POST['dtGraceDate']),
				'course_code' => $this->input->post('sltCourse'),
				'subjectID' =>$this->input->post('searchBySubject'),
				'batchID' =>$this->input->post('sltBatch'),
			);
			
			$this->db->insert('assignment',$insData);

			$lastAssignID = $this->db->insert_id();

$this->QuesAllocation_Model->insStudentAssignment($lastAssignID,$this->input->post('sltCourse'),$this->input->post('searchBySubject'),$this->input->post('sltBatch'));

			$_SESSION['msg'] = "Assignment Alloted";
		}

//Uncomment below 2 line  to send email
//$batchTypeFromDB = $this->getBatch($this->input->post('sltBatch'),$this->input->post('sltBatchType'));
//$this->sendEmail($this->input->post('sltCourse'),$batchTypeFromDB,$this->input->post('searchBySubject'));
//Uncomment to email
		redirect("QuestAlloController");
	}

public function sendEmail($course_code,$enroll_no,$subjectID)
{
	$this->load->library('email');
	
	 if(count($this->QuesAllocation_Model->sendEmailByCourse($course_code,$enroll_no,$subjectID))>0)
	 {
	 	foreach ($this->QuesAllocation_Model->sendEmailByCourse($course_code,$enroll_no,$subjectID) as $value) 
	 	{
	 		 $config = Array(
			  'protocol' => 'smtp',
			  'smtp_host' => 'ssl://smtp.googlemail.com',
			  'smtp_port' => 465,
			  'smtp_user' => 'xxx@gmail.com', // change it to yours
			  'smtp_pass' => 'xxx', // change it to yours
			  'mailtype' => 'html',
			  'charset' => 'iso-8859-1',
			  'wordwrap' => TRUE
			);

	 		 $message = 'Assignment is Alloted.Check Out Your Student Login for furthur details.
	 		 Subject Name = '.$value->subjectName.' Subject Code= '.$value->subCode;
	 		 //echo $message."<br>";
	 		 $this->load->library('email', $config);
 			 $this->email->set_newline("\r\n");
			 $this->email->from('xxx@gmail.com'); // change it to yours
			 $this->email->to($value->email);// change it to yours
		     $this->email->subject('Assignment');
			$this->email->message($message);
			if($this->email->send())
			{
				echo 'Email sent.';
			}
			else
			{
				show_error($this->email->print_debugger());
			}
	 	}
	 }
}

public function getBatch($batchID,$batchTypeID)
{
	$query=$this->db->query("SELECT CONCAT(SUBSTRING(batch_type.batchName,1,1),SUBSTRING(batchmaster.batchYear,3,4)) as batchType FROM batch_type INNER JOIN batchmaster ON batch_type.batchTypeID = batchmaster.batchType WHERE (batch_type.batchTypeID = $batchTypeID) AND (batchmaster.batchID = $batchID)");	
	foreach ($query->result() as $value) 
	{
		return $value->batchType;	
	}
	
}

	public function fetch_unit($subjectID,$unitID){
		echo $this->QuesAllocation_Model->getUnitsBySubUnit($subjectID,$unitID);
	}

}