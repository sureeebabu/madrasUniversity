<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('User_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['data']=$this->User_Model->displayrecords();
		$this->load->view('list_users_view',$result);
	}


	public function insertUserData(){
		$InsUserData= array(
						'userName' => $this->input->post('txtUserName'),
						'userEmail' => $this->input->post('txtUserEmail'),
						'userPassword' => $this->input->post('txtUserPassword'),
						'userMobileNo' => $this->input->post('txtUserMobNo'),
						'userIsActive' => $this->input->post('chkIsActive'),
						'userRole' =>"Admin",
						//'userRole' =>$this->input->post('ddlUserRole'),
						'userImage' =>"noImg.png",
		
					);
					//means this data insert into table name std
					$this->db->insert('usermaster',$InsUserData);
					
					$_SESSION['msg'] = "Created New User";

					redirect("UserController/index");
	}

	public function addEditUsers(){
		$data['mode'] = "Add New ";
		$this->load->view('add_users_view',$data);
	}

	public function edit($userID)
	{

		$row=$this->User_Model->getDataByID($userID);
		$data['r']=$row;
		$data['mode'] = 'Edit';
		$data['userID'] = $userID;
		$this->load->view('add_users_view',$data);
		//redirect('Student/edit');
	}

	public function deleteFn($userID){
		$userID=$this->db->where('userID',$userID);
		$this->db->delete('usermaster',$userID);
		$_SESSION['msg'] = "User Deleted Successfully";
		redirect("UserController/index");
	}

public function updateUserData($userID)
	{
		$data= array(
					'userName' => $this->input->post('txtUserName'),
					'userEmail' => $this->input->post('txtUserEmail'),
					'userMobileNo' => $this->input->post('txtUserMobNo'),
					'userIsActive' => $this->input->post('chkIsActive'),
					// 'userRole' =>$this->input->post('ddlUserRole'),
		
					);
						$this->db->where('userID',$userID);
						$this->db->update('usermaster',$data);

						$_SESSION['msg'] = "Updated User Details";
						redirect("UserController/index");
		
	}
	
}
