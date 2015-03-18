<?php
$name = "dms-".date('Y-m-d').".xls";
header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); //*** CSV ***//
header("Content-Disposition: attachment; filename=".$name);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Excel - DMS</title>
<style>
.red_text{ color:#F00 }
.blue_text{ color:#00C }
</style>
</head>

<body>
<h2><?php echo $head; ?> </h2>
      <h4>Datetime : 
	  <?php
	  $headerTime = new DateTime($setDate['end_date']); 
	  echo $headerTime->format('d/m/Y H:i:s');?></h4>
<table>
        <thead>
          <tr>
            <th>Grade</th>
            <th>Gram</th>
            <th>saleType</th>
            <th>Brand</th>
            <th>OrderNo</th>
            <th>Width</th>
            <th>CustomerOrder</th>
            <th>Property</th>
            <th>PLC Dest</th>
            <th> <table class="table">
                <tr>
                  <td><div align="center">
                      <div style="border-bottom: 1px dotted #999;">Count of Rollid</div>
                      <div> Sum Weight Net</div>
                    </div></td>
                </tr>
                <tr>
                  <?php $datetime1 = new DateTime($setDate['start_date']);
											for($numMonth=0 ;$numMonth<$countMonth+1 ;$numMonth++ ){ ?>
                  <td><div align="center"><?php echo $datetime1->format('m/Y'); 
												$datetime1->add(new DateInterval('P1M')); ?> </div></td>
                  <?php }?>
                </tr>
              </table>
            </th>
            <th align="center">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php 
		  		$total_roll = 0;
		  		$total_WLBMroll = 0;
				$total_WLBMWeight = 0;
		  ?>
          <?php if(isset($rollData)){
										 foreach($rollData as $key=>$value){?>
          <tr>
            <td><div align="center">
                <?php 
										if($value['Grade']==0){ 
											$Grade = "OSP";
										}elseif($value['Grade']==1){ 
											$Grade = "PPC";
										}elseif($value['Grade']==2){ 
											$Grade = "EPP";
										}elseif($value['Grade']==4){ 
											$Grade = "LPP";
										}
										echo $Grade; ?>
              </div></td>
            <td><?php echo $value['Basisweight'] ?></td>
            <td><div align="center"><?php echo $value['saleType']?></div></td>
            <td><div align="center">
                <?php if($value['Brand']!="0"){echo $value['Brand'];}?>
              </div></td>
            <td><?php echo $value['OrderNo']?></td>
            <td><div align="center"><?php echo $value['Width']?></div></td>
            <td><?php echo $value['CustomerOrder']?></td>
            <td><div align="center">
                <?php if($value['Property']!="0"){echo $value['Property'];}?>
              </div></td>
            <td><?php echo $value['PLC_Dest']?></td>
            <td><table class="table" style="background:none;">
                <tr>
                  <?php 
												$month_header = new DateTime($setDate['start_date']);
												$datetime2 = new DateTime($value['Date_f']);
												for($numMonth=0 ;$numMonth<$countMonth+1 ;$numMonth++ ){ 
											?>
                  <td width="<?php echo 100/($countMonth+1)?>%"><div align="center">
                      <?php 
					  if($datetime2->format('m/Y')==$month_header->format('m/Y')){ 
					  	
					  	echo '<div style="border-bottom: 1px dotted #999;">'.$value['countRoll'].' </div><div> '.number_format($value['sumRoll']).'</div>';
						
						} ?>
                    </div></td>
                  <?php $month_header->add(new DateInterval('P1M'));
											}?>
                </tr>
              </table></td>
            <td><div align="center"><?php echo number_format($value['sumRoll']);?></div></td>
          </tr>
          <?php 
		  		$total_WLBMroll += $value['countRoll'];
		  		$total_WLBMWeight += $value['sumRoll'];
		  if($value['Grade']!=@$rollData[$key+1]['Grade']||$value['Basisweight']!=@$rollData[$key+1]['Basisweight']||$value['saleType']!=@$rollData[$key+1]['saleType']||$value['Brand']!=@$rollData[$key+1]['Brand']){?>
          <tr style="background-color:#FF9">
            <td colspan="4" align="center"><strong>
              <?php 			
			if($value['Brand']!="0"){$band_name = $value['Brand'];}
			echo $name_Roll = $Grade.' '.$value['Basisweight'].' '.$value['saleType'].' '.$band_name; ?>
              </strong></td>
            <td colspan="5" align="right"><strong>Total</strong></td>
            <td><?php 
												$countRoll = $total_WLBMroll;
												$sumRoll = $total_WLBMWeight;
												$total_roll += $countRoll;
												$total_data[] = array(
													'grade' => $name_Roll,
													'countRoll' => $countRoll,
													'sumRoll' => $sumRoll,
												);
												
												if($value['Grade']==0){
													if($value['Basisweight']==60){
														$summary['OSP060'] = array(
															'countRoll' => $countRoll,
															'Weight_Net' => $sumRoll,
															);
													}elseif($value['Basisweight']==70){
														$summary['OSP070'] = array(
															'countRoll' => $countRoll,
															'Weight_Net' => $sumRoll,
															);
													}elseif($value['Basisweight']==80){
														if($value['Brand']=="FSC"){
															$summary['OSP080_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['OSP080'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}elseif($value['Basisweight']==90){
														$summary['OSP090'] = array(
															'countRoll' => $countRoll,
															'Weight_Net' => $sumRoll,
															);		
													}elseif($value['Basisweight']==100){
														if($value['Brand']=="FSC"){
															$summary['OSP100_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['OSP100'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}elseif($value['Basisweight']==120){
															$summary['OSP120'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
													}
												}elseif($value['Grade']==1){
													if($value['Basisweight']==64){
														if($value['Brand']=="FSC"){
															$summary['PPC064_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['PPC064'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}elseif($value['Basisweight']==70){
														if($value['Brand']=="IDM"){
															if($value['saleType']=="D"){
															$summary['PPC070D_IDM'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
															}elseif($value['saleType']=="E"){
																$summary['PPC070E_IDM'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);
															}
														}else{
															if($value['saleType']=="D"){
															$summary['PPC070D'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
															}elseif($value['saleType']=="E"){
																$summary['PPC070E'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);
															}elseif($value['saleType']=="SG"){
																$summary['PPC070SG'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);		
															}
														}
													}elseif($value['Basisweight']==75){
														$summary['OSP080_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
													}elseif($value['Basisweight']==80){
														if($value['Brand']=="FSC"){
															if($value['saleType']=="D"){
															$summary['PPC080D_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
															}elseif($value['saleType']=="E"){
																$summary['PPC080E_FSC'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);
															}
														}elseif($value['Brand']=="IDW"){
															if($value['saleType']=="D"){
															$summary['PPC080D_IDW'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
															}elseif($value['saleType']=="E"){
																$summary['PPC080E_IDW'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);
															}
														}else{
															if($value['saleType']=="D"){
															$summary['PPC080D'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
															}elseif($value['saleType']=="E"){
																$summary['PPC080E'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);
															}elseif($value['saleType']=="SG"){
																$summary['PPC080SG'] = array(
																	'countRoll' => $countRoll,
																	'Weight_Net' => $sumRoll,
																	);		
															}
														}
													}
													}elseif($value['Grade']==2){
														
													if($value['Basisweight']==80){
														if($value['Brand']=="FSC"){
															$summary['EPP080_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['EPP080'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}	
													}elseif($value['Basisweight']==100){
														if($value['Brand']=="FSC"){
															$summary['EPP100_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['EPP100'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}elseif($value['Basisweight']==120){
															$summary['EPP120'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
													}
												}elseif($value['Grade']==4){
													
													if($value['Basisweight']==80){
														if($value['Brand']=="FSC"){
															$summary['LPP080_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['LPP080'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}elseif($value['Basisweight']==90){
														if($value['Brand']=="FSC"){
															$summary['LPP090_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['LPP090'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}		
													}elseif($value['Basisweight']==100){
														if($value['Brand']=="FSC"){
															$summary['LPP100_FSC'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}else{
															$summary['LPP100'] = array(
																'countRoll' => $countRoll,
																'Weight_Net' => $sumRoll,
																);
														}
													}
												}
											?>
              <table border="0" width="100%" style="background:none;">
                <tr>
                  <?php 
												$month_num = new DateTime($setDate['start_date']);
												$datetime3 = new DateTime($value['Date_f']);
												for($numMonthSum=0 ;$numMonthSum<$countMonth+1 ;$numMonthSum++ ){ 
											?>
                  <td width="<?php echo 100/($countMonth+1)?>%"><div align="center"><strong>
                      <?php 
     
												if($datetime3->format('m/Y')==$month_num->format('m/Y')){ 
													
													echo '<div style="border-bottom: 1px dotted #999;">'.$countRoll.' </div><div> '.number_format($sumRoll).'</div>';
												
												}
                                                
												$month_num->add(new DateInterval('P1M'));
											?>
                      </strong></div></td>
                  <?php }?>
                </tr>
              </table></td>
            <td><div align="center"><strong><?php echo number_format(@$sumRoll); ?></strong></div></td>
          </tr>
          <?php 
		  		$total_WLBMroll = 0;
		  		$total_WLBMWeight = 0;
		  	}?>
          <?php }  }?>
        </tbody>
      </table><br>
<table class="table table-bordered table-hover table-striped">
        <tr>
          <td>OSP 60</td>
          <td>OSP 60</td>
          <td align="right"><strong><?php echo number_format(@$summary['OSP060']['Weight_Net'])?></strong></td>
        </tr>
        <tr>
          <td>OSP 70</td>
          <td>OSP 70</td>
          <td align="right"><strong><?php echo number_format(@$summary['OSP070']['Weight_Net'])?></strong></td>
        </tr>
        <tr>
          <td>OSP 80</td>
          <td><div>OSP 80</div>
            <div>EPP 80</div>
            <div>OSP 80 (FSC)</div>
            <div>EEP 80 (FSC)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['OSP080']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['EPP080']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['OSP080_FSC']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['EPP080_FSC']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>OSP 90</td>
          <td><div>OSP 90</div></td>
          <td align="right"><strong>
            <div><?php echo number_format(@$summary['OSP090']['Weight_Net'])?></div>
            </strong></td>
        </tr>
        <tr>
          <td>OSP 100</td>
          <td><div>OSP 100</div>
            <div>EPP 100</div>
            <div>OSP 100 (FSC)</div>
            <div>EEP 100 (FSC)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['OSP100']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['EPP100']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['OSP100_FSC']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['EPP100_FSC']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>OSP 120</td>
          <td><div>OSP 120</div>
            <div>EPP 120</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['OSP120']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['EPP060']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>LPP</td>
          <td><div>LPP 80</div>
            <div>LPP 80 (FSC)</div>
            <div>LPP 90</div>
            <div>LPP 90 (FSC)</div>
            <div>LPP 100</div>
            <div>LPP 100 (FSC)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['LPP080']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['LPP080_FSC']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['LPP090']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['LPP090_FSC']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['LPP100']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['LPP100_FSC']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
      </table><br>
<table>
        <tr>
          <td>PPC 64</td>
          <td><div>PPC 64</div>
            <div>PPC 64 (FSC)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['PPC064']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC064_FSC']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>PPC 70</td>
          <td><div>PPC 70 E</div>
            <div>PPC 70 D</div>
            <div>PPC 70 SG</div>
            <div>PPC 70 D (IDM)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['PPC070E']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC070D']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC070SG']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC070D_IDM']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>PPC 75</td>
          <td><div>PPC 75</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['PPC075']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
        <tr>
          <td>PPC 80</td>
          <td><div>PPC 80 E</div>
            <div>PPC 80 D</div>
            <div>PPC 80 SG</div>
            <div>PPC 80 D (IDW)</div>
            <div>PPC 80 E (IDW)</div>
            <div>PPC 80 E (FSC)</div>
            <div>PPC 80 D (FSC)</div></td>
          <td align="right"><strong>
            <div> <?php echo number_format(@$summary['PPC080E']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080D']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080SG']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080E_IDW']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080D_IDW']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080D_FSC']['Weight_Net'])?> &nbsp;</div>
            <div> <?php echo number_format(@$summary['PPC080E_FSC']['Weight_Net'])?> &nbsp;</div>
            </strong></td>
        </tr>
      </table><br>
<table>
        <thead>
          <tr>
            <th align="center"> Grade Group </th>
            <th align="center"> Total Roll </th>
            <th align="center"> Total Weight Net </th>
          </tr>
        </thead>
        <tbody>
          <?php 
	  $total_roll_Grade = 0 ;
	  $total_roll_Weight = 0 ;
	  for($i=0;$i<count($total_data);$i++){
	  	$total_roll_Grade += $total_data[$i]['countRoll'];
		$total_roll_Weight += $total_data[$i]['sumRoll'];
	  }
	  
	  foreach($total_data as $total_data){?>
          <tr>
            <td><strong><?php echo $total_data['grade'] ?></strong></td>
            <td><div align="center"><?php echo $total_data['countRoll'] ?></div></td>
            <td align="right"><div class="red_text"><strong>
                <?php if($total_data['sumRoll']!=0){ echo @number_format($total_data['sumRoll']); }?>
                </strong></div></td>
          </tr>
          <?php }?>
          <tr>
            <td><strong>Total</strong></td>
            <td><div align="center" class="blue_text"><strong><?php echo number_format($total_roll_Grade)?></strong></div></td>
            <td><div align="right" class="blue_text"><strong><?php echo number_format($total_roll_Weight)?></strong></div></td>
          </tr>
        </tbody>
      </table>
</body>
</html>
