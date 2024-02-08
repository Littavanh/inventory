<?php 
	$GnfoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	$infoID = $_SESSION['EDPOSV1AddProducinfoID'];	
	$tmpID = $_SESSION['EDPOSV1tmpProductID'];
	$info_id = $_SESSION["EDPOSV1info_id"];
	// -------------------------------------------	

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}

