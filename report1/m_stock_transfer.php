<?php
// date_default_timezone_set('Asia/Vientiane');


$infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));
$startdate = mysql_real_escape_string(stripslashes($_GET['startdate']));
$enddate = mysql_real_escape_string(stripslashes($_GET['enddate']));

$Get_infoID = $_SESSION['EDPOSV1info_id']= $infoID;
$Get_infoName = $_SESSION['EDPOSV1info_name'];
//===============	
//------------------------------------------------ Building search clause // 	
list($start_year, $start_month, $start_day) = explode('-', $startdate);
$whereclause = "";

if ($startdate != NULL ) {
	$whereclause .= "(YEAR(date_tran)='$start_year' AND MONTH(date_tran) = '$start_month' ) AND ";


} else {
	$whereclause .= "(DATE(date_tran)  DATE(NOW())) AND ";

	
}
if ($infoID != '0') $whereclause .= " info_id='$Get_infoID'  AND  ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause) - 5);


$params = "";
if ($startdate != NULL) {
	$params .= "startdate=$startdate&infoID=$infoID";
}

function LoadTable($whereclause, $whereGroupID)
{
	
	// return mysql_query("select * from v_transaction $whereclause and transferID = '$whereGroupID' and active_id IN (1,2) and tranType IN (3,4,6,19)  ORDER BY transferID, date_add");
	return mysql_query("select * from v_outwarehouse_ $whereclause ");

}

function LoadInfo()
{
	return mysql_query("select distinct info_id, info_name from tb_info_ WHERE status_id IN (1)  ");
}

//=======SUM material by material ID
function SumMaterial($whereclause)
{
	
	// return mysql_query("SELECT tranID, traDate, reciever, remark, username, date_add, staffName, Dremark, transferID, date_tran
	// 						from v_transaction $whereclause and  active_id IN (1,2) and tranType IN (3,4,6) GROUP BY transferID ");
	
	return mysql_query("select * from v_outwarehouse_ $whereclause GROUP by materalID" );
}

$SumResult = SumMaterial($whereclause);


function sum_by_cur($curName,$whereclause){

	$resual = mysql_query( "SELECT  SUM(unitQTY3 *`pur_price`) AS sum_money
	FROM `v_outwarehouse_`
	 $whereclause  and `cur_name`='$curName'	");
	return mysql_fetch_array($resual)['sum_money'];
}