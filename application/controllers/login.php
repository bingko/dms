<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
	public function login_check()
	{
		$inData = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password'))
		);
		$userdata = $this->user_model->checkLogin($inData);
		$session['user_data'] = $userdata[0];
		if(!empty($userdata)){

			$this->session->set_userdata($session);
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
