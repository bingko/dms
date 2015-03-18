<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>SCG DMS - Admin</title>
<!-- Custom CSS -->
<link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">
<!-- Bootstrap Core CSS -->
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- jQuery -->
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="margin:0px;padding:0px;overflow:hidden">
<div id="page-wrapper">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <strong>เสร็จแล้ว</strong></h3>
          <div class="panel-title" style="float:right; position:relative;top:-20px;"> <a href="#"><i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
        <div class="panel-body">
          <div class="col-xs-12">
            <div class="table-responsive"  style="margin:0px;padding:0px;overflow:hidden">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Order #</th>
                    <th>วันที่เสร็จ</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($all_plan_done as $value){?>
                  <tr>
                    <td><?php echo $value['order_no']?></td>
                    <td><?php echo $value['finish_date']?></td>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-red">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> <strong>งานค้าง</strong></h3>
          <div class="panel-title" style="float:right; position:relative;top:-20px;"> <a href="#"><i class="fa fa-arrow-circle-right"></i></a> </div>
        </div>
        <div class="panel-body">
          <div class="col-xs-12">
            <div class="table-responsive"  style="margin:0px;padding:0px;overflow:hidden">
              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>Order #</th>
                    <th>กำหนดเสร็จ</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($all_plan_stale as $value){?>
                  <tr>
                    <td><?php echo $value['order_no']?></td>
                    <td><?php echo $value['finish_date']?></td>
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
</div>
  <!-- Morris Charts JavaScript --> 
  <script src="<?php echo base_url()?>assets/js/plugins/morris/raphael.min.js"></script> 
  <script src="<?php echo base_url()?>assets/js/plugins/morris/morris.min.js"></script> 
  <script src="<?php echo base_url()?>assets/js/plugins/morris/morris-data.js"></script> 
  <script>
	    // Donut Chart
		Morris.Donut({
			element: 'morris-donut-chart',
			data: [{
				label: "In-Order",
				value: 65,
				color : "#CC0000",
			}, {
				label: "In-Store",
				value: 35,
				color : "#339900",
			}],
			resize: true
		});
	</script> <!-- Bootstrap Core JavaScript --> 
<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</body>
<style>
.body {
    -moz-transform: scale(0.9, 0.9); /* Moz-browsers */
    zoom: 0.9; /* Other non-webkit browsers */
    zoom: 90%; /* Webkit browsers */
}
.badge {
	padding: 3px 12px 4px;
	font-size: 1em;
	font-weight: bold;
	white-space: nowrap;
	color: #ffffff;
	background-color: #999999;
	-webkit-border-radius: 9px;
	-moz-border-radius: 9px;
	border-radius: 8px;
}
.badge:hover {
	color: #ffffff;
	text-decoration: none;
	cursor: pointer;
}
.badge-error {
	background-color: #b94a48;
}
.badge-error:hover {
	background-color: #953b39;
}
.badge-warning {
	background-color: #f89406;
}
.badge-warning:hover {
	background-color: #c67605;
}
.badge-success {
	background-color: #468847;
}
.badge-success:hover {
	background-color: #356635;
}
.badge-info {
	background-color: #3a87ad;
}
.badge-info:hover {
	background-color: #2d6987;
}
.badge-inverse {
	background-color: #333333;
}
.badge-inverse:hover {
	background-color: #1a1a1a;
}
</style>
</html>
