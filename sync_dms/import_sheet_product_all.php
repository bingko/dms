 
 <?php


 $mysql_con = mysqli_connect("172.31.7.228","qapa","qapa");
if(mysqli_connect_error())
{
  echo "fadfad";
}
mysqli_select_db($mysql_con,'dms_master');

$sql_truncate = "TRUNCATE TABLE `sheet_product` ";
$result = mysqli_query($mysql_con,$sql_truncate) or die ("ABC");
//////////////////////////

//$set_date = date("Y-m-d");
$set_date_2013 = "%2013%";
$set_date_2014 = "%2014%";
$set_date_2015 = "%2015%";
//echo $set_date;
 

 $conn = odbc_connect("DMS","cvt","cvt") or die("Can not connect ODBC1!!!1");
 $sql = "select * from Sheet_Product where  FinishTime like '".$set_date_2013."'  OR FinishTime LIKE '".$set_date_2014."' OR FinishTime LIKE '".$set_date_2015."'  order by FinishTime " ;
 echo $sql;
 echo " <hr>";
//  $sql = "select * from RollInCVTArea_Temp   ";
//echo "<br><br> ==>";

$query = odbc_exec($conn,$sql);
$i=0;
 

//////v 

while(odbc_fetch_row($query)){
 
     $insert_mysql =  "INSERT INTO  `sheet_product` (  `PalletID` ,  `Sheeter` ,  `Finish` ,  `FinishTime` ,  `Shift_q` ,  `Date_q` ,  `Date_p` ,  `WLBM` ,  `CustomerOrder` ,  `Grade` ,  `Basisweight` ,  `Width` ,  `Length` ,  `Sheet` ,  `Ream` ,  `Calc_W` ,  `Calc_W2` ,  `Rollid1` ,  `Rollid2` ,  `Rollid3` , `Rollid4` ,  `Rollid5` ,  `W1` ,  `W2` ,  `W3` ,  `W4` ,  `W5` ,  `SubType` ) 
    VALUES ( ".

     "  '".odbc_result($query,"PalletID")."', ".
     "  '".odbc_result($query,"Sheeter")."', ".
     "  '".odbc_result($query,"Finish")."', ".
     "  '".odbc_result($query,"FinishTime")."', ".
     "  '".odbc_result($query,"Shift_q")."', ".
     "  '".odbc_result($query,"Date_q")."', ".
     "  '".odbc_result($query,"Date_p")."', ".
     "  '".odbc_result($query,"WLBM")."', ".
     "  '".odbc_result($query,"CustomerOrder")."', ".
     "  '".odbc_result($query,"Grade")."', ".
     "  '".odbc_result($query,"Basisweight")."', ".
     "  '".odbc_result($query,"Width")."', ".
     "  '".odbc_result($query,"Length")."', ".
     "  '".odbc_result($query,"Sheet")."', ".
     "  '".odbc_result($query,"Ream")."', ".
     "  '".odbc_result($query,"Calc_W")."', ".
     "  '".odbc_result($query,"Calc_W2")."', ".
     "  '".odbc_result($query,"Rollid1")."', ".
     "  '".odbc_result($query,"Rollid2")."', ".
     "  '".odbc_result($query,"Rollid3")."', ".
     "  '".odbc_result($query,"Rollid4")."', ".
     "  '".odbc_result($query,"Rollid5")."', ".
     "  '".odbc_result($query,"W1")."', ".
     "  '".odbc_result($query,"W2")."', ".
     "  '".odbc_result($query,"W3")."', ".
     "  '".odbc_result($query,"W4")."', ".
      "  '".odbc_result($query,"W5")."', ".
        "  '".odbc_result($query,"SubType")."'".
     " ); ";

    echo  "<br>".$i." -> ". odbc_result($query,"PalletID")." " .odbc_result($query,"FinishTime"). " <br>";
    //echo  $insert_mysql ;
    mysqli_query($mysql_con,$insert_mysql);
    //mysqli_select_db()
    $i++;
}
  mysqli_close($mysql_con);
 ?>