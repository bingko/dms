<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class folio_model extends CI_Model {

	
	public function list_allnplan()
	{
		$query = $this->db->get('nplan2');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
	}
	public function nplan_update($list_data)
	{
		$this->db->where('nplan_id',$list_data['nplan_id']);
		$this->db->update('nplan2',$list_data);
	}
	public function get_orderNo($InData,$limit_date)
	{
		//$this->db->like('CustomerOrder',$InData['CustomerOrder']);
		$this->db->where('WLBM',$InData['WLBM']);
		$this->db->where('FinishTime >=',$limit_date);
		// $this->db->where('Grade',$palletData['Grade']);
		// $this->db->where('Basisweight',$palletData['Basisweight']);
		// $this->db->where('Width',$palletData['Width']);
		$query = $this->db->get('sheet_product');
		return $query->result_array(); 
	}
	public function get_pallet_done($InData,$limit_date)
	{
		$this->db->order_by('sheet_product.FinishTime','desc');
		//$this->db->like('sheet_product.CustomerOrder',$InData['CustomerOrder']);
		$this->db->where('sheet_product.WLBM',$InData['WLBM']);
		$this->db->where('sheet_product.FinishTime >=',$limit_date);
		$this->db->join('roll_winder','roll_winder.Rollid2 = sheet_product.Rollid1');
		// $this->db->where('Grade',$palletData['Grade']);
		// $this->db->where('Basisweight',$palletData['Basisweight']);
		// $this->db->where('Width',$palletData['Width']);
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
		//$eo = array(null,'END');
		$this->db->where('(`eo` = "" AND `co` = "") OR (`eo` = "END" OR `co` ="END")');		
		//$this->db->where('co',null);
		// $this->db->or_where('eo','END');
		// $this->db->or_where('co','END');


		$this->db->update('nplan2',$InData);
		//echo $this->db->last_query();
	}
	public function updateStatus($InData)
	{
		$this->db->where('nplan_id',$InData['nplan_id']);
		$this->db->update('nplan2',$InData);
	}
	public function get_order_detail($InData)
	{
		//$this->db->where('status',0);
		$this->db->where('material',$InData['WLBM']);
		//$this->db->where('co_eo',$InData['CustomerOrder']);
		
		// $this->db->where('Grade',$palletData['Grade']);
		// $this->db->where('Basisweight',$palletData['Basisweight']);
		// $this->db->where('Width',$palletData['Width']);
		$query = $this->db->get('nplan2');
		return $query->result_array(); 
	}
	public function truncate()
	{
		$this->db->truncate('nplan2'); 
	}
	public function get_next_order($nplan_id)
	{
		$this->db->order_by('nplan_id','asc');
		$this->db->where('status',0);
		$this->db->where('nplan_id >',$nplan_id);
		
		// $this->db->where('Grade',$palletData['Grade']);
		// $this->db->where('Basisweight',$palletData['Basisweight']);
		// $this->db->where('Width',$palletData['Width']);
		$query = $this->db->get('nplan2');
		return $query->result_array(); 
	}
	public function get_old_order($nplan_id)
	{
		$this->db->order_by('nplan_id','asc');
		$this->db->where('status',2);
		$this->db->where('nplan_id <',$nplan_id);
		
		
		// $this->db->where('Grade',$palletData['Grade']);
		// $this->db->where('Basisweight',$palletData['Basisweight']);
		// $this->db->where('Width',$palletData['Width']);
		$query = $this->db->get('nplan2');
		return $query->result_array(); 
	}
	public function compare_order_folio($folio)
	{
		$this->db->order_by('PalletID','desc');
		$this->db->where('Sheeter',$folio);
		$query = $this->db->get('sheet_product',1);
		return $query->result_array(); 
	}
	public function getTotalReam()
	{
		$this->db->select('SUM(value) as sumReam');
		$this->db->order_by('id','asc');
		$query = $this->db->get('config_value',2);
		return $query->result_array(); 
	}
	public function updateValue($InData)
	{
		$this->db->where('id',$InData['id']);
		$this->db->update('config_value',$InData);
	}
	public function get_order_done()
	{
		$this->db->select('
			order_id as order_no,
			date_store as finish_date
			');
		$this->db->order_by('nplan_id','desc');
		$this->db->where('status',2);
		$query = $this->db->get('nplan2',2);
		return $query->result_array(); 
	}
	public function get_order_stale()
	{
		$this->db->select('
			order_id as order_no,
			date_store as finish_date
			');
		$this->db->order_by('nplan_id','desc');
		$this->db->where('status',3);
		$query = $this->db->get('nplan2',2);
		return $query->result_array(); 
	}


}