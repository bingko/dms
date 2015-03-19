<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cutsize_model extends CI_Model {
	public function get_sheet_product($date,$enddate,$sheeter)
	{
		//exit();
		$this->db->select('
			Sheeter,
			Shift_q,
			CustomerOrder,
			COUNT(DISTINCT SUBSTRING(`PalletID`, 9, 1)) As out_pallet,
			SUBSTRING(`PalletID`, 5, 3) AS lot,
			FinishTime,
			Grade,
			Basisweight,
			WLBM,
			Calc_W,
			(SELECT Width FROM roll_winder AS b WHERE b.Rollid2=a.Rollid1)AS roll_width,
			(SELECT Brand FROM roll_winder AS b WHERE b.Rollid2=a.Rollid1)AS Brand,
			Rollid1,
			Rollid2,
			Rollid3,
			Rollid4,
			Rollid5,
			Ream,
			Width,
			Length,
			SUM(Ream) as Ream,
			(SELECT saleType FROM roll_winder AS b WHERE b.Rollid2=a.Rollid1) AS sale_type,
			(SELECT SUM(Weight_Net) FROM roll_winder AS b WHERE b.Rollid2=a.Rollid1 ) AS input1,
			(SELECT SUM(Weight_Net) FROM roll_winder AS b WHERE b.Rollid2=a.Rollid2) AS input2,
			(SELECT SUM(Weight_Net) FROM roll_winder AS b WHERE b.Rollid2=a.Rollid3) AS input3,
			(SELECT SUM(Weight_Net) FROM roll_winder AS b WHERE b.Rollid2=a.Rollid4) AS input4,
			(SELECT SUM(Weight_Net) FROM roll_winder AS b WHERE b.Rollid2=a.Rollid5) AS input5,
			SUM(CASE WHEN SUBSTRING(`PalletID`,-1)="S" THEN Ream END) AS Sort,
			SUM(CASE WHEN SUBSTRING(`PalletID`,-1)="N" THEN Ream END) AS N,
			
			',FALSE);
		$this->db->group_by('lot,WLBM');
		$this->db->order_by('FinishTime');
		$this->db->where('FinishTime >= "'.$date.'" AND FinishTime <="'.$enddate.'"');
		$this->db->where('Sheeter',$sheeter);
		$this->db->from('sheet_product AS a');
		$query = $this->db->get();
		//print_r('<pre>');
		//print_r($this->db->last_query());
		//print_r($query->result_array());
		//exit();
		return $query->result_array();
	}
		
}
