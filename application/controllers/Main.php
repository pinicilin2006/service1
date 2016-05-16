<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
		
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Request_data');
	}	
	
	public function index($id = FALSE)
	{	

		$this->load->model('Auto_data');
		$this->load->model('Detail_data');
		$this->load->model('Region_data');
		$this->load->model('User_model');			
		$this->load->library('pagination');
		if($this->ion_auth->logged_in())
		{	
			$user = $this->ion_auth->user()->row();
			$user_id = $user->id;
			$request_read = $this->Request_data->request_checked($user_id);
			if($request_read){
				foreach ($request_read->result_array() as $key => $value) {
					$data['request_read'][] = $value['id_request'];
				}
			} else {
				$data['request_read'][] = NULL;
			}
			$data['message_unread'] = $this->User_model->user_messages_unread($user_id);
		} else {
			$user_id = FALSE;
			$data['message_unread'] = FALSE;
		}	
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();
		$data['all_region'] = $this->Region_data->get_region()->result_array();
		$data['all_category'] = $this->Detail_data->get_detail_category()->result_array();
		if($this->ion_auth->in_group('limit-mark'))
		{
			$limit_mark = $this->get_user_mark();
		} else {
			$limit_mark = FALSE;
		}		
		$data['all_mark'] = $this->Auto_data->get_mark($limit_mark)->result_array();
		
		$limit = 50;
		$offset = (is_numeric($id) ? $id : 0);			
		$filter='';
		if($this->input->post('clear') && !$this->input->post('region_request[]') && !$this->input->post('mark_request[]') && !$this->input->post('category_request[]') && !$this->input->post('type_request[]') && !$this->input->post('name_search_detail') OR $id == 'all'){
			$filter='132';
		}
		if($this->input->post('region_request[]')){
			$filter['region'] = $this->input->post('region_request[]');
		}
		if($this->input->post('mark_request[]')){
			$filter['mark'] = $this->input->post('mark_request[]');
		}		
		if($this->input->post('category_request[]')){
			$filter['category'] = $this->input->post('category_request[]');
		}
		if($this->input->post('type_request')){
			$filter['type_request'] = $this->input->post('type_request');
		}
		if($this->input->post('name_search_detail')){
			$filter['name_search_detail'] = $this->input->post('name_search_detail');
		}		
		if($filter){
			$this->session->set_flashdata('filter',$filter);
		}
		if(!$filter && $this->session->flashdata('filter')){
			$filter = $this->session->flashdata('filter');
			$this->session->keep_flashdata('filter');
		}
		$request_all_count = $this->Request_data->request_count($filter,$limit_mark);			
		$config['base_url'] = base_url() . "index.php/main/index";
		$config['total_rows'] = $request_all_count;
		$config['per_page'] = $limit;
		$config['num_links'] = 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'Первая';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Последняя';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';		
		$config['cur_tag_open'] = '<li class="active"><span>';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$table_data = $this->Request_data->request_limit_to_table($limit,$offset,$filter,$limit_mark);
		$data['table_data'] = $table_data->result_array();
		$this->load->view('main_page',$data);
	}

	public function about()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->view('about_page', $data);
	}

	public function request()
	{
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();		
		$this->load->model('Auto_data');
		$this->load->model('Detail_data');
		$this->load->model('Region_data');
		$auto_mark_data = $this->Auto_data->get_mark();
		$detail_category_data = $this->Detail_data->get_detail_category();
		$region_data = $this->Region_data->get_region();
		$data['auto_mark_data'] = $auto_mark_data->result();
		$data['detail_category_data'] = $detail_category_data->result();
		$data['region_data'] = $region_data->result();
		$this->load->view('request_page', $data);
	}

	public function request_add()
	{		
		$data['all_request_count_all'] = $this->Request_data->request_count();
	 	$data['all_request_count_today'] = $this->Request_data->request_count_today();
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('name','"Имя"','regex_match[/^[a-zA-Zа-яёА-ЯЁ\s]+$/u]');
		$this->form_validation->set_rules('phone','"Телефон*"','required|regex_match[/^[0-9\-\+\(\)]+$/u]');
		$this->form_validation->set_rules('email','"Email"','valid_email');
		$this->form_validation->set_rules('region','"Ваш регион"','required|numeric');
		$this->form_validation->set_rules('city','"Ваш город"','required|numeric');
		$this->form_validation->set_rules('auto_mark','"Марка автомобиля"','required|numeric');
		$this->form_validation->set_rules('auto_model','"Модель автомобиля"','required|numeric');
		$this->form_validation->set_rules('auto_year','"Год выпуска автомобиля"','numeric');
		$this->form_validation->set_rules('detail_category','"Категория детали"','required|numeric');
		$this->form_validation->set_rules('detail_name','"Наименование детали (деталей)"','required');
		$this->form_validation->set_rules('dop_info','"Дополнительная информация"','');
		$this->form_validation->set_rules('price','"Цена детали"','');
		$this->form_validation->set_rules('urgency','"Как быстро необходимо выполнить заявку"','required|numeric');		
		if($this->form_validation->run() == FALSE)
		{
			$this->request();
		}	else {
			$this->load->model('Insert_model');
			$data_form = array(
				'name' => $this->input->post('name'), 
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'region' => $this->input->post('region'),
				'city' => $this->input->post('city'),
				'auto_mark' => $this->input->post('auto_mark'),
				'auto_model' => $this->input->post('auto_model'),
				'auto_year' => $this->input->post('auto_year'),
				'detail_category' => $this->input->post('detail_category'),
				'detail_name' => $this->input->post('detail_name'),
				'dop_info' => $this->input->post('dop_info'),
				'urgency' => $this->input->post('urgency'),
				'price' => $this->input->post('price'),
				'ip' => $this->input->ip_address(),
				'time_create' => now(),
				'active' => '1'
			);
			if($this->ion_auth->logged_in()){
				$user = $this->ion_auth->user()->row();
				$data_form['id_user'] = $user->id;
			}
			if($this->Request_data->request_in_base($data_form))
			{
				$this->load->view('request_page',$data);
			} else {
				$this->Insert_model->request_insert($data_form);
				$this->load->view('request_add_success_page',$data);
			}
		}
	}

	public function request_del($id)
	{
		if(!$this->ion_auth->in_group('admin')){
			redirect('/', 'refresh');
		} else {
			$this->Request_data->request_del($id);
			redirect('/', 'refresh');
		}
	}
	/*
	Различные вспомогательные классы
	*/
	// public function info_block()
	// {
	// 	$all_request_count_all = $this->Request_data->request_count();
	// 	$all_request_count_today = $this->Request_data->request_count_today();
	// 	$data['all_request_count_all'] = $all_request_count_all;
	// 	$data['all_request_count_today'] = $all_request_count_today;
	// 	return $data;
	// }
	/*
	Различные ajax запросы
	*/
	public function get_model($id = FALSE)
	{
		$this->load->model('Auto_data');
			$auto_model_data = $this->Auto_data->get_model($id);
		if(!$auto_model_data->num_rows()){
			$message = 'Не найдено моделей для выбранной марки автомобиля';
		} else {
			$data['auto_model_data'] = $auto_model_data->result();
			$message = $this->load->view('ajax/model_list',$data,true);
		}
		echo $message;
	}

	public function get_modification($id = FALSE)
	{
		$this->load->model('Auto_data');
		$auto_modification_data = $this->Auto_data->get_modification($id);
		if(!$auto_modification_data->num_rows()){
			//$message = 'Не найдено модификаций для выбранной марки автомобиля';
			return FALSE;
		} else {
			$data['auto_modification_data'] = $auto_modification_data->result();
			$message = $this->load->view('ajax/modification_list',$data,true);
		}
		echo $message;
	}

	public function get_detail_type($id = FALSE)
	{
		$this->load->model('Detail_data');
		$detail_type_data = $this->Detail_data->get_detail_type($id);
		if(!$detail_type_data->num_rows()){
			$message = 'Не найдено разновидностей запчастей для данной категории';
		} else {
			$data['detail_type_data'] = $detail_type_data->result();
			$message = $this->load->view('ajax/detail_type_list',$data,true);
		}
		echo $message;
	}
	
	public function get_city($id = FALSE)
	{
		$this->load->model('Region_data');
		$city_data = $this->Region_data->get_city($id);
		if(!$city_data->num_rows()){
			$message = 'Не найдено городов для этого региона';
		} else {
			$data['city_data'] = $city_data->result();
			$message = $this->load->view('ajax/city_list',$data,true);
		}
		echo $message;
	}

	public function get_request_info($id = FALSE)
	{
		$this->load->model('Insert_model');		
		if($id === FALSE)
		{
			return FALSE;
		}
		if(!$this->ion_auth->logged_in()){
			$message = $this->load->view('ajax/user_not_login','',true);
			echo $message;
			return FALSE;
		}
		if($this->ion_auth->logged_in()){
			if($this->ion_auth->in_group('limit-mark'))
			{
				$limit_mark = $this->get_user_mark();
			} else {
				$limit_mark = FALSE;
			}			
			$request_data = $this->Request_data->request_full_info($id,$limit_mark);
			if($request_data->num_rows() == 0)
			{
				$message = $this->load->view('ajax/request_info_error','',true);
				echo $message;
				return FALSE;				
			}
			$request_data = $request_data->result_array();
			if($this->ion_auth->is_admin() OR $this->ion_auth->in_group('operator') OR $this->ion_auth->in_group($request_data[0]['id_detail_category']))
			{
				$data['request_info'] = $request_data;
				$user_id = $this->ion_auth->user()->row()->id;
				$data['sms_data'] = $this->Request_data->sms_data($user_id,$id);
				if(!$this->Request_data->request_read($id,$user_id)){
					$data_read = array(
						'id_request' => $id,
						'id_user' => $user_id,
						'time_read' =>now(),
						'ip' => $this->input->ip_address()
						);
					$this->Insert_model->request_read_insert($data_read);				
				}
				if($this->Request_data->notes_in_base($user_id,$id))
				{
					$data_notes = array(
						'user_id' 		=> $user_id, 
						'request_id'	=> $id,
					);
					$notes_text = $this->Request_data->notes_text($data_notes);
					$data['notes_text'] = $notes_text->notes_text;
				} else {
					$data['notes_text'] = '';
				}
				$message = $this->load->view('ajax/request_info',$data,true);
				echo $message;
			} else {
				$message = $this->load->view('ajax/request_info_no_access','',true);
				echo $message;
			}
		}
	}

	public function insert_request_notes()			
	{
		//$a - текст примечания
        //$b - id объявления
		$a = $this->input->post('notes_text');
		$b = $this->input->post('request_id');
		if($b === FALSE || !is_numeric($b) || !$this->ion_auth->logged_in())
		{
			return FALSE;
		}
		$this->load->model('Update_model');
		$this->load->model('Insert_model');
		$user_id = $this->ion_auth->user()->row()->id;
		$data = array(
			'user_id' 		=> $user_id,
			'request_id' 	=> $b,
		);		
		if($this->Request_data->notes_in_base($user_id,$b))
		{
			//если уже было ранее добавленно какое либо замечание то мы его обновляем
			$notes_id = $this->Request_data->notes_id($data)->notes_id;
			$data = array(
				'notes_text' => $a, 
			);
			$this->Update_model->request_notes_update($notes_id,$data);
		} else {
			$data['notes_text']	= $a;
			$this->Insert_model->request_notes_insert($data);			
		}
	}

	public function get_user_mark()
	{
		$user_id = $this->ion_auth->user()->row()->id;
		$user_mark_all = $this->Request_data->get_user_mark($user_id);
		$user_mark = array();
		foreach ($user_mark_all as $key => $value) {
			$user_mark[] = $value->mark_id;
		}
		return $user_mark;
	}

	public function send_sms()
	{	
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('SMS'))
		{
			return FALSE;
		}
		if(!$this->input->post('id_request') || !is_numeric($this->input->post('id_request'))){
			$message = 'Не верный идентификатор заявки';
			echo $message;
			return FALSE;
		}
		if(!$this->Request_data->request_in_base_2($this->input->post('id_request'))){
			$message = 'Не найдена заявка с таким идентификатором';
			echo $message;
			return FALSE;
		}		
		$this->form_validation->set_rules('sms_name','"Название детали"','required');
		$this->form_validation->set_rules('sms_price','"Цена"','required|is_numeric');
		$this->form_validation->set_rules('id_request','ID заявки','required|is_numeric');
		if ($this->form_validation->run() == FALSE){
			$data['id_request'] = $this->input->post('id_request');
			$message = $this->load->view('ajax/send_sms_form',$data,true);
			echo $message;			
			return FALSE;
		}
		if($this->ion_auth->user()->row()->sms < 1 && $this->ion_auth->user()->row()->sms_paid < 1)
		{
			$message = $this->load->view('ajax/send_sms_no_limit','',true);
			echo $message;			
			return FALSE;
		}
		$sms_message = 'Имеется "'.$this->input->post('sms_name').'" цена '.$this->input->post('sms_price').'. '.$this->ion_auth->user()->row()->phone;
		$this->load->library('smsc_api');
		$this->load->model('Update_model');
		$this->load->model('Insert_model');
		$this->load->library('smsc_api');
		$request_full_info = $this->Request_data->request_full_info($this->input->post('id_request'));
		$request_full_info = $request_full_info->result_array();
		$phone_number = substr_replace(preg_replace("#[^\d]#", "", $request_full_info[0]['phone']),"7",0, 1);
		$sms_sending = $this->smsc_api->send_sms($phone_number, $sms_message, 0);
		if($sms_sending)
		{
			if($this->ion_auth->user()->row()->sms >0)
			{
				$type_sms = 'free';
				$this->Update_model->send_sms($this->ion_auth->user()->row()->id,$sms_sending[1]);
			} else {
				$type_sms = 'paid';
				$this->Update_model->send_sms_paid($this->ion_auth->user()->row()->id,$sms_sending[1]);
			}
			
			$data_sms = array(
				'time_send' 	=> now(),
				'number_phone' 	=> $phone_number,
				'text_sms' 		=> $sms_message,
				'id_request'	=> $this->input->post('id_request'),
				'id_user'		=> $this->ion_auth->user()->row()->id,
				'price'			=> $sms_sending[2],
				'type_sms'		=> $type_sms,
				'count_sms'		=> $sms_sending[1],
			);
			$this->Insert_model->send_sms($data_sms);
			$data['sms_message'] = $sms_message;
			$data['sms_count'] = $sms_sending[1];
			$message = $this->load->view('ajax/send_sms_success',$data,true);
			echo $message;
		} else {
			$message = $this->load->view('ajax/send_sms_error','',true);
			echo $message;			
		}
	}

}
