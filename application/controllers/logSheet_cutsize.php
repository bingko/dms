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
		 "mcspeed" => $_POST["mcspeed"],
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
		//echo '<Pre>';
		// print_r($inData);
		$count_prom =count($this->input->post('problem_id'));
		for($i=0;$i<$count_prom;$i++){
			$inData = array(
				"problem_id"  =>   $_POST["problem_id"][$i],
				"total_minutes"  =>  $_POST["downtime"][$i],
				"problem_remark"  =>  $_POST["remark"][$i],
				"c_id"  =>  $id,
			);
		$this->logsheet_model->cutSizePrombleInsert($inData);
		}

		$inData = array(
			"c_id"  =>  $id,
			'size' => $this->input->post('size_finished'),
			'ton' => $this->input->post('remark_ton'),
			'total_fg' => $this->input->post('remark_total_fg'),
			'grade1' => $this->input->post('remark_grade1'),
			'mat1' => $this->input->post('remark_mat1'),
			'ream1' => $this->input->post('remark_ream1'),
			'weight1' => $this->input->post('remark_weight1'),
			'grade2' => $this->input->post('remark_grade2'),
			'mat2' => $this->input->post('remark_mat2'),
			'ream2' => $this->input->post('remark_ream2'),
			'weight2' => $this->input->post('remark_weight2'),
			'grade3' => $this->input->post('remark_grade3'),
			'mat3' => $this->input->post('remark_mat3'),
			'ream3' => $this->input->post('remark_ream3'),
			'weight3' => $this->input->post('remark_weight3'),
			'head_shift' => $this->input->post('remark_head_shift'),
			'employee1' => $this->input->post('remark_employee1'),
			'employee2' => $this->input->post('remark_employee2'),
			'employee3' => $this->input->post('remark_employee3'),
			'em_ot1' => $this->input->post('remark_em_ot1'),
			'em_ot2' => $this->input->post('remark_em_ot2'),
			'em_ot3' => $this->input->post('remark_em_ot3'),
			'customer_name' => $this->input->post('remark_customer'),
			'mat_for_dmg1' => $this->input->post('remark_mat_dmg1'),
			'mat_for_dmg2' => $this->input->post('remark_mat_dmg2'),
			'mat_for_dmg3' => $this->input->post('remark_mat_dmg3'),
			'mat_for_dmg4' => $this->input->post('remark_mat_dmg4'),
			'remark' => $this->input->post('remark'),
		);
		$this->logsheet_model->cutSizeRemarkInsert($inData);
		//print_r($inData);
		// exit();
		redirect('logSheet/searchLog/'.$_POST["cut_size"].'/'.date('Y-m'));
	}
	public function edit_input_cutsize()
	{
		$c_id = $_POST["c_id"];
		$inData = array(
		"c_id" => $_POST["c_id"],
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
		 "mcspeed" => $_POST["mcspeed"],
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
		$this->logsheet_model->logSheetUpdate($inData);
		//echo '<Pre>';
		// print_r($inData);
		$count_prom =count($this->input->post('problem_id'));
		for($i=0;$i<$count_prom;$i++){
			$inData = array(
				"cp_id" => $_POST["cp_id"][$i],
				"problem_id"  =>   $_POST["problem_id"][$i],
				"total_minutes"  =>  $_POST["downtime"][$i],
				"problem_remark"  =>  $_POST["remark"][$i],
				"c_id"  =>  $c_id,
			);
		$this->logsheet_model->cutSizePrombleUpdate($inData);
		}

		$inData = array(
			"lcr_id"  =>  $this->input->post('lcr_id'),
			"c_id"  =>  $c_id,
			'size' => $this->input->post('size_finished'),
			'ton' => $this->input->post('remark_ton'),
			'total_fg' => $this->input->post('remark_total_fg'),
			'grade1' => $this->input->post('remark_grade1'),
			'mat1' => $this->input->post('remark_mat1'),
			'ream1' => $this->input->post('remark_ream1'),
			'weight1' => $this->input->post('remark_weight1'),
			'grade2' => $this->input->post('remark_grade2'),
			'mat2' => $this->input->post('remark_mat2'),
			'ream2' => $this->input->post('remark_ream2'),
			'weight2' => $this->input->post('remark_weight2'),
			'grade3' => $this->input->post('remark_grade3'),
			'mat3' => $this->input->post('remark_mat3'),
			'ream3' => $this->input->post('remark_ream3'),
			'weight3' => $this->input->post('remark_weight3'),
			'head_shift' => $this->input->post('remark_head_shift'),
			'employee1' => $this->input->post('remark_employee1'),
			'employee2' => $this->input->post('remark_employee2'),
			'employee3' => $this->input->post('remark_employee3'),
			'em_ot1' => $this->input->post('remark_em_ot1'),
			'em_ot2' => $this->input->post('remark_em_ot2'),
			'em_ot3' => $this->input->post('remark_em_ot3'),
			'customer_name' => $this->input->post('remark_customer'),
			'mat_for_dmg1' => $this->input->post('remark_mat_dmg1'),
			'mat_for_dmg2' => $this->input->post('remark_mat_dmg2'),
			'mat_for_dmg3' => $this->input->post('remark_mat_dmg3'),
			'mat_for_dmg4' => $this->input->post('remark_mat_dmg4'),
			'remark' => $this->input->post('remark'),
		);
		$this->logsheet_model->cutSizeRemarkUpdate($inData);
		//print_r($inData);
		// exit();
		redirect('logSheet/searchLog/'.$_POST["cut_size"].'/'.date('Y-m'));
	}
	public function add_input_folio()
	{

		$inData = array(
			'cutter' => $this->input->post('cut_size'),
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'grade' => $this->input->post('grade'),
			'order' => $this->input->post('order'),
			'item' => $this->input->post('item'),
			'width' => $this->input->post('width'),
			'lot' => $this->input->post('lot'),
			'size' => $this->input->post('size'),
			'rh' => $this->input->post('rh'),
			'mat' => $this->input->post('mat'),
			'start_time' => $this->input->post('start_time'),
			'stop_time' => $this->input->post('stop_time'),
			'act' => $this->input->post('act'),
			'temp' => $this->input->post('temp'),
			'total_input' => $this->input->post('total_input'),
			'trim_reject' => $this->input->post('trim_reject'),
			'reject' => $this->input->post('reject'),
			'total_reject' => $this->input->post('total_reject'),
			'output' => $this->input->post('output'),
			'ream' => $this->input->post('ream'),
			'soft' => $this->input->post('soft'),
			'nosoft' => $this->input->post('nosoft'),
			'nc' => $this->input->post('nc'),
			'proble_remark' => $this->input->post('proble_remark'),
		 );
		$id = $this->logsheet_model->folioInsert($inData);

		$count_prom =count($this->input->post('problem_id'));
		for($i=0;$i<$count_prom;$i++){
			$inData = array(
				"problem_id"  =>   $_POST["problem_id"][$i],
				"min"  =>  $_POST["downtime"][$i],
				"problem_from"  =>  $_POST["from"][$i],
				"problem_to"  =>  $_POST["to"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioPrombleInsert($inData);
		}

		$count_reel =count($this->input->post('reel_no'));
		for($i=0;$i<$count_reel;$i++){
			$inData = array(
				"reel_no"  =>   $_POST["reel_no"][$i],
				"reel_weight"  =>  $_POST["reel_weight"][$i],
				"reel_roll"  =>  $_POST["reel_roll"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioReelInsert($inData);
		}

		$count_set =count($this->input->post('roll_a'));
		for($i=0;$i<$count_set;$i++){
			$inData = array(
				"roll_a"  =>   $_POST["roll_a"][$i],
				"softa"  =>  $_POST["softa"][$i],
				"roll_b"  =>   $_POST["roll_b"][$i],
				"softb"  =>  $_POST["softb"][$i],
				"roll_c"  =>   $_POST["roll_c"][$i],
				"softc"  =>  $_POST["softc"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioSetInsert($inData);
		}

		$inData = array(
			"f_id"  =>  $id,
			'remark_soft' => $this->input->post('remark_soft'),
			'remark_nosoft' => $this->input->post('remark_nosoft'),
			'remark_nc' => $this->input->post('remark_nc'),
			'remark_grade1' => $this->input->post('remark_grade1'),
			'remark_size1' => $this->input->post('remark_size1'),
			'remark_totalinput1' => $this->input->post('remark_totalinput1'),
			'remark_totaloutput1' => $this->input->post('remark_totaloutput1'),
			'remark_totalream1' => $this->input->post('remark_totalream1'),
			'remark_grade2' => $this->input->post('remark_grade2'),
			'remark_size2' => $this->input->post('remark_size2'),
			'remark_totalinput2' => $this->input->post('remark_totalinput2'),
			'remark_totaloutput2' => $this->input->post('remark_totaloutput2'),
			'remark_totalream2' => $this->input->post('remark_totalream2'),
			'remark_grade3' => $this->input->post('remark_grade3'),
			'remark_size3' => $this->input->post('remark_size3'),
			'remark_totalinput3' => $this->input->post('remark_totalinput3'),
			'remark_totaloutput3' => $this->input->post('remark_totaloutput3'),
			'remark_totalream3' => $this->input->post('remark_totalream3'),
			'remark_employee1' => $this->input->post('remark_employee1'),
			'remark_employee2' => $this->input->post('remark_employee2'),
			'remark_em_ot1' => $this->input->post('remark_em_ot1'),
			'remark_em_ot2' => $this->input->post('remark_em_ot2'),
			'remark_customer' => $this->input->post('remark_customer'),
			'remark_total_input' => $this->input->post('remark_total_input'),
			'remark_total_output' => $this->input->post('remark_total_output'),
			'remark_total_ream' => $this->input->post('remark_total_ream'),
			'remark_head_shift' => $this->input->post('remark_head_shift'),
		);
		$this->logsheet_model->folioRemarkInsert($inData);
		redirect('logSheet/searchLog/'.$_POST["cut_size"].'/'.date('Y-m'));
	}
	public function edit_input_folio()
	{
		$id = $this->input->post('f_id');
		$inData = array(
			'f_id' => $this->input->post('f_id'),
			'cutter' => $this->input->post('cut_size'),
			'date' => $this->input->post('date'),
			'shift' => $this->input->post('shift'),
			'grade' => $this->input->post('grade'),
			'order' => $this->input->post('order'),
			'item' => $this->input->post('item'),
			'width' => $this->input->post('width'),
			'lot' => $this->input->post('lot'),
			'size' => $this->input->post('size'),
			'rh' => $this->input->post('rh'),
			'mat' => $this->input->post('mat'),
			'start_time' => $this->input->post('start_time'),
			'stop_time' => $this->input->post('stop_time'),
			'act' => $this->input->post('act'),
			'temp' => $this->input->post('temp'),
			'total_input' => $this->input->post('total_input'),
			'trim_reject' => $this->input->post('trim_reject'),
			'reject' => $this->input->post('reject'),
			'total_reject' => $this->input->post('total_reject'),
			'output' => $this->input->post('output'),
			'ream' => $this->input->post('ream'),
			'soft' => $this->input->post('soft'),
			'nosoft' => $this->input->post('nosoft'),
			'nc' => $this->input->post('nc'),
			'proble_remark' => $this->input->post('proble_remark'),
		 );
		$this->logsheet_model->folioUpdate($inData);
/*
		$count_prom =count($this->input->post('problem_id'));
		for($i=0;$i<$count_prom;$i++){
			$inData = array(
				"cp_id"  =>   $_POST["cp_id"][$i],
				"min"  =>  $_POST["downtime"][$i],
				"problem_from"  =>  $_POST["from"][$i],
				"problem_to"  =>  $_POST["to"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioPrombleInsert($inData);
		}

		$count_reel =count($this->input->post('reel_no'));
		for($i=0;$i<$count_reel;$i++){
			$inData = array(
				"reel_no"  =>   $_POST["reel_no"][$i],
				"reel_weight"  =>  $_POST["reel_weight"][$i],
				"reel_roll"  =>  $_POST["reel_roll"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioReelInsert($inData);
		}

		$count_set =count($this->input->post('roll_a'));
		for($i=0;$i<$count_set;$i++){
			$inData = array(
				"roll_a"  =>   $_POST["roll_a"][$i],
				"softa"  =>  $_POST["softa"][$i],
				"roll_b"  =>   $_POST["roll_b"][$i],
				"softb"  =>  $_POST["softb"][$i],
				"roll_c"  =>   $_POST["roll_c"][$i],
				"softc"  =>  $_POST["softc"][$i],
				"f_id"  =>  $id,
			);
		$this->logsheet_model->folioSetInsert($inData);
		}
*/
		$inData = array(
			"lfr_id" => $this->input->post('lfr_id'),
			"f_id"  =>  $id,
			'remark_soft' => $this->input->post('remark_soft'),
			'remark_nosoft' => $this->input->post('remark_nosoft'),
			'remark_nc' => $this->input->post('remark_nc'),
			'remark_grade1' => $this->input->post('remark_grade1'),
			'remark_size1' => $this->input->post('remark_size1'),
			'remark_totalinput1' => $this->input->post('remark_totalinput1'),
			'remark_totaloutput1' => $this->input->post('remark_totaloutput1'),
			'remark_totalream1' => $this->input->post('remark_totalream1'),
			'remark_grade2' => $this->input->post('remark_grade2'),
			'remark_size2' => $this->input->post('remark_size2'),
			'remark_totalinput2' => $this->input->post('remark_totalinput2'),
			'remark_totaloutput2' => $this->input->post('remark_totaloutput2'),
			'remark_totalream2' => $this->input->post('remark_totalream2'),
			'remark_grade3' => $this->input->post('remark_grade3'),
			'remark_size3' => $this->input->post('remark_size3'),
			'remark_totalinput3' => $this->input->post('remark_totalinput3'),
			'remark_totaloutput3' => $this->input->post('remark_totaloutput3'),
			'remark_totalream3' => $this->input->post('remark_totalream3'),
			'remark_employee1' => $this->input->post('remark_employee1'),
			'remark_employee2' => $this->input->post('remark_employee2'),
			'remark_em_ot1' => $this->input->post('remark_em_ot1'),
			'remark_em_ot2' => $this->input->post('remark_em_ot2'),
			'remark_customer' => $this->input->post('remark_customer'),
			'remark_total_input' => $this->input->post('remark_total_input'),
			'remark_total_output' => $this->input->post('remark_total_output'),
			'remark_total_ream' => $this->input->post('remark_total_ream'),
			'remark_head_shift' => $this->input->post('remark_head_shift'),
		);
		$this->logsheet_model->folioRemarkUpdate($inData);
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
