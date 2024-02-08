<?php
	if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }
	$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));

	//================
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($enddate != NULL){
	$whereclause .= " exp_date <='$enddate' AND ";
}else{
	$enddate=date('Y-m-d');
	$whereclause .= " exp_date <='$enddate' AND ";
} 

if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($enddate != NULL){
	$params .= "enddate=$enddate&";
}	
	
// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_stock_exp_ $whereclause ");


//=======SUM material by material ID
function SumMaterial($whereclause) {
	return mysql_query("SELECT materialID, materialName, SUM(totalQTY) as unitQty3, 
						 cap1,  cap2, cap3, unitName1, unitName2,unitName3, min_stock, date_tran, exp_date
						 from v_stock_exp_  $whereclause GROUP BY materialID  ");
}
 
$SumResult = SumMaterial($whereclause);

