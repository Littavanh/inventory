<?php
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <=3) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$fd_id = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$kf_id = mysql_real_escape_string(stripslashes($_POST['kf_id'][$i]));		
		$txtBarcode = mysql_real_escape_string(stripslashes($_POST['txtBarcode'][$i]));
		$fd_name = mysql_real_escape_string(stripslashes($_POST['txtfd_name'][$i]));
		$txtdetail1 = mysql_real_escape_string(stripslashes($_POST['txtdetail1'][$i]));
		$txtdetail2 = mysql_real_escape_string(stripslashes($_POST['txtdetail2'][$i]));
		$txtdetail3 = mysql_real_escape_string(stripslashes($_POST['txtdetail3'][$i]));
		$status_id = mysql_real_escape_string(stripslashes(trim($_POST['txtstatus_id'][$i])));	
		$GetInfoID = mysql_real_escape_string(stripslashes(trim($_POST['infoidSet'][$i])));		
		$price = str_replace(",","",$_POST['txtprice'][$i]); 
		$success = "";
		$exist = "";
		$tmp_file_name = trim($_FILES["fileUpload"]["tmp_name"][$i]);
		$whereBacode = "";
		if ($txtBarcode != '') {
			$whereBacode = " WHERE fd_Barcode = '$txtBarcode' and status_id IN (8,9) and info_id='$GetInfoID'";
		} else {
			$whereBacode = " WHERE fd_Barcode = 'UUOKUHYNTGHF32432432432457658790RFFTGDSDIs80934kjdj34oidfds' and status_id IN (8,9) and info_id='$GetInfoID'";
		}
		/*--------------------------------------------------------------*/		
		if ($_POST['txtfd_name'][$i] != "" ) {	
	//******************************** add image ***************************								
				if($tmp_file_name != "") { 
						$file_name = date('Ymd').$_FILES["fileUpload"]["name"][$i]; 
						copy($_FILES["fileUpload"]["tmp_name"][$i],"photos/".$file_name);
					}
			switch ($_POST['type'][$i]) {	
				case "added" :	

					if (mysql_num_rows(mysql_query("SELECT * FROM tb_food_drink  $whereBacode ")) == 0) {
						if (mysql_num_rows(mysql_query("SELECT * FROM tb_food_drink WHERE fd_name = '$fd_name' and status_id IN (8,9) and info_id='$GetInfoID' ")) == 0) {			
							sql_execute("INSERT INTO tb_food_drink(kf_id, fd_Barcode, fd_name, detail1, detail2, detail3, price,photo,status_id,user_add,date_add,user_edit,date_edit, info_id) 
											VALUES('$kf_id', '$txtBarcode', '$fd_name', '$txtdetail1', '$txtdetail2', '$txtdetail3', '$price','$file_name', '8','$user_id',NOW(), 0,'0000-00-00 00:00:00', '$GetInfoID') ");
							$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
						} else { $exist = $fd_name." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!"; unlink("photos/".$file_name);}
					} else {
						 $exist = " ລະຫັດ Barcode: ".$txtBarcode." ມີໃນຖານຂໍ້ມູນແລ້ວ...!"; unlink("photos/".$file_name);
					}					
				break;
				case "edited":	
					if ($txtBarcode != '') {
						$GetFDID_DB = nr_execute("SELECT fd_id FROM tb_food_drink  $whereBacode  ");
						if ($GetFDID_DB == $fd_id || $GetFDID_DB == '') {
							$GetFDID_DB = nr_execute("SELECT fd_id FROM tb_food_drink  WHERE fd_name = '$fd_name' and status_id IN (8,9) and info_id='$GetInfoID' ");	
							if ($GetFDID_DB != $fd_id) {
								
								sql_execute(" UPDATE tb_food_drink SET kf_id='$kf_id', fd_Barcode='$txtBarcode', fd_name='$fd_name', 
												detail1 = '$txtdetail1', detail2='$txtdetail2', detail3='$txtdetail3',
												price='$price', user_edit = '$user_id', date_edit=NOW()   WHERE fd_id = '$fd_id' " );

								$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
							} else {
								$exist = " ບໍ່ສາມາດປ່ຽນຊື່ໄດ້ເພາະວ່າ ".$fd_name." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
							}

						} else {
							 $exist = " ລະຫັດ Barcode: ".$txtBarcode." ມີໃນຖານຂໍ້ມູນແລ້ວ...!";							 
						}
					} 	else {
						$GetFDID_DB = nr_execute("SELECT fd_id FROM tb_food_drink  WHERE fd_name = '$fd_name' and status_id IN (8,9) and info_id='$GetInfoID' ");
						if ($GetFDID_DB != $fd_id) {
								sql_execute(" UPDATE tb_food_drink SET kf_id='$kf_id', fd_Barcode='$txtBarcode', fd_name='$fd_name', price='$price', user_edit = '$user_id',detail1 = '$txtdetail1', detail2='$txtdetail2', detail3='$txtdetail3',
												date_edit=NOW()   WHERE fd_id = '$fd_id' " );
								$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
						} else {
							$exist = " ບໍ່ສາມາດປ່ຽນຊື່ໄດ້ເພາະວ່າ ".$fd_name." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
						}
					}
				break;
			}			
		}		
	}
}


if(isset($_GET["del_id"]) && $_SESSION['EDPOSV1role_id'] <=3){
	$info_idDel = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$image_name = base64_decode($_GET['image']);
	$kf_id = $_GET['kf_id'];
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);

	$sql = "UPDATE tb_food_drink SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE fd_id ='$id' and info_id='$info_idDel'";
	$result = mysql_query($sql, $conn);	
	if($result){
		unlink("photos/".$image_name);
		header("Location: ?d=manage/price_setting&kf_id=$kf_id");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}

if(isset($_GET["show_image"]) && $_GET['show_image'] == 'true' && $_SESSION['EDPOSV1role_id'] <=3){
	$_SESSION['EDPOSV1show_image'] = "show_image"; 
	$_SESSION['EDPOSV1show_image_name'] = $_GET['image'];
	$_SESSION['EDPOSV1show_food_name'] = $_GET['menu_name'];
	$_SESSION['EDPOSV1show_food_id'] = $_GET['menu_no'];
	header("Location: ?d=manage/price_setting");
}

if(isset($_POST["btnsave_image"]) && $_SESSION['EDPOSV1role_id'] <=3){
	if(trim($_FILES["edit_fileUpload"]["tmp_name"]) != "")
	{
		$file_name = date('Ymd').$_FILES["edit_fileUpload"]["name"]; 
		copy($_FILES["edit_fileUpload"]["tmp_name"],"photos/".$file_name);
		$_SESSION['EDPOSV1show_image_name'] = $file_name;
		sql_execute("UPDATE tb_food_drink SET photo = '$file_name'  WHERE  fd_id = '".$_SESSION['EDPOSV1show_food_id']."' ");
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
	unlink("photos/".$_SESSION['EDPOSV1show_image_name']);
	sql_execute("UPDATE tb_food_drink SET photo = ''  WHERE  fd_id = '".$_SESSION['EDPOSV1show_food_id']."' ");
	unset($_SESSION['EDPOSV1show_image']);	
	unset($_SESSION['EDPOSV1show_image_name']);
	unset($_SESSION['EDPOSV1show_food_name']);
	unset($_SESSION['EDPOSV1show_food_id']);
}

if(isset($_POST["btncancel"]) && $_SESSION['EDPOSV1role_id'] <=3){
	unset($_SESSION['EDPOSV1show_image']);	
	unset($_SESSION['EDPOSV1show_image_name']);
	unset($_SESSION['EDPOSV1show_food_name']);
	unset($_SESSION['EDPOSV1show_food_id']);
	header("Location: ?d=manage/price_setting");
}

$result = LoadPrice_setting($whereclause, $limitclause);