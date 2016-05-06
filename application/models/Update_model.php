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

}

?>
