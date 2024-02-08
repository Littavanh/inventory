<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
if($userId =='2613'){
    $where = "where approver_id='$userId'and `level`='1' and statusApprove_id in (1,2,4)";
}else{
    $where = "where orderer='$userId' and `level`='1' and statusApprove_id in (1,4)";
}

function loadImportPending($where) {
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import $where order by tranID DESC");
}

?>