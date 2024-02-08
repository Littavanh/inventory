<?php 

	
	// -------------------------------------------	
$whereclause = "";
$whereclause .= "status_id IN (1,2) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);

function LoadTable() {	
	return mysql_query("SELECT DISTINCT info_id, info_name, info_addr, info_tel, info_owner, info_logo, printReceive, saveInfoCus, info_logo FROM tb_info WHERE status_id = 1");
}

  