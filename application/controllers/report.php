<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	
	public function folio()
	{
 		$data['page'] = "report/report-folio";
		$this->load->view('index',$data);
	}
	public function log_ream_report(){
		$data['downtime']=$this->log_ream_model->getDownTime();
		$data['page']='log_ream_report';
		$this->load->view('index',$data);
	}

	public function problem_month()
	{
		$cutter = $this->uri->segment(3);
		$data['get_problem'] = $this->logsheet_model->get_problem_report($cutter);
 		
 		
		echo "<Pre>";
		print_r($data['get_problem']);
		exit();
 		$data['page'] = "report/report-folio";
		$this->load->view('index',$data);
	}
	public function setting_report()
	{
 		$data['page'] = "report/setting";
		$this->load->view('index',$data);
	}
	public function list_target()
	{
		$list_target = $this->setting_model->list_target();
		// echo "<Pre>";
		// print_r($list_target);
		// exit();
		## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_target).')'; 
		print_r($_GET['callback'].$json);
	}
	public function target_update()
	{
		$data = $_GET['models'];
		$arr = json_decode($data);
		foreach($arr as $name){
			$list_data = array(
				'target_id' => $name->target_id,
				'target_value' => $name->target_value,
			);
			$return = $this->setting_model->target_update($list_data);	
		}
		$list_data = array(
				'target_id' => $name->target_id,
				'target_name' => $name->target_name,
				'target_date' => $name->target_date,
				'target_value' => $name->target_value,
			);
			## Return Value ##
		header('Content-Type: text/javascript; charset=utf8');
		$json = '('.json_encode($list_data).')'; 
		print_r($_GET['callback'].$json);
			
	}
}
