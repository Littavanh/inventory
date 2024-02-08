<?php
$exist = "";
$success = "";
$alert_message = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$GetUsername = $_SESSION['EDPOSV1user_name'];
$getInfoName = encrypt_decrypt('decrypt',nr_execute("SELECT  info_name  FROM tb_info WHERE status_id = 1 $get_infoDefault "));

if ($_SESSION["EDPOSV1SetWorkDate"] !='') {
		$GetWorkDate = $_SESSION["EDPOSV1SetWorkDate"].' '.date('H:i:s');
	} else {
		$GetWorkDate = date('Y-m-d H:i:s');
	}

if (isset($_POST['btncashin']) && $_SESSION['EDPOSV1role_id'] <=4){
	$_SESSION["EDPOSV1cashdrawer_in"] = "cashin";
	$_SESSION["EDPOSV1cashdrawer_infoid"] = $setDefaultInfoID;	 
	$url="Location: ?d=cashdrawer/cashdrawer&infoID=".$setDefaultInfoID;
	header($url);
}

if (isset($_POST['btnCashOut']) && $_SESSION['EDPOSV1role_id'] <=4){
	$_SESSION["EDPOSV1cashdrawer_in"] = "cashout";
	$_SESSION["EDPOSV1cashdrawer_infoid"] = $setDefaultInfoID;	 
	$url="Location: ?d=cashdrawer/cashdrawer&infoID=".$setDefaultInfoID;
	header($url);
}

if (isset($_POST['btncancel']) && $_SESSION['EDPOSV1role_id'] <=4){
	$_SESSION["EDPOSV1cashdrawer_in"] = "";
	$_SESSION["EDPOSV1cashdrawer_infoid"] = "";	 
}


