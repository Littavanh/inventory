<?php	
	session_start();
	if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
	include("m_bill_print.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>ໃບບີນຮັບເງິນ</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="../css/print.css" media="print" />		
		<link type="text/css" rel="stylesheet" href="../css/formatpage.css"/>	
		<script src = "../js/Action.js" type = "text/javascript"></script>	
			<script>
				function loadedCloseWindows() {   window.setTimeout(CloseMe, 100);	}
				function CloseMe() 	{  window.close();	}
			</script>	
	</head>
	
 <body onLoad="printWindow(); loadedCloseWindows(); "> 
<div id="pagesize">
	<div id="headbox">	
		<div id="topic">
<table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <!-- <td width="85"><div align="left"><img src="../logo/<?=$_SESSION['EDPOSV1info_logo']?>" width="70" height="50"></div></td>-->
        <td colspan="4">
        	<div align="left" ><?=$_SESSION['EDPOSV1info_name'] ?></div>
            <div align="left" >ທີ່ຢູ່: <?=$_SESSION['EDPOSV1info_addr'] ?></div>
        </td>
        <!-- <td width="127">
        	<div align="right" >&nbsp;</div>        	
            <div align="right" >ວັນທີ:&nbsp;<?=date('Y/m/d')?></div>
        </td> -->
        </tr>
      
      <tr>
       <td colspan="3">
       	
       	<div align="left" >ເບີໂທ:&nbsp;<?=$_SESSION['EDPOSV1info_tel'] ?></div> 
        <div align="right" >&nbsp;</div>
       </td>
       <td width="127">	      
       	<div align="right" >ວັນທີ:&nbsp;<?=date('Y/m/d')?></div>
       	  <div align="right" >ເລກທີ:&nbsp;<?=$bill_id?></div>
         </td>
        </tr>
        <tr>
       <td colspan="4">
          <div align="center"><strong><font size="+3">ໃບຮັບເງິນ</font></strong></div>          
         </td>
        </tr>
    </table>		 	
	  </div>
	  <div id="to_control">
		<table width="100%" border="1">
		  <tr class="tb_h">
			<td width="8%">ລ/ດ</td>
			<td width="47%">ລາຍການ</td>
            <td width="13%">ຈໍານວນ</td>
            <td width="15%">ລາຄາ</td>
            <td width="12%">ສ່ວນຫຼຸດ</td>
			<td width="17%">ຈໍານວນເງິນ</td>
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
				<td align="center"><?=$i ?></td>
				<td>&nbsp;<?=$row['fd_name'] ?></td>
				<td align="right"><?=$row['qty'] ?>&nbsp;</td>
                <td align="right"><?=number_format($row['price']) ?>&nbsp;</td>
                <td align="right"><?=number_format($row['discount_lak']) ?>&nbsp;</td>
                <td align="right"><?=number_format($row['total']) ?>&nbsp;</td>
			</tr>
            <? $i++; } ?>
            <?
			 for($show_row=$i;$show_row<=15;$show_row++) { ?>
            <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                 <td>&nbsp;</td>
			</tr>				 
			<?	 }   ?>			
            <tr>
				<th colspan="5" align="center">ລວມເງິນທັງໝົດ:</th>
			  <td align="right"><strong><?=number_format($sum_total)?></strong>ກີບ</td>
			</tr>            			
		</table>
        <br/>
        <p align="center">&nbsp;&nbsp;&nbsp;ຜູ້ຮັບເງິນ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ຜູ້ຈ່າຍເງິນ</p>
        <br/>
        <br/>
        <br/>
        <p align="right">ຂອບໃຈທຸກທ່ານທີ່ມາອຸດໜູນ</p>
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>