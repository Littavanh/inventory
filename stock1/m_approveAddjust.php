<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];


// $check = loadExportPending($where);
// $i = 1;
// while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {

// }

$where = "where approver='$userId' and status_approve_id='3' group by `transferID`";
function loadExportPending($where)
{
	//    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_export_ $where ");
}

?>