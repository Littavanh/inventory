<?php 
$params = "";	
// ------------------------------------- PAGE ------------------------------ //
 $info_id = $_SESSION["EDPOSV1info_id"];
		
function LoadTable($info_id) {
	return mysql_query("select * from v_approve WHERE info_id='$info_id' order by approveID DESC  ");
}

function LoadCurentStatus($info_id) {
	return mysql_query("select approveID, approveStatus,  approveText, remark, username, date_add  from v_approve WHERE info_id='$info_id' order by approveID desc limit 1");
}
