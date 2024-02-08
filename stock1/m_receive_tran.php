<?php
$Get_infoID = $_SESSION['EDPOSV1info_id'];
$Get_infoName = $_SESSION['EDPOSV1info_name'];

$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));

// -------------------------------------------	
$whereclause = "";
if ($infoID >= '0') {
	$whereclause .= " v_transaction_tran.info_id='$infoID'  AND  ";
}

if ($infoID == '') {
	$whereclause .= " v_transaction_tran.info_id='$Get_infoID'  AND  ";
}

$whereclause .= " Dstatus_id IN (15) AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause) - 5);


function LoadTable($whereclause)
{
	return mysql_query("SELECT DISTINCT  traID, tranID, traDate, reciever, remark,
	(SELECT COUNT(*) FROM v_transaction_tran tbc $whereclause AND tbc.tranID = v_transaction_tran.tranID   ) AS count_list,
	(SELECT SUM(unitQty3) FROM v_transaction_tran tbs  $whereclause AND tbs.tranID = v_transaction_tran.tranID ) * -1 AS count_Iteam,
	tb_info.info_name, v_transaction_tran.info_idF
	FROM v_transaction_tran JOIN tb_info ON tb_info.info_id=v_transaction_tran.info_idF $whereclause ");
}


function LoadInfo()
{
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1) order by info_id ");
}
function LoadV_tramsfer_tran()
{
	return mysql_query("SELECT * FROM `v_transaction_tran`");
}
