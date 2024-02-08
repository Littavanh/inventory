<?php 
session_start();
htmltage("ຂໍ້ມູນລູກຄ້າ");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >3) { header("Location: ?d=index"); }
$whereclause = " WHERE status_id IN (8,9)";
//$rs_status = selstatus($whereclause);
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>



<section class="content-header">
    <h1>ຂໍ້ມູນລູກຄ້າ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3>ກະລຸນາເພີ່ມເທື່ອລະລູກຄ້າ</h3>
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="box-body pad table-responsive">
						<form method="post" id="frmroomtype" action="?d=manage/customer">
							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>										
		  								<th>ຊື່ແລະນາມສະກຸນ</th>
									  	<th>ເບີໂທ</th>
									  	<th>ທີ່ຢູ່</th>
									  	<th>ແຂວງ</th>
									  	<th>ເມືອງ</th>									  	
									  	<th>ກໍານົດມື້ຈ່າຍ</th>
									  	<th>ໝາຍເຫດ</th>		
									  	<th>ຄ້າງຈ່າຍ</th>							        
									  	<?php if($_SESSION['EDPOSV1role_id'] <=3 ){ ?>
										<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php 
										$i = 1; 
										
										while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
										<tr>										
											<td class="eqcodecols">
												<input type="hidden" name="type[]" class="type" value="unchanged" />
								                <input type="hidden" name="id[]"  value="<?=$row['cusID']?>" />
												<input type="text" name="txtCusName[]" size = "" value="<?= $row['cusName'] ?>" required />
												<label class="hidden"><?= $row['cusName'] ?></label>
											</td>	
											<td class="eqcodecols">
												<input type="text" name="txtTel[]" size = "" value="<?= $row['tel'] ?>" required />
												<label class="hidden"><?= $row['tel'] ?></label>
											</td>
											<td class="eqcodecols">
												<input type="text" name="txtAddr[]" size = "" value="<?= $row['addr'] ?>" required />
												<label class="hidden"><?= $row['addr'] ?></label>
											</td>
											<td class="eqcodecols">
								            	<select name="txtProID[]" onChange="GetProID(this.value, <?=$i ?>)">                
													<?php 
														$rsProv = LoadProvince();
														while ($row_c = mysql_fetch_array($rsProv,MYSQL_ASSOC)) {
														$selected = $row_c['ProID'] == $row['ProID'] ? "selected" : ""; 
													?>
														<option value="<?= $row_c['ProID'] ?>" <?= $selected ?>><?= $row_c['pronameln'] ?></option>
													<?php } ?>
												</select>
								            </td>
								            <td class="eqcodecols" id="district1<?=$i ?>" >								            	
								            	<select name="districtID[]" required>                								            		
													<?php 
														if ($row['districtID'] != '') {
															$GetProID=$row['ProID'];
															$rsDistrict = LoadDistrict($GetProID);
															while ($row_c = mysql_fetch_array($rsDistrict,MYSQL_ASSOC)) {
															$selected = $row_c['districtID'] == $row['districtID'] ? "selected" : "";	
													?>
														<option value="<?= $row_c['districtID'] ?>" <?= $selected ?>><?= $row_c['districtName'] ?></option>
													<?php } } else { ?>
														<option>-- ກະລຸນາເລືອກ --</option>
													<?php } ?>
												</select>
								            </td>
								            <td class="eqcodecols">
								            	<input type="number" name="txtDueDate[]" min="1" max="100" step="1"  value="<?= $row['dueDate'] ?>" />
								            	<label class="hidden"><?= $row['dueDate'] ?></label>
								            </td>				
								            <td class="eqcodecols">
								            <input type="text" name="txtRemark[]" value="<?= $row['remark'] ?>" />
												<label class="hidden"><?= $row['remark'] ?></label>
								            </td>			
								            <td align="right">								            
												<a href ="?d=receive/history_cus&cusID=<?=base64_encode($row["cusID"]."tasoksavhay") ?>">
												<?=number_format($row['amount_credit']) ?></a>
								            </td>		
										  <?php if($_SESSION['EDPOSV1role_id'] <=3){ ?>
											<td class="centered" >
								            <a href ="?d=manage/customer&del_id=<?php echo base64_encode($row["cusID"]."tasoksavhay"); ?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a> </td>						
											<?php } ?>
										</tr>
									<?php $i++;} ?>	
								</tbody>
							</table>							 
					   			<?php if($_SESSION['EDPOSV1role_id'] <=3 ){ ?>
								<div class="box-footer">		
							        <input type="button" id="adduser" class = "btn btn-primary" value="  &#3776;&#3742;&#3765;&#3784;&#3745;  " />
									<input type="button" id="reset" class = "btn btn-default" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " />
									<input type="submit" class = "btn btn-success right" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
								</div>
								<?php } ?>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<table class="template hidden" id = "tab">			
	<tr>
		<td class="eqcodecols">
			<input type="hidden" name="type[]" class="type" value="added" />
            <input type="hidden" name="id[]"  value="" /> 
			<input type="text" name="txtCusName[]" size = "" value="" />
		</td>
		<td class="eqcodecols"><input type="text" name="txtTel[]" size = "" value="" required /></td>	
		<td class="eqcodecols"><input type="text" name="txtAddr[]" size = "" value="" required /></td>
		<td class="eqcodecols">
			<select name="txtProID[]" onChange="GetProID(this.value, <?=$catcount+1?>)" >                
				<?php 
					$rsProv = LoadProvince();
					while ($row_c = mysql_fetch_array($rsProv,MYSQL_ASSOC)) {			
				?>
				<option value="<?= $row_c['ProID'] ?>"><?= $row_c['pronameln'] ?></option>
				<?php } ?>
			</select>	
		</td>
        <td class="eqcodecols" >        	
        	<div id="district1<?=$catcount+1 ?>">
				<select name="districtID[]" required>     
					<?php 			
						$rsSelAcc = LoadDistrict("21");
						while ($row_c = mysql_fetch_array($rsSelAcc,MYSQL_ASSOC)) {			
					?>
						<option value="<?=$row_c['districtID'] ?>"><?=$row_c['districtName'] ?></option>
					<?php } ?>
				</select>
			</div>
		</td>
		<td class="eqcodecols">
			<input type="number" name="txtDueDate[]" min="1" max="100" step="1"  value="" />		
		</td>				
		<td class="eqcodecols">
			<input type="text" name="txtRemark[]" value="<?= $row['remark'] ?>" />
		</td>
        <td class="centered"><i class="fa fa-trash-o delete1"></td> 
	</tr>
</table>