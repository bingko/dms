<br />
<div class="row">
  <div class="col-lg-12">
    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
      <h3><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
      <h4>Cut Size Log Sheet Cutter <span class="text_red">No. <?php echo $this->uri->segment(3)?></span></h4>
      <hr width="60%" style="border-color:#690" />
      <h4>วันที่ <strong><span class="text_orange">
        <?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'd / m / Y'); 
			
			?>
        </span></strong> &nbsp;&nbsp;&nbsp; กะ <span class="text_blue">
        <?php $Shift_q = $this->uri->segment(5);
				if($Shift_q==1){
					echo " เช้า (07.00 - 15.00 น.) ";
				}elseif($Shift_q==2){
					echo " บ่าย (15.00 - 23.00 น.) ";
				}elseif($Shift_q==3){
					echo " ดึก (23.00 - 07.00 น.) ";
				}
			?>
        </span></h4>
    </div>
  </div>
</div>
<form action='<?php echo site_url('logSheet_cutsize/add_input_cutsize') ?>' method=post>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>&nbsp;&nbsp; ตรวจสอบวัสดุก่อนตัด</h3>
        </div>
        <div class="panel-body">
          <table width="90%">
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">เปลือกห่อ.</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="appearance" placeholder="Lot No."></td>
              <td height="50" align="right"><label for="exampleInputName2">กล่อง</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="box" placeholder="กล่อง"></td>
              <td height="50" align="right"><label for="exampleInputName2">ฝา</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="cover" placeholder="ฝา"></td>
            </tr>
            <tr width=100>
              <td height="50" align="right"><label for="exampleInputName2">เกรด/แกรม</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><select  name="grade_gram" class="form-control textbox" onchange="setOutPut()">
                  <option value='PPC-64'>PPC-64</option>
                  <option value-'PPC-70'>PPC-70</option>
                  <option value='PPC-75'>PPC-75</option>
                  <option value='PPC-80'>PPC-80</option>
                </select></td>
              <td height="50" align="right"><label for="exampleInputName2">Order No.</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="order_no" placeholder="Order No."></td>
              <td height="50" align="right"><label for="exampleInputName2">ม้วนกว้าง</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_width" placeholder="ม้วนกว้าง"></td>
            </tr>
            <tr width=100>
              <td height="50" align="right"><label for="exampleInputName2">Lot No.</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox"  name="lot_no" placeholder="Lot No."></td>
              <td height="50" align="right"><label for="exampleInputName2">Size</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><select  name="size" class="form-control textbox" onchange="setOutPut()">
                  <option value='A4'>A4</option>
                  <option value-'A3'>A3</option>
                  <option value='B4'>B4</option>
                  <option value='B5'>B5</option>
                </select></td>
              <td height="50" align="right"><label for="exampleInputName2">M/C speed </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox"  name="mcspeed" placeholder="M/C speed "></td>
            </tr>
            <tr width=100>
              <td height="50" align="right"><label for="exampleInputName2">เวลาเริ่มเดิน</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="time" class="form-control textbox" name="start_time" placeholder="Lot No."></td>
              <td height="50" align="right"><label for="exampleInputName2">เวลาหยุดเดิน</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="time" class="form-control textbox" name="end_time" placeholder="Size"></td>
              <td height="50" align="right"><label for="exampleInputName2"> Mat No. </label></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="mat_no" placeholder=" "></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-info-circle fa-x2"></i>&nbsp;&nbsp; ข้อมูล </h3>
        </div>
        <div class="panel-body">
          <table width="100%">
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">1 :</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_no1" placeholder="Reel No."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_grade1" placeholder="เกรดกระดาษ 70/80/E/D"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_weight1" placeholder="Weight Kg."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_f_g_1" placeholder="Roll F/G"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_joint1" placeholder="Joint"></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">2 :</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_no2" placeholder="Reel No."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_grade2" placeholder="เกรดกระดาษ 70/80/E/D"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_weight2" placeholder="Weight Kg."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_f_g_2"placeholder="Roll F/G"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_joint2" placeholder="Joint"></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">3 : </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_no3"  placeholder="Reel No."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_grade3" placeholder="เกรดกระดาษ 70/80/E/D"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_weight3" placeholder="Weight Kg."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_f_g_3" placeholder="Roll F/G"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_joint3" placeholder="Joint"></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">4 : </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_no4"  placeholder="Reel No."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_grade4" placeholder="เกรดกระดาษ 70/80/E/D"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_weight4" placeholder="Weight Kg."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_f_g_4"p laceholder="Roll F/G"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_joint4"placeholder="Joint"></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">5 : </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_no5"  placeholder="Reel No."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_grade5" placeholder="เกรดกระดาษ 70/80/E/D"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_weight5"  placeholder="Weight Kg."></td>
              <td height="50" align="right"><input type="text" class="form-control textbox" name="roll_f_g_5" placeholder="Roll F/G"></td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_joint5" placeholder="Joint"></td>
            </tr>
            <tr>
              <td colspan="6">&nbsp;</td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">ยี่ห้อ</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="band" placeholder="ยี่ห้อ"></td>
              <td height="50" align="right"><label for="exampleInputName2">INPUT</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="input_weight" placeholder="Input"></td>
              <td height="50" align="right"><label for="exampleInputName2">OUTPUT</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="output_weight"  placeholder="Output"></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">Total </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="total_ream" placeholder="Total Ream" onkeypress="setOutPut()"></td>
              <td height="50" align="right"><label for="exampleInputName2">Total Reject</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="total_reject" placeholder="Total Reject"></td>
              <td height="50" align="right"><label for="exampleInputName2">Total Reject (%) </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="total_reject_percentage" placeholder="%"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-exclamation-triangle fa-x2"></i>&nbsp;&nbsp; ปัญหากระดาษ / Reject </h3>
        </div>
        <div class="panel-body">
          <table width="90%">
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">Trim</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_a" placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">ต้นม้วน</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_b" placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">โคนแกน</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_c" placeholder="kg."></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">จากม้วน</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_d" placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">C/T jam</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_e" placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">เปลือกห่อเสีย</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox"name="problem_f"  placeholder="kg."></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">Ream Jam</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_g"  placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">กล่องเสีย</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_h" placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">Auto Pack Jam</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_i"  placeholder="kg."></td>
            </tr>
            <tr>
              <td height="50" align="right"><label for="exampleInputName2">ฝาเสีย</label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_g"  placeholder="kg."></td>
              <td height="50" align="right"><label for="exampleInputName2">อื่นๆ </label>
                &nbsp;&nbsp; </td>
              <td height="50" align="center"><input type="text" class="form-control textbox" name="problem_h" placeholder="kg."></td>
              <td height="50" align="right"></td>
              <td height="50" align="center"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-red">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-exclamation-triangle fa-x2"></i>&nbsp;&nbsp; Machine Problem </h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <?php foreach($get_problem as $value_prob){?>
            <div class="col-sm-2" align="right"> <?php echo $value_prob['problem_name']?> </div>
            <div class="col-sm-2">
              <input type="hidden" name="problem_id[]" value="<?php echo $value_prob['problem_id']?>">
              <input type="number" class="form-control textbox" name="downtime[]" placeholder="นาที">
            </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="problem_remark[]" placeholder="หมายเหตุ">
            </div>
            <?php }?>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>หมายเหตุ</strong> </div>
            <div class="col-sm-10">
              <textarea name="remark" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <br />
  <div class="row">
    <div align="center">
      <input type="hidden" name="cut_size" value="<?php echo $this->uri->segment(3)?>" />
      <input type="hidden" name="date" value="<?php echo $this->uri->segment(4)?>" />
      <input type="hidden" name="shift" value="<?php echo $this->uri->segment(5)?>" />
      <button type="submit" class="btn btn-primary btn-lg">บันทึกข้อมูล</button>
    </div>
  </div>
  </div>
  <br />
</form>
<style>
	.textbox { 
		border: 0px;
		border-radius:0px;
		box-shadow:none;
		border-bottom: 1px dotted #000000;
		outline:0;
		width:97%;
	  }
	  .text_red{
	  	color:#F30;
		border-bottom: 1px dotted ;
	  }
	  .text_blue{
	  	color:#039;
		border-bottom: 1px dotted ;
	  }
	  .text_orange{
	  	color:#C60;
		border-bottom: 1px dotted ;
	  }
</style>
    <script src="<?php echo base_url()?>assets/js/setform.js"></script>
