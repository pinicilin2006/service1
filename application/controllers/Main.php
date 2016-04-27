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
		$this->load->model('Auto_data');
		$auto_mark_data = $this->Auto_data->get_mark();
		$data['message'] = '';
		if(!$auto_mark_data->num_rows()){
			$data['message'] = 'Не удалось получить список моделей';
		}
		$data['auto_mark_data'] = $auto_mark_data->result();
		$this->load->view('request_page', $data);
	}

	/*
	Различные ajax запросы
	*/
	public function get_model($id = FALSE){
		$this->load->model('Auto_data');
		if($id === FALSE){
			$auto_model_data = $this->Auto_data->get_model();
		} else {
			$auto_model_data = $this->Auto_data->get_model($id);
		}
		if(!$auto_model_data->num_rows()){
			$message = 'Не найдено моделей для выбранной марки автомобиля';
		} else {
			$data['auto_model_data'] = $auto_model_data->result();
			$message = $this->load->view('model_list',$data,true);
		}
		echo $message;
	}

}