<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tools extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('Tools_model');
		$this->load->model('Insert_model');
	}

	public function delete_access()
	{	
		$date = now();
		$group = array('21','22','23','24','25','26');//id групп, а не имена групп
		if(!$this->input->is_cli_request() || !$this->Tools_model->users_count($date))
		{
			return FALSE;
		}
		$data = array(
			'time_end' => 0, 
		);
		$message = array(
			'message_text' => 'Истёк период полного доступа к заявкам.',
			'time_create'  => $date,
		);
		$users = $this->Tools_model->users_id($date);
		foreach ($users as $row)
		{
			$this->ion_auth->remove_from_group($group,$row->id);
			$this->Tools_model->users_access_delete($row->id,$data);
			$message['id_user'] = $row->id;
			$this->Insert_model->message_to_user($message);
		//Отправляем письмо с уведомлением о окончание действия полного доступа
        	$this->email->clear();
        	$this->email->to('info@tklient.ru');
        	$this->email->to($row->email);
        	$this->email->from('site@tklient.ru');
        	$this->email->subject('Полный доступ приостановлен');
        	$this->email->message($this->load->view('mail_access_denied',$row,true));
        	$this->email->send();			
		}
	}
}
?>