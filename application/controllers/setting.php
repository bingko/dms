<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends CI_Controller {

	public function set_problem()
	{
		$data['page'] = "attach_cutsize";
		$this->load->view('index',$data);
	}
	public function list_problem()
	{
		$list_user = $this->logsheet_model->get_problem();
		// echo "<Pre>";
		// print_r($list_user);
		// exit();
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_user).')'; 
		print_r($_GET['callback'].$json);
	}
	public function problem_insert()
	{

		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)
		{
			$cutter_type = $name->cutter_type ;
			if($cutter_type == 0){
				$cutter_type = 1 ;
			}else{
				$cutter_type = $name->cutter_type;
			}

			$list_data = array(
				'problem_name' => $name->problem_name,
				'cutter_type' => $cutter_type ,
			);
			$return = $this->logsheet_model->problem_insert($list_data);
			$list_data = array(
				'problem_name' => $name->problem_name,
				'cutter_type' =>  $cutter_type ,
			);
	}
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
	}
	public function problem_update()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name)

		if(!isset($name->user_password)){
			$list_data = array(
				'problem_id' => $name->problem_id,
				'problem_name' => $name->problem_name,
				'cutter_type' => $name->cutter_type,
			);
			$return = $this->logsheet_model->problem_update($list_data);	
		} 
		else {
			$list_data = array(
				'problem_id' => $name->problem_id,
				'problem_name' => $name->problem_name,
				'cutter_type' => $name->cutter_type,
			);
			$return = $this->logsheet_model->problem_update($list_data);	
		}

			## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
			
	}
	public function problem_delete()
	{
			$data = $_GET['models'];
			$arr = json_decode($data);
			foreach($arr as $name)
			{
				$list_data = array(
				'user_id' => $name->user_id,
			);
				$this->logsheet_model->problem_delete($list_data);
			}
			## Return Value ##
			header('Content-Type: text/javascript; charset=utf8');
			$json = '('.json_encode($list_data).')'; 
			print_r($_GET['callback'].$json);
	}

}

