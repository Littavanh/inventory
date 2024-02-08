<?php 
	
	
	// -------------------------------------------	
$whereclause = "";
$whereclause .= " cusID <>1 and status_id IN (1) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


 
function LoadCusTomer($whereclause) {
	return mysql_query("select * from v_customers $whereclause");
}

function LoadProvince() {
	return mysql_query("select * from tb_province");
} 

function LoadDistrict($GetProID) {
	return mysql_query("select * from tb_district WHERE proID='$GetProID'");
} 