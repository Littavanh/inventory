<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];

if(isset($_GET["cancel"]) && isset($_GET["tranID"]) && isset($_GET["infoID"]) && isset($_GET["infoIDF"]) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4){

	$info_idF = mysql_real_escape_string(stripslashes($_GET['infoIDF']));
	$info_idT = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$tranID = mysql_real_escape_string(stripslashes($_GET['tranID']));

	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['cancel'])));
	$id = substr($id, 0, strlen($id)-11);

	sql_execute(" UPDATE tb_transactionh SET status_id = 20  WHERE traID='$id' and info_id='$info_idT' and tranID='$tranID' ");	

	//update matterial cut off to cancel
	sql_execute(" UPDATE tb_transactiond SET status_id = 20, tranType=17  WHERE transferID='$tranID' and info_id='$info_idF' and info_idF='$info_idF' and status_id=1 and tranType=14");	

	$sql = " UPDATE tb_transactiond SET status_id = 20, tranType=17 WHERE tranID='$tranID' and info_id='$info_idT' and info_idF='$info_idF' and status_id=15 ";
	
	// delete tb_transaferd 
	sql_execute("Delete tb_transactiond where transferID='$tranID' and status_id=15 ");

	$result = mysql_query($sql, $conn);	
	
	if($result){
		header("Location: ?d=stock/receive_tran");
		echo 'this:'.$result;
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}


$result = LoadTable($whereclause);

