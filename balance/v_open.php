<?php 
session_start();
htmltage("ເປີດ/ປິດ ງວດ");

$resultCur = LoadOpenStatus($Get_infoID);
while($rowC = mysql_fetch_array($resultCur, MYSQL_ASSOC)) {
	$result_ID = $rowC['openID'];
	$result_open = $rowC['openDate']; 
	$result_close = $rowC['closeDate']; 
	$CurStatus = $rowC['status_id']; 
}


?>
<section class="content-header">
    <h1>ເປີດ/ປິດ ກະ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">				 
				<p><?=$success?></p>
				<form method="post" id="frmtranH" action="?d=balance/open" enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="form-group col-md-12">
			                  <label for="exampleInputEmail1">ສະຖະນະປັດຈຸບັນ</label>
			               		<input type="text" name="txtbillID" class="form-control" readonly="true" style="font-size: 30px; height: 50px; color:#00F;"
			                  			value="<?php if ($CurStatus ==1 ) { echo 'ເປີດ'; } else  { echo 'ປິດ';} ?>" />
			                </div>
			            </div>
			            <?php if ($CurStatus ==1) { ?>
							<div class="row">
								<div class="form-group col-md-12">
				                  <label for="exampleInputEmail1">ວັນທີ່ເປິດ</label>
				                  <input type="text" name="txtopenID_SH" value="<?=$result_open ?>" class="form-control" style="font-size: 30px; height: 50px; color:#00F;" readonly="true" /> 
				                  <input type="hidden" name="txtopenID" value="<?=$result_ID ?>" /><input type="hidden" name="txtopenDate" value="<?=$result_open ?>" />
				                </div>
				            </div>
				            <div class="row">
				                <div class="form-group col-md-12">
				                	 <label for="exampleInputEmail1">ໝາຍເຫດ</label>
				                	 <textarea name="txtRemark" class="form-control" cols="50" rows="2"></textarea>
				                </div>
				            </div>
				            <div class="box-footer">
								<!-- <input type="submit" name="btnSave" class="btn btn-primary" value=" ປິດກະ " />						  -->
								<input type="submit" name="btnSave" value="ປິດກະ" style="color:#FFF; background:#3c8dbc; border:#367fa9; height: 80px; width: 150px; font-size: 24px;" class="btn btn-app" />			 
				            </div>
			            <?php } else { ?>
							<div class="row">
								<div class="form-group col-md-12">
				                  <label for="exampleInputEmail1">ວັນທີ່ເປິດ</label>
				                  <input type="text" name="txtopenID_SH" value="<?=date('Y-m-d') ?>" class="form-control" style="font-size: 30px; height: 50px; color:#00F;" readonly="true" /> 
				                  <input type="hidden" name="txtopenIDO" value="<?=$result_ID ?>" /><input type="hidden" name="txtopenDateO" value="<?=$result_open ?>" />
				                </div>
				            </div>
				            <div class="row">
				                <div class="form-group col-md-12">
				                	 <label for="exampleInputEmail1">ໝາຍເຫດ</label>
				                	 <textarea name="txtRemarkO" class="form-control" cols="50" rows="2"></textarea>
				                </div>
				            </div>
				            <div class="box-footer">	
								<!-- <input type="submit" name="btnSaveOpenStock" class = "btn btn-primary" value=" ເປີດກະ "/>	 -->
								<input type="submit" name="btnSaveOpenStock" value="ເປີດກະ" style="color:#FFF; background:#3c8dbc; border:#367fa9; height: 80px; width: 150px; font-size: 24px;" class="btn btn-app" />			 
				            </div>
			            <?php } ?>
					</div>
					
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
		<div class="box">
			<div class="box-body pad table-responsive">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<th>ລຳດັບ</th>
					  	<th>ວັນທີ ເປີດ</th>
					  	<th>ວັນທີ ປີດ</th>
					  	<th>ໝາຍເຫດ (ເປີດ)</th>
					  	<th>ໝາຍເຫດ (ປິດ)</th>
				        <th>ຜູ້ແກ້ໄຂ</th>
				        <th>ວັນທີ່ແກ້ໄຂ</th>
					</thead>
					<tbody>
					  <?php  
						$i = 1;
						while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
						<tr>
							<td class ="centered itemcols">
								<span><?= ($i+$start) ?></span>
								<input type="hidden" name="type[]" class="type" value="unchanged" />
				                <input type="hidden" name="id[]"  value="<?=$row['openID']?>" />
							</td>
							<td class="eqcodecols"><?= $row['openDate'] ?></td>				
				            <td class="eqcodecols"><?= $row['closeDate'] ?></td>
				            <td class="eqcodecols"><?= $row['remark'] ?></td>				
				            <td class="eqcodecols"><?= $row['remark_close'] ?></td>
				            <td class="eqcodecols"><?= $row['username'] ?></td>				
				            <td class="eqcodecols"><?= $row['date_add'] ?></td>			  
						</tr>
						<?php $i++;} ?>							
					</tbody>
				</table>
			</div>
		</div>
		</div>
		</div>
	</div>
	<div class="row">
		
	</div>
</section>

 