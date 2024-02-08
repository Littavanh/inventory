<?php
	$info_id = $_SESSION["EDPOSV1info_id"];	
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));		
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	
	// -------------------------------------------	
$whereclause = "";
$get_infoDefault = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_open) BETWEEN '$startdate' AND '$enddate') AND ";
} 
else {
	$whereclause .= "(DATE(date_open) BETWEEN NOW() AND NOW()) AND ";
}

if ($infoID >'0') {
	$whereclause .= " info_id='$infoID'  AND  ";	
	$get_infoDefault = " and info_id='$infoID' ";
	$setDefaultInfoID = $infoID;
} 
 if ($infoID =='') {
	$whereclause .= " info_id='$Get_infoID'  AND  ";
	$get_infoDefault = " and info_id='$Get_infoID' ";
	$setDefaultInfoID = $Get_infoID;
}

$params = "";
$params .= "startdate=$startdate&enddate=$enddate&infoID=$setDefaultInfoID";	


if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);
	
function Loadservice_sumary($whereclause) {
	return mysql_query(" SELECT * FROM tb_cashdrawer_log $whereclause order by date_open asc ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}


$getOpenID = nr_execute(" select openid from v_opendate WHERE status_id IN (1,2,5) $get_infoDefault order by openID DESC LIMIT 1   ");
