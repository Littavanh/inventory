<?php 
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));		
	
	// -------------------------------------------	
$whereclause = "";
if ($infoID >'0') {
	$whereclause .= " info_id='$infoID'  AND  ";
} 
 if ($infoID =='') {
	$whereclause .= " info_id='$Get_infoID'  AND  ";
}
$whereclause .= "status_id IN (3) AND unitid NOT IN (1) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);

function LoadTable($whereclause) {
	return mysql_query("select * from v_unit $whereclause ");
}


function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
 