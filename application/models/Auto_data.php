<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auto_data extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function get_mark()
        {
                $query = $this->db->get('car_mark');
                return $query;
        }
        public function get_model($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('car_model');
                } else {
                        $query = $this->db->get_where('car_model', array('id_car_mark' => $id));
                }
                return $query;
        }      	
}
?>