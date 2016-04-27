<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
	
	public function index()
	{	
		$data['user_data'] = $this->ion_auth->user()->row();
		$this->load->view('main_page',$data);
	}

	public function about()
	{
		$this->load->view('about_page');
	}

	public function request()
	{
		$data['message'] = '';
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
		$this->form_validation->set_error_delimiters('<div class="alert alert-warning">', '</div>');
		$this->form_validation->set_rules('name','"Имя"','regex_match[/^[a-zA-Zа-яёА-ЯЁ\s]+$/u]');
		$this->form_validation->set_rules('phone','"Телефон"','required|regex_match[/^[0-9\-\+\(\)]+$/u]');
		$this->form_validation->set_rules('email','"Email"','valid_email');
		$this->form_validation->set_rules('region','"Ваш регион"','required|numeric');
		$this->form_validation->set_rules('city','"Ваш город"','required|numeric');
		$this->form_validation->set_rules('auto_mark','"Марка автомобиля"','required|numeric');
		$this->form_validation->set_rules('auto_model','"Модель автомобиля"','required|numeric');
		$this->form_validation->set_rules('auto_modification','"Модификация автомобиля"','numeric');
		$this->form_validation->set_rules('detail_category','"Категория детали"','required|numeric');
		$this->form_validation->set_rules('detail_type','"Тип детали"','required|numeric');
		$this->form_validation->set_rules('detail_name','"Наименование детали (деталей)"','required|regex_match[/^[0-9a-zA-Zа-яёА-ЯЁ,\.\s]+$/u]');
		$this->form_validation->set_rules('dop_info','"Дополнительная информация"','');
		$this->form_validation->set_rules('urgency','"Как быстро необходимо выполнить заявку"','required|numeric');		
		if($this->form_validation->run() == FALSE)
		{
			$this->request();
		}	else {
			$this->load->model('Insert_model');
			$data = array(
				'name' => $this->input->post('name'), 
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'region' => $this->input->post('region'),
				'city' => $this->input->post('city'),
				'auto_mark' => $this->input->post('auto_mark'),
				'auto_model' => $this->input->post('auto_model'),
				'auto_modification' => $this->input->post('auto_modification'),
				'detail_category' => $this->input->post('detail_category'),
				'detail_type' => $this->input->post('detail_type'),
				'detail_name' => $this->input->post('detail_name'),
				'dop_info' => $this->input->post('dop_info'),
				'urgency' => $this->input->post('urgency'),
				'ip' => $this->input->ip_address(),
				'time_create' => now(),
				'active' => '1'
			);
			$this->Insert_model->request_insert($data);
			$this->load->view('request_add_success_page');
		}
	}

	/*
	Различные ajax запросы
	*/
	public function get_model($id = FALSE){
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

	public function get_modification($id = FALSE){
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

	public function get_detail_type($id = FALSE){
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
	
	public function get_city($id = FALSE){
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

}