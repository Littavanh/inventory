<?php	

include("../config.php");
	session_start();
	include("../function_sel.php");
	include("m_cash_log.php");	
//$getBillNumber = nr_execute("SELECT  billNo FROM tb_order_id WHERE od_no = $bill_id and info_id = '$infoID' ");
$getInfoName = encrypt_decrypt('decrypt',nr_execute("SELECT  info_name  FROM tb_info WHERE info_id = '$infoID' "));
//$getInfoAddr = encrypt_decrypt('decrypt',nr_execute("SELECT  info_addr  FROM tb_info WHERE info_id = '$infoID' "));
//$getInfoTel = encrypt_decrypt('decrypt',nr_execute("SELECT  info_tel  FROM tb_info WHERE info_id = '$infoID' "));
$getInfoLogo = encrypt_decrypt('decrypt',nr_execute("SELECT  info_logo  FROM tb_info WHERE info_id = '$infoID' "));	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Report</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="../css/print-slip.css" media="print" />		
		<link type="text/css" rel="stylesheet" href="../css/formatpage-slip.css"/>	
		<script src = "../js/Action.js" type = "text/javascript"></script>		
			<script>
				function loadedCloseWindows() {   window.setTimeout(CloseMe, 100);	}
				function CloseMe() 	{  window.close();	}
			</script>
		</head>

 <body onLoad="printWindow(); loadedCloseWindows()">
<div id="pagesize">
	<div id="headbox">	
		<div id="topic">
<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td colspan="3">
        	<!-- <div align="center"><img src="../logo/<?=$getInfoLogo?>" width="100" height="80"></div> -->
       	  <div align="center"><font size="+2">
       	    <?=$getInfoName  ?>
   	      </font></div>        	</td>
        </tr>
        <tr>
       <td colspan="3" align="right">
       		 <font size="2">ເວລາພິມ:&nbsp;<?=date('d/m/Y h:m:s') ?></font> 
       		</td>
        </tr>
        <tr>
	       	<td colspan="3">
	          <div align="center"><strong><font size="+1">ລາຍງາຍການຮັບເງິນ</font></strong></div>
	          <div align="center"><strong><font size="2"><?=$startdate.' - '.$enddate ?></font></strong></div>
	        </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="1">
		  <tr class="">
			<td width=""><font size="2">ລ/ດ</font></td>
			<td width=""><font size="2"><strong>ເລກທີ</strong></font></td>
            <td align="" width=""><font size="2">ມູນຄ່າໃບບີນ(ກີບ)</font>&nbsp;</td>           
			<td width="" align=""><font size="2"><strong>ສ່ວນຫຼຸດ(ກີບ)</strong></font>&nbsp;</td>
			<td width="" align=""><font size="2"><strong>ລວມຮັບ(ກີບ)</strong></font>&nbsp;</td>
			<td width=""><font size="2"><strong>ຜູ້ຮັບ</strong></font></td>
		  </tr>	 
			<?php 			
				$i=1;
								$sumDis_LAK = 0;
								$sumPay_LAK = 0;
								$sumPay_USD = 0;
								$sumPay_THB = 0;
								$sumPayTotal_LAK = 0;
								$sumBill_LAK = 0;
								$sumChange = 0;
								while ($item = mysql_fetch_array($result)) { 
									$sumDis_LAK = $sumDis_LAK + $item['discount_lak'];
									$sumPay_LAK = $sumPay_LAK + $item['pay_lak'];
									$sumPay_USD = $sumPay_USD + $item['pay_usd'];
									$sumPay_THB = $sumPay_THB + $item['pay_thb'];

									/*$returnMoney = ($item['pay_total_lak']+$item['discount_lak']) - ($item['bill_total']-$item['discount_lak']);
									if ($returnMoney <=0) {										
										$returnMoney =0;
									} */

									$returnMoney = $item['bill_change'];
									$sumChange = $sumChange + $returnMoney;
									$sumBill_LAK = $sumBill_LAK + $item['bill_total'];
									/*$SetTotalPay = $item['pay_total_lak']+$item['discount_lak']-$returnMoney; */
									$SetTotalPay = $item['receive_lak'];
									$sumPayTotal_LAK = $sumPayTotal_LAK + $SetTotalPay;
								?>
									<tr>
										 
										<td><font size="2"><?= ($i+$start) ?></font></td>		
										<td><font size="2"><?= $item['billNo'] ?></font></td>
										<td align="right"><font size="2"><?= number_format($item['bill_total']) ?></font>&nbsp;</td>
						                <td align="right"><font size="2"><?= number_format($item['discount_lak']) ?></font>&nbsp;</td>                
						                <td align="right"><font size="2"><?= number_format($SetTotalPay) ?></font>&nbsp;</td>  
						                <td><font size="2"><?= $item['username'] ?></font></td>
									</tr> 				
							<?php $i++; } ?>	
            <tr>
							  <td colspan="2" ><strong><font size="2">ລວມ</strong></td>							 
										<td align="right"><font size="2"><?= number_format($sumBill_LAK) ?></font>&nbsp;</td>
						                <td align="right"><font size="2"><?= number_format($sumDis_LAK) ?></font>&nbsp;</td>                
						                <td align="right"><font size="2"><?= number_format($sumPayTotal_LAK) ?></font>&nbsp;</td>  
						                <td></td>
					  		</tr>           
		</table>		
	  
        <p align="right"><font size="2">ຜູ້ລາຍງານ&nbsp;&nbsp;</font></p>        
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>