<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_model extends CI_Model{
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    
    public function request_insert($data)
    {
    	$this->db->insert('request', $data);
    }        

    public function users_count($date)
    {
        $this->db->where('time_end >', '0');
        $this->db->where('time_end <', $date);
        $count = $this->db->count_all_results('users');
        return $count;
    }
    public function users_id($date)
    {
        $this->db->where('time_end >', '0');
        $this->db->where('time_end <', $date);
        $users = $this->db->get('users');
        return $users->result();
    }
    public function users_access_delete($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('users',$data);
    }

}

?>
