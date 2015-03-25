<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logsheet_model extends CI_Model {

	public function logSheetInsert($inData)
	{
		  $this->db->insert('cutsize_data',$inData);
		  $insert_id = $this->db->insert_id();
		   $this->db->trans_complete();
		   return  $insert_id;
	}
	public function folioInsert($inData)
	{
		  $this->db->insert('folio_data',$inData);
		  $insert_id = $this->db->insert_id();
		   $this->db->trans_complete();
		   return  $insert_id;
	}
	public function logSheetUpdate($inData)
	{
		$this->db->where('c_id',$inData['c_id']);
		$this->db->update('cutsize_data',$inData);
	}
	public function cutSizePrombleInsert($inData)
	{
		  $this->db->insert('log_cutter_problem',$inData);
	}
	public function folioPrombleInsert($inData)
	{
		  $this->db->insert('log_folio_problem',$inData);
	}
	public function folioReelInsert($inData)
	{
		  $this->db->insert('log_folio_reel',$inData);
	}
	public function folioSetInsert($inData)
	{
		  $this->db->insert('log_folio_set',$inData);
	}
	public function folioRemarkInsert($inData)
	{
		  $this->db->insert('log_folio_remark',$inData);
	}
	public function folioUpdate($inData)
	{
		$this->db->where('f_id',$inData['f_id']);
		$this->db->update('folio_data',$inData);
	}
	public function folioRemarkUpdate($inData)
	{
		$this->db->where('lfr_id',$inData['lfr_id']);
		$this->db->update('log_folio_remark',$inData);
	}
	public function cutSizePrombleUpdate($inData)
	{
		$this->db->where('cp_id',$inData['cp_id']);
		$this->db->update('log_cutter_problem',$inData);
	}
	public function cutSizeRemarkInsert($inData)
	{
		  $this->db->insert('log_cutsize_remark',$inData);
	}
	public function cutSizeRemarkUpdate($inData)
	{
		$this->db->where('lcr_id',$inData['lcr_id']);
		$this->db->update('log_cutsize_remark',$inData);
	}
	public function count_cutsize($inData)
	{
		$this->db->where('cut_size',$inData['cut_size']);
		$this->db->where('date',$inData['date']);
		$this->db->where('shift',$inData['shift']);
		$query = $this->db->get('cutsize_data');
		return $query->num_rows();
	}
	public function count_folio($inData)
	{
		$this->db->where('cutter',$inData['cut_size']);
		$this->db->where('date',$inData['date']);
		$this->db->where('shift',$inData['shift']);
		$query = $this->db->get('folio_data');
		return $query->num_rows();
	}
	public function count_ream($inData)
	{
		$this->db->where('date',$inData['date']);
		$this->db->where('shift',$inData['shift']);
		$query = $this->db->get('log_ream');
		return $query->num_rows();
	}

	public function getLogSheet(){
			$outData = array("xx" => "1111" ,"xx" => "2222" );
			echo json_encode($outData);
	}
	public function get_problem($cutter_type)
	{
		$this->db->where('cutter_type',$cutter_type);
		$query = $this->db->get('log_sheet_problem');
		return $query->result_array();
	}
	public function problem_insert($list_data)
	{
		$this->db->insert('log_sheet_problem', $list_data);
	}
	public function problem_delete($list_data)
	{
		$this->db->where('problem_id',$list_data['problem_id']);
		$this->db->delete('log_sheet_problem');
	}
	public function problem_update($list_data)
	{
		$this->db->where('problem_id',$list_data['problem_id']);
		$this->db->update('log_sheet_problem',$list_data);
	}
	public function getLogSheet_cutsize_shift($InData){
		$this->db->select('
					cutsize_data.grade_gram,
					cutsize_data.mat_no,
					cutsize_data.total_ream,
					cutsize_data.output_weight,
					cutsize_data.set,
					cutsize_data.c_id
				');
		$this->db->order_by('cutsize_data.set','asc');
		$this->db->where('shift',$InData['shift']);
		$this->db->where('date',$InData['date']);
		$this->db->where('cut_size',$InData['cut_size']);
		$query = $this->db->get('cutsize_data');
		return $query->result_array();
	}
	public function getLogSheet_folio_shift($InData){
		$this->db->where('shift',$InData['shift']);
		$this->db->where('date',$InData['date']);
		$this->db->where('cutter',$InData['cut_size']);
		$query = $this->db->get('folio_data');
		return $query->result_array();
	}
	public function getLogSheet_ream_shift($InData){
		//$this->db->select('c_id');
		$this->db->where('shift',$InData['shift']);
		$this->db->where('date',$InData['date']);
		$query = $this->db->get('log_ream');
		return $query->result_array();
	}
	public function getLogSheet_set_detail($c_id)
	{
		$this->db->where('c_id',$c_id);
		$query = $this->db->get('cutsize_data');
		return $query->result_array();
	}
	public function getLogSheet_problem_detail($c_id)
	{
		$this->db->where('c_id',$c_id);
		$query = $this->db->get('log_cutter_problem');
		return $query->result_array();
	}
	public function getLogSheet_remark_detail($InData)
	{
		$this->db->where('cut_size',$InData['cut_size']);
		$this->db->where('date',$InData['date']);
		$this->db->where('shift',$InData['shift']);
		$query = $this->db->get('log_cutsize_remark');
		return $query->result_array();
	}
	public function getLogSheet_folio_detail($f_id)
	{
		$this->db->where('f_id',$f_id);
		$query = $this->db->get('folio_data');
		return $query->result_array();
	}
	public function getLogSheet_folio_problem_detail($f_id)
	{
		$this->db->where('f_id',$f_id);
		$query = $this->db->get('log_folio_problem');
		return $query->result_array();
	}
	public function getLogSheet_folio_remark_detail($InData)
	{
		$this->db->where('cut_size',$InData['cut_size']);
		$this->db->where('date',$InData['date']);
		$this->db->where('shift',$InData['shift']);
		$query = $this->db->get('log_folio_remark');
		return $query->result_array();
	}
	public function getLogSheet_folio_reel_detail($f_id)
	{
		$this->db->where('f_id',$f_id);
		$query = $this->db->get('log_folio_reel');
		return $query->result_array();
	}
	public function getLogSheet_folio_set_detail($f_id)
	{
		$this->db->where('f_id',$f_id);
		$query = $this->db->get('log_folio_set');
		return $query->result_array();
	}
	public function get_problem_report($cutter_type)
	{
		$this->db->select('
			cutsize_data.shift,
			log_cutter_problem.problem_id,
			log_sheet_problem.problem_name,
			SUM(log_cutter_problem.total_minutes) as total_minutes
			');
		$this->db->where('cutter_type',$cutter_type);
		$this->db->group_by('cutsize_data.shift,log_cutter_problem.problem_id');
		$this->db->join('cutsize_data','cutsize_data.c_id = log_cutter_problem.c_id');
		$this->db->join('log_sheet_problem','log_sheet_problem.problem_id = log_cutter_problem.problem_id');
		$query = $this->db->get('log_cutter_problem');
		return $query->result_array();
	}
	public function get_cutsize_problem_shift($InData)
	{
		$this->db->select('
			log_cutter_problem.problem_id,
			log_cutter_problem.total_minutes,
			log_cutter_problem.problem_remark,
			log_cutter_problem.c_id,
			cutsize_data.set
			');
		$this->db->where('cutsize_data.cut_size',$InData['cut_size']);
		$this->db->where('cutsize_data.date',$InData['date']);
		$this->db->where('cutsize_data.shift',$InData['shift']);
		$this->db->join('log_cutter_problem','log_cutter_problem.c_id = cutsize_data.c_id ');
		$query = $this->db->get('cutsize_data');
		return $query->result_array();
	} 
	public function get_folio_problem_shift($InData)
	{
		$this->db->select('
			log_folio_problem.problem_id,
			log_folio_problem.min,
			log_folio_problem.problem_remark,
			log_folio_problem.f_id,
			folio_data.set
			');
		$this->db->where('folio_data.cutter',$InData['cut_size']);
		$this->db->where('folio_data.date',$InData['date']);
		$this->db->where('folio_data.shift',$InData['shift']);
		$this->db->join('log_folio_problem','log_folio_problem.f_id = folio_data.f_id ');
		$query = $this->db->get('folio_data');
		return $query->result_array();
	}
}
