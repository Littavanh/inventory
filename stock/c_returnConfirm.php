<?php



$user_id = $_SESSION["EDPOSV1user_id"];



function loadApprovalSetting($approve_level, $status_approve_id)
{
	return mysql_query("select * from tb_approval_setting where approve_level ='$approve_level' and status_approve_id = '$status_approve_id'");
}




if (isset($_GET["approve"])) {
	$transferID = $_GET["approve"];

	$load = mysql_query("select * from tb_export where `transferID` ='$transferID'");

	while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {
		$approve_level = $row['approve_level_return'];
		$approve_level_as=$row['approve_level_return'] + 1;
		$status_approve_id = $row['status_get_id'];
		// echo '<script>alert("'.$approve_level.'")</script>';
		$check = loadApprovalSetting($approve_level_as, $status_approve_id);

		while ($rowcheck = mysql_fetch_array($check, MYSQL_ASSOC)) {


			$row_userId = $rowcheck['userId'];
			// echo '<script>alert("'.$row_userId.'")</script>';
		}

		$checkMax = mysql_query("select max(approve_level) from tb_approval_setting where status_approve_id = '$status_approve_id'");
		while ($rowcheckMax = mysql_fetch_array($checkMax, MYSQL_ASSOC)) {

			$maxLevel = $rowcheckMax['max(approve_level)'];
			// echo '<script>alert("MaxLevel:'.$maxLevel.'")</script>';
		}

		if ($maxLevel == $approve_level) {
			// echo '<script>alert("MaxLevel=approve_level")</script>';
			sql_execute("UPDATE tb_export SET status_get_id='6' WHERE `transferID`='$transferID'");
			sql_execute("INSERT INTO tb_approve_history (transferID,approve_level,user_id,remark,user_add,date_add,status_approve_id) VALUES ('$transferID','$approve_level','$user_id','return','$user_id',NOW(),'$status_approve_id')");
			// sql_execute("UPDATE tb_transactiond SET status_id='1' WHERE `transferID`='$transferID'");

		} else if ($maxLevel > $approve_level) {
			// echo '<script>alert("MaxLevel>approve_level")</script>';
			sql_execute("UPDATE tb_export SET approve_level_return=$approve_level + 1,return_approver='$row_userId' WHERE `transferID`='$transferID'");

			sql_execute("INSERT INTO tb_approve_history (transferID,approve_level,user_id,remark,user_add,date_add,status_approve_id) VALUES ('$transferID','$approve_level','$user_id','return','$user_id',NOW(),'$status_approve_id')");
			
		}

	}
	
	// sql_execute("UPDATE tb_export SET status_get_id=6 WHERE `transferID`='$transferID'");



}
if (isset($_POST["btnSave"])) {
    $transferID = $_POST['txtTranID'];
    $remarkReject = $_POST['txtRemarkReject'];
	sql_execute("UPDATE tb_export SET status_get_id='8',remark_reject='$remarkReject' WHERE `transferID`='$transferID'");
}
?>