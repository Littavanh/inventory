<?php

/*---------------------------------- call from unRecieve print.php --------------------------*/
function headerPrint(){
	$tranID = $_GET["tranID"];
	
	if(isset($tranID) && $tranID != ""){
		$sql = "select * from v_import where tranID = '$tranID'";
		$result = mysql_query($sql);
		return $result;
	}	
}
/*-------- select to list the product -------*/
function detailPrint(){
	$tranID = $_GET["tranID"];
	if(isset($tranID) && $tranID != ""){
		 
		 $sql ="select * from v_import_detail where tranID = '$tranID'";
		
		$result = mysql_query($sql);
		return $result;
	}
}

function checkApproveSignature()
{
	$tranID = $_GET["tranID"];
	if (isset($tranID) && $tranID != "") {

		$sql = "select * from v_approve_history where transferID = '$tranID' group by approve_level";

		$result = mysql_query($sql);
		return $result;
	}
}
