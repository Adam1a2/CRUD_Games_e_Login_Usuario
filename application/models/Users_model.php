<?php 

class Users_model extends CI_Model{
    
    public function save($user)
    {
        $this->db->insert("tb_users", $user);
    }
}