<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nplan_model extends CI_Model {

	
	public function list_allnplan_ct1()
	{
		$this->db->where('cut_size',1);
		$query = $this->db->get('nplan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}
	public function list_allnplan_ct4()
	{
		$this->db->where('cut_size',4);
		$query = $this->db->get('nplan');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}
	public function get_orderNo($InData,$limit_date)
	{
		$this->db->order_by('FinishTime','desc');
		$this->db->like('CustomerOrder',$InData['CustomerOrder']);
		$this->db->where('WLBM',$InData['WLBM']);
		$this->db->where('FinishTime >=',$limit_date);
		$query = $this->db->get('sheet_product');
		return $query->result_array(); 
	}
	public function get_pallet_done($InData,$limit_date)
	{
		$this->db->order_by('sheet_product.FinishTime','desc');
		$this->db->like('sheet_product.CustomerOrder',$InData['CustomerOrder']);
		$this->db->where('sheet_product.FinishTime >=',$limit_date);
		$this->db->where('sheet_product.WLBM',$InData['WLBM']);
		$this->db->join('roll_winder','roll_winder.Rollid2 = sheet_product.Rollid1');
		$query = $this->db->get('sheet_product');
		return $query->result_array(); 
	}
	public function get_pallet_newest($cut_size)
	{
		$this->db->order_by('PalletID','desc');
		$this->db->where('Sheeter',$cut_size);
		$query = $this->db->get('sheet_product',1);
		return $query->result_array(); 
	}

	public function updateImportStatus($InData)
	{
		$this->db->where('cut_size',$InData['cut_size']);
		$this->db->where('(`eo` = "" AND `co` = "") OR (`eo` = "END" OR `co` ="END")');		
		$this->db->update('nplan',$InData);
		//echo $this->db->last_query();
	}
	public function updateStatus($UpdateData)
	{
		$this->db->where('nplan_id',$UpdateData['nplan_id']);
		$this->db->update('nplan',$UpdateData);
	}
	public function get_order_detail($InData)
	{
		$this->db->where('material',$InData['WLBM']);
		$CustomerOrder = "(`eo` = '".$InData['CustomerOrder']."' OR `co` = '".$InData['CustomerOrder']."')";		
		$this->db->where($CustomerOrder);
		$this->db->where('status !=', 2);
		$query = $this->db->get('nplan');
		return $query->result_array(); 
	}
	public function truncate()
	{
		$this->db->truncate('nplan'); 
	}
	public function get_next_order($nplan_id)
	{
		$this->db->order_by('nplan_id','asc');
		$this->db->where('status',0);
		$this->db->where('nplan_id >',$nplan_id);
		$query = $this->db->get('nplan');
		return $query->result_array(); 
	}
	public function get_old_order($nplan_id)
	{
		$this->db->order_by('nplan_id','asc');
		$this->db->where('status',2);
		$this->db->where('nplan_id <',$nplan_id);
		$this->db->where('(`eo` != "" AND `co` != "")');
		$query = $this->db->get('nplan');
		return $query->result_array(); 
	}
	public function get_order_done()
	{
		$this->db->select('
			order_no,finish_date
			');
		$this->db->order_by('nplan_id','desc');
		$this->db->where('status',2);
		$this->db->where('(`eo` != "" AND `co` != "")');
		$query = $this->db->get('nplan',2);
		return $query->result_array(); 
	}
	public function get_order_stale()
	{
		$this->db->select('
			order_no,
			finish_date
			');
		$this->db->order_by('nplan_id','desc');
		$this->db->where('status',3);
		$query = $this->db->get('nplan',2);
		return $query->result_array(); 
	}


}