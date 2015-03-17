<div id="page">
  <div class="row">
    <div class="col-lg-12">
      <div style="float:left">
        <h2> Roll in intermediate WH </h2>
        <h4>Datetime :
          <?php
	  $headerTime = new DateTime($setDate['end_date']); 
	  echo $headerTime->format('d/m/Y H:i:s');?>
        </h4>
      </div>
      <div style="float:right"> <br />
        <?php echo "<a href='".site_url('home/result_detail/&nbsp;/'.$setDate['start_date'].'/'.$setDate['end_date'].'/intermediate/2')."' target='_blank'>"; ?>
        <button type="button" class="btn btn-info" style="width:160px;"><i class="fa fa-download fa-x2"></i>&nbsp; View All RollID </button>
        <?php echo "</a>";?><br />
        <br />
        <?php echo form_open('home/excel');?>
        <input type="hidden" name="type" value="intermediate" />
        <input type="hidden" name="start_date" value="<?php echo $setDate['start_date'];?>" />
        <input type="hidden" name="end_date" value="<?php echo $setDate['end_date'];?>" />
        <button type="submit" class="btn btn-primary" style="width:160px;"><i class="fa fa-download fa-x2"></i>&nbsp; Export To Excel </button>
        <?php echo form_close();?></div>
    </div>
  </div>
  <hr />
   <?php $this->load->view('datatable_conv-inter')?>