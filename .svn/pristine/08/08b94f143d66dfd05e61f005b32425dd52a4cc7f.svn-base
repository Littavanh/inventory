<?php
	
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	
	// -------------------------------------------	
$whereclause = "";
if ($startdate != NULL && $enddate != NULL){
	$whereclause .= "(DATE(date_add) BETWEEN '$startdate' AND '$enddate') AND ";
} 
else {
	$whereclause .= "(DATE(date_add) BETWEEN NOW() AND NOW()) AND ";
}

$params = "";
$params .= "startdate=$startdate&enddate=$enddate&";	


if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);
	
function Loadservice_sumary($whereclause) {
	if ($_SESSION["EDPOSV1MADD_RCusID"] == '' ) { $FindCusId = $_SESSION["EDPOSV1MADD_RCusID_v"]; } else  { $FindCusId = $_SESSION["EDPOSV1MADD_RCusID"];}
	return mysql_query(" SELECT * FROM v_cashlog $whereclause and amount_credit <0 and cusID='$FindCusId' ");
}


if (isset($_GET['cusID']) && $_SESSION['EDPOSV1role_id'] <=4) {
	$_SESSION["EDPOSV1MADD_RTotalBalance"]=0;
	$cusID = mysql_real_escape_string(stripslashes( base64_decode($_GET['cusID'])));
	$cusID = substr($cusID, 0, strlen($cusID)-11);
	$_SESSION["EDPOSV1MADD_RCusID"] = $cusID;

	$_SESSION["EDPOSV1MADD_RTotalBalance"] = nr_execute(" SELECT amount_credit FROM v_customers WHERE cusID='$cusID' ");
	$_SESSION["EDPOSV1MADD_RCusName"] = nr_execute(" SELECT cusName FROM v_customers WHERE cusID='$cusID' ");

	unset($_SESSION["EDPOSV1MADD_RCusID_v"]);
	//echo " SELECT Total_credit FROM v_sum_po WHERE supplierID='$SupID' ";
}