if (isset($_POST['btnSaveCashIn']) && $_SESSION['EDPOSV1role_id'] <=4 ) {
	$txtinfoID = mysql_real_escape_string(stripslashes(trim($_POST['txtinfoID'])));
	$cash_lak = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_kip']))));
	$cash_thb = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_thb']))));
	$cash_usd = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_usd']))));
	$cash_txtremark = mysql_real_escape_string(stripslashes(trim($_POST['txtremark'])));

	if ($cash_lak >= 0 && $cash_thb >=0 && $cash_usd >=0 ) {
		$cash_total = $cash_lak + ($cash_thb*$_SESSION['EDPOSV1rate']['thb']) + ($cash_usd * $_SESSION['EDPOSV1rate']['usd']) ;
	} else {
		if ($cash_lak<0) { $alert_message = "ຈໍານວນເງິນ ກີບ ຮັບເຂົ້າຕ້ອງໃຫຍ່ກວ່າ 0 ...!"; }
		if ($cash_thb<0) { $alert_message = "ຈໍານວນເງິນ ບາດ ຮັບເຂົ້າຕ້ອງໃຫຍ່ກວ່າ 0 ...!"; }
		if ($cash_usd<0) { $alert_message = "ຈໍານວນເງິນ ໂດລາ ຮັບເຂົ້າຕ້ອງໃຫຍ່ກວ່າ 0 ...!"; }
	}
			
	if ($cash_total =='0' || $cash_total=='') {
		$alert_message = "ກະລຸນາປ້ອນຈໍານວນເງິນ, ຈໍານວນເງິນຮັບເຂົ້າຕ້ອງຫຼາຍຫວ່າ 0 ...!";
	} else {
		//insert to cashdrawer
		$rate_id = $_SESSION['EDPOSV1rate']['rate_id'];	
		$rate_thb = $_SESSION['EDPOSV1rate']['thb'];
		$rate_usd = $_SESSION['EDPOSV1rate']['usd'];

		if ($_SESSION["EDPOSV1cashdrawer_in"] == "cashin") {
			sql_execute(" insert into tb_cash_drawer (info_id, cd_date, cd_amount_lak, cd_amount_thb, cd_amount_usd, cd_total_lak, cd_status, rate_thb, rate_usd,remark, user_add, date_add) 
						VALUES('$txtinfoID','$GetWorkDate','$cash_lak','$cash_thb','$cash_usd', '$cash_total','1', '$rate_thb', '$rate_usd', '$cash_txtremark','$GetUsername',NOW()) ");
			//insert cashdrawer in	
			sql_execute(" insert into tb_cashdrawer_log (info_id,open_id,date_open,remark,cd_lak,cd_thb,cd_usd,total_lak,rate_thb,rate_usd,user_open,date_log,typeid,discount_lak, bill_change)
					VALUES ('$txtinfoID','$getOpenID','$GetWorkDate','ເອົາເງິນເຂົ້າ','$cash_lak','$cash_thb','$cash_usd', '$cash_total', '$rate_thb', '$rate_usd', '$GetUsername', NOW(),'1',0,0)"); 
		} else if ($_SESSION["EDPOSV1cashdrawer_in"] == "cashout") { 
			sql_execute(" insert into tb_cash_drawer (info_id, cd_date, cd_amount_lak, cd_amount_thb, cd_amount_usd, cd_total_lak, cd_status, rate_thb, rate_usd,remark, user_add, date_add) 
						VALUES('$txtinfoID','$GetWorkDate','-$cash_lak','-$cash_thb','-$cash_usd', '-$cash_total','1', '$rate_thb', '$rate_usd','$cash_txtremark','$GetUsername',NOW()) ");
			//insert cashdrawer in	
			sql_execute(" insert into tb_cashdrawer_log (info_id,open_id,date_open,remark,cd_lak,cd_thb,cd_usd,total_lak,rate_thb,rate_usd,user_open,date_log,typeid,discount_lak, bill_change)
				VALUES ('$txtinfoID','$getOpenID','$GetWorkDate','ເອົາເງິນອອກ','-$cash_lak','-$cash_thb','-$cash_usd', '-$cash_total', '$rate_thb', '$rate_usd', '$GetUsername', NOW(),'2',0,0)"); 
		}
		
		// unset session
		$_SESSION["EDPOSV1cashdrawer_in"] = "";
		$_SESSION["EDPOSV1cashdrawer_infoid"] = "";	 
		$_SESSION["EDPOSV1cashdrawer_out"] = "";

	}
	 
}
 

$SumSaleCash_CloseBalance = nr_execute(" SELECT SUM(receive_lak) as sale FROM tb_cashlog WHERE status_id = 1 and openid is not null  $get_infoDefault  ");
$SumSaleCash_CurBalance = nr_execute(" SELECT SUM(receive_lak) as sale FROM tb_cashlog WHERE status_id = 1 and openid is null  $get_infoDefault ");
$SumCashIn=nr_execute(" SELECT COALESCE(SUM(cd_total_lak),0) as cashin FROM tb_cash_drawer WHERE cd_status = 1 and openid is null and cd_total_lak>0  $get_infoDefault ");
$SumCashOut=nr_execute(" SELECT COALESCE(SUM(cd_total_lak),0) as cashout FROM tb_cash_drawer WHERE cd_status = 1 and openid is null and cd_total_lak<0  $get_infoDefault ");
$SumCashInOLD=nr_execute(" SELECT COALESCE(SUM(cd_total_lak),0) as cashin FROM tb_cash_drawer WHERE cd_status = 1 and openid is not null and cd_total_lak>0  $get_infoDefault ");
$SumCashOutOLD=nr_execute(" SELECT COALESCE(SUM(cd_total_lak),0) as cashout FROM tb_cash_drawer WHERE cd_status = 1 and openid is not null and cd_total_lak<0  $get_infoDefault ");

$balanceOld= $SumCashIn+$SumCashOut+$SumCashInOLD+$SumCashOutOLD+$SumSaleCash_CloseBalance;
$TotalBalance=$SumCashIn+$SumSaleCash_CloseBalance+$SumSaleCash_CurBalance+$SumCashOut+$SumCashInOLD+$SumCashOutOLD;

$result = Loadservice_sumary($whereclause);

