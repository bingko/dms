<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class log_ream_model extends CI_Model {
	public function insert_log_ream($data)
	{
		$this->db->insert('log_ream',$data);
	}	
	public function get_log_ream_problem()
	{	
		$this->db->where('cutter_type',3);
		$query = $this->db->get('log_sheet_problem');
		return $query->result_array();
	}	
	public function get_log_ream_detail($shift_id)
	{
		$this->db->where('log_ream_id',$shift_id);
		$query = $this->db->get('log_ream_detail');
		return $query->result_array();
	}
	public function get_log_ream_problem_by_id($log_ream_id)
	{	
		$this->db->where('log_ream_id',$log_ream_id);
		$query = $this->db->get('log_ream_problem');
		return $query->result_array();
	}
	public function update_log_ream($data){
		
	}
	public function search_problem($problem,$problem_value){
		foreach($problem_value as $i=>$value){
			if($value['problem_id']==$problem['problem_id']){
				return $value;
				break;
			}
		}
	}
	public function getDownTime(){
	$this->db->select('
		log_sheet_problem.problem_name,
		SUM(log_ream_problem.total_minutes) as total_minutes
	');
	$this->db->from('log_sheet_problem');
	$this->db->join('log_ream_problem','log_sheet_problem.problem_id=log_ream_problem.problem_id');
	$this->db->join('log_ream','log_ream.log_ream_id=log_ream_problem.log_ream_id');
	$this->db->where('cutter_type',3);
	$this->db->where('MONTH(log_ream.date)',$this-> get_month());
	$this->db->group_by('problem_name');
	$query=$this->db->get();
	return $query->result_array();
	}
		public function get_year(){
		$date=$this->uri->segment(3);
		return date("Y",strtotime($date));
	}	
	public function  get_month(){
		$date=$this->uri->segment(3);
		return date("m",strtotime($date));
	}
	public function get_log_ream_report(){
			$this->db->select('
		DAY(log_ream.date) as day,
		SUM(log_ream_detail.sumweight) as input,
		SUM(log_ream_detail.totalream) as ream
	');
	$this->db->from('log_ream');
	$this->db->join('log_ream_detail','log_ream_detail.log_ream_id=log_ream.log_ream_id');
	$this->db->where('MONTH(log_ream.date)',$this->get_month());
	$this->db->where('YEAR(log_ream.date)',$this->get_year());
	$this->db->group_by('DAY(log_ream.date)');
	$query=$this->db->get();
	return $query->result_array();
	}
}
