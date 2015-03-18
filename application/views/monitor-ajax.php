<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SCG DMS - Monitor</title>
<script src="<?php echo base_url()?>assets/js/jquery.js"></script>
</head>

<body>
<div id="monitor"></div>
</body>
</html>
<script>
$( "#monitor" ).load( "<?php echo base_url();?>index.php/dashboard/monitor" );
</script>
<script type="text/javascript"> 		
        var base_url = '<?php echo base_url();?>';
		$(document).ready(function() { 
			setInterval(function(){ // เขียนฟังก์ชัน javascript ให้ทำงานทุก ๆ 30 วินาที  
				// 1 วินาที่ เท่า 1000  
				// คำสั่งที่ต้องการให้ทำงาน ทุก ๆ 3 วินาที  
				var getData=$.ajax({ // ใช้ ajax ด้วย jQuery ดึงข้อมูลจากฐานข้อมูล  
						url : base_url +'index.php/dashboard/monitor', 
						data:"rev=1",  
						async:false,  
						
						success:function(getData){
							$("div#monitor").html(getData); // ส่วนที่ 3 นำข้อมูลมาแสดง
						}
				}).responseText;  
			},600000);      
		});
		
    //existing AJAX code here
		

</script>