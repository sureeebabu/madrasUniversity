<?php  
 class Main_model extends CI_Model  
 {  
      function can_login($userEmail, $userPassword)  
      {  
           $this->db->where('userEmail', $userEmail);  
           $this->db->where('userPassword', $userPassword);
           $this->db->where('userIsActive',1);
           $query = $this->db->get('usermaster');  
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
    }
      