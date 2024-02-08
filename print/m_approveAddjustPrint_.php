<?php

/*---------------------------------- call from unRecieve print.php --------------------------*/
function headerPrint()
{
	$transferID = $_GET["transferID"];

	if (isset($transferID) && $transferID != "") {
		$sql = "select * from v_export_ where `transferID` = '$transferID' group by `transferID`";
		$result = mysql_query($sql);
		return $result;
	}
}
/*-------- select to list the product -------*/
function detailPrint()
{
	$transferID = $_GET["transferID"];
	if (isset($transferID) && $transferID != "") {

		$sql = "select * from v_export_ where `transferID` = '$transferID'";

		$result = mysql_query($sql);
		return $result;
	}
}

