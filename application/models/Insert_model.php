<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_model extends CI_Model{
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    public function request_insert($data)
    {
    	$this->db->insert('request', $data);
    }
    public function request_read_insert($data)
    {
    	$this->db->insert('request_read', $data);
    } 
    public function request_notes_insert($data)
    {
        $this->db->insert('request_notes', $data);
    }
    public function send_sms($data)
    {
        $this->db->insert('users_sms',$data);
    }
    public function message_to_user($data)
    {
        $this->db->insert('message_to_users',$data);
    }        

}

?>
