<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_model extends CI_Model {

	
	public function list_user()
	{
		$this->db->select('
			user_id,
			user_name,
			user_email,
			user_section,
			user_level
			');
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function user_insert($list_data)
	{
		$this->db->insert('user', $list_data);
	}
	public function user_delete($list_data)
	{
		$this->db->where('user_id',$list_data['user_id']);
		$this->db->delete('user');
	}
	public function user_update($list_data)
	{
		$this->db->where('user_id',$list_data['user_id']);
		$this->db->update('user',$list_data);
	}
	
	public function user_forget($user_email)
	{
		$this->db->where('user_email',$user_email);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function re_password($mail)
	{
		$this->db->where('user_email',$mail);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function user_change($inpost)
	{
		$this->db->where('user_id',$inpost['user_id']);
		$this->db->update('user',$inpost);
	}
	public function user_where($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function checkLogin($inData)
	{
		$this->db->where("user_email",$inData["username"]);
		$this->db->where("user_password",$inData["password"]);
		$query = $this->db->get("user");
		return $query->result_array();
	}
	public function list_reviewer()
	{
		$this->db->where('user.user_level',2);
		//$this->db->join('permission','permission.cn = user.user_id','right outer');
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function getUserByDept($departmentId)
	{
		$this->db->where('user_section',$departmentId);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function getUserSendmail()
	{
		$this->db->or_where('user.user_level',3);
		$this->db->or_where('user.user_level',5);
		$query = $this->db->get('user');
		return $query->result_array();
	}
	
}
