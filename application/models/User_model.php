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
        $query = $this->db->get('message_to_users');
        return $query->result();
    }
}

?>
