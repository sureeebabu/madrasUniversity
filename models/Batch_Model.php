<?php
class Batch_Model extends CI_Model 
{

	function getListOfBatch()
	{
		$query=$this->db->query("SELECT batch_type.batchName, batchmaster.batchYear, batch_type.batchTypeID, batchmaster.batchID FROM batch_type INNER JOIN batchmaster ON batch_type.batchTypeID = batchmaster.batchType order by  batchmaster.batchYear desc");
		return $query->result();
	}
	
	function getDataByID($batchID)
	{
		$this->db->where('batchID',$batchID);
		$query=$this->db->get('batchmaster');
		return $query->row();
	}

	function getBatchTypeDataByID($batchTypeID)
	{
		$query=$this->db->query("select * from batch_type where batchTypeID = $batchTypeID");
		return $query->result();
	}

	function getBatchType()
	{
		$query=$this->db->query("select * from batch_type order by batchName asc");
		return $query->result();
	}

	function getBatchYear()
	{
		$query=$this->db->query("select DISTINCT batchYear from batchmaster order by batchYear desc");
		return $query->result();
	}

	function getBatchDataByID($batchType)
	{
		$this->db->where('batchType',$batchType);
		$this->db->order_by('batchYear', 'Desc');
		$query = $this->db->get('batchmaster');
		$output = '<option value="" >-- Select Year --</option>';
		foreach ($query->result() as $row) {
			$output .='<option value="'.$row->batchID.'">'.$row->batchYear.'</option>';
		}
		return $output;
	}
	 
	
}