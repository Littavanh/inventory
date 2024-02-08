<?php 

	$status_id = mysql_real_escape_string(stripslashes($_GET['status_id']));
	
	// -------------------------------------------	
$whereclause = "";
if ($status_id != 0) $whereclause .= "status_id = '$status_id' AND ";
$whereclause .= "status_id IN (2) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);

		
function LoadTable($whereclause) {
	return mysql_query("select * from v_open_table $whereclause ");
}

function LoadTable_free() {
	return mysql_query("select * from v_table where status_id = 1");
}