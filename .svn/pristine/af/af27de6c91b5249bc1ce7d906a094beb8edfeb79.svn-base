<?php
	$Get_infoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));		
	$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
	
	//------------------------------------------------ Building search clause // 	
$whereclause = " active_id =1 AND "; 
if ($infoID !='0') $whereclause .= " info_id='$infoID'  AND  ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
	$params .= "startdate=$startdate&enddate=$enddate&infoID=$infoID&";

// ------------------------------------- PAGE ------------------------------ //
$pagesize = 50;
$start =  (int)$_GET['start'];
	
$limitclause = "LIMIT $start, $pagesize";

// --------------------------------------------------------- Build Paging
function SumMaterial_CountRow($whereclause) {
	return mysql_query("SELECT materialID, mBarcode, materialName,SUM(unitQty1) as unitQty1, SUM(unitQty2) as unitQty2, SUM(unitQty3) as unitQty3, 
						 cap1,  cap2, cap3, unitName1, unitName2,unitName3, SUM(pur_price*unitQty3) as pur_price , exp_date
						 from v_transaction $whereclause  GROUP BY materialID, exp_date, pur_price  ");
}
$catcount=0;
$RS_CountRow = SumMaterial_CountRow($whereclause);
while ($item_CR = mysql_fetch_array($RS_CountRow)) {
	$catcount++;
}


//$catcount = nr_execute("SELECT COUNT(*) FROM v_transaction $whereclause  GROUP BY materialID, exp_date, pur_price ");


$pagecount = ceil($catcount / $pagesize);
$pagenum = floor($start/$pagesize) +1;
$starttext = $start+1;
$endtext = min($start + $pagesize, $catcount);
$pagedescription = "ຫນ້າທີ $pagenum, ສະແດງລາຍການທີ $starttext ຫາ $endtext, ຈາກທັງຫມົດ $catcount ລາຍການ";

	
 
function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}

//=======SUM material by material ID
function SumMaterial($whereclause, $limitclause) {

	return mysql_query("SELECT materialID, mBarcode, materialName,SUM(unitQty1) as unitQty1, SUM(unitQty2) as unitQty2, SUM(unitQty3) as unitQty3, 
						 cap1,  cap2, cap3, unitName1, unitName2,unitName3, SUM(pur_price*unitQty3) as pur_price , exp_date
						 from v_transaction $whereclause  GROUP BY materialID, exp_date, pur_price  $limitclause ");
}
 

 
$SumResult = SumMaterial($whereclause, $limitclause);

 