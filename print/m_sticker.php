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
/*========== update date time check bill ===============*/
if ($_GET['checktime'] == 'true') {
	sql_execute("UPDATE tb_order_id SET date_checkbill = NOW() WHERE od_no = $bill_id ");
}


function Loadbill(){
	$od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
	return mysql_query(" SELECT CONCAT(fd_name,'|',remark) as fd_name1, fd_name,remark, SUM(qty) AS qty, price, (SUM(qty)*price) AS total, tb_name  
		FROM v_service_detail 	WHERE od_no = $od_no and status_id NOT IN (11) GROUP BY fd_name, price ");
}
 

function getTableName(){
	$od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
	return mysql_query("SELECT tb_name, date_add, openTableTime, date_checkbill FROM v_service_sumary WHERE od_no = $od_no limit 1");
}

function GetCashLog(){
	$od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
	return mysql_query("SELECT od_no, discount_lak, pay_total_lak, bill_total, (pay_total_lak+discount_lak) as totalPay,
						(pay_total_lak+discount_lak) - (bill_total-discount_lak) as change_money, openID 
						FROM v_cashlog WHERE od_no = $od_no limit 1");
}
$result_cashlog= GetCashLog();
$Get_total_pay = 0;
$Get_Discount = 0;
$Get_change_money=0;
while($row_cashlog= mysql_fetch_array($result_cashlog,MYSQL_ASSOC)) {
	$Get_total_pay = $row_cashlog['totalPay'];
	$Get_Discount = $row_cashlog['discount_lak'];
	$Get_change_money = $row_cashlog['change_money'];	
}



$result_tbName = getTableName();
while($row_tbName = mysql_fetch_array($result_tbName,MYSQL_ASSOC)) {
	$GetTbName = $row_tbName['tb_name'];
	$GetDateOrder = $row_tbName['date_add'];
	$GetOpenDate =  $row_tbName['openTableTime'];
	$GetDateOut =  $row_tbName['date_checkbill'];
}


function cur(){
	return mysql_query("SELECT * FROM tb_rate_setting  WHERE status_id = 1");
}

$result_Cur = cur();
while($row_c = mysql_fetch_array($result_Cur,MYSQL_ASSOC)) {
	$thb = $row_c['thb'];
	$usd = $row_c['usd'];
}

