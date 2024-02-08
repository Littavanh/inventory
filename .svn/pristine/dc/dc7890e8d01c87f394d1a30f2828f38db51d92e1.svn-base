<?php
	$status_id = mysql_real_escape_string(stripslashes($_GET['status_id']));
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";

if ($status_id > 0) { $whereclause .= " status_id = '$status_id'  AND "; } else { $whereclause .= " status_id IN (1,2)  AND ";}

if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
$params .= "status_id=$status_id&";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	

// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_table $whereclause");

function LoadTable($whereclause) {
	return mysql_query("select * from v_table $whereclause $limitclause");
}

$result = LoadTable($whereclause);