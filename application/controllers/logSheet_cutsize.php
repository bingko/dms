<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logSheet_cutsize extends CI_Controller {

	public function add_input_cutsize()
	{

		$inData = array(
		"cut_size" => $_POST["cut_size"],
		"date" => $_POST["date"],
		"shift" => $_POST["shift"],
		 "appearance"  => $_POST["appearance"],
		  "box"  =>   $_POST["box"],
		  "cover"  =>  $_POST["cover"],
		 "grade_gram"  =>   $_POST["grade_gram"],
		 "order_no"  =>   $_POST["order_no"],
		 "roll_width"  =>  $_POST["roll_width"],
		 "lot_no"  =>     $_POST["lot_no"],
		 "size"  =>   $_POST["size"],
		 "lot_no"  =>   $_POST["lot_no"],
		  "start_time"  =>   $_POST["start_time"],
		  "end_time"  =>   $_POST["end_time"],
		 "mat_no"  =>   $_POST["mat_no"],
		  "band"  =>   $_POST["band"],
		  "input_weight"  =>   $_POST["input_weight"],
		  "output_weight"  =>   $_POST["output_weight"],
		  "total_ream"  =>   $_POST["total_ream"],
		  "total_reject"  =>   $_POST["total_reject"],
		  "total_reject_percentage"  =>  $_POST["total_reject_percentage"],
		  "roll_no1"  =>   $_POST["roll_no1"],
		  "roll_no2"  =>   $_POST["roll_no2"],
		  "roll_no3"  =>   $_POST["roll_no3"],
		  "roll_no4"  =>   $_POST["roll_no4"],		 
		  "roll_no5"  =>   $_POST["roll_no5"],
		 "roll_grade1"  =>  $_POST["roll_grade1"],
		  "roll_grade2"  =>   $_POST["roll_grade2"],
		  "roll_grade3"  =>   $_POST["roll_grade3"],
		 "roll_grade4"  =>   $_POST["roll_grade4"],
		  "roll_grade5"  =>   $_POST["roll_grade5"],
		  "roll_weight1"  =>   $_POST["roll_weight1"],
		  "roll_weight2"  =>   $_POST["roll_weight2"],
		  "roll_weight3"  =>   $_POST["roll_weight3"],
		  "roll_weight4"  =>   $_POST["roll_weight4"],
		 "roll_weight5"  =>  $_POST["roll_weight5"],
		  "roll_f_g1"  =>   $_POST["roll_f_g_1"],
		  "roll_f_g2"  =>   $_POST["roll_f_g_2"],
		 "roll_f_g3"  =>   $_POST["roll_f_g_3"],
		 "roll_f_g4"  =>   $_POST["roll_f_g_4"],
		  "roll_f_g5"  =>  $_POST["roll_f_g_5"],
		 "roll_joint1"  =>  $_POST["roll_joint1"],
		  "roll_joint2"  =>   $_POST["roll_joint2"],
		  "roll_joint3"  =>  $_POST["roll_joint3"],
		  "roll_joint4"  =>   $_POST["roll_joint4"],
		  "roll_joint5"  =>   $_POST["roll_joint5"],
		  "problem_a"  =>  $_POST["problem_a"],
		  "problem_b"  =>  $_POST["problem_b"],
		  "problem_c"  =>   $_POST["problem_c"],
		  "problem_d"  =>   $_POST["problem_d"],
		  "problem_e"  => $_POST["problem_e"],
		 "problem_f"  =>  $_POST["problem_f"],
		  "problem_g"  =>  $_POST["problem_g"],
		  "problem_h"  =>   $_POST["problem_h"],
		  "problem_i"  =>  $_POST["problem_i"]
		 );
		$id = $this->logsheet_model->logSheetInsert($inData);
		// echo '<Pre>';
		// print_r($inData);
		redirect('logSheet/searchLog/'.$_POST["cut_size"].'/'.date('Y-m'));
	}
	public function insertReam(){
		$logream=array('date'=>date('Y-m-d H:i:s'),'shift'=>3);
		$this->log_ream_model->insert_log_ream($logream);
		return $this->db->insert_id();
	}
	public function insert_ream_detail(){
		$log_ream_id=$this->insertReam();
		for($i=0;$i<count($this->input->post('start'));$i++){
			$ream_detail=array(
				'log_reem_id'=>$log_ream_id,
				'start'=>$this->input->post('start')[$i],
				'stop'=>$this->input->post('stop')[$i],
				'type'=>$this->input->post('type')[$i],
				'gram'=>$this->input->post('gram')[$i],
				'matno'=>$this->input->post('matno')[$i],
				'width'=>$this->input->post('width')[$i],
				'height'=>$this->input->post('height')[$i],
				'sumpage'=>$this->input->post('sumpage')[$i],
				'sumpack'=>$this->input->post('sumpack')[$i],
				'sumstand'=>$this->input->post('sumstand')[$i],
				'sumweight'=>$this->input->post('weight')[$i],
				'sortno'=>$this->input->post('sort')[$i],
				'cutter'=> (!isset($this->input->post('cutter')[$i]))? 0 : $this->input->post('cutter')[$i],
				'fork'=>(isset($this->input->post('fork')[$i]))? $this->input->post('fork')[$i] : 0,
				'cutint'=>(isset($this->input->post('cutint')[$i]))? $this->input->post('cutint')[$i] : 0,
				'outfeed'=>(isset($this->input->post('outfeed')[$i]))? $this->input->post('outfeed')[$i] : 0,
				'palletint'=>(isset($this->input->post('palletint')[$i]))? $this->input->post('palletint')[$i] : 0,
				'singlestand'=>$this->input->post('singlestand')[$i],
				'pairstand'=>$this->input->post('pairstand')[$i],
				'numberstand'=>$this->input->post('numberstand')[$i],
				'totalream'=>$this->input->post('sumream')[$i],
				'totalweight'=>$this->input->post('sumweight')[$i]
			);
			$this->db->insert('log_reem_detail',$ream_detail);
		}
			$this->insert_problem();
	}
	public function insert_problem(){
		$problem_value = $this->input->post('problem');
		$problem_id = $this->input->post('problem_id');
		for($i=0;$i<count($problem_value);$i++){
			if(!empty($problem_value[$i])){
				$problem_detail=array(
					'problem_id'=>$problem_id[$i],
					'total_minutes'=>$problem_value[$i]
				);
				$this->db->insert('log_ream_problem',$problem_detail);
			}
		}
	}
}
