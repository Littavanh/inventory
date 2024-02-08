<?php


if (isset($_GET['viewyear']) && $_GET['viewyear'] !=''){
	$viewyear = mysql_real_escape_string(stripslashes($_GET['viewyear']));	
	$ipaddressView = $_SERVER['REMOTE_ADDR'];
	$userView = $_SESSION["EDPOSV1user_id"];
	/*========== Clear tmp_report*/

	for ($i = 1; $i <=12; $i++) {
		$GetyearlyReportState = nr_execute(" select Count(*) from tb_tmp_report_view_y where view_month='$i' and view_year='$viewyear' and status_id IN (1) ");
		if ($GetyearlyReportState <= '0') {
			sql_execute("DELETE FROM tb_tmp_report_view_y WHERE view_month='$i' and view_year='$viewyear' and user_view='$userView' and ip_view='$ipaddressView' ");
			/*========== INSERT Recieve and payment */				
			sql_execute("insert into tb_tmp_report_view_y (reportDetail, income, payment, remark, view_month, view_year, user_view, ip_view, status_id)
						SELECT '', 
							(SELECT COALESCE(SUM(pay_total_lak),0) FROM v_cashlog  WHERE MONTH(v_cashlog.date_add) = '$i' and YEAR(v_cashlog.date_add)='$viewyear' ),
							(SELECT COALESCE(SUM(pay_amount),0) as pay_amount FROM v_paytransaction	WHERE payMonth = '$i' and payYear='$viewyear' and status_id IN (1,6,17)),
							'',$i, '$viewyear', '$userView', '$ipaddressView',2
						");
			/*====== Get status */
			$GetStatusClose = nr_execute(" select status_id from v_paytransaction where payMonth='$i' and payYear='$viewyear' and status_id IN (1,6,17) LIMIT 1 ");
			if ($GetStatusClose==17) {
				sql_execute("UPDATE tb_tmp_report_view_y SET status_id=1 WHERE view_month='$i' and view_year='$viewyear' and user_view='$userView' and ip_view='$ipaddressView' and status_id=2 ");
			}	
				
			}
		} 

	


	//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($viewyear != '' )  $whereclause .=" view_year='$viewyear' AND ";
if ($ipaddressView != '' )  $whereclause .=" ip_view='$ipaddressView' AND ";
if ($userView != '' )  $whereclause .=" user_view='$userView' AND ";
 
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($viewyear != NULL){
	$params .= "viewyear=$viewyear&";
}	
 
function LoadReportBody($whereclause) {
	return mysql_query("select * from tb_tmp_report_view_y $whereclause ORDER BY view_month, view_year");
}
$result = LoadReportBody($whereclause);

	
}
	



function ViewMonth() {
	return mysql_query(" SELECT DISTINCT Year(dateRecive) as viewyear FROM v_order_detail WHERE status_id IN (12) ");
}

