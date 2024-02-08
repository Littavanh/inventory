<?php 
    $Get_infoID= $_SESSION['EDPOSV1info_id'];
    $Get_infoName=$_SESSION['EDPOSV1info_name'];

    $infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));  
	$status = mysql_real_escape_string(stripslashes($_GET['status']));
	
	// -------------------------------------------	
$whereclause = "";
if ($infoID >'0') {
    $whereclause .= " info_id='$infoID'  AND  ";
     $Get_infoID= $infoID ;
} 
 if ($infoID =='') {
    $whereclause .= " info_id='$Get_infoID'  AND  ";
    $Get_infoID= $Get_infoID ;
}
if ($status=='') { $status=1; } 
$whereclause .= " status_id = '$status' AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);

function LoadPrice_setting($whereclause) {
        return mysql_query("SELECT * FROM v_promotion  $whereclause ");        
}



function LoadInfo() { 
    return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
 
function LoadType() { 
    return mysql_query("select proTypeID, proTypeText  from tb_promotiontype WHERE status_id IN (1)  ");
}
 
