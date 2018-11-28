<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StaffDashboardCtrl extends CI_Controller {

	
	public function index()
	{
		$this->load->view('staff_dashboard_view');
	}
	
}
