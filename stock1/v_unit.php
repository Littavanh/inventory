<?php 
session_start();
htmltage("ຫົວໜ່ວຍ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] ==4) { header("Location: ?d=index"); }
$whereclause = " WHERE status_id IN (8,9)";
//$rs_status = selstatus($whereclause);
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
    <h1>ຫົວໜ່ວຍ</h1>    
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
					<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
				                 <div class="form-group col-md-3">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" onChange="document.location='index.php?d=stock/unit&infoID='+this.value">
										<option value="0">-- ເລືອກທັງໝົດ --</option>
											<?php 
												$rs_info = LoadInfo();
												while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : ""; 
											?>
												<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
											<?php } ?>
									</select>
					            </div>    	
				                <?php } else { ?>
				                	<div class="form-group col-md-3">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" >
										<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
									</select>
					            </div>    	
				                <?php } ?>		
				</div>
				<div class="box-body">
					<div class="row">
					<div class="box-body pad table-responsive">
						<form method="post" id="frmPriceSetting" action="?d=stock/unit" enctype="multipart/form-data">
							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th>ລຳດັບ</th>
									  	<th>ຫົວໜ່ວຍ</th>
									  	<th>BU/ຫົວໜ່ວຍທຸລະກິດ</th>
								        <th>ຜູ້ແກ້ໄຂ</th>
								        <th>ວັນທີ່ແກ້ໄຂ</th>
									  	<?php if(isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] !=4){ ?>
										<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php  $i = 1; while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
										<tr>
											<td class ="centered itemcols">
												<span><?= ($i+$start) ?></span>
												<input type="hidden" name="type[]" class="type" value="unchanged" />
								                <input type="hidden" name="id[]"  value="<?=$row['unitID']?>" />
											</td>
											<td class="eqcodecols">
												<input type="text" name="txtunitName[]" size = "" value="<?= $row['unitName'] ?>" />
												<label class="hidden"><?= $row['unitName'] ?></label>
											</td>	
											<td class="eqcodecols">
												<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>										                
											        <select name="infoID[]" required>
														<option value="">-- ເລືອກBU/ຫົວໜ່ວຍທຸລະກິດ --</option>
															<?php 
																$rs_info = LoadInfo();
																while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
																$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : ""; 
															?>
														<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
															<?php } ?>
													</select>											    
										        <?php } else { ?>										        
											        <select  name="infoID[]" >
														<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
													</select>											        
										        <?php } ?>	
											</td>				
								            <td class="eqcodecols"><?= $row['username'] ?></td>				
								            <td class="eqcodecols"><?= $row['date_add'] ?></td>				
										  <?php if(isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] !=4){ ?>
											<td class="centered" >
								            <a href ="?d=stock/unit&del_id=<?php echo base64_encode($row["unitID"]."tasoksavhay"); ?>&infoID=<?=$row["info_id"]?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a> </td>						
											<?php } ?>
										</tr>
									<?php $i++;} ?>	
								</tbody>
							</table>
							<?php if(isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] !=4 ){ ?>
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
		<td class = "centered">
			<span></span>
			<input type="hidden" name="type[]" class="type" value="added" />
            <input type="hidden" name="id[]"  value="" />  
            <input type="hidden" name="eq_id[]" />          
		</td>
		<td class="eqcodecols"><input type="text" name="txtunitName[]" size = "" value="" /></td>		
													<td class="eqcodecols">
												<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>										                
											        <select  name="infoID[]" required>
														<option value="">-- ເລືອກBU/ຫົວໜ່ວຍທຸລະກິດ --</option>
															<?php 
																$rs_info = LoadInfo();
																while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
																$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : ""; 
															?>
														<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
															<?php } ?>
													</select>											    
										        <?php } else { ?>										        
											        <select  name="infoID[]" >
														<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
													</select>											        
										        <?php } ?>	
											</td>
        <td class="eqcodecols"><?= $_SESSION['EDPOSV1user_name'] ?></td>				
        <td class="eqcodecols"><?= date('Y-m-d H:m:s') ?></td>	
        <td class="centered"><i class="fa fa-trash-o delete1"></i></td> 
	</tr>
</table>
