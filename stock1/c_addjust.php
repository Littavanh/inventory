<?php
$exist = "";
$success = "";
date_default_timezone_set("Asia/Vientiane");
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$user_id = $_SESSION["EDPOSV1user_id"];
lineManager($TokenKey, $user_id, $api_url);
$lineManagerId = $_SESSION['LineManagerId'];
if (isset($_POST["btnAddproduct"])) {
	// $remark = $_POST["txtRemark"];
	//  echo '<script>alert("'.$remark.'")</script>';
	if (isset($_POST['type'])) {

		$txtDateTran = mysql_real_escape_string(stripslashes($_POST['txtDateTran']));
		$_SESSION['EDPOSV1AddJustDate'] = $txtDateTran;
		$txtreciever = mysql_real_escape_string(stripslashes($_POST['txtreciever']));
		$_SESSION['EDPOSV1AddJustReciever'] = $txtreciever;
		$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark']));
		$_SESSION['EDPOSV1AddJustRemark'] = $txtRemark;

		$txt_release = mysql_real_escape_string(stripslashes($_POST['txt_Release']));
		$_SESSION['EDPOSV1AddJust_Release'] = $txt_release;
		$txt_sector = mysql_real_escape_string(stripslashes($_POST['txt_Sector']));
		$_SESSION['EDPOSV1AddJust_Sector'] = $txt_sector;

		$txtDateWant = mysql_real_escape_string(stripslashes($_POST['txtDateWant']));
		$_SESSION['EDPOSV1AddJustDateWant'] = $txtDateWant;
		$txtDateReturn = mysql_real_escape_string(stripslashes($_POST['txtDateReturn']));
		$_SESSION['EDPOSV1AddJustDateReturn'] = $txtDateReturn;
		$transferOutID = nr_execute("SELECT CONCAT (DATE_FORMAT(now(), '%Y%m%d'), RAND()*1000) as trantmp");


		$tmp_file_name1 = trim($_FILES["edit_fileUpload"]["tmp_name"]);

		if ($tmp_file_name1 != "") {
			$name1 = $_FILES["edit_fileUpload"]["name"];
			$ext1 = end((explode(".", $name1))); # extra () to prevent notice
			$file_name1 = date('YmdHis') . $user_id . "." . $ext1;
			
			$_SESSION['EDPOSV1AddProduct_BoFile'] = $file_name1;
			copy($_FILES["edit_fileUpload"]["tmp_name"], "dist/image/addjust/" . $file_name1);
		}
		$boFile = $_SESSION['EDPOSV1AddProduct_BoFile'];

		for ($i = 0; $i < count($_POST['type']); $i++) {
			$addInfoID = mysql_real_escape_string(stripslashes($_POST['addInfoID'][$i]));
			$txtmaterialID = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
			$txtmaterialName = mysql_real_escape_string(stripslashes($_POST['txtmaterialName'][$i]));

			$txtSqty1 = mysql_real_escape_string(stripslashes($_POST['txtSqty1'][$i]));
			$txtSqty2 = mysql_real_escape_string(stripslashes($_POST['txtSqty2'][$i]));
			$txtSqty3 = mysql_real_escape_string(stripslashes($_POST['txtSqty3'][$i]));
			$StockSumQTY = mysql_real_escape_string(stripslashes($_POST['txtStockQTY'][$i]));

			$txtcap1 = mysql_real_escape_string(stripslashes($_POST['txtcap1'][$i]));
			$txtcap2 = mysql_real_escape_string(stripslashes($_POST['txtcap2'][$i]));
			$txtcap3 = mysql_real_escape_string(stripslashes($_POST['txtcap3'][$i]));

			$txtQTY1 = mysql_real_escape_string(stripslashes($_POST['txtQTY1'][$i]));
			$txtQTY2 = mysql_real_escape_string(stripslashes($_POST['txtQTY2'][$i]));
			$txtQTY3 = mysql_real_escape_string(stripslashes($_POST['txtQTY3'][$i]));
			$txtunitname3 = mysql_real_escape_string(stripslashes($_POST['txtunitname3'][$i]));

			$TranType = mysql_real_escape_string(stripslashes(trim($_POST['TranType'][$i])));
			$txtExpDate = mysql_real_escape_string(stripslashes(trim($_POST['txtExpDate'][$i])));
			$txtpurPrice = mysql_real_escape_string(stripslashes(trim($_POST['txtPurPrice'][$i])));

			$tranID = mysql_real_escape_string(stripslashes(trim($_POST['tranID'][$i])));
			$txtexp_date = mysql_real_escape_string(stripslashes(trim($_POST['txtexp_date'][$i])));



			/*============== Caluletor ==============*/
			$AddJustSumQTY = ($txtcap1 * $txtQTY1) + ($txtcap2 * $txtQTY2) + ($txtcap3 * $txtQTY3);
			/*--------------------------------------------------------------*/


			printf($AddJustSumQTY > "0" && $TranType == '11');
			if (true) {
				// if ( $AddJustSumQTY > "0" && $TranType<'3') {	
				switch ($_POST['type'][$i]) {
					case "added":

						break;

					case "edited":

						if ($AddJustSumQTY <= $StockSumQTY) {

							sql_execute("INSERT INTO tb_transactiond_(info_id, tranID, date_tran, exp_date, materialID, unitQty3, tranType, user_add, date_add,status_id, 
						 Dremark, staffName,transferID, pur_price, sale_price,`release`,sector,cur_id,lot_no,
						 bill_no,bill_date,whouse_no,whouse_date,po_no,po_date,po_file,date_want,date_return) 
						select 	'$addInfoID', tranID, NOW(), exp_date, materialID, '-$AddJustSumQTY', '$TranType','$user_id',NOW() ,19, '$txtRemark', '$txtreciever', 
								'$transferOutID', pur_price, pur_price as sale_price,'$txt_release','$txt_sector',cur_id, lot_no, bill_no,bill_date,whouse,whouseDate,po_no,po_date,'$boFile','$txtDateWant','$txtDateReturn'
						from v_transaction_ WHERE info_id='$addInfoID' and materialID='$txtmaterialID' and active_id = 1  and exp_date='$txtExpDate' and pur_price='$txtpurPrice'  LIMIT 0,1");
							$success = " ລໍຖ້າຮັບສິນຄ້າເມື່ອກະກຽມສຳເລັດ ...!";

							//============= INSERT HEADER	
							// sql_execute("INSERT INTO tb_transactionh(tranID, traDate, reciever, remark, status_id, user_add, date_add, active_id, openID, supplierID, info_id, filename
							// VALUES()
							// ");

							sql_execute("INSERT INTO tb_export_(info_id, tranID, date_tran, exp_date, materialID, unitQty3, tranType, user_add, date_add,status_id, 
							Dremark, staffName,transferID, pur_price, sale_price,`release`,sector,cur_id,lot_no,
							bill_no,bill_date,whouse_no,whouse_date,po_no,po_date,approver,po_file,date_want,date_return,status_get_id) 
						   select 	'$addInfoID', tranID, NOW(), exp_date, materialID, '-$AddJustSumQTY', '$TranType','$user_id',NOW() ,1, '$txtRemark', '$txtreciever', 
								   '$transferOutID', pur_price, pur_price as sale_price,'$txt_release','$txt_sector',cur_id, lot_no, bill_no,bill_date,whouse,whouseDate,po_no,po_date,'2613','$boFile','$txtDateWant','$txtDateReturn',1
						   from v_transaction_ WHERE info_id='$addInfoID' and materialID='$txtmaterialID' and active_id = 1  and exp_date='$txtExpDate' and pur_price='$txtpurPrice'  LIMIT 0,1");
							$success = " ລໍຖ້າຮັບສິນຄ້າເມື່ອກະກຽມສຳເລັດ ...!";


							unset($_SESSION['EDPOSV1AddJustDate']);
							unset($_SESSION['EDPOSV1AddJustReciever']);
							unset($_SESSION['EDPOSV1AddJustRemark']);
							unset($_SESSION['EDPOSV1AddJust_Release']);
							unset($_SESSION['EDPOSV1AddJust_Sector']);


						} else {
							$exist .= $txtmaterialName . " ມີຈໍານວນໃນສາງ " . $StockSumQTY . $txtunitname3 . " ກະລຸນາກວດສອບຈໍານວນສິນຄ້າ ...!";
						}
						break;
				}
			} else if ($AddJustSumQTY > "0" && $TranType == '11') {
				switch ($_POST['type'][$i]) {
					case "added":

						break;

					case "edited":
						$CountTranMovement = nr_execute("SELECT COUNT(tranID) FROM v_transaction_ WHERE tranID='$tranID' and unitQty3>0 and materialID='$txtmaterialID' 
										and pur_price='$txtpurPrice' and exp_date='$txtexp_date' and info_id='$addInfoID' ");

						if ($AddJustSumQTY <= $StockSumQTY && $CountTranMovement == '1') {
							sql_execute("DELETE FROM tb_transactiond_   WHERE tranID='$tranID' and unitQty3>0 and materialID='$txtmaterialID' 
										and pur_price='$txtpurPrice' and exp_date='$txtexp_date' and info_id='$addInfoID' ");
							$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";

							unset($_SESSION['EDPOSV1AddJustDate']);
							unset($_SESSION['EDPOSV1AddJustReciever']);
							unset($_SESSION['EDPOSV1AddJustRemark']);

						} else {
							$exist .= $txtmaterialName . " ມີຈໍານວນໃນສາງ " . $StockSumQTY . $txtunitname3 . " ບໍ່ສາມາດບັນທຶກການສົ່ງອອກ ຈໍານວນ " . $AddJustSumQTY . $txtunitname3 . " ໄດ້, ກະລຸນາກວດສອບຈໍານວນສິນຄ້າ ...!, ຮັບຜິດພາດ";
						}
						break;
				}
			} else if ($AddJustSumQTY < "0") {
				$exist .= $txtmaterialName . " ມີຈໍານວນໃນສາງ " . $StockSumQTY . $txtunitname3 . " ບໍ່ສາມາດບັນທຶກການສົ່ງອອກ ຈໍານວນ" . $AddJustSumQTY . $txtunitname3 . " ໄດ້ ...!";
			}
		}
	}
}
$SumResult = SumMaterial($whereclause, $limitclause);