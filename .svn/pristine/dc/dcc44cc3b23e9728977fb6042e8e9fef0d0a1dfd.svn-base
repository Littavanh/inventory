<?php 
	$Get_infoID= $_SESSION['EDPOSV1info_id'];	
	
	// -------------------------------------------	
$whereclause = "";
$whereclause .= "status_id IN (1,2) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($status_id != 0) $params .= "status_id=$status_id&";
	
// ------------------------------------- PAGE ------------------------------ //
$pagesize = 20;
$start =  (int)$_GET['start'];
	
$limitclause = "LIMIT $start, $pagesize";

// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_opendate $whereclause");
$pagecount = ceil($catcount / $pagesize);
$pagenum = floor($start/$pagesize) +1;
$starttext = $start+1;
$endtext = min($start + $pagesize, $catcount);
$pagedescription = "ຫນ້າທີ $pagenum, ສະແດງລາຍການທີ $starttext ຫາ $endtext, ຈາກທັງຫມົດ $catcount ລາຍການ";
		
function LoadTable($Get_infoID, $limitclause) {
	$dateView=date('Y-m-d');
	return mysql_query("select * from v_opendate WHERE closeDate = '$dateView' and status_id IN (1,2) and info_id = '$Get_infoID' order by openID DESC ");
}

function LoadOpenStatus($Get_infoID) {
	return mysql_query("select * from v_opendate WHERE status_id IN (1,2,5) and info_id = '$Get_infoID' order by openID DESC LIMIT 1 ");
}

/*
function LoadOpenStatus() {
	return mysql_query("select * from v_opendate WHERE closeDate is null and status_id = 1 order by openID DESC ");
}
*/


	function SumMaterial() {
		return mysql_query("SELECT materialID, materialName,SUM(unitQty1) as unitQty1, SUM(unitQty2) as unitQty2, SUM(unitQty3) as unitQty3, 
							 cap1,  cap2, cap3, unitName1, unitName2,unitName3, SUM(pur_price*unitQty3) as pur_price , exp_date
							 from v_transaction WHERE active_id =1 GROUP BY materialID, exp_date, pur_price  ");
	}