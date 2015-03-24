<br />
<div class="row">
	 <div class="col-lg-12">
	    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
			<h3><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
            <h4>Log Sheet Folio Sheet Cutter <span class="text_red">No. <?php echo $this->uri->segment(3)?></span></h4>
            <hr width="60%" style="border-color:#690" />
            <h4>วันที่ <strong><span class="text_orange"><?php 
			$date = new DateTime($this->uri->segment(4));
  			echo date_format($date, 'd / m / Y'); 
			
			?> </span></strong> &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp; กะ
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

<form action='<?php echo site_url('logSheet_cutsize/edit_input_folio') ?>' method=post>

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
                  		<option value="<?php echo $detail_folio[0]['grade']?>"><?php echo $detail_folio[0]['grade']?></option>
                      <option value='PPC'>PPC</option>
                      <option value-'OSP'>OSP</option>
                      <option value='EPP'>EPP</option>
                      <option value='IDM'>IDM</option>
                      <option value='IDW'>IDW</option>
                      <option value='SG'>SG</option>
                    </select></td>
                  <td align="right" width="10%"> Order No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="order" placeholder="" value="<?php echo $detail_folio[0]['order']?>"></td>
                  <td align="right" width="10%"> Item  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="item" placeholder="" value="<?php echo $detail_folio[0]['item']?>"></td>
                  <td align="right" width="10%"> กว้าง  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><input type="text" class="form-control textbox" name="width" placeholder="" value="<?php echo $detail_folio[0]['width']?>"></td>
                </tr>
                <tr>
                  <td align="right"  height="50"> แกรม  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                  <td><select  name="gram" class="form-control textbox">
                  		<option value="<?php echo $detail_folio[0]['gram']?>"><?php echo $detail_folio[0]['gram']?></option>
                      <option value='64'>64</option>
                      <option value-'70'>70</option>
                      <option value='75'>75</option>
                      <option value='80'>80</option>
                      <option value='100'>100</option>
                      <option value='120'>120</option>
                    </select></td>
                  <td align="right"> Size &nbsp;&nbsp; กว้าง &nbsp;</td>
                  <td><input type="number" class="form-control textbox" name="size_width" placeholder="" value="<?php echo $detail_folio[0]['size_width']?>"></td>
                  <td align="center"> x &nbsp;&nbsp;&nbsp; ยาว   &nbsp;</td>
                  <td><input type="number" class="form-control textbox" name="size_height" placeholder="" value="<?php echo $detail_folio[0]['size_height']?>"></td>
                  <td align="right"><select class="form-control textbox select" name="unit">
                  		<option value="<?php echo $detail_folio[0]['unit']?>"><?php echo $detail_folio[0]['unit']?></option>
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
                        <table width="100%">
                        <tr>
                             <td align="right" width="10%">  เกรด &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <select  name="grade" class="form-control textbox">
                             	<option value="<?php echo $detail_folio[0]['grade']?>"><?php echo $detail_folio[0]['grade']?></option>
                              <option value='PPC'>PPC</option>
                              <option value-'OSP'>OSP</option>
                              <option value='EPP'>EPP</option>
                              <option value='IDM'>IDM</option>
                              <option value='IDW'>IDW</option>
                              <option value='SG'>SG</option>
                            </select>
                             </td>
                             <td align="right" width="10%"> Order No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="order" placeholder="" value="<?php echo $detail_folio[0]['order']?>">
                             </td>
                             <td align="right" width="10%"> Item  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="item" placeholder="" value="<?php echo $detail_folio[0]['item']?>">
                             </td>
                             <td align="right" width="10%">  กว้าง  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="width" placeholder="" value="<?php echo $detail_folio[0]['width']?>">
                             </td>
                        </tr>
                        <tr>
                             <td align="right">   Lot No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="lot" placeholder="" value="<?php echo $detail_folio[0]['lot']?>">
                             </td>
                             <td align="right"> Size  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="size" placeholder="" value="<?php echo $detail_folio[0]['size']?>">
                             </td>
                             <td align="right">  RH.   &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="rh" placeholder="" value="<?php echo $detail_folio[0]['rh']?>">
                             </td>
                             <td align="right">  Mat No.  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="mat" placeholder="" value="<?php echo $detail_folio[0]['mat']?>">
                             </td>
                        </tr>
                        <tr>
                             <td align="right">   เริ่มเดิน  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="time" class="form-control textbox" name="start_time" placeholder="" value="<?php echo $detail_folio[0]['start_time']?>">
                             </td>
                             <td align="right"> หยุดเดิน  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="time" class="form-control textbox" name="stop_time" placeholder="" value="<?php echo $detail_folio[0]['stop_time']?>">
                             </td>
                             <td align="right">  Act. Speed   &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="act" placeholder="%" value="<?php echo $detail_folio[0]['act']?>">
                             </td>
                             <td align="right">  Temp  &nbsp;&nbsp;:&nbsp;&nbsp;</td>
                             <td>
                             <input type="text" class="form-control textbox" name="temp" placeholder="°C" value="<?php echo $detail_folio[0]['temp']?>">
                             </td>
                        </tr>

                        </table>
                    </div>
                </div><br />
			
            </div>

        </div>
