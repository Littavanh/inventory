<?php	
	session_start();
	if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: index.php?d=index"); exit(); }
	include("m_leave.php");	
	
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
	        <td colspan="3" align="center">
	        	 <!-- <div align="center"><img src="../logo/<?=$_SESSION['EDPOSV1info_logo']?>" width="100" height="80"></div>-->
	       	   <font size="+3"><?=$getInfoName ?></font>
	       	</td>
        </tr> 
      <tr>
        
        <td colspan="2"><div align="left" ><font size="3">ທີ່ຢູ່: <?=$getInfoAddr ?></font></div></td>
        <td></td>
        </tr>
        <tr>
        
        <td colspan="2"><div align="left" ><font size="3">ເບີໂທ:&nbsp;<?=$getInfoTel ?></font></div></td>
        <td></td>
        </tr>
      	<tr>
       		<td colspan="3">
          	<div align="center"><strong><font size="+2">ບັດຝາກສິນຄ້າດື່ມ</font></strong></div> </td>
        </tr>
      <tr>
       	
       	<td colspan="3"><div align="center" ><font size="4"><strong><?=$leave_no?></strong></font></div></td>
       </tr>
       <tr>
	       <td colspan="3">
	       		<div align="left" style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><font size="3">ວັນທີ່ຝາກ:&nbsp;<?=$date_leave ?></font></div>              		
	       	</td>
	    </tr>
	     <tr>
	       <td colspan="3">
	       		<div align="left" style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><font size="3">ວັນທີ່ໝົດກໍານົດ:&nbsp;<strong><?=$date_expire?></strong></font></div>              		
	       	</td>
	    </tr>
		<tr>
			<td colspan="3">
				<div align="left" style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><font size="3">ຊື່ລູກຄ້າ:&nbsp;<?=$cus_name ?></font></div>              		
		   	</td>
		</tr>				   
		<tr>
			<td colspan="3">
				<div align="left" ><font size="3">ເບີໂທ:&nbsp;<?=$cus_tel ?></font></div>              		
       		</td>
	    </tr>
	    <tr>
		<td colspan="3">
				<div align="left" style='padding: 3px; width: 100%; word-break: break-all; word-wrap: break-word;'><font size="3"><strong>ລາຍລະອຽດ:</strong>&nbsp;<?=$item_name ?></font></div>		
       		</td>
	    </tr>
	    <td colspan="3">
				<div align="left" ><font size="3"><strong>ຈໍານວນ:&nbsp;<?=$l_item_Qty ?></strong></font></div>		
       		</td>
	    </tr>
			 
  
        
    </table>		 	
	  </div>
	  <div id="to_control">
	
		<hr>	
		
	
		
		 
        <p align="right"><font size="3">ຜູ້ບັນທຶກ</font></p>
        <p align="right"><font size="3"><?=$l_user_add ?></font>&nbsp;</p>
        <p align="center"><font size="3">ຂອບໃຈທຸກທ່ານທີ່ມາອຸດໜູນ</font></p>
	  </div>
	</div>
<div id="tbl_content">
		
	</div>
</div>
</body>
</html>