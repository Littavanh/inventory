<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));	
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));

	//===============	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND '$enddate') AND ";
if ($infoID !='0') $whereclause .= " info_id='$infoID'  AND  ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&";
}	
		
function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info_ WHERE status_id IN (1)  ");
}

function LoadInventoryMovement($whereclause) {
	return mysql_query("select * from v_transaction_ $whereclause and active_id IN (1,2) and Dstatus_id <> 5  ORDER BY date_tran, date_add  ");
}

$result_detail = LoadInventoryMovement($whereclause);