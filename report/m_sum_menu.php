<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclause = "";
$whereclause_detail = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= " (DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";	
}else{
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($infoID !='0') $whereclause .= "info_id='$infoID' AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&";
}	
	
 		
function Loadservice_sumary($whereclause) {
	return mysql_query("select  kf_name, SUM(qty) as qty, SUM(total) as total, SUM(total_cost) as total_cost from v_order_detail $whereclause GROUP BY kf_name order by kf_name ");
}


function LoadMenuDetail($whereclause, $whereGroupID) {
	return mysql_query("select fd_id, fd_name, SUM(qty) as qty, SUM(total) as total, kf_name, SUM(total_cost) as total_cost, remark, count_cm  from v_order_detail $whereclause and kf_name = '$whereGroupID' GROUP BY fd_id, remark order by fd_id ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}

$result = Loadservice_sumary($whereclause);

