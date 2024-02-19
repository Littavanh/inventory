<?php


$user_id = $_SESSION["EDPOSV1user_id"];

if (isset($_POST["btnSave"])) {
	$cb_status = mysql_real_escape_string(stripslashes($_POST['cb_status']));

	$transferID = mysql_real_escape_string(stripslashes($_POST['txt_transferID']));

	$tmp_file_name1 = trim($_FILES["edit_fileUpload"]["tmp_name"]);

	if ($tmp_file_name1 != "") {
		$name1 = $_FILES["edit_fileUpload"]["name"];
		$ext1 = end((explode(".", $name1))); # extra () to prevent notice
		$file_name1 = date('YmdHis') . $user_id . "." . $ext1;
		copy($_FILES["edit_fileUpload"]["tmp_name"], "dist/image/addjust/" . $file_name1);
		sql_execute("UPDATE tb_export SET status_get_id='$cb_status',po_file_return='$file_name1',date_return3=NOW(),user_add_return='$user_id' WHERE `transferID`='$transferID'");


		sql_execute("INSERT INTO tb_transactiond(tranID, date_tran, exp_date, materialID, unitQty3, tranType, user_add, date_add,status_id, 
        staffName, Dremark, pur_price,sale_price, receive_dis, location_addr, info_id,
        bill_no, bill_date, whouse_no, whouse_date, po_no, po_date, cur_id, lot_no,po_file) 
    select 	tranID, NOW(), exp_date, materialID, qty_return, 20, user_add2, NOW(),status_id, 
        approve_name, 'ຮັບສິນຄ້າເຂົ້າສາງຈາກການສົ່ງຄືນ', pur_price,sale_price, receive_dis, location_addr, info_id,
        bill_no, bill_date, whouse_no, whouse_date, po_no, po_date, cur_id, lot_no,po_file_return
    from v_export WHERE `transferID`='$transferID'");
	} else {
		echo '<script>alert("ກະລຸນາແນບໄຟລເອກະສານ")</script>';
	}


}
?>