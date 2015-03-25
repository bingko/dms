<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<div class="row">
 <div class="col-lg-12">
	    <div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
			<h3><strong>PHOENIX PULP & PAPER PCL. PM1 CONVERTING SECTION</strong></h3>
            <h4>REAM WRAPPER SHIFT REPORT</h4>
        </div>
  </div>
	 </div>
	 	<?php echo form_open('logSheet/searchReamLog');?>
					<div id="date">
						<div class="row">
							<div class="col-sm-12"  align="right"> 
								<input type="date" id="monthpicker" value="<?php echo $this->uri->segment(4);?>" class="form-control end" name="end_date" onchange="this.form.submit()"/>
							</div>
						</div><br />
					</div>
	<?php echo form_close()?>
	<div class="row"  style="">
	<div class="table-responsive" >
				<table id="data-table" class="table table-bordered table-hover table-striped">
			  <thead>
				<tr>
					<td rowspan="2">Date</td>
					<td>Target</td>
					<td>Actual</td>
					<td>Acc. Target</td>
					<td>Acc. Actual</td>
					<td>Actaul</td>
					<td>Input</td>
					<td>(%)REJECT/Day</td>
					<td rowspan="2">%Reject</td>
					<td>Downtime</td>
					<td rowspan="2">Target</td>
					<td>M/C Runing</td>
					<td rowspan="2">Target</td>
					<td>Input</td>
				</tr>				<tr>
					<td>Pack/Day</td>
					<td>Pack/Day</td>
					<td>Pack/Month</td>
					<td>Pack/Month</td>
					<td>Tons/Day</td>
					<td>Ream</td>
					<td>Ream</td>
					<td>%</td>
					<td>%</td>
					<td>Tons/Day</td>
				</tr>
				</thead>
				<tbody>
					<?php
					$sumpack_m=0;
					foreach ($report as $key => $value) {
						$sumpack_m+=$value['input'];
					?>
					<tr>
						<td><?php echo $value['day']?></td>
						<td>12000</td>
						<td><?php echo $value['input']?></td>
						<td><?php echo 12000*($key+1)?></td>
						<td><?php echo $sumpack_m?></td>
						<td><?php echo $value['day']?></td>
						<td><?php $value['ream']?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php $value['day']?></td>
					</tr>
					<?php }
					?>
					<tr>
						<td colspan="2">Total</td>
						<td><?php echo $sumpack_m?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>	
				<tfoot>	
				
				</tfoot>			
		</table>
	<div class="row">
		<div class="col-lg-12">
			<h3>Target</h3>
			<hr/>
			<div id="report"></div>
		</div>
	</div>
		<div class="row">
			<div class="col-lg-12">
			<h3>Downtime</h3>
			<hr/>
			<div class="col-lg-2">
		<table id="data-table" class="table table-bordered table-hover table-striped" style="max-width:200px">
			  <thead>
				<tr>
					<td>DownTime Reason</td>
					<td>Total</td>
				</tr>
				</thead>
				<tbody>
					<?php foreach($downtime as $i=>$value){?>
						<tr>
							<td><?php echo $value['problem_name'];?></td>
							<td><?php echo $value['total_minutes'];?></td>
						</tr>
					<?php }?>
				</tbody>			
		</table>
	</div>
	<div class="col-lg-8">
		<div id="downtime"></div>
	</div>
	</div>
	</div>
	</div>
	</div>
            <script>
			$(document).ready(function(){
			var value=<?php echo $this->logsheet_cutsize_report->get_cutsize_log_chart()?>;
			var total_donwtime = <?php echo $downtimechart?>;
			var report = <?php echo json_encode($report)?>;
			var serie = function(){
				var a=[];
				for(var i=0;i< value.length;i++){
					a.push(parseInt(value[i].summary));
				}
				return a;
				
			}
			var serie = function(){
				var a=[];
				for(var i=0;i< value.length;i++){
					a.push(parseInt(value[i].summary));
				}
				return a;
				
			}
			var target = function(){
				var a=[];
				for(var i=0;i< value.length;i++){
					a.push(210);
				}
				return a;
				
			}
            $("#report").kendoChart({
                title: {
                    text: "Cutsize"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: "column"
                },
                series: [{
                    name: "Output",
                    data: $.map(report, function(value, index) { return [value.input]})
                }, {
                    name: "Target",
                    data: $.map(report, function(value, index) { return 12000})
                }],
                valueAxis: {
                    labels: {
                        format: "{0} Pack/day"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: 0
                },
                categoryAxis: {
                    categories: $.map(report, function(value, index) { return [value.day]}),
                    line: {
                        visible: false
                    },
                    labels: {
                        padding: {top: 0}
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}",
                    template: "#= series.name #: #= value #"
                }
            });

            $("#downtime").kendoChart({
                title: {
                    text: "Down time"
                },
                legend: {
                    position: "top"
                },
                seriesDefaults: {
                    type: "column"
                },
                series: [{
                    name: "Output",
                    data: $.map(total_donwtime, function(value, index) { return [value.total_minutes]})
                }],
                valueAxis: {
                    labels: {
                        format: "{0} minutes"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: 0
                },
                categoryAxis: {
                    categories: $.map(total_donwtime, function(value, index) { return [value.problem_name]}),
                    line: {
                        visible: false
                    },
                    labels: {
                        padding: {top: 0}
                    }
                },
                tooltip: {
                    visible: true,
                    format: "{0}",
                    template: "#= series.name #: #= value #"
                }
            });

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
        }

			);
					$("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "yyyy-MM"
                });
</script>
            <script type="text/javsacript">
    //Set the cursor ASAP to "Wait"
    document.body.style.cursor='wait';

    //When the window has finished loading, set it back to default...
    window.onload=function(){document.body.style.cursor='default';}
</script>