<?php 
	echo link_tag('assets/js/hightcharts/exporting.js');
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<style>
	.red_text{ color:#F00 }
	.blue_text{ color:#00C }
	table td{
		white-space: nowrap;	
	}	
	.table thead tr th{
		text-align:center;	
		vertical-align:middle;
		background:rgb(240, 240, 240);
	}
	.table tbody tr td,.table tfoot tr td{
		padding:3px;
		text-align:center;
		vertical-align:middle;
	}

</style
<div class="row">
	<div class="col-lg-12">
			<div class="jumbotron" align="center" style="padding-top: 15px;padding-bottom: 20px; ">
				<h3 class="red_text"><strong>PHOENIX PULP & PAPER CONVERTING SUMARY REPORT</strong></h3>
				<hr width="60%" style="border-color:#690" />
				<h4 class="">KPI SUMARY CUTTER <span class="text_red">No. <?php echo $this->uri->segment(3)?>&nbsp;&nbsp;&nbsp;เดือน <strong><span class="text_orange"><?php 
				$date = new DateTime($this->uri->segment(4));
				echo date_format($date, 'm / Y'); 
				
				?> </span></strong></span></h4>
				
				<h4>
				</h4>
			</div>
	</div>
 </div>
	<?php echo form_open('logSheet/searchCutSizeLog');?>
					<div id="date">
						<div class="row">
							<div class="col-sm-12"  align="right"> 
								<input type="hidden" name="cutter" value="<?php echo $this->uri->segment(3);?>" />
								<input type="date" id="monthpicker" value="<?php echo $this->uri->segment(4);?>" class="form-control end" name="end_date" onchange="this.form.submit()"/>
							</div>
						</div><br />
					</div>
	<?php echo form_close()?>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<tr>
						<th rowspan="2">DownTime Reason</th>
						<th colspan="3">Shift</th>
						<th rowspan="2">total</th>
						<th>%</th>
					</tr>				
					<tr>
						<th> 7.00-15.00</th>
						<th> 15.00-23.00</th>
						<th >23.00-7.00</th>
						<th>Loss</th>
					</tr>
				<tbody>
				<?php foreach($downtime as $key => $value){ ?>
					<tr>
						<td><?php echo $value['problem_name'] ?></td>
						<td><?php echo $value['shift1'] ?></td>
						<td><?php echo $value['shift2'] ?></td>
						<td><?php echo $value['shift3'] ?></td>
						<td><?php echo ($value['shift1']+$value['shift2']+$value['shift3']) ?></td>
						<td></td>
					</tr>
				<?php } ?>
				</tbody>
				</thead>
			</table>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th>วันที่</th>
					<th>Prod/Target</th>
					<th>Prod Output / Day</th>
					<th>Acc.Target</th>
					<th>Output Acc.</th>
					<th>% Yield</th>
					<th>% Yield Avg.</th>
					<th>Taget</th>
					<th>Input (Ton)</th>
				</thead>
				<tbody>
					<?php 
					$output_acc=0;
					$input_acc=0;
					foreach($cutsize as $i=>$value){
						$output_acc+=$value['sum_output'];
						$input_acc+=$value['sum_input'];?>
					<tr>
						<td><?php echo $value['day']?></td>
						<td>210</td>
						<td><?php echo $value['sum_output']?></td>
						<td><?php echo 210*($i+1) ?></td>
						<td><?php echo $output_acc ?></td>
						<td><?php echo @($value['sum_output']/$value['sum_input'])*100 ?></td>
						<td><?php echo @($output_acc/$input_acc)*100 ?></td>
						<td>95.75</td>
						<td><?php echo $value['sum_input']?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

				<div id="charts" ></div>
				<hr/>
				<div id="downtime"></div>
		</div>
		<?php echo form_close();?>
		
	</div>
            <script>
			$(document).ready(function(){
			var value=<?php echo $this->logsheet_cutsize_report->get_cutsize_log_chart()?>;
			var total_donwtime=<?php echo $this->logsheet_cutsize_report->get_cutsize_problem_chart()?>;
			var value3=$.map(<?php echo $this->logsheet_cutsize_report->get_cutsize_problem_chart()?>, function(value, index) { return [value.problem_name];});
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
            $("#charts").kendoChart({
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
                    data: serie()
                }, {
                    name: "Target",
                    data: target()
                }],
                valueAxis: {
                    labels: {
                        format: "{0} ton"
                    },
                    line: {
                        visible: false
                    },
                    axisCrossingValue: 0
                },
                categoryAxis: {
                    categories: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16],
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
                    data: $.map(total_donwtime, function(value, index) { return [value.total]})
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
                    categories: value3,
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
</script>
<script>
					$("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "yyyy-MM"
                });
        </script>