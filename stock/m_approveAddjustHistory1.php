<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


function loadAddjustHistory() {

   

    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("SELECT * from tb_approve_history where user_add=$userId and status_approve_id=3 group by transferID order by id desc");
}
function loadListExport($transferID) {

   

    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_export where transferID='$transferID' group by transferID   order by traDID DESC");
}




?>