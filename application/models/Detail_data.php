<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail_data extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function get_detail_category()
        {
                $query = $this->db->get('detail_category');
                return $query;
        }
        public function get_detail_type($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('detail_type');
                } else {
                        $query = $this->db->get_where('detail_type', array('id_detail_category' => $id));
                }
                return $query;
        }     	
}
?>