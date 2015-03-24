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
}
