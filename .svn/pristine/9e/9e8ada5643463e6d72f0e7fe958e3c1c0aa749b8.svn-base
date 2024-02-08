<?php
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];

unset($_SESSION["EDPOSV1MADD_infoID"]);
unset($_SESSION["EDPOSV1MADD_Mid"]);
unset($_SESSION["EDPOSV1MADD_txtBarcode1"]);
unset($_SESSION["EDPOSV1MADD_txtBarcode2"]);
unset($_SESSION["EDPOSV1MADD_txtBarcode3"]);
unset($_SESSION["EDPOSV1MADD_txtm_name"]);
unset($_SESSION["EDPOSV1MADD_kf_id"]);
// unset($_SESSION["EDPOSV1MADD_txtprice1"]);	
// unset($_SESSION["EDPOSV1MADD_txtprice12"]);	
// unset($_SESSION["EDPOSV1MADD_txtprice2"]);
// unset($_SESSION["EDPOSV1MADD_txtprice22"]);	
// unset($_SESSION["EDPOSV1MADD_txtprice3"]);	
// unset($_SESSION["EDPOSV1MADD_txtprice32"]);	

unset($_SESSION["EDPOSV1MADD_status_id"]);
unset($_SESSION["EDPOSV1MADD_unit1"]);
unset($_SESSION["EDPOSV1MADD_unitNameQty1"]);
unset($_SESSION["EDPOSV1MADD_unit2"]);
unset($_SESSION["EDPOSV1MADD_unitNameQty2"]);
unset($_SESSION["EDPOSV1MADD_unit3"]);
unset($_SESSION["EDPOSV1MADD_unitNameQty3"]);
unset($_SESSION["EDPOSV1MADD_txtm_Remark"]);
unset($_SESSION["EDPOSV1MADD_txtm_Remark1"]);
unset($_SESSION["EDPOSV1MADD_txtm_Remark2"]);
unset($_SESSION["EDPOSV1MADD_min_stock"]);
unset($_SESSION["EDPOSV1MADD_minUnitID"]);
unset($_SESSION["EDPOSV1MADD_Ingredient"]);
unset($_SESSION["EDPOSV1MADD_mOpenStock"]);


