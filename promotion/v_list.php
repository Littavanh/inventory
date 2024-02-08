<?php 
session_start();
htmltage("Promotion");
 
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>
 
<section class="content-header">
    <h1>Promotion</h1>    
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
					                <select class="form-control" name="infoID" onChange="document.location='index.php?d=promotion/list&infoID='+this.value+'&status=<?=$_GET['status'] ?>'">
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
				                <div class="form-group col-md-2">
					                <label>ສະຖານະ</label>
					                <select class="form-control" name="status" onChange="document.location='index.php?d=promotion/list&infoID=<?=$_GET['infoID'] ?>&status='+this.value ">			
										<?php 
												for ($x = 1; $x <= 4; $x++) {
												    $selected = $x == $_GET['status'] ? "selected" : ""; 
												    if ($x==1) {
												    	$y = "ໃຊ້ງານຢູ່";
												    } else if ($x==2) {
												    	$y = "ໝົດກໍານົດ";
												    } else if ($x==3) {
												    	$y = "ຍົກເລີກ";
												    }else if ($x==4) {
												    	$y = "ຢຸດການນໍາໃຊ້";
												    }
											?>
												<option value="<?=$x?>" <?= $selected ?>><?=$y?></option>
											<?php } ?>
									</select>
					            </div> 					
				</div>
				<div class="box-body">
					<div class="row">
						<div class="box-body pad table-responsive">
						<form method="post" id="frmPriceSetting" action="index.php?d=promotion/list" enctype="multipart/form-data">
							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th width="10">ລຳດັບ</th>
									  	<th>ລະຫັດ</th>
									  	<th>ຊື່ ໂປຼໂມຊັນ</th>
									  	<th>ລາຍລະອຽດ</th>								       
									  	<th>ປະເພດ</th>	
									  	<th>BU/ຫົວໜ່ວຍທຸລະກິດ</th>	
									  	<th>ວັນທີ່ເລີ່ມ</th>	
									  	<th>ວັນທີໝົດກໍາຍົດ</th>	
									  	<?php if(isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] !=4){ ?>
										<th>ແກ້ໄຂ</th>
										<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
										<tr>
											<td class ="centered itemcols">
												<span><?= ($i+$start) ?></span>
												<input type="hidden" name="type[]" class="type" value="unchanged" />
								                <input type="hidden" name="id[]"  value="<?=$row['pro_id']?>" />
								                </td>
											<td>
												<input type="text" name="txtprocode[]" size = "" value="<?= $row['pro_code'] ?>" required />
												<label class="hidden"><?= $row['pro_code'] ?></label>
											</td>
											<td>
												<input type="text" name="txtproName[]" size = "" value="<?= $row['pro_name'] ?>" required />
												<label class="hidden"><?= $row['pro_name'] ?></label>
											</td>
											<td>
												<input type="text" name="txtproDescript[]" size = "" value="<?= $row['pro_descript'] ?>" required />
												<label class="hidden"><?= $row['pro_descript'] ?></label>
											</td>
											<td>
							            		<select name="txtTypeid[]">                
													<?php 
														$rs_status = LoadType();
														while ($row_c = mysql_fetch_array($rs_status,MYSQL_ASSOC)) {
														$selected = $row_c['proTypeID'] == $row['type_id'] ? "selected" : ""; 
													?>
														<option value="<?=  $row_c['proTypeID'] ?>" <?= $selected ?>><?= $row_c['proTypeText'] ?></option>
													<?php } ?>
												</select>
								            </td>
								            <td>
												<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
													<select name="infoID[]">                
														<?php 
															$rs_info = LoadInfo();
															while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
															$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : ""; 
														?>
														<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
														<?php } ?>
													</select>
												<?php } else { ?>
													 <select name="infoID[]" >
														<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
													</select>
												<?php } ?>
								            </td>
									        <td> <?= $row['startDate'] ?> </td>
									        <td> <?= $row['endDate'] ?> </td>
									        <td align="center">
								         	 	<a href="?d=promotion/new&proID=<?=$row['pro_id']?>&infoID=<?=$row['info_id']?>&typeid=<?=$row['type_id']?>">ລາຍລະອຽດ</a>
								          	</td>
										  <?php if(isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] !=4){ ?>											
											<td class="centered" >
									            <a href ="?d=promotion/list&del_id=<?= base64_encode($row["pro_id"]."tasoksavhay"); ?>&infoid=<?=$row['info_id'] ?>" 
									            onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')">
									          	<i class="fa fa-trash-o"></i></a> </td>						
											<?php }?>
										</tr>
									<?php $i++;} ?>	
								</tbody>
							</table>							 
					   			<?php 					   									   			
					   				if($_SESSION['EDPOSV1role_id'] <=3 ){ ?>
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
		</td>
		<td>
			<input type="text" name="txtprocode[]" size = "" value="" required="" />
		</td>
		<td>
			<input type="text" name="txtproName[]" size = "" value="" required />
		</td>
		<td>
			<input type="text" name="txtproDescript[]" size = "" value="" required />
		</td>
		<td>
			<select name="txtTypeid[]">                
				<?php 
					$rs_status = LoadType();
					while ($row_c = mysql_fetch_array($rs_status,MYSQL_ASSOC)) {
				?>
				<option value="<?=  $row_c['proTypeID'] ?>" <?= $selected ?>><?= $row_c['proTypeText'] ?></option>
				<?php } ?>
			</select>
		</td>
		<td>
			<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
				<select name="infoID[]">                
					<?php 
						$rs_info = LoadInfo();
						while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {						
					?>
					<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
					<?php } ?>
				</select>
			<?php } else { ?>
				 <select name="infoID[]" >
					<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
				</select>
			<?php } ?>
		</td>
        <td>
        	 
        </td>
        <td>
        	 
        </td>
        <td align="center">ລາຍລະອຽດ</td>
		<td class="centered"><i class="fa fa-trash-o delete1"></td>
	</tr>
</table>
