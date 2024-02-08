<?php 
	
	
	// -------------------------------------------	
$whereclause = "";
$whereclause .= "status_id IN (1) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);
 
function LoadSupplier($whereclause) {
	return mysql_query("select * from v_suppliers $whereclause");
}
 
