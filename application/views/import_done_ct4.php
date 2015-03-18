<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<link href="<?php echo base_url()?>assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="<?php echo base_url()?>assets/js/fileinput.js" type="text/javascript"></script>
<div class="row">
                    <div class="col-sm-12">
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>  Import CSV</h3>
                            </div>
                            <?php echo form_open_multipart('csv/importcsv_cutsize4') ?>
                            <div class="panel-body">
        <div class="row"><br />
          <div align="right" class="col-xs-3">Select New File</div>
          <div class="col-xs-9">
            <div class="form-group">
              <input name="csv_cutsize4" id="file-1" type="file" >
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
              <th>วันที่เริ่มตัด</th>
              <th>วันที่ตัดเสร็จ</th>
              <th>DTWH</th>
              <th>Load Date</th>
              <th>Order no.</th>
              <th>Grade</th>
              <th>Cutter</th>
              <th>BW</th>
              <th>Size</th>
              <th>Cap. (T/day)</th>
              <th>Brand</th>
              <th>EO</th>
              <th>CO</th>
              <th>Material</th>
              <th>Material Description</th>
              <th>Prod.Qty (Ton)</th>
              <th>Prod.Qty (Class)</th>
              <th>RM/Pallet</th>
              <th>Wrapper (m)</th>
              <th>Box+Lid</th>
              <th>Pallet Size</th>
              <th>MDF Size</th>
              <th>จำนวน PL</th>
              <th>จำนวน MDF</th>
              <th>Material Note</th>
              <th>DOM/EXP</th>
              <th>Country</th>
              <th>Sale Rep. Remark</th>
        	</tr>
        </thead>
        <tbody>
        <?php if(!empty($nplan)){
				foreach($nplan  as $value){?>
          <tr>
              <td><?php echo $value['start_date']?></td>
              <td><?php echo $value['finish_date']?></td>
              <td><?php echo $value['DTWH']?></td>
              <td><?php if($value['load_date']!="0000-00-00"){echo $value['load_date'];}?></td>
              <td><?php echo $value['order_no']?></td>
              <td><?php echo $value['grade']?></td>
              <td><?php echo $value['cutter']?></td>
              <td><?php echo $value['bw']?></td>
              <td><?php echo $value['size']?></td>
              <td><?php echo $value['cap']?></td>
              <td><?php echo $value['brand']?></td>
              <td><?php echo $value['eo']?></td>
              <td><?php echo $value['co']?></td>
              <td><?php echo $value['material']?></td>
              <td><?php echo $value['material_desc']?></td>
              <td><?php echo $value['prod_qty_ton']?></td>
              <td><?php echo $value['prod_qty_class']?></td>
              <td><?php echo $value['rm_per_pallet']?></td>
              <td><?php echo $value['wrapper']?></td>
              <td><?php echo $value['box_lid']?></td>
              <td><?php echo $value['pallet_size']?></td>
              <td><?php echo $value['mdf_size']?></td>
              <td><?php echo $value['pl_qty']?></td>
              <td><?php echo $value['mdf_qty']?></td>
              <td><?php echo $value['material_note']?></td>
              <td><?php echo $value['dom_per_exp']?></td>
              <td><?php echo $value['country']?></td>
              <td><?php echo $value['sale_rep_remark']?></td>
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