<?php 
    $Get_infoID= $_SESSION['EDPOSV1info_id'];
    $Get_infoName=$_SESSION['EDPOSV1info_name'];

    $infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));  
	$kf_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['kf_id'])));
	
	// -------------------------------------------	
$whereclause = "";
//if ($kf_id != 0) $whereclause .= " kf_id = '$kf_id' AND ";
$whereclause .= " status_id IN (3) AND  ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);

 

function LoadInfo() { 
    return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
