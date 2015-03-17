<?php

$mysql_con = mysqli_connect("172.31.7.228","root","m1ndb;2009");
if(mysqli_connect_error())
{
	echo "fadfad";
}
mysqli_select_db($mysql_con,'DMS');
 //exit;
$conn = odbc_connect("DMS","cvt","cvt") or die("Can not connect ODBC1!!!1");
 $sql = "select * from Roll_Winder where id between   '702000'  and '710000' order by id ";
   echo $sql;
 echo " <hr>";
//  $sql = "select * from RollInCVTArea_Temp   ";
//echo "<br><br> ==>";
 
$query = odbc_exec($conn,$sql);
$i=0;
 

//////v 

while(odbc_fetch_row($query)){
	/*
 echo " >>". odbc_result($query,"id")." || ";
 echo " ". odbc_result($query,"Rollid");
 echo " ". odbc_result($query,"Rollid2");
 echo " ". odbc_result($query,"Machineid");
 echo " ". odbc_result($query,"Winderid");
 echo " ". odbc_result($query,"ReelNo");
 echo " ". odbc_result($query,"Date_s");
 echo " ". odbc_result($query,"Date_f");
 echo " ". odbc_result($query,"Shift_f");
 echo " ". odbc_result($query,"FinishTime");
 echo " ". odbc_result($query,"WLBM");
 echo " ". odbc_result($query,"Type");
 echo " ". odbc_result($query,"Grade");
 echo " ". odbc_result($query,"Basisweight");
 echo " ". odbc_result($query,"CustomerOrder");
 echo " ". odbc_result($query,"OrderNo");
 echo " ". odbc_result($query,"Width");
 echo " ". odbc_result($query,"Length");
 echo " ". odbc_result($query,"Diameter");
 echo " ". odbc_result($query,"Calc_W");
 echo " ". odbc_result($query,"Weight");
 echo " ". odbc_result($query,"Weight_Net");
 echo " ". odbc_result($query,"Core");
 echo " ". odbc_result($query,"Splice");
 echo " ". odbc_result($query,"Type");
 echo " ". odbc_result($query,"Property");
 echo " ". odbc_result($query,"PLC_Dest");
 echo " ". odbc_result($query,"Destination");
 echo " ". odbc_result($query,"Remark");
 echo " ". odbc_result($query,"itemNo");
 echo " ". odbc_result($query,"saleType");
 echo " ". odbc_result($query,"Brand");
 echo " ". odbc_result($query,"PrintNetWeight");
 echo "<br>";
 */
 
 $insert_mysql = "INSERT INTO  `roll_winder` (  
 	`id` ,  
 	`Rollid` ,  
 	`Rollid2` , 
 	 `Machineid` ,  
 	 `Winderid` ,  
 	 `ReelNo` ,  
 	 `Date_s` , 
 	  `Shift_s` ,  
 	  `Date_f` , 
 	   `Shift_f` ,  `FinishTime` ,  `WLBM` ,  `Type` ,  `Grade` ,  `Basisweight` ,  `CustomerOrder` ,  `OrderNo` ,  `Width` ,  `Length` ,  `Diameter` ,  `Calc_W` ,  `Weight` ,  `Weight_Net` ,  `Core` ,  `Splice` ,  `Property` ,  `PLC_Dest` ,  `Destination` ,  `New_Dest` ,  `Remark` ,  `itemNo` ,  `saleType` ,  `Brand` ,  `PrintNetWeight` )  " .

 "VALUES ( ".
 " '".odbc_result($query,"id")."',  " .
 " '".odbc_result($query,"Rollid")."',  " .
 " '".odbc_result($query,"Rollid2")."',  " .
 " '".odbc_result($query,"Machineid")."',  " .
 " '".odbc_result($query,"Winderid")."',  " .
 " '".odbc_result($query,"ReelNo")."',  " .
 " '".odbc_result($query,"Date_s")."',  " .
   " '".odbc_result($query,"Shift_s")."',  " .
 " '".odbc_result($query,"Date_f")."',  " .
  " '".odbc_result($query,"Shift_f")."',  " .

 " '".odbc_result($query,"FinishTime")."',  " .
 " '".odbc_result($query,"WLBM")."',  " .
 " '".odbc_result($query,"Type")."',  " .
 " '".odbc_result($query,"Grade")."',  " .
 " '".odbc_result($query,"Basisweight")."',  " .
 " '".odbc_result($query,"CustomerOrder")."',  " .
 " '".odbc_result($query,"OrderNo")."',  " .
 " '".odbc_result($query,"Width")."',  " .
 " '".odbc_result($query,"Length")."',  " .
 " '".odbc_result($query,"Diameter")."',  " .
 " '".odbc_result($query,"Calc_W")."',  " .
 " '".odbc_result($query,"Weight")."',  " .
 " '".odbc_result($query,"Weight_Net")."',  " .
 " '".odbc_result($query,"Core")."',  " .
 " '".odbc_result($query,"Splice")."',  " .
 " '".odbc_result($query,"Type")."',  " .
 " '".odbc_result($query,"Property")."',  " .
 " '".odbc_result($query,"PLC_Dest")."',  " .
 " '".odbc_result($query,"Destination")."',  " .
 " '".odbc_result($query,"Remark")."',  " .
 " '".odbc_result($query,"itemNo")."',  " .
 " '".odbc_result($query,"saleType")."',  " .
 " '".odbc_result($query,"Brand")."',  " .
 " '".odbc_result($query,"PrintNetWeight")."' " .
 "); ";


echo  $insert_mysql ;
mysqli_query($mysql_con,$insert_mysql);
//mysqli_select_db()
echo "<br>";
} 
mysqli_close();

?>