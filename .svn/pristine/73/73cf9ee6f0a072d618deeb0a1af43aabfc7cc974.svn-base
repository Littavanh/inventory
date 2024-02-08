<?php
$exist = "";
$success = "";
$alert_message = "";
$user_id = $_SESSION["EDPOSV1user_id"];
$openID = $_SESSION['EDPOSV1OpendID'];  

if (isset($_POST['btncancel']) && $_SESSION['EDPOSV1role_id'] <=4){
	unset($_SESSION["EDPOSV1sh_Rcalulate"]);
}

 
 
   
if (isset($_POST['btncalculate_sh']) && $_SESSION['EDPOSV1role_id'] <=4) {
	$_SESSION["EDPOSV1sh_Rcalulate"] = "Rsh_calulate";
	if (isset($_SESSION["EDPOSV1MADD_RCusID_v"])) {
		$_SESSION["EDPOSV1MADD_RCusID"] = $_SESSION["EDPOSV1MADD_RCusID_v"];
	}
}


if (isset($_POST['btncalculate']) && $_SESSION['EDPOSV1role_id'] <=4 ) {
	$_SESSION["EDPOSV1pay_Rlak"] = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_kip']))));
	$_SESSION["EDPOSV1pay_Rthb"] = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_thb']))));
	$_SESSION["EDPOSV1pay_Rusd"] = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['paid_usd']))));
	$_SESSION["EDPOSV1pay_RDiscount"] = str_replace(",","",mysql_real_escape_string(stripslashes(trim($_POST['discount_p']))));
	$_SESSION["EDPOSV1remark_Rpay"] =  mysql_real_escape_string(stripslashes(trim($_POST['txtremark'])));
	/* $_SESSION["EDPOSV1pay_Rtotal"] = ( ($_SESSION["EDPOSV1pay_Rlak"]*$_SESSION['EDPOSV1rate']['thb']) + $_SESSION["EDPOSV1pay_Rthb"] + 
		(($_SESSION["EDPOSV1pay_Rusd"] * $_SESSION['EDPOSV1rate']['usd']))/ $_SESSION['EDPOSV1rate']['thb']); */
	$_SESSION["EDPOSV1pay_Rtotal"] = ( $_SESSION["EDPOSV1pay_Rlak"] + ($_SESSION["EDPOSV1pay_Rthb"]*$_SESSION['EDPOSV1rate']['thb']) + 
		($_SESSION["EDPOSV1pay_Rusd"] * $_SESSION['EDPOSV1rate']['usd']) )-$_SESSION["EDPOSV1pay_RDiscount"];

	
	
	if ($_SESSION["EDPOSV1pay_Rtotal"] =='0' ) {
		$alert_message = "ກະລຸນາປ້ອນຈໍານວນເງິນ ...!";
		$_SESSION['EDPOSV1sh_Rcalulate'] = "Rsh_payment";
	} else {
		$_SESSION['EDPOSV1sh_Rcalulate'] = "Rsh_payment";
	}
	 
}

if (isset($_POST['btnadd_mn']) && $_SESSION['EDPOSV1role_id'] <=4) {
	$rate_id = $_SESSION['EDPOSV1rate']['rate_id'];
	$CusID = $_SESSION['EDPOSV1MADD_RCusID'];		
	$pay_lak = $_SESSION["EDPOSV1pay_Rlak"];
	$pay_thb = $_SESSION["EDPOSV1pay_Rthb"];
	$pay_usd = $_SESSION["EDPOSV1pay_Rusd"];
	$pay_total = $_SESSION["EDPOSV1pay_Rtotal"];
	$pay_discount = $_SESSION["EDPOSV1pay_RDiscount"];
	$remark_pay=$_SESSION["EDPOSV1remark_Rpay"];
	$POTotalBalance = $_SESSION['EDPOSV1MADD_RTotalBalance'];

 

	if ($_SESSION["EDPOSV1MADD_RCusID"] != "" && $_SESSION['EDPOSV1rate']['rate_id'] != "" && $_SESSION["EDPOSV1pay_Rtotal"] !=0 ) {
		/* Loop view sum bill byb bill ID that credit > 0 */
 	 
        $rs_cus_credit = mysql_query(" SELECT * FROM v_cus_credit WHERE amount_credit>0 and cusID='$CusID' order by od_no ASC ");

        while ($row = mysql_fetch_array($rs_cus_credit)) { 
        	$GetInfoID = $row["info_id"];
        	$od_no = $row["od_no"];
        	$CusID = $row["cusID"];
        	$amt_credit = $row["amount_credit"];
//        	$GetBillTotal = $row["amount_credit"];

        	if ($_SESSION["EDPOSV1pay_Rtotal"] > 0) {
        		if ( ($_SESSION["EDPOSV1pay_Rtotal"]+$_SESSION["EDPOSV1pay_RDiscount"])>=$amt_credit ) { 
        			$amt_credit_new = $amt_credit; 
        			$receive_lak = $amt_credit-$_SESSION["EDPOSV1pay_RDiscount"]; 
        		} else {
        			$amt_credit_new = $_SESSION["EDPOSV1pay_Rtotal"]+$_SESSION["EDPOSV1pay_RDiscount"];
        			$receive_lak = $_SESSION["EDPOSV1pay_Rtotal"]; 
        		}

	        	sql_execute("INSERT INTO tb_cashlog(info_id, od_no,discount_lak,pay_lak,pay_thb,pay_usd,pay_total,rate_id,status_id,user_add,date_add, remark, 
							bill_total, openID, amount_credit, cusID, bill_change, receive_lak) 
						VALUES('$GetInfoID', '$od_no','$pay_discount','$pay_lak','$pay_thb','$pay_usd','$amt_credit_new','$rate_id','1','$user_id',NOW(), '$remark_pay',
						 '0', '$openID', '-$amt_credit_new', '$CusID', '$pay_discount', '$receive_lak') "); 

						 
	        	$_SESSION["EDPOSV1pay_Rtotal"] = $_SESSION["EDPOSV1pay_Rtotal"] - $amt_credit;
	        }
        }		

		$_SESSION["EDPOSV1MADD_RCusID_v"] = $_SESSION["EDPOSV1MADD_RCusID"];
		unset($_SESSION['EDPOSV1sh_Rcalulate']);				 
		unset($_SESSION["EDPOSV1MADD_RCusID"]);
	}
}


if (isset($_SESSION["EDPOSV1MADD_RCusID_v"]) && $_SESSION['EDPOSV1role_id'] <=4) {
	$_SESSION["EDPOSV1MADD_RTotalBalance"]=0;	
	$cusID = $_SESSION["EDPOSV1MADD_RCusID_v"];

	$_SESSION["EDPOSV1MADD_RTotalBalance"] = nr_execute(" SELECT amount_credit FROM v_customers WHERE cusID='$cusID' ");
	$_SESSION["EDPOSV1MADD_RCusName"] = nr_execute(" SELECT cusName FROM v_customers WHERE cusID='$cusID' ");

}


$result = Loadservice_sumary($whereclause);