<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Staff_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['data']=$this->Staff_Model->dispStaffRecords();
		$this->load->view('list_staff_view',$result);
	}


	public function insertStaffData(){
		$InsStaffData= array(
						'staffCode' => $this->input->post('txtStaffCode'),
						'staffName' => $this->input->post('txtStaffName'),
						'staffEmail' => $this->input->post('txtStaffEmail'),
						'staffMobNo' => $this->input->post('txtStaffMobNo'),
						'collegeName' => $this->input->post('txtCollegeName'),
						'staffAddress' =>$this->input->post('txtAddress'),
						'staffImage' =>'noImg.png',
					);
					//'staffImage' =>$this->input->post('staffImage'),
					//means this data insert into table name std
					$this->db->insert('staffmaster',$InsStaffData);

					$_SESSION['msg'] = "Created New Staff";
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
					'updatedAt' =>date("Y/m/d h:i:sa"),
					
					);
						$this->db->where('staffID',$staffID);
						$this->db->update('staffmaster',$data);

						$_SESSION['msg'] = "Updated Staff Details";
						redirect("StaffController/index");
		
	}

}
