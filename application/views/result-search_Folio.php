<?php 
//print_r();
?>

<style>
.red_text{ color:#F00 }
.blue_text{ color:#00C }
table td{
white-space: nowrap;	
}
table thead tr th{
white-space: nowrap;
text-align:center;	
vertical-align:middle;
}

</style>
<div id="page">
  <div class="row">
    <div class="col-lg-12">
      <div style="float:left">
        <h2>Cutting Result </h2>
        <h4>Datetime : <?php echo $this->input->post('end_date') ?>
        </h4>
      </div>
      <div style="float:right"><br /></div>
    </div>
  </div>
  <hr />
  <div class="row">
    <div class="col-lg-12">
	<div class="table-responsive">
	<table id="data-table" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th colspan="11" style="background-color:rgb(255, 205, 220);border-right:1px solid">ข้อมูลก่อนตัด</th>
              <th colspan="13" style="background-color:rgb(228, 255, 194)">ข้อมูลหลังตัด</th>
            </tr>
			<tr style="background-color:white">
              <th><?php
			  if($sheeter==1){
				  echo 'Cutsize1';
			  }
			  else if($sheeter==2){
				  echo 'Folio1';
			  }
			  else if($sheeter==3){
				  echo 'Folio2';
			  }
			  else if($sheeter==4){
				  echo 'Cutsize2';
			  }
			  ?></th>
              <th>กะ</th>
              <th>ชุดตัดที่</th>
              <th>Customer Order</th>
              <th>วันที่</th>
              <th>Grade</th>
              <th>gms</th>
              <th>Width</th>
              <th>ม้วน</th>
              <th>Input</th>
              <th style="border-right:1px solid">Mat.No</th>
              <th>กว้าง x ยาว</th>
              <th>N</th>
              <th>Output(N) Ton</th>
              <th>Sort</th>
              <th>Output(S) ton</th>
              <th>รีม</th>
              <th>out put(ตัน)</th>
              <th>Trim lost</th>
              <th>Remake</th>
              <th>Reject (ตัน)</th>
              <th>Total Reject (ตัน)</th>
              <th>% reject (Total)</th>
              <th>% reject (Actual)</th>
            </tr>
          </thead>
		  <tbody>
		  <?php
        //$dailysum= new array();
        $daily=date_create($this->input->post('end_date').' 07:00:00')->add(new DateInterval('P1D'));
        $sumream=0;
		$suminput=0;
		$sumoutput=0;
		$sumroll=0;
        $dailysum=array();
  		for($i=0;$i<count($cutsize);$i++){

			$sumream+=$cutsize[$i]['ream'];
			$suminput+=$cutsize[$i]['input'];
			$sumoutput+=$cutsize[$i]['output'];
			$sumroll+=$cutsize[$i]['roll'];
			
			if(new DateTime($cutsize[$i]['time'])>$daily){ // if new day
              $daily=date_create(date_create($cutsize[$i]['time'])->format('Y-m-d 07:00:00'));
              $daily->add(new DateInterval('P1D')); //add one day to compare next day
			  echo '<tr style="background-color:#FF9">';
              echo '<td>'.$dailysum['sumrow'].'</td>';
              echo '<td>'.''.'</td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td>'.round($dailysum['roll'],3).'</td>';
              echo '<td>'.round($dailysum['input'],3).'</td>';
              echo '<td style="border-right:1px solid"></td>';
              echo '<td></td>';
              echo '<td ></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td>'.number_format($dailysum['ream']).'</td>';
              echo '<td>'.round($dailysum['output'],3).'</td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '<td></td>';
              echo '</tr>';
              $dailysum=array();
          }
		  
			if($cutsize[$i]['input']!=@$cutsize[$i-1]['input']){
  			echo '<tr>';
  			echo '<td>'.$cutsize[$i]['CT'].'</td>';
  			echo '<td>'.$cutsize[$i]['shift'].'</td>';
  			echo '<td>'.$cutsize[$i]['lot'].'</td>';
        echo '<td>'.$cutsize[$i]['CustomerOrder'].'</td>';
  			echo '<td>'.$cutsize[$i]['time'].'</td>';
  			echo '<td>'.$cutsize[$i]['Grade'].'</td>';
  			echo '<td>'.$cutsize[$i]['gram'].'</td>';
  			echo '<td>'.$cutsize[$i]['width'].'</td>';
  			echo '<td>'.$cutsize[$i]['roll'].'</td>';
  			echo '<td>'.$cutsize[$i]['input'].'</td>';
  			echo '<td style="border-right:1px solid">'.substr($cutsize[$i]['mat_no'],-4).'</td>';
  			echo '<td>'.$cutsize[$i]['paper_width'].' x '.$cutsize[$i]['paper_height'].'</td>';
        echo '<td>'.(0+$cutsize[$i]['N']).'</td>';
        echo '<td>'.round($cutsize[$i]['output_n'],3).'</td>';
        echo '<td>'.(0+$cutsize[$i]['Sort']).'</td>';
        echo '<td>'.round(($cutsize[$i]['output']-$cutsize[$i]['output_n']),3).'</td>';
  			echo '<td>'.number_format($cutsize[$i]['ream']).'</td>';
  			echo '<td>'.round($cutsize[$i]['output'],3).'</td>';
  			echo '<td>'.round($cutsize[$i]['trim_lost'],3).'</td>';
  			echo '<td>'.$cutsize[$i]['remake'].'</td>';
  			echo '<td>'.round($cutsize[$i]['reject'],3).'</td>';
  			echo '<td>'.round($cutsize[$i]['total_reject'],3).'</td>';
  			echo '<td>'.round($cutsize[$i]['percent_reject'],3).'</td>';
  			echo '<td>'.round($cutsize[$i]['actual_reject'],3).'</td>';
        echo '</tr>';
        @$dailysum['sumrow']+=1;
        @$dailysum['input']+=$cutsize[$i]['input'];
        @$dailysum['ream']+=$cutsize[$i]['ream'];
        @$dailysum['output']+=$cutsize[$i]['output'];
        @$dailysum['roll']+=$cutsize[$i]['roll'];
			}
			else{
        echo '<tr>';
        echo '<td></td>';
        echo '<td>'.$cutsize[$i]['shift'].'</td>';
        echo '<td>'.$cutsize[$i]['lot'].'</td>';
        echo '<td>'.$cutsize[$i]['CustomerOrder'].'</td>';
        echo '<td>'.$cutsize[$i]['time'].'</td>';
        echo '<td>'.$cutsize[$i]['Grade'].'</td>';
        echo '<td>'.$cutsize[$i]['gram'].'</td>';
        echo '<td>'.$cutsize[$i]['width'].'</td>';
        echo '<td>'.$cutsize[$i]['roll'].'</td>';
        echo '<td></td>';
        echo '<td style="border-right:1px solid">'.substr($cutsize[$i]['mat_no'],-4).'</td>';
        echo '<td>'.$cutsize[$i]['paper_width'].' x '.$cutsize[$i]['paper_height'].'</td>';
        echo '<td>'.(0+$cutsize[$i]['N']).'</td>';
        echo '<td>'.round($cutsize[$i]['output_n'],3).'</td>';
        echo '<td>'.(0+$cutsize[$i]['Sort']).'</td>';
        echo '<td>'.round(($cutsize[$i]['output']-$cutsize[$i]['output_n']),3).'</td>';
        echo '<td>'.number_format($cutsize[$i]['ream']).'</td>';
        echo '<td>'.round($cutsize[$i]['output'],3).'</td>';
        echo '<td>'.round($cutsize[$i]['trim_lost'],3).'</td>';
        echo '<td>'.$cutsize[$i]['remake'].'</td>';
        echo '<td>'.round($cutsize[$i]['reject'],3).'</td>';
        echo '<td>'.round($cutsize[$i]['total_reject'],3).'</td>';
        echo '<td>'.round($cutsize[$i]['percent_reject'],3).'</td>';
        echo '<td>'.round($cutsize[$i]['actual_reject'],3).'</td>';
        echo '</tr>';
      }
			if((($i==count($cutsize)-1)&&($this->input->post('date_type')=='month'))){ //add last result
              $daily=date_create(date_create($cutsize[$i]['time'])->format('Y-m-d 07:00:00'));
              $daily->add(new DateInterval('P1D')); //add one day to compare next day
				echo '<tr style="background-color:#FF9">';
				echo '<td>'.$dailysum['sumrow'].'</td>';
				echo '<td>'.''.'</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td>'.$dailysum['roll'].'</td>';
				echo '<td>'.$dailysum['input'].'</td>';
				echo '<td></td>';
				echo '<td style="border-right:1px solid"></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td>'.number_format($dailysum['ream']).'</td>';
				echo '<td></td>';
				echo '<td>'.number_format(round($dailysum['output'],3)).'</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '</tr>';
              $dailysum=array();
          }
			
		}
		//************ total result *****************
        echo '<tr style="background-color:rgb(86, 85, 85);color:white">';
        echo '<td>'.count($cutsize).'</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.round($sumroll,3).'</td>';
        echo '<td>'.round($suminput,3).'</td>'; 
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.$sumream.'</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>'.round($sumoutput,3).'</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
		  ?>
		  </tbody>
	</table>
	</div>
    </div>
  </div>
  
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/jquery.fixedheadertable.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
$(document).ready(function() {
	$('#data-table').fixedHeaderTable('show');
});
</script>
