<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {

	public function list_user()
	{
		$list_user = $this->user_model->list_user();
		// echo "<Pre>";
		// print_r($list_user);
		// exit();
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_user).')'; 
		print_r($_GET['callback'].$json);
	}
	public function user_insert()
	{

		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)
		{
			$pass = $name->user_password;
			$list_data = array(
				'user_name' => $name->user_name,
				'user_email' => $name->user_email,
				'user_level' => $name->user_level,
				'user_password' => md5($pass),
			);
			$return = $this->user_model->user_insert($list_data);
			$list_data = array(
				'user_name' => $name->user_name,
				'user_email' => $name->user_email,
				'user_level' => $name->user_level,
			);
	}
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
	}
	public function user_update()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)

		if(!isset($name->user_password)){
			$list_data = array(
				'user_id' => $name->user_id,
				'user_name' => $name->user_name,
				'user_email' => $name->user_email,
				'user_level' => $name->user_level,
			);
			$return = $this->user_model->user_update($list_data);	
		} 
		else {
			$pass = $name->user_password;
			$list_data = array(
				'user_id' => $name->user_id,
				'user_name' => $name->user_name,
				'user_email' => $name->user_email,
				'user_level' => $name->user_level,
				'user_password' => md5($pass),
			);
			$return = $this->user_model->user_update($list_data);	
		}

			## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
			
		}
	public function user_delete()
	{
			$data = $_GET['models'];
			$arr = json_decode($data);
			foreach($arr as $name)
			{
				$list_data = array(
				'user_id' => $name->user_id,
			);
				$this->user_model->user_delete($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($list_data).')'; 
			print_r($_GET['callback'].$json);
	}
	public function edit_pass()
	{
		$data['page'] = "edit_pass";
		$this->load->view('head',$data);
	}
	public function editPass()
	{
		$session = $this->session->all_userdata();
		$userID = $session['user_data']['userID'];

		$oldpassword = md5($this->input->post('oldpassword'));
		$newpassword = $this->input->post('newpassword');
		$repassword = $this->input->post('repassword');

		if($session['user_data']['password']==$oldpassword&&$newpassword==$repassword){
			$list_data = array(
				'user_id' => $userID,
				'user_password' => md5($newpassword),
			);
			$this->user_model->user_update($list_data);
			redirect('user/edit_pass/success');
		}else{
			redirect('user/edit_pass/fail');
		}

	}
}

