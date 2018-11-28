<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BatchController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('Batch_Model');
		if(empty($this->session->userdata("userEmail")))
         {
         	redirect(site_url(),'login/index');
         }
	}
	
	public function index()
	{
		$result['data']=$this->Batch_Model->getListOfBatch();
		$this->load->view('list_batch_view',$result);
	}

	public function getBatchTypeData()
	{
		$data['batchData']=$this->Batch_Model->getBatchType();
		$this->load->view('add_batch_view',$data);
	}
	public function addEditBatch(){
		$data['mode'] = "Add New " ;
		$data['batchData']=$this->Batch_Model->getBatchType();
		$this->load->view('add_batch_view',$data);
	}

	public function insBatchData(){
		$insData= array(
						'batchType' => $this->input->post('sltBatchType'),
						'batchYear' => $this->input->post('txtBatchYear'),
					);
					
					$this->db->insert('batchmaster',$insData);
					$_SESSION['msg'] = "Created New Batch";
					redirect("BatchController");
	}

	public function upBatch($batchID)
	{
		$data= array(
					'batchType' => $this->input->post('sltBatchType'),
					'batchYear' => $this->input->post('txtBatchYear'),
					'updatedAt' =>date("Y/m/d h:i:sa"),
					);
						$this->db->where('batchID',$batchID);
						$this->db->update('batchmaster',$data);
						$_SESSION['msg'] = "Updated Batch";
						redirect("BatchController");
	}

	function edit($batchID,$batchTypeID)
	{
		
		$data['mode'] = "Edit";
		$data['batchData']=$this->Batch_Model->getBatchType();
		$data['r']=$this->Batch_Model->getDataByID($batchID);
		$data['batchID'] = $batchID;
		$this->load->view('add_batch_view',$data);

	}

	public function deleteFn($batchID){
		$batchID=$this->db->where('batchID',$batchID);
		$this->db->delete('batchmaster',$batchID);
		$_SESSION['msg'] = "Batch Deleted";
		redirect("BatchController");
	}

	public function fetch_Batch($batchID){
			echo $this->Batch_Model->getBatchDataByID($batchID);
	}

}
