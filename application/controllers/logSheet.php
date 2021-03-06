<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logSheet extends CI_Controller {

	
	public function searchLog()
	{
		$data['cutter'] = $this->uri->segment(3);
 		$data['page'] = "logSheet/search-log";
		$this->load->view('index',$data);
	}
	public function viewSet()
	{
		$data['cutter'] = $this->uri->segment(3);
		if($data['cutter']==1||$data['cutter']==4){
			$cutter_type = 1;
		}elseif($data['cutter']==2||$data['cutter']==3){
			$cutter_type = 2;
		}else{
			$cutter_type = 3;
		}
		$data['get_problem'] = $this->logsheet_model->get_problem($cutter_type);
		$InData = array(
			'cut_size' => $data['cutter'], 
			'shift' => $this->uri->segment(5),
			'date' => $this->uri->segment(6),
			);
		if($data['cutter']==1||$data['cutter']==4){
		$data['logSheet_set'] = $this->logsheet_model->getLogSheet_cutsize_shift($InData);
		$data['problem_shift'] = $this->logsheet_model->get_cutsize_problem_shift($InData);
		$data['problem_person'] = $this->logsheet_model->getLogSheet_remark_detail($InData);
		}elseif($data['cutter']==2||$data['cutter']==3){
		$data['logSheet_set'] = $this->logsheet_model->getLogSheet_folio_shift($InData);
		$data['problem_shift'] = $this->logsheet_model->get_folio_problem_shift($InData);
		$data['problem_person'] = $this->logsheet_model->getLogSheet_folio_remark_detail($InData);
		}else{
		$data['logSheet_set'] = $this->logsheet_model->getLogSheet_ream_shift($InData);
		}

		// echo "<pre>";
		// print_r($data['logSheet_set']);
		// // print_r($data['get_problem']);
		// // print_r($data['problem_shift']);
		// // print_r($data['problem_person']);
		// exit();
 		$data['page'] = "logSheet/search-log";
		$this->load->view('index',$data);
	}
	public function viewSet_detail()
	{
		$data['cutter'] = $this->uri->segment(3);
		$c_id = $this->uri->segment(5);
		$data['logSheet_set_detail'] = $this->logsheet_model->getLogSheet_set_detail($c_id);

 		$data['page'] = "logSheet/search-log";
		$this->load->view('index',$data);
	}
	public function searchLogResult()
	{
		$cutter = $this->input->post('cutter');
		$end_date = $this->input->post('end_date');
		redirect('logSheet/searchLog/'.$cutter.'/'.$end_date);
	}
	public function input_cutsize()
	{
		$cutter = $this->uri->segment(3);
		$cutter_type = 1;
		$data['get_problem'] = $this->logsheet_model->get_problem($cutter_type);
		$data['cutter'] = $cutter ;
		$data['page'] = "logSheet/formCutSite";
		$this->load->view('index',$data);
	}
	public function edit_cutsize()
	{
		$c_id  = $this->uri->segment(5);
		$cutter_type = 1;
		$data['detail_CutSite'] = $this->logsheet_model->getLogSheet_set_detail($c_id);
		$data['detail_problem'] = $this->logsheet_model->getLogSheet_problem_detail($c_id);
		// echo "<pre>";
		// print_r($data);
		// exit();
		$cutter = $this->uri->segment(3);
		$data['cutter'] = $this->uri->segment(3);
		$data['get_problem'] = $this->logsheet_model->get_problem($cutter_type);
		
		$data['page'] = "logSheet/formCutSite_edit";
		$this->load->view('index',$data);
	}
	public function input_folio()
	{
		$cutter = $this->uri->segment(3);
		$cutter_type = 2;
		$data['get_problem'] = $this->logsheet_model->get_problem($cutter_type);
		$data['cutter'] = $cutter ;
		$data['page'] = "logSheet/formFolio";
		$this->load->view('index',$data);
	}
	public function edit_folio()
	{
		$f_id  = $this->uri->segment(5);
		$cutter_type = 2;
		$data['detail_folio'] = $this->logsheet_model->getLogSheet_folio_detail($f_id);
		$data['detail_problem'] = $this->logsheet_model->getLogSheet_folio_problem_detail($f_id);
		$data['detail_reel'] = $this->logsheet_model->getLogSheet_folio_reel_detail($f_id);
		$data['detail_set'] = $this->logsheet_model->getLogSheet_folio_set_detail($f_id);
		// echo "<pre>";
		// print_r($data['detail_problem']);
		// exit();
		$cutter = $this->uri->segment(3);
		$data['cutter'] = $this->uri->segment(3);
		$data['get_problem'] = $this->logsheet_model->get_problem($cutter_type);
		
		$data['page'] = "logSheet/formFolio_edit";
		$this->load->view('index',$data);
	}
	public function input_ream()
	{
		$this->db->where('date',$this->uri->segment(4));
		$this->db->where('shift',$this->uri->segment(5));
		$query=$this->db->get('log_ream');
		if(empty($query->result_array())){
			$data['page'] = "input_ream";
			$this->load->view('index',$data);
		}
		else{
			redirect('logSheet/view_log_ream/'.array_shift($query->result_array())['log_ream_id']);
		}	
	}	
	public function view_log_ream()
	{
		$data['page'] = "view_log_ream";
		$this->load->view('index',$data);	
	}
	
	public function list_cutsize1()
	{
		$this->logsheet_model->getLogSheet();
	}

	//////////////////////////////////////// REAM ///////////////////////////////////

		public function insert_log_ream(){
		$logream=array('date'=>$this->input->post('date'),'shift'=>$this->input->post('shift'));
		$this->log_ream_model->insert_log_ream($logream);
		if($this->db->affected_rows() > 0){
			$log_ream_id=$this->db->insert_id();
			$this->insert_ream_detail($log_ream_id); // insert log ream detail
			$this->insert_problem($log_ream_id); // insert log ream problem
			redirect(site_url('logSheet/view_log_ream/'.$log_ream_id));
		}
	}
	
	public function insert_ream_detail($log_ream_id){
		for($i=0;$i<count($this->input->post('start'));$i++){
			$ream_detail=array(
				'log_ream_id'=>$log_ream_id,
				'start'=>$this->input->post('start')[$i],
				'stop'=>$this->input->post('stop')[$i],
				'type'=>$this->input->post('type')[$i],
				'gram'=>$this->input->post('gram')[$i],
				'matno'=>$this->input->post('matno')[$i],
				'width'=>$this->input->post('width')[$i],
				'height'=>$this->input->post('height')[$i],
				'sumpage'=>$this->input->post('sumpage')[$i],
				'sumpack'=>$this->input->post('sumpack')[$i],
				'sumpackstand'=>$this->input->post('sumpackstand')[$i],
				'sumstand'=>$this->input->post('sumstand')[$i],
				'sumweight'=>$this->input->post('weight')[$i],
				'sortno'=>$this->input->post('sort')[$i],
				'cutter'=> $this->input->post('cutter')[$i],
				'fork'=>$this->input->post('fork')[$i],
				'cutint'=>$this->input->post('cutint')[$i],
				'outfeed'=>$this->input->post('outfeed')[$i],
				'palletint'=>$this->input->post('palletint')[$i],
				'singlestand'=>$this->input->post('singlestand')[$i],
				'pairstand'=>$this->input->post('pairstand')[$i],
				'numberstand'=>$this->input->post('numberstand')[$i],
				'totalream'=>$this->input->post('sumream')[$i],
				'totalweight'=>$this->input->post('sumweight')[$i]
			);
			$this->db->insert('log_ream_detail',$ream_detail);
		}
	}
	
	public function insert_problem($log_ream_id){
		$problem_value = $this->input->post('problem');
		$problem_id = $this->input->post('problem_id');
		for($i=0;$i<count($problem_value);$i++){
			if(!empty($problem_value[$i])){
				$problem_detail=array(
					'problem_id'=>$problem_id[$i],
					'log_ream_id'=>$log_ream_id,
					'total_minutes'=>$problem_value[$i]
				);
				$this->db->insert('log_ream_problem',$problem_detail);
			}
		}
	}
	
//**************** Update ******************
	
	public function update_log_ream(){
		$this->update_ream_detail();
		$this->update_problem($this->uri->segment(3));
		redirect(site_url('logSheet/view_log_ream/'.$this->uri->segment(3)));
	}
	
	public function update_problem($log_ream_id){
		$problem_value = $this->input->post('problem');
		$problem_id = $this->input->post('ream_problem_id');
		for($i=0;$i<count($problem_value);$i++){
			if(!empty($problem_value[$i])){
				if(!empty($problem_id[$i])){ //update if that field is not empty
						$problem_detail=array(
							'total_minutes'=>$problem_value[$i]
						);
						$this->db->where('ID',$problem_id[$i]);
						$this->db->update('log_ream_problem',$problem_detail);
				}
				else if(!empty($problem_value[$i])&& empty($problem_id[$i])){ // insert if that field is empty
					$problem_detail=array(
						'problem_id'=>$this->input->post('problem_id')[$i],
						'log_ream_id'=>$log_ream_id,
						'total_minutes'=>$problem_value[$i]
					);
					$this->db->insert('log_ream_problem',$problem_detail);
				}
			}
		}
	}
	
	public function update_ream_detail(){
		for($i=0;$i<count($this->input->post('start'));$i++){ // update log ream
			$ream_detail=array(
				'start'=>$this->input->post('start')[$i],
				'stop'=>$this->input->post('stop')[$i],
				'type'=>$this->input->post('type')[$i],
				'gram'=>$this->input->post('gram')[$i],
				'matno'=>$this->input->post('matno')[$i],
				'width'=>$this->input->post('width')[$i],
				'height'=>$this->input->post('height')[$i],
				'sumpage'=>$this->input->post('sumpage')[$i],
				'sumpack'=>$this->input->post('sumpack')[$i],
				'sumpackstand'=>$this->input->post('sumpackstand')[$i],
				'sumstand'=>$this->input->post('sumstand')[$i],
				'sumweight'=>$this->input->post('weight')[$i],
				'sortno'=>$this->input->post('sort')[$i],
				'cutter'=> $this->input->post('cutter')[$i],
				'fork'=>$this->input->post('fork')[$i],
				'cutint'=>$this->input->post('cutint')[$i],
				'outfeed'=>$this->input->post('outfeed')[$i],
				'palletint'=>$this->input->post('palletint')[$i],
				'singlestand'=>$this->input->post('singlestand')[$i],
				'pairstand'=>$this->input->post('pairstand')[$i],
				'numberstand'=>$this->input->post('numberstand')[$i],
				'totalream'=>$this->input->post('sumream')[$i],
				'totalweight'=>$this->input->post('sumweight')[$i]
			);
			$this->db->where('ID',$this->input->post('detail_id')[$i]);
			$this->db->update('log_ream_detail',$ream_detail);
		}
		if(!empty($this->input->post('start_new'))){
			for($i=0;$i<count($this->input->post('start_new'));$i++){ // insert log detail that have added new
				$ream_detail=array(
					'log_ream_id'=>$this->uri->segment(3),
					'start'=>$this->input->post('start_new')[$i],
					'stop'=>$this->input->post('stop_new')[$i],
					'type'=>$this->input->post('type_new')[$i],
					'gram'=>$this->input->post('gram_new')[$i],
					'matno'=>$this->input->post('matno_new')[$i],
					'width'=>$this->input->post('width_new')[$i],
					'height'=>$this->input->post('height_new')[$i],
					'sumpage'=>$this->input->post('sumpage_new')[$i],
					'sumpack'=>$this->input->post('sumpack_new')[$i],
					'sumpackstand'=>$this->input->post('sumpackstand_new')[$i],
					'sumstand'=>$this->input->post('sumstand_new')[$i],
					'sumweight'=>$this->input->post('weight_new')[$i],
					'sortno'=>$this->input->post('sort_new')[$i],
					'cutter'=> $this->input->post('cutter_new')[$i],
					'fork'=>$this->input->post('fork_new')[$i],
					'cutint'=>$this->input->post('cutint_new')[$i],
					'outfeed'=>$this->input->post('outfeed_new')[$i],
					'palletint'=>$this->input->post('palletint_new')[$i],
					'singlestand'=>$this->input->post('singlestand_new')[$i],
					'pairstand'=>$this->input->post('pairstand_new')[$i],
					'numberstand'=>$this->input->post('numberstand_new')[$i],
					'totalream'=>$this->input->post('sumream_new')[$i],
					'totalweight'=>$this->input->post('sumweight_new')[$i]
				);
				$this->db->insert('log_ream_detail',$ream_detail);
			}
		}
	}
	public function log_ream_report(){
		$data['downtime']=$this->log_ream_model->getDownTime();
		$data['downtimechart'] =json_encode($this->log_ream_model->getDownTime());
		$data['report'] = $this->log_ream_model->get_log_ream_report();
		$data['page']='report/log_ream_report';
		$this->load->view('index',$data);
	}
	public function log_cutsize_report(){
		$data['page']='report/log_cutsize_report';
		$data['cutsize']=$this->logsheet_cutsize_report->get_cutsize_log();
		$data['report']=$this->logsheet_cutsize_report->get_cutsize_log_chart();
		$data['downtime']=$this->logsheet_cutsize_report->get_problem_report();
		$this->load->view('index',$data);
	}
	public function searchCutSizeLog()
	{
		$cutter = $this->input->post('cutter');
		$end_date = $this->input->post('end_date');
		redirect('logSheet/log_cutsize_report/'.$cutter.'/'.$end_date);
	}
	public function log_folio_report(){
		$data['page']='report/report-folio';
		$data['cutsize']=$this->logsheet_folio_report->get_cutsize_log();
		$data['downtime']=$this->logsheet_folio_report->get_problem_report();
		$this->load->view('index',$data);
	}
	public function searchfolioLog()
	{
		$cutter = $this->input->post('cutter');
		$end_date = $this->input->post('end_date');
		redirect('logSheet/report-folio/'.$cutter.'/'.$end_date);
	}
		public function searchReamLog()
	{
		$end_date = $this->input->post('end_date');
		redirect('logSheet/log_ream_report/5/'.$end_date);
	}
	public function check_target()
	{
		$list_target = $this->setting_model->list_target();

		if(empty($list_target)){
			$date = new DateTime(date('Y-m'));
			$date->sub(new DateInterval('P1M'));
			$month =  $date->format('Y-m');
			$target_lastMonth = $this->setting_model->list_target_lastMonth($month);
			
			//exit();
			$target_name[0] = "Prod/Target (Cut Size)" ;
			$target_name[1] = "Yiled Target (Cut Size)" ;
			$target_name[2] = "Target Ton/Day (Folio)" ;
			$target_name[3] = "M/C Running Target (Folio)" ;
			$target_name[4] = "Target Pack/Day (REAM)" ;
			$target_name[5] = "M/C Running Target (REAM)" ;
			$target_name[6] = "DOWN TIME Target (REAM)" ;

			for($i=0;$i<7;$i++){
				$list_data = array(
					'target_name' => $target_name[$i],
					'target_date' => date('Y-m-d'), 
					'target_value' => $target_lastMonth[$i]['target_value'], 
					'target_type' => $target_lastMonth[$i]['target_type'],  
				);
			$this->setting_model->target_insert($list_data);
			}
		}
	}

	
}
