<?php
$GnfoID = $_SESSION['EDPOSV1info_id'];
$Get_infoName = $_SESSION['EDPOSV1info_name'];

$infoID = $_SESSION['EDPOSV1AddProducinfoID'];
$info_id = $_SESSION["EDPOSV1info_id"];
// -------------------------------------------	


if (isset($_GET["receive"]) && isset($_GET["tranID"]) && isset($_GET["infoID"]) && isset($_GET["infoIDF"]) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) {
	$Tranid = mysql_real_escape_string(stripslashes(base64_decode($_GET['receive'])));
	$Tranid = substr($Tranid, 0, strlen($Tranid) - 11);
	$_SESSION['EDPOSV1_SetTranID'] = $Tranid;

	$_SESSION['EDPOSV1_RtranID'] = $_GET["tranID"];
	$_SESSION['EDPOSV1_RinfoID'] = $_GET["infoID"];
	$_SESSION['EDPOSV1_RinfoIDF'] = $_GET["infoIDF"];

	header("Location: ?d=stock/tran_detail");
}

function LoadTranHeader($Tranid)
{
	return mysql_query("select * from tb_transactionh WHERE traID='$Tranid'  ");
}

function LoadTranDetail($Tranid)
{
	return mysql_query("select * from v_transaction_tran WHERE tranID='$Tranid' and Dstatus_id IN (15) ");
}



function LoadInfo()
{
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}



$Tranid = $_SESSION['EDPOSV1_SetTranID'];
$rs_TranHead = LoadTranHeader($Tranid);
while ($row = mysql_fetch_array($rs_TranHead, MYSQL_ASSOC)) {
	$_SESSION['EDPOSV1RTransferDate'] = $row['traDate'];
	$_SESSION['EDPOSV1RTransferInfoT'] = $row['info_id'];
	$_SESSION['EDPOSV1RTransfertxtransfer'] = $row['reciever'];
	$_SESSION['EDPOSV1RTransferRemark'] = $row['remark'];
	$_SESSION['EDPOSV1RTransferfilename'] = $row['filename'];
}

// get info ຈາກສາງຕົ້ນທາງ
function LoadInfoByID($info_ID)
{
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1) and info_id='$info_ID'  ");


	
}
$info_id =$_SESSION['EDPOSV1RTransferInfoT'];
$rs_Info= LoadInfoByID($info_id);
while($row = mysql_fetch_array($rs_Info,MYSQL_ASSOC)){
	$_SESSION['EDPOSV1_infoNameSend'] = $row['info_name'];
}

// get info ຂໍ້ມູນຕ່າງຈາກຕົ້ນທາງ
function LoadInfoDif_ByID($info_ID)
{
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1) and info_id<>'$info_ID'  ");
}
$info_id =$_SESSION['EDPOSV1RTransferInfoT'];
$rs_Info= LoadInfoDif_ByID($info_id);
while($row = mysql_fetch_array($rs_Info,MYSQL_ASSOC)){
	$_SESSION['EDPOSV1_infoNameReceive'] = $row['info_name'];
}

