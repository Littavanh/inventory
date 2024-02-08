<?php

date_default_timezone_set("Asia/Vientiane");

$user_id = $_SESSION["EDPOSV1user_id"];


if (isset($_POST["btnSave"])) {
	$cb_status = mysql_real_escape_string(stripslashes($_POST['cb_status']));
	$txtDateGet = mysql_real_escape_string(stripslashes($_POST['txtDateGet']));
	$transferID = mysql_real_escape_string(stripslashes($_POST['txt_transferID']));

	$tmp_file_name1 = trim($_FILES["edit_fileUpload"]["tmp_name"]);
	if ($cb_status == 3) {
		if ($tmp_file_name1 != "") {

			$name1 = $_FILES["edit_fileUpload"]["name"];
			$ext1 = end((explode(".", $name1))); # extra () to prevent notice
			$file_name1 = date('YmdHis') . $user_id . "." . $ext1;
			copy($_FILES["edit_fileUpload"]["tmp_name"], "dist/image/addjust/" . $file_name1);

			sql_execute("UPDATE tb_export_ SET status_get_id='$cb_status',date_get='$txtDateGet',user_add2='$user_id',po_file='$file_name1' WHERE `transferID`='$transferID'");
			sql_execute("UPDATE tb_transactiond_ SET status_id='1' WHERE `transferID`='$transferID'");
		} else {
			echo '<script>alert("ກະລຸນາແນບໄຟລເອກະສານ")</script>';



		}
	} else {
		// $name1 = $_FILES["edit_fileUpload"]["name"];
		// $ext1 = end((explode(".", $name1))); # extra () to prevent notice
		// $file_name1 = date('YmdHis') . $user_id . "." . $ext1;
		// copy($_FILES["edit_fileUpload"]["tmp_name"], "dist/image/addjust/" . $file_name1);
		sql_execute("UPDATE tb_export_ SET status_get_id='$cb_status',date_get='$txtDateGet',user_add2='$user_id' WHERE `transferID`='$transferID'");
	}

}
if (isset($_POST["btnReject"])) {
	$transferID = $_POST['txt_transferID'];
	$remarkReject = $_POST['txtRemarkReject'];

	sql_execute("UPDATE tb_export_ SET status_get_id='8',remark_reject='$remarkReject' WHERE `transferID`='$transferID'");


}
?>