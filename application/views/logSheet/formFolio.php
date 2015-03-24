<br />
<div class="row">
  <div class="col-lg-12">
    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
      <h3><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
      <h4>Log Sheet Folio Sheet Cutter <span class="text_red">No. <?php echo $this->uri->segment(3)?></span></h4>
      <hr width="60%" style="border-color:#690" />
      <h4>วันที่ <strong><span class="text_orange">
        <?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'd / m / Y'); 
			
			?>
        </span></strong> &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; กะ <span class="text_blue">
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
<form action='<?php echo site_url('logSheet_cutsize/add_input_folio') ?>' method=post>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>&nbsp;&nbsp; ข้อมูล</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <table width="100%">
                <tr>
                  <td align="right" width="10%"  height="50"> เกรด &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><select  name="grade" class="form-control textbox">
                      <option value='PPC'>PPC</option>
                      <option value-'OSP'>OSP</option>
                      <option value='EPP'>EPP</option>
                      <option value='IDM'>IDM</option>
                      <option value='IDW'>IDW</option>
                      <option value='SG'>SG</option>
                    </select></td>
                  <td align="right" width="10%"> Order No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="order" placeholder=""></td>
                  <td align="right" width="10%"> Item  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="item" placeholder=""></td>
                  <td align="right" width="10%"> กว้าง  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="width" placeholder=""></td>
                </tr>
                <tr>
                  <td align="right"  height="50"> แกรม  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><select  name="gram" class="form-control textbox">
                      <option value='64'>64</option>
                      <option value-'70'>70</option>
                      <option value='75'>75</option>
                      <option value='80'>80</option>
                      <option value='100'>100</option>
                      <option value='120'>120</option>
                    </select></td>
                  <td align="right"> Size &nbsp;&nbsp; กว้าง &nbsp;</td>
                  <td><input type="number" class="form-control textbox" name="size_width" placeholder=""></td>
                  <td align="center"> x &nbsp;&nbsp;&nbsp; ยาว   &nbsp;</td>
                  <td><input type="number" class="form-control textbox" name="size_height" placeholder=""></td>
                  <td align="right"><select class="form-control textbox select" name="unit">
                      <option value="1">mm.</option>
                      <option value="2">Inch</option>
                    </select></td>
                  <td></td>
                </tr>
                <tr>
                  <td align="right"  height="50"> Lot No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="lot" placeholder=""></td>
                  <td align="right"> RH.   &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="rh" placeholder=""></td>
                  <td align="right"> Mat No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="mat" placeholder=""></td>
                  <td align="right"></td>
                  <td></td>
                </tr>
                <tr>
                  <td align="right"  height="50"> เริ่มเดิน  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="time" class="form-control textbox" name="start_time" placeholder=""></td>
                  <td align="right"> หยุดเดิน  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="time" class="form-control textbox" name="stop_time" placeholder=""></td>
                  <td align="right"> Act. Speed   &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="act" placeholder="%"></td>
                  <td align="right"> Temp  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="temp" placeholder="°C"></td>
                </tr>
              </table>
            </div>
          </div>
          <br />
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-info-circle fa-x2"></i>&nbsp;&nbsp; รายละเอียด </h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-6">
              <div class="row">
                <div class="col-sm-12">
                  <table width="100%"  class="table table-hover">
                    <thead>
                      <tr>
                        <th height="50" width="10%" > <div align="center"> Stand </div>
                        </th>
                        <th height="50"> <div align="center"> Reel No. </div>
                        </th>
                        <th height="50"> <div align="center"> Weight(kg) </div>
                        </th>
                        <th height="50"> <div align="center"> Roll </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for($j=1;$j<6;$j++){?>
                      <tr>
                        <td height="50" align="right"><?php echo $j?> &nbsp;&nbsp;:&nbsp;&nbsp; </td>
                        <td height="50" align="center"><input type="text" class="form-control textbox" name="reel_no[]" placeholder=""></td>
                        <td height="50" align="right"><input type="text" class="form-control textbox" name="reel_weight[]" placeholder=""></td>
                        <td height="50" align="center"><input type="text" class="form-control textbox" name="reel_roll[]" placeholder="G/F "></td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <table width="100%"  class="table table-hover table-striped" id="sortdetail">
                <thead>
                  <tr>
                    <th height="50" width="10%"> <div align="center"> Set NO. </div>
                    </th>
                    <th height="50" colspan="2"> <div align="center"> A </div>
                    </th>
                    <th height="50" colspan="2"> <div align="center"> B </div>
                    </th>
                    <th height="50" colspan="2"> <div align="center"> C </div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=1;$i<10;$i++){?>
                  <tr>
                    <td height="50" align="center"><?php echo $i?></td>
                    <td height="50" align="center" width="15%" ><select class="form-control textbox select"  name="sorta[]">
                        <option value="1">S</option>
                        <option value="2">N</option>
                        <option value="3">N/C</option>
                      </select></td>
                    <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_a[]" placeholder=""></td>
                    <td height="50" align="center" width="15%"><select class="form-control textbox select" name="sortb[]">
                        <option value="1">S</option>
                        <option value="2">N</option>
                        <option value="3">N/C</option>
                      </select></td>
                    <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_b[]" placeholder=""></td>
                    <td height="50" align="center" width="15%"><select class="form-control textbox select" name="sortc[]">
                        <option value="1">S</option>
                        <option value="2">N</option>
                        <option value="3">N/C</option>
                      </select></td>
                    <td height="50" align="center"><input type="text" class="form-control textbox" name="roll_c[]" placeholder=""></td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-check-square"></i>&nbsp;&nbsp; Summary </h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>Total Input (kg)</strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="total_input" placeholder="kg" readonly>
            </div>
            <div class="col-sm-2" align="right"> <strong>Trim reject (kg) </strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="trim_reject" placeholder="kg" readonly>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>Reject (kg)</strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="reject" placeholder="kg" readonly>
            </div>
            <div class="col-sm-2" align="right"> <strong>Total reject (kg) </strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="total_reject" placeholder="kg" readonly>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>Output (kg)</strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="output" placeholder="kg" readonly>
            </div>
            <div class="col-sm-2" align="right"> <strong>จำนวนรีมที่ตัดได้</strong> </div>
            <div class="col-sm-4">
              <input type="number" class="form-control textbox" name="ream" placeholder="Ream">
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>Sort</strong> </div>
            <div class="col-sm-2">
              <input type="number" class="form-control textbox" name="sort" placeholder="Ream" readonly>
            </div>
            <div class="col-sm-2" align="right"> <strong> No Sort </strong> </div>
            <div class="col-sm-2">
              <input type="number" class="form-control textbox" name="nosort" placeholder="Ream" readonly>
            </div>
            <div class="col-sm-2" align="right"> <strong> N/C </strong> </div>
            <div class="col-sm-2">
              <input type="number" class="form-control textbox" name="nc" placeholder="Ream" readonly>
            </div>
          </div>
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
            <div class="col-sm-1">
              <input type="text" class="form-control textbox" name="from[]" placeholder="from">
            </div>
            <div class="col-sm-1">
              <input type="text" class="form-control textbox" name="to[]" placeholder="to">
            </div>
            <?php }?>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>ปัญหาเครื่องจักร</strong> </div>
            <div class="col-sm-10">
              <textarea name="proble_remark" class="form-control"></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-green">
        <div class="panel-heading">
          <h3 class="panel-title"> <i class="fa fa-certificate fa-x2"></i>&nbsp;&nbsp; Remark / หมายเหตุ </h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-2" align="right"> Total sort(Pallet) </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_sort" placeholder="Pallet">
            </div>
            <div class="col-sm-2" align="right"> Total N(Pallet) </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_nosort" placeholder="Pallet">
            </div>
            <div class="col-sm-2" align="right"> <strong>N/C(Pallet)</strong> </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_nc" placeholder="Pallet">
            </div>
          </div>
          <br />
          <!-- //////// Summary Data //////  -->
          <div class="row">
            <div class="col-sm-4">
              <div class="row">
                <div class="col-sm-6" align="right"> เกรดกระดาษ </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_grade1" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Size </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_size1" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Input </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalinput1" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Output </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totaloutput1" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> รวมจำนวนรีม </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalream1" placeholder="รีม">
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="row">
                <div class="col-sm-6" align="right"> เกรดกระดาษ </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_grade2" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Size </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_size2" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Input </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalinput2" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Output </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totaloutput2" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> รวมจำนวนรีม </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalream2" placeholder="รีม">
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="row">
                <div class="col-sm-6" align="right"> เกรดกระดาษ </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_grade3" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Size </div>
                <div class="col-sm-6">
                  <input type="text" class="form-control textbox" name="remark_size3" placeholder="">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Input </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalinput3" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> Total Output </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totaloutput3" placeholder="กก.">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" align="right"> รวมจำนวนรีม </div>
                <div class="col-sm-6">
                  <input type="number" class="form-control textbox" name="remark_totalream3" placeholder="รีม">
                </div>
              </div>
            </div>
          </div>
          <br />
          <hr />
          <div class="row">
            <div class="col-sm-2" align="right"> <strong>Total Input</strong> </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_total_input" placeholder="kg.">
            </div>
            <div class="col-sm-2" align="right"> <strong>Total Output</strong> </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_total_output" placeholder="kg.">
            </div>
            <div class="col-sm-2" align="right"> <strong>รวมจำนวนรีม</strong> </div>
            <div class="col-sm-2">
              <input type="text" class="form-control textbox" name="remark_total_ream" placeholder="รีม">
            </div>
          </div>
          <hr />
          
          <!-- //////// End Summary Data //////  -->
          <div class="row">
            <div class="col-sm-2" align="right"> หัวหน้ากะ </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_head_shift" placeholder="">
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> พนักงานประจำเครื่องตัด </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_employee1" placeholder="Control">
            </div>
            <div class="col-sm-2" align="right"> พนักงานทำล่วงเวลา </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_em_ot1" placeholder="">
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_employee2" placeholder="Layboy">
            </div>
            <div class="col-sm-2" align="right"> </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_em_ot2" placeholder="">
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-2" align="right"> คู่ธุรกิจ </div>
            <div class="col-sm-4">
              <input type="text" class="form-control textbox" name="remark_customer" placeholder="">
            </div>
          </div>
          <br />
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
      <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
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
	  .select{
		padding: 0;
  		font-size: 12px;
	  }
	  
</style>
    <script src="<?php echo base_url()?>assets/js/setformfolio.js"></script>