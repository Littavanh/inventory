<?php 
session_start();
htmltage("ລຶບຂໍ້ມູນທັງໝົດ");
 


?>
<section class="content-header">
    <h1>ລຶບຂໍ້ມູນທັງໝົດ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">				 
				<p><?=$success?></p>
				<form method="post" id="frmtranH" action="?d=stock/reset" enctype="multipart/form-data">
					<div class="box-body">
						<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
							<div class="row">
								<div class="form-group col-md-12">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" >		
					                	 							
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
			             <div class="row">
				                <div class="form-group col-md-12">
				                	 <label for="exampleInputEmail1">ໝາຍເຫດ</label>
				                	 <textarea name="txtRemark" class="form-control" cols="50" rows="2" required=""></textarea>
				                </div>
				            </div>
			            <div class="box-footer">	
								<!-- <input type="submit" name="btnSaveOpenStock" class = "btn btn-primary" value=" ເປີດກະ "/>	 -->
								<input type="submit" name="btnResetAll" value="ລຶບຂໍ້ມູນທັງໝົດ" style="color:#FFF; background:#dd4b39; border:#d73925; height: 80px; width: 170px; font-size: 24px;" class="btn btn-app" />			 
				            </div>
					</div>
					
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="box">
				<div class="box-header with-border">
					<h3>ປະຫວັດການລຶບຂໍ້ມູນ</h3>
				</div>
					<div class="box-body pad table-responsive">
						<table id="example1" class="table table-bordered table-hover">
							<thead>
								<th>ລຳດັບ</th>
								<th>BU/ຫົວໜ່ວຍທຸລະກິດ</th>
							  	<th>ວັນທີລຶບ</th>							  
							  	<th>ໝາຍເຫດ</th>
						        <th>ຜູ້ລຶບ</th>
							</thead>
							<tbody>
							  <?php  
								$i = 1;
								while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
								<tr>
									<td class ="centered itemcols">
										<span><?= ($i+$start) ?></span>
										<input type="hidden" name="type[]" class="type" value="unchanged" />
						                <input type="hidden" name="id[]"  value="<?=$row['resetID']?>" />
									</td>
									<td class="eqcodecols"><?= encrypt_decrypt('decrypt', $row['info_name'])   ?></td>
									<td class="eqcodecols"><?= $row['resetDate'] ?></td>				
						            <td class="eqcodecols"><?= $row['remark'] ?></td>						     
						            <td class="eqcodecols"><?= $row['username'] ?></td>				
								</tr>
								<?php $i++;} ?>							
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div> 
	</div>
	 
</section>

 