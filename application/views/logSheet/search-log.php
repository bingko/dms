<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
	echo link_tag('assets/css/monitor.css');
?>
<style>
body {
	-moz-transform: scale(1.0, 1.0); /* Moz-browsers */
	zoom: 1.0; /* Other non-webkit browsers */
	zoom: 100%; /* Webkit browsers */
}
.red_text {
	color: #F00
}
.blue_text {
	color: #00C
}
table td {
	white-space: nowrap;
}
table thead tr th {
	white-space: nowrap;
	text-align: center;
	vertical-align: middle;
}
.lable-thead {
	font-size: 12px;
}
.date-current a {
	color: #FFF;
}
.date-current a hover {
	color: #EEE;
}
</style>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
<?php 
$success = $this->uri->segment(5);
if($success=='success'){ ?>
<div class="row">
  <div class="col-sm-12">
    <div class="alert alert-success alert-dismissable"> <i class="fa fa-check"></i>
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <b>Success!</b>&nbsp;&nbsp;&nbsp; บันทึกข้อมูลสำเร็จ </div>
  </div>
</div>
<?php } ?>
<div class="row">
  <div class="col-lg-12">
    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
      <h3 class="red_text"><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
      <hr width="60%" style="border-color:#690" />
      <h4 class="">Cut Size Lof Sheet Cutter <span class="text_red">No. <?php echo $this->uri->segment(3)?>&nbsp;&nbsp;&nbsp;เดือน <strong><span class="text_orange">
        <?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'm / Y'); 
			
			?>
        </span></strong></span></h4>
      <h4> </h4>
    </div>
  </div>
