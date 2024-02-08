<?php 

	$user_id_form = mysql_real_escape_string(stripslashes($_GET['user_id_form']));
	$username_form = mysql_real_escape_string(stripslashes($_GET['username_form']));
	$first_name_form = mysql_real_escape_string(stripslashes($_GET['first_name_form']));
	$last_name_form = mysql_real_escape_string(stripslashes($_GET['last_name_form']));
	$role_id_form = mysql_real_escape_string(stripslashes($_GET['role_id_form']));
	
	// -------------------------------------------	
$whereclause = "";
if ($username_form != NULL) $whereclause .= "username LIKE '%$username_form%' AND ";
if ($first_name_form !=NULL) $whereclause .= "first_name LIKE '%$first_name_form%' AND ";
$whereclause .= "user_id != 1 AND  ";



if ($whereclause != "") $whereclause = "WHERE " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($username_form != NULL) $params .= "username=$username_form&";
if ($first_name_form != null) $params .= "first_name=$first_name_form&";
	
 
		
function LoadAllUser($whereclause) {
	return mysql_query("select DISTINCT user_id, username, first_name, last_name, role_id, pricesaleID, info_id  from v_user $whereclause");
}


function selUser_role(){
	$sql1 = "select * from tb_user_role WHERE role_id != 1";
	$result1 = mysql_query($sql1);
	return $result1;
}


function LoadCompanyProfile() {
	return mysql_query("select DISTINCT info_id, info_name from tb_info WHERE info_id >0 and status_id =1 ");
}
