<div class="row">
  <div class="col-lg-12">
    <div style="float:left">
      <h2>Detail - Sheet Product</h2>
      <h4>ผลการค้นหา จำนวน <strong style="color:#C30"><?php echo number_format(count($DataSet));?></strong> รายการ</h4>
    </div>
  </div>
</div>
<hr />
<div class="row">
  <div class="col-lg-12">
    <div class="table-responsive">
      <table id="data-table" class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
          	<th>#</th>
            <th>PalletID</th>
            <th>Sheeter</th>
            <th>Finish</th>
            <th>FinishTime</th>
            <th>Shift_q</th>
            <th>Date_q</th>
            <th>Date_p</th>
            <th>WLBM</th>
            <th>CustomerOrder</th>
            <th>Grade</th>
            <th>Basisweight</th>
            <th>Width</th>
            <th>Length</th>
            <th>Sheet</th>
            <th>Ream</th>
            <th>Calc_W</th>
            <th>Calc_W2</th>
            <th>Rollid1</th>
            <th>Rollid2</th>
            <th>Rollid3</th>
            <th>Rollid4</th>
            <th>Rollid5</th>
            <th>W1</th>
            <th>W2</th>
            <th>W3</th>
            <th>W4</th>
            <th>W5</th>
            <th>SubType</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		if(!empty($DataSet)){
		$i = 1;
		foreach($DataSet as $value){?>
          <tr>
          	<td><?php echo $i ?></td>
            <td><?php echo anchor('home/search_all/1/'.$value['PalletID'],$value['PalletID']) ?></td>
            <td><?php echo $value['Sheeter'] ?></td>
            <td><?php echo $value['Finish'] ?></td>
            <td><?php echo $value['FinishTime'] ?></td>
            <td><?php echo $value['Shift_q'] ?></td>
            <td><?php echo $value['Date_q'] ?></td>
            <td><?php echo $value['Date_p'] ?></td>
            <td><?php echo $value['WLBM'] ?></td>
            <td><?php echo $value['CustomerOrder'] ?></td>
            <td><?php echo $value['Grade'] ?></td>
            <td><?php echo $value['Basisweight'] ?></td>
            <td><?php echo $value['Width'] ?></td>
            <td><?php echo $value['Length'] ?></td>
            <td><?php echo $value['Sheet'] ?></td>
            <td><?php echo $value['Ream'] ?></td>
            <td><?php echo $value['Calc_W'] ?></td>
            <td><?php echo $value['Calc_W2'] ?></td>
            <td><?php echo anchor('home/search_all/2/'.$value['Rollid2'],$value['Rollid1']) ?></td>
            <td><?php echo anchor('home/search_all/2/'.$value['Rollid2'],$value['Rollid2']) ?></td>
            <td><?php echo anchor('home/search_all/2/'.$value['Rollid2'],$value['Rollid3']) ?></td>
            <td><?php echo anchor('home/search_all/2/'.$value['Rollid2'],$value['Rollid4']) ?></td>
            <td><?php echo anchor('home/search_all/2/'.$value['Rollid2'],$value['Rollid5']) ?></td>
            <td><?php echo $value['W1'] ?></td>
            <td><?php echo $value['W2'] ?></td>
            <td><?php echo $value['W3'] ?></td>
            <td><?php echo $value['W4'] ?></td>
            <td><?php echo $value['W5'] ?></td>
            <td><?php echo $value['SubType'] ?></td>
          </tr>
          <?php $i++;} } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<hr />


<hr />

<!-- /.row -->
</div>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
$(document).ready(function() {
    $('#data-table').dataTable();
} );
</script>
<style>
.red_text{ color:#F00 }
.blue_text{ color:#00C }
</style>
