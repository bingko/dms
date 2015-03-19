<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
		$this->load->view('monitor-ajax');
	}
	public function monitor()
	{
		$this->load->view('monitor');
	}
	public function cut_size()
	{
		
		$cut_size = $this->uri->segment(3) ;
		switch($cut_size){
			case "1" : { 
				$data['header'] = 'Cut Size 1';
				$data['cut_size'] = 1 ;
				$nplan_model = 'nplan_model';
		 		break; 
		 	}case "4" : { 
				$data['header'] = 'Cut Size 4';
				$data['cut_size'] = 4 ;
				$nplan_model = 'nplan4_model';
		 		break; 
		 	}
		}
		$list_nplan = $this->$nplan_model->get_pallet_newest($cut_size);

		// Check น้ำหนักที่เสร็จ //
		$InData = array(
			'CustomerOrder' => $list_nplan[0]['CustomerOrder'],
			'WLBM' => $list_nplan[0]['WLBM'],//substr($list_nplan[0]['WLBM'],0,9),
			);
		
		// ดึงข้อมูลจาก Nplan //
		$data['nplan'] = $this->$nplan_model->get_order_detail($InData);
		// echo "<Pre>";
		// print_r($list_nplan);
		// print_r($InData);
		// print_r($data['nplan']);

		if(empty($data['nplan'])){
			$data['nplan'][0] = array
		        (
		            'nplan_id' => 'n/a',
		            'start_date' => 'n/a',
		            'finish_date' => 'n/a',
		            'DTWH' => 'n/a',
		            'load_date' => 'n/a',
		            'order_no' => 'n/a',
		            'grade' => 'n/a',
		            'cutter' => 'n/a',
		            'bw' => 'n/a',
		            'size' => 'n/a',
		            'cap' => 'n/a',
		            'brand' => 'n/a',
		            'eo' => 'n/a',
		            'co' => 'n/a',
		            'material' => 'n/a',
		            'material_desc' => 'n/a',
		            'prod_qty_ton' => 'n/a',
		            'prod_qty_class' => 'n/a',
		            'rm_per_pallet' => 'n/a',
		            'wrapper' => 'n/a',
		            'box_lid' => 'n/a',
		            'pallet_size' => 'n/a',
		            'mdf_size' => 'n/a',
		            'pl_qty' => 'n/a',
		            'mdf_qty' => 'n/a',
		            'material_note' => 'n/a',
		            'dom_per_exp' => 'n/a',
		            'country' => 'n/a',
		            'sale_rep_remark' => 'n/a',
		            'cut_size' => 'n/a',
		            'status' => 1
		        );
			$data['real_time'] = 'n/a';
		}else{
                /*
                 nplan.Status
                 0 = ยังไม่ทำ
                 1 = กำลังทำ
                 2 = เสร็จแล้ว
                 3 = งานค้าง
                */
		$UpdateData = array(
            'nplan_id' => $data['nplan'][0]['nplan_id'],
            'status' => 1 
            );
        $this->$nplan_model->updateStatus($UpdateData);
		}

		$date = new DateTime($list_nplan[0]['FinishTime']);
		$date->sub(new DateInterval('P5D'));
		$limit_date = $date->format('Y-m-d');		
		$roll_done = $this->$nplan_model->get_orderNo($InData,$limit_date);
		$data['real_time'] = $roll_done[0]['FinishTime'];
		
		// คำนวณน้ำหนักที่กำลังทำ //
		$sum_Weight = 0;
		for($i=0;$i<count($roll_done);$i++){
			$sum_Weight += $roll_done[$i]['Calc_W'];	
		}

		$data['sum_Weight_done'] = $sum_Weight ;
		$data['roll_doing'] = $roll_done;

		$this->load->view('cut-size',$data);
	}

	public function folio()
	{
		$cut_size = $this->uri->segment(3) ;
		$nplan_model = 'folio_model';

		switch($cut_size){
			case "2" : { 
				$data['header'] = 'Folio 1';
				$data['cut_size'] = 2 ;
		 		break; 
		 	}case "3" : { 
				$data['header'] = 'Folio 2';
				$data['cut_size'] = 3 ;
		 		break; 
		 	}
		}

		$list_nplan = $this->$nplan_model->get_pallet_newest($cut_size);

		// echo "<Pre>";
		// print_r($list_nplan);
		// Check น้ำหนักที่เสร็จ //
		$InData = array(
			'CustomerOrder' => $list_nplan[0]['CustomerOrder'],
			'WLBM' => $list_nplan[0]['WLBM'],//substr($list_nplan[0]['WLBM'],0,9),
			);
		
		// ดึงข้อมูลจาก Nplan //
		$data['nplan'] = $this->$nplan_model->get_order_detail($InData);
			if(empty($data['nplan'])){
				$data['nplan'][0] = array
			        (
			        	'nplan_id'  => 'n/a', 
			            'order_id'  => 'n/a', 
			            'Grade'  => 'n/a', 
			            'Basisweight'  => 'n/a', 
			            'size'  => 'n/a', 
			            'Ream'  => 'n/a', 
			            'total_weight' => 'n/a',
			            'pallet_size'  => 'n/a', 
			            'rm_per_pallet'  => 'n/a', 
			            'pl_require_qty'  => 'n/a', 
			            'sent'  => 'n/a', 
			            'stale'  => 'n/a', 
			            'date_store'  => 'n/a', 
			            'material'  => 'n/a',  
			            'co_eo'  => 'n/a', 
			            'remark'  => 'n/a', 
			            'status'  => 'n/a', 
			        );
			    $data['real_time'] = 'n/a';
				
			}
		//print_r($data['nplan']);
		$date = new DateTime($list_nplan[0]['FinishTime']);
		$date->sub(new DateInterval('P5D'));
		$limit_date = $date->format('Y-m-d');
		$roll_done = $this->$nplan_model->get_orderNo($InData,$limit_date);

		// echo "<pre>";
		// print_r($roll_done);

		// คำนวณน้ำหนักที่กำลังทำ //
		$sum_Ream = 0;
		$sum_Weight = 0;
		for($i=0;$i<count($roll_done);$i++){
			$sum_Ream += $roll_done[$i]['Ream'];
			$sum_Weight += $roll_done[$i]['Calc_W'];	
		}
		// echo $sum_Ream;
		// exit();
		// echo "<pre>";
		// Check same order in folio1/2 //
		$folio = 2;
		$pallet_f1 = $this->$nplan_model->compare_order_folio($folio);
		$InData['WLBM'] = $pallet_f1[0]['WLBM'];
		$order_f1 = $this->$nplan_model->get_order_detail($InData);
		//print_r($order_f1);
		$folio = 3;
		$pallet_f2 = $this->$nplan_model->compare_order_folio($folio);
		$InData['WLBM'] = $pallet_f2[0]['WLBM'];
		$order_f2 = $this->$nplan_model->get_order_detail($InData);
		//print_r($order_f2);

		if(!empty($order_f1)||!empty($order_f2)){
			if($order_f1[0]['material']==$order_f2[0]['material']){
				//$this->session->sess_destroy();	
				if($cut_size==2){
						$InData = array(
							'id' => 1,
							'value' => $sum_Ream  ,
						);
						$this->$nplan_model->updateValue($InData);

				}elseif($cut_size==3){
						$InData = array(
							'id' => 2,
							'value' => $sum_Ream ,
						);
						$this->$nplan_model->updateValue($InData);
				}
				$data['totalReam'] = $this->$nplan_model->getTotalReam();
			}
		}
		// setสถานะที่เสร็จแล้ว //
 		$data['real_time'] = $roll_done[0]['FinishTime'];
   //      $InData = array(
   //          'nplan_id' => $data['nplan'][0]['nplan_id'],
   //          'status' => 2 
   //          );
   //      $this->nplan2_model->updateStatus($InData);

		$data['sum_Weight_done'] = $sum_Weight ;
		$data['sum_Ream_done'] = $sum_Ream ;
		$data['roll_doing'] = $roll_done;
		
		$this->load->view('cut-size2',$data);
	}
	
	public function detail_cut_size()
	{
		$cut_size = $this->uri->segment(3) ;
		switch($cut_size){
			case "1" : { 
				$data['header'] = 'Cut Size 1';
				$data['cut_size'] = 1 ;
				$nplan_model = 'nplan_model';
				$cut_size = 1 ;
		 		break; 
		 	}case "4" : { 
				$data['header'] = 'Cut Size 4';
				$data['cut_size'] = 4 ;
				$nplan_model = 'nplan4_model';
				$cut_size = 4 ;
		 		break; 
		 	}
		}
		$list_nplan = $this->$nplan_model->get_pallet_newest($cut_size);
		$Rollid =  $list_nplan[0]['Rollid1'];

		// Check น้ำหนักที่เสร็จ //
		$InData = array(
			'CustomerOrder' => $list_nplan[0]['CustomerOrder'],
			'WLBM' => $list_nplan[0]['WLBM'],//substr($list_nplan[0]['WLBM'],0,9),
			);
		
		// ดึงข้อมูลจาก Nplan //
		$data['nplan'] = $this->$nplan_model->get_order_detail($InData);

		if(empty($data['nplan'])){
			$data['nplan'][0] = array
		        (
		            'nplan_id' => 'n/a',
		            'start_date' => 'n/a',
		            'finish_date' => 'n/a',
		            'DTWH' => 'n/a',
		            'load_date' => 'n/a',
		            'order_no' => 'n/a',
		            'grade' => 'n/a',
		            'cutter' => 'n/a',
		            'bw' => 'n/a',
		            'size' => 'n/a',
		            'cap' => 'n/a',
		            'brand' => 'n/a',
		            'eo' => 'n/a',
		            'co' => 'n/a',
		            'material' => 'n/a',
		            'material_desc' => 'n/a',
		            'prod_qty_ton' => 'n/a',
		            'prod_qty_class' => 'n/a',
		            'rm_per_pallet' => 'n/a',
		            'wrapper' => 'n/a',
		            'box_lid' => 'n/a',
		            'pallet_size' => 'n/a',
		            'mdf_size' => 'n/a',
		            'pl_qty' => 'n/a',
		            'mdf_qty' => 'n/a',
		            'material_note' => 'n/a',
		            'dom_per_exp' => 'n/a',
		            'country' => 'n/a',
		            'sale_rep_remark' => 'n/a',
		            'cut_size' => 'n/a',
		            'status' => 1
		        );
			$data['real_time'] = 'n/a';
			
			$data['next_plan'] = '';
			$data['old_plan'] = '';
		}else{
			$nplan_id = $data['nplan'][0]['nplan_id'];
			$data['next_plan'] = $this->$nplan_model->get_next_order($nplan_id);
			$data['old_plan'] = $this->$nplan_model->get_old_order($nplan_id);
		// convert Grade //
		$Grade = $data['nplan'][0]['grade'] ;
			if($Grade==0){ 
					$data['nplan'][0]['grade'] = "OSP";
			}elseif($Grade==1){ 
					$data['nplan'][0]['grade'] = "PPC";
			}elseif($Grade==2){ 
					$data['nplan'][0]['grade'] = "EPP";
			}elseif($Grade==4){ 
					$data['nplan'][0]['grade'] = "LPP";
			}
			$UpdateData = array(
	            'nplan_id' => $data['nplan'][0]['nplan_id'],
	            'status' => 1
	            );
	        $this->$nplan_model->updateStatus($UpdateData);
		}
		$date = new DateTime($list_nplan[0]['FinishTime']);
		$date->sub(new DateInterval('P5D'));
		$limit_date = $date->format('Y-m-d');
		$data['pallet_done'] = $this->$nplan_model->get_pallet_done($InData,$limit_date);

		$roll_done = $this->$nplan_model->get_orderNo($InData,$limit_date);
		$data['real_time'] = $roll_done[0]['FinishTime'];
		
		// คำนวณน้ำหนักที่กำลังทำ //
		$sum_Weight = 0;
		for($i=0;$i<count($roll_done);$i++){
			$sum_Weight += $roll_done[$i]['Calc_W'];	
		}

		$data['sum_Weight_done'] = $sum_Weight ;
		$data['roll_doing'] = $roll_done;


		$this->load->view('detail_cut_size',$data);
	}
	public function detail_folio()
	{
		$cut_size = $this->uri->segment(3) ;
		$nplan_model = 'folio_model';

		switch($cut_size){
			case "2" : { 
				$data['header'] = 'Folio 1';
				$data['cut_size'] = 2 ;
		 		break; 
		 	}case "3" : { 
				$data['header'] = 'Folio 2';
				$data['cut_size'] = 3 ;
		 		break; 
		 	}
		}

		$list_nplan = $this->$nplan_model->get_pallet_newest($cut_size);

		// echo "<Pre>";
		// print_r($list_nplan);
		// Check น้ำหนักที่เสร็จ //
		$InData = array(
			'CustomerOrder' => $list_nplan[0]['CustomerOrder'],
			'WLBM' => $list_nplan[0]['WLBM'],//substr($list_nplan[0]['WLBM'],0,9),
			);
		
		// ดึงข้อมูลจาก Nplan //
		$data['nplan'] = $this->$nplan_model->get_order_detail($InData);
			if(empty($data['nplan'])){
				$data['nplan'][0] = array
			        (
			        	'nplan_id'  => 'n/a', 
			            'order_id'  => 'n/a', 
			            'Grade'  => 'n/a', 
			            'Basisweight'  => 'n/a', 
			            'size'  => 'n/a', 
			            'Ream'  => 'n/a', 
			            'total_weight' => 'n/a',
			            'pallet_size'  => 'n/a', 
			            'rm_per_pallet'  => 'n/a', 
			            'pl_require_qty'  => 'n/a', 
			            'sent'  => 'n/a', 
			            'stale'  => 'n/a', 
			            'date_store'  => 'n/a', 
			            'material'  => 'n/a',  
			            'co_eo'  => 'n/a', 
			            'remark'  => 'n/a', 
			            'status'  => 'n/a', 
			        );
			    $data['real_time'] = 'n/a';
				$data['next_plan'] = '';
				$data['old_plan'] = '';
			}else{
				$nplan_id = $data['nplan'][0]['nplan_id'];
				$data['next_plan'] = $this->$nplan_model->get_next_order($nplan_id);
				$data['old_plan'] = $this->$nplan_model->get_old_order($nplan_id);
			}
		//print_r($data['nplan']);
		$date = new DateTime($list_nplan[0]['FinishTime']);
		$date->sub(new DateInterval('P5D'));
		$limit_date = $date->format('Y-m-d');
		$data['pallet_done'] = $this->$nplan_model->get_pallet_done($InData,$limit_date);
		$roll_done = $this->$nplan_model->get_orderNo($InData,$limit_date);

		// echo "<pre>";
		// print_r($roll_done);

		// คำนวณน้ำหนักที่กำลังทำ //
		$sum_Ream = 0;
		$sum_Weight = 0;
		for($i=0;$i<count($roll_done);$i++){
			$sum_Ream += $roll_done[$i]['Ream'];
			$sum_Weight += $roll_done[$i]['Calc_W'];	
		}
		// echo $sum_Ream;
		// exit();
		// echo "<pre>";
		// Check same order in folio1/2 //
		$folio = 2;
		$pallet_f1 = $this->$nplan_model->compare_order_folio($folio);
		$InData['WLBM'] = $pallet_f1[0]['WLBM'];
		$order_f1 = $this->$nplan_model->get_order_detail($InData);
		//print_r($order_f1);
		$folio = 3;
		$pallet_f2 = $this->$nplan_model->compare_order_folio($folio);
		$InData['WLBM'] = $pallet_f2[0]['WLBM'];
		$order_f2 = $this->$nplan_model->get_order_detail($InData);
		//print_r($order_f2);

		if(!empty($order_f1)||!empty($order_f2)){
			if($order_f1[0]['material']==$order_f2[0]['material']){
				//$this->session->sess_destroy();	
				if($cut_size==2){
						$InData = array(
							'id' => 1,
							'value' => $sum_Ream  ,
						);
						$this->$nplan_model->updateValue($InData);

				}elseif($cut_size==3){
						$InData = array(
							'id' => 2,
							'value' => $sum_Ream ,
						);
						$this->$nplan_model->updateValue($InData);
				}
				$data['totalReam'] = $this->$nplan_model->getTotalReam();
			}
		}
		// setสถานะที่เสร็จแล้ว //
 		$data['real_time'] = $roll_done[0]['FinishTime'];
   //      $InData = array(
   //          'nplan_id' => $data['nplan'][0]['nplan_id'],
   //          'status' => 2 
   //          );
   //      $this->nplan2_model->updateStatus($InData);

		$data['sum_Weight_done'] = $sum_Weight ;
		$data['sum_Ream_done'] = $sum_Ream ;
		$data['roll_doing'] = $roll_done;
		$this->load->view('detail_folio',$data);
	}
	
	public function queue()
	{
		$plan_cut_size1 = $this->nplan_model->get_order_done();
		$plan_cut_size4 = $this->nplan4_model->get_order_done();
		$plan_folio = $this->folio_model->get_order_done();
		$data['all_plan_done'] = array_merge($plan_cut_size1,$plan_cut_size4,$plan_folio);

		$plan_stale1 = $this->nplan_model->get_order_stale();
		$plan_stale4 = $this->nplan4_model->get_order_stale();
		$plan_stale_folio = $this->folio_model->get_order_stale();
		$data['all_plan_stale'] = array_merge($plan_stale4,$plan_stale4,$plan_stale_folio);


		$this->load->view('queue',$data);
	}
	public function import()
	{
		$data['page'] = "import";
		$this->load->view('index',$data);
	}
	public function import_done_ct1()
	{
		$data['nplan'] = $this->nplan_model->list_allnplan_ct1();
		$data['page'] = "import_done_ct1";
		$this->load->view('index',$data);
	}
	public function import_done_ct4()
	{
		$data['nplan'] = $this->nplan4_model->list_allnplan_ct4();
		$data['page'] = "import_done_ct4";
		$this->load->view('index',$data);
	}
	public function import_done_folio1()
	{
		$data['nplan'] = $this->folio_model->list_allnplan();
		$data['page'] = "import_done_folio1";
		$this->load->view('index',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */