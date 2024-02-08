<?php 
    $Get_infoID= $_SESSION['EDPOSV1info_id'];
    $Get_infoName=$_SESSION['EDPOSV1info_name'];

    $infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));  
	$kf_id = mysql_real_escape_string(stripslashes(base64_decode($_GET['kf_id'])));
	
	// -------------------------------------------	
$whereclause = "";
if ($infoID >'0') {
    $whereclause .= " v_material2_.info_id='$infoID'  AND  ";
     $Get_infoID= $infoID ;
} 
 if ($infoID =='') {
    $whereclause .= " v_material2_.info_id='$Get_infoID'  AND  ";
    $Get_infoID= $Get_infoID ;
}
$whereclause .= " v_material2_.status_id IN (3) AND v_material2_.materialID NOT IN (1)   AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
$params .= "startdate=$startdate&enddate=$enddate&infoID=$Get_infoID&kf_id=$kf_id&";
 

// ------------------------------------- PAGE ------------------------------ //
$pagesize = 50;
$start =  (int)$_GET['start'];
    
$limitclause = "LIMIT $start, $pagesize";


// --------------------------------------------------------- Build Paging
//$catcount = nr_execute("SELECT COUNT(*) FROM v_transaction $whereclause ");
function SumMaterial_CountRow($Get_infoID) {
    return mysql_query("SELECT distinct tb_kind_food_.kf_name , tb_kind_food_.printerNo , tb_kind_food_.kf_name , 
                            tb_kind_food_.printerNo , v_material2_.materialID , v_material2_.materialName , 
                            v_material2_.materialRemark , v_material2_.materialRemark1 , v_material2_.materialRemark2 , 
                            v_material2_.unitName1 , v_material2_.unitQty1 , v_material2_.unitName2 , v_material2_.unitQty2 , 
                            v_material2_.unitName3 , v_material2_.unitQty3 , v_material2_.min_stock , 
                            v_material2_.mBarcode , v_material2_.ingredient , 
                            v_material2_.info_id 
                            FROM v_material2_ 
                            INNER JOIN tb_kind_food_ ON (v_material2_.kf_id = tb_kind_food_.kf_id and v_material2_.info_id = tb_kind_food_.info_id) 
                            
                            WHERE v_material2_.info_id='$Get_infoID' AND v_material2_.status_id IN (3) AND v_material2_.materialID NOT IN (1)  
                            ORDER BY v_material2_.mBarcode ");
}

/*
$catcount=0;
$RS_CountRow = SumMaterial_CountRow($Get_infoID);
while ($item_CR = mysql_fetch_array($RS_CountRow)) {
    $catcount++;
}

$pagecount = ceil($catcount / $pagesize);
$pagenum = floor($start/$pagesize) +1;
$starttext = $start+1;
$endtext = min($start + $pagesize, $catcount);
$pagedescription = "ຫນ້າທີ $pagenum, ສະແດງລາຍການທີ $starttext ຫາ $endtext, ຈາກທັງຫມົດ $catcount ລາຍການ";
*/



function LoadPrice_setting($whereclause, $Get_infoID, $limitclause) {      						     						
		return mysql_query("SELECT distinct tb_kind_food_.kf_name , tb_kind_food_.printerNo , tb_kind_food_.kf_name , 
                            tb_kind_food_.printerNo , v_material2_.materialID , v_material2_.materialName , 
                            v_material2_.materialRemark , v_material2_.materialRemark1 , v_material2_.materialRemark2 , 
                            v_material2_.unitName1 , v_material2_.unitQty1 , v_material2_.unitName2 , v_material2_.unitQty2 , 
                            v_material2_.unitName3 , v_material2_.unitQty3 , v_material2_.min_stock , 
                            v_material2_.mBarcode , v_material2_.ingredient , 
                            v_material2_.info_id 
                            FROM v_material2_ 
                            INNER JOIN tb_kind_food_ ON (v_material2_.kf_id = tb_kind_food_.kf_id and v_material2_.info_id = tb_kind_food_.info_id)                             
                            WHERE v_material2_.info_id='$Get_infoID' AND v_material2_.status_id IN (3) AND v_material2_.materialID NOT IN (1)  
                            ORDER BY v_material2_.mBarcode $limitclause"); 												
}

 									
    
							
function LoadInfo() { 
    return mysql_query("select distinct info_id, info_name, info_id from tb_info_ WHERE status_id IN (1)  ");
}
 