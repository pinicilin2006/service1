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

	public function add_request()
	{
		$this->load->view('add_request_page');
	}

}