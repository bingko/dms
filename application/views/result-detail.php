<div class="row">
  <div class="col-lg-12">
    <div style="float:left">
      <h2>Detail - <?php echo $title;?></h2>
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
            <th>ID</th>
            <th>Rollid</th>
            <th>Rollid2</th>
            <th>Machineid</th>
            <th>Winderid</th>
            <th>ReelNo</th>
            <th>Date_s</th>
            <th>Shift_s</th>
            <th>Date_f</th>
            <th>Shift_f</th>
            <th>FinishTime</th>
            <th>WLBM</th>
            <th>Type</th>
            <th>Grade</th>
            <th>Basisweight</th>
            <th>CustomerOrder</th>
            <th>OrderNo</th>
            <th>Width</th>
            <th>Length</th>
            <th>Diameter</th>
            <th>Calc_W</th>
            <th>Weight</th>
            <th>Weight_Net</th>
            <th>Core</th>
            <th>Splice</th>
            <th>Property</th>
            <th>PLC Dest</th>
            <th>New Dest</th>
            <th>Destination</th>
            <th>Remark</th>
            <th>itemNo</th>
            <th>saleType</th>
            <th>Brand</th>
            <th>PrintNetWeight</th>
          </tr>
        </thead>
        <tbody>
        <?php 
		$i = 1;
		$total_WLBMWeight = 0;
		foreach($rollDetailSet as $value){?>
          <tr>
          	<td><?php echo $i ?></td>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['Rollid'] ?></td>
            <td><?php echo $value['Rollid2'] ?></td>
            <td><?php echo $value['Machineid'] ?></td>
            <td><?php echo $value['Winderid'] ?></td>
            <td><?php echo $value['ReelNo'] ?></td>
            <td><?php echo $value['Date_s'] ?></td>
            <td><?php echo $value['Shift_s'] ?></td>
            <td><?php echo $value['Date_f'] ?></td>
            <td><?php echo $value['Shift_f'] ?></td>
            <td><?php echo $value['FinishTime'] ?></td>
            <td><?php echo $value['WLBM'] ?></td>
            <td><?php echo $value['Type'] ?></td>
            <td><?php echo $value['Grade'] ?></td>
            <td><?php echo $value['Basisweight'] ?></td>
            <td><?php echo $value['CustomerOrder'] ?></td>
            <td><?php echo $value['OrderNo'] ?></td>
            <td><?php echo $value['Width'] ?></td>
            <td><?php echo $value['Length'] ?></td>
            <td><?php echo $value['Diameter'] ?></td>
            <td><?php echo $value['Calc_W'] ?></td>
            <td><?php echo $value['Weight'] ?></td>
            <td><?php echo $value['Weight_Net'] ?></td>
            <td><?php echo $value['Core'] ?></td>
            <td><?php echo $value['Splice'] ?></td>
            <td><?php echo $value['Property'] ?></td>
            <td><?php echo $value['PLC_Dest'] ?></td>
            <td><?php echo $value['New_Dest'] ?></td>
            <td><?php echo $value['Destination'] ?></td>
            <td><?php echo $value['Remark'] ?></td>
            <td><?php echo $value['itemNo'] ?></td>
            <td><?php echo $value['saleType'] ?></td>
            <td><?php echo $value['Brand'] ?></td>
            <td><?php echo $value['PrintNetWeight'] ?></td>
          </tr>
          <?php 
		  		if($value['Grade']==0){ 
					$Grade = "OSP";
				}elseif($value['Grade']==1){ 
					$Grade = "PPC";
				}elseif($value['Grade']==2){ 
					$Grade = "EPP";
				}elseif($value['Grade']==4){ 
					$Grade = "LPP";
				}
				if($value['Brand']!="0"){$band_name = $value['Brand'];}
				$name_Roll = $Grade.' '.$value['Basisweight'].' '.$value['saleType'].' '.$band_name;
		  		$total_WLBMroll = count($rollDetailSet);
		  		$total_WLBMWeight += $value['Weight_Net'];
		  		$i++; 
			}
			?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<hr />


<hr />
<div class="row">
  <div class="col-lg-8">
    <div class="table-responsive">
      <table class="table table-bordered table-hover table-striped">
        <thead>
          <tr>
            <th align="center"> Grade Group </th>
            <th align="center"> Total Roll </th>
            <th align="center"> Total Weight Net </th>
          </tr>
        </thead>
        <tbody>
        <?php $subtype = $this->uri->segment(7);?>
			<tr>
            <td><div class="red_text"><strong><?php if($subtype==2){echo "-";}else{echo $name_Roll;} ?></strong></div></td>
            <td><div class="red_text"><strong><?php echo $total_WLBMroll ?></strong></div></td>
            <td><div class="red_text"><strong><?php echo number_format($total_WLBMWeight) ?></strong></div></td>
            <tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.row -->
</div>
<script src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script> 
<script src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script> 
<script>
$(document).ready(function() {
    //$('#data-table').dataTable();
} );
</script>
<style>
.red_text{ color:#F00 }
.blue_text{ color:#00C }
</style>
