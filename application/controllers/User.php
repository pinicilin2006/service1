<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
		
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Request_data');
	}	
	
	

	public function user_message()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();
	 	$user_id = $this->ion_auth->user()->row()->id;
	 	$this->load->view('user/user_message', $data);
	}

	public function user_sms()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('user/user_sms', $data);
	}	

	public function user_request()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$user_id = $this->ion_auth->user()->row()->id;
	 	$month = now() - 2592000;
	 	$week = now() - 604800;
	 	$hour24 = now() - 86400;
	 	$hour4 = now() - 14400;
	 	$hour1 = now() - 3600;
	 	$data['all_user_request'] = $this->Request_data->count_user_request($user_id);
	 	$data['month_user_request'] = $this->Request_data->count_user_request($user_id,$month);
	 	$data['week_user_request'] = $this->Request_data->count_user_request($user_id,$week);
	 	$data['hour24_user_request'] = $this->Request_data->count_user_request($user_id,$hour24);
	 	$data['hour4_user_request'] = $this->Request_data->count_user_request($user_id,$hour4);
	 	$data['hour1_user_request'] = $this->Request_data->count_user_request($user_id,$hour1);	
		$this->load->view('user/user_request', $data);		
	}	

	public function user_payment()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('user/user_payment', $data);
	}	

}
