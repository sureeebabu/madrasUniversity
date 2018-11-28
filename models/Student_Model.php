<?php  
 class Student_Model extends CI_Model  
 {  
      function can_login($userEmail, $userPassword)  
      {  
           $this->db->where('email', $userEmail);  
           $this->db->where('enroll_no', $userPassword);  
           $query = $this->db->get('student');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  

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

  function getPubAssignData($enroll_no,$status)
  {
    $query=$this->db->query("select * from student_assignment WHERE status = '$status' and enroll_no = '$enroll_no' group by subjectID");
    return $query->result();
  }

 }
      