<?php
include("../config.php");
include("../function_sel.php");
session_start();
$user_add = $_SESSION['EDPOSV1user_id'];
$leaveID = mysql_real_escape_string(stripslashes($_GET['leaveID']));
$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));


$getInfoName = encrypt_decrypt('decrypt',nr_execute("SELECT  info_name  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoAddr = encrypt_decrypt('decrypt',nr_execute("SELECT  info_addr  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoTel = encrypt_decrypt('decrypt',nr_execute("SELECT  info_tel  FROM tb_info WHERE info_id = '$infoID' "));


function Loadbill($leaveID, $infoID){	
	return mysql_query(" SELECT * FROM tb_leave WHERE leaveID = '$leaveID' and info_id='$infoID' ");
}
 

$result_leave = Loadbill($leaveID, $infoID);
while($row = mysql_fetch_array($result_leave,MYSQL_ASSOC)) {
	$leave_no = $row['leave_no'];
	$cus_name = $row['cus_name'];
	$cus_tel = $row['cus_tel'];
	$date_leave = $row['date_leave'];
	$date_expire = $row['date_expire'];
	$item_name = $row['item_name'];
	$l_item_Qty = $row['l_item_Qty'];
	$l_user_add = $row['user_add'];

}

