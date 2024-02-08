<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
if($userId =='2613'){
    $where = "where approver_id='$userId' and statusApprove_id='2' and `level` = '0'";
}else{
    $where = "where orderer='$userId' and statusApprove_id='2' and `level` = '1'";
}

function loadImportPending($where) {
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import $where order by tranID DESC");
}

?>