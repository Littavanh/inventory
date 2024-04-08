<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
// $load = mysql_query("select * from tb_approve_history where status_approve_id='2'");

// while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {
//     if($userId = $row['user_id']){

//     }
// }
    $where = "where approver_id='$userId' and inventype='1' and statusApprove_id in (1,2,4)";

function loadImportPending($where) {
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import $where order by tranID DESC");
}

?>