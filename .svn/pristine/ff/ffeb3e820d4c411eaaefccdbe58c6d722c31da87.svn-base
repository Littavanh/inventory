<?php
include("../config.php");
session_start();
$user_add = $_SESSION['EDPOSV1user_id'];
$wherecause = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$bill_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
$Reprint = mysql_real_escape_string(stripslashes(base64_decode($_GET['print'])));

function Loadbill($od_no, $Reprint, $infoID) {	
	if ($Reprint == "1") {		
		return mysql_query(" SELECT CONCAT(fd_name,'|',remark) as fd_name1, fd_name,remark,SUM(qty) AS qty, price, (SUM(qty)*price) AS total, tb_name  
						FROM `v_service_detail` WHERE od_no = '$od_no' AND printNo=1 AND printTime=0 and info_id='$infoID' GROUP BY fd_name, price ");		
	} else if ($Reprint == "2") {
		return mysql_query(" SELECT CONCAT(fd_name,'|',remark) as fd_name1, fd_name,remark,SUM(qty) AS qty, price, (SUM(qty)*price) AS total, tb_name  
						FROM `v_service_detail` WHERE od_no = '$od_no' AND printNo=1  and info_id='$infoID' GROUP BY fd_name, price ");
	}

}
  
function getTableName($od_no, $infoID){	
	return mysql_query("SELECT tb_name, date_add FROM v_service_detail WHERE od_no = '$od_no' and info_id='$infoID' limit 1");
}


$result_tbName = getTableName($bill_id, $infoID);
while($row_tbName = mysql_fetch_array($result_tbName,MYSQL_ASSOC)) {
	$GetTbName = $row_tbName['tb_name'];
	$GetDateOrder = $row_tbName['date_add'];
}


function cur(){
	return mysql_query("SELECT * FROM tb_rate_setting  WHERE status_id = 1");
}

$result_Cur = cur();
while($row_c = mysql_fetch_array($result_Cur,MYSQL_ASSOC)) {
	$thb = $row_c['thb'];
	$usd = $row_c['usd'];
}

