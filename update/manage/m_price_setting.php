<?php 
$info_id = $_SESSION["EDPOSV1info_id"];
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	//$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));	
	$kf_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['kf_id'])));
	$infoID = $_SESSION['EDPOSV1KFSEL_info_id'];
	
	// -------------------------------------------	
$whereclause = "";
if ($kf_id != 0) $whereclause .= " kf_id = '$kf_id' AND ";
$whereclause .= " status_id IN (8,9) AND ";
if ($infoID >'0') {
	$whereclause .= " info_id='$infoID'  AND  ";
} 
if ($infoID =='0') {
	$whereclause .= " info_id='9898989'  AND  ";
}
if ($infoID =='') {
	$whereclause .= " info_id='$Get_infoID'  AND  ";
}

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);
	
function LoadPrice_setting($whereclause, $limitclause) {
	return mysql_query("select * from v_food_and_drink $whereclause $limitclause");	
}


function selkindfood($SelInfoID){	
	$sql1 = "select * from tb_kind_food WHERE status_id=3 and info_id='$SelInfoID'";
	$result1 = mysql_query($sql1);
	return $result1;
}

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
