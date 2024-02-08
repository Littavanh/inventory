<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


$_SESSION['bId'] = $_GET['bId'];

function loadAddjustHistory() {
    $bId = $_SESSION['bId'];
    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_export_ where user_add='$userId' and `transferID`='$bId'");
}

?>