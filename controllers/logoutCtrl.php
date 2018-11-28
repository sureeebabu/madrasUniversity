<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class logoutCtrl extends CI_Controller {
	public function index()
	{
      $this->session->unset_userdata('userEmail');
      $this->session->sess_destroy();
	    $this->load->view('loginView');
	}
	
	
 }  
		
	
