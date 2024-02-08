<?php



$user_id = $_SESSION["EDPOSV1user_id"];



function checkHaveQtyToReturn($transferID)
{

	return mysql_query("select * from tb_export_ where `transferID`='$transferID' ");
}


if (isset($_GET["approve"])) {
	$transferID = $_GET["approve"];


	// $check = checkHaveQtyToReturn($transferID);
	// $previous=0;
	// while ($row = mysql_fetch_array($check)) {
	
	// 	$current = $row['qty_return'];


	// 	if ($current == $previous) {
	// 		echo '<script>alert("' . $row['qty_return'] . ' update status =7")</script>';
	// 	  }else{
	// 		echo '<script>alert("' . $row['qty_return'] . ' update status =6")</script>';
	// 	  }
	// 	  $previous = $current;
			// echo '<script>alert("' . $qty_return . ' update status =6")</script>';
		// if ($qty_return == 0) {
		// 	sql_execute("UPDATE tb_export_ SET status_get_id=7 WHERE `transferID`='$transferID'");
		// 	// echo '<script>alert("' . $qty_return . ' update status =6")</script>';

		// } else {
		// 	// echo '<script>alert("' . $qty_return . ' update status =7")</script>';
		// 	sql_execute("UPDATE tb_export_ SET status_get_id=6 WHERE `transferID`='$transferID'");
		// }
		
	// }
	// $_SESSION['qty_return'] = $row['qty_return'];
	
	sql_execute("UPDATE tb_export_ SET status_get_id=6 WHERE `transferID`='$transferID'");



}

?>