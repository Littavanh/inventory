<?php
include("../config.php");
include("../function_sel.php");
session_start();
$user_add = $_SESSION['EDPOSV1user_id'];
$wherecause = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$bill_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
$length_bill_id = 5-strlen($bill_id);

$getBillNumber = nr_execute("SELECT  billNo FROM tb_order_id WHERE od_no = $bill_id and info_id = '$infoID' ");
$getInfoName = encrypt_decrypt('decrypt',nr_execute("SELECT  info_name  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoAddr = encrypt_decrypt('decrypt',nr_execute("SELECT  info_addr  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoTel = encrypt_decrypt('decrypt',nr_execute("SELECT  info_tel  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoLogo = nr_execute("SELECT  info_logo  FROM tb_info WHERE info_id = '$infoID' ");
/*========== update date time check bill ===============*/
if ($_GET['checktime'] == 'true') {
	sql_execute("UPDATE tb_order_id SET date_checkbill = NOW() WHERE od_no = '$bill_id' and info_id='$infoID' ");
}


function Loadbill($od_no, $infoID){
	return mysql_query(" SELECT CONCAT(fd_name,'|',remark) as fd_name1, fd_name,remark, SUM(qty) AS qty, price, (SUM(qty)*price) AS total, tb_name , (SUM(qty)*discount_lak)  as discount_lak  
		FROM v_service_detail 	WHERE od_no = '$od_no' and info_id='$infoID' and status_id NOT IN (11) GROUP BY fd_name, price, remark ");
}
 

function getTableName($od_no, $infoID){	
	return mysql_query("SELECT tb_name, date_add, openTableTime, date_checkbill, user_add_name FROM v_service_sumary WHERE od_no = '$od_no' and info_id='$infoID' limit 1");
}

function GetCashLog($od_no, $infoID){	
	return mysql_query("SELECT od_no, discount_lak, pay_total_lak, bill_total, (pay_total_lak+discount_lak) as totalPay,
						(pay_total_lak+discount_lak) - (bill_total-discount_lak) as change_money, openID 
						FROM v_cashlog WHERE od_no = '$od_no' and info_id='$infoID' limit 1");
}
$result_cashlog= GetCashLog($bill_id, $infoID);
$Get_total_pay = 0;
$Get_Discount = 0;
$Get_change_money=0;
while($row_cashlog= mysql_fetch_array($result_cashlog,MYSQL_ASSOC)) {
	$Get_total_pay = $row_cashlog['totalPay'];
	$Get_Discount = $row_cashlog['discount_lak'];
	$Get_change_money = $row_cashlog['change_money'];	
	$Get_billTotal = $row_cashlog['bill_total'];	
		
}



$result_tbName = getTableName($bill_id, $infoID);
while($row_tbName = mysql_fetch_array($result_tbName,MYSQL_ASSOC)) {
	$GetTbName = $row_tbName['tb_name'];
	$GetDateOrder = $row_tbName['date_add'];
	$GetOpenDate =  $row_tbName['openTableTime'];
	$GetDateOut =  $row_tbName['date_checkbill'];
	$GetUser_add =  $row_tbName['user_add_name'];
}


function cur($infoID){
	return mysql_query("SELECT * FROM tb_rate_setting  WHERE status_id = 1 and info_id='$infoID' ");
}

$result_Cur = cur($infoID);
while($row_c = mysql_fetch_array($result_Cur,MYSQL_ASSOC)) {
	$thb = $row_c['thb'];
	$usd = $row_c['usd'];
}



function LoadCustomer($CusID){
	return mysql_query("SELECT * FROM v_customer  WHERE cusID = '$CusID' ");
}
$od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$GET_CUSID = nr_execute("SELECT cusID  FROM tb_order_detail WHERE od_no = '$od_no' and status_id NOT IN (11) ORDER BY od_no DESC LIMIT  1 ");

$result_Customer = LoadCustomer($GET_CUSID);
while($row_c = mysql_fetch_array($result_Customer,MYSQL_ASSOC)) {
	$cusName = $row_c['cusName'];
	$addr = $row_c['addr'];
	$tel = $row_c['tel'];
	$remark = $row_c['remark'];
	$districtName = $row_c['districtName'];
	$pronameln = $row_c['pronameln'];
}
