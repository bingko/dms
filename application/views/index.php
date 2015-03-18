<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCG - DMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url()?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SCG Product Monitor</a>
            </div>
            <!-- Top Menu Items -->
            <script language="javascript">
				function fncSubmit()
					{
						document.form_search.submit();
					}
					
			</script>
            <script type="text/javascript"> 
				function stopRKey(evt) { 
				  var evt = (evt) ? evt : ((event) ? event : null); 
				  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
				  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
				} 
				
				document.onkeypress = stopRKey; 
			</script>
            <?php 
				$attributes = array('name'=> 'form_search','id' => 'search','onkeypress' => 'stopRKey');
				echo form_open('home/search_all',$attributes)
			?>
            <ul class="nav navbar-right top-nav">
			
            <li class="dropdown">
            <div style="position:relative; top:10px;">
                   <input type="text" name="search" class="form-control" style="height:30px;" placeholder="search..." required>
                   </div>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                        <a href="#">
                            <input type="radio" name="type_search" value="1" onClick="JavaScript:fncSubmit();" class="menu_search1">
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-search"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>search by Pallet ID</strong>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#" onClick="JavaScript:fncSubmit();">
                            <input type="radio" name="type_search" value="2" onClick="JavaScript:fncSubmit();" class="menu_search2">
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-search"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>search by Roll ID</strong>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#" onClick="JavaScript:fncSubmit();">
                            <input type="radio" name="type_search" value="3" onClick="JavaScript:fncSubmit();" class="menu_search3">
                                <div class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-search"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>search by Order No.</strong>
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">

                        </li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp; Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <?php echo form_close(); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php $this->load->view('menu')?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
				<?php $this->load->view($page)?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>
