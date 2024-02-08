<?php	
	session_start();
	if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
	include("m_drink-order.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Drinking Bar</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="../css/print-slip.css" media="print" />		
		<link type="text/css" rel="stylesheet" href="../css/formatpage-slip.css"/>	
		<script src = "../js/Action.js" type = "text/javascript"></script>		
      <script>
        function loadedCloseWindows() {   window.setTimeout(CloseMe, 100);  }
        function CloseMe()  {  window.close();  }
      </script>    
	</head>
     <?php 
     /*  $od_no = mysql_real_escape_string(stripslashes(base64_decode($_GET['bill_order'])));
      $Reprint = mysql_real_escape_string(stripslashes(base64_decode($_GET['print'])));
      $infoID = mysql_real_escape_string(stripslashes($_GET['infoID'])); */
      $countRecord=0;
      if ($Reprint == "1") {
        $countRecord = nr_execute("SELECT COUNT(*)  FROM v_service_detail WHERE od_no = '$bill_id' AND printNo=1 AND printTime=0 and info_id ='$infoID' ");
      } else if ($Reprint == "2") {
        $countRecord = nr_execute("SELECT COUNT(*)  FROM v_service_detail WHERE od_no = '$bill_id' AND printNo=1  and info_id ='$infoID' ");
      }
       
      if ($countRecord != 0) { 
    ?> 
<body onLoad="printWindow(); loadedCloseWindows();"> 
<div id="pagesize">
	<div id="headbox">	
		<div id="topic">
		<!--
<table border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td colspan="3">
       	  <div align="center"><font size="+2">
       	    <?=$_SESSION['EDPOSV1info_name'] ?>
   	      </font></div>        	</td>
        </tr>
      <tr>
        <td width="85"><div align="left"><img src="../logo/<?=$_SESSION['EDPOSV1info_logo']?>" width="70" height="50"></div></td>
        <td colspan="2">        	
            <div align="left" ><font size="-1">ທີ່ຢູ່: <?=$_SESSION['EDPOSV1info_addr'] ?></font></div>            </td>
        </tr>
      
      <tr>
       <td colspan="2">
       	<div align="left" ><font size="-1">ເບີໂທ:&nbsp;<?=$_SESSION['EDPOSV1info_tel'] ?></font></div>       </td>
       <td width="127">	      
       <div align="right" ><font size="-1">ວັນທີ:&nbsp;<?=date('Y/m/d')?></font></div>
       	  <div align="right" ><font size="-1">ເລກທີ:&nbsp;<?=$bill_id?></font></div>         </td>
        </tr>
        <tr>
       <td colspan="3">
          <div align="center"><strong><font size="+1">ໃບຮັບເງິນ</font></strong></div>         </td>
        </tr>
    </table>	
    -->	 	

    <table>
    	<tr>
    		<td colspan="2"><div align="center"><font size="+2">
       	    ບາສິນຄ້າດື່ມ
   	      </font></div></td>
    	</tr>
    	<tr>
       <td  >
       	<div><font size="-1"><?=$GetTbName ?></font></td>        
        </tr>
        <tr>
        	<td><font size="-1">ເລກທີ:&nbsp;<?=$bill_id?>/<?=$GetDateOrder?></font></td>
        </tr>
    </table>
	  </div>
	  <div id="to_control">
		<table width="100%" border="0">
		  <tr class="">
  			<!-- <td ><font size="2">ລ/ດ</font></td> -->
  			<td align="left"><font size="2"><strong>ລາຍການ</strong></font></td>
        <td align="right"><font size="2"><strong>ຈ/ນ</strong></font></td>             
		  </tr>	 
			<?
				$i = 1;
				$sum_total = 0;
				$result = Loadbill($bill_id, $Reprint, $infoID);
				while($row = mysql_fetch_array($result,MYSQL_ASSOC))  {
				$sum_total = $sum_total + $row['total'];
			?>
        <tr>
  				<!-- <td align="center"><font size="2"><?=$i ?></font></td> -->
  				<td align="left"><font size="2">&nbsp;
            <?php if ($row['remark']!='') { echo $row['fd_name'].'|'.$row['remark']; } else { echo $row['fd_name']; } ?></font></td>
  				<td align="right"><font size="2"><?=$row['qty'] ?>&nbsp;</font></td>                 
			</tr>
            <? $i++; }
              
              if ($Reprint == "1") {        
                  sql_execute("UPDATE tb_order_detail SET printTime=1 WHERE od_no = '$bill_id' AND printTime<=1 AND printNo=1 and info_id ='$infoID' ");
                } else if ($Reprint == "2") {
                  sql_execute("UPDATE tb_order_detail SET printTime=printTime+1 WHERE od_no = '$bill_id' AND printNo=1 and info_id ='$infoID' ");                 
                }
             ?>            
		</table>	       
	  </div>
	</div>
</div>
</body>
<?php } else { ?>
  <body onLoad=" loadedCloseWindows();"></body>
<?php } ?>
</html>