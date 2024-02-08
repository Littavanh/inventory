<?php
include("../config.php");
session_start();
$user_add = $_SESSION['EDPOSV1user_id'];
$wherecause = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$bill_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$length_bill_id = 5-strlen($bill_id);

/*
if ($length_bill_id == 4) {
	$bill_id = "0000".$bill_id;
} else if ($length_bill_id == 3) {
	$bill_id = "000".$bill_id;	
} else if ($length_bill_id == 2) {
	$bill_id = "00".$bill_id;	
} else if ($length_bill_id == 1) {
	$bill_id = "0".$bill_id;	
}
*/

$GetOpenDate = nr_execute("SELECT date_add FROM v_service_sumary  WHERE od_no = '$bill_id' ");
$GetDateOut =nr_execute("SELECT date_checkbill FROM v_service_sumary WHERE od_no = '$bill_id' ");



function Loadbill(){
	$od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
	return mysql_query(" SELECT fd_name, SUM(qty) AS qty, price, (SUM(qty)*price) AS total  FROM `v_service_detail` WHERE od_no = '$od_no' GROUP BY fd_id ");
}