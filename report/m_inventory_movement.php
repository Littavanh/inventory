<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));	
	$categoryID = mysql_real_escape_string(stripslashes($_GET['categoryID']));	
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));

	//===============	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND '$enddate') AND ";
if ($infoID !='0') $whereclause .= " info_id='$infoID'  AND  ";
if ($categoryID !='0') $whereclause .= " kf_id='$categoryID'  AND  ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&kf_id=$categoryID&";
}	
		
function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}
function LoadCategory() { 
	return mysql_query("select * from v_kind_of_food WHERE status_id IN (3)  ");
}
 
function LoadInventoryMovement($whereclause) {
	return mysql_query("select * from v_transaction $whereclause and active_id IN (1,2) and Dstatus_id <> 5  ORDER BY date_tran, date_add  ");
}

$result_detail = LoadInventoryMovement($whereclause);