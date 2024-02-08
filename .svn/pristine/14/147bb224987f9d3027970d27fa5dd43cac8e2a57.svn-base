<?php
session_start();
 htmltage("ຮູບພາບອາຫານ");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); }
 ?>

<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered"><?=$_SESSION['EDPOSV1show_food_name'] ?></h1>
<form method = "post" action="?d=manage/price_setting" enctype="multipart/form-data">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
</div>
<div class="col-md-12">
	<div class="col-md-3">
		<div class="form-group">
			<img src="photos/<?=$_SESSION['EDPOSV1show_image_name'] ?>" width="250" height="250" />	
		</div>
	</div>
	<div class="col-md-9">
		<div class="col-md-12">
			<div class="form-group">
				<label style="font-size: 18px; ">ເລືອກຮູບພາບ</label>
				<input name="edit_fileUpload" class="form-control" type="file">
				<input type="hidden" name="txttb_name" value="<?=$_SESSION['EDPOSV1ch_tb_name'] ?>" />
	            <input type="hidden" name="txttb_id" value="<?=$_SESSION['EDPOSV1ch_tb_id'] ?>" />
	            <input type="hidden" name="txtod_id" value="<?=$_SESSION['EDPOSV1ch_od_no'] ?>" />
			</div>
		</div>
		<div class="col-md-12"> 
			<div class="menubox">			
		         
		        <input type="submit"  name ="btncancel" class = "btn btn-app" value=" ປິດ " />
		        <?php if ($_SESSION['EDPOSV1show_image_name'] !='' ) { ?>
				<input type="submit" name="btnDel_image" class= "btn btn-app right_p btnsave" value = " ລືບຮູບ " onclick="return confirm('ທ່ານຕ້ອງການລຶບຮູບແທ້ບໍ...?')" />
				<?php } ?>
		        <input type="submit" name="btnsave_image" class= "btn btn-app right_p btnsave" style="color:#FFF; background:#00a65a; border:#008d4c"  value = " ບັນທຶກ " onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />		
			</div>
		</div>		
	</div>
</div>
</form>
</div>
</div>
</div>
