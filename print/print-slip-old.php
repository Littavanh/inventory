<?php	
	session_start();
	if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: index.php?d=index"); exit(); }
	include("m_bill_print.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Slip</title>
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
        	<div align="center"><img src="../logo/<?=$_SESSION['EDPOSV1info_logo']?>" width="70" height="50"></div>
       	  <div align="center"><font size="+2">
       	    <?=$_SESSION['EDPOSV1info_name'] ?>
   	      </font></div>        	</td>
        </tr>
      <tr>
        
        <td colspan="3">        	
            <div align="left" ><font size="-1">ທີ່ຢູ່: <?=$_SESSION['EDPOSV1info_addr'] ?></font></div>            </td>
        </tr>
      
      <tr>
       <td colspan="2">
       	<div align="left" ><font size="-2">ເບີໂທ:&nbsp;<?=$_SESSION['EDPOSV1info_tel'] ?></font></div>       </td>
       <td width="127">	      
        
       	  <div align="right" ><font size="-1">ເລກທີ:&nbsp;<?=$bill_id?></font></div>         </td>
        </tr>
        <tr>
       <td colspan="3">
       		<div align="left" ><font size="-2">ເວລາເຂົ້າ:&nbsp;<?=$GetOpenDate ?>&nbsp;&nbsp;ເວລາອອກ:&nbsp;<?=$GetDateOut?></font></div>              		
       		</td>
            
       		
        </tr>
        <tr>
       <td colspan="3">
          <div align="center"><strong><font size="+1"><?php if ($Get_total_pay !='' || $Get_total_pay !='0') { echo 'ໃບຮັບເງິນ'; } else { echo 'ໃບແຈ້ງລາຄາ'; } ?></font></strong></div>         </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="0">
		  <tr class="">
			<!-- <td width="8%"><font size="2">ລ/ດ</font></td> -->
			<td width=""><font size="2"><strong>ລາຍການ</strong></font></td>
            <!-- <td width="13%"><font size="2">ຈ/ນ</font></td> -->
            <!-- <td width=""><font size="2">ລາຄາ</font></td> -->
			<td width="" align="right"><font size="2"><strong>ຈໍານວນເງິນ</strong></font></td>
		  </tr>	 
			<?
				$i = 1;
				$sum_total = 0;
				$result = Loadbill();
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))  {
				$sum_total = $sum_total + $row['total'];
				$tbName = $row['tb_name'];
			?>
            <tr>
				<!-- <td align="center"><font size="2"><?=$i ?></font></td> -->
				<td align="left"><font size="2">
					&nbsp;<?php if ($row['remark'] != '') { echo $row['fd_name'].'|'.$row['remark'].'X'.$row['qty']; } else { echo $row['fd_name'].'X'.$row['qty']; } ?>
					</font></td>
				<!-- <td align="right"><font size="2"><?=$row['qty'] ?>&nbsp;</font></td> -->
                <!-- <td align="right"><font size="2"><?=number_format($row['price']) ?>&nbsp;</font></td> -->
                <td width="" align="right"><font size="2"><?=number_format($row['total']) ?>&nbsp;</font></td>
			</tr>
            <? $i++; } ?>            
		</table>	
		<hr>	
		<table>	 
            <tr>
				<td colspan="4" align="right"><font size="2"><strong>ລວມ(ກີບ):</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format($sum_total)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>            			
			<tr>
				<td colspan="4" align="right"><font size="2"><strong>ລວມ(ບາດ):</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format(($sum_total / $thb),2)?></strong>&nbsp;ບາດ</font></td>			 
			</tr> 
			<tr>
				<td colspan="4" align="right"><font size="2"><strong>ລວມ(ໂດລາ):</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format(($sum_total / $usd),2)?></strong>&nbsp;ໂດລາ</font></td>			  
			</tr> 					
			
			<?php if ($Get_total_pay !='' || $Get_total_pay !='0' ) { ?>	
			<tr>
				<td colspan="5" align="right">----------</td>			  			  
			</tr> 
            <tr>
				<td colspan="4" align="right"><font size="2"><strong>ລວມຮັບ:</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format($Get_total_pay)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>
			<tr>
				<td colspan="4" align="right"><font size="2"><strong>ສ່ວນຫຼຸດ:</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format($Get_Discount)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>
            <tr>
				<td colspan="4" align="right"><font size="2"><strong>ເງິນທອນ:</strong></font></td>
			  	<td align="right"><font size="2"><strong><?=number_format($Get_change_money)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>            			
			<?php } ?>
		</table>		
		<hr>
		<p><font size="2"><strong>ບາດ:&nbsp;<?=number_format($thb,2)?>,&nbsp;ໂດລາ:&nbsp;<?=number_format($usd,2)?></strong></font></p>
		 
        <p align="center"><font size="2">&nbsp;&nbsp;&nbsp;ຜູ້ຮັບເງິນ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ຜູ້ຈ່າຍເງິນ</font></p>
        <br/>
        <p align="right"><font size="2">ຂອບໃຈທຸກທ່ານທີ່ມາອຸດໜູນ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$tbName?></strong></font></p>
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>