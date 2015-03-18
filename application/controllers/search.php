<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search extends CI_Controller {

	
	public function login_check()
	{
		$inData = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$userdata = $this->user_model->checkLogin($inData);
		// echo "<pre>";
		// print_r($session);
		// exit();
		if(!empty($userdata)){

			$this->session->set_userdata($userdata);
			$all_session = $this->session->all_userdata();
			redirect('home/dashboard');
		}else{
			redirect('home/login/fail');
		}
	}
	public function logout()
	{
		$all_session = $this->session->all_userdata();
		$this->session->sess_destroy();

		redirect('home/login');
	}
}
