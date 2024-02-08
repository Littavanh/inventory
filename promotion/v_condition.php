<?php
session_start();
 htmltage("ລາຍລະອຽດ ແລະ ເງື່ອນໄຂ");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<body onLoad="document.fcalulate.paid_kip.focus()">
<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered">ລາຍລະອຽດ ແລະ ເງື່ອນໄຂ <strong><?=$_SESSION["EDPOSV1Receive_leave_no"] ?></strong></h1>
<form method = "post" name="fcalulate">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
    <h5><? if (	$alert_message != "" ) { echo 	$alert_message; }?></h5>
</div>
<div class="col-md-12">	
	<div class="col-md-6">
		<?php if ($_SESSION["EDPOSV1promotion_typeid"] =="1") { ?>
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ສິນຄ້າກໍານົດ</label> 	
				<input type="hidden" name="txtpcID" value="<?=$_SESSION["EDPOSV1promotion_pc_id"] ?>"/>
				<input type="text" name="txtb_QTY" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_QTY"] ?>"/>				
			</div>
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ສິນຄ້າເລີ່ມ</label> 	
				<input type="text" name="txtb_minQTY" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_minQTY"] ?>"/>
			</div>
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ສິນຄ້າຫຼາຍສຸດ</label> 	
				<input type="text" name="txtb_maxQTY" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_maxQTY"] ?>"/>	
			</div>	
		<?php } else if ($_SESSION["EDPOSV1promotion_typeid"] =="2") { ?>	
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ເງິນກໍານົດ</label> 	
				<input type="text" name="txtb_Amount" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_Amount"] ?>"/>				
			</div>
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ເງິນເລີ່ມ</label> 	
				<input type="text" name="txtb_minAmount" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_minAmount"] ?>"/>
			</div>
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຈ/ນ ເງິນຫຼາຍສຸດ</label> 	
				<input type="text" name="txtb_maxAmount" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_b_maxAmount"] ?>"/>	
			</div>	
		<?php } ?>		
		
	</div>		 
	<div class="col-md-6">	
		<div class="form-group" align='left'>
			<label style="font-size: 20px; ">ຈ/ນ ສິນຄ້າ ແຖມ</label> 	
			<input type="text" name="f_QTY" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_f_QTY"] ?>"/>	
		</div>
		<div class="form-group" align='left'>
			<label style="font-size: 20px; ">ສ່ວນຫຼຸດ</label> 	
			<input type="text" name="f_Amount" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_f_Amount"] ?>"/>	
		</div>
		<div class="form-group" align='left'>
			<label style="font-size: 20px; ">ຄະແນນ</label> 	
			<input type="text" name="f_point" style="font-size: 20px; height: 60px;" class = "form-control" onkeyup ="AddAndRemoveSeparator(this);" value="<?=$_SESSION["EDPOSV1promotion_f_point"] ?>"/>	
		</div>	
		<div class="form-group menubox" align='left'>				 
       		<input type="submit" name="btnSaveCon" class= "btn btn-app" style="color:#FFF; background:#00a65a; border:#008d4c" value = "ຢືນຢັນການເບີກ"  />
       		<input type="submit" name ="btncancel" class = "btn btn-app" value="     &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;     "  />
		</div>
	</div>				 	
</div>
</form>
</div>
</div>
</div>
</body>
