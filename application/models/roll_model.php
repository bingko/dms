<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class roll_model extends CI_Model {

	public function get_sheet_product()
	{
		$this->db->select('
			Rollid1,
			Rollid2,
			Rollid3,
			Rollid4,
			Rollid5,
			');
		$query = $this->db->get('sheet_product');
		return $query->result_array();
	}
	public function get_Roll_Winder($Rollid)
	{
		//$this->db->order_by('id','desc');
		$this->db->where('Rollid2',$Rollid);
		$query = $this->db->get('roll_winder');
		return $query->result_array();
	}
	public function get_PalletID($inData)
	{
		//$this->db->order_by('id','desc');
		$this->db->like('PalletID',$inData);
		$query = $this->db->get('sheet_product');
		return $query->result_array();
	}
	public function get_RollID($inData)
	{
		//$this->db->order_by('id','desc');
		$this->db->like('Rollid1',$inData);
		$this->db->or_like('Rollid2',$inData);
		$this->db->or_like('Rollid3',$inData);
		$this->db->or_like('Rollid4',$inData);
		$this->db->or_like('Rollid5',$inData);
		$query = $this->db->get('sheet_product');
		return $query->result_array();
	}
	public function get_OrderNo($inData)
	{
		//$this->db->order_by('id','desc');
		$this->db->like('OrderNo',$inData);
		$this->db->where('Destination',2);
		$query = $this->db->get('roll_winder');
		return $query->result_array();
	}
	public function intermedate($searchDate)
	{
		//$this->db->select('*')->from(' roll_winder '); 
		$this->db->select('
					id,
					Rollid,
					Rollid2,
					Machineid,
					Winderid,
					ReelNo,
					Date_s,
					Shift_s,
					Date_f,
					Shift_f,
					FinishTime,
					WLBM,
					Type,
					Grade,
					Basisweight,
					CustomerOrder,
					OrderNo,
					Width,
					Length,
					Diameter,
					Calc_W,
					Weight,
					Weight_Net,
					Core,
					Splice,
					Property,
					PLC_Dest,
					Destination,
					New_Dest,
					Remark,
					itemNo,
					saleType,
					Brand,
					PrintNetWeight,
					check,
					COUNT(id) as countRoll,
					SUM(Weight_Net) as sumRoll,

			');
		$this->db->order_by('Grade,Basisweight,saleType,Brand,OrderNo,Width,CustomerOrder,Property','ASC');
		$this->db->group_by('Grade,Basisweight,OrderNo,saleType,Brand,Width,CustomerOrder,Property');
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid1` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid2` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid3` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid4` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid5` FROM `sheet_product`)', NULL, FALSE);
		$arr_start = array(
			'roll_winder.Date_f <='=> $searchDate['end_date']
					);
		$this->db->where($arr_start);
		$New_Dest = array(3,4,5,6);
		$this->db->where_in('roll_winder.New_Dest', $New_Dest);
		$query = $this->db->get('roll_winder');
		//echo $this->db->last_query();
		return $query->result_array();

	}
	public function all_detail($searchDate)
	{
		$this->db->order_by('Grade,Basisweight,saleType,Brand,OrderNo,Width,CustomerOrder,Property','ASC');
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid1` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid2` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid3` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid4` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid5` FROM `sheet_product`)', NULL, FALSE);
		$arr_start = array(
			'roll_winder.Date_f <='=> $searchDate['end_date']
					);
		$this->db->where($arr_start);
		$New_Dest = array(3,4,5,6);
		$this->db->where_in('roll_winder.New_Dest', $New_Dest);
		$query = $this->db->get('roll_winder');
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function getMinDate($searchDate)
	{
		//$this->db->select('*')->from(' roll_winder '); 
		$this->db->select('
					id,
					MIN(Date_f) as start_date,
			');
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid1` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid2` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid3` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid4` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid5` FROM `sheet_product`)', NULL, FALSE);
		$arr_start = array(
			'roll_winder.Date_f <='=> $searchDate['end_date']
					);
		$this->db->where($arr_start);
		$New_Dest = array(3,4,5,6);
		$this->db->where_in('roll_winder.New_Dest', $New_Dest);
		$query = $this->db->get('roll_winder');
		//echo $this->db->last_query();
		return $query->result_array();

	}
	public function get_converting_area_detail_roll($rollData,$searchDate)
	{
		$this->db->order_by('Grade,Basisweight,saleType,Brand,OrderNo,Width,CustomerOrder,Property','ASC');
		//$this->db->select('*')->from(' roll_winder '); 
		$this->db->select('
					id,
					Rollid,
					Rollid2,
					Machineid,
					Winderid,
					ReelNo,
					Date_s,
					Shift_s,
					Date_f,
					Shift_f,
					FinishTime,
					WLBM,
					Type,
					Grade,
					Basisweight,
					CustomerOrder,
					OrderNo,
					Width,
					Length,
					Diameter,
					Calc_W,
					Weight,
					Weight_Net,
					Core,
					Splice,
					Property,
					PLC_Dest,
					Destination,
					New_Dest,
					Remark,
					itemNo,
					saleType,
					Brand,
					PrintNetWeight,
			');
		//$this->db->group_by('Grade,Basisweight,OrderNo,saleType,Brand,Width,CustomerOrder,Property');
		$this->db->where('Grade',$rollData[0]['Grade']);
		$this->db->where('Basisweight',$rollData[0]['Basisweight']);
		$this->db->where('OrderNo',$rollData[0]['OrderNo']);
		$this->db->where('saleType',$rollData[0]['saleType']);
		$this->db->where('Brand',$rollData[0]['Brand']);
		$this->db->where('Width',$rollData[0]['Width']);
		$this->db->where('CustomerOrder',$rollData[0]['CustomerOrder']);
		$this->db->where('Property',$rollData[0]['Property']);

		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid1` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid2` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid3` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid4` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid5` FROM `sheet_product`)', NULL, FALSE);
		$arr_start = array(
			'roll_winder.Date_f >='=> $searchDate['start_date'],
			'roll_winder.Date_f <='=> $searchDate['end_date']
					);
		$this->db->where($arr_start);
		$New_Dest = array(3,4,5,6);
		$this->db->where_in('roll_winder.New_Dest', $New_Dest);
		$query = $this->db->get('roll_winder');
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function get_converting_area_detail_grade($rollData,$searchDate)
	{
		$this->db->order_by('Grade,Basisweight,saleType,Brand,OrderNo,Width,CustomerOrder,Property','ASC');
		//$this->db->select('*')->from(' roll_winder '); 
		$this->db->select('
					id,
					Rollid,
					Rollid2,
					Machineid,
					Winderid,
					ReelNo,
					Date_s,
					Shift_s,
					Date_f,
					Shift_f,
					FinishTime,
					WLBM,
					Type,
					Grade,
					Basisweight,
					CustomerOrder,
					OrderNo,
					Width,
					Length,
					Diameter,
					Calc_W,
					Weight,
					Weight_Net,
					Core,
					Splice,
					Property,
					PLC_Dest,
					Destination,
					New_Dest,
					Remark,
					itemNo,
					saleType,
					Brand,
					PrintNetWeight,
			');
		//$this->db->group_by('Grade,Basisweight,OrderNo,saleType,Brand,Width,CustomerOrder,Property');
		$this->db->where('Grade',$rollData[0]['Grade']);
		$this->db->where('Basisweight',$rollData[0]['Basisweight']);
		$this->db->where('saleType',$rollData[0]['saleType']);
		$this->db->where('Brand',$rollData[0]['Brand']);

		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid1` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid2` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid3` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid4` FROM `sheet_product`)', NULL, FALSE);
		$this->db->where('`Rollid2` NOT IN (SELECT `Rollid5` FROM `sheet_product`)', NULL, FALSE);
		$arr_start = array(
			'roll_winder.Date_f >='=> $searchDate['start_date'],
			'roll_winder.Date_f <='=> $searchDate['end_date']
					);
		$this->db->where($arr_start);
		$New_Dest = array(3,4,5,6);
		$this->db->where_in('roll_winder.New_Dest', $New_Dest);
		$query = $this->db->get('roll_winder');
		//echo $this->db->last_query();
		return $query->result_array();
	}
	public function roll_insert($list_data)
	{
		$this->db->insert('roll_winder', $list_data);
	}
	public function roll_delete($list_data)
	{
		$this->db->where('id',$list_data['id']);
		$this->db->delete('roll_winder');
	}
	public function roll_update($inData)
	{
		$this->db->where('id',$inData['id']);
		$this->db->update('roll_winder',$inData);
	}
		
}
