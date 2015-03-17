       <?php 
            $session = $this->session->userdata('user_data');
        ?>
           <?php $uri = $this->uri->segment(2); ?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php 
                    if($session['user_level']==1){?>
                    <li <?php if($uri=="dashboard"){echo 'class="active"'; } ?> >
                        <a href="<?php echo site_url('home/dashboard')?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                <?php 
                    }
                    if($session['user_level']==1||$session['user_level']==2){
                ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-desktop"></i> Production Plan Monitoring <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="<?php echo site_url('dashboard/import_done_ct1')?>">Import Cut Size 1</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('dashboard/import_done_ct4')?>">Import Cut Size 4</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('dashboard/import_done_folio1')?>">Import Folio</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('dashboard/monitor')?>">Monitor</a>
                            </li>
                        </ul>
                    </li>
                <?php 
                    }
                    if($session['user_level']==1||$session['user_level']==3){
                ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-desktop"></i> Converting Report  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li <?php if($uri=="search_Converting"){echo 'class="active"'; } ?> >
                                <a href="<?php echo site_url('home/search_Converting')?>"><i class="fa fa-fw fa-download"></i> Converting Area </a>
                            </li>
                            <li <?php if($uri=="search_Intermediate"){echo 'class="active"'; } ?> >
                                <a href="<?php echo site_url('home/search_Intermediate')?>"><i class="fa fa-fw fa-external-link-square"></i> Intermediate WH </a>
                            </li>
                        </ul>
                    </li>
                <?php 
                    }
                    if($session['user_level']==1||$session['user_level']==4){
                ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-desktop"></i> สรุปผลตัด  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
                                <a href="<?php echo site_url('home/search_cutsize/1')?>"> Cut Size 1</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('home/search_cutsize/4')?>"> Cut Size 4</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('home/search_cutsize/2')?>"> Folio 1</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('home/search_cutsize/3')?>"> Folio 2</a>
                            </li>   

                        </ul>
                    </li>
                <?php 
                    }
                    if($session['user_level']==1||$session['user_level']==4){
                ?>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-desktop"></i> Log Sheet  <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="<?php echo site_url('logSheet/searchLog/1').'/'.date('Y-m')?>"> Cut Size 1</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('logSheet/searchLog/4').'/'.date('Y-m')?>"> Cut Size 4</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('logSheet/searchLog/2').'/'.date('Y-m')?>"> Folio 1</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('logSheet/searchLog/3').'/'.date('Y-m')?>"> Folio 2</a>
                            </li>   
                            <li>
                                <a href="<?php echo site_url('logSheet/searchLog/5').'/'.date('Y-m')?>"> Ream </a>
                            </li>  

                        </ul>
                    </li>
                <?php 
                    }
                    if($session['user_level']==1){
                ?>
                    <li>
                        <a href="<?php echo site_url('home/user')?>"><i class="fa fa-fw fa-sign-out"></i> User</a>
                    </li>
                <?php 
                    }
                ?>
                    <li>
                        <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>