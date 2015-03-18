<link href="<?php echo base_url()?>assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>assets/js/fileinput.js" type="text/javascript"></script>
<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>  Import CSV</h3>
                            </div>
                            <?php echo form_open_multipart('csv/importcsv_folio1') ?>
                            <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select New File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_folio" id="file-1" type="file" >
            </div>
          </div>
        </div>
                            </div>
                            <?php echo form_close()?>
                        </div>
                    </div>
                    <!-- /.col-sm-12 -->
                </div>
                <div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table id="data-table" class="table table-bordered table-hover table-striped">
        <thead>
           <tr>
              <th>Order No.</th>
              <th>Grade</th>
              <th>Gram</th>
              <th>Size</th>
              <th>Ream</th>
              <th>Pallet Size</th>
              <th>Ream/Pallet</th>
              <th>จำนวน</th>
              <th>ส่งแล้ว</th>
              <th>ค้างส่ง</th>
              <th>กำหนดเข้าคลัง</th>
              <th>Material</th>
              <th>EO/CO</th>
              <th>Remark</th>
        	</tr>
        </thead>
        <tbody>
        <?php 
			if(!empty($nplan)){
				foreach($nplan  as $value){?>
          <tr>
              <td><?php echo $value['order_id']?></td>
              <td><?php echo $value['Grade']?></td>
              <td><?php echo $value['Basisweight']?></td>
              <td><?php echo $value['size']?></td>
              <td><?php echo $value['Ream']?></td>
              <td><?php echo $value['pallet_size']?></td>
              <td><?php echo $value['rm_per_pallet']?></td>
              <td><?php echo $value['pl_require_qty']?></td>
              <td><?php echo $value['sent']?></td>
              <td><?php echo $value['stale']?></td>
              <td><?php if($value['date_store']!="0000-00-00"){echo $value['date_store'];}?></td>
              <td><?php echo $value['material']?></td>
              <td><?php echo $value['co_eo']?></td>
              <td><?php echo $value['remark']?></td>
        	</tr>
            <?php }}?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script>
    $("#file-1").fileinput({
        overwriteInitial: false,
        maxFileSize: 300000,
        maxFileCount: 1,
        allowedFileTypes: ['other']
	});
	
</script>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
$(document).ready(function() {
    $('#data-table').dataTable();
} );
</script>