<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<link href="<?php echo base_url()?>assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>assets/js/fileinput.js" type="text/javascript"></script>
<div style="height:570px;">
<h2 style="color:#060">Upload Excel</h2>
<hr />
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-upload fa-x2"></i> Cut Size 1</h3>
      </div>
      <?php echo form_open_multipart('csv/importcsv_cutsize1') ?>
      <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_cutsize1" id="file-1" type="file" >
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close()?> </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-upload fa-x2"></i>  Cut Size 2</h3>
      </div>
      <?php echo form_open_multipart('csv/importcsv_cutsize4') ?>
      <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_cutsize4" id="file-2" type="file" >
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close()?> </div>
  </div>
  <!-- /.col-sm-12 --> 
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-upload fa-x2"></i>  Folio 1</h3>
      </div>
      <?php echo form_open_multipart('csv/importcsv') ?>
      <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_folio1" id="file-3" type="file" >
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close()?> </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"> <i class="fa fa-upload fa-x2"></i>  Folio 2</h3>
      </div>
      <?php echo form_open_multipart('csv/importcsv') ?>
      <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_folio2" id="file-4" type="file" >
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close()?> </div>
  </div>
  <!-- /.col-sm-12 --> 
</div>
</div>
<script>
    $("#file-1").fileinput({
        overwriteInitial: false,
        maxFileSize: 300000,
        maxFileCount: 1,
        allowedFileTypes: ['other']
	});
	$("#file-2").fileinput({
        overwriteInitial: false,
        maxFileSize: 300000,
        maxFileCount: 1,
        allowedFileTypes: ['other']
	});
	$("#file-3").fileinput({
        overwriteInitial: false,
        maxFileSize: 300000,
        maxFileCount: 1,
        allowedFileTypes: ['other']
	});
	$("#file-4").fileinput({
        overwriteInitial: false,
        maxFileSize: 300000,
        maxFileCount: 1,
        allowedFileTypes: ['other']
	});
</script>