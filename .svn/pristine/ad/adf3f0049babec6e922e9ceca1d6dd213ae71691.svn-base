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
          	<div align="center"><strong><?php if ($Get_total_pay !='' || $Get_total_pay !='0') { echo 'ໃບຮັບເງິນ'; } else { echo 'ໃບແຈ້ງລາຄາ'; } ?></strong></div> </td>
        </tr>
       <tr>
	        <td colspan="3" align="center">
	       	   <font size="2"><?=$getInfoName ?>, ໂທ:<?=$getInfoTel ?></font>
	       	</td>
        </tr>       	 
      <tr>       	
       	 
       </tr>
       <tr>
       <td colspan="2">
       		<div align="left" ><font size="2">ເວລາເຂົ້າ:&nbsp;<?=$GetOpenDate ?> </font></div>              		
       	</td>
       	<td>
       		<div align="right" > <font size="2">ເລກທີ: <?=$getBillNumber?></font></div>              		
       	</td>
        <?php if ($GET_CUSID !='1') { ?>
				    <tr><td colspan="3"><hr></td></tr>
				    <tr>
				       	<td colspan="3">
				       		<div align="left" ><font size="-1">ຊື່ລູກຄ້າ:&nbsp;<?=$cusName ?>, ເບີໂທ:&nbsp;<?=$tel ?></font></div>              		
				       	</td>
				    </tr>
				    <tr>
				       	<td colspan="3">
				       		<div align="left" ><font size="-1">ທີ່ຢູ່:&nbsp;<?=$addr ?>, ເມືອງ:&nbsp;<?=$districtName ?>, ແຂວງ:&nbsp;<?=$pronameln ?></font></div>              		
				       	</td>
				    </tr>
			    <?php } ?>           		
        </tr>        
    </table>		 	
	  </div>
	  <div id="to_control">
		<table  border="0">
		  <tr class="" >			 
			<td width="" colspan="2"  align="center"><font size="3"><strong>-----ລາຍການສິນຄ້າ-----</strong></font></td>            
		  </tr>	 
			<?
				$i = 1;
				$sum_total = 0;
				$result = Loadbill($bill_id, $infoID);
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))  {
				$sum_total = $sum_total + $row['total'];
				$tbName = $row['tb_name'];
			?>
            <tr>				
				<td align="left" >
					<font size="3">
					&nbsp;<?php if ($row['remark'] != '') { echo $row['fd_name'].'|'.$row['remark']; } else { echo $row['fd_name']; } ?>					
					<br>&nbsp;&nbsp;<?=$row['qty'] ?>&nbsp;X&nbsp;<?=number_format($row['price']) ?>
					</font>
				</td>
				<td align="right" ><br><?=number_format($row['total']) ?></td> 
			</tr>
            <? $i++; } ?>            
		</table>	
		<hr>	
		<table>	 
            <tr>
				<td colspan="4" align="right"><font size="3"><strong>ລວມ(ກີບ):</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format($sum_total)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>            			
			<!--<tr>
				<td colspan="4" align="right"><font size="3"><strong>ລວມ(ບາດ):</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format(($sum_total / $thb),2)?></strong>&nbsp;ບາດ</font></td>			 
			</tr> 
			
			<tr>
				<td colspan="4" align="right"><font size="3"><strong>ລວມ(ໂດລາ):</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format(($sum_total / $usd),2)?></strong>&nbsp;ໂດລາ</font></td>			  
			</tr> 					
			-->
			<?php if ($Get_total_pay !='' || $Get_total_pay !='0' ) { ?>	
			 
            <tr>
				<td colspan="4" align="right"><font size="3"><strong>ລວມຮັບ:</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format($Get_total_pay)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>
			<?php if ($Get_Discount !=0 ) { ?>
			<tr>
				<td colspan="4" align="right"><font size="3"><strong>ສ່ວນຫຼຸດ:</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format($Get_Discount)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>
			<?php } if ( $Get_change_money !=0 && (($Get_total_pay - $Get_billTotal) >=0) ) { ?>
            <tr>
				<td colspan="4" align="right"><font size="3"><strong>ເງິນທອນ:</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format($Get_change_money)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>          
			<?php } else if ( $Get_change_money !=0 && (($Get_total_pay - $Get_billTotal) <0) ) { ?>
			<tr>
				<td colspan="4" align="right"><font size="3"><strong>ຄ້າງຈ່າຍ:</strong></font></td>
			  	<td align="right"><font size="3"><strong><?=number_format($Get_change_money)?></strong>&nbsp;ກີບ</font></td>			  
			</tr>  			
			<?php } } ?>
		</table>		
		<!-- <hr> -->
		<!-- <p><font size="3"><strong>ບາດ:&nbsp;<?=number_format($thb,2)?>,&nbsp;ໂດລາ:&nbsp;<?=number_format($usd,2)?></strong></font></p> -->
		 
        <!-- <p align="center"><font size="3">ຜູ້ຈ່າຍເງິນ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ຜູ້ຮັບເງິນ</font></p>
        <?php if ($_SESSION['EDPOSV1ShopType'] == 1) { ?>
        	<p align="center"><font size="3"><?=$GetTbName ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$GetUser_add?></font>&nbsp;</p>
        <?php } else { ?>
        	<p align="right"><font size="3"><?=$GetUser_add?></font>&nbsp;</p>
        <?php } ?> -->
        <p align="center"><font size="3">ຂອບໃຈທຸກທ່ານທີ່ມາອຸດໜູນ</font></p>
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>