if (isset($_POST['btnSaveProduct']) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) {
	$Mid = mysql_real_escape_string(stripslashes($_POST['id']));
	$txtBarcode1 = mysql_real_escape_string(stripslashes($_POST['txtBarcode1']));
	$txtBarcode2 = mysql_real_escape_string(stripslashes($_POST['txtBarcode2']));
	$txtBarcode3 = mysql_real_escape_string(stripslashes($_POST['txtBarcode3']));
	$txtm_name = mysql_real_escape_string(stripslashes($_POST['txtm_name']));
	$status_id = mysql_real_escape_string(stripslashes(trim($_POST['txtstatus_id'])));
	$unit1 = mysql_real_escape_string(stripslashes($_POST['unit1']));
	$unitNameQty1 =  str_replace(",", "", $_POST['unitNameQty1']);
	$unit2 = mysql_real_escape_string(stripslashes($_POST['unit2']));
	$unitNameQty2 = str_replace(",", "", $_POST['unitNameQty2']);
	$unit3 = mysql_real_escape_string(stripslashes($_POST['unit3']));
	$unitNameQty3 = str_replace(",", "", $_POST['unitNameQty3']);
	$txtm_Remark = mysql_real_escape_string(stripslashes(trim($_POST['txtm_Remark'])));
	$txtm_Remark1 = mysql_real_escape_string(stripslashes(trim($_POST['txtm_Remark1'])));
	$txtm_Remark2 = mysql_real_escape_string(stripslashes(trim($_POST['txtm_Remark2'])));
	$min_stock = str_replace(",", "", $_POST['min_stock']);
	$minUnitID = mysql_real_escape_string(stripslashes($_POST['minUnitID']));
	$cbIngredient = mysql_real_escape_string(stripslashes(trim($_POST['cbIngredient'])));
	$mOpenStock = mysql_real_escape_string(stripslashes(trim($_POST['mOpenStock'])));

	$kf_id = mysql_real_escape_string(stripslashes($_POST['kf_id']));
	$txtprice1 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice1'])));
	$txtprice12 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice12'])));
	$txtprice2 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice2'])));
	$txtprice22 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice22'])));
	$txtprice3 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice3'])));
	$txtprice32 = str_replace(",", "", mysql_real_escape_string(stripslashes($_POST['txtprice32'])));
	$infoID = mysql_real_escape_string(stripslashes($_POST['infoID']));
	$CurPrice1 = mysql_real_escape_string(stripslashes($_POST['CurPrice1']));
	$CurPrice2 = mysql_real_escape_string(stripslashes($_POST['CurPrice2']));
	$CurPrice3 = mysql_real_escape_string(stripslashes($_POST['CurPrice3']));

	$success = "";
	$exist = "";
	// chack it number only in textfield price
	// if (!is_numeric ($txtprice1)) {
	// 	$exist ="ລາຄາຂາຍ 1 ຂາບຍ່ອຍ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// } 
	// if (!is_numeric ($txtprice12)) {
	// 	$exist ="ລາຄາຂາຍ 1 ຂາຍຍົກ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// }

	// if (!is_numeric ($txtprice2) ) {
	// 	$exist .="ລາຄາຂາຍ 2 ຂາບຍ່ອຍ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// } 
	// if (!is_numeric ($txtprice22) ) {
	// 	$exist .="ລາຄາຂາຍ 2 ຂາຍຍົກ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// } 

	// if (!is_numeric ($txtprice3) ) {
	// 	$exist .="ລາຄາຂາຍ 3 ຂາບຍ່ອຍ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// } 

	// if (!is_numeric ($txtprice32) ) {
	// 	$exist .="ລາຄາຂາຍ 3 ຂາຍຍົກ ເປັນໄດ້ພຽງໂຕເລກເທົ່ານັ້ນ....!";	
	// } 	

	unset($_SESSION["EDPOSV1MADD_infoID"]);
	unset($_SESSION["EDPOSV1MADD_Mid"]);
	unset($_SESSION["EDPOSV1MADD_txtBarcode"]);
	unset($_SESSION["EDPOSV1MADD_txtm_name"]);
	unset($_SESSION["EDPOSV1MADD_kf_id"]);
	// unset($_SESSION["EDPOSV1MADD_txtprice1"]);	
	// unset($_SESSION["EDPOSV1MADD_txtprice12"]);	
	// unset($_SESSION["EDPOSV1MADD_txtprice2"]);
	// unset($_SESSION["EDPOSV1MADD_txtprice22"]);	
	// unset($_SESSION["EDPOSV1MADD_txtprice3"]);	
	// unset($_SESSION["EDPOSV1MADD_txtprice32"]);	

	unset($_SESSION["EDPOSV1MADD_status_id"]);
	unset($_SESSION["EDPOSV1MADD_unit1"]);
	unset($_SESSION["EDPOSV1MADD_unitNameQty1"]);
	unset($_SESSION["EDPOSV1MADD_unit2"]);
	unset($_SESSION["EDPOSV1MADD_unitNameQty2"]);
	unset($_SESSION["EDPOSV1MADD_unit3"]);
	unset($_SESSION["EDPOSV1MADD_unitNameQty3"]);
	unset($_SESSION["EDPOSV1MADD_txtm_Remark"]);
	unset($_SESSION["EDPOSV1MADD_txtm_Remark1"]);
	unset($_SESSION["EDPOSV1MADD_txtm_Remark2"]);
	unset($_SESSION["EDPOSV1MADD_min_stock"]);
	unset($_SESSION["EDPOSV1MADD_minUnitID"]);
	unset($_SESSION["EDPOSV1MADD_Ingredient"]);
	unset($_SESSION["EDPOSV1MADD_mOpenStock"]);
	unset($_SESSION["EDPOSV1MADD_cy_id1"]);
	unset($_SESSION["EDPOSV1MADD_cy_id2"]);
	unset($_SESSION["EDPOSV1MADD_cy_id3"]);



	$_SESSION["EDPOSV1MADD_Mid"] = $Mid;
	$_SESSION["EDPOSV1MADD_txtBarcode1"] = $txtBarcode1;
	$_SESSION["EDPOSV1MADD_txtBarcode2"] = $txtBarcode2;
	$_SESSION["EDPOSV1MADD_txtBarcode3"] = $txtBarcode3;
	$_SESSION["EDPOSV1MADD_txtm_name"] = $txtm_name;
	$_SESSION["EDPOSV1MADD_kf_id"] = $kf_id;


	// $_SESSION["EDPOSV1MADD_txtprice1"]=$txtprice1;	
	// $_SESSION["EDPOSV1MADD_txtprice12"]=$txtprice12;
	// $_SESSION["EDPOSV1MADD_txtprice2"]=$txtprice2;	
	// $_SESSION["EDPOSV1MADD_txtprice22"]=$txtprice22;
	// $_SESSION["EDPOSV1MADD_txtprice3"]=$txtprice3;	
	// $_SESSION["EDPOSV1MADD_txtprice32"]=$txtprice32;	
	$txtprice1 = 0;
	$txtprice12 = 0;
	$txtprice2 = 0;
	$txtprice22 = 0;
	$txtprice3 = 0;
	$txtprice32 = 0;

	$_SESSION["EDPOSV1MADD_status_id"] = $status_id;
	$_SESSION["EDPOSV1MADD_unit1"] = $unit1;
	$_SESSION["EDPOSV1MADD_unitNameQty1"] = $unitNameQty1;
	$_SESSION["EDPOSV1MADD_unit2"] = $unit2;
	$_SESSION["EDPOSV1MADD_unitNameQty2"] = $unitNameQty2;
	$_SESSION["EDPOSV1MADD_unit3"] = $unit3;
	$_SESSION["EDPOSV1MADD_unitNameQty3"] = $unitNameQty3;
	$_SESSION["EDPOSV1MADD_txtm_Remark"] = $txtm_Remark;
	$_SESSION["EDPOSV1MADD_txtm_Remark1"] = $txtm_Remark1;
	$_SESSION["EDPOSV1MADD_txtm_Remark2"] = $txtm_Remark2;
	$_SESSION["EDPOSV1MADD_min_stock"] = $min_stock;
	$_SESSION["EDPOSV1MADD_minUnitID"] = $minUnitID;
	$_SESSION["EDPOSV1MADD_Ingredient"] = $cbIngredient;
	$_SESSION["EDPOSV1MADD_mOpenStock"] = $mOpenStock;
	$_SESSION["EDPOSV1MADD_cy_id1"] = $CurPrice1;
	$_SESSION["EDPOSV1MADD_cy_id2"] = $CurPrice2;
	$_SESSION["EDPOSV1MADD_cy_id3"] = $CurPrice3;

	if ($txtprice1 > 0 && $txtprice12 == 0) {
		$txtprice12 = $txtprice1;
	}
	if ($txtprice2 > 0 && $txtprice22 == 0) {
		$txtprice22 = $txtprice2;
	}
	if ($txtprice3 > 0 && $txtprice32 == 0) {
		$txtprice32 = $txtprice3;
	}

	if ($txtprice1 > 0 && $txtBarcode1 == "") {
		$exist = "5.3 Barcode unit 3 empty ...!";
	}
	if ($txtprice2 > 0 && $txtBarcode2 == "") {
		$exist = "5.2 Barcode unit 2 empty ...!";
	}
	if ($txtprice3 > 0 && $txtBarcode3 == "") {
		$exist = "5.1 Barcode unit 1 empty ...!";
	}

	if ($exist == "") {
		$newItemName2 = $txtm_name . ' ' . $unit2;
		$newItemName3 = $txtm_name . ' ' . $unit1;
		if ($txtBarcode3 != '') {
			// if (mysql_num_rows(mysql_query("SELECT * FROM tb_material WHERE status_id IN (3) and (mBarcode = '$txtBarcode3' or materialName = '$txtm_name' ) and info_id='$infoID' ")) != 0) {
			// 	$exist = "1.1 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ ".$txtBarcode3." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			// } else { $exist =''; }
			// if (mysql_num_rows(mysql_query("SELECT * FROM tb_food_drink WHERE status_id IN (8) and (fd_Barcode = '$txtBarcode3' or fd_name = '$txtm_name' ) and  and info_id='$infoID' ")) != 0) {
			// 	$exist = "1.2 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ ".$txtBarcode3." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			// } else { $exist =''; }
			$query = "SELECT * FROM tb_food_drink_ WHERE status_id IN (8) and (fd_Barcode = '$txtBarcode3' or fd_name = '$txtm_name') and info_id='$infoID'";
			$result = mysql_query($query);

			if (!$result) {
				// There was an error executing the query
				$error = mysql_error();
				// handle the error appropriately
			} else {
				// Query executed successfully, get the number of rows
				$num_rows = mysql_num_rows($result);

				if ($num_rows != 0) {
					$exist = "1.2 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode3 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
				} else {
					$exist = '';
				}
			}
		}

		if ($txtBarcode2 != '') {
			if (mysql_num_rows(mysql_query("SELECT * FROM tb_material_ WHERE status_id IN (3) and (mBarcode = '$txtBarcode2' or materialName = '$newItemName2' ) and info_id='$infoID' ")) != 0) {
				$exist = "2.1 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode2 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			} else {
				$exist = '';
			}
			if (mysql_num_rows(mysql_query("SELECT * FROM tb_food_drink_ WHERE status_id IN (8) and (fd_Barcode = '$txtBarcode2' or fd_name = '$newItemName2' ) and  and info_id='$infoID' ")) != 0) {
				$exist = "2.2 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode2 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			} else {
				$exist = '';
			}
		}

		if ($txtBarcode1 != '') {
			if (mysql_num_rows(mysql_query("SELECT * FROM tb_material_ WHERE status_id IN (3) and (mBarcode = '$txtBarcode1' or materialName = '$newItemName3' ) and info_id='$infoID' ")) != 0) {
				$exist = "3.1 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode1 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			} else {
				$exist = '';
			}
			if (mysql_num_rows(mysql_query("SELECT * FROM tb_food_drink_ WHERE status_id IN (8) and (fd_Barcode = '$txtBarcode1' or fd_name = '$newItemName3' ) and  and info_id='$infoID' ")) != 0) {
				$exist = "3.2 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode1 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
			} else {
				$exist = '';
			}
		}

		if (mysql_num_rows(mysql_query("SELECT * FROM tb_material_ WHERE mBarcode = '$txtBarcode3' and status_id IN (3) and info_id='$infoID' ")) != 0) {
			$exist = "4.0 ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ " . $txtBarcode3 . " , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
		} else {
			$exist = '';
		}

		if ($exist == '' && $txtprice3 >= 0) {
			// insert to material
			sql_execute("INSERT INTO tb_material_(info_id, mBarcode, materialName, materialRemark, materialRemark1, materialRemark2, uname1, unitQty1,uname2, unitQty2, uname3, unitQty3,status_id,user_add,date_add,user_edit,date_edit, min_stock, kf_id, ingredient, mOpenStock) 
			VALUES('$infoID','$txtBarcode3', '$txtm_name', '$txtm_Remark', '$txtm_Remark1', '$txtm_Remark2', '$unit1', '$unitNameQty1','$unit2', '$unitNameQty2','$unit3', '$unitNameQty3', '3','$user_id',NOW(), 0,'0000-00-00 00:00:00','$min_stock', '$kf_id', '$cbIngredient','$mOpenStock') ");
			// GET material ID
			$GetMaxMaterialID = nr_execute("SELECT MAX(materialID) as materialID FROM tb_material_ WHERE info_id='$infoID'");
			// insert food list
			if ($cbIngredient != '1') {
				if ($txtprice1 >= 0) {
					$newItemName1 = $txtm_name . ' ' . $unit1;;
					sql_execute("INSERT INTO tb_food_drink_(info_id, kf_id, fd_Barcode, fd_name, detail1, detail2, detail3, price,photo,status_id,user_add,date_add,user_edit,date_edit) 
							VALUES('$infoID','$kf_id', '$txtBarcode1', '$newItemName1', '$txtm_Remark', '$txtm_Remark1', '$txtm_Remark2','0','$file_name','8','$user_id',NOW(), 0,'0000-00-00 00:00:00') ");
					// GET food ID
					$GetMaxFoodID = nr_execute("SELECT MAX(fd_id) AS fd_id FROM tb_food_drink_ WHERE info_id='$infoID'");
					// insert receipe
					sql_execute("INSERT INTO tb_recipe_(info_id, fd_id,materialID, recipeCapacity,remark,status_id,user_add,date_add,user_edit,date_edit, price, price2,price3, unitID, cy_id) 
						VALUES('$infoID','$GetMaxFoodID', '$GetMaxMaterialID', '$unitNameQty1','','3','$user_id',NOW(), 0,'0000-00-00 00:00:00', '$txtprice1','$txtprice12','0','1', '$CurPrice1' ) ");
				}
				if ($txtprice2 >= 0) {
					$newItemName2 = $txtm_name . ' ' . $unit2;
					sql_execute("INSERT INTO tb_food_drink_(info_id, kf_id, fd_Barcode, fd_name, detail1, detail2, detail3, price,photo,status_id,user_add,date_add,user_edit,date_edit) 
							VALUES('$infoID','$kf_id', '$txtBarcode2', '$newItemName2', '$txtm_Remark', '$txtm_Remark1', '$txtm_Remark2','0','$file_name','8','$user_id',NOW(), 0,'0000-00-00 00:00:00') ");
					// GET food ID
					$GetMaxFoodID = nr_execute("SELECT MAX(fd_id) AS fd_id FROM tb_food_drink_ WHERE info_id='$infoID'");
					// insert receipe
					sql_execute("INSERT INTO tb_recipe_(info_id, fd_id,materialID, recipeCapacity,remark,status_id,user_add,date_add,user_edit,date_edit, price, price2,price3, unitID, cy_id) 
				
						VALUES('$infoID','$GetMaxFoodID', '$GetMaxMaterialID', '$unitNameQty2','','3','$user_id',NOW(), 0,'0000-00-00 00:00:00', '$txtprice2','$txtprice22','0','2', '$CurPrice1' ) ");
				}
				if ($txtprice3 >= 0) {
					$newItemName3 = $txtm_name;
					sql_execute("INSERT INTO tb_food_drink_(info_id, kf_id, fd_Barcode, fd_name, detail1, detail2, detail3, price,photo,status_id,user_add,date_add,user_edit,date_edit) 
							VALUES('$infoID','$kf_id', '$txtBarcode3', '$newItemName3', '$txtm_Remark', '$txtm_Remark1', '$txtm_Remark2','0','$file_name','8','$user_id',NOW(), 0,'0000-00-00 00:00:00') ");
					// GET food ID
					$GetMaxFoodID = nr_execute("SELECT MAX(fd_id) AS fd_id FROM tb_food_drink_ WHERE info_id='$infoID'");
					// insert receipe
					sql_execute("INSERT INTO tb_recipe_(info_id, fd_id,materialID, recipeCapacity,remark,status_id,user_add,date_add,user_edit,date_edit, price, price2,price3, unitID, cy_id) 
						VALUES('$infoID','$GetMaxFoodID', '$GetMaxMaterialID', '$unitNameQty3','','3','$user_id',NOW(), 0,'0000-00-00 00:00:00', '$txtprice3','$txtprice32','0', '3', '$CurPrice1' ) ");
				}
			}


			$success = "ບັນທຶກຂໍ້ມູນສໍາເລັດແລ້ວ ";
			unset($_SESSION["EDPOSV1MADD_Mid"]);
			unset($_SESSION["EDPOSV1MADD_txtBarcode1"]);
			unset($_SESSION["EDPOSV1MADD_txtBarcode2"]);
			unset($_SESSION["EDPOSV1MADD_txtBarcode3"]);
			unset($_SESSION["EDPOSV1MADD_txtm_name"]);
			unset($_SESSION["EDPOSV1MADD_kf_id"]);
			// unset($_SESSION["EDPOSV1MADD_txtprice1"]);	
			// unset($_SESSION["EDPOSV1MADD_txtprice12"]);	
			// unset($_SESSION["EDPOSV1MADD_txtprice2"]);	
			// unset($_SESSION["EDPOSV1MADD_txtprice22"]);	
			// unset($_SESSION["EDPOSV1MADD_txtprice3"]);	
			// unset($_SESSION["EDPOSV1MADD_txtprice32"]);	

			unset($_SESSION["EDPOSV1MADD_status_id"]);
			unset($_SESSION["EDPOSV1MADD_unit1"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty1"]);
			unset($_SESSION["EDPOSV1MADD_unit2"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty2"]);
			unset($_SESSION["EDPOSV1MADD_unit3"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty3"]);
			unset($_SESSION["EDPOSV1MADD_txtm_Remark"]);
			unset($_SESSION["EDPOSV1MADD_txtm_Remark1"]);
			unset($_SESSION["EDPOSV1MADD_txtm_Remark2"]);
			unset($_SESSION["EDPOSV1MADD_min_stock"]);
			unset($_SESSION["EDPOSV1MADD_minUnitID"]);
			unset($_SESSION["EDPOSV1MADD_Ingredient"]);
			unset($_SESSION["EDPOSV1MADD_cy_id1"]);
			unset($_SESSION["EDPOSV1MADD_cy_id2"]);
			unset($_SESSION["EDPOSV1MADD_cy_id3"]);
		}
	}
}


$result = LoadPrice_setting($whereclause);
