<?php	

include("../config.php");
	session_start();
	include("../function_sel.php");
	include("m_leave.php");	
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
       	    <?=$getInfoName ?>
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
			<td width=""><font size="2">ລທ</font></td>
			<td width=""><font size="2"><strong>ຜູ້ຝາກ</strong></font></td>
            <td align="" width=""><font size="2">ວັນທີຝາກ</font></td>           
			<td width="" align=""><font size="2"><strong>ລາຍການຝາກ</strong></font></td>
			<td width="" align=""><font size="2"><strong>ໝົດກໍານົດ</strong></font></td>
			<td width=""><font size="2"><strong>ສະຖານະ</strong></font></td>
		  </tr>	 
			<?php 			
				$i=1;
								while ($item = mysql_fetch_array($result)) { 	
									$status_text = "";						
									if ( $item['status_id']==2) {									 
										$status_text = "ບ";
									} else if ($item['status_id']==3) {  									 
										$status_text = "ໝ";
									} else {									 
										$status_text = "ຍ";
									}								
								?>
									<tr>
										 
										<td><font size="2"><?= $item['leave_no'] ?></font></td>		
										<td><font size="2"><?= $item['cus_name'] ?></font></td>
										<td style="word-break:break-all;"><font size="2"><?= $item['item_name'] ?></font></td>
						                <td><font size="2"><?= $item['date_leave'] ?></font></td>                
						                <td><font size="2"><?= $item['date_expire'] ?></font></td>  
						                <td><font size="2"><?= $status_text ?></font></td>
									</tr> 				
							<?php $i++; } ?>	    
		</table>		
	  
        <p align="right"><font size="2">ຜູ້ລາຍງານ&nbsp;&nbsp;</font></p>        
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>