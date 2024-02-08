<?php	

include("../config.php");
	session_start();
	include("../function_sel.php");
	include("m_yearly.php");
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
	          <div align="center"><strong><font size="+1">ບົດສະຫຼຸບປະຈໍາປີ</font></strong></div>
	          <div align="center"><strong><font size="2"><?=$viewyear  ?></font></strong></div>
	        </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="1">
		  <tr class="">
			<td width=""><font size="2">ລ/ດ</font></td>
			<td width=""><font size="2"><strong>ເດືອນ/ປີ</strong></font></td>
            <td align="" width=""><font size="2">ລາຍຮັບ</font>&nbsp;</td>           
			<td width="" align=""><font size="2"><strong>ລາຍຈ່າຍ</strong></font>&nbsp;</td>
			<td width="" align=""><font size="2"><strong>ສ່ວນຕ່າງ</strong></font>&nbsp;</td>
		  </tr>	 
							<?php 			
								$i=1;
								$sum_recieve=  0;
								$sum_payment=  0;
								$sum_intensive=  0;
								while ($item = mysql_fetch_array($result)) { 								 
									$sum_recieve=  $sum_recieve+$item['income'];								
									$sum_payment=  $sum_payment+$item['payment'];
									$sum_intensive=  $sum_recieve-$sum_payment;								
							?>
			<tr>										
				<td><font size="2"><?= ($i+$start) ?></font></td>		
				<td><font size="2"><?= $item['view_month'].'/'.$item['view_year'] ?></font></td>              
				<td align="right"><font size="2"><?= number_format($item['income']) ?></font>&nbsp;</td>  
				<td align="right"><font size="2"><?= number_format($item['payment']) ?></font>&nbsp;</td>  
				<td align="right"><font size="2"><?= number_format($item['income']-$item['payment']) ?></font>&nbsp;</td>  
			</tr> 				
			<?php $i++; } ?>	
            <tr>
				<td colspan="2" ><strong><font size="2">ລວມ</strong></td>							 
				<td align="right"><font size="2"><?= number_format($sum_recieve) ?></font>&nbsp;</td>	
				<td align="right"><font size="2"><?= number_format($sum_payment) ?></font>&nbsp;</td>	
				<td align="right"><font size="2"><?= number_format($sum_intensive) ?></font>&nbsp;</td>				
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