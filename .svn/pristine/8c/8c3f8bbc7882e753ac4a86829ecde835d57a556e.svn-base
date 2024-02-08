<?php
$user_id = $_SESSION["EDPOSV1user_id"];

/*============== Update promotion expire date ==============*/
sql_execute("UPDATE tb_promotion SET status_id='3' 								
			WHERE info_id='$infoID' and status_id IN (1) and endDate < NOW() and  endDate <> '0000-00-00'   ");		
/*==========================================================*/
if (isset($_POST['type']) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$pro_id = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$txtprocode = mysql_real_escape_string(stripslashes($_POST['txtprocode'][$i]));	
		$txtproName = mysql_real_escape_string(stripslashes($_POST['txtproName'][$i]));				
		$txtproDescript = mysql_real_escape_string(stripslashes(trim($_POST['txtproDescript'][$i])));	
		$txtTypeid = mysql_real_escape_string(stripslashes($_POST['txtTypeid'][$i]));		 
		$infoID = mysql_real_escape_string(stripslashes($_POST['infoID'][$i]));		 			
		 
		$success = "";
		$exist = "";
		/*--------------------------------------------------------------*/		
		if ($_POST['txtprocode'][$i] != "") {	
		//******************************** add image ***************************												
			switch ($_POST['type'][$i]) {	
				case "added" :						 
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_promotion WHERE pro_code = '$txtprocode' and status_id IN (1,2,3) and info_id='$infoID' ")) == 0) {			
						sql_execute("INSERT INTO tb_promotion(info_id, pro_code, pro_name, pro_descript, type_id,status_id,user_add,date_add) 
										VALUES('$infoID', '$txtprocode', '$txtproName', '$txtproDescript', '$txtTypeid', '1','$user_id',NOW()) ");						
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					}  else {
						 $exist = " ບໍ່ສາມາດເພີ່ມໄດ້ເພາະວ່າ ".$txtm_name." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
					}
				break;
				case "edited":		
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_promotion WHERE pro_id = '$pro_id' and info_id='$infoID' ")) > 0) {												
						sql_execute("UPDATE tb_promotion SET info_id='$infoID', pro_code = '$txtprocode', pro_name='$txtproName', pro_descript='$txtproDescript', type_id='$txtTypeid'									
									WHERE pro_id = '$pro_id' and info_id='$infoID'  ");
						$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $txtprocode." ບໍ່ສາມາດປ່ຽນແປງໄດ້ , ເພາະຍັງເປີດນໍາໃຊ້ຢູ່ ...!";}
				break;
			}			
		}		
	}
}


if(isset($_GET["del_id"]) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4){	
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$GetInfoID = mysql_real_escape_string(stripslashes( ($_GET['infoid'])));

	$sql = "UPDATE tb_promotion SET status_id = 3, user_edit = '$user_id', date_edit = NOW() WHERE pro_id ='$id' and info_id='$GetInfoID' ";
	$result = mysql_query($sql, $conn);		
	if($result){		
		header("Location: ?d=promotion/list");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}
  

$result = LoadPrice_setting($whereclause);
