<?php


if (isset($_GET['viewmonth']) && $_GET['viewmonth'] !=''){
	$viewmonth = mysql_real_escape_string(stripslashes($_GET['viewmonth']));
	$month= substr($viewmonth,0,strrpos($viewmonth,'/'));
	$Year= substr($viewmonth,strrpos($viewmonth,'/')+1);
	$ipaddressView = $_SERVER['REMOTE_ADDR'];
	$userView = $_SESSION["EDPOSV1user_id"];
	/*========== Clear tmp_report*/
	$GetMonthlyReportState = nr_execute(" select Count(*) from tb_tmp_report_view where view_month='$month' and view_year='$Year' and status_id IN (1) ");
	if ($GetMonthlyReportState <= '0') {
		sql_execute("DELETE FROM tb_tmp_report_view WHERE view_month='$month' and view_year='$Year' and user_view='$userView' and ip_view='$ipaddressView' ");
			/*========== INSERT Recieve */
		sql_execute("insert into tb_tmp_report_view (reportDetail, sum_amount, remark, type_income, view_month, view_year, user_view, ip_view, status_id)
					SELECT 'ລາຍຮັບຈາກການຂາຍ ປະຈໍາເດືອນ', SUM(pay_total_lak),'',1, MONTH(v_cashlog.date_add), YEAR(v_cashlog.date_add), '$userView', '$ipaddressView',2
					FROM v_cashlog 
					WHERE MONTH(v_cashlog.date_add) = '$month' and YEAR(v_cashlog.date_add)='$Year' ");
		/*========= INSERT payment */
		sql_execute("insert into tb_tmp_report_view (reportDetail, sum_amount, remark, type_income, view_month, view_year, user_view, ip_view, status_id)
					SELECT paymentName, SUM(pay_amount) as pay_amount, remark, 2, payMonth, payYear, '$userView', '$ipaddressView',2
					FROM v_paytransaction
					WHERE payMonth = '$month' and payYear='$Year' and status_id IN (1,6,17)
					GROUP BY paymentID, payMonth, payYear  ");
		/*====== Get status */
		$GetStatusClose = nr_execute(" select status_id from v_paytransaction where payMonth='$month' and payYear='$Year' and status_id IN (1,6,17) LIMIT 1 ");
		if ($GetStatusClose==17) {
			sql_execute("UPDATE tb_tmp_report_view SET status_id=1 WHERE view_month='$month' and view_year='$Year' and user_view='$userView' and ip_view='$ipaddressView' and status_id=2 ");
		}
	}


	//------------------------------------------------ Building search clause // 	
$whereclause = "";
if ($month != '' )  $whereclause .=" view_month='$month' AND ";
if ($Year != '' )  $whereclause .=" view_year='$Year' AND ";
if ($ipaddressView != '' )  $whereclause .=" ip_view='$ipaddressView' AND ";
if ($userView != '' )  $whereclause .=" user_view='$userView' AND ";
 
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
if ($viewmonth != NULL){
	$params .= "viewmonth=$viewmonth&";
}	

 
function LoadReportBody($whereclause) {
	return mysql_query("select * from tb_tmp_report_view $whereclause ");
}
$result = LoadReportBody($whereclause);

	
}
	



function ViewMonth() {
	return mysql_query(" SELECT DISTINCT CONCAT(MONTH(dateRecive),'/', YEAR(dateRecive) ) as viewMonth FROM v_order_detail WHERE status_id IN (12) ");
}

