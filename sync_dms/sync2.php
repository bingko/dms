 
  /*
  `PalletID
  `Sheeter 
  `Finish 
  `FinishTime` 
  `Shift_q` int(2) DEFAULT NULL,
  `Date_q` varchar(100) DEFAULT NULL,
  `Date_p` varchar(100) DEFAULT NULL,
  `WLBM` varchar(100) DEFAULT NULL,
  `CustomerOrder` varchar(100) DEFAULT NULL,
  `Grade` int(2) DEFAULT NULL,
  `Basisweight` int(11) DEFAULT NULL,
  `Width` int(11) DEFAULT NULL,
  `Length` int(11) DEFAULT NULL,
  `Sheet` int(11) DEFAULT NULL,
  `Ream` int(11) DEFAULT NULL,
  `Calc_W` int(11) DEFAULT NULL,
  `Calc_W2` int(11) DEFAULT NULL,
  `Rollid1` varchar(100) DEFAULT NULL,
  `Rollid2` varchar(100) DEFAULT NULL,
  `Rollid3` varchar(100) DEFAULT NULL,
  `Rollid4` varchar(100) DEFAULT NULL,
  `Rollid5` varchar(100) DEFAULT NULL,
  `W1` int(11) DEFAULT NULL,
  `W2` int(11) DEFAULT NULL,
  `W3` int(11) DEFAULT NULL,
  `W4` int(11) DEFAULT NULL,
  `W5` int(11) DEFAULT NULL,
  `SubType` varchar(100) DEFAULT NULL
  */
 
 <?php


 $mysql_con = mysqli_connect("172.31.7.228","root","m1ndb;2009");
if(mysqli_connect_error())
{
  echo "fadfad";
}
mysqli_select_db($mysql_con,'DMS');



 $conn = odbc_connect("DMS","cvt","cvt") or die("Can not connect ODBC1!!!1");
 $sql = "select * from Sheet_Product where  FinishTime like '%2014%'  order by FinishTime " ;
   echo $sql;
 echo " <hr>";
//  $sql = "select * from RollInCVTArea_Temp   ";
//echo "<br><br> ==>";
 
$query = odbc_exec($conn,$sql);
$i=0;
 

//////v 

while(odbc_fetch_row($query)){
  /*
  echo " >>". odbc_result($query,"PalletID")." || ";
  echo " ". odbc_result($query,"Sheeter");
  echo " ". odbc_result($query,"Finish");
  echo " ". odbc_result($query,"FinishTime");
  echo " ". odbc_result($query,"Shift_q");
  echo " ". odbc_result($query,"Date_q");
  echo " ". odbc_result($query,"Date_p");
  echo " ". odbc_result($query,"WLBM");
  echo " ". odbc_result($query,"CustomerOrder");
  echo " ". odbc_result($query,"Grade");
  echo " ". odbc_result($query,"Basisweight");
  echo " ". odbc_result($query,"Width");
  echo " ". odbc_result($query,"Length");
  echo " ". odbc_result($query,"Sheet");
  echo " ". odbc_result($query,"Ream");
  echo " ". odbc_result($query,"Calc_W");
  echo " ". odbc_result($query,"Calc_W2");
  echo " ". odbc_result($query,"Rollid1");
  echo " ". odbc_result($query,"Rollid2");
  echo " ". odbc_result($query,"Rollid3");
  echo " ". odbc_result($query,"Rollid4");
  echo " ". odbc_result($query,"Rollid5");
  echo " ". odbc_result($query,"W1");
  echo " ". odbc_result($query,"W2");
  echo " ". odbc_result($query,"W3");
  echo " ". odbc_result($query,"W4");
  echo " ". odbc_result($query,"W5");
  echo "<br>";
  */

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

echo  $insert_mysql."<br>";
echo  $insert_mysql ;
mysqli_query($mysql_con,$insert_mysql);
//mysqli_select_db()

}
 ?>