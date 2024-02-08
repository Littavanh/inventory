<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));

	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	$openID = mysql_real_escape_string(stripslashes($_GET['openID']));
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($openID != '' && $openID !='0')  $whereclause .=" openID='$openID' AND ";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($infoID !='0') $whereclause .= "info_id='$infoID' AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&";
}	
		
function LoadCashlog($whereclause) {
	return mysql_query("select * from v_cashlog $whereclause ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}

function OpenDate() {
	return mysql_query("select * from v_opendate ");
}

$result = LoadCashlog($whereclause);

