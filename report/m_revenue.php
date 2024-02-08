<?php
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclause = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(vcl.date_add) BETWEEN '$startdate' AND '$enddate') AND ";
}else{
	$whereclause .= "(DATE(vcl.date_tran) BETWEEN '$startdate' AND DATE(NOW())) AND ";
} 
$whereclause = "(DATE(vcl.date_add) BETWEEN '$startdate' AND '$enddate') AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	

// --------------------------------------------------------- Build Paging

$catcount = nr_execute(" SELECT vss.od_no, vss.total, vss.date_add as dateOrder, vcl.bill_total, vcl.discount_lak,
						vcl.pay_lak, vcl.pay_thb, vcl.pay_usd,vcl.pay_total_lak, vcl.bill_total-vcl.pay_total_lak as change_LAK, vcl.date_add,vcl.username
						FROM v_service_sumary as vss
						JOIN v_cashlog as vcl on vss.od_no=vcl.od_no $whereclause");
		
function Loadservice_sumary($whereclause) {
	return mysql_query(" SELECT vss.od_no, vss.total, vss.date_add as dateOrder, vcl.bill_total, vcl.discount_lak,
						vcl.pay_lak, vcl.pay_thb, vcl.pay_usd,vcl.pay_total_lak, vcl.bill_total-vcl.pay_total_lak as change_LAK, vcl.date_add,vcl.username
						FROM v_service_sumary as vss
						JOIN v_cashlog as vcl on vss.od_no=vcl.od_no  $whereclause order by vss.od_no ");
}

 
 

$result = Loadservice_sumary($whereclause);

