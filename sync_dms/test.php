<?php
//echo "test odbc";
$dd = date("d");
$mm = date("m");

 

switch($dd) {
    case "01" : $day=1;break; 
    case "02" : $day=2;break; 
     case "03" : $day=3;break; 
    case "04" : $day=4;break; 
     case "05" : $day=5;break; 
    case "06" : $day=6;break;       
     case "07" : $day=7;break; 
    case "08" : $day=8;break; 
     case "09" : $day=9;break; 
     default : $day= $dd; break;
   }
   
   switch($mm) {
    case "01" : $mmm=1;break; 
    case "02" : $mmm=2;break; 
     case "03" : $mmm=3;break; 
    case "04" : $mmm=4;break; 
     case "05" : $mmm=5;break; 
    case "06" : $mmm=6;break;       
     case "07" : $mmm=7;break; 
    case "08" : $mmm=8;break; 
     case "09" : $mmm=9;break; 
       default : $mm= $mmm;  break;
   }

$yyy= date("Y");  
//echo $value_date ;
//echo "<br>";
//exit;
$value_date  = $mmm."/".$day."/".$yyy;
echo $value_date ;
echo "<br> ================ <br>";
$conn = odbc_connect("DC500","sa","qapa") or die("Can not connect ODBC1!!!1");
 
$conn_2 = odbc_connect("DC500","sa","qapa") or die("Can not connect ODBC2!!!1");
$sql = "select * from DC500_TESTDATA  WHERE          ([Timestamp] LIKE '%$value_date%') ORDER BY [Timestamp] DESC ";
//$sql = "select * from DC500_TESTDATA  WHERE       (Queue = 'MAN') AND ([Timestamp] LIKE '%$value_date%') ORDER BY [Timestamp] DESC ";
//echo "<br><br> ==>";
 // echo $sql;
$query = odbc_exec($conn,$sql);
$i=0;

/// mysql connect

//$mysql_conn = mysql_connect("localhost", "root", "qapa") or die("Mysql die");
$mysql_conn = mysql_connect("172.31.7.228", "qapa", "qapa") or die( );
$rs = mysql_select_db("qi_scg");
 





//////v 

while(odbc_fetch_row($query)){
		$i++;
		 
		//    echo " <br>".odbc_result($query,"TestID") 
		// . "<br>1 =>".odbc_result($query,"Automeasure") 
		// . "2 =>".odbc_result($query,"Sample") 
		// . "3 => ".odbc_result($query,"Queue")  
		// . "4 =>".odbc_result($query,"Timestamp") 
		// ."<br>============================<br>" ;
		 
		// check duplicate
		$duplicate = "select * from testdata where TestID='".odbc_result($query,"TestID")."' ";
		$ccc = mysql_query( $duplicate ) or die('count');
		$num_rows = mysql_num_rows( $ccc );
		//echo "===> ". $num_rows;
		//echo $i." >> ".$num_rows."<br>";

		if($num_rows ==0){
				echo " Inseart to mysql = ";
				$sql_insert = "insert into testdata(TestID,Automeasure,Sample,Queue,Timestamp) values(
				'".odbc_result($query,"TestID")."',
				'".odbc_result($query,"Automeasure")."',
				'".odbc_result($query,"Sample")."',
				'".odbc_result($query,"Queue")."',
				'".odbc_result($query,"Timestamp")."' )";
				echo $sql_insert."<br>";
				$result = mysql_query( $sql_insert ) or die('error1');

				 ///////////// get datastat -> mysql 
				$test_id = odbc_result($query,"TestID");
				$sql_datastat =" SELECT     *, DC500_DATASTATS.* FROM         DC500_DATASTATS WHERE     (TestID = $test_id )";
				$query_2 = odbc_exec($conn_2,$sql_datastat);
				 echo $sql_datastat ;
				while(odbc_fetch_row($query_2)){

					//echo " <br>".odbc_result($query_2,"TestID") ;
					//echo    odbc_result($query_2,"TagName") ;

					$sql_insert_2 = "insert into datastats( TestID ,  TagID ,  TagName ,  LabelName ,  ZoneID ,  AvgVal ,  MinVal ,  MaxVal ,  StdDev ) values(
					'".odbc_result($query_2,"TestID")."',
					'".odbc_result($query_2,"TagID")."',
					'".odbc_result($query_2,"TagName")."',
					'".odbc_result($query_2,"LabelName")."',
					'".odbc_result($query_2,"ZoneID")."',
					'".odbc_result($query_2,"AvgVal")."', 
					'".odbc_result($query_2,"MinVal")."', 
					'".odbc_result($query_2,"MaxVal")."', 
					'".odbc_result($query_2,"StdDev")."' )";
				
				//	 echo $sql_insert_2."===== <br>";
					$result = mysql_query( $sql_insert_2 ) or die('error 3');
				 };
					
				// $result = mysql_query( $sql_insert_2 ) or die('error datastat mysql');
		} // end if
		else{
			echo "มีข้อมูลอยู่แล้ว <br>";
		}			 

} 
mysql_close($mysql_conn);
?>