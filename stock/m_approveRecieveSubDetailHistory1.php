<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


 $transferID=$_GET['tranID'];

function loadImportHistory($transferID) {

	return mysql_query("select * from v_import_detail where tranID='$transferID'");
}
function approveHistory( $transferID) {

	return mysql_query("select * from v_approve_history where transferID='$transferID' group by transferID,approve_level");
}

?>