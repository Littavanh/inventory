<?php 

$user_id = $_SESSION["EDPOSV1user_id"];

if ($user_id == 1 || $user_id == 2) {
	$usr =  mysql_query("select * from tb_user WHERE status_id = 3 and user_id = $user_id");
} else if ($user_id == 2){
	$usr =  mysql_query("select * from tb_user WHERE status_id = 3 and user_id != 1 and user_id = $user_id");
} else {
		$usr =  mysql_query("select * from tb_user WHERE user_id = $user_id");
}

/*
function selUser(){
	return mysql_query("SELECT * FROM tb_user");
}	
/*		
function LoadUser($whereclause, $limitclause) {
	return mysql_query("select * from tbl_user $whereclause $limitclause");
}
*/