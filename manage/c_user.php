<?php
//include_once("config.php");
$exist = "";
if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] <= 2) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		$user_id_form = mysql_real_escape_string(stripslashes($_POST['user_id_form'][$i])); 
		$username_form = mysql_real_escape_string(stripslashes(trim($_POST['username_form'][$i])));		
		$password_form = md5('123456505uK5@v@y'.$username_form);
		$first_name_form = mysql_real_escape_string(stripslashes(trim($_POST['first_name_form'][$i])));
		$last_name_form = mysql_real_escape_string(stripslashes(trim($_POST['last_name_form'][$i])));
		$role_id_form = mysql_real_escape_string(stripslashes(trim($_POST['role_id_form'][$i])));
		$pricesaleID = mysql_real_escape_string(stripslashes(trim($_POST['pricesaleID'][$i])));
		$infoIDSel = mysql_real_escape_string(stripslashes(trim($_POST['infoIDSel'][$i])));
		$success = "";
		$exist = "";
		/*--------------------------------------------------------------*/
		
		if ($_POST['username_form'][$i] != "" && $_POST['first_name_form'][$i] != ""  && $_POST['last_name_form'][$i] != "" && $_POST['role_id_form'][$i] != "" ) {	
			switch ($_POST['type'][$i]) {	
				case "added" :	
					if (mysql_num_rows(mysql_query("SELECT * FROM tb_user WHERE username = '$username_form' and status_id = 3")) == 0) {
						sql_execute("INSERT INTO tb_user(info_id, status_id,username,password,role_id, first_name,last_name,pricesaleID) 
						VALUES('$infoIDSel', 3,'$username_form', '$password_form', '$role_id_form', '$first_name_form', '$last_name_form','$pricesaleID') ");
						$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else {$exist = $username_form." ມີໃນຖານຂໍ້ມູນແລ້ວ ...!"; }
				break;
					
				case "edited":		
					$GetUserID_DB = nr_execute("SELECT user_id FROM tb_user  WHERE username = '$username_form' and status_id IN (3) ");
					if ($GetUserID_DB == $user_id_form || $GetUserID_DB == '') {
						sql_execute("UPDATE tb_user SET info_id='$infoIDSel', username = '$username_form', password = '$password_form', role_id = '$role_id_form', 
									first_name = '$first_name_form',last_name = '$last_name_form', pricesaleID='$pricesaleID'   WHERE user_id = '$user_id_form'");
							$success = " ແກ້ໄຂຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					} else {
						$exist = " ບໍ່ສາມາດປ່ຽນຊື່ໄດ້ເພາະວ່າ ".$username_form." , ມີໃນຖານຂໍ້ມູນແລ້ວ ...!";
					}

			 
				break;
			}
		}	
	}
}

$result = LoadAllUser($whereclause);


if(isset($_GET["del_id"]) && $_SESSION['EDPOSV1role_id'] <= 2){

	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	if ($id <= 2) {
		echo "<center><h2>Can not Delete</h2></center>";
	} else {
	$sql = "UPDATE tb_user SET status_id = 0 WHERE user_id ='$id'";
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=manage/user");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
	}
}

if(isset($_GET["reset"]) && $_SESSION['EDPOSV1role_id'] <= 2){

	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['reset'])));
	$id = substr($id, 0, strlen($id)-11);

		//$passmd5 = md5($password);
	$username = mysql_real_escape_string(stripslashes( ($_GET['user'])));
	$passmd5 = md5('123456505uK5@v@y'.$username);

	if ($id <= 2) {
		echo "<center><h2>Can not Reset password</h2></center>";
	} else {
	$sql = "UPDATE tb_user SET password = '$passmd5' WHERE user_id ='$id'";
	
	$result = mysql_query($sql, $conn);	
	if($result){
		header("Location: ?d=manage/user");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
	}
//	echo $sql."|".$username;
}