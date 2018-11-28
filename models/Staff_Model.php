<?php
class Staff_Model extends CI_Model 
{

	
	function dispStaffRecords()
	{
		$query=$this->db->query("select * from staffmaster order by staffName asc");
		return $query->result();
	}

	public function getStaffDataByID($staffID)
	{
		//select data from table std for corresponding sl no
		$this->db->where('staffID',$staffID);
		$query=$this->db->get('staffmaster');
		return $query->row();
	}
 
	function getNonAssignStudents($course_code,$enroll_no,$staffID,$batchID)
	{

		// $this->db->where('course_code',$course_code);
		// $this->db->like('enroll_no',$enroll_no);
		// $this->db->order_by('enroll_no', 'ASC');
		// $query = $this->db->get('student');
		//$output = '';
		// foreach ($query->result() as $row) {
		// 	$output .='<div class="ace-settings-item"><input type="checkbox" name="chkStudent[]" value="'.$row->enroll_no.'" class="ace ace-checkbox-2 ace-save-state" id="'.$row->enroll_no.'" autocomplete="off"  ><label class="lbl" for="'.$row->enroll_no.'">&nbsp;'. $row->enroll_no.'</label></div>';

		// }

		$query=$this->db->query("select enroll_no,name from student where course_code = '$course_code' and enroll_no NOT in (select enroll_no  from staffs_students where batchID = $batchID and staffID = $staffID)");
	//return $query->row();

	$output ='<b>'.$query->num_rows().'&nbsp;- Non Assigned student</b>';
	$output .= '<select multiple="multiple" class="form-control" name="nonAssignStud[]" id="duallist1">';

		foreach ($query->result() as $row) {
			$output .='<option  value="'.$row->enroll_no.'">'.$row->enroll_no .'&nbsp;- '. $row->name.'</option>';
		}

		$output .='</select>';
		return $output;
	}
	 
	 function getAssignedStudents($course_code,$enroll_no,$staffID,$batchID)
	{
		$query=$this->db->query("select enroll_no,name from student where enroll_no in(select enroll_no  from staffs_students where batchID = $batchID and staffID = $staffID) and course_code = '$course_code' ");
	//return $query->row();
		$output ='<b>'.$query->num_rows().'&nbsp;- Assigned student</b>';
		$output .= '<select multiple="multiple" class="form-control" name="assignStud[]" id="assignStud">';

		foreach ($query->result() as $row) {
			$output .='<option  value="'.$row->enroll_no.'">'.$row->enroll_no .'&nbsp;- '. $row->name.'</option>';
		}

		$output .='</select>';
		return $output;
	}
	 public function getStaffCount(){
		$query=$this->db->query("SELECT COUNT(staffID) as totalStaffCount FROM staffmaster");
		return $query->result();
	}

	public function getStaffIDByEmail($staffEmail)
	{
		$query=$this->db->query("SELECT staffID FROM staffmaster where staffEmail = '$staffEmail'");
		return $query->result();	
	}

	function can_login($userEmail, $userPassword)  
      {  
           $this->db->where('staffEmail', $userEmail);  
           $this->db->where('staffPassword', $userPassword);  
           $query = $this->db->get('staffmaster');  
          echo $query;

           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
      }

}