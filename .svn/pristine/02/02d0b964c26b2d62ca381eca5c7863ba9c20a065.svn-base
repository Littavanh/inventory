<?php
//include_once("config.php");

if (isset($_POST['type']) && isset($_SESSION['EDPOSV1role_id']) ) {
	for ($i = 0; $i < count($_POST['type']); $i++) {	
		/*------------ get the warehouse ID -----------------*/
		$usr_id = mysql_real_escape_string(stripslashes($_POST['usr_id'][$i])); 
		$username = mysql_real_escape_string(stripslashes($_POST['username'][$i])); 
		$password = mysql_real_escape_string(stripslashes(trim($_POST['password'][$i])));
		$confirm_pass = mysql_real_escape_string(stripslashes(trim($_POST['confirm_pass'][$i])));
		//$passmd5 = md5($password);
		$passmd5 = md5($password.'505uK5@v@y'.$username);
		/*--------------------------------------------------------------*/
		
		if ($_POST['password'][$i] != "" && $_POST['confirm_pass'][$i] != "" ) {	
			//echo $_POST['type'][$i]."<br>";
			switch ($_POST['type'][$i]) {		
				case "edited":		
					sql_execute("UPDATE tb_user SET password = '$passmd5' WHERE user_id = $usr_id ");
					$message_ch= "ປ່ຽນລະຫັດຜ່ານສໍາເລັດແລ້ວ ...!";
				break;
			}
		}	
	}
}

//$result = LoadUser($whereclause, $limitclause);
