<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<style>
	.red_text{ color:#F00 }
	.blue_text{ color:#00C }
	table td{
		white-space: nowrap;	
	}	
	.table thead tr th{
		text-align:center;	
		vertical-align:middle;
		background:rgb(240, 240, 240);
	}
	.table tbody tr td,.table tfoot tr td{
		padding:3px;
		text-align:center;
		vertical-align:middle;
	}
	.form-control{
		padding:0px;
		font-size:10px;
		min-width:50px;
	}

</style>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<div class="row">
 <div class="col-lg-12">
	    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
			<h3><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
            <h4>REAM WRAPPER SHIFT REPORT</h4>
            <hr width="60%" style="border-color:#690" />
            <h4>วันที่ <strong><span class="text_orange"><?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'd / m / Y'); 
			
			?> </span></strong> &nbsp;&nbsp;&nbsp; กะ
            <span class="text_blue">
            <?php $Shift_q = $this->uri->segment(5);
				if($Shift_q==1){
					echo " เช้า (07.00 - 15.00 น.) ";
				}elseif($Shift_q==2){
					echo " บ่าย (15.00 - 23.00 น.) ";
				}elseif($Shift_q==3){
					echo " ดึก (23.00 - 07.00 น.) ";
				}
			?></span></h4>
        </div>
     </div>
	 </div>
<?php echo form_open('logSheet/insert_log_ream');?>
	<div class="row"  style="">
	
		
<div class="table-responsive">
	<table id="data-table" class="table table-bordered table-hover table-striped">
          <thead>
            <tr>
              <th rowspan="2">เริ่มต้น</th>
              <th rowspan="2">หยุดเดิน</th>
              <th colspan="2">เกรด</th>
              <th rowspan="2">Mat.no</th>
              <th rowspan="2" colspan="3">ขนาด</th>
              <th colspan="6">input</th>
              <th colspan="5">จำนวนห่อที่เสีย</th>
              <th colspan="5">output</th>
            </tr>
			<tr>
              <th>ชนิด</th>
              <th width="50">แกรม</th>
              <th  width="50">จำนวน</th>
              <th  width="50">จำนวน</th>
              <th>จำนวน</th>
              <th>จำนวน</th>
              <th>น้ำหนัก</th>
              <th>sort</th>
              <th>cutter</th>
              <th>fork list</th>
              <th>ติดที่ cut</th>
              <th>out feed</th>
              <th>ติดที่ pallet</th>
              <th>ตั้งเดี่ยว/กระบะ</th>
              <th>ตั้งคู่/กระบะ</th>
              <th>จำนวน/ตั้ง</th>
              <th>รวมจำนวนรีมที่ห่อได้</th>
              <th>น้ำหนักที่ห่อได้</th>
            </tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" class="form-control" name="start[]"></td>
					<td><input type="text" class="form-control" name="stop[]"></td>
					<td><input type="text" class="form-control" name="type[]"></td>
					<td><input type="text" class="form-control" name="gram[]"></td>
					<td><input type="text" class="form-control" name="matno[]"></td>
					<td><input type="text" class="form-control" name="width[]"></td>
					<td> x </td>					
					<td><input type="text" class="form-control" name="height[]"></td>
					<td><input type="text" class="form-control" name="sumpage[]"></td>
					<td><input type="text" class="form-control" name="sumpackstand[]"></td>
					<td><input type="text" class="form-control" name="sumstand[]"></td>
					<td><input type="text" class="form-control" name="sumpack[]"></td>
					<td><input type="text" class="form-control" name="weight[]"></td>
					<td><input type="text" class="form-control" name="sort[]"></td>
					<td><input type="text" class="form-control" name="cutter[]"></td>
					<td><input type="text" class="form-control" name="fork[]"></td>
					<td><input type="text" class="form-control" name="cutint[]"></td>
					<td><input type="text" class="form-control" name="outfeed[]"></td>
					<td><input type="text" class="form-control" name="palletint[]"></td>
					<td><input type="text" class="form-control" name="singlestand[]"></td>
					<td><input type="text" class="form-control" name="pairstand[]"></td>
					<td><input type="text" class="form-control" name="numberstand[]"></td>
					<td><input type="text" class="form-control" name="sumream[]"></td>
					<td><input type="text" class="form-control" name="sumweight[]"></td>
				</tr>	
				
			</tbody>	
			<tfoot>	
				<tr>
					<td><a href="#" id="add">add</a></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>				
				<tr>
					<td colspan="10">total</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>				
				<tr>
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>					
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>					
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>				
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>				
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>			
					<td colspan="3">ปัญหา</td>
					<td>รวมนาที</td>				
				</tr>
				<?php
					$problem=$this->log_ream_model->get_log_ream_problem();
					$problemNum=0;
					while(true){
						echo '<tr>';
						for($i=$problemNum;$i<count($problem);$i++){
							echo	'<td colspan="3">'.$problem[$problemNum]['problem_name'].'</td>';
							echo	'<td><input type="text" class="form-control" name="problem[]"/>';
							echo 	'<input type="hidden" class="form-control" value="'.$problem[$problemNum]['problem_id'].'" name="problem_id[]"/>';
							echo	'</td>';
							$problemNum++;
							if($problemNum%6==0){
								break;
							}
						}
						echo'</tr>';
						if(count($problem)==$problemNum){
							break;
						}
					}						
				?>	
			</tfoot>			
	</table>
	</div>
	<input type="hidden" name="date" value="<?php echo $date->format('Y-m-d')?>"/>
	<input type="hidden" name="shift" value="<?php echo $Shift_q?>"/>
	<button type="submit" class="btn btn-primary">ตกลง</button>
	
	<?php echo form_close();?>
	</div>
		<script>
			$(document).ready(function(){
			var tabcontent=$($(('tbody tr'))[0]).clone();
		
					$("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "MMMM yyyy"
                });
				$('#searchdate').on('click',function(){
					var url="<?php echo site_url()?>";
					var segment="<?php echo $this->uri->segment(3)?>";
					var date=new Date($("#monthpicker").val());
					window.location.href=url+"/home/search_log/"+segment+"/"+date.getFullYear()+'-'+(date.getMonth()+1);
				});
				$('#add').on('click',function(){
					$('tbody').append(
					'<tr>'
					+	'<td><input type="text" name="start[]" class="form-control"></td>'
					+	'<td><input type="text" name="stop[]" class="form-control"></td>'
					+	'<td><input type="text" name="type[]" class="form-control"></td>'
					+	'<td><input type="text" name="gram[]" class="form-control"></td>'
					+	'<td><input type="text" name="matno[]" class="form-control"></td>'
					+	'<td><input type="text" name="width[]" class="form-control"></td>'
					+	'<td>x</td>					'
					+	'<td><input type="text" name="height[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumpage[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumpack[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumstand[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumpack2" class="form-control"></td>'
					+	'<td><input type="text" name="weight[]" class="form-control"></td>'
					+	'<td><input type="text" name="sort[]" class="form-control"></td>'
					+	'<td><input type="text" name="cutter[]" class="form-control"></td>	'				
					+	'<td><input type="text" name="fork[]" class="form-control"></td>'
					+	'<td><input type="text" name="cutint[]" class="form-control"></td>'
					+	'<td><input type="text" name="outfeed[]" class="form-control"></td>'
					+	'<td><input type="text" name="palletint[]" class="form-control"></td>'
					+	'<td><input type="text" name="singlestand[]" class="form-control"></td>'
					+	'<td><input type="text" name="pairstand[]" class="form-control"></td>'
					+	'<td><input type="text" name="numberstand[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumream[]" class="form-control"></td>'
					+	'<td><input type="text" name="sumweight[]" class="form-control"></td>'
					+'</tr>');
				});
			});
        </script>
            <script type="text/javsacript">
    //Set the cursor ASAP to "Wait"
    document.body.style.cursor='wait';

    //When the window has finished loading, set it back to default...
    window.onload=function(){document.body.style.cursor='default';}
</script>