<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];

$_SESSION['id'] = $_GET['id'];
$id = $_SESSION['id'];


$where = "where approver='$userId' and status_approve_id='3' and `transferID` = '$id'";
function loadExportPending($where)
{
	//    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_export $where ");
}

?>