<?php
session_start();
if ($_SESSION["EDPOSV1cashdrawer_in"] == "cashin") {
 htmltage("ເອົາເງິນເຂົ້າ");
 $SetTitalName = "ເອົາເງິນເຂົ້າ";
} else {
 htmltage("ເອົາເງິນອອກ");	
 $SetTitalName = "ເອົາເງິນອອກ";
}
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<body onLoad="document.fcalulate.paid_kip.focus()">
<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered"><?=$SetTitalName ?> <strong><?=$getInfoName ?></strong></h1>
<form method = "post" name="fcalulate">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
    <h5><?=$alert_message ?></h5>
</div>
<div class="col-md-12">	
	<div class="col-md-3">
		<div class="box-header with-border">
			<h3 class="box-title">ອັດຕາແລກປ່ຽນ</h3>
		</div>
		<div class="form-group" align='left'>
			<label style="font-size: 20px; ">ເງິນບາດ</label> 	
			<input type="hidden" name="txtinfoID" class = "form-control" value="<?=$_SESSION["EDPOSV1cashdrawer_infoid"] ?>"  />	
			<input type="text" style="text-align: right; font-size: 20px; height: 60px;" class = "form-control" value="<?=number_format($_SESSION['EDPOSV1rate']['thb'],2) ?>"  readonly/>		
			
		</div>
		<div class="form-group" align='left'>
			<label style="font-size: 20px; ">ເງິນໂດລາ</label> 	
			<input type="text" style="text-align: right; font-size: 20px; height: 60px;" class = "form-control" value="<?=number_format($_SESSION['EDPOSV1rate']['usd'],2)  ?>"  readonly/>	
		</div>
		 				 
	</div>
		<div class="col-md-9">	
		<div class="col-md-6">	
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນກີບ</label> 
				<input type="text" name="paid_kip" onfocus="this.select();" autocomplete="off" value="0" style="font-size: 30px; height: 60px;" class = "form-control paid_kip"  onkeyup ="AddAndRemoveSeparator(this);"/>		
			</div>
			<div class="form-group" align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນ USD</label> 
				<input type="text" name="paid_usd" onfocus="this.select();" autocomplete="off" value="0" style="font-size: 30px; height: 60px;" class = "form-control paid_usd"  onkeyup ="AddAndRemoveSeparator(this);"/>	
			</div>		
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ຮັບເປັນເງິນ ບາດ</label> 
				<input type="text" name="paid_thb" onfocus="this.select();" autocomplete="off" value="0" style="font-size: 30px; height: 60px;" class = "form-control paid_thb"  onkeyup ="AddAndRemoveSeparator(this);"/>
			</div>			
		</div>
		<div class="col-md-6">		
			<div class="form-group " align='left'>
				<label  style="font-size: 20px; ">ໝາຍເຫດ</label> 
				<input type="text"  name="txtremark" size = "" style="font-size: 20px; height: 60px;" class = "form-control" value=""   />
			</div>
			<div class="form-group menubox" align='left'>				 
        		<input type="submit" name="btnSaveCashIn" class= "btn btn-app" style="color:#FFF; background:#00a65a; border:#008d4c" value = "ຮັບເງິນ"  onclick="return confirm('ທ່ານຕ້ອງການຢືນຢັນຮັບເງິນແທ້ບໍ...?')"/>
        		<input type="submit" name ="btncancel" class = "btn btn-app" value="     &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;     "  />
			</div>
		</div>				 
	</div>
</div>
</form>
</div>
</div>
</div>
</body>
