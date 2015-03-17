<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>SCG DMS - Admin</title>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
body {
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	resize: both;
}
.frame1 {
	overflow: hidden;
	overflow-x: hidden;
	overflow-y: hidden;
	height: 50%;
	width: 40%;
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	bottom: 0px
}
.frame2 {
	overflow: hidden;
	overflow-x: hidden;
	overflow-y: hidden;
	height: 50%;
	width: 40%;
	position: absolute;
	top: 0px;
	left: 40%;
	right: 0px;
	bottom: 0px
}
.frame3 {
	overflow: hidden;
	overflow-x: hidden;
	overflow-y: hidden;
	height: 50%;
	width: 40%;
	position: absolute;
	top: 50%;
	left: 0px;
	right: 0px;
	bottom: 0px
}
.frame4 {
	overflow: hidden;
	overflow-x: hidden;
	overflow-y: hidden;
	height: 50%;
	width: 40%;
	position: absolute;
	top: 50%;
	left: 40%;
	right: 0px;
	bottom: 0px
}
.frame5 {
	overflow: hidden;
	overflow-x: hidden;
	overflow-y: hidden;
	height: 100%;
	width: 20%;
	position: absolute;
	top: 0px;
	left: 80%;
	right: 0px;
	bottom: 0px
}
</style>
</head>
<body style="">
<iframe src="<?php echo site_url('dashboard/cut_size/1')?>" class="frame1" seamless frameborder="0" height="100%" width="100%"></iframe>
<iframe src="<?php echo site_url('dashboard/cut_size/4')?>" class="frame2" seamless frameborder="0" height="100%" width="100%"></iframe>
<iframe src="<?php echo site_url('dashboard/folio/2')?>" class="frame3" seamless frameborder="0" height="100%" width="100%"></iframe>
<iframe src="<?php echo site_url('dashboard/folio/3')?>" class="frame4" seamless frameborder="0" height="100%" width="100%"></iframe>
<iframe src="<?php echo site_url('dashboard/queue')?>"  class="frame5" seamless frameborder="0" height="100%" width="100%"></iframe>
</body>
</html>
<script src="<?php echo base_url()?>assets/js/reload-timer.js" type="text/javascript"></script>