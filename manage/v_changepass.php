<?php htmltage("ແກ້ໄຂລະຫັດຜ່ານ") ?>
<div class="contentpage">
	<h1 class="h1">ແກ້ໄຂລະຫັດຜ່ານ</h1>
	<h2><?php echo $message_ch; ?></h2>
	<!-- The table Select From -->
	<!-- validation only  -->
<input type="hidden" id="wid" value="<?=$_SESSION['EDPOSV1w_id']?>" />
<form method="post" id="frmChangepass" action="?d=manage/changepass">
	<table class = "beautified editable">
	  <tr>
	  	<th width="50">ລຳດັບ</th>	  	
	  	<th>ຊື່ເຂົ້າລະບົບ</th>
	  	<th>ປ້ອນລະຫັດຜ່ານໃໝ່</th>	  		  		  	  		  		
	  	<th>ຢືນຢັນລະຫັດຜ່ານໃໝ່</th>	  		  		  	  		  		
	  </tr>
	  <?php 
		$i = 1;
		while($row = mysql_fetch_array($usr, MYSQL_ASSOC)){ ?>
		<tr>
			<td class ="centered itemcols">
				<span><?= ($i+$start) ?></span>
				<input type="hidden" name="type[]" class="type" value="unchanged" />
				<input type="hidden" name="usr_id[]" value="<?= $row['user_id'] ?>" />
			</td>
			<td class=""><input type="text" name="username[]" size = "" value="<?= $row['username'] ?>" readonly="readonly" /></td>					
			<td class=""><input type="password" name="password[]" class = "password" size = "" value="" /></td>												
			<td class=""><input type="password" name="confirm_pass[]" size = "" value="" /></td>												
		</tr>
		<?php $i++;} ?>	
	</table>
	<?php if(isset($_SESSION['EDPOSV1role_id'])){ ?>
	<div class="menubox">		
	
		<input type="button" id="reset" class = "btn3" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " />
		<input type="submit" id="" class = "btn3 right" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
	</div>
	<? }?>
</form>
</div>
