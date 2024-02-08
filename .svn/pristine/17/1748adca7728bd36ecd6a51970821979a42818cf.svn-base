<?php	
	session_start();
	if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: index.php?d=index"); exit(); }
	include("m_bill_print.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<title>Sticker</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link type="text/css" rel="stylesheet" href="../css/print-sticker.css" media="print" />		
		<link type="text/css" rel="stylesheet" href="../css/formatpage-sticker.css"/>	
		<script src = "../js/Action.js" type = "text/javascript"></script>		
			<script>
				function loadedCloseWindows() {   window.setTimeout(CloseMe, 100);	}
				function CloseMe() 	{  window.close();	}
			</script>
		</head>

<!-- <body onLoad="printWindow(); loadedCloseWindows()"> -->
<body >
<div id="pagesize">
	<div id="headbox">	
		<div id="topic">
			<div align="left" ><strong><font size="-1">ຊື່ເມນູ</font></strong></div>		
			<div align="left" ><strong><font size="-1">ຊື່ເມນູ</font></strong></div>		
			<div align="left" ><strong><font size="-1">ຊື່ເມນູ</font></strong></div>		
			<div align="left" ><strong><font size="-1">ຊື່ເມນູ</font></strong></div>		
			<div align="left" ><strong><font size="-1"><?=date('d/m H:i')?></font></strong></div>		
		</div>
	</div>
</body>
</html>