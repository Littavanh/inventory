<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];


function loadAddjustHistory() {

   

    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("SELECT * from tb_approve_history where user_add=$userId and status_approve_id=2 and remark='ຮັບສິນຄ້າ(ຄັງຍ່ອຍ)' group by transferID order by id desc");
}
function loadListImport($tranID) {

   

   
    //    echo '<script>alert("'.$where.'")</script>';
	return mysql_query("select * from v_import where tranID='$tranID' group by tranID   order by traID DESC");
}




?>