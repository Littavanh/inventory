<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <= 3  ) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$kf_id = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$kf_name = mysql_real_escape_string(stripslashes($_POST['txtkf_name'][$i]));		
		$infoID = mysql_real_escape_string(stripslashes($_POST['infoID'][$i]));		
		$txtviewOrder = mysql_real_escape_string(stripslashes($_POST['txtviewOrder'][$i]));
		$infoid_old = mysql_real_escape_string(stripslashes($_POST['infoid_old'][$i]));	
		
		/*--------------------------------------------------------------*/
		
		if ($_POST['txtkf_name'][$i] != ""  ) {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_kind_food WHERE kf_name = '$kf_name' and status_id = 3 and info_id='$infoID'")) == 0) {						
						
						sql_execute("INSERT INTO tb_kind_food(kf_name, status_id,user_add,date_add,user_edit,date_edit, info_id, viewOrder) 
										VALUES('$kf_name', '3','$user_id',NOW(), 0,'0000-00-00 00:00:00', '$infoID', '$txtviewOrder') ");
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else { $exist = $kf_name." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";}
				break;
					
				case "edited":							
					sql_execute(" UPDATE tb_kind_food SET kf_name = '$kf_name', info_id='$infoID',
								user_edit = '$user_id',date_edit=NOW(), edit_to = '$kf_name', viewOrder='$txtviewOrder' WHERE kf_id = '$kf_id' and  info_id='$infoid_old'" );
							$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
				break;
			}
		}
		
	}
}




if(isset($_GET["del_id"]) &&(($_SESSION['EDPOSV1role_id']) <= 3)){
	$info_idDel = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$sql = "UPDATE tb_kind_food SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE kf_id ='$id' and info_id='$info_idDel'";	 
	$result = mysql_query($sql, $conn);	

	$sql = "UPDATE tb_food_drink SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE kf_id ='$id' and info_id='$info_idDel'";	 
	$result = mysql_query($sql, $conn);	
	
	if($result){
		header("Location: ?d=manage/category&infoID=$info_idDel");	
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}

$result = LoadTable($whereclause);