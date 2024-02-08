<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];
if (isset($_POST['btnSaveStatus']) && $_SESSION['EDPOSV1role_id'] <=3) {
	$STID = mysql_real_escape_string(stripslashes($_POST['STID']));
	$ST_text = mysql_real_escape_string(stripslashes($_POST['ST_text']));
	$txtremark = mysql_real_escape_string(stripslashes($_POST['txtremark']));	

	sql_execute("INSERT INTO tb_approve(approveStatus, approveText, remark, user_add, date_add, info_id) 
					VALUES('$STID', '$ST_text','$txtremark','$user_id',NOW(), '$info_id') ");
	$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
}

$result = LoadTable($info_id);


$currentStatus = LoadCurentStatus($info_id);
while($row_cur = mysql_fetch_array($currentStatus, MYSQL_ASSOC)){
	$cur_appID = $row_cur['approveStatus'];
	$cur_text = $row_cur['approveText'];
	$cur_remark = $row_cur['remark'];
	$cur_date = $row_cur['date_add'];
	$cur_user = $row_cur['username'];
}


function LoadApproveST($cur_appID) {
	if ($cur_appID ==1) {
		$whereCur = 2;
		$whereText = 'ອະຍາດໃຫ້ສັ່ງ ຖ້າສິນຄ້າບໍ່ມີ';
	} else {
		$whereCur = 1;
		$whereText = 'ບໍອະນຸຍາດໃຫ້ສັ່ງ ຖ້າສິນຄ້າບໍ່ມີ';
	}
	return mysql_query("select '$whereCur' as approveStatus,  '$whereText' as approveText ");
}

$rs_ST = LoadApproveST($cur_appID);
while($row_ST = mysql_fetch_array($rs_ST, MYSQL_ASSOC)){
	$ST_appID = $row_ST['approveStatus'];
	$ST_text = $row_ST['approveText'];
	$ST_remark = $row_ST['remark'];
	$ST_date = $row_ST['date_add'];
	$ST_user = $row_ST['username'];
}
