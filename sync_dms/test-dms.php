﻿<?php
 
$conn = odbc_connect("DMS","cvt","cvt") or die("Can not connect ODBC1!!!1");
 
 
 
 //$sql = "select * from SumSheetProdbyDay   ";
  $sql = "select * from RollInCVTArea_Temp   ";
//echo "<br><br> ==>";
  echo $sql;
$query = odbc_exec($conn,$sql);
$i=0;
 

//////v 

while(odbc_fetch_row($query)){
 echo odbc_result($query,"Rollid");
 echo "<br>";
} 

?>