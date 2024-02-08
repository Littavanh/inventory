<?php 
	$GnfoID= $_SESSION['EDPOSV1info_id'];
	$Get_infoName=$_SESSION['EDPOSV1info_name'];

	 
	// -------------------------------------------	

function LoadInfo() { 
	return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}

function LoadKindOfFood($getInfoID) { 
	return mysql_query("select * from v_kind_of_food WHERE info_id='$getInfoID' and status_id IN (3)  ");
}

function LoadAllItem($getInfoID) { 
	return mysql_query("select * from v_food_and_drink WHERE info_id='$getInfoID' and status_id IN (8)  ");
}