</div>
</div><br />

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
                <th height="50" width="10%" > <div align="center">   Stand  </div>  </th>
                <th height="50">  <div align="center">  Reel No.  </div> </th>
                <th height="50">  <div align="center">   Weight(kg)  </div>   </th>
                <th height="50">  <div align="center">  Roll    </div> </th>
            </tr>
            </thead>
            <tbody>
            <?php for($j=0;$j<5;$j++){?>
            <tr> 
                <td height="50" align="right">    <?php echo $j+1?> &nbsp;&nbsp;:&nbsp;&nbsp; </td>
                 <?php if(isset($detail_reel[$j]['reel_no'])){ ?>
                <td height="50" align="center">    <input type="text" class="form-control textbox" name="reel_no[]" placeholder="" value="<?php echo $detail_reel[$j]['reel_no']?>">  </td>
                <td height="50" align="right">   <input type="text" class="form-control textbox" name="reel_weight[]" placeholder="" value="<?php echo $detail_reel[$j]['reel_weight']?>">  </td>
                <td height="50" align="center">    <input type="text" class="form-control textbox" name="reel_roll[]" placeholder="G/F " value="<?php echo $detail_reel[$j]['reel_roll']?>">  </td>
                <?php }else{ ?>
                <td height="50" align="center">    <input type="text" class="form-control textbox" name="reel_no[]" placeholder="">  </td>
                <td height="50" align="right">   <input type="text" class="form-control textbox" name="reel_weight[]" placeholder="">  </td>
                <td height="50" align="center">    <input type="text" class="form-control textbox" name="reel_roll[]" placeholder="G/F ">  </td>
                <?php }?>
            </tr>
            <?php }?> 
            </tbody>
            </table>
            </div>
            </div>
            
        </div>
        <div class="col-sm-6">
            <table width="100%"  class="table table-hover table-striped">
         <thead>   
         <tr> 
                <th height="50" width="10%">  <div align="center">   Set NO.  </div>   </th>
                <th height="50" colspan="2">  <div align="center">   A   </div> </th> 
                <th height="50" colspan="2">   <div align="center">  B  </div>  </th> 
                <th height="50" colspan="2">   <div align="center">  C   </div> </th> 
            </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<9;$i++){?>
            <tr> 
                <td height="50" align="center" width="10%">    <?php echo $i+1?> </td>
                <?php if(!isset($detail_set[$i]['problem_id'])){ ?>
                <td height="50" align="center"  width="15%">    <select class="form-control textbox" name="softa[]">
                									<option value="<?php echo $detail_set[$i]['softa'] ?>">
                                                    <?php 	if($detail_set[$i]['softa']==1){
																echo "soft";
													}elseif($detail_set[$i]['softa']==2){
														echo "no soft";
													}else{
														echo "N/C";
													}
													?>
                                                    </option>
                                                    <option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>  </td> 
                <td height="50" align="center"  width="15%">    <input type="text" class="form-control textbox" name="roll_a[]" placeholder="" value="<?php echo $detail_set[$i]['roll_a'] ?>">  </td> 
                <td height="50" align="center"  width="15%">    <select class="form-control textbox" name="softb[]">
                									<option value="<?php echo $detail_set[$i]['softb'] ?>">
                                                    <?php 	if($detail_set[$i]['softb']==1){
																echo "soft";
													}elseif($detail_set[$i]['softb']==2){
														echo "no soft";
													}else{
														echo "N/C";
													}
													?>
                                                    </option>
                                                    <option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>   </td> 
                <td height="50" align="center  width="15%"">    <input type="text" class="form-control textbox" name="roll_b[]" placeholder="" value="<?php echo $detail_set[$i]['roll_b'] ?>">  </td>
                <td height="50" align="center"  width="15%">    <select class="form-control textbox" name="softc[]">
                									<option value="<?php echo $detail_set[$i]['softc'] ?>">
                                                    <?php 	if($detail_set[$i]['softc']==1){
																echo "soft";
													}elseif($detail_set[$i]['softc']==2){
														echo "no soft";
													}else{
														echo "N/C";
													}
													?>
                                                    </option>
                                                    <option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>  </td> 
                <td height="50" align="center"  width="15%">    <input type="text" class="form-control textbox" name="roll_c[]" placeholder="" value="<?php echo $detail_set[$i]['roll_c'] ?>">  </td>
                <?php }else{?>
                 <td height="50" align="center  width="15%"">    <select class="form-control textbox" name="softa[]">
                									<option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>  </td> 
                <td height="50" align="center"  width="15%">    <input type="text" class="form-control textbox" name="roll_a[]" placeholder="">  </td> 
                <td height="50" align="center"  width="15%">    <select class="form-control textbox" name="softb[]">
                									<option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>  </td> 
                <td height="50" align="center"  width="15%">    <input type="text" class="form-control textbox" name="roll_b[]" placeholder="">  </td>
                <td height="50" align="center"  width="15%">    <select class="form-control textbox" name="softc[]">
                									<option value="1">soft</option>
                                                    <option value="2">no soft</option>
                                                    <option value="3">N/C</option>
                                                    </select>  </td> 
                <td height="50" align="center"  width="15%">    <input type="text" class="form-control textbox" name="roll_c[]" placeholder="">  </td>               
                <?php }?>
            </tr>
            <?php }?>
            </tbody>
            </table>
        </div>
        </div>
        </div>
    </div>
