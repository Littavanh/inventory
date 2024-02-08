<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$Get_infoID= $_SESSION['EDPOSV1info_id'];

if (isset($_POST['btnsave']) && isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <= 3) {
	for ($i = 0; $i < count($_POST['type']); $i++) {
		$infoIDF = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$infoNo = mysql_real_escape_string(stripslashes($_POST['infoNo'][$i]));
		$info_name_s = mysql_real_escape_string(stripslashes($_POST['info_name'][$i]));
		$info_tel_s = mysql_real_escape_string(stripslashes($_POST['info_tel'][$i]));


		$info_name = mysql_real_escape_string(stripslashes($_POST['txtinfo_name'][$i]));
		$info_addr = mysql_real_escape_string(stripslashes($_POST['txtinfo_addr'][$i])); 
		$info_tel = mysql_real_escape_string(stripslashes(trim($_POST['txtinfo_tel'][$i]))); 
		$info_owner = mysql_real_escape_string(stripslashes(trim($_POST['txtinfo_owner'][$i])));
	 
		$printReceive = "1";
		$saveInfoCus = "1";
		$maxInfoID = nr_execute("SELECT MAX(info_id)+1 as maxInfoID FROM tb_info ");
		 
		/*--------------------------------------------------------------*/
		
		if ($_POST['txtinfo_name'][$i] != "" && $_POST['txtinfo_tel'][$i] !="") {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_info WHERE info_name = '$info_name' and info_tel='$info_tel' and status_id IN (1) ")) == 0) {	
						sql_execute("insert into tb_info (info_id, info_name, info_addr, info_tel, info_owner, bill_no, 
									bill_date, printReceive, saveInfoCus, status_id, dbch, regNo,  info_logo, exp_num, shopType)
									SELECT '$maxInfoID', '$info_name', '$info_addr', '$info_tel', '$info_owner', 100, NOW(), '$printReceive', '$saveInfoCus', 1,1, regNo,  info_logo,1,1
									FROM tb_info WHERE info_id='$Get_infoID' ");
						/* insert material */
						$maxInfoID_new = nr_execute("SELECT MAX(info_id) as maxInfoID FROM tb_info ");
						sql_execute("insert into tb_material (materialID, info_id, kf_id, mBarcode, materialName, materialRemark, materialRemark1, materialRemark2, 
									unitQty1,  unitQty2,  unitQty3, min_stock,  status_id, user_add, date_add, ingredient, mOpenStock, dbch)
									SELECT 	materialID, '$maxInfoID_new', kf_id, mBarcode, materialName, materialRemark, materialRemark1, materialRemark2,  
										unitQty1,  unitQty2,  unitQty3, min_stock,  status_id, '$user_id', NOW(), ingredient, mOpenStock, 1
									FROM 	tb_material WHERE info_id='$Get_infoID' and materialID = 1");
						/* insert unit */
						sql_execute("insert into tb_day_leave (info_id, dayleave_amount, dayleave_remark, user_add, date_add)
									VALUES ('$maxInfoID_new', '14', '', '$user_id', NOW())");

						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
						 
					} else { $exist = $info_name_s.', ເບີໂທ:'.$info_tel_s." ມີໃນຖານຂໍ້ມູນແລ້ວ, ບໍ່ສາມາດເພີ່ມລາຍການໄດ້ ...!";}
				break;
					
				case "edited":		
					//if (mysql_num_rows(mysql_query("SELECT * FROM tb_table WHERE tb_id = '$tb_id' and status_id IN (1,2) ")) > 0) {	
					//	if (mysql_num_rows(mysql_query("SELECT * FROM tb_table WHERE tb_id <> '$tb_id' and tb_name = '$tb_name' and status_id IN (1,2) ")) == 0) {						
					/*	sql_execute(" UPDATE tb_pay SET paymentID='$paymentID', pay_amount='$txtPayAmount', pay_date='$txtpayDate',  
									 remark='$txtremark', status_id='6', user_add='$user_id', date_add=NOW()
										WHERE payID = '$payID' " );
						*/
						sql_execute("UPDATE tb_info SET info_name='$info_name', info_addr='$info_addr', info_tel='$info_tel', info_owner='$info_owner', 
									printReceive='$printReceive', saveInfoCus='$saveInfoCus', dbch=1 
									WHERE info_id='$infoIDF' ");

						$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					//	}  else { $exist = " ບໍ່ສາມາດປ່ຽນຊື່ໄດ້ເພາະວ່າ ".$tb_name." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
					//} else { $exist = $tb_name." ບໍ່ສາມາດປ່ຽນແປງໄດ້ , ເພາະຍັງເປີດນໍາໃຊ້ຢູ່ ...!";}
				break;
			}
		}
		
	}
}

$result = LoadTable($whereclause);

if(isset($_POST["btnsave_image"]) && $_SESSION['EDPOSV1role_id'] <=3){
	if(trim($_FILES["edit_fileUpload"]["tmp_name"]) != "")
	{
		$file_name = date('Ymd').$_FILES["edit_fileUpload"]["name"]; 
		copy($_FILES["edit_fileUpload"]["tmp_name"],"logo/".$file_name);
		$_SESSION['EDPOSV1show_image_name'] = $file_name;
		sql_execute("UPDATE tb_info SET info_logo = '$file_name'  WHERE  info_id = '".$_SESSION['EDPOSV1show_food_id']."' ");
	/*
	unset($_SESSION['EDPOSV1show_image']);	
	unset($_SESSION['EDPOSV1show_image_name']);
	unset($_SESSION['EDPOSV1show_food_name']);
	unset($_SESSION['EDPOSV1show_food_id']);
	*/
	
//	header("Location: ?d=manage/price_setting");
	}	
}

if(isset($_POST["btnDel_image"]) && $_SESSION['EDPOSV1role_id'] <=3 ){	
	unlink("logo/".$_SESSION['EDPOSV1show_image_name']);
	sql_execute("UPDATE tb_info SET info_logo = ''  WHERE  info_id = '".$_SESSION['EDPOSV1show_info_id']."' ");
	unset($_SESSION['EDPOSV1show_logo']);	
	unset($_SESSION['EDPOSV1show_image_name']);
	unset($_SESSION['EDPOSV1show_info_name']);
	unset($_SESSION['EDPOSV1show_info_id']);
}


if(isset($_GET["del_id"]) && $_SESSION['EDPOSV1role_id'] <= 3 ){

	//$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	//$id = substr($id, 0, strlen($id)-11);
	$id = mysql_real_escape_string(stripslashes( $_GET['del_id']));
	$sql = "UPDATE tb_info SET status_id = 20  WHERE info_id ='$id'";
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=manage/info_list");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}
 

 if(isset($_GET["show_logo"]) && $_GET['show_logo'] == 'true' && $_SESSION['EDPOSV1role_id'] <=3){
	$_SESSION['EDPOSV1show_logo'] = "show_logo"; 
	$_SESSION['EDPOSV1show_image_name'] = $_GET['image'];
	$_SESSION['EDPOSV1show_info_name'] = $_GET['info_name'];
	$_SESSION['EDPOSV1show_info_id'] = $_GET['info_id'];
	//header("Location: ?d=manage/info_list");
}

if(isset($_POST["btncancel_logo"]) && $_SESSION['EDPOSV1role_id'] <=3){
	unset($_SESSION['EDPOSV1show_logo']);	
	unset($_SESSION['EDPOSV1show_image_name']);
	unset($_SESSION['EDPOSV1show_info_name']);
	unset($_SESSION['EDPOSV1show_info_id']);
	header("Location: ?d=manage/info_list");
}