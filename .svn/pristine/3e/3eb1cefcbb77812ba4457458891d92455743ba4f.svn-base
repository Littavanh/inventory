<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


 $transferID=$_GET['transferID'];

function loadAddjustHistory( $transferID) {

	return mysql_query("select * from v_export where transferID='$transferID'");
}
function approveHistory( $transferID) {

	return mysql_query("select * from v_approve_history where transferID='$transferID' group by transferID,approve_level");
}

?>