</div>
</div><br />
<div class="row">
	<div class="col-sm-12">
    <div class="panel panel-yellow">
            <div class="panel-heading">
                <h3 class="panel-title"> <i class="fa fa-check-square"></i>&nbsp;&nbsp; Summary </h3>
            </div>
      
        <div class="panel-body">
                        <div class="row">
                <div class="col-sm-2" align="right">
                    <strong>Total Input (kg)</strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="total_input" placeholder="kg" value="<?php echo $detail_folio[0]['total_input']?>" readonly>
                </div>
                <div class="col-sm-2" align="right">
                    <strong>Trim reject (kg) </strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="trim_reject" placeholder="kg" value="<?php echo $detail_folio[0]['trim_reject']?>" readonly>
                </div>
            </div><br />
		<div class="row">
                <div class="col-sm-2" align="right">
                    <strong>Reject (kg)</strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="reject" placeholder="kg" value="<?php echo $detail_folio[0]['reject']?>" readonly>
                </div>
                <div class="col-sm-2" align="right">
                    <strong>Total reject (kg) </strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="total_reject" placeholder="kg" value="<?php echo $detail_folio[0]['total_reject']?>" readonly>
                </div>
            </div><br />
            <div class="row">
                <div class="col-sm-2" align="right">
                    <strong>Output (kg)</strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="output" placeholder="kg" value="<?php echo $detail_folio[0]['output']?>" readonly>
                </div>
                <div class="col-sm-2" align="right">
                    <strong>จำนวนรีมที่ตัดได้</strong>
                </div>
                <div class="col-sm-4">
                    <input type="number" class="form-control textbox" name="ream" placeholder="Ream" value="<?php echo $detail_folio[0]['ream']?>">
                </div>
            </div><br />

