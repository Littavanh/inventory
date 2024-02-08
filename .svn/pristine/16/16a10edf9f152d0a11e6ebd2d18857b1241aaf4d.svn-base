<?php
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	// -------------------------------------------	
$whereclauseIncome = "";
$whereclauseIncome = "(DATE(vcl.dateRecive) BETWEEN '$startdate' AND '$enddate') AND ";
if ($whereclauseIncome != "") $whereclauseIncome = "WHERE  " . substr($whereclauseIncome, 0, strlen($whereclauseIncome)-5);


$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	

// --------------------------------------------------------- Build Paging

$SumIncome = nr_execute(" SELECT vcl.pay_total_lak FROM v_service_sumary as vss JOIN v_cashlog as vcl on vss.od_no=vcl.od_no  
							WHERE (DATE(vcl.dateRecive) BETWEEN '$startdate' AND '$enddate') ");
$SumPayment = nr_execute(" SELECT SUM(pur_price) as pur_price FROM v_transaction 
						WHERE (DATE(dateRecive) BETWEEN '$startdate' AND '$enddate') AND active_id IN (1,2) and tranType IN (1,3,4,6) ");
 
