<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_model extends CI_Model{
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    public function request_insert($data){
    	$this->db->insert('request', $data);
    }

}

?>
