<?php 
session_start();
//include_once("function_sel.php");
htmltage("BU/ຫົວໜ່ວຍທຸລະກິດ:");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >3) { header("Location: ?d=index"); }
if(isset($_SESSION['EDPOSV1show_logo']) && $_SESSION['EDPOSV1show_logo'] == 'show_logo' ){
	include("v_show_logo.php");	
}
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
    <h1>BU/ຫົວໜ່ວຍທຸລະກິດ:</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<div class="box-header with-border">
					<!-- <div class="col-md-3"><button type="button" class="btn btn-block btn-primary" onclick="window.location.href='index.php?d=manage/info'">ເພີ່ມໃໝ່</button></div>-->
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="box-body pad table-responsive">
						<form method="post" id="frmroomtype" action="index.php?d=manage/info_list">
							<table id="example1gg" class="table table-bordered  beautified editable">
								<thead>
									<tr>
										<th>ລ/ດ</th>				
									  	<th>ຊື່ຮ້ານ</th>	  	
									  	<th>ທີ່ຢູ່</th>
									  	<th>ເບີໂທ</th>
									  	<th>ຊື່ເຈົ້າຂອງຮ້ານ</th>
									  	<th>ພີມໃບຮັບເງິນ</th>	
									  	<th>ບັນທຶກຂໍ້ມູນລູກຄ້າ</th>	
									  	<th>LOGO</th>
									  	<th>Sync</th>	
									  	<?php if($_SESSION['EDPOSV1role_id'] <=3){ ?>									   
										<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
										<tr>
											<td class = "centered">
												<span ><?= ($i+$start) ?></span>
												<input type="hidden" name="type[]" class="type" value="unchanged" />
								                <input type="hidden" name="id[]"  value="<?=$row['info_id']?>" />
											</td>											
								            <td>
												<input type="text" name='txtinfo_name[]' value="<?= encrypt_decrypt('decrypt', $row['info_name']) ?>"  />
											</td>
								            <td>								            
												<input type="text" name='txtinfo_addr[]' value="<?=encrypt_decrypt('decrypt', $row['info_addr']) ?>"   />
								            </td>
								            <td>
								            	<input type="text" name='txtinfo_tel[]' value="<?=encrypt_decrypt('decrypt', $row['info_tel']) ?>"   />
								            </td>
								            <td>
								            	<input type="text" name='txtinfo_owner[]' value="<?=encrypt_decrypt('decrypt', $row['info_owner']) ?>"   />
								            </td>
								            <td>
												<select name="txtprintReceive[]">                
													<?php 														 
														$selected = 1 == $row['printReceive'] ? "selected" : ""; 
													?>													 
														<option value="1" <?= $selected ?>>ພິມ</option>
													<?php 
														$selected = 0 == $row['printReceive'] ? "selected" : ""; 													 
													?>		
													<option value="0" <?= $selected ?>>ບໍ່ພິມ</option>
												</select>
											</td>
								            <td>
												<select name="txtsaveInfoCus[]">                
													<?php 														 
														$selected = 1 == $row['saveInfoCus'] ? "selected" : ""; 
													?>													 
														<option value="1" <?= $selected ?>>ບັນທຶກ</option>
													<?php 
														$selected = 0 == $row['saveInfoCus'] ? "selected" : ""; 													 
													?>		
													<option value="0" <?= $selected ?>>ບໍ່ບັນທຶກ</option>
												</select>
								            </td>				
            								<td> <a href="?d=manage/info_list&show_logo=true&image=<?=$row['info_logo']?>&info_name=<?=encrypt_decrypt('decrypt', $row['info_name'])?>&info_id=<?=$row['info_id']?>">LOGO</a>  </td>	
            								<td> <a href="?d=manage/update&updateinfoid=<?=$row['info_id']?>">Sync Data</a>  </td>	
            								<?php if($_SESSION['EDPOSV1role_id'] <=3){ ?>
            								 
											<td>
								            <a href ="index.php?d=manage/info_list&del_id=<?php echo base64_encode($row["info_id"]."tasoksavhay"); ?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a> </td>						
											<?php } ?>
										</tr>
									<?php $i++;} ?>	
								</tbody>
							</table>							 
					   			<?php if($_SESSION['EDPOSV1role_id'] <=3 ){ ?>
								<div class="box-footer">		
							        <input type="button" id="adduser" class = "btn btn-primary" value="  &#3776;&#3742;&#3765;&#3784;&#3745;  " />
									<input type="reset" id="reset" class = "btn btn-default" name="btnCancel" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " onclick="document.location='?d=report/info_list'"/>
									<input type="submit" class = "btn btn-success right" name="btnsave" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
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
            
            <input type="hidden" name="eq_id[]" />          
		</td>
		 
		<td>
												<input type="text" name='txtinfo_name[]' value=""  />
											</td>
								            <td>								            
												<input type="text" name='txtinfo_addr[]' value=""   />
								            </td>
								            <td>
								            	<input type="text" name='txtinfo_tel[]' value=""   />
								            </td>
								            <td>
								            	<input type="text" name='txtinfo_owner[]' value=""   />
								            </td>
								            <td>
												<select name="txtprintReceive[]">         
													<option value="0" >ບໍ່ພິມ</option>
													<option value="1" >ພິມ</option>
												</select>
											</td>
								            <td>
												<select name="txtsaveInfoCus[]">                		
													<option value="0">ບໍ່ບັນທຶກ</option>
													<option value="1">ບັນທຶກ</option>
												</select>
								            </td>				
            								<td> LOGO </td>	     
		<td class="centered"><i class="fa fa-trash-o delete1"></td>
	</tr>
</table>
