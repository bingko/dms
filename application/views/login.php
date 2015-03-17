<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Product DMS | PHOENIX PULP AND PAPER PUBLIC COMPANY LIMITED </title>

<link href="<?php echo base_url();?>assets/css/login-box.css" rel="stylesheet" type="text/css" />
</head>


<body>
  <div style="position:absolute;left:50px">
  <img src="<?php echo base_url();?>assets/images/logo100year.png">
  </div>
  
  <div style="padding: 100px 0 0 150px;">

<?php echo form_open('login/login_check')?> 
<div id="login-box">

<H2 align="center"><span style="color:#F00">SCG</span> DMS </H2><br>

<div align="center"><span style="color:#FFF; font-size:18px;">LOGIN</span></div>
<div id="login-box-name" style="margin-top:20px;">Email:</div><div id="login-box-field" style="margin-top:20px;"><input name="username" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Password:</div><div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<p><br />
  <span class="login-box-options">
    <input type="checkbox" name="1" value="1"> 
    Remember Me </span>
  <br />
  <?php if($this->uri->segment(3)=="fail"){?>
  <div align="center" style="color:#F00">E-mail หรือ รหัสผ่านไม่ถูกต้อง</div><br>
  <?php }?>
  <div style="position:relative; margin-left:80px">
  <button type="submit" style=" background:none; border:none; width:110px; height:42px;"><img src="<?php echo base_url();?>assets/images/login-btn.png"></button>
  </div>
  
</p>

</div>
<?php echo form_close()?>
</div>

</body>
</html>
