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

	<body style="margin:0px;padding:0px;overflow:hidden; height:800px;">
    <div id="page-wrapper">
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-primary">
            <div style=" position:absolute; right:10%; top:8px;float:right;">
            <?php $process = $nplan[0]['prod_qty_ton']-($sum_Weight_done/1000);
					if($nplan[0]['prod_qty_ton']=='n/a'){
						echo '<span class="badge badge-red blink_me">Order Status : No Order data! </span>';
					}elseif($process<0){
						echo '<span class="badge badge-red blink_me">Order Status : Over '.abs($process).' Ton </span>';
					}else{
						echo '<span class="badge badge-success">Order Status : Running </span>' ;
					}
			?>
              
             </div>
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <strong><?php echo $header ?></strong> </h3>
              <div class="panel-title" style="float:right; position:relative;top:-20px;"> <a href="<?php echo site_url()?>/dashboard/detail_cut_size/<?php echo $cut_size?>" target="_blank"><i class="fa fa-arrow-circle-right"></i></a> </div>
            </div>
            <div class="panel-body">
              <div class="col-xs-6" align="center">
                <div id="morris-donut-chart" style="position:relative;top:-65px;"></div>
                <div   style="position:relative;top:-125px;">
                  <hr>
                  <a href="#"><span class="badge badge-green"  data-toggle="tooltip" data-placement="top" title="Total Weight Net" style="font-size:1.5em;"> Total Qty. : <?php echo $nplan[0]['prod_qty_ton'];?> Ton</span></a><br><br>

                  <strong>Material Desciption</strong><br>
                  <span class="badge badge-info"><?php echo $nplan[0]['material_desc']?></span> </div>
              </div>
              <div class="col-xs-6">
                <div class="list-group"> 
                <a href="#" class="list-group-item"> <span class="badge badge-primary"><?php echo $nplan[0]['order_no']?></span> <span class="glyphicon glyphicon-import" aria-hidden="true"></span> Order No. : </a> 
                <a href="#" class="list-group-item"> <span class="badge badge-success"><?php echo $nplan[0]['start_date']?></span> <span class="" aria-hidden="true"></span>Plan Time: </a> 
                <a href="#" class="list-group-item"> <span class="badge badge-error"><?php echo $real_time?></span> <span class="" aria-hidden="true"></span>Real Time: </a> 
                <a href="#" class="list-group-item"> <span class="badge badge-inverse"><?php echo count($roll_doing).' / '.$nplan[0]['pl_qty']?></span> <span class="glyphicon glyphicon-th" aria-hidden="true"></span> Pallet Qty.: </a></div>
                
                <div class="table-responsive overflow-tb">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Pallet ID #</th>
                        <th>CO/EO</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($roll_doing as $value){?>
                      <tr>
                        <td><?php echo $value['PalletID']; ?></td>
                        <td><?php echo $value['CustomerOrder']; ?></td>
                        <td bgcolor="#FF0000" style="color:#FFF">DONE</td>
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
      
      <!-- /.row --> 
      <!-- Morris Charts JavaScript --> 
      <script src="<?php echo base_url()?>assets/js/plugins/morris/raphael.min.js"></script> 
      <script src="<?php echo base_url()?>assets/js/plugins/morris/morris.min.js"></script> 
      <script src="<?php echo base_url()?>assets/js/plugins/morris/morris-data.js"></script> 
      <script>
	    // Donut Chart
		Morris.Donut({
			element: 'morris-donut-chart',
			data: [{
				label: "Progress",
				value: <?php 
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
    </div>
</body>
</html>
