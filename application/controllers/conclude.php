<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class conclude extends CI_Controller {
	public function result_Cutsize()
	{
		$startdate=date_create($this->input->post('end_date').' 07:00:00');
		$enddate=date_create($this->input->post('end_date').' 07:00:00');
		$sheeter=$this->input->post('sheeter');
		if($this->input->post('date_type')=='date'){
			$enddate->add(new DateInterval('P1D')); //plus one day if view by date
		}
		else{
			$enddate->add(new DateInterval('P1M')); //plus one month if view by month
		}
		$getdb=$this->cutsize_model->get_sheet_product($startdate->format('Y-m-d H:i:s'),$enddate->format('Y-m-d H:i:s'),$sheeter);
		$cutsize=array();
		for($i=0;$i<count($getdb);$i++){
			$cutsize[$i]['CT'] = $getdb[$i]['Sheeter'];
			$cutsize[$i]['shift'] = $getdb[$i]['Shift_q'];
			$cutsize[$i]['lot'] = $getdb[$i]['lot'];
			$cutsize[$i]['time'] = $getdb[$i]['FinishTime'];
			$cutsize[$i]['running_time'] = null;
			$cutsize[$i]['remake'] = $getdb[$i]['sale_type'].$getdb[$i]['Brand'];
			$cutsize[$i]['Grade']=$this->calculate_grade($getdb[$i]['Grade']);
			$cutsize[$i]['gram']=$getdb[$i]['Basisweight'];
			$cutsize[$i]['width']=$getdb[$i]['roll_width'];
			$cutsize[$i]['roll']=$this->calculate_roll($getdb[$i]);
			$cutsize[$i]['input']=($getdb[$i]['input1']+$getdb[$i]['input2']+$getdb[$i]['input3']+$getdb[$i]['input4']+$getdb[$i]['input5'])/1000;
			$cutsize[$i]['ream']=$getdb[$i]['Ream'];
			$cutsize[$i]['mat_no']=$getdb[$i]['WLBM'];
			$cutsize[$i]['paper_width']=$getdb[$i]['Width'];
			$cutsize[$i]['paper_height']=$getdb[$i]['Length'];
			$cutsize[$i]['ream']=$getdb[$i]['Ream'];
			$cutsize[$i]['Sort']=$getdb[$i]['Sort'];
			$cutsize[$i]['N']=$getdb[$i]['N'];
			$cutsize[$i]['output']=$this->calculate_output($getdb[$i]);
			$cutsize[$i]['output_n']= $this->calculate_output_N($getdb[$i]);
			$cutsize[$i]['total_reject']=($cutsize[$i]['input'])-($cutsize[$i]['output']);
			if($cutsize[$i]['input']!=0){ //divide by 0 exception
				$cutsize[$i]['trim_lost']=((($cutsize[$i]['width']-($cutsize[$i]['width']-40))/($cutsize[$i]['width']))*$cutsize[$i]['input']); //trim_lost
				$cutsize[$i]['percent_reject']=$cutsize[$i]['total_reject']/$cutsize[$i]['input']*100;
				$cutsize[$i]['reject']=$cutsize[$i]['total_reject']-$cutsize[$i]['trim_lost'];
				$cutsize[$i]['actual_reject']=$cutsize[$i]['reject']/$cutsize[$i]['input']*100;
			}
			else{
				$cutsize[$i]['percent_reject']=0;
				$cutsize[$i]['actual_reject']=0;
				$cutsize[$i]['trim_lost']=0; //trim_lost
				$cutsize[$i]['reject']=$cutsize[$i]['total_reject']-$cutsize[$i]['trim_lost'];
				$cutsize[$i]['actual_reject']=0;
			}
			
		}
		if($sheeter==1||$sheeter==4){
			$data['page'] = "result-search_Cutsize";
		}
		else{
			$data['page'] = "result-search_Folio";
		}
		$data['cutsize'] = $cutsize;
		$data['sheeter'] = $sheeter;
		$this->load->view('index',$data);
	}
	
	public function calculate_roll($roll){
		$sumroll=0;
		if($roll['Rollid1']!=0){
			$sumroll+=1;
		}
		if($roll['Rollid2']!=0){
			$sumroll+=1;
		}
		if($roll['Rollid3']!=0){
			$sumroll+=1;
		}
		if($roll['Rollid4']!=0){
			$sumroll+=1;
		}
		if($roll['Rollid5']!=0){
			$sumroll+=1;
		}
		return $sumroll;
	}
	
	public function calculate_grade($grade){
		$grade = '';
		if($grade==0){ 
			$grade = "OSP";
		}
		else if($grade==1){ 
			$grade = "PPC";
		}
		else if($grade==2){ 
			$grade = "EPP";
		}
		else if($grade==4){ 
			$grade = "LPP";
		}
		return $grade;
	}
	
	public function calculate_output($data){
		$output = 0.0000;
		if($data['Width']>100){
			$output=(round(round(round(((($data['Width']/25.4)*($data['Length']/25.4)*$data['Basisweight']))/3100,4),3),2)*$data['Ream']/1000);
		}
		else if($data['Width']<100){
			$output=(round(round(round((($data['Width']*$data['Length']*$data['Basisweight']))/3100,4),3),2)*$data['Ream']/1000);
		}
		return $output;
	}
	public function calculate_output_N($data){
		$output = 0.0000;
		if($data['Width']>100){
			$output=(round(round(round(((($data['Width']/25.4)*($data['Length']/25.4)*$data['Basisweight']))/3100,4),3),2)*$data['N']/1000);
		}
		else if($data['Width']<100){
			$output=(round(round(round((($data['Width']*$data['Length']*$data['Basisweight']))/3100,4),3),2)*$data['N']/1000);
		}
		return $output;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */