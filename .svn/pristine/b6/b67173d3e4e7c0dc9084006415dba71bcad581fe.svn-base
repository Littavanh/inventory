<?php 
	$Get_infoID= $_SESSION['EDPOSV1info_id'];	
	
	// -------------------------------------------	
 
function LoadTable($Get_infoID) {	
	return mysql_query(" select * from v_reset WHERE info_id = '$Get_infoID' ");
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
 

