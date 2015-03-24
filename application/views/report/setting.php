<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>

    <script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
    
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> Setting <small>Target Report</small> </h1>
    <ol class="breadcrumb">
      <li> <i class="fa fa-dashboard"></i> <a href="index.html">Log Sheet</a> </li>
      <li class="active"> <i class="fa fa-file"></i> Target Report </li>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
  <div id="grid"></div>

<script>
                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/report",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_target?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/target_update",
                                    dataType: "jsonp"
                                },
                                parameterMap: function(options, operation) {
                                    if (operation !== "read" && options.models) {
                                        return {models: kendo.stringify(options.models)};
                                    }
                                }
                            },
                            batch: true,
                            pageSize: 20,
                            schema: {
                                model: {
                                    id: "target_id",
                                    fields: {
                                        target_id: { editable: false, nullable: true },
                                        target_name: { editable: false },
										target_date: { editable: false },
										target_value: { validation: { required: true } },
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
						sortable: true,
						
                        pageable: true,
                        columns: [
                            { field:"target_name", title: "<div align='center'>Target Name</div>" ,width:"40%"  },
							{ field:"target_date", title: "<div align='center'>เดือน</div>" ,width:"20%"  },
							{ field:"target_value", title: "<div align='center'>ค่าTarget</div>" ,width:"20%"  },
                            { command: ["edit"], title: "<div align='center'>จัดการ</div>", width: "20%" }],
                        editable: "inline"
                    });
                });
            </script>
  </div>
</div>