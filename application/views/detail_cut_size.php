<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SCG DMS - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url()?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/monitor.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip({
            placement : 'top'
        });
    });
    </script>

    </head>

    <body style="margin:0px;padding:0px;">
    <?php $process = $nplan[0]['prod_qty_ton']-($sum_Weight_done/1000); ?>
<div id="page-wrapper">
      <div class="row">
    <div class="col-xs-12">
          <div class="panel panel-primary">
        <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <strong><?php echo $header?></strong></h3>
              <div class="panel-title" style="float:right; position:relative;top:-20px;"> <a href="<?php echo site_url('dashboard/monitor')?>"><i class="fa fa-arrow-circle-up"></i></a> </div>
            </div>
        <div class="panel-body">
              <div class="row">
            <div class="col-xs-6" align="center">
                  <div id="morris-donut-chart"></div>
                  <hr>
                  
                </div>
            <div class="col-xs-6">
               <div class="row">
                <div class="col-xs-6">
                      <div class="list-group"> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-success"><?php echo $nplan[0]['order_no']?></span> 
                      <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Order No. : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-info"><?php echo $nplan[0]['start_date']?></span> 
                      <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Plan Date : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-error"><?php echo $real_time?></span> 
                      <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Real Date : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-success"><?php echo $nplan[0]['DTWH']?></span> 
                      <span class="glyphicon glyphicon-import" aria-hidden="true"></span> DTWH : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-info"><?php echo $nplan[0]['material']?></span> 
                      <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Material : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-error"><?php echo $nplan[0]['material_desc']?></span> 
                      <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Mat. Desc. : 
                      </a>
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-error"><?php echo $nplan[0]['pallet_size']?></span> 
                      <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Pallet Size : 
                      </a>
                      </div>
                </div>
                <div class="col-xs-6">
                      <div class="list-group"> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-error"><?php echo $nplan[0]['grade']?></span> 
                      <span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> Grade : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-success"><?php echo $nplan[0]['bw']?></span>
                      <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span> Gram : 
                      </a> 
                      <a href="#" class="list-group-item"> <span class="badge badge-info"><?php echo $nplan[0]['brand']?></span> 
                      <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Brand : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-error"><?php echo $nplan[0]['eo']?></span> 
                      <span class="glyphicon glyphicon-compressed" aria-hidden="true"></span> EO : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-success"><?php echo $nplan[0]['co']?></span>
                      <span class="glyphicon glyphicon-text-width" aria-hidden="true"></span> CO : 
                      </a> 
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-info"><?php echo $nplan[0]['prod_qty_ton']?></span> 
                      <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> Prod.Qty (Ton) : 
                      </a>
                      <a href="#" class="list-group-item"> 
                      <span class="badge badge-info"><?php echo $nplan[0]['pl_qty']?></span> 
                      <span class="glyphicon glyphicon-certificate" aria-hidden="true"></span> จำนวน PL : 
                      </a>
                      </div>
              	</div>
              </div>
                  
                </div>
          </div>
          <div class="row">
                <div class="col-lg-4 col-md-6">
                      <div class="panel panel-primary">
                    <div class="panel-heading">
                          <div class="row">
                        <div class="col-xs-3">
                              <div class="huge">Status</div>
                            </div>
                        <div class="col-xs-9 text-right">
                              <div class="huge"><span class="glyphicon glyphicon-ok" aria-hidden="true"> </span></div>
                              <div>Running!</div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div>
                <div class="col-lg-4 col-md-6">
                      <div class="panel panel-green">
                    <div class="panel-heading">
                          <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-info-circle fa-4x"></i> </div>
                        <div class="col-xs-9 text-right">
                              <div class="huge"><span style="font-size:0.9em;"><?php echo $nplan[0]['prod_qty_ton'];?></span></div>
                              <div>Total Weight(Ton)</div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div>
                <div class="col-lg-4 col-md-6">
                      <div class="panel panel-yellow">
                    <div class="panel-heading">
                          <div class="row">
                        <div class="col-xs-3"> <i class="fa fa-tasks fa-4x"></i> </div>
                        <div class="col-xs-9 text-right">
                              <div class="huge"><?php echo count($roll_doing).' / '.$nplan[0]['pl_qty']?></div>
                              <div>Pallet Quantity</div>
                            </div>
                      </div>
                        </div>
                  </div>
                    </div>
              </div>
          <div class="row">
                <div class="col-lg-12">
                      <div class="table-responsive">
                    <label> <strong>Next Order</strong> </label>
                    <table id="next-order" class="table table-bordered table-hover table-striped">
                          <thead>
                        <tr>
                              <th>Order No #</th>
                              <th>Start Date</th>
                              <th>DTWH</th>
                              <th>Grade</th>
                              <th>Gram</th>
                              <th>Brand</th>
                              <th>EO</th>
                              <th>CO</th>
                              <th>Material</th>
                              <th>Material Description</th>
                              <th>Prod.Qty (Ton)</th>
                              <th>Pallet Size</th>
                              <th>จำนวน PL</th>
                            </tr>
                      </thead>
                          <tbody>
                          <?php if(!empty($next_plan)){
						  foreach($next_plan as $value){?>
                        <tr>
                              <td><?php echo $value['order_no'] ?></td>
                              <td><?php echo $value['start_date'] ?></td>
                              <td><?php echo $value['DTWH'] ?></td>
                              <td><?php if($value['grade']==0){ 
											$Grade = "OSP";
										}elseif($value['Grade']==1){ 
											$Grade = "PPC";
										}elseif($value['Grade']==2){ 
											$Grade = "EPP";
										}elseif($value['Grade']==4){ 
											$Grade = "LPP";
										}
										echo $Grade; ?></td>
                              <td><?php echo $value['bw'] ?></td>
                              <td><?php echo $value['brand'] ?></td>
                              <td><?php echo $value['eo'] ?></td>
                              <td><?php echo $value['co'] ?> </td>
                              <td><?php echo $value['material'] ?></td>
                              <td><?php echo $value['material_desc'] ?></td>
                              <td><?php echo $value['prod_qty_ton'] ?></td>
                              <td><?php echo $value['pallet_size'] ?></td>
                              <td><?php echo $value['pl_qty'] ?></td>
                            </tr>
                        	<?php }}?>
                      </tbody>
                        </table>
                  </div>
                    </div>
              </div><br>
