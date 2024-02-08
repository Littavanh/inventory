<?php
session_start();
 htmltage("ຮັບເງິນ");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<body onLoad="document.fPayInfo.btnadd_mn.focus()">
<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered">ຮັບເງິນຈາກລູກຄ້າ:  <?=$_SESSION["EDPOSV1MADD_RCusName"] ?></h1>
<form method = "post" name="fPayInfo">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
</div>
 
<div class="col-md-12">
	<div class="col-md-9">
		<div class="col-md-6">				
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນກີບ</label> 
				<input type="text" name="paid_kip" value="<?=number_format($_SESSION["EDPOSV1pay_Rlak"]) ?>" readonly="readonly" style="font-size: 30px; height: 50px;" class="form-control"  />
			</div>
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນ ບາດ</label> 
				<input type="text" name="paid_thb" value="<?=number_format($_SESSION["EDPOSV1pay_Rthb"]) ?>" readonly="readonly" style="font-size: 30px; height: 50px;" class="form-control" />
			</div>				 
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນ USD</label> 
				<input type="text" name="paid_usd" value="<?=number_format($_SESSION["EDPOSV1pay_Rusd"]) ?>" readonly="readonly" style="font-size: 30px; height: 50px;" class="form-control" />
			</div>
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ສ່ວນຫຼຸດ</label> 
				<input type="text"  name="discount_p" value="<?=number_format($_SESSION["EDPOSV1pay_RDiscount"]) ?>" readonly="readonly" style="font-size: 30px; height: 50px;" class = "form-control discount_p" />	
			</div>	
			
		</div>
		<div class="col-md-6">	
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ຍອດຄ້າງຊໍາລະ</label> 
				<input type="text" name="txtpaid_total" value="<?=number_format(($_SESSION['EDPOSV1MADD_RTotalBalance']))." ກີບ" ?>" style="font-size: 30px; height: 50px;" class="form-control balance" readonly />
			</div>	
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ລວມຮັບ ເປັນເງິນກີບ</label> 
				<input type="text" name="txtpaid_total" value="<?=number_format(($_SESSION['EDPOSV1pay_Rtotal']))." ກີບ" ?>" style="font-size: 30px; height: 50px;" class="form-control balance" readonly />
			</div>	
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ລວມຍອດ ເປັນເງິນກີບ</label> 
				<input type="text" name="txtpaid_total" value="<?=number_format(($_SESSION['EDPOSV1MADD_RTotalBalance']-$_SESSION['EDPOSV1pay_Rtotal'])-$_SESSION["EDPOSV1pay_RDiscount"])." ກີບ" ?>" style="font-size: 30px; height: 50px;" class="form-control balance" readonly />
			</div>	
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ໝາຍເຫດ</label> 
				<input type="text"  name="txtremark" value="<?=$_SESSION["EDPOSV1remark_Rpay"]?>" style="font-size: 22px; height: 50px;" class = "form-control" value=""  readonly />
			</div>			
			<div class="form-group menubox" align='left'>
        			
				<input type="submit" name="btnadd_mn" class= "btn btn-app" style="color:#FFF; background:#00a65a; border:#008d4c" value = "ຢືນຢັນການຊໍາລະ" 
				onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />
				<input type="submit" name ="btncancel" class = "btn btn-app" value="     ຍົກເລີກ     " />	
			</div>
		</div>		
	</div>
</div>
</form>
</div>
</div>
</div>
</body>