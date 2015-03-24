<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting_model extends CI_Model {

	public function list_target()
	{
		$this->db->where('MONTH(target_date)',date('m'));
		$query = $this->db->get('target');
		return $query->result_array();
	}
	public function target_update($list_data)
	{
		$this->db->where('target_id',$list_data['target_id']);
		$this->db->update('target',$list_data);
	}
		
}
