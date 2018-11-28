<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('loginView');
	}
	
	public function process()
	{ 
       $this->load->library('form_validation');  
       $this->form_validation->set_rules('userEmail', 'userEmail', 'required');  
       $this->form_validation->set_rules('userPassword', 'userPassword', 'required');  
       if($this->form_validation->run())  
       {  
          if($this->input->post('sltUserType')=='Admin')
          {
            $userEmail = $this->input->post('userEmail');  
            $userPassword = $this->input->post('userPassword');  
            //model function  
            $this->load->model('main_model');  
            if($this->main_model->can_login($userEmail, $userPassword))  
            {  
                 $session_data = array(  
                      'userEmail'=>$userEmail,
                      'userType'=>'Admin',
                      'msg' => null,
                 );  
                 $this->session->set_userdata($session_data);  
                 redirect(base_url() . 'DashboardCtrl');  
            }  
            else  
            {  
                 $this->session->set_flashdata('error', 'Invalid Username and Password'); 
                 $_SESSION['loginError'] = "Invalid User Email ID or Password...!";
                  redirect(base_url() . 'login');  
            }  
          }elseif($this->input->post('sltUserType') =='Student')
          {
            $userEmail = $this->input->post('userEmail');  
            $userPassword = $this->input->post('userPassword');  
            //model function  
            $this->load->model('Student_Model');  
            if($this->Student_Model->can_login($userEmail, $userPassword))  
            {  
                 $session_data = array(  
                      'userEmail' => $userEmail,
                      'userType'=>'Student',
                      'studEnrollNo'=>$userPassword,
                      'msg' => null,
                 );  
                 $this->session->set_userdata($session_data);  
                 redirect(base_url() . 'StudentDashboardCtrl');  
            }  
            else  
            {  
                $_SESSION['loginError'] = "Invalid User Email ID or Password...!";
                 $this->session->set_flashdata('error', 'Invalid Username and Password');  
                  redirect(base_url() . 'login');  
            }
          }elseif($this->input->post('sltUserType') =='Staff')
          {
            $userEmail = $this->input->post('userEmail');  
            $userPassword = $this->input->post('userPassword');  
            //model function  
            $this->load->model('Staff_Model');  
            if($this->Staff_Model->can_login($userEmail, $userPassword))  
            {  
                 $session_data = array(  
                      'userEmail' => $userEmail,
                      'userType'=>'Staff',
                      'msg' => null,
                 );  
                 $this->session->set_userdata($session_data);  
                 //redirect(base_url() . 'index.php/login/enter');  
                 redirect(base_url() . 'StaffDashboardCtrl');  
            }  
            else  
            {  
                $_SESSION['loginError'] = "Invalid User Email ID or Password...!";
                 $this->session->set_flashdata('error', 'Invalid Username and Password');  
                  redirect(base_url() . 'login');  
            }
          }
       }  
       else  
       {  
            //false  
            $this->login();  
       }  
  }  
  function enter(){  
       if($this->session->userdata('userEmail') != '')  
       {  
        //$this->load->view('home');
        $this->load->view('loginView');
       }  
       else  
       {  
            redirect(base_url().'login');  
       }  
  }  
  function logout()  
  {  
       $this->session->unset_userdata('userEmail');  
       redirect(base_url().'login');  
  }  
}  


