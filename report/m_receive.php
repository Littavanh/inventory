<?php
date_default_timezone_set('Asia/Vientiane'); // set your timezone
$Get_infoID = $_SESSION['EDPOSV1info_id'];
$Get_infoName = $_SESSION['EDPOSV1info_name'];

$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
$categoryID = mysql_real_escape_string(stripslashes($_GET['categoryID']));
$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));
$supplierID = mysql_real_escape_string(stripslashes($_GET['supplierID']));

// functions to subtract one month
$less_startdate = date('Y-m', strtotime('-1 month', strtotime($startdate)));


list($start_year, $start_month) = explode('-', $startdate);

// buld where clause
//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($infoID != '0')
	$whereclause .= "vall.info_id='$infoID' AND ";
if ($categoryID != '0')
	$whereclause .= "kf_id='$categoryID' AND ";
if ($whereclause != "")
	$whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause) - 5);


$params = "";
if ($startdate != NULL) {
	$params .= "startdate=$startdate&infoID=$infoID&kf_id='$categoryID'";
}
function LoadCategory()
{
	return mysql_query("select * from v_kind_of_food WHERE status_id IN (3)  ");
}
function LoadInfo()
{
	return mysql_query("select distinct info_id, info_name from tb_info WHERE status_id IN (1)  ");
}


// selete show data
function LoadTableV2($monthView, $yearView, $whereclause)
{
	$thisMonth = $yearView . '-' . $monthView . '-01';
	$lastDayInMonth = date("Y-m-t", strtotime($thisMonth));

	// echo "select vall.info_id, vall.materialID, vall.mBarcode, vall.materialName, vall.uname3, COALESCE(vall.pur_price,0) as pur_price, 
	// COALESCE(vall.cur_name,'') as cur_name,
	// COALESCE(( select sum(vAcc.unitQty3) from tb_transactiond vAcc
	// WHERE vAcc.date_tran < '$thisMonth'  and vAcc.materialID = vall.materialID and vAcc.trantype IN (1,15,19)
	// and  vAcc.info_id = vall.info_id and vAcc.pur_price = vall.pur_price
	// GROUP BY vAcc.info_id, vAcc.materialID, vAcc.pur_price),0) as acc_bl,
	// COALESCE(( select sum(vReceive.unitQty3) from tb_transactiond vReceive
	// WHERE MONTH(vReceive.date_tran) = '$monthView' and YEAR(vReceive.date_tran) = '$yearView' and vReceive.materialID = vall.materialID and vReceive.trantype IN (1)
	// and  vReceive.info_id = vall.info_id and vReceive.pur_price = vall.pur_price
	// GROUP BY vReceive.info_id, vReceive.materialID, vReceive.pur_price),0) as recive_bl,
	// COALESCE(( select sum(vOut.unitQty3) from tb_transactiond vOut
	// WHERE MONTH(vOut.date_tran) = '$monthView' and YEAR(vOut.date_tran) = '$yearView' and vOut.materialID = vall.materialID and vOut.trantype IN (19)
	// and  vOut.info_id = vall.info_id and vOut.pur_price = vall.pur_price
	// GROUP BY vOut.info_id, vOut.materialID, vOut.pur_price),0) as out_bl,
	// COALESCE(( select sum(vTotal.unitQty3) from tb_transactiond vTotal
	// WHERE  vTotal.date_tran <= '$lastDayInMonth'  and vTotal.materialID = vall.materialID and vTotal.trantype IN (1,15,19)
	// and  vTotal.info_id = vall.info_id and vTotal.pur_price = vall.pur_price
	// GROUP BY vTotal.info_id, vTotal.materialID, vTotal.pur_price),0) as total_bl
	// from v_sum_transaction_all vall  
	// $whereclause GROUP BY vall.info_id, vall.materialID, vall.materialName, vall.uname3, vall.pur_price   ORDER BY vall.mBarcode ASC ";

	return mysql_query("select vall.kf_id,vall.info_id, vall.materialID, vall.mBarcode, vall.materialName, vall.uname3, COALESCE(vall.pur_price,0) as pur_price, 
	COALESCE(vall.cy_text1,'') as cur_name,
	COALESCE(( select sum(vAcc.unitQty3) from tb_transactiond vAcc
	WHERE vAcc.date_tran < '$thisMonth'  and vAcc.materialID = vall.materialID and vAcc.trantype IN (1,15,19)
	and  vAcc.info_id = vall.info_id and vAcc.pur_price = vall.pur_price
	GROUP BY vAcc.info_id, vAcc.materialID, vAcc.pur_price),0) as acc_bl,
	COALESCE(( select sum(vReceive.unitQty3) from tb_transactiond vReceive
	WHERE MONTH(vReceive.date_tran) = '$monthView' and YEAR(vReceive.date_tran) = '$yearView' and vReceive.materialID = vall.materialID and vReceive.trantype IN (1)
	and  vReceive.info_id = vall.info_id and vReceive.pur_price = vall.pur_price
	GROUP BY vReceive.info_id, vReceive.materialID, vReceive.pur_price),0) as recive_bl,
	COALESCE(( select sum(vOut.unitQty3) from tb_transactiond vOut
	WHERE MONTH(vOut.date_tran) = '$monthView' and YEAR(vOut.date_tran) = '$yearView' and vOut.materialID = vall.materialID and vOut.trantype IN (19)
	and  vOut.info_id = vall.info_id and vOut.pur_price = vall.pur_price
	GROUP BY vOut.info_id, vOut.materialID, vOut.pur_price),0) as out_bl,
	COALESCE(( select sum(vTotal.unitQty3) from tb_transactiond vTotal
	WHERE  vTotal.date_tran <= '$lastDayInMonth'  and vTotal.materialID = vall.materialID and vTotal.trantype IN (1,15,19)
	and  vTotal.info_id = vall.info_id and vTotal.pur_price = vall.pur_price
	GROUP BY vTotal.info_id, vTotal.materialID, vTotal.pur_price),0) as total_bl
	from v_sum_transaction_all vall  
	$whereclause    ORDER BY vall.mBarcode ASC ");


}
