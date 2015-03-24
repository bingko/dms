<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logsheet_cutsize_report extends CI_Model {
	public function get_cutsize_log()
	{
		$this->db->where('YEAR(date)',$this->get_year());
		$this->db->where('MONTH(date)',$this->get_month());
		$this->db->where('cut_size',$this->get_cutter());
		$this->db->select('SUM(output_weight) as sum_output,SUM(input_weight) as sum_input,DAY(date) as day');
		$this->db->group_by('day');
		$query = $this->db->get('cutsize_data');
		return $query->result_array();
	}

		public function get_downtime_log()
	{
		$this->db->select('
			log_cutter_problem.problem_id,
			log_sheet_problem.problem_name,
			SUM(log_cutter_problem.total_minutes) as total_minutes,
			cutsize_data.shift,
			date
			');
		$this->db->where('cutter_type',$this->get_cutter());
		$this->db->where('YEAR(date)',$this->get_year());
		$this->db->where('MONTH(date)',$this->get_month());
		$this->db->group_by('cutsize_data.shift,log_cutter_problem.problem_id');
		$this->db->join('cutsize_data','cutsize_data.c_id = log_cutter_problem.c_id');
		$this->db->join('log_sheet_problem','log_sheet_problem.problem_id = log_cutter_problem.problem_id');
		$query = $this->db->get('log_cutter_problem');
		return json_decode($query->result_array());
	}

	public function get_cutsize_log_chart()
	{
		$this->db->where('YEAR(date)',$this->get_year());
		$this->db->where('MONTH(date)',$this->get_month());
		$this->db->where('cut_size',$this->get_cutter());
		$this->db->select('SUM(output_weight) as summary');
		$this->db->group_by('DAY(date)');
		$query = $this->db->get('cutsize_data');
		return json_encode($query->result_array());
	}
	public function get_cutsize_problem_chart()
	{
		$this->db->select('
			log_sheet_problem.problem_name,
			SUM(log_cutter_problem.total_minutes) as total
			');
		$this->db->where('cutter_type',$this->get_cutter());
		$this->db->where('YEAR(date)',$this->get_year());
		$this->db->where('MONTH(date)',$this->get_month());
		$this->db->group_by('log_cutter_problem.problem_id');
		$this->db->join('cutsize_data','cutsize_data.c_id = log_cutter_problem.c_id');
		$this->db->join('log_sheet_problem','log_sheet_problem.problem_id = log_cutter_problem.problem_id');
		$query = $this->db->get('log_cutter_problem');
		return json_encode($query->result_array());
	}
		
public function get_problem_report()
	{
		$sum_prob = array();
		$this->db->select('
			cutsize_data.c_id,
			log_cutter_problem.problem_id,
			log_sheet_problem.problem_name,
			');
		$this->db->where('cutter_type',$this->get_cutter());
		$this->db->where('YEAR(date)',$this->get_year());
		$this->db->where('MONTH(date)',$this->get_month());
		$this->db->group_by('log_cutter_problem.problem_id');
		$this->db->join('cutsize_data','cutsize_data.c_id = log_cutter_problem.c_id');
		$this->db->join('log_sheet_problem','log_sheet_problem.problem_id = log_cutter_problem.problem_id');
		$query = $this->db->get('log_cutter_problem')->result_array();

		foreach ($query as $key => $value) {
			array_push($sum_prob,array(
				'problem_name' =>$value['problem_name'],
				'c_id' =>$value['c_id'],
				'shift1' => $this->get_cutsize_minute($value['problem_id'],1),
				'shift2' => $this->get_cutsize_minute($value['problem_id'],2),
				'shift3' => $this->get_cutsize_minute($value['problem_id'],3),
				)
			);
		}
		return $sum_prob;
	}

	public function get_cutsize_minute($problem_id,$shift)
	{
		$this->db->select('
			SUM(log_cutter_problem.total_minutes) as total
			');
		$this->db->join('cutsize_data','cutsize_data.c_id = log_cutter_problem.c_id');
		$this->db->join('log_sheet_problem','log_sheet_problem.problem_id = log_cutter_problem.problem_id');
		$this->db->where('cutsize_data.shift',$shift);
		$this->db->where('log_sheet_problem.problem_id',$problem_id);
		$query = $this->db->get('log_cutter_problem');
		return $query->row('total');
	}

	public function get_year(){
		$date=$this->uri->segment(4);
		return date("Y",strtotime($date));
	}	
	public function  get_month(){
		$date=$this->uri->segment(4);
		return date("m",strtotime($date));
	}
	public function  get_cutter(){
		return $this->uri->segment(3);
	}
	function get_sum_problem($problem){
		$problem=array();
		foreach ($problem as $key => $value1) {
			foreach ($problem as $key => $value1) {

			}
		}
	}
}