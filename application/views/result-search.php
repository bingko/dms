
<div class="row">
<div class="col-lg-12">
                        <div style="float:left"><h2>Roll in Converting Area</h2></div>
                        <div style="float:right"><br />
                        <a href="<?php echo base_url() ?>files/22-12-2557.xls">
                        <button type="button" class="btn btn-primary" style="width:160px;"><i class="fa fa-download fa-x2"></i>&nbsp; Export To Excel </button>
                        </a></div>
                        </div>
                        </div>
                        <hr />
                        
                        <div class="row">
<div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>WLBM</th>
                                        <th>OrderNo</th>
                                        <th>saleType</th>
                                        <th>Brand</th>
                                        <th>Width</th>
                                        <th>CustomerOrder</th>
                                        <th>Property</th>
                                        <th>
                                        	<table class="table">
                                           
                                            <tr>
                                            	<td colspan="5"><div align="center"><div style="border-bottom: 1px dotted #999;">Count of Rollid</div><div> Sum Weight Net</div></div></td>
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
                                <?php if(isset($rollData)){
										 foreach($rollData as $key=>$value){?>
                                    <tr>
                                        <td><?php echo $value['WLBM'] ?></td>
                                        <td><?php echo $value['OrderNo']?></td>
                                        <td><div align="center"><?php echo $value['saleType']?></div></td>
                                        <td><div align="center"><?php if($value['Brand']!="0"){echo $value['Brand'];}?></div></td>
                                        <td><div align="center"><?php echo $value['Width']?></div></td>
                                        <td><?php echo $value['CustomerOrder']?></td>
                                        <td><div align="center"><?php if($value['Property']!="0"){echo $value['Property'];}?></div></td>
                                        <td>
                                            <table class="table" style="background:none;">
											<tr>
                                            <?php 
												$month_header = new DateTime($setDate['start_date']);
												$datetime2 = new DateTime($value['Date_f']);
												for($numMonth=0 ;$numMonth<$countMonth+1 ;$numMonth++ ){ 
											?>
                                            <td width="<?php echo 100/($countMonth+1)?>%"><div align="center"><?php if($datetime2->format('m')==$month_header->format('m')){ echo '<div style="border-bottom: 1px dotted #999;">'.$value['countRoll'].' </div><div> '.$value['sumRoll'].'</div>';} ?> </div></td>
											<?php $month_header->add(new DateInterval('P1M'));
											}?>
                                            </tr>
                                            </table>
                                        </td>
                                        <td><div align="center"><?php echo $value['sumRoll'];?></div></td>
                                    </tr>
                                    <?php if($value['WLBM']!=@$rollData[$key+1]['WLBM']){?>
                                    <tr style="background-color:#FF9">
                                    <td> <strong><?php echo $value['WLBM'];?></strong> </td>
                                    <td colspan="6" align="right"><strong>Total</strong></td>
                                    <td>
                                    	<table border="0" width="100%" style="background:none;">
											<tr>
                                            <?php 
												$searchDate = array(
														'WLBM' => $value['WLBM'],
														'OrderNo' => $value['OrderNo'],
														'Width' => $value['Width'],
														'start_date' => $setDate['start_date'],
														'end_date' => $setDate['end_date'],
														);
												$result = $this->roll_model->intermedateSUM($searchDate);
												
												$month_num = new DateTime($setDate['start_date']);
												$datetime3 = new DateTime($value['Date_f']);
												for($numMonthSum=0 ;$numMonthSum<$countMonth+1 ;$numMonthSum++ ){ 
											?>
                                            <td width="<?php echo 100/($countMonth+1)?>%"><div align="center"><strong>
                                            <?php 
                                                /*
												if($datetime3->format('m')==$month_num->format('m')){ 
													echo '<div style="border-bottom: 1px dotted #999;">'.$result[0]['countRoll'].' </div><div> '.$result[0]['sumRoll'].'</div>';
												}
                                                */
												$month_num->add(new DateInterval('P1M'));
											?>
                                            </strong></div></td>
											<?php }?>
                                            </tr>
                                    	</table>
                                    </td>
                                    <td><div align="center"><strong><?php echo $result[0]['sumRoll'];?></strong></div></td>
                                    </tr>
                                    <?php }?>
                                <?php } 
									}?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-6">
                    	<div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                        	<tr>
                            	<td>OSP 60</td>
                                <td>OSP 60</td>
                                <td align="right"><strong><?php echo @$summary['OSP060'][0]['sumRoll'];?></strong></td>
                            </tr>
                            <tr>
                            	<td>OSP 70</td>
                                <td>OSP 70</td>
                                <td align="right"><strong><?php echo @$summary['OSP070'][0]['sumRoll']?></strong></td>
                            </tr>
                            <tr>
                            	<td>OSP 80</td>
                                <td><div>OSP 80</div>
                                <div>EPP 80</div>
                                <div>OSP 80 (FSC)</div>
                                <div>EEP 80 (FSC)</div></td>
                                <td align="right"><strong><div> <?php echo @$summary['OSP080'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['EPP080'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['OSP080_FSC'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['EPP080_FSC'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>OSP 90</td>
                                <td><div>OSP 90</div></td>
                                <td align="right"><div> <strong><?php echo @$summary['OSP090'][0]['sumRoll']?></strong> </div></td>
                            </tr>
                            <tr>
                            	<td>OSP 100</td>
                                <td><div>OSP 100</div>
                                <div>EPP 100</div>
                                <div>OSP 100 (FSC)</div>
                                <div>EEP 100 (FSC)</div></td>
                                <td align="right"><strong><div> <?php echo @$summary['OSP100'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['EPP100'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['OSP100_FSC'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['EPP100_FSC'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>OSP 120</td>
                                <td><div>OSP 120</div>
                                <div>EPP 120</div></td>
                                <td align="right"><strong><div> <?php echo @$summary['OSP120'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['EPP060'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>LPP</td>
                                <td><div>LPP 80</div>
                                <div>LPP 80 (FSC)</div>
                                <div>LPP 90</div>
                                <div>LPP 90 (FSC)</div>
                                <div>LPP 100</div>
                                <div>LPP 100 (FSC)</div>
                                </td>
                                <td align="right"><strong><div> <?php echo @$summary['LPP080'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['LPP080_FSC'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['LPP090'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['LPP090_FSC'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['LPP100'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['LPP100_FSC'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                    	<div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                            	<td>PPC 64</td>
                                <td><div>PPC 64</div>
                                <div>PPC 64 (FSC)</div></td>
                                <td align="right"><strong><div> <?php echo @$summary['PPC064'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC064_FSC'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>PPC 70</td>
                                <td><div>PPC 70 E</div>
                                <div>PPC 70 D</div>
                                <div>PPC 70 SG</div>
                                <div>PPC 70 D (IDM)</div>
                                </td>
                                <td align="right"><strong><div> <?php echo @$summary['PPC070E'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC070D'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC070SG'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC070D_IDM'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>PPC 75</td>
                                <td><div>PPC 75</div></td>
                                <td align="right"><strong><div> <?php echo @$summary['PPC075'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                            <tr>
                            	<td>PPC 80</td>
                                <td><div>PPC 80 E</div>
                                <div>PPC 80 D</div>
                                <div>PPC 80 SG</div>
                                <div>PPC 80 D (IDM)</div>
                                <div>PPC 80 E (IDM)</div>
                                <div>PPC 80 E (FSC)</div>
                                <div>PPC 80 D (FSC)</div>
                                </td>
                                <td align="right"><strong><div> <?php echo @$summary['PPC080E'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080D'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080SG'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080E_IDM'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080D_IDM'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080D_FSC'][0]['sumRoll']?> &nbsp;</div>
                                <div> <?php echo @$summary['PPC080E_FSC'][0]['sumRoll']?> &nbsp;</div></strong></td>
                            </tr>
                        </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
</div>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
$(document).ready(function() {
    //$('#data-table').dataTable();
} );
</script>
