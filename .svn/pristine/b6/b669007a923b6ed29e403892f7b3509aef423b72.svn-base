<?php
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];
if(isset($_GET["del_id"]) && $_SESSION['EDPOSV1role_id'] !=4 ) {
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$trandid = mysql_real_escape_string(stripslashes(($_GET['trandid'])));
	$cnid = mysql_real_escape_string(stripslashes(($_GET['cnid'])));
	 
 
	if ($trandid >0 && $cnid>0 ) {
		// Insert log
		sql_execute(" UPDATE tb_transactiond SET status_id = 20, tranType=17  WHERE traDID IN ('$trandid','$cnid') ");
		// CN 
 
		$success="ຍົກເລີກລາຍການໂອນ ຂໍ້ມູນສີນຄ້າ ສໍາເລັດແລ້ວ";	
	}
}


if (isset($_POST['type']) && $_SESSION['EDPOSV1role_id'] !=4) {
	for ($i = 0; $i < count($_POST['type']); $i++) {
		$tranDID = mysql_real_escape_string(stripslashes($_POST['id'][$i]));
		$mName = mysql_real_escape_string(stripslashes($_POST['mName'][$i]));



		if ($_POST['id'][$i] != ""  ) {
			switch ($_POST['type'][$i]) {
				case "unchanged" :
					
					$sql = " UPDATE tb_transactiond SET status_id = 1, tranType=16  WHERE traDID='$tranDID' and status_id = 15 ";

					$result = mysql_query($sql, $conn);	
					if($result){
						$success = " ຮັບຂໍ້ມູນສໍາເລັດແລ້ວ ...!";
					}else{
						$exist = " ຮັບຂໍ້ມູນ: ".$mName." ບໍສໍາເລັດ ...!";
					}

				break;
			}
		}
	}
}

