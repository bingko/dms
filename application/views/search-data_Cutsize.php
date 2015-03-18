<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>
<script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
<div class="row"  style="height:560px;">
	<div class="col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>  Roll in Converting Area </h3>
			</div>
			<div class="panel-body">
				<?php echo form_open('conclude/result_Cutsize/');?>
				<div id="date">
					<div class="row">
						<div class="col-sm-1 col-sm-offset-3" align="right">View By</div>
						<div class="col-md-2">
							<select class="dateTypeSelect form-control" id="dateselect" name="date_type">
								<option value="date" select="true">วันที่</option>
								<option value="month">เดือน</option>
							</select>
						</div>
					</div><br />
					<div class="row">
						<div class="col-sm-1 col-sm-offset-3" align="right"> วันที่ </div>
						<div class="col-sm-5"> 
							<input type="date" id="" class="form-control end" name="end_date" value="<?php echo date("Y-m-d");?>" /> 
						
						<input style="display:none" name="sheeter" value="<?php echo$this->uri->segment(3)?>"/>	
						</div>
					</div><br />
					<div class="row">
						<div class="col-sm-12" align="center"> 
							<button type="submit" class="btn btn-primary" style="width:150px;" onclick="document.body.style.cursor='wait'; return true;"><i class="fa fa-search fa-x2"></i> ค้นหา </button> 
						</div>
					</div>
				</div>
				<?php echo form_close()?>
				
				
				<?php echo form_open('conclude/result_Cutsize/') ?>
				<div id="month" style="display:none">
					<div class="row">
					<div class="col-sm-1 col-sm-offset-3" align="right">View By</div>
					<div class="col-md-2">
						<select class="dateTypeSelect form-control" id="monthselect" name="date_type">
							<option value="date">วันที่</option>
							<option value="month" selected="true">เดือน</option>
						</select>
					</div>
				</div><br />
				<div class="row">
					<div class="col-sm-1 col-sm-offset-3" align="right"> เดือนที่ </div>
					<div class="col-sm-5"> <input type="date" id="monthpicker"  class="form-control" name="end_date" 
					value="<?php echo date("F Y");?>" />
						<input style="display:none" name="sheeter" value="<?php echo$this->uri->segment(3)?>"/>			
					</div>
				</div><br />
				<div class="row">
					<div class="col-sm-12" align="center"> 
						<button type="submit" class="btn btn-primary" style="width:150px;" onclick="document.body.style.cursor='wait'; return true;"><i class="fa fa-search fa-x2"></i> ค้นหา </button> 
					</div>
				</div>
					
			<?php echo form_close()?>
				</div>
			</div>
		</div>
		</div>
                    </div>
                    <!-- /.col-sm-12 -->
                </div>
		<script>
                $(document).ready(function() {
					$("#monthpicker").kendoDatePicker({
                    // defines the start view
                    start: "year",

                    // defines when the calendar should return date
                    depth: "year",

                    // display month and year in the input
                    format: "MMMM yyyy"
                });
                    function startChange() {
                        var startDate = start.value(),
                        endDate = end.value();

                        if (startDate) {
                            startDate = new Date(startDate);
                            startDate.setDate(startDate.getDate());
                            end.min(startDate);
                        } else if (endDate) {
                            start.max(new Date(endDate));
                        } else {
                            endDate = new Date();
                            start.max(endDate);
                            end.min(endDate);
                        }
                    }

                    function endChange() {
                        var endDate = end.value(),
                        startDate = start.value();

                        if (endDate) {
                            endDate = new Date(endDate);
                            endDate.setDate(endDate.getDate());
                            start.max(endDate);
                        } else if (startDate) {
                            end.min(new Date(startDate));
                        } else {
                            endDate = new Date();
                            start.max(endDate);
                            end.min(endDate);
                        }
                    }

                    var today = kendo.date.today();

                    var start = $("#start").kendoDatePicker();

                    var end = $(".end").kendoDateTimePicker({
						format: "yyyy-MM-dd",
                        
                        change: endChange,
                    }).data("kendoDateTimePicker");

                    start.max(end.value());
                    end.min(start.value1());
                });
				$('.dateTypeSelect').on('change',function(){
					if($(this).val()=='date'){
						$('#month').hide()
						$('#date').show();
						$('#monthselect option[value="month"]').prop('selected', true);
					}
					else{
						$('#date').hide()
						$('#month').show()
						$('#dateselect option[value="date"]').prop('selected', true);
					}
					
				});
            </script>
            <script type="text/javsacript">
    //Set the cursor ASAP to "Wait"
    document.body.style.cursor='wait';

    //When the window has finished loading, set it back to default...
    window.onload=function(){document.body.style.cursor='default';}
</script>