<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Testtable_data extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function get_entries()
        {
                $query = $this->db->get('groups', 10);
                return $query->result();
        }        	
}
?>