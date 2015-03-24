<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
	echo link_tag('assets/css/monitor.css');
?>
<style>
	body{
		-moz-transform: scale(1.0, 1.0); /* Moz-browsers */
		zoom: 1.0; /* Other non-webkit browsers */
		zoom: 100%; /* Webkit browsers */
	}
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
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<div class="row">
<div class="col-lg-12">
	    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
			<h3 class="red_text"><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
            <hr width="60%" style="border-color:#690" />
            <h4 class="">Cut Size Lof Sheet Cutter <span class="text_red">No. <?php echo $this->uri->segment(3)?>&nbsp;&nbsp;&nbsp;เดือน <strong><span class="text_orange"><?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'm / Y'); 
			
			?> </span></strong></span></h4>
            
            <h4>
            </h4>
        </div>
     </div>
     </div>
     
	<div class="row"  style="height:560px;">
		<div class="col-sm-12">
<?php echo form_open('logSheet/searchLogResult');?>
				<div id="date">
					<div class="row">
						<div class="col-sm-12"  align="right"> 
                                	<input type="hidden" name="cutter" value="<?php echo $this->uri->segment(3);?>" />
									<input type="date" id="monthpicker" value="<?php echo $this->uri->segment(4);?>" class="form-control end" name="end_date" onchange="this.form.submit()"/>

						</div>
					</div><br />
				</div>
				<?php echo form_close()?>
			<div class="table-responsive" style="overflow:hidden;">
	<table id="data-table" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th width="20%">Date</th>
              <th width="12%">เข้า</th>
              <th width="12%">บ่าย</th>
              <th width="12%">ดึก</th>
              <th>เพิ่ม Log sheet ( เช้า / บ่าย / ดึก )</th>
            </tr>
			</thead>          
			<tbody>
			<?php
			$datetime = date_parse_from_format("Y-m-d", $this->uri->segment(4)); //parse date to array
			$datetime2=date_create($this->uri->segment(4));
			if($this->uri->segment(4)!=date('Y-m')){
				$d=cal_days_in_month(CAL_GREGORIAN,$datetime['month'],$datetime['year']);
			}else{
				$d = date('d');
			}
			
			for($i=1;$i<=$d;$i++){
					if($datetime2->format('Y-m-d')==(new DateTime())->format('Y-m-d')){
						echo 	'<tr style="background:#FF9">'; //mark current day
					}
					else{
						echo 	'<tr>';
					}
					echo '<td align="center">'.$datetime2->format('Y-m-d').'</td>';
					echo '<td align="center">';
					$inData =array(
						'cut_size' => $this->uri->segment(3),
						'date' => $datetime2->format('Y-m-d'),
						'shift' => 1,
					);
					if($inData['cut_size']==1||$inData['cut_size']==4){
						$count_shiftA = $this->logsheet_model->count_cutsize($inData);
					}elseif($inData['cut_size']==2||$inData['cut_size']==3){
						$count_shiftA = $this->logsheet_model->count_folio($inData);
					}else{
						$count_shiftA = $this->logsheet_model->count_ream($inData);
					}
					echo anchor('logSheet/viewSet/'.$cutter.'/'.$datetime2->format('Y-m').'/'.$inData['shift'].'/'.$datetime2->format('Y-m-d'),$count_shiftA );
					echo '</td>';
					echo '<td align="center">';
					$inData =array(
						'cut_size' => $this->uri->segment(3),
						'date' => $datetime2->format('Y-m-d'),
						'shift' => 2,
					);
					if($inData['cut_size']==1||$inData['cut_size']==4){
						$count_shiftB = $this->logsheet_model->count_cutsize($inData);
					}elseif($inData['cut_size']==2||$inData['cut_size']==3){
						$count_shiftB = $this->logsheet_model->count_folio($inData);
					}else{
						$count_shiftB = $this->logsheet_model->count_ream($inData);
					}
					echo anchor('logSheet/viewSet/'.$cutter.'/'.$datetime2->format('Y-m').'/'.$inData['shift'].'/'.$datetime2->format('Y-m-d'),$count_shiftB );
					echo '</td>';
					echo '<td align="center">';
					$inData =array(
						'cut_size' => $this->uri->segment(3),
						'date' => $datetime2->format('Y-m-d'),
						'shift' => 3,
					);
					if($inData['cut_size']==1||$inData['cut_size']==4){
						$count_shiftC = $this->logsheet_model->count_cutsize($inData);
					}elseif($inData['cut_size']==2||$inData['cut_size']==3){
						$count_shiftC = $this->logsheet_model->count_folio($inData);
					}else{
						$count_shiftC = $this->logsheet_model->count_ream($inData);
					}
					echo anchor('logSheet/viewSet/'.$cutter.'/'.$datetime2->format('Y-m').'/'.$inData['shift'].'/'.$datetime2->format('Y-m-d'),$count_shiftC );
					echo '</td>';
					echo '<td>';
					if($this->uri->segment(3)==1||$this->uri->segment(3)==4){
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_cutsize/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."1".'"><span class="badge badge-primary"><i class="fa fa-sun-o"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_cutsize/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."2".'"><span class="badge badge-success"><i class="fa fa-skyatlas"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_cutsize/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."3".'"><span class="badge badge-warning"><i class="fa fa-moon-o"></span></i></a></div>';
					}
					elseif($this->uri->segment(3)==2||$this->uri->segment(3)==3){
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_folio/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."1".'"><span class="badge badge-primary"><i class="fa fa-sun-o"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_folio/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."2".'"><span class="badge badge-success"><i class="fa fa-skyatlas"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_folio/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."3".'"><span class="badge badge-warning"><i class="fa fa-moon-o"></span></i></a></div>';
					}
					elseif($this->uri->segment(3)==5){
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_ream/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."1".'"><span class="badge badge-primary"><i class="fa fa-sun-o"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_ream/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."2".'"><span class="badge badge-success"><i class="fa fa-skyatlas"></i></span></a></div>';
						echo '<div class="col-lg-4" align="center"><a href="'.site_url().'/logSheet/input_ream/'.$this->uri->segment(3)."/".$datetime2->format('Y-m-d')."/"."3".'"><span class="badge badge-warning"><i class="fa fa-moon-o"></span></i></a></div>';
					}
					echo '</td>';
					echo '</tr>';
					
					$datetime2->add(new DateInterval('P1D'));
			}
			?>
			</tbody>
	</table>
		</div>
	</div>
    </div>
    <?php 
