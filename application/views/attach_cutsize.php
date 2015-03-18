<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>

    <script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
    
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header"> Machine Problem <small>Subheading</small> </h1>
    <ol class="breadcrumb">
      <li> <i class="fa fa-dashboard"></i> <a href="index.html">Log Sheet</a> </li>
      <li class="active"> <i class="fa fa-file"></i> Machine Problem </li>
    </ol>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
  <div id="grid"></div>

<script>
				var cutter_type = [{
					"value": "1","text": "Cut Size"
				},{
					"value": "2","text": "Folio"
				},{
					"value": "3","text": "Ream"
				}];

                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/setting",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_problem?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/problem_update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/problem_delete",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/problem_insert",
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
                                    id: "problem_id",
                                    fields: {
                                        problem_id: { editable: false, nullable: true },
                                        problem_name: { validation: { required: true } },
										cutter_type: { validation: { required: true },field: "cutter_type", values: cutter_type },
                                    }
                                }
                            }
                        });

                    $("#grid").kendoGrid({
                        dataSource: dataSource,
						sortable: true,
						filterable: {
                            extra: false,
                            operators: {
                                string: {
									contains : "ค้นหาคำ"
                                }
                            }
                        },
                        pageable: true,
                        toolbar: ["create"],
                        columns: [
                            { field:"problem_name", title: "<div align='center'>ปัญหา</div>" ,width:"60%"  },
							{ field:"cutter_type",values:cutter_type, title: "<div align='center'>ประเภท</div>" ,width:"20%"  },
                            { command: ["edit", "destroy"], title: "<div align='center'>จัดการ</div>", width: "20%" }],
                        editable: "inline"
                    });
                });
            </script>
  </div>
</div>