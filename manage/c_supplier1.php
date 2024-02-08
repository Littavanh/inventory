<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <= 3  ) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$supplierID = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$txtSuppliername = mysql_real_escape_string(stripslashes($_POST['txtSuppliername'][$i]));
		$ContactName = mysql_real_escape_string(stripslashes($_POST['ContactName'][$i]));
		$txtTel = mysql_real_escape_string(stripslashes($_POST['txtTel'][$i]));
		$txtemail = mysql_real_escape_string(stripslashes($_POST['txtemail'][$i]));
		$txtAddr = mysql_real_escape_string(stripslashes($_POST['txtAddr'][$i]));
		$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark'][$i]));		
		
		/*--------------------------------------------------------------*/
		
		if ($txtSuppliername != "" &&  $ContactName!='' && $txtTel !='') {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_supplier_ WHERE (tel = '$txtTel' or supplierName='$txtSuppliername') and status_id =1 ")) == 0) {
						sql_execute("INSERT INTO tb_supplier_ (supplierName, ContactName, tel, addr, email, remark, status_id, user_add, date_add) 
										VALUES('$txtSuppliername', '$ContactName', '$txtTel', '$txtAddr', '$txtemail', '$txtRemark', '1', '$user_id', NOW()) ");
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $txtSuppliername." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
				break;
					
				case "edited":		
					//if (mysql_num_rows(mysql_query("SELECT * FROM tb_supplier WHERE (tel = '$txtTel' or supplierName='$txtSuppliername') and supplierID <>'$supplierID' ")) == 0) {
						sql_execute(" UPDATE tb_supplier_ SET supplierName = '$txtSuppliername', ContactName='$ContactName', tel='$txtTel', email='$txtemail',
									addr='$txtAddr', remark='$txtRemark'  WHERE supplierID = '$supplierID' " );
						$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					//} else { $exist = $txtTel." ບໍ່ສາມາດປ່ຽນແປງໄດ້ , ເພາະຍັງເປີດນໍາໃຊ້ຢູ່ ...!"; }
				break;
			}
		}
		
	}
}




if(isset($_GET["del_id"]) &&(($_SESSION['EDPOSV1role_id']) <= 3)){
	
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$sql = "UPDATE tb_supplier_ SET status_id = 20  WHERE supplierID ='$id'";
	echo $sql;
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=manage/supplier1");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}

$catcount = nr_execute("SELECT COUNT(*) FROM tb_supplier_ $whereclause");
$result = LoadSupplier($whereclause);