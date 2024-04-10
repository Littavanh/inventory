<?php
$GnfoID = $_SESSION['EDPOSV1info_id'];
$Get_infoName = $_SESSION['EDPOSV1info_name'];

$infoID = $_SESSION['EDPOSV1AddProducinfoID'];
$tmpID = $_SESSION['EDPOSV1tmpProductID'];
$info_id = $_SESSION["EDPOSV1info_id"];
// -------------------------------------------	


$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];

function lineManager($TokenKey,$userId,$api_url)
{

    $message='';
    
    $ch = curl_init($api_url.'Inventory/lineManager');
	
   $jsonData = array(
       'TokenKey' => $TokenKey,
	   'userId' => $userId
   );
  
 
   $payload = json_encode($jsonData);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
  
 
    $arr = json_decode($result, true);
  
   $_SESSION['StatusCode'] = $arr['StatusCode'];
   $_SESSION['ModelErrors'] = $arr['ModelErrors'];
   $_SESSION['IsSuccess'] = $arr['IsSuccess'];
   $_SESSION['CommonErrors'] = $arr['CommonErrors'];
   $_SESSION['LineManagerId'] = $arr['LineManagerId'];
   $_SESSION['LineManagerFullName'] = $arr['LineManagerFullName'];
   
//    echo '<script>alert("'.$_SESSION['LineManagerId'].'")</script>';
  
	
   
}

$whereclause .= " tranID = '$tmpID' AND ";
if ($infoID > '0') {
	$whereclause .= " info_id='$infoID' AND  ";
}
if ($infoID == '') {
	$whereclause .= " info_id='$Get_infoID'  AND  ";
}
if ($whereclause != "")
	$whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause) - 5);

$params = "";


function LoadPrice_setting($whereclause)
{
	return mysql_query("select * from v_tmp_transactiond_ $whereclause ");
}


$materialID = mysql_real_escape_string(stripslashes(base64_decode($_GET['materialID'])));
$txtBarcode = mysql_real_escape_string(stripslashes($_GET['txtBarcode']));
$material = mysql_real_escape_string(stripslashes($_GET['material']));
$whereclauseKF = " status_id IN (3) AND ";
if ($materialID != '')
	$whereclauseKF .= " materialID = '$materialID' AND ";
if ($txtBarcode != '')
	$whereclauseKF .= " mBarcode = '$txtBarcode' AND ";
if ($material != '')
	$whereclauseKF .= " materialName = '$material' AND ";
$KM = $whereclauseKF;
if ($infoID > '0') {
	$whereclauseKF .= " info_id='$infoID'  AND ";
}
if ($infoID == '') {
	$whereclauseKF .= " info_id='$Get_infoID'  AND ";
}

if ($whereclauseKF != " status_id IN (3) AND ")
	$whereclauseKF = "WHERE " . substr($whereclauseKF, 0, strlen($whereclauseKF) - 5);
if ($KM == ' status_id IN (3) AND ')
	$whereclauseKF = " WHERE mBarcode='333' and info_id='$infoID' AND status_id IN (3) ";


function LoadMaterialAdd($whereclauseKF)
{
	return mysql_query("select * from v_material2_ $whereclauseKF ");
}

function LoadOpenStatus()
{
	return mysql_query("select * from v_opendate_ WHERE closeDate is null and status_id = 1  order by openID DESC ");
}

function selkindfood($infoID)
{
	return mysql_query("select * from tb_kind_food_ WHERE status_id=3 and info_id='$infoID'");
}

function selMaterialList1($infoID)
{
	return mysql_query(" select * from v_material_ WHERE status_id IN (3)  and info_id='$infoID' ");
}


function selUnit($infoID)
{
	return mysql_query(" select * from tb_unit WHERE status_id=3 and info_id='$infoID' ");
}

function LoadSupplier()
{
	return mysql_query(" select * from tb_supplier WHERE status_id=1  ");
}

function LoadInfo()
{
	return mysql_query("select distinct info_id, info_name, info_id from tb_info_ WHERE status_id IN (1)  ");
}

