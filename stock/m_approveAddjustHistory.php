<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


function loadAddjustHistory() {
    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_export where user_add='$userId'  group by `transferID` order by traDID DESC");
}

?>