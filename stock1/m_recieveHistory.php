<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
$where = "where user_add='$userId' ";
function loadImportPending($where) {
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import_ $where ");
}

?>