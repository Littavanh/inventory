<?php	

include("../config.php");
	session_start();
	include("../function_sel.php");
	include("m_material_instock.php");	
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
	          <div align="center"><strong><font size="+1">ລາຍງານສິນຄ້າໃນສາງ</font></strong></div>
	          <!-- <div align="center"><strong><font size="2"><?php echo "ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate'];  ?></font></strong></div> -->
	        </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="1">
		  <tr class="">			
		  	<td width=""><font size="2">Barcode</font></td>
			<td width=""><font size="2"><strong>ຈ/ນ(1)</str
			<td width=""><font size="2">ຊື່ ສິນຄ້າ</font></td>
			<td width=""><font size="2"><strong>ຈ/ນ(1)</strong></font></td>             
			<td width=""><font size="2"><strong>ຈ/ນ(2)</strong></font></td>
			<td width=""><font size="2"><strong>ຈ/ນ(3)</strong></font></td>
			<td width=""><font size="2"><strong>exp</strong></font></td>
		  </tr>	 		 
			<?php 			
				$i=1;									 	 
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
			?>
			<tr>										
				<td><font size="1"><?= $item['mBarcode'] ?></font></td>
				<td><font size="1"><?= $item['materialName'] ?></font></td>
				<td><font size="1"><?= number_format($cvgroup12).' '.$item['unitName1'] ?></font></td>
				<td><font size="1"><?= number_format($cvgroup22).' '.$item['unitName2'] ?></font></td>  
				<td><font size="1"><?= number_format($cvgroup21).' '.$item['unitName3'] ?></font></td>  
				<td><font size="1"><?=$item['exp_date'] ?></font></td>  
			</tr> 				
			<?php $i++; } 				 
			?>				 
		</table>		
	  
        <p align="right"><font size="2">ຜູ້ລາຍງານ&nbsp;&nbsp;</font></p>        
	  </div>



	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>