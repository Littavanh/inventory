<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
if(isset($_GET['tbID']) && $_SESSION['EDPOSV1role_id'] <= 3 ){
	$_SESSION['EDPOSV1change_table'] = 'change_table';	
	$_SESSION['EDPOSV1ch_tb_id'] = mysql_real_escape_string(stripslashes($_GET['tbID']));
	$_SESSION['EDPOSV1ch_tb_name'] = mysql_real_escape_string(stripslashes($_GET['tbName']));
	$_SESSION['EDPOSV1ch_od_no'] = mysql_real_escape_string(stripslashes($_GET['OdNo']));
	$_SESSION['EDPOSV1ch_total'] = mysql_real_escape_string(stripslashes($_GET['Price']));
	$_SESSION['EDPOSV1ch_zoneName'] = mysql_real_escape_string(stripslashes($_GET['zoneName']));
	$table_name = mysql_real_escape_string(stripslashes($_GET['tbName']));	
}

if(isset($_POST['btncancel']) && $_SESSION['EDPOSV1role_id'] <= 3 ){
	$_SESSION['EDPOSV1change_table'] = '';
	unset($_SESSION['EDPOSV1change_table']);	
	header("Location: index.php?d=change_table/change_table");
}

if (isset($_POST['btnchange_table']) && $_SESSION['EDPOSV1role_id'] <= 3 ) {
	$txttb_id = $_SESSION['EDPOSV1ch_tb_id'];
	$txttb_name = $_SESSION['EDPOSV1ch_tb_name'];
	$txtod_id = $_SESSION['EDPOSV1ch_od_no'];	
	$txttb_id_new = mysql_real_escape_string(stripslashes($_POST['txttb_id_new']));	
	$txtzoneName = $_SESSION['EDPOSV1ch_zoneName'];	


	 
// if (isset($_POST['txttb_id']) && isset($_POST['txtod_id']) && $_POST['txttb_id_new'] != '') { echo "AAAAAAAAAAAA".$txttb_id."new table ".$txttb_id_new; }
	
	if ($txttb_id !='' && $txtod_id !='' && $txttb_id_new != '' ) {
		
	//********************** UPDATE old order to change table ************************************
		// Get tb name 
		$NewTBname = nr_execute(" select tb_name from v_table where tb_id = '$txttb_id_new'");
		$NewZonename = nr_execute(" select zone_name from v_table where tb_id = '$txttb_id_new'");
		//======================
		sql_execute("UPDATE `tb_order_detail` SET tb_id='$txttb_id_new', tb_name='$NewTBname', zone_name='$NewZonename', user_edit = '$user_id', 
			date_edit = NOW(), edit_to = 'change table from $txttb_name' WHERE od_no = '$txtod_id' ");
	//********************* UPDATE old Order id to change table and SET new order ID for new table 
		sql_execute("UPDATE tb_order_id SET user_edit='$user_id' ,date_edit=NOW(),  edit_to = 'change table from $txttb_name'  WHERE od_no = '$txtod_id' ");	
		//$set_order_no = nr_execute("SELECT od_no  FROM tb_order_id WHERE user_add = '$user_id' AND status_id = 13 ORDER BY od_no DESC LIMIT  1 ");
		//$_SESSION["get_tb_od_no"] =  $set_order_no;
		//sql_execute("UPDATE `tb_order_id` SET status_id = 15, user_edit = '$user_id', date_edit = NOW(), edit_to = '$set_order_no' WHERE od_no = '$txtod_id'");			
		//***************** INSERT into order_detail from old order detail 			
		//sql_execute("INSERT INTO `tb_order_detail` (od_no,status_id,tb_id,fd_id,qty,user_add,date_add) 
		//			SELECT '$set_order_no',10,'$txttb_id_new',fd_id,qty,'$user_id',NOW() FROM `tb_order_detail` WHERE  od_no = '$txtod_id'");		
		//***************** SET status table to free and no free for new order 
		sql_execute("UPDATE tb_table SET status_id = 1  WHERE tb_id = '$txttb_id'");	
		sql_execute("UPDATE tb_table SET status_id = 2  WHERE tb_id = '$txttb_id_new'");	
		unset($_SESSION['EDPOSV1change_table']);
		
		//header("Location: index.php?d=change_table/change_table");						
	}
}

