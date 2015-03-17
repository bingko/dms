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
                                <h3 class="panel-title"> <i class="fa fa-search fa-x2"></i>  Roll in converting area</h3>
                            </div>
                            <?php echo form_open('home/result_Converting') ?>
                            <div class="panel-body">
                                <div class="row">
                                	<div class="col-sm-1 col-sm-offset-3" align="right"> วันที่เริ่ม </div>
                                    <div class="col-sm-5"> <input type="date" id="start" class="form-control" name="start_date" /> </div>
                                </div><br />
                                <div class="row">
                                	<div class="col-sm-1 col-sm-offset-3" align="right"> วันที่สิ้นสุด </div>
                                    <div class="col-sm-5"> <input type="date" id="end" class="form-control" name="end_date" /> </div>
                                </div><br />
                                <div class="row">
                                	<div class="col-sm-12" align="center"> <button type="submit" class="btn btn-primary" style="width:150px;"><i class="fa fa-search fa-x2"></i> ค้นหา </button> </div>

                                </div>
                            </div>
                            <?php echo form_close()?>
                        </div>
                    </div>
                    <!-- /.col-sm-12 -->
                </div>
		<script>
                $(document).ready(function() {
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

                    var start = $("#start").kendoDateTimePicker({
						format: "yyyy-MM-dd HH:mm",
                        value: today,
                        change: startChange,
                    }).data("kendoDateTimePicker");

                    var end = $("#end").kendoDateTimePicker({
						format: "yyyy-MM-dd HH:mm",
                        value: today,
                        change: endChange,
                    }).data("kendoDateTimePicker");

                    start.max(end.value());
                    end.min(start.value());
                });
            </script>