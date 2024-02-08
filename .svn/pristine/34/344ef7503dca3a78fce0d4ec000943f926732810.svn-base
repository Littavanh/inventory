<?php
session_start();
 htmltage("ຮັບເງິນ");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
	$pay_thb = $_SESSION['EDPOSV1sum_bill']/$_SESSION['EDPOSV1rate']['thb'];
	$pay_usd = $_SESSION['EDPOSV1sum_bill']/$_SESSION['EDPOSV1rate']['usd'];
 ?>
<body onLoad="document.fcalulate.paid_kip.focus()">
<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered">ຮັບເງິນຈາກລູກຄ້າ:  <?=$_SESSION["EDPOSV1MADD_RCusName"] ?></h1>
<form method = "post" name="fcalulate">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
    <h5><? if (	$alert_message != "" ) { echo 	$alert_message; }?></h5>
</div>
<div class="col-md-12">	
 
		<div class="col-md-12">	
		<div class="col-md-4">	
			<div class="form-group" align='left'>
				<label style="font-size: 20px; ">ຍອດຄ້າງຊໍາລະ</label> 	
				<input type="text" class = "form-control" style="font-size: 30px; height: 50px;" value="<?=number_format($_SESSION['EDPOSV1MADD_RTotalBalance']).'ກີບ' ?>"  readonly/>
				<input type="hidden" name="total_g" id="total_g" onfocus="this.select();" value = "<?=$_SESSION['EDPOSV1MADD_RTotalBalance']?>">	
			</div>	
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ສ່ວນຫຼຸດ</label> 
				<input type="text"  name="discount_p" onfocus="this.select();" value="0" autocomplete="off" value="" style="font-size: 30px; height: 50px;" class = "form-control discount_p" onkeyup ="AddAndRemoveSeparator(this);"  />	
			</div>	
		</div>
		<div class="col-md-4">		 
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຈ່າຍເປັນເງິນກີບ</label> 
				<input type="text" name="paid_kip" onfocus="this.select();" autocomplete="off" value="<?=number_format($_SESSION['EDPOSV1MADD_RTotalBalance']) ?>" style="font-size: 30px; height: 50px;" class = "form-control paid_kip"  onkeyup ="AddAndRemoveSeparator(this);"/>
			</div>
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຈ່າຍເປັນເງິນ ກີບ</label> 
				<input type="text" name="paid_thb" onfocus="this.select();" autocomplete="off" value="0" style="font-size: 30px; height: 50px;" class = "form-control paid_thb"  onkeyup ="AddAndRemoveSeparator(this);"/>
			</div>				 
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຈ່າຍເປັນເງິນ USD</label> 
				<input type="text" name="paid_usd" onfocus="this.select();" autocomplete="off" value="0" style="font-size: 30px; height: 50px;" class = "form-control paid_usd"  onkeyup ="AddAndRemoveSeparator(this);"/>
			</div>
		</div>
		<div class="col-md-4">		
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ໝາຍເຫດ</label> 
				<input type="text"  name="txtremark" size = "" style="font-size: 22px; height: 50px;" class = "form-control" value=""   />
			</div>
			<div class="form-group menubox" align='left'>				 
        		<input type="submit" name="btncalculate" class= "btn btn-app" style="color:#FFF; background:#00a65a; border:#008d4c" value = "ຄິດໄລ່ເງິນ"  />
        		<input type="submit" name ="btncancel" class = "btn btn-app" value="     &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;     " />
			</div>
		</div>				 
	</div>
</div>
</form>
</div>
</div>
</div>
</body>
