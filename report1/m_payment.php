<?php
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclause = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND active_id IN (1,2) and tranType IN (1,3,4,6) AND ";
}else{
	$whereclause .= "(DATE(date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND active_id IN (1,2) and tranType IN (1,3,4,6) AND ";
} 
$whereclause = "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND active_id IN (1,2) and tranType IN (1,3,4,6) AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	

// --------------------------------------------------------- Build Paging

$catcount = nr_execute(" SELECT tranID, traDate, reciever, remark, username, date_add, staffName,  
							tranType, SUM(pur_price) * unitQTY3 as  pur_price, Typename
							FROM v_transaction   $whereclause
							GROUP BY tranType, staffName ");
									
function Loadservice_sumary($whereclause) {
	return mysql_query(" SELECT tranID, traDate, reciever, remark, username, date_add, staffName,  
							tranType, SUM(pur_price) * unitQTY3 as  pur_price, Typename
							FROM v_transaction   $whereclause
							GROUP BY tranType, staffName ");
}

$result = Loadservice_sumary($whereclause);

