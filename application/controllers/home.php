<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct() 
    {
        parent::__construct();

        // Check that the user is logged in
        if ($this->session->userdata('user_data') == null ) {
            // Prevent infinite loop by checking that this isn't the login controller               
            if ($this->router->class != 'login') 
            {                        
                redirect('login/index');
            }
        }   
    }
	public function index()
	{
		$data['page'] = "dashboard";
		$this->load->view('index',$data);
	}
	public function dashboard()
	{
		$data['page'] = "dashboard";
		$this->load->view('index',$data);
	}
	public function search_Converting()
	{
		$data['page'] = "search-data_Converting";
		$this->load->view('index',$data);
	}
	public function user()
	{
		$data['page'] = "user";
		$this->load->view('index',$data);
	}
	public function result_Converting()
	{
		$searchDate = array(
			'end_date' => $this->input->post('end_date'),
		);

		$data['rollData'] = $this->roll_model->intermedate($searchDate);
		$minDate = $this->roll_model->getMinDate($searchDate);
		$searchDate['start_date'] = $minDate[0]['start_date'];
		// echo "<pre>";
		// print_r($minDate);
		// print_r($searchDate);
		// exit();
		$data['setDate'] = $searchDate;

		$datetime1 = new DateTime($searchDate['start_date']);
		$datetime2 = new DateTime($searchDate['end_date']);
		$interval = $datetime1->diff($datetime2);
		if($interval->format('%a')<365){
			$data['countMonth'] = $interval->format('%m')+1;
		}elseif($interval->format('%a')<730){
			$data['countMonth'] = $interval->format('%m')+13;
		}elseif($interval->format('%a')<1095){
			$data['countMonth'] = $interval->format('%m')+25;
		}else{
			$data['countMonth'] = $interval->format('%m')+37;
		}

		$data['page'] = "result-search_Converting";
		$this->load->view('index',$data);
	}
	public function search_Intermediate()
	{
		$data['page'] = "search-data_Intermediate";
		$this->load->view('index',$data);
	}
	public function result_Intermediate()
	{
		$searchDate = array(
			'end_date' => $this->input->post('end_date'),
		);
		$minDate = $this->intermediate_model->getMinDate($searchDate);
		$searchDate['start_date'] = $minDate[0]['start_date'];
		
		$datetime1 = new DateTime($searchDate['start_date']);
		$datetime2 = new DateTime($searchDate['end_date']);
		$interval = $datetime1->diff($datetime2);
		if($interval->format('%a')<365){
			$data['countMonth'] = $interval->format('%m')+1;
		}elseif($interval->format('%a')<730){
			$data['countMonth'] = $interval->format('%m')+13;
		}elseif($interval->format('%a')<1095){
			$data['countMonth'] = $interval->format('%m')+25;
		}else{
			$data['countMonth'] = $interval->format('%m')+37;
		}

		$data['rollData'] = $this->intermediate_model->intermedate($searchDate);
		// echo "<pre>";
		// print_r($data['rollData']);
		// exit();

		$data['setDate'] = $searchDate;
		$data['page'] = "result-search_Intermediate";
		$this->load->view('index',$data);
	}
	public function report()
	{
		$data['page'] = "result-search";
		$this->load->view('index',$data);
	}
	public function excel()
	{
		$searchDate = array(
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date')
		);
		// echo "<pre>";
		// print_r($searchDate);
		// exit();
		$datetime1 = new DateTime($searchDate['start_date']);
		$datetime2 = new DateTime($searchDate['end_date']);
		$interval = $datetime1->diff($datetime2);
		if($interval->format('%a')<365){
			$data['countMonth'] = $interval->format('%m')+1;
		}elseif($interval->format('%a')<730){
			$data['countMonth'] = $interval->format('%m')+13;
		}elseif($interval->format('%a')<1095){
			$data['countMonth'] = $interval->format('%m')+25;
		}else{
			$data['countMonth'] = $interval->format('%m')+37;
		}

		$type = $this->input->post('type');
		if($type=='conv_area'){
			$data['head'] = "Roll in Converting Area";
			$data['rollData'] = $this->roll_model->intermedate($searchDate);
		}else{
			$data['head'] = "Roll in Intermediate WH";
			$data['rollData'] = $this->intermediate_model->intermedate($searchDate);
		}

		$data['setDate'] = $searchDate;
		$this->load->view('excel',$data);
	}
	public function result_detail()
	{	
		$start_date = $this->uri->segment(4);
		$start_date = str_replace ( '%20' , ' ' , $start_date );
		$end_date = $this->uri->segment(5);
		$end_date = str_replace ( '%20' , ' ' , $end_date );

		$searchDate = array(
			'start_date' => $start_date,
			'end_date' => $end_date
		);

		$Rollid = $this->uri->segment(3);
		$type = $this->uri->segment(6);

		$subtype = $this->uri->segment(7);
		$rollData = $this->roll_model->get_Roll_Winder($Rollid);

		if($type=='conv_area'){
			$data['title'] = 'Roll in Converting Area';
			if ($subtype==0) {
				$data['rollDetailSet'] = $this->roll_model->get_converting_area_detail_roll($rollData,$searchDate);
			}elseif ($subtype==1){
				$data['rollDetailSet'] = $this->roll_model->get_converting_area_detail_grade($rollData,$searchDate);
			}else{
				$data['rollDetailSet'] = $this->roll_model->get_all_detail_roll($searchDate);
			}
		}else{
			$data['title'] = 'Roll in intermediate WH';
			if ($subtype==0) {
				$data['rollDetailSet'] = $this->intermediate_model->get_converting_area_detail_roll($rollData,$searchDate);
			}elseif ($subtype==1){
				$data['rollDetailSet'] = $this->intermediate_model->get_converting_area_detail_grade($rollData,$searchDate);
			}else{
				$data['rollDetailSet'] = $this->intermediate_model->get_all_detail_roll($searchDate);
			}
			
		}

		$data['page'] = "result-detail";
		$this->load->view('index',$data);
	}
	public function search_all()
	{
		//$segment4 = $this->uri->segment(4);
		if(!empty($this->uri->segment(4))){
			$inData = $this->uri->segment(4);
		}else{
			$inData = $this->input->post('search');
		}
		//$segment3 = $this->uri->segment(3);
		if(!empty($this->uri->segment(3))){
			$type = $this->uri->segment(3);
		}else{
			$type = $this->input->post('type_search');
		}

		if(!empty($inData)){
			// search Pallet //
			if($type==1){ 
				$data['DataSet'] = $this->roll_model->get_PalletID($inData);
				$data['page'] = "result-pallet";
				$this->load->view('index',$data);
			// search RollID //
			}elseif($type==2){
				$data['DataSet'] = $this->roll_model->get_RollID($inData);
				$data['page'] = "result-pallet";
				$this->load->view('index',$data);
			// search OrderNo //
			}elseif($type==3){
				$data['DataSet'] = $this->roll_model->get_OrderNo($inData);
				$data['page'] = "result-orderid";
				$this->load->view('index',$data);
			}elseif($type==4){
				$data['DataSet'] = $this->roll_model->get_Roll_Winder($inData);
				$data['page'] = "result-orderid";
				$this->load->view('index',$data);

			}
		}else{
				$data['DataSet'] = null ;
				$data['page'] = "result-pallet";
				$this->load->view('index',$data);
		}

		// echo "<Pre>";
		// print_r($data['sheet_product']);
		// exit();

	}
	public function search_cutsize()
	{
		$data['page'] = "search-data_Cutsize";
		$this->load->view('index',$data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */