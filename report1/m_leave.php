<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	$status = mysql_real_escape_string(stripslashes($_GET['status']));
	
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($infoID !='0') $whereclause .= "info_id='$infoID' AND ";
if ($status !='0') $whereclause .= "status_id='$status' AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&status=$status&";
}	
 
		
function LoadLeaveHistory($whereclause) {
	return mysql_query("select * from tb_leave $whereclause ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}


$result = LoadLeaveHistory($whereclause);

