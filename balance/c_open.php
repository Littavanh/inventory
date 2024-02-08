<?php
$exist = "";
$success = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$Get_infoID= $_SESSION['EDPOSV1info_id'];
$GetUsername = $_SESSION['EDPOSV1user_name'];



if(isset($_POST["btnSave"]) && $_SESSION['EDPOSV1role_id'] != ''){ 			
	$txtopenID = mysql_real_escape_string(stripslashes($_POST['txtopenID']));
	$txtopenDate = mysql_real_escape_string(stripslashes($_POST['txtopenDate']));
	$txtCloseDate = mysql_real_escape_string(stripslashes($_POST['txtCloseDate']));
	$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark']));
	$rate_id = $_SESSION['EDPOSV1rate']['rate_id'];		
	$rate_thb = $_SESSION['EDPOSV1rate']['thb'];
	$rate_usd = $_SESSION['EDPOSV1rate']['usd'];
	
	//============ UPDATE Close date
	sql_execute("UPDATE tb_opendate SET closeDate=NOW(), remark_close='$txtRemark', status_id=2, datetimeclose=NOW() WHERE openID='$txtopenID' and info_id = '$Get_infoID' ");	
	
	// insert cashdrawer log current sale 
	$Sum_discount_lak = nr_execute(" SELECT SUM(discount_lak) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$Sum_billChange = nr_execute(" SELECT SUM(bill_change) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$Sum_pay_lak = nr_execute(" SELECT SUM(pay_lak) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$Sum_pay_thb = nr_execute(" SELECT SUM(pay_thb) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$Sum_pay_usd = nr_execute(" SELECT SUM(pay_usd) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$Sum_receive_lak = nr_execute(" SELECT SUM(receive_lak) FROM tb_cashlog WHERE status_id = 1 and openid is null and info_id = '$Get_infoID'  ");
	$SGetDatetimeOpen = nr_execute(" SELECT datetimeopen FROM v_opendate WHERE status_id IN (1,2,5) and info_id = '$Get_infoID' order by openID DESC LIMIT 1   ");
	$remark_cashdrawer="ຍອດຂາຍປະຈໍາກະ ".$txtopenID;
	$GetUserOpen = nr_execute(" SELECT username FROM v_opendate WHERE openID='$txtopenID' and  info_id = '$Get_infoID' ");

	sql_execute(" insert into tb_cashdrawer_log (info_id, open_id, date_open, date_close, remark, cd_lak, cd_thb, cd_usd, total_lak, rate_thb, rate_usd, user_open, date_log, user_close, typeid, 
				discount_lak, bill_change)
				VALUES ('$Get_infoID', '$txtopenID', '$SGetDatetimeOpen', NOW(), '$remark_cashdrawer', '$Sum_pay_lak', '$Sum_pay_thb', '$Sum_pay_usd', '$Sum_receive_lak', '$rate_thb', 
				'$rate_usd', '$GetUserOpen', NOW(), '$GetUsername', '3', '$Sum_discount_lak', '$Sum_billChange')");
	//============ UPDATE cash log
	sql_execute("UPDATE tb_cashlog SET openID='$txtopenID' WHERE openid IS NULL  and info_id = '$Get_infoID' ");	
	//============ UPDATE cashdrawer
	sql_execute("UPDATE tb_cash_drawer SET openid='$txtopenID' WHERE openid IS NULL  and info_id = '$Get_infoID' ");

	//============ INSERT new balance
	/* sql_execute("INSERT INTO tb_opendate (openDate, remark,status_id, user_add, date_add)
				VALUES (NOW(), 'Auto Open Transaction','1', '$user_id', NOW()) ");

	sql_execute("UPDATE tb_info SET bill_no='100' ");*/
	 
	/*=== insert stock */
	//=======SUM material by material ID
	$SumResult = SumMaterial();
	while ($item = mysql_fetch_array($SumResult)) {
		$whereGroupID = $item['materialID'];
		$cvgroup11 = 0;
		$cvgroup12 = 0;
		$cvgroup21 = 0;
		$cvgroup22 = 0;
		$sumPurPrice = $sumPurPrice+$item['pur_price'];
		if  ($item['cap1'] !=0){
			$cvgroup11 = $item['unitQty3']%$item['cap1'];
			$cvgroup12 = ($item['unitQty3']-($cvgroup11))/$item['cap1'];
			$cvgroup21 = $cvgroup11%$item['cap2'];
			$cvgroup22 = ($cvgroup11 - $cvgroup21)/$item['cap2'];
		} else if ($item['cap2'] !=0) {
			$cvgroup11 = 0;
			$cvgroup12 = 0;
			$cvgroup21 = $item['unitQty3']%$item['cap2'];
			$cvgroup22 = ($item['unitQty3'] - $cvgroup21)/$item['cap2'];					
		} else if ($item['cap3'] !=0) {
			$cvgroup11 = 0;
			$cvgroup12 = 0;
			$cvgroup21 = $item['unitQty3'];
			$cvgroup22 = 0;
		}
		$exp_date=$item['exp_date'];
		$materialID=$item['materialID'];
		$materialName=$item['materialName'];
		$unitName1=$item['unitName1'];
		$unitName2=$item['unitName2'];
		$unitName3=$item['unitName3'];
		$pur_price = $item['pur_price'];
		sql_execute("insert into tb_opendate_d (openID, exp_date, materialID, materialName, unitName1, unitQty1, unitName2, unitQty2, unitName3, unitQty3,
					status_id, user_add, date_add, pur_price, openTypeID, info_id)
					VALUES ('$txtopenID', '$exp_date', '$materialID', '$materialName', '$unitName1', '$cvgroup12', '$unitName2', '$cvgroup22', '$unitName3', '$cvgroup21', 
					 1, '$user_id', NOW(), '$pur_price','2', '$Get_infoID') ");
	}


				
	$success = " ປິດງວດວັນທີ: ".$txtopenDate." - ".$txtCloseDate." ສໍາເລັດ";	 
}

if(isset($_POST["btnSaveOpenStock"])){ 				
	$txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemarkO']));	
	$txtopenID = mysql_real_escape_string(stripslashes($_POST['txtopenIDO']));
	//============ INSERT new balance
	//sql_execute("INSERT INTO tb_opendate (openDate, remark,status_id, user_add, date_add)
	//			VALUES (NOW(), '$txtRemark','1', '$user_id', NOW()) ");

	// sql_execute("UPDATE tb_opendate SET remark='$txtRemark', status_id = 1 WHERE status_id='5' and  openID='$txtopenID' ");

		//============ INSERT new balance
	sql_execute("INSERT INTO tb_opendate (openDate, remark,status_id, user_add, date_add, info_id)
				VALUES (NOW(), '$txtRemark','1', '$user_id', NOW(), '$Get_infoID') ");

	$MaxOpenID = nr_execute("SELECT MAX(openID) FROM v_opendate WHERE status_id = 1");

	sql_execute("UPDATE tb_info SET bill_no='100' ");

	$SumResult = SumMaterial();
	while ($item = mysql_fetch_array($SumResult)) {
		$whereGroupID = $item['materialID'];
		$cvgroup11 = 0;
		$cvgroup12 = 0;
		$cvgroup21 = 0;
		$cvgroup22 = 0;
		$sumPurPrice = $sumPurPrice+$item['pur_price'];
		if  ($item['cap1'] !=0){
			$cvgroup11 = $item['unitQty3']%$item['cap1'];
			$cvgroup12 = ($item['unitQty3']-($cvgroup11))/$item['cap1'];
			$cvgroup21 = $cvgroup11%$item['cap2'];
			$cvgroup22 = ($cvgroup11 - $cvgroup21)/$item['cap2'];
		} else if ($item['cap2'] !=0) {
			$cvgroup11 = 0;
			$cvgroup12 = 0;
			$cvgroup21 = $item['unitQty3']%$item['cap2'];
			$cvgroup22 = ($item['unitQty3'] - $cvgroup21)/$item['cap2'];					
		} else if ($item['cap3'] !=0) {
			$cvgroup11 = 0;
			$cvgroup12 = 0;
			$cvgroup21 = $item['unitQty3'];
			$cvgroup22 = 0;
		}
		$exp_date=$item['exp_date'];
		$materialID=$item['materialID'];
		$materialName=$item['materialName'];
		$unitName1=$item['unitName1'];
		$unitName2=$item['unitName2'];
		$unitName3=$item['unitName3'];
		$pur_price = $item['pur_price'];
		sql_execute("insert into tb_opendate_d (openID, exp_date, materialID, materialName, unitName1, unitQty1, unitName2, unitQty2, unitName3, unitQty3,
					status_id, user_add, date_add, pur_price, openTypeID, info_id)
					VALUES ('$MaxOpenID', '$exp_date', '$materialID', '$materialName', '$unitName1', '$cvgroup12', '$unitName2', '$cvgroup22', '$unitName3', '$cvgroup21', 
					 1, '$user_id', NOW(), '$pur_price','1', '$Get_infoID') ");
	}


	 
	$success = " ປິດງວດວັນທີ: ".$txtopenDate." - ".$txtCloseDate." ສໍາເລັດ";	 
}



$result = LoadTable($Get_infoID, $limitclause);