<?php 
	echo link_tag('assets/css/kendo/kendo.common.min.css');
	echo link_tag('assets/css/kendo/kendo.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.dataviz.flat.min.css');
	echo link_tag('assets/css/kendo/kendo.default.css');
?>

    <script src="<?php echo base_url()?>assets/js/kendo.all.min.js"></script>
    
<div id="content" class="col-lg-12 col-sm-12"> 
  <!-- content starts -->
 
  <div> 
    <!-- Detail -->
    <h4>จัดการผู้ใช้งาน</h4>
    <hr />
    
    <div class="row" style="width:100%">
    	<div class="col-md-12 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            จัดการผู้ใช้งาน
                        </div>
                        <div class="panel-body">
                        	<div id="grid"></div>
                     	</div>   
                    </div>
        </div>
    </div>
    
    
    <!-- Detail --> 
  </div>
</div>
            <script>
				var user_level = [{
					"value": "1","text": "ผู้ดูแลระบบ"
				},{
					"value": "2","text": "Dashboard Monitor"
				},{
					"value": "3","text": "Converting Report"
				},{
					"value": "4","text": "สรุปผลตัด"
				},{
					"value": "5","text": "Log Sheet"
				},{
					"value": "6","text": "หัวหน้ากะ"
				},{
					"value": "7","text": "พนักงานเดินเครื่อง"
				}];

                $(document).ready(function () {
                    var crudServiceBaseUrl = "<?php echo base_url()?>index.php/user",
                        dataSource = new kendo.data.DataSource({
                            transport: {
                                read:  {
                                    url: crudServiceBaseUrl + "/list_user?callback",
                                    dataType: "jsonp"
                                },
                                update: {
                                    url: crudServiceBaseUrl + "/user_update",
                                    dataType: "jsonp"
                                },
                                destroy: {
                                    url: crudServiceBaseUrl + "/user_delete",
                                    dataType: "jsonp"
                                },
                                create: {
                                    url: crudServiceBaseUrl + "/user_insert",
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
                                    id: "user_id",
                                    fields: {
                                        user_id: { editable: false, nullable: true },
                                        user_name: { validation: { required: true } },
										user_email: { validation: { required: true } },
										user_level: { validation: { required: true } ,field: "user_level", values: user_level },
										user_password: { },
                                        
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
                            { field:"user_name", title: "<div align='center'>ชื่อ-นามสกุล</div>" ,width:"35%"  },
							{ field:"user_email", title: "<div align='center'>E-mail</div>" ,width:"25%"  },
							{ field:"user_level",values:user_level, title:"<div align='center'>กลุ่มผู้ใช้งาน</div>",width: "20%" },
							{ field: "user_password",  hidden: true, title:"<div align='center'>Password</div>" },
                            { command: ["edit", "destroy"], title: "<div align='center'>จัดการ</div>", width: "20%" }],
                        editable: "popup"
                    });
                });
            </script>
            
            