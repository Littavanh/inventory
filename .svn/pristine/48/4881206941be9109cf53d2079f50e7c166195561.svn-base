<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <= 3  ) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$txtCusID = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$txtCusName = mysql_real_escape_string(stripslashes($_POST['txtCusName'][$i]));
		$txtTel = mysql_real_escape_string(stripslashes($_POST['txtTel'][$i]));
		$txtAddr = mysql_real_escape_string(stripslashes($_POST['txtAddr'][$i]));
		$txtProID = mysql_real_escape_string(stripslashes($_POST['txtProID'][$i]));
		$districtID = mysql_real_escape_string(stripslashes($_POST['districtID'][$i]));
		$txtDueDate = mysql_real_escape_string(stripslashes($_POST['txtDueDate'][$i]));
		$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark'][$i]));
		
		
		/*--------------------------------------------------------------*/
		
		if ($txtCusName != "" &&  $txtTel !='') {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_customer WHERE tel = '$txtTel' and status_id =1 ")) == 0) {						
						sql_execute("INSERT INTO tb_customer(cusName, addr, districtID, tel, remark, dueDate, status_id, user_add, date_date) 
										VALUES('$txtCusName', '$txtAddr','$districtID','$txtTel','$txtRemark','$txtDueDate','1', '$user_id',NOW()) ");
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $txtCusName." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
				break;
				case "edited":		
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_customer WHERE tel = '$txtTel' and cusID <>'$txtCusID' ")) == 0) {
						sql_execute(" UPDATE tb_customer SET cusName = '$txtCusName', addr='$txtAddr', districtID='$districtID', tel='$txtTel', remark='$txtRemark', 
									dueDate='$txtDueDate'  WHERE cusID = '$txtCusID' " );
							$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $txtTel." ບໍ່ສາມາດປ່ຽນແປງໄດ້ , ເພາະຍັງເປີດນໍາໃຊ້ຢູ່ ...!"; }




				break;
			}
		}
		
	}
}




if(isset($_GET["del_id"]) &&(($_SESSION['EDPOSV1role_id']) <= 3)){
	
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$sql = "UPDATE tb_customer SET status_id = 20  WHERE cusID ='$id'";
	echo $sql;
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=manage/custome");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}

$catcount = nr_execute("SELECT COUNT(*) FROM v_customer $whereclause");
$result = LoadCusTomer($whereclause);