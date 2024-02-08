<?php
	if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];
	
	//------------------------------------------------ Building search clause // 	
	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
	$whereclause = "";
	if ($infoID !='' ) { 
		$whereclause .= " info_id='$infoID'  AND totalQTY<=min_stock AND ";
	} else {
		$whereclause .= " info_id='$Get_infoID'  AND totalQTY<=min_stock AND ";
	}


if ($whereclause != "") $whereclause = " WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);

$params = "";
if ($startdate != NULL && $enddate != NULL){
	$params .= "startdate=$startdate&enddate=$enddate&";
}	

// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_min_stock $whereclause");


function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}

//=======SUM material by material ID
function SumMaterial($whereclause) {
	return mysql_query("select mBarcode,  `info_id`, `materialID`,
totalQTY as  `unitQty3`,`exp_date` AS `exp_date` , date_tran,
min_stock, materialName, cap1,cap2, cap3,
unitName1, unitName2, unitName3
from `v_min_stock` 
 $whereclause ORDER BY materialID ");
}

$SumResult = SumMaterial($whereclause);
 
