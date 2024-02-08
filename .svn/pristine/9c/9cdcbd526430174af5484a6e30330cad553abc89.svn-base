<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$Get_infoID= $_SESSION['EDPOSV1info_id'];



if(isset($_POST["btnResetAll"]) && $_SESSION['EDPOSV1role_id'] <= '2'){ 			
	$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark']));
	$infoID = mysql_real_escape_string(stripslashes($_POST['infoID']));
	
	if ($infoID !='0') {
		//truncate all
		sql_execute(" DELETE FROM tb_approve WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_cash_drawer WHERE info_id ='$infoID'");						
		sql_execute(" DELETE FROM tb_cashdrawer_log WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_cashlog WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_food_drink WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_item_condition WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_item_premium WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_kind_food WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_material WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_opendate WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_opendate_d WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_order_detail WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_order_id WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_pay WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_payment WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_po WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_po_cashlog WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_preice_setting WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_price_cost WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_pro_con WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_promotion WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_rate_setting WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_recipe WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_tmp_report_view WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_tmp_report_view_y WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_topping WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_transactiond WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_transactionh WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tb_transection WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tmp_transaction WHERE info_id ='$infoID'");
		sql_execute(" DELETE FROM tmp_transactiond WHERE info_id ='$infoID'");

				//============== Insert log
		sql_execute(" INSERT INTO tb_reset (resetDate, remark, user_add, date_add, info_id) VALUES (NOW(), '$txtRemark', '$user_id', NOW(), '$infoID') ");

		sql_execute("insert into tb_material (materialID, info_id, kf_id, mBarcode, materialName, materialRemark, materialRemark1, materialRemark2, uname1, 
					unitQty1, uname2, unitQty2, uname3, unitQty3, min_stock, status_id, user_add, date_add, ingredient, mOpenStock, dbch)
					VALUES (1, '$infoID', 0, '', 'ຄ່າບໍລິການ', '', '', '', '', '', '', '', 'ຕັ້ງ', '1', '1', '3', '$user_id', NOW(), '0', '0', 1)");
		
		//
		sql_execute("INSERT INTO tb_approve(approveStatus, approveText, remark, user_add, date_add, info_id) 
					VALUES('2', 'ອະຍາດໃຫ້ສັ່ງ ຖ້າສິນຄ້າບໍ່ມີ','','$user_id',NOW(), '$infoID') ");	
	
		//
		sql_execute(" insert into tb_opendate (info_id, openDate, remark, remark_close, status_id, user_add, date_add, datetimeopen, dbch)
					VALUES('$infoID', NOW(), '','', 1,'$user_id',NOW(), NOW(),1 ) ");	
		$success = " ລຶບຂໍ້ມູນ ສໍາເລັດ";	
	}			
}
 

$result = LoadTable($Get_infoID, $limitclause);