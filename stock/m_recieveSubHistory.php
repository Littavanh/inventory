<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
$where = "where user_add='$userId' and inventype='2' ";
function loadImportPending($where) {
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import $where order by tranID DESC");
}

?>