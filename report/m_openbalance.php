<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
$whereclause .= "closeDate BETWEEN '$startdate' AND '$enddate' AND ";
if ($infoID !='0') $whereclause .= "info_id='$infoID' AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);

$params = "";
$params .= "startdate=$startdate&enddate=$enddate&infoid=$infoID&";
 

//=======SUM material by material ID
function SumMaterial($whereclause) { 
	return mysql_query("select * from v_opendate $whereclause and status_id IN (1,2) order by openID DESC ");
}

 
function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}
  

$SumResult = SumMaterial($whereclause);


