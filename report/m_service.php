<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$staff_id = mysql_real_escape_string(stripslashes($_GET['staff_id']));
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclause = "";
if ($staff_id != 0) $whereclause .= " user_add = '$staff_id'  AND ";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($infoID !='0') $whereclause .= "info_id='$infoID' AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($staff_id != 0) $params .= "user_add=$staff_id&";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&";
}	
 
// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_service_sumary $whereclause");
		
function Loadservice_sumary($whereclause) {
	return mysql_query("select * from v_service_sumary $whereclause order by od_no ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}


		//echo "select * from v_service_sumary $whereclause order by od_no $limitclause";
function Loaduser_staff() {
	return mysql_query("select user_id, username from v_user where role_id >1 and infoNo=1");
}

$result = Loadservice_sumary($whereclause);