</div>
<div class="row"  style="height:560px;">
  <div class="col-sm-12"> <?php echo form_open('logSheet/searchLogResult');?>
    <div id="date">
      <div class="row">
        <div class="col-sm-12"  align="right">
          <input type="hidden" name="cutter" value="<?php echo $this->uri->segment(3);?>" />
          <input type="date" id="monthpicker" value="<?php echo $this->uri->segment(4);?>" class="form-control end" name="end_date" onchange="this.form.submit()"/>
        </div>
      </div>
      <br />
    </div>
    <?php echo form_close()?>
    <div class="table-responsive" style="overflow:hidden;">
      <table id="data-table" class="table table-bordered table-hover table-striped">
        <thead>
          <tr bgcolor="#EEE">
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
						echo 	'<tr class="date-current" style="background:#6699CC;color:#FFF;">'; //mark current day
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
        <h4 class="modal-title" id="myModalLabel">Log Sheet : วันที่ <?php echo $this->uri->segment(6) ?> กะ
          <?php $Shift_q = $this->uri->segment(5);
				if($Shift_q==1){
					echo " เช้า (07.00 - 15.00 น.) ";
				}elseif($Shift_q==2){
					echo " บ่าย (15.00 - 23.00 น.) ";
				}elseif($Shift_q==3){
					echo " ดึก (23.00 - 07.00 น.) ";
				}
			?>
        </h4>
      </div>
      <div class="modal-body">
        <div role="tabpanel"> 
          
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <?php if($this->uri->segment(3)!=5){ ?>
            <li role="presentation" class="active"><a href="#summary" aria-controls="summary" role="tab" data-toggle="tab">Summary</a></li>
            <li role="presentation"><a href="#problem" aria-controls="problem" role="tab" data-toggle="tab">Down Time</a></li>
          <?php }?>
            <li role="presentation"><a href="#employee" aria-controls="employee" role="tab" data-toggle="tab">ผู้ควบคุมงาน</a></li>
          </ul>
          
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="summary">
              <?php if($this->uri->segment(3)==1||$this->uri->segment(3)==4){ ?>
              <!-------------------- Cut Size  ---------------------->
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
                        <td>เกรด / แกรม </td>
                        <td><?php echo $value_set['grade_gram'];?></td>
                      </tr>
                      <tr>
                        <td>Mat no. </td>
                        <td><?php echo number_format($value_set['mat_no']);?></td>
                      </tr>
                      <tr>
                        <td>จำนวน </td>
                        <td><?php echo number_format($value_set['total_ream']);?> &nbsp;&nbsp; รีม</td>
                      </tr>
                      <tr>
                        <td>น้ำหนัก </td>
                        <td><?php echo number_format($value_set['output_weight']);?> &nbsp;&nbsp; กก.</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php $no++;
				$sum_weight += $value_set['output_weight']; 
				$sum_ream += $value_set['total_ream']; 
				
			}?>
              </div>
              <hr />
              <div class="row">
                <div class="col-lg-10 col-lg-offset-1 " align="center">
                  <table class="table">
                    <thead>
                    <th colspan="2"><strong>Summary</strong></th>
                        </thead>
                    <tbody>
                      <tr>
                        <td><strong>Total FG(kg.)</strong></td>
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
              <?php }elseif($this->uri->segment(3)==2||$this->uri->segment(3)==3){ ?>
              <!-------------------- Folio  ---------------------->
              <div class="row">
                <?php   $no=1; 
					$total_input = 0;
					$total_output = 0;
					$total_ream = 0;
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
                      <tr>
                        <td>จำนวนที่ตัดได้ </td>
                        <td><?php echo $value_set['ream']?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <?php $no++;
				$total_output += $value_set['output']; 
				$total_input += $value_set['total_input']; 
				$total_ream += $value_set['ream'];
			}?>
              </div>
              <hr />
              <div class="row">
                <div class="col-lg-10 col-lg-offset-1 " align="center">
                  <table class="table">
                    <thead>
                    <th colspan="2"><strong>Summary</strong></th>
                        </thead>
                    <tbody>
                      <tr>
                        <td>เกรดกระดาษ </td>
                        <td><?php echo $logSheet_set[0]['grade'].' - '.$logSheet_set[0]['gram'];?></td>
                      </tr>
                      <tr>
                        <td>Size </td>
                        <td><?php echo $logSheet_set[0]['size_width'].' x '.$logSheet_set[0]['size_height'].' '.$logSheet_set[0]['unit'];?></td>
                      </tr>
                      <tr>
                        <td><strong>Total Input(kg.)</strong></td>
                        <td><?php echo number_format($total_input);?></td>
                      </tr>
                      <tr>
                        <td><strong>Total Output </strong></td>
                        <td><?php echo number_format($total_output);?></td>
                      </tr>
                      <tr>
                        <td><strong>Total Ream </strong></td>
                        <td><?php echo number_format($total_ream);?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="problem">
              <div class="row">
                <div class="col-sm-12">
                  <h2> Machine Problem </h2>
                </div>
              </div>
              <?php if($this->uri->segment(3)==1||$this->uri->segment(3)==4){ ?>
              <!-------------------- Cut Size  ---------------------->
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered lable-thead table-striped">
                    <thead>
                      <tr>
                        <th colspan="<?php echo count($logSheet_set)+1 ; ?>">Machine Problem</th>
                        <th colspan="2">Down Time</th>
                      </tr>
                      <tr>
                        <th width="35%">Item</th>
                        <?php for($no=0;$no<count($logSheet_set);$no++){ ?>
                        <th>Set <?php echo $no+1; ?><br />
                          (min)</th>
                        <?php } ?>
                        <th>Total<br />
                          (min)</th>
                        <th>หมายเหตุ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $arr=0; foreach($get_problem as $problem_cutsize1){ ?>
                      <tr>
                        <td><?php echo $problem_cutsize1['problem_name']; ?></td>
                        <?php if(!empty($problem_shift)){ ?>
                        <td><?php echo $set1 = $problem_shift[$arr]['total_minutes']?></td>
                        <?php } ?>
                        <?php for($i=1;$i<count($logSheet_set);$i++){ ?>
                        <td><?php $arr_set[$i] = ($arr+count($get_problem)*($i))%count($problem_shift);
							echo  $set[$i] = $problem_shift[$arr_set[$i]]['total_minutes'] ;?></td>
                        <?php } ?>
                        <td><?php if(isset($arr_set)){echo array_sum($set)+$set1;}?></td>
                        <td><?php for($i=0;$i<count($logSheet_set);$i++){ 
									$arr_set[$i] = ($arr+count($get_problem)*($i))%count($problem_shift);
									if(!empty($problem_shift[$arr_set[$i]]['problem_remark'])){
										echo $problem_shift[$arr_set[$i]]['problem_remark']; 
										echo ",";
									}
								} ?></td>
                      </tr>
                      <?php   $arr++;}?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php }elseif($this->uri->segment(3)==2||$this->uri->segment(3)==3){ ?>
              <!-------------------- Folio  ---------------------->
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered lable-thead table-striped">
                    <thead>
                      <tr>
                        <th colspan="<?php echo count($logSheet_set)+1 ; ?>">Machine Problem</th>
                        <th colspan="2">Down Time</th>
                      </tr>
                      <tr>
                        <th width="35%">Item</th>
                        <?php for($no=0;$no<count($logSheet_set);$no++){ ?>
                        <th>Set <?php echo $no+1; ?><br />
                          (min)</th>
                        <?php } ?>
                        <th>Total<br />
                          (min)</th>
                        <th>หมายเหตุ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					  $arr=0; 
					  foreach($get_problem as $problem_folio){  ?>
                      <tr>
                        <td><?php echo $problem_folio['problem_name']; ?></td>
                        <?php if(!empty($problem_shift)){ ?>
                        <td><?php echo $set1 = $problem_shift[$arr]['min']?></td>
                        <?php for($i=1;$i<count($logSheet_set);$i++){  ?>
                        <td><?php $arr_set[$i] = ($arr+count($get_problem)*($i))%count($problem_shift);
							echo  $set[$i] = $problem_shift[$arr_set[$i]]['min'] ;?></td>
                        <?php 	} ?>
                        <?php } ?>
                        <td><?php if(isset($arr_set)){echo array_sum($set)+$set1;}?></td>
                         
                        <td><?php for($i=0;$i<count($logSheet_set);$i++){ 
									$arr_set[$i] = ($arr+count($get_problem)*($i))%count($problem_shift);
									if(!empty($problem_shift[$arr_set[$i]]['problem_remark'])){
										echo $problem_shift[$arr_set[$i]]['problem_remark']; 
										echo ",";
									}
								} ?></td>
                      </tr>
                      <?php   $arr++;}?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php } ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="employee"> 
              <!------------------- EMPLOYEE  ------------------->
              <?php if($this->uri->segment(3)==1||$this->uri->segment(3)==4){
				if(empty($problem_person)){
					echo form_open('logSheet_cutsize/insert_person_cutsite');
				}else{
					echo form_open('logSheet_cutsize/edit_person_cutsite');
					echo '<input type="hidden" name="lcr_id" value="'.$problem_person[0]['lcr_id'].'">';
				}?>
              <div class="row">
                <div class="col-sm-12"><br />
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>หัวหน้ากะ</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_head_shift" placeholder="" value="<?php echo @$problem_person[0]['head_shift']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-4" align="left"> <strong>พนง.ประจำเครื่องตัด</strong> </div>
                    <div class="col-sm-9"> </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 1. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee1" placeholder="" value="<?php echo @$problem_person[0]['employee1']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 2. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee2" placeholder="" value="<?php echo @$problem_person[0]['employee2']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 3. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee3" placeholder="" value="<?php echo @$problem_person[0]['employee3']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-4" align="left"> <strong>Overtime</strong> </div>
                    <div class="col-sm-9"> </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 1. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_em_ot1" placeholder="" value="<?php echo @$problem_person[0]['em_ot1']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 2. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_em_ot2" placeholder="" value="<?php echo @$problem_person[0]['em_ot2']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 3. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_em_ot3" placeholder="" value="<?php echo @$problem_person[0]['em_ot3']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>คู่ธุรกิจ</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_customer" placeholder="" value="<?php echo @$problem_person[0]['customer_name']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-12" align="center">
                      <input type="hidden" class="form-control textbox" name="cut_size" placeholder="" value="<?php echo $this->uri->segment(3)?>">
                      <input type="hidden" class="form-control textbox" name="date" placeholder="" value="<?php echo $this->uri->segment(6)?>">
                      <input type="hidden" class="form-control textbox" name="shift" placeholder="" value="<?php echo $this->uri->segment(5)?>">
                      <button type="submit" class="btn btn-primary btn-lg">บันทึกข้อมูล</button>
                    </div>
                  </div>
                  <br />
                </div>
              </div>
              <?php echo form_close()?>
              <?php }elseif($this->uri->segment(3)==2||$this->uri->segment(3)==3){ 
				if(empty($problem_person)){
					echo form_open('logSheet_cutsize/insert_person_folio');
				}else{
					echo form_open('logSheet_cutsize/edit_person_folio');
					echo '<input type="hidden" name="lfr_id" value="'.$problem_person[0]['lfr_id'].'">';
				}?>
              <div class="row">
                <div class="col-sm-12"><br />
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>หัวหน้ากะ</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_head_shift" placeholder="" value="<?php echo @$problem_person[0]['remark_head_shift']?>">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> Control </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee1" placeholder="" value="<?php echo @$problem_person[0]['remark_employee1']?>">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> Layboy </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee2" placeholder="" value="<?php echo @$problem_person[0]['remark_employee2']?>">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right">Overtime 1. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_em_ot1" placeholder="" value="<?php echo @$problem_person[0]['remark_em_ot1']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right">Overtime  2. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_em_ot2" placeholder="" value="<?php echo @$problem_person[0]['remark_em_ot2']?>">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>คู่ธุรกิจ</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_customer" placeholder="" value="<?php echo @$problem_person[0]['remark_customer']?>">
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-12" align="center">
                      <input type="hidden" class="form-control textbox" name="cut_size" placeholder="" value="<?php echo $this->uri->segment(3)?>">
                      <input type="hidden" class="form-control textbox" name="date" placeholder="" value="<?php echo $this->uri->segment(6)?>">
                      <input type="hidden" class="form-control textbox" name="shift" placeholder="" value="<?php echo $this->uri->segment(5)?>">
                      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                    </div>
                  </div>
                  <br />
                </div>
              </div>
              <?php echo form_close()?>
              <?php }else{
				if(!empty($logSheet_set)){
					echo form_open('logSheet_cutsize/edit_person_ream');
					echo '<input type="hidden" name="log_ream_id" value="'.$logSheet_set[0]['log_ream_id'].'">'; ?>
              <div class="row">
                <div class="col-sm-12"><br />
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>ผู้ควบคุมเครื่อง</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="controller" placeholder="" value="<?php echo @$logSheet_set[0]['controller']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>หัวหน้ากะ</strong> </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="head_shift" placeholder="" value="<?php echo @$logSheet_set[0]['head_shift']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> <strong>พนักงานห่อ</strong> </div>
                    <div class="col-sm-9"> </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 1. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee1" placeholder="" value="<?php echo @$logSheet_set[0]['employee1']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 2. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee2" placeholder="" value="<?php echo @$logSheet_set[0]['employee2']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 3. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee3" placeholder="" value="<?php echo @$logSheet_set[0]['employee3']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 4. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee4" placeholder="" value="<?php echo @$logSheet_set[0]['employee4']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 5. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee5" placeholder="" value="<?php echo @$logSheet_set[0]['employee5']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-3" align="right"> 6. </div>
                    <div class="col-sm-9">
                      <input type="text" class="form-control textbox" name="remark_employee6" placeholder="" value="<?php echo @$logSheet_set[0]['employee6']?>" >
                    </div>
                  </div>
                  <br />
                  <div class="row">
                    <div class="col-sm-12" align="center">
                      <input type="hidden" class="form-control textbox" name="cut_size" placeholder="" value="<?php echo $this->uri->segment(3)?>">
                      <input type="hidden" class="form-control textbox" name="date" placeholder="" value="<?php echo $this->uri->segment(6)?>">
                      <input type="hidden" class="form-control textbox" name="shift" placeholder="" value="<?php echo $this->uri->segment(5)?>">
                      <button type="submit" class="btn btn-primary btn-lg">บันทึกข้อมูล</button>
                    </div>
                  </div>
                  <br />
                </div>
              </div>
              <?php echo form_close()?>
              <?php } } ?>
              <!------------------- END EMPLOYEE  -------------------> 
            </div>
          </div>
        </div>
      </div>
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
