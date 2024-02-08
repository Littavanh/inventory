<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] !=4) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$unitID = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$unitName = mysql_real_escape_string(stripslashes($_POST['txtunitName'][$i]));
		$infoID = mysql_real_escape_string(stripslashes($_POST['infoID'][$i]));
		
		/*--------------------------------------------------------------*/
		
		if ($_POST['txtunitName'][$i] != ""  ) {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_unit WHERE unitName = '$unitName' and status_id = 3")) == 0) {						
						sql_execute("INSERT INTO tb_unit(unitName, info_id, status_id,user_add,date_add,user_edit,date_edit) 
										VALUES('$unitName', '$infoID',  '3','$user_id',NOW(), 0,'0000-00-00 00:00:00') ");
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $unitName." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
				break;
					
				case "edited":		
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_unit WHERE unitID = '$unitID'  ")) > 0) {	
						if (mysql_num_rows(mysql_query("SELECT * FROM tb_unit WHERE unitName = '$unitName' and info_id='$infoID' and status_id = 3 ")) == 0) {							
						sql_execute(" UPDATE  tb_unit SET unitName='$unitName', info_id='$infoID',  user_add='$user_id',date_add=NOW() WHERE unitID = '$unitID' ");
						$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
						}  else { $exist = " ບໍ່ສາມາດປ່ຽນຊື່ໄດ້ເພາະວ່າ ".$unitName." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
					} else { $exist = $unitName." ບໍ່ສາມາດປ່ຽນແປງໄດ້ , ເພາະຍັງເປີດນໍາໃຊ້ຢູ່ ...!";}
				break;
			}
		}
		
	}
}




if(isset($_GET["del_id"]) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4){
	$info_idDel = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$sql = "UPDATE tb_unit SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE unitID ='$id' and info_id='$info_idDel' ";
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=stock/unit");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}


$result = LoadTable($whereclause);