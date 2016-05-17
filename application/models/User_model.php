<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    
    public function user_messages($user_id)
    {
        $this->db->where('id_user',$user_id);
        $this->db->order_by('id_message','desc');
        $query = $this->db->get('message_to_users');
        return $query->result();
    }
    
    public function user_messages_unread($user_id)
    {
        $this->db->where('id_user',$user_id);
        $this->db->where('reading','0');
        $query = $this->db->get('message_to_users');
        return $query->result();
    }

    public function check_message_user($user_id,$uniq_id) 
    {
        $this->db->where('id_user',$user_id);
        $this->db->where('uniq_id',$uniq_id);
        $query = $this->db->get('message_to_users');
        return $query->num_rows();
    }   
}

?>