<div class="row">
                <div class="col-sm-2" align="right">
                    <strong>Soft</strong>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control textbox" name="soft" placeholder="pallet" value="<?php echo $detail_folio[0]['soft']?>" readonly>
                </div>
                <div class="col-sm-2" align="right">
                    <strong> No Soft </strong>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control textbox" name="nosoft" placeholder="pallet" value="<?php echo $detail_folio[0]['nosoft']?>" readonly>
                </div>
                <div class="col-sm-2" align="right">
                    <strong> N/C </strong>
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control textbox" name="nc" placeholder="pallet" value="<?php echo $detail_folio[0]['nc']?>" readonly>
                </div>
            </div>

        </div>
    </div>
    </div>
</div><br />

<div class="row">
	<div class="col-sm-12">
    <div class="panel panel-red">
            <div class="panel-heading">
                <h3 class="panel-title"> <i class="fa fa-exclamation-triangle fa-x2"></i>&nbsp;&nbsp; Machine Problem </h3>
            </div>
      
        <div class="panel-body">
            <div class="row">
            <?php $arr=0; foreach($get_problem as $value_prob){?>
                <div class="col-sm-2" align="right">
                    <?php echo $value_prob['problem_name']?>
                </div>
                <?php if($detail_problem[$arr]['problem_id']==$value_prob['problem_id']){ ?>
                <div class="col-sm-2">
                	<input type="hidden" name="problem_id[]" value="<?php echo $value_prob['problem_id']?>">
                    <input type="number" class="form-control textbox" name="downtime[]" placeholder="นาที" value="<?php echo $detail_problem[$arr]['min']?>">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control textbox" name="from[]" placeholder="from" value="<?php echo $detail_problem[$arr]['problem_from']?>">
                </div>
                <div class="col-sm-1">
                    <input type="text" class="form-control textbox" name="to[]" placeholder="to" value="<?php echo $detail_problem[$arr]['problem_to']?>">
                </div>
                <?php $arr++;}else{ ?>
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
            <?php }?>
            </div><br />
            <div class="row">
                <div class="col-sm-2" align="right">
                    <strong>ปัญหาเครื่องจักร</strong>
                </div>
                <div class="col-sm-10">
                   	<textarea name="proble_remark" class="form-control"><?php echo $detail_folio[0]['proble_remark']?></textarea>
                </div>
            </div>
        </div>
    </div>
    </div>
</div><br />

<div class="row">
	<div class="col-sm-12">
    <div class="panel panel-green">
            <div class="panel-heading">
                <h3 class="panel-title"> <i class="fa fa-certificate fa-x2"></i>&nbsp;&nbsp; Remark / หมายเหตุ </h3>
            </div>
      
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-2" align="right">
                    Total Soft(Pallet)
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_soft" placeholder="Pallet" 
                    value="<?php echo $detail_remark[0]['remark_soft'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                    Total No Soft(Pallet)
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_nosoft" placeholder="Pallet" 
                    value="<?php echo $detail_remark[0]['remark_nosoft'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                    <strong>N/C(Pallet)</strong>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_nc" placeholder="Pallet" 
                    value="<?php echo $detail_remark[0]['remark_nc'] ?>">
                </div>
                
                
            </div><br />
            <!-- //////// Summary Data //////  -->
            <div class="row">
            	<div class="col-sm-4">
                	<div class="row">
                        <div class="col-sm-6" align="right">
                            เกรดกระดาษ
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_grade1" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_grade1'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Size
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_size1" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_size1'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Input
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalinput1" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totalinput1'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Output
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totaloutput1" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totaloutput1'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            รวมจำนวนรีม
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalream1" placeholder="รีม" 
                    value="<?php echo $detail_remark[0]['remark_totalream1'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="row">
                        <div class="col-sm-6" align="right">
                            เกรดกระดาษ
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_grade2" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_grade2'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Size
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_size2" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_size2'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Input
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalinput2" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totalinput2'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Output
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totaloutput2" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totaloutput2'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            รวมจำนวนรีม
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalream2" placeholder="รีม" 
                    value="<?php echo $detail_remark[0]['remark_totalream2'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                	<div class="row">
                        <div class="col-sm-6" align="right">
                            เกรดกระดาษ
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_grade3" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_grade3'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Size
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control textbox" name="remark_size3" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_size3'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Input
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalinput3" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totalinput3'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            Total Output
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totaloutput3" placeholder="กก." 
                    value="<?php echo $detail_remark[0]['remark_totaloutput3'] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" align="right">
                            รวมจำนวนรีม
                        </div>
                        <div class="col-sm-6">
                            <input type="number" class="form-control textbox" name="remark_totalream3" placeholder="รีม" 
                    value="<?php echo $detail_remark[0]['remark_totalream3'] ?>">
                        </div>
                    </div>
                </div>
            </div><br /><hr />
            <div class="row">
                <div class="col-sm-2" align="right">
                    <strong>Total Input</strong>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_total_input" placeholder="kg." 
                    value="<?php echo $detail_remark[0]['remark_total_input'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                    <strong>Total Output</strong>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_total_output" placeholder="kg." 
                    value="<?php echo $detail_remark[0]['remark_total_output'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                    <strong>รวมจำนวนรีม</strong>
                </div>
                <div class="col-sm-2">
                    <input type="text" class="form-control textbox" name="remark_total_ream" placeholder="รีม" 
                    value="<?php echo $detail_remark[0]['remark_total_ream'] ?>">
                </div>
            </div><hr />

            <!-- //////// End Summary Data //////  -->
            <div class="row">
                <div class="col-sm-2" align="right">
                    หัวหน้ากะ
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_head_shift" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_head_shift'] ?>">
                </div>
            </div><br />
            <div class="row">
                <div class="col-sm-2" align="right">
                    พนักงานประจำเครื่องตัด
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_employee1" placeholder="Control" 
                    value="<?php echo $detail_remark[0]['remark_employee1'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                    พนักงานทำล่วงเวลา 
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_em_ot1" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_em_ot1'] ?>">
                </div>
            </div><br />
			<div class="row">
                <div class="col-sm-2" align="right">
                    
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_employee2" placeholder="Layboy" 
                    value="<?php echo $detail_remark[0]['remark_employee2'] ?>">
                </div>
                <div class="col-sm-2" align="right">
                     
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_em_ot2" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_em_ot2'] ?>">
                </div>
            </div><br />
			<div class="row">
                <div class="col-sm-2" align="right">
                    คู่ธุรกิจ
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control textbox" name="remark_customer" placeholder="" 
                    value="<?php echo $detail_remark[0]['remark_customer'] ?>">
                </div>
            </div><br />
        </div>
    </div>
    </div>
</div><br />

<div class="row">
<div align="center"> 
    <input type="hidden" name="cut_size" value="<?php echo $this->uri->segment(3)?>" />
    <input type="hidden" name="date" value="<?php echo $detail_folio[0]['date']?>" />
    <input type="hidden" name="shift" value="<?php echo $detail_folio[0]['shift']?>" />
    <input type="hidden" name="f_id" value="<?php echo $detail_folio[0]['f_id']?>" />
    <input type="hidden" name="lfr_id" value="<?php echo $detail_remark[0]['lfr_id']?>" />
    <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>  </div>
</div>
</div><br />

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
<script src="<?php echo base_url()?>assets/js/setformfolio.js"></script>