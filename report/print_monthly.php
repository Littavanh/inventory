<?php	

include("../config.php");
	session_start();
	include("../function_sel.php");
	include("m_monthly.php");	
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
	          <div align="center"><strong><font size="+1">ບົດສະຫຼຸບເດືອນ</font></strong></div>
	          <div align="center"><strong><font size="2"><?=$viewmonth  ?></font></strong></div>
	        </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="1">
		  <tr class="">
			<td width=""><font size="2">ລ/ດ</font></td>
			<td width=""><font size="2"><strong>ລາຍລະອຽດ</strong></font></td>
            <td align="" width=""><font size="2">ເດືອນ</font>&nbsp;</td>           
			<td width="" align=""><font size="2"><strong>ປີ</strong></font>&nbsp;</td>
			<td width="" align=""><font size="2"><strong>ມູນຄ່າ(ກີບ)</strong></font>&nbsp;</td>
			<td width=""><font size="2"><strong>ໝາຍເຫດ</strong></font></td>
		  </tr>	 
			<?php 			
				$i=1;
				$sum_recieve=  0;							
				while ($item = mysql_fetch_array($result)) { 
					if ($item['type_income']==1) {
						$sum_recieve=  $sum_recieve+$item['sum_amount'];
					} else if ($item['type_income']==2) {
						$sum_recieve=  $sum_recieve-$item['sum_amount'];
					}					 
			?>
			<tr>										
				<td><font size="2"><?= ($i+$start) ?></font></td>		
				<td><font size="2"><?=$item['reportDetail'] ?></font></td>
				<td align="center"><font size="2"><?= $item['view_month'] ?></font>&nbsp;</td>
				<td align="center"><font size="2"><?= $item['view_year'] ?></font>&nbsp;</td>                
				<td align="right"><font size="2"><?= number_format($item['sum_amount']) ?></font>&nbsp;</td>  
				<td><font size="2"><?= $item['remark'] ?></font></td>
			</tr> 				
			<?php $i++; } ?>	
            <tr>
				<td colspan="4" ><strong><font size="2">ຍອດຍັງເຫຼືອ</strong></td>							 
				<td align="right"><font size="2"><?= number_format($sum_recieve) ?></font>&nbsp;</td>				
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