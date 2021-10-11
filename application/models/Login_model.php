<?php 

class Login_model extends CI_Model{
    
    public function verify($email, $password)
    {
        $this->db->where("email", $email);
        $this->db->where("password", $password);
        $user = $this->db->get("tb_users")->row_array();
        return $user;
    }
}