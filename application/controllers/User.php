<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {
		
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Request_data');
		$this->load->model('User_model');
		$this->load->model('Update_model');
		$this->load->model('Insert_model');
	}
	

	public function user_message()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('/', 'refresh');
		}
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();
	 	$user_id = $this->ion_auth->user()->row()->id;
	 	$user_messages = $this->User_model->user_messages($user_id);
	 	$data['user_messages'] = $user_messages;
	 	foreach ($user_messages as $row) {
	 		if($row->reading == '0')
	 		{
	 			$this->Update_model->message_reading($row->id_message);
	 		}
	 	}
	 	$this->load->view('user/user_message', $data);
	}

	public function user_sms()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('/', 'refresh');
		}		
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('user/user_sms', $data);
	}	

	public function user_request()
	{
		if(!$this->ion_auth->logged_in())
		{
			redirect('/', 'refresh');
		}		
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
		if(!$this->ion_auth->logged_in())
		{
			redirect('/', 'refresh');
		}		
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('user/user_payment', $data);
	}

	public function admin_send_message()
	{
		if(!$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('user/admin_send_message_form', $data);
	}

	public function admin_send_message_add()
	{
		if(!$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();

		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		if($this->input->post('group')){
			$this->form_validation->set_rules('group[]','"Группа"','required');
		}
		if($this->input->post('users')){
			$this->form_validation->set_rules('users[]','"Пользователи"','required');
		}
		$this->form_validation->set_rules('message_name','"Тема сообщения"','required');
		$this->form_validation->set_rules('message_text','"Сообщение"','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->admin_send_message();
		}	else {
			$uniq_id = md5(uniqid(microtime()));
			$time_create = now();
			$message_data = array(
				'message_name' 	=> 	$this->input->post('message_name'),
				'message_text' 	=> 	$this->input->post('message_text'),
				'time_create'	=> 	$time_create,
				'uniq_id'		=>	$uniq_id,
				'who_add'		=>	$this->ion_auth->user()->row()->id,
			);
			if($this->input->post('group[]')){
				foreach ($this->input->post('group[]') as $group_id) {
					// echo $group_id;
					$users = $this->ion_auth->users($group_id)->result();
					foreach ($users as $user_id) {
						//echo $user_id->id;
						if(!$this->User_model->check_message_user($user_id->id,$uniq_id))
						{	
							$message_data['id_user'] = $user_id->id;
							$this->Insert_model->message_to_user($message_data);
						}
					}
				}
			}
			if($this->input->post('users'))
			{
				foreach ($this->input->post('users[]') as $user_id) {
					if(!$this->User_model->check_message_user($user_id,$uniq_id))
					{	
						$message_data['id_user'] = $user_id;
						$this->Insert_model->message_to_user($message_data);
					}					
				}
			}
			$data['message_to_user'] = $this->input->post('message_text');
			$this->load->view('user/admin_send_message_success', $data);
		}	
	}		

}
