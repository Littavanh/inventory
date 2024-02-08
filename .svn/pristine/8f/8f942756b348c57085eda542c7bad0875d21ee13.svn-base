<?php

/*---------------------------------- call from unRecieve print.php --------------------------*/
function headerPrint()
{
	$transferID = $_GET["transferID"];

	if (isset($transferID) && $transferID != "") {
		$sql = "select * from v_export where `transferID` = '$transferID' group by `transferID`";
		$result = mysql_query($sql);
		return $result;
	}
}
/*-------- select to list the product -------*/
function detailPrint()
{
	$transferID = $_GET["transferID"];
	if (isset($transferID) && $transferID != "") {

		$sql = "select * from v_export where `transferID` = '$transferID'";

		$result = mysql_query($sql);
		return $result;
	}
}

function checkApproveSignature()
{
	$transferID = $_GET["transferID"];
	if (isset($transferID) && $transferID != "") {

		$sql = "select * from v_approve_history where transferID = '$transferID' group by approve_level";

		$result = mysql_query($sql);
		return $result;
	}
}