<?php
$user_id = $_SESSION["EDPOSV1user_id"];
$userName =  $_SESSION['EDPOSV1user_name'];

if (isset($_POST['btnsave_info']) && $_SESSION['EDPOSV1role_id'] <= 3) {
		$txtUserID = mysql_real_escape_string(stripslashes($_POST['txtUserID']));
		$txtfirst_name = mysql_real_escape_string(stripslashes($_POST['txtfirst_name'])); 
		$txtlast_name = mysql_real_escape_string(stripslashes(trim($_POST['txtlast_name'])));
		 
		$tmp_photo = $_FILES['fileUpload']["name"];
		$file_name = date('Ymd').$_FILES["fileUpload"]["name"]; 
//echo "KKKKKKKKKKKKKKKKKKKKKK:".$printReceive;
		//copy($_FILES["fileUpload"]["tmp_name"],"logo/".$file_name);
		
		/*--------------------------------------------------------------*/
		
		if ($txtUserID != "" && $txtfirst_name != "" && $txtlast_name != "" ) {			
			if($tmp_photo != "")
			{
				$file_name = date('Ymd').$_FILES["fileUpload"]["name"]; 		
				copy($_FILES["fileUpload"]["tmp_name"],"users_pic/".$file_name);
				sql_execute("UPDATE tb_user SET first_name = '$txtfirst_name', last_name = '$txtlast_name', pic = '$file_name' WHERE user_id ='$txtUserID' ");
			} else {			
				sql_execute("UPDATE tb_user SET first_name = '$txtfirst_name', last_name = '$txtlast_name' WHERE user_id ='$txtUserID' ");				
			}				
		}
	}
		
if (isset($_POST['btResetPWD']) && isset($_SESSION['EDPOSV1role_id'])) {
	$txtOldPassword = mysql_real_escape_string(stripslashes($_POST['txtOldPassword']));
	$txtNewpassword = mysql_real_escape_string(stripslashes($_POST['txtNewpassword'])); 
	$txtConfirm = mysql_real_escape_string(stripslashes(trim($_POST['txtConfirm'])));
	$password_form = md5($txtConfirm.'505uK5@v@y'.$userName);
	$password_OLD = md5($txtOldPassword.'505uK5@v@y'.$userName);

	if ($txtNewpassword != $txtConfirm) { 
		//$success = " ເພີ່ມຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
		$exist = " ບໍ່ສາມາດປ່ຽນລະຫັດຜ່ານໄດ້, <br>ລະຫັດຜ່ານໃໝ່ ແລະ ຢືນຢັນລະຫັດຜ່ານ ບໍ່ຄືກັນ ...!";
	} else {
		/*======= check password ==========*/
				 
		$catcount = nr_execute("SELECT COUNT(*) FROM tb_user WHERE username='$userName' and password='$password_OLD' ");
		  
		  if ($catcount > '0') {
		    	sql_execute("UPDATE tb_user SET password = '$password_form' WHERE user_id ='$user_id' ");
		    	$success =" ປ່ຽນລະຫັດຜ່ານສໍາເລັດ...!";
		  }  else {
		  	$exist = " ບໍ່ສາມາດປ່ຽນລະຫັດຜ່ານໄດ້, <br>ລະຫັດຜ່ານເກົ່າບໍຖືກຕ້ອງ ...!";
		  }
	}
}