<hr>
              <div class="row">
            <div class="col-xs-12">
                  <div class="table-responsive">
                <label><strong>Order History</strong></label>
                <table id="old-order" class="table table-bordered table-hover table-striped">
                          <thead>
                        <tr>
                              <th>Order No #</th>
                              <th>Start Date</th>
                              <th>DTWH</th>
                              <th>Grade</th>
                              <th>Gram</th>
                              <th>Brand</th>
                              <th>EO</th>
                              <th>CO</th>
                              <th>Material</th>
                              <th>Material Description</th>
                              <th>Prod.Qty (Ton)</th>
                              <th>Pallet Size</th>
                              <th>จำนวน PL</th>
                            </tr>
                      </thead>
                          <tbody>
                          <?php if(!empty($old_plan)){ 
						  foreach($old_plan as $value){?>
                        <tr>
                              <td><?php echo $value['order_no'] ?></td>
                              <td><?php echo $value['start_date'] ?></td>
                              <td><?php echo $value['DTWH'] ?></td>
                              <td><?php if($value['grade']==0){ 
											$Grade = "OSP";
										}elseif($value['Grade']==1){ 
											$Grade = "PPC";
										}elseif($value['Grade']==2){ 
											$Grade = "EPP";
										}elseif($value['Grade']==4){ 
											$Grade = "LPP";
										}
										echo $Grade; ?></td>
                              <td><?php echo $value['bw'] ?></td>
                              <td><?php echo $value['brand'] ?></td>
                              <td><?php echo $value['eo'] ?></td>
                              <td><?php echo $value['co'] ?> </td>
                              <td><?php echo $value['material'] ?></td>
                              <td><?php echo $value['material_desc'] ?></td>
                              <td><?php echo $value['prod_qty_ton'] ?></td>
                              <td><?php echo $value['pallet_size'] ?></td>
                              <td><?php echo $value['pl_qty'] ?></td>
                            </tr>
                        	<?php }}?>
                      </tbody>
                        </table>
              </div>
                </div>
                </div>
                <hr>
              <div class="row">
            <div class="col-xs-6">
                  <div class="table-responsive">
                <label><strong>Pallet</strong></label>
                <table id="product" class="table table-bordered table-hover table-striped">
                      <thead>
                    <tr>
                          <th>PalletID #</th>
                          <th>Finish time</th>
                          <th>Customer Order</th>
                          <th>Grade</th>
                          <th>Gram</th>
                          <th>saleType</th>
                          <th>Brand</th>
                        </tr>
                  </thead>
                      <tbody>
                      <?php foreach($pallet_done as $value){?>
                    <tr>
                          <td><?php echo anchor('home/search_all/1/'.$value['PalletID'],$value['PalletID']) ?></td>
                          <td><?php echo $value['FinishTime'] ?></td>
                          <td><?php echo $value['CustomerOrder'] ?> </td>
                          <td><?php if($value['Grade']==0){ 
											$Grade = "OSP";
										}elseif($value['Grade']==1){ 
											$Grade = "PPC";
										}elseif($value['Grade']==2){ 
											$Grade = "EPP";
										}elseif($value['Grade']==4){ 
											$Grade = "LPP";
										}
										echo $Grade; ?></td>
                          <td><?php echo $value['Basisweight'] ?></td>
                          <td><?php echo $value['saleType'] ?></td>
                          <td><?php echo $value['Brand'] ?> </td>
                        </tr>
                        <?php } ?>
                    
                  </tbody>
                    </table>
              </div>
                </div>

            <div class="col-xs-6">
                  <form role="form">
                <div class="form-group">
                      <label>*** Remark </label>
                      <textarea class="form-control" rows="8"></textarea>
                    </div>
              </form>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
      <!-- /.row --> 
    </div>
<!-- Morris Charts JavaScript --> 
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
$(document).ready(function() {
    $('#next-order').dataTable( {
        "order": [[ 2, "asc" ]]
    } );
} );
$(document).ready(function() {
    $('#old-order').dataTable( {
        "order": [[ 2, "desc" ]]
    } );
} );
$(document).ready(function() {
    $('#product').dataTable( {
        "order": [[ 1, "desc" ]]
    } );
} );
</script>
<script src="<?php echo base_url()?>assets/js/plugins/morris/raphael.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/plugins/morris/morris.min.js"></script> 
<script src="<?php echo base_url()?>assets/js/plugins/morris/morris-data.js"></script> 
<script src="<?php echo base_url()?>assets/js/reload-timer.js" type="text/javascript"></script>
    <script>
	    // Donut Chart
		Morris.Donut({
			element: 'morris-donut-chart',
			data: [{
				label: "Progress",
				value:  <?php 
							if($process<0){
								echo "0";
							}else{
								echo $process ;
							}
						?>,
				color : "#CC0000",
			}, {
				label: "Complete",
				value: <?php echo $sum_Weight_done/1000;?>,
				color : "#339900",
			}],
			resize: true
		}).select(1);
		
	</script>
</body>
</html>
