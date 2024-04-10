<?php 
     
    $infoID = mysql_real_escape_string(stripslashes($_GET['infoID']));  
	$proID = mysql_real_escape_string(stripslashes($_GET['proID']));
	
	// -------------------------------------------	
$whereclause = "";
//if ($kf_id != 0) $whereclause .= " kf_id = '$kf_id' AND ";
$whereclause .= " status_id IN (3)  AND ";

if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


function LoadInfoSel($infoID) { 
    return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE info_id = '$infoID'  ");
}


$Get_infoName = encrypt_decrypt('decrypt', nr_execute("select distinct  info_name from tb_info WHERE info_id = '$infoID' ")) ;


function LoadProHeader($infoID, $proID) { 
    return mysql_query("select * from v_promotion WHERE info_id = '$infoID' and pro_id='$proID' ");
}

function LoadProCon($infoID, $proID, $proConID) { 
	if ($proConID >0) { $whereclause_pc = " and pc_id = '$proConID' "; }
    return mysql_query("select * from tb_pro_con WHERE status_id =1 and info_id = '$infoID' and pro_id='$proID' $whereclause_pc ");
}

function LoadItemList($infoID) { 
    return mysql_query("select * from v_food_and_drink WHERE info_id = '$infoID'  ");
}

function LoadItemCon($infoID, $proID, $ItemID) { 
	if ($ItemID >0) { $whereclause_pc = " and con_id = '$proConID' "; }
    return mysql_query("select * from v_item_condition WHERE status_id =1 and info_id = '$infoID' and pro_id='$proID' $whereclause_pc ");
}

function LoadItemFree($infoID, $proID, $ItemID) { 
	if ($ItemID >0) { $whereclause_pc = " and con_id = '$proConID' "; }
    return mysql_query("select * from v_item_premium WHERE status_id =1 and info_id = '$infoID' and pro_id='$proID' $whereclause_pc ");
}