if(isset($logSheet_set)){ ?>
<script type="text/javascript">
    $(window).load(function(){
        $('#setList').modal('show');
    });
</script>

<!-- update Product -->
<div class="modal fade" id="setList" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log Sheet : วันที่ <?php echo $this->uri->segment(6) ?> กะ <?php $Shift_q = $this->uri->segment(5);
				if($Shift_q==1){
					echo " เช้า (07.00 - 15.00 น.) ";
				}elseif($Shift_q==2){
					echo " บ่าย (15.00 - 23.00 น.) ";
				}elseif($Shift_q==3){
					echo " ดึก (23.00 - 07.00 น.) ";
				}
			?></h4>
      </div>
      <?php if($this->uri->segment(3)==1||$this->uri->segment(3)==4){ ?>
      <div class="modal-body">
        <div class="row">
        	<?php   $no=1; 
					$sum_weight = 0;
					$sum_ream = 0;
					foreach($logSheet_set as $value_set){?>
        	<div class="col-lg-4" align="center">
            <table class="table">
            <thead>
              <th colspan="2"><?php echo anchor('logSheet/edit_cutsize/'.$cutter.'/'.$datetime2->format('Y-m').'/'.$value_set['c_id'], 'Set '.$no ); ?></th>
            </thead>
            <tbody>
            	<tr>
                    <td>Input(kg.) </td>
                    <td><?php echo number_format($value_set['input_weight']);?></td>
                 </tr>
                 <tr>
                    <td>Output(kg.) </td>
                    <td><?php echo number_format($value_set['output_weight']);?></td>
                 </tr>
                <tr>
                    <td>Ream </td>
                    <td><?php echo number_format($value_set['total_ream']);?></td>
                 </tr>
                 <tr>
                    <td>Reject(kg.) </td>
                    <td><?php echo $value_set['total_reject'].' ('.$value_set['total_reject_percentage'].'%)';?></td>
                 </tr>
            </tbody>
              
            </table>
			
            
            </div>
           	<?php $no++;
				$sum_weight += $value_set['output_weight']; 
				$sum_ream += $value_set['total_ream']; 
				
			}?>
        </div><hr />
        <div class="row">
 	       <div class="col-lg-10 col-lg-offset-1 " align="center">
           <table class="table">
            <thead>
              <th colspan="2"><strong>Summary</strong></th>
            </thead>
            <tbody>
            	<tr>
                    <td><strong>Total FG(kg.)</strong> </td>
                    <td><?php echo number_format($sum_weight);?></td>
                 </tr>
                <tr>
                    <td><strong>Total Ream </strong></td>
                    <td><?php echo number_format($sum_ream);?></td>
                 </tr>
                 
            </tbody>
              
            </table>
           </div>
        </div>
      </div>
      <?php }elseif($this->uri->segment(3)==2||$this->uri->segment(3)==3){ ?>
      <div class="modal-body">
        <div class="row">
        	<?php   $no=1; 
					$total_input = 0;
					$total_output = 0;
					foreach($logSheet_set as $value_set){?>
        	<div class="col-lg-4" align="center">
            <table class="table">
            <thead>
              <th colspan="2"><?php echo anchor('logSheet/edit_folio/'.$cutter.'/'.$datetime2->format('Y-m').'/'.$value_set['f_id'], 'Set '.$no ); ?></th>
            </thead>
            <tbody>
            	<tr>
                    <td>Input(kg.) </td>
                    <td><?php echo number_format($value_set['total_input']);?></td>
                 </tr>
                 <tr>
                    <td>Output(kg.) </td>
                    <td><?php echo number_format($value_set['output']);?></td>
                 </tr>
                <tr>
                    <td>Trim Reject(kg.) </td>
                    <td><?php echo number_format($value_set['trim_reject']);?></td>
                 </tr>
                 <tr>
                    <td>Reject(kg.) </td>
                    <td><?php echo $value_set['reject'];?></td>
                 </tr>
                 <tr>
                    <td>Total Reject(kg.) </td>
                    <td><?php echo $value_set['total_reject']?></td>
                 </tr>
            </tbody>
              
            </table>
			
            
            </div>
           	<?php $no++;
				$total_output += $value_set['output']; 
				$total_input += $value_set['total_input']; 
				
			}?>
        </div><hr />
        <div class="row">
 	       <div class="col-lg-10 col-lg-offset-1 " align="center">
           <table class="table">
            <thead>
              <th colspan="2"><strong>Summary</strong></th>
            </thead>
            <tbody>
            	<tr>
                    <td><strong>Total Input(kg.)</strong> </td>
                    <td><?php echo number_format($total_input);?></td>
                 </tr>
                <tr>
                    <td><strong>Total Outout </strong></td>
                    <td><?php echo number_format($total_output);?></td>
                 </tr>
                 
            </tbody>
              
            </table>
           </div>
        </div>
      </div>
	  <?php }else{ ?>
      
      <?php } ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php }?>

		<script>
					$("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "yyyy-MM"
                });
				$('#searchdate').on('click',function(){
					var url="<?php echo site_url()?>";
					var segment="<?php echo $this->uri->segment(3)?>";
					var date=new Date($("#monthpicker").val());
					window.location.href=url+"/logSheet/searchLog/"+segment+"/"+date.getFullYear()+'-'+(date.getMonth()+1);
				});
        </script>
            <script type="text/javsacript">
    //Set the cursor ASAP to "Wait"
    document.body.style.cursor='wait';

    //When the window has finished loading, set it back to default...
    window.onload=function(){document.body.style.cursor='default';}
</script>
<script>
$(document).ready(function() {
    $('#data-table').dataTable( {
        "order": [[ 0, "desc" ]],
		"pageLength": 31,
		"paging" : false,
        "info":     false,
		"searching": false
    } );
} );
</script>
