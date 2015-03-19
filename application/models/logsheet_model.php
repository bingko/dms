<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class logsheet_model extends CI_Model {

	public function logSheetInsert($inData)
	{
		  $this->db->insert('cutsize_data',$inData);
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
	public function getLogSheet_shift($InData){
		//$this->db->select('c_id');
		$this->db->where('shift',$InData['shift']);
		$this->db->where('date',$InData['date']);
		$this->db->where('cut_size',$InData['cut_size']);
		$query = $this->db->get('cutsize_data');
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
	public function getLogSheet_remark_detail($c_id)
	{
		$this->db->where('c_id',$c_id);
		$query = $this->db->get('log_cutsize_remark');
		return $query->result_array();
	}
	
	 
}
