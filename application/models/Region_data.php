<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Region_data extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function get_region()
        {
                $query = $this->db->get('region');
                return $query;
        }
        public function get_city($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('city');
                } else {
                        $query = $this->db->get_where('city', array('region_id' => $id));
                }
                return $query;
        }     	
}
?>