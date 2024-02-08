<?php
session_start();
 htmltage("");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>

<div id="cover">
<div id="dialogparent">
<div class="mask"></div>
<div id="dialog">
<h1 class="h1 centered">ປ່ຽນໂຕະ</h1>
<form method = "post" action="index.php?d=change_table/change_table">
<div class="infobox">
	<center><label id = "msgwar" class = "msgChk"></label></center>
</div>
<div class="col-md-12">
	<div class="col-md-6">
		<div class="col-md-12">
			<div class="form-group" align="left">
				<label style="font-size: 20px; ">ຊື່ໂຕະ</label>	
				<input type="text" name="txtShTBname" style="font-size: 22px; color:#00F;" value="<?=$_SESSION['EDPOSV1ch_tb_name'] ?>" class="form-control" readonly="true" />
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group" align="left">
				<label style="font-size: 20px; ">ມູນຄ່າລວມ</label>	
				<input type="text" name="txtShTotal" style="font-size: 28px; color:#00F;"  value="<?=number_format($_SESSION['EDPOSV1ch_total']) ?>" class="form-control" readonly="true" />
			</div>
		</div>		
	</div>
	<div class="col-md-6">
		<div class="col-md-12">
			<div class="form-group" align="left">
				<label style="font-size: 20px; ">ໂຕະທີ່ຕ້ອງການປ່ຽນ</label>	
            		<select name="txttb_id_new" class="form-control" style="font-size: 18px;">                
						<?php 
							$rs_tb_free = LoadTable_free();
							while ($row_c = mysql_fetch_array($rs_tb_free,MYSQL_ASSOC)) {
						?>
							<option value="<?= $row_c['tb_id'] ?>" <?= $selected ?>><?= $row_c['tb_name'] ?></option>
						<?php } ?>
					</select>    				 
			</div>
		</div>
		<div class="col-md-12">
			<div class="menubox">
				<input type="hidden" id = "cur_id" value="<?=$_SESSION['equipment'][0]['cur_id']?>" />
				<input type="submit"  name ="btncancel" class = "btn btn-app" value=" ຍົກເລິກ " />
				<input type="submit" name="btnchange_table" class= "btn btn-app btnsave" style="color:#FFF; background:#00a65a; border:#008d4c" value = " ບັນທຶກ " onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />				
			</div>			
		</div>		
	</div>
</div>
<p></p>
</form>
</div>
</div>
</div>
