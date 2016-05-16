<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model{
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    public function request_notes_update($notes_id,$data){
    	$this->db->where('notes_id',$notes_id);
        $this->db->update('request_notes', $data); 
    }
    public function send_sms($id_user,$num)
    {
    	$this->db->where('id',$id_user);
    	$this->db->set('sms',"sms-$num",FALSE);
    	$this->db->update('users');
    }
    public function send_sms_paid($id_user,$num)
    {
        $this->db->where('id',$id_user);
        $this->db->set('sms_paid',"sms_paid-$num",FALSE);
        $this->db->update('users');
    }             

}

?>
