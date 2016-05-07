<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auto_data extends CI_Model {
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        public function get_mark($user_mark = FALSE)
        {
                if($user_mark)
                {
                  $this->db->where_in('id_car_mark',$user_mark);
                }                
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
        public function get_generation($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('car_generation');
                } else {
                        $query = $this->db->get_where('car_generation', array('id_car_model' => $id));
                }
                return $query;
        }
        public function get_series($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('car_serie');
                } else {
                        $query = $this->db->get_where('car_series', array('id_car_generation' => $id));
                }
                return $query;
        }                 
        public function get_modification($id = FALSE)
        {
                if($id === FALSE){
                        $query = $this->db->get('car_modification');
                } else {
                        $query = $this->db->get_where('car_modification', array('id_car_serie' => $id));
                }
                return $query;
        }      	
}
?>