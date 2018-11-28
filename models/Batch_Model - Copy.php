<?php
class Batch_Model extends CI_Model 
{

	
	function getBatchType()
	{
		$query=$this->db->query("select * from batch_type order by batchName asc");
		return $query->result();
	}

	function getBatchDataByID($batchType)
	{
		$this->db->where('batchType',$batchType);
		$this->db->order_by('batchYear', 'ASC');
		$query = $this->db->get('batchmaster');
		$output = '<option value="" >-- Select Year --</option>';
		foreach ($query->result() as $row) {
			$output .='<option value="'.$row->batchID.'">'.$row->batchYear.'</option>';
		}
		return $output;
	}
	 
	
}