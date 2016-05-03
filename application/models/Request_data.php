<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Request_data extends CI_Model {
        
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function request_count($filter = FALSE)
        {
                if($filter){
                  if(isset($filter['region'])){
                    $this->db->where_in('region',$filter['region']);
                  }
                  if(isset($filter['mark'])){
                    $this->db->where_in('auto_mark',$filter['mark']);
                  }
                  if(isset($filter['category'])){
                    $this->db->where_in('detail_category',$filter['category']);
                  }
                  if(isset($filter['name_search_detail'])){
                    $this->db->like('detail_name',$filter['name_search_detail']);
                  }                                                      
                }          
                $query = $this->db->count_all_results('request');
                return $query;
        }

        public function request_count_today()
        {
                $period=now();
                $period=$period - 86400;
                $this->db->where('time_create >',$period);
                $query = $this->db->count_all_results('request');
                return $query;
        }
        
        public function request_limit_to_table($limit,$offset,$filter = FALSE)
        {
                /*
                SELECT
                  `region`.`name` region_name,
                  `city`.`name` city_name,
                  `car_mark`.`name` mark_name,
                  `car_model`.`name` model_name,
                  `detail_category`.`name_detail_category`,
                  `request`.`id_request`,
                  request.urgency,
                  urgency.name,
                  request.time_create,
                  request.detail_name
                FROM
                  `request`,
                  `car_mark`,
                  `car_model`,
                  `region`,
                  `city`,
                  `detail_category`,
                  `urgency`
                WHERE
                  `request`.`region` = `region`.`region_id` AND `request`.`city` = `city`.`city_id` AND request.auto_mark = car_mark.id_car_mark AND request.auto_model = car_model.id_car_model AND request.detail_category = detail_category.id_detail_category AND request.urgency = urgency.urgency_id             
                */
                $this->db->select('region.name region_name,city.name city_name,
                  car_mark.name mark_name,
                  car_model.name model_name,
                  detail_category.name_detail_category,
                  request.id_request,
                  request.urgency,
                  urgency.name,
                  request.time_create,
                  request.detail_name,
                  request.auto_year'
                  );
                // $this->db->from('request');
                if($filter){
                  if(isset($filter['region'])){
                    $this->db->where_in('region',$filter['region']);
                  }
                  if(isset($filter['mark'])){
                    $this->db->where_in('auto_mark',$filter['mark']);
                  }
                  if(isset($filter['category'])){
                    $this->db->where_in('detail_category',$filter['category']);
                  }
                  if(isset($filter['name_search_detail'])){
                    $this->db->like('detail_name',$filter['name_search_detail']);
                  }                  
                  if(isset($filter['type_request'])){
                    if($filter['type_request'] == 1){
                    }
                  }                                                       
                }
                $this->db->where('active','1');
                $this->db->join('region','request.region = region.region_id','inner');
                $this->db->join('city','request.city = city.city_id','inner');
                $this->db->join('car_mark','request.auto_mark = car_mark.id_car_mark','inner'); 
                $this->db->join('car_model','request.auto_model = car_model.id_car_model','inner');
                $this->db->join('detail_category','request.detail_category = detail_category.id_detail_category','inner');
                $this->db->join('urgency','request.urgency = urgency.urgency_id','inner');
                $this->db->order_by('request.id_request','desc');                        
                $query = $this->db->get('request',$limit,$offset);
                return $query;
        }

        public function request_full_info($id)
        {
                /*
                SELECT
                  region.name region_name,
                  city.name city_name,
                  car_mark.name mark_name,
                  car_model.name model_name,
                  detail_category.name_detail_category,
                  detail_type.name_detail_type,
                  request.id_request,
                  request.urgency,
                  urgency.name,
                  request.time_create,
                  request.detail_name,
                  request.phone,
                  request.name,
                  request.email,
                  request.auto_modification,
                  request.dop_info,
                  request.price
                FROM
                  request,
                  car_mark,
                  car_model,
                  region,
                  city,
                  detail_category,
                  detail_type,
                  urgency
                WHERE
                  request.region = region.region_id 
                  AND request.city = city.city_id 
                  AND request.auto_mark = car_mark.id_car_mark 
                  AND request.auto_model = car_model.id_car_model 
                  AND request.detail_category = detail_category.id_detail_category 
                  AND request.urgency = urgency.urgency_id             
                */
                $this->db->select('
                  region.name region_name,
                  city.name city_name,
                  car_mark.name mark_name,
                  car_model.name model_name,
                  detail_category.name_detail_category,
                  detail_category.id_detail_category,
                  request.id_request,
                  request.urgency,
                  urgency.name urgency_name,
                  request.time_create,
                  request.detail_name,
                  request.phone,
                  request.name,
                  request.email,
                  request.auto_year,
                  request.dop_info,
                  request.price'                  
                  );
                
                // $this->db->from('request');
                $this->db->where('active','1');
                $this->db->where('id_request',$id);
                $this->db->join('region','request.region = region.region_id','inner');
                $this->db->join('city','request.city = city.city_id','inner');
                $this->db->join('car_mark','request.auto_mark = car_mark.id_car_mark','inner'); 
                $this->db->join('car_model','request.auto_model = car_model.id_car_model','inner');
                $this->db->join('detail_category','request.detail_category = detail_category.id_detail_category','inner');
                $this->db->join('urgency','request.urgency = urgency.urgency_id','inner');
                $query = $this->db->get('request');
                return $query;
        }

        public function request_in_base($data)
        {
          unset($data['time_create']);
          $this->db->where($data);
          $count = $this->db->count_all_results('request');
          if($count >0){
            return TRUE;
          } else {
            return FALSE;
          }
        } 
        
        public function request_read($id,$user_id)
        {
        $data = array(
          'id_request' => $id,
          'id_user'    => $user_id
          );
          $this->db->where($data);
          $count = $this->db->count_all_results('request_read');
          if($count >0){
            return TRUE;
          } else {
            return FALSE;
          }                    
        }

        public function request_checked($user_id)
        {
          $this->db->where('id_user',$user_id);
          if($this->db->count_all_results('request_read'))
          {
            $query = $this->db->get('request_read');
            return $query;
          } else {
            return FALSE;
          }
        }

        public function request_del($id)
        {
          $this->db->where('id_request',$id);
          $this->db->delete('request');
        }

                  	
}
?>