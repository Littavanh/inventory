<?php
$user_id = $_SESSION["EDPOSV1user_id"];
$info_id = $_SESSION["EDPOSV1info_id"];

if(isset($_POST["btnAdjustPrice"]) && $_SESSION['EDPOSV1role_id'] <='2' ) {
	
	$infoID = $_SESSION["EDPOSV1PriceAdjust_infoid"]; 
	$adjustType = $_SESSION["EDPOSV1PriceAdjust_type"]; 
	$txtprice_adjust1 = str_replace(",","",$_POST['txtprice_adjust1']);
	$txtprice_adjust2 = str_replace(",","",$_POST['txtprice_adjust2']);
	$txtRemarkF = mysql_real_escape_string(stripslashes($_POST['txtRemarkF'])); 
	$txtUpdateType = mysql_real_escape_string(stripslashes($_POST['txtUpdateType'])); 
	
	$url1_cur="index.php?d=price/adjust&infoID=$infoID&type=$adjustType";
	if ($txtUpdateType == '0' || $txtUpdateType == '1' || $txtUpdateType == '') {
		$_SESSION["EDPOSV1UpdatePriceType"] = '0';
		$updateCMM = " price=price+$txtprice_adjust1, price2=price2+$txtprice_adjust2 ";
	} else if ($txtUpdateType == '2') {
		//price+((price*10)/100)
		$_SESSION["EDPOSV1UpdatePriceType"] = '2';
		$updateCMM = " price=price+((price*$txtprice_adjust1)/100), price2=price2++((price*$txtprice_adjust2)/100) ";
	}
	
	if ($infoID >0 && $adjustType>0 && ($txtprice_adjust1 >0 || $txtprice_adjust2>0 || $txtprice_adjust1 <0 || $txtprice_adjust2<0 )) {
		for ($i = 0; $i < count($_POST['type']); $i++) {
			if ($adjustType=="1") {
				sql_execute(" 	UPDATE tb_recipe SET  $updateCMM WHERE info_id='$infoID' and status_id = '3' ");		
			} else if ($adjustType=="2") {
				$get_kf_id = $_POST['cbSel'][$i];
				sql_execute(" 	UPDATE tb_recipe SET  $updateCMM WHERE info_id='$infoID' and status_id = '3' and fd_id in (SELECT fd_id from tb_food_drink WHERE kf_id = '$get_kf_id')");		
			} else if ($adjustType=="3") { 
				$get_fd_id = $_POST['cbSel'][$i];
				sql_execute(" 	UPDATE tb_recipe SET  $updateCMM WHERE info_id='$infoID' and status_id = '3' and fd_id= '$get_fd_id'");		
			}
			//$get_kf_id = $_POST['cbSel'][$i];

			//echo "get_kf_id:".$get_kf_id."<br>";			 
		}		
		//header("URL=$url1_cur");
		header("Location: $url1_cur");
		//echo $url1_cur;
	}
}


 