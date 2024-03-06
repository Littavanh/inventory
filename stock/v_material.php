<?php
session_start();
htmltage("ລາຍການສີນຄ້າ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
	header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ລາຍການສີນຄ້າ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">

					<p><?= $success ?></p>
					<p class="errormessage"><?= $exist ?></p>


					<!-- <div class="form-group col-md-3">
						<label>BU/ຫົວໜ່ວຍທຸລະກິດ:</label>
						<select class="form-control" name="infoID" onChange="document.location='index.php?d=stock/material&infoID='+this.value">
							<option value="0">-- ເລືອກທັງໝົດ --</option>
							<?php
							$rs_info = LoadInfo();
							while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
								$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : "";
							?>
								<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
							<?php } ?>

							<?php
							$infoID = mysql_real_escape_string(stripslashes($_POST['infoID']));
							$_SESSION["EDPOSV1MADD_infoID"] = $infoID;
							?>
						</select>



					</div> -->
					<!-- text centen in table -->
					<style>
						th {
							text-align: center;
						}
					</style>
				</div>
				<div class="box-body">
					<button type="button" class="btn btn-default" onclick="document.location='?d=stock/materialAdd'">ເພີ່ມຂໍ້ມູນ</button>
					<button type="button" class="btn btn-primary" onclick="document.location='?d=stock/material_import'">Import Excel File</button>
					<div class="row">
						<div class="box-body pad table-responsive">
							<h4><?= $pagedescription ?></h4>
							<form method="post" id="frmPriceSetting" action="?d=stock/material" enctype="multipart/form-data">
								<table id="example1" class="table table-bordered table-hover beautified editable">
									<thead>
										<tr>
											<th>ລຳດັບ</th>
											<th>Barcode</th>
											<th>ລາຍລະອຽດສິນຄ້າ</th>
											<!-- <th>ລາຍລະອຽດ1</th> -->
											<!-- <th>ລາຍລະອຽດ2</th> -->
											<!--<th>ລາຍລະອຽດ3</th>-->
											<!-- <th>BU/ຫົວໜ່ວຍທຸລະກິດ</th> -->
											<th>ໝວດສິນຄ້າ</th>
											<!-- <th>ລາຄາຂາຍ(1)</th>	
									  	<th>ລາຄາຂາຍ(2)</th>	
									  	<th>ລາຄາຂາຍ(3)</th>	 -->
											<th>Min stock</th>
											<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
												<th>ແກ້ໄຂ</th>
												<th>ລຶບ</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
											<tr>
												<td class="centered">
													<span><?= ($i + $start) ?></span>
													<input type="hidden" name="type[]" class="type" value="unchanged" />
													<input type="hidden" name="id[]" value="<?= $row['materialID'] ?>" />
													<input type="hidden" name="txtstatus_id[]" value="<?= $row['status_id'] ?>" />
												</td>
												<td><?= $row['mBarcode'] ?></td>
												<td><?= $row['materialName'] ?></td>
												<!-- <td><?= $row['materialRemark'] ?></td>
												<td><?= $row['materialRemark1'] ?></td> -->
												<!-- <td><?= $row['materialRemark2'] ?></td> -->
												<!-- <td>
													<select name="infoID[]" disabled>
														<?php
														$rs_info = LoadInfo();
														while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
															$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : "";
														?>
															<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
														<?php } ?>
													</select>
												</td> -->
												<td><?= $row['kf_name'] ?></td>
												<!--<td><?= number_format($row['price']) ?></td>
								          	<td><?= number_format($row['price2']) ?></td>
								          	 <td><?= number_format($row['price3']) ?></td> -->
												<td><?= number_format($row['min_stock'], 2) ?></td>
												<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
													<td class="centered">
														<a href="?d=stock/materialEdit&edit_id=<?= base64_encode($row["materialID"] . "tasoksavhay"); ?>&infoid=<?= $row['info_id'] ?>">
															<i class="fa fa-pencil"></i></a>
													</td>
													<td class="centered">
														<a href="?d=stock/material&del_id=<?= base64_encode($row["materialID"] . "tasoksavhay"); ?>&infoid=<?= $row['info_id'] ?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')">
															<i class="fa fa-trash-o"></i></a>
													</td>
												<?php } ?>
											</tr>
										<?php $i++;
										} ?>
									</tbody>
								</table>
								<div class="paging">
									<?php
									/*
	if ($pagecount > 1){
		if ($pagenum > 1) echo "<a href='?d=stock/material&$params&start=".(($pagenum-2)*$pagesize)."' $isselected>&lt; ກັບຄືນ</a>";
		$j=1;
		$g_start = 0;
		if($_GET['start'] >= $pagesize*4) $g_start = ($_GET['start'] / $pagesize) - 4;
		
		for ($i = $g_start; $i < $pagecount; $i++){
			if ($i == $pagenum-1) $isselected = "class='selected'";
			else $isselected = "";
		
			if($j<=15){
				echo "<a href='?d=stock/material&$params&start=".($i*$pagesize)."' $isselected>".($i+1)."</a>";
			}
			$j++;
		}
		if ($pagenum < $pagecount) echo "<a href='?d=stock/material&$params&start=".($pagenum*$pagesize)."' $isselected>ຕໍ່ໄປ  &gt;</a>";
	} */
									?>
								</div>
								<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
									<!-- <div class="box-footer">						
					       		<input type="button" id="adduser" class = "btn btn-primary" value="  &#3776;&#3742;&#3765;&#3784;&#3745;  " />
								<input type="button" id="reset" class = "btn btn-default" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " />
								<input type="submit" class = "btn btn-success right" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
					   		</div> -->
								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>