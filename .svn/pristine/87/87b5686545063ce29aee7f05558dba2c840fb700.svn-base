<?php 
	$GnfoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = $_SESSION['EDPOSV1TransferProducinfoIDF'];	
	$tmpID = $_SESSION['EDPOSV1tmpProductID_t'];
	$info_id = $_SESSION["EDPOSV1info_id"];
	// -------------------------------------------	

$whereclause .= " tranID = '$tmpID' AND ";
if ($infoID >'0') {
	$whereclause .= " info_id='$infoID' AND  ";
} 
 if ($infoID =='') {
	$whereclause .= " info_id='$Get_infoID'  AND  ";
}
if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";

		
function LoadPrice_setting($whereclause) {
	// return mysql_query("select * from v_tmp_transactiond $whereclause ");
	return mysql_query("select * from v_tmp_transactiond $whereclause ");

	 
}

$materialID = mysql_real_escape_string(stripslashes(base64_decode($_GET['materialID'])));
$txtBarcode = mysql_real_escape_string(stripslashes($_GET['txtBarcode']));
$material = mysql_real_escape_string(stripslashes($_GET['material']));
$whereclauseKF = "";
if ($materialID !='') $whereclauseKF .= " materialID = '$materialID' AND ";
if ($txtBarcode!='')  $whereclauseKF .= " mBarcode = '$txtBarcode' AND ";
if ($material!='')  $whereclauseKF .= " materialName = '$material' AND ";
$KM=$whereclauseKF;
if ($infoID >'0') {
	$whereclauseKF .= " info_id='$infoID'  AND ";
} 
 if ($infoID =='') {
	$whereclauseKF .= " info_id='$Get_infoID'  AND ";
}

if ($whereclauseKF != "") $whereclauseKF = "WHERE " . substr($whereclauseKF, 0, strlen($whereclauseKF)-5); 
if ($KM =='') $whereclauseKF = "WHERE mBarcode='3399993' and info_id='$infoID' ";


function LoadMaterialAdd($whereclauseKF) {
	//return mysql_query("select * from v_material2 $whereclauseKF ");
	return mysql_query("SELECT materialID, materialName,SUM(unitQty1) as unitQty1, SUM(unitQty2) as unitQty2, SUM(unitQty3) as unitQty3, 
							cap1,  cap2, cap3, unitName1, unitName2,unitName3, pur_price , exp_date
						from v_transaction_tran $whereclauseKF GROUP BY materialID, exp_date, pur_price");
						 

					 
}

function LoadOpenStatus() {
	return mysql_query("select * from v_opendate WHERE closeDate is null and status_id = 1  order by openID DESC ");
}

function selkindfood($infoID){
	return mysql_query("select * from tb_kind_food WHERE status_id=3 and info_id='$infoID'");
}

function selMaterialList1($infoID){
    return mysql_query(" SELECT distinct materialID, materialName from v_transaction_tran WHERE info_id='$infoID' ");
}


function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  order by info_id ");
}


function LoadInfoID_selT($infoSel) { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1) and info_id<>'$infoSel' ");
}



