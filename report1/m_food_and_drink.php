<?php
	$status_id = mysql_real_escape_string(stripslashes($_GET['status_id']));
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclause = "";
if ($status_id != 0) $whereclause .= " status_id = '$status_id'  AND ";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{	
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($status_id != 0) $params .= "status_id=$status_id&";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	
	
// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_kind_of_food $whereclause");
		
function Loadkin_food($whereclause) {
	return mysql_query("select * from v_kind_of_food $whereclause ");
}

		
function Loadfood_drink($whereclause_kind_food) {
	return mysql_query("select * from v_food_and_drink $whereclause_kind_food ");
}

function selstatus($whereclause){
	$sql1 = "select * from tb_status $whereclause";
	$result1 = mysql_query($sql1);
	return $result1;
}

$result = Loadkin_food($whereclause);

