<?php
session_start();
htmltage("ສົ່ງສິນຄ້າອອກສາງ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id'])) {
	header("Location: ?d=index");
}


$get_auto_id = nr_execute("SELECT `release`,date_add FROM tb_export order by date_add DESC limit 1");
if ($get_auto_id != "") {
	$autoId = "$get_auto_id" + 1;
	$bID = str_pad($autoId, 5, '0', STR_PAD_LEFT);
} else {
	$bID = str_pad(1, 5, '0', STR_PAD_LEFT);
}



?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ການເບີກສິນຄ້າ</h1>
</section>
<section class="content">
	<form method="post" id="frmtranD" action="?d=stock/addjust" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h2 style="color:red;" align="center">
							<?= $success ?>
						</h2>
						<h2 style="color:red;" class="errormessage">
							<?= $exist ?>
						</h2>
					</div>
					<div class="box-body">
						<div class="row">

							<!-- <div class="form-group col-md-3">
								<label>BU/ຫົວໜ່ວຍທຸລະກິດ:</label>
								<?php if ($_SESSION['EDPOSV1role_id']) { ?>
									<select class="form-control" name="infoID"
										onChange="document.location='index.php?d=stock/addjust&infoID='+this.value">
										<?php
										$rs_info = LoadInfo();
										while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
											// $selected = $row_c['info_id'] == $row['info_id'] ? "selected" : "";
											$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : "";
											?>
											<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>>
												<?= $row_c['info_name'] ?>
											</option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<select name="infoID[]" class="form-control" onChange="FindKF(this.value); " required>
										<option value="<?= $Get_infoID ?>">
											<?= $Get_infoName ?>
										</option>
									</select>
								<?php } ?>

							</div> -->
							<div class="form-group col-md-3">
								<label>ໝວດສິນຄ້າ:</label>

								<select class="form-control " id="select2" name="kf_id"
									onChange="document.location='index.php?d=stock/addjust&kf_id='+this.value">
									<option value="0">--ກະລຸນາເລືອກ--</option>
									<?php
									$rs_info = LoadCategory();
									while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {

										?>

										<option value="<?= $row_c['kf_id'] ?>" <?= $selected ?>>
											<?= $row_c['kf_name'] ?>
										</option>
									<?php } ?>
								</select>


							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-3">
								<label>ວັນຂໍເບີກສິນຄ້າ</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="date" name="txtDateTran" class="form-control pull-right"
										data-date-format="yyyy-mm-dd" value="<?= $_SESSION['EDPOSV1AddJustDate'] ?>"
										required autocomplete="off" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>ຜູ່ຂໍເບີກສິນຄ້າ</label>
								<input type="text" name="txtreciever" readonly class="form-control"
									value="<?= $_SESSION['EDPOSV1lao_fullname'] ?>" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-3">
								<label>ໃບສະເໜີຂໍເບີກ ເລກທີ່</label>
								<input type="text" name="txt_Release" readonly class="form-control" value="<?= $bID; ?>"
									required autocomplete="off" />
							</div>
							<div class="form-group col-md-4">
								<label>ຂະແໜງນຳໃຊ້</label>
								<input type="text" name="txt_Sector" class="form-control"
									value="<?= $_SESSION['EDPOSV1AddJust_Sector'] ?>" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>ໝາຍເຫດ</label>
								<textarea name="txtRemark" class="form-control" cols="50"
									rows="3"><?= $_SESSION['EDPOSV1AddJustRemark'] ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>ວັນທີຕ້ອງການ</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="date" name="txtDateWant" class="form-control pull-right"
										 data-date-format="yyyy-mm-dd"
										value="<?= $_SESSION['EDPOSV1AddJustDateWant'] ?>" required
										autocomplete="off" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>ແນບໄຟລ</label>
								<input name="edit_fileUpload" class="form-control" type="file" value="">
								<label for="">

								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- text centen in table -->
		<style>
			th {
				text-align: center;
			}
		</style>
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body pad table-responsive" style="overflow-x: auto;">
						<h4>
							<?= $pagedescription ?>
						</h4>
						<table id="example2" class="table table-bordered table-hover beautified editable">
							<thead>
								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດສິນຄ້າ</th>
									<th>ລາຍລະອຽດສິນຄ້າ</th>
									<th>ຈໍານວນໃນສາງ</th>
									<th>ວັນທີໝົດອາຍຸ</th>
									<!-- <th>ຈໍານວນ(1)</th>
									<th>ຈໍານວນ(2)</th>
									<th>ຈໍານວນ(3)</th> -->
									<th>ຈໍານວນ</th>
									<th>ເຫດຜົນ</th>
									<th>ສະຖານະ</th>
								</tr>
							</thead>
							<tbody id="body">
								<?php $i = 1;
								while ($item = mysql_fetch_array($SumResult)) {
									$whereGroupID = $item['materialID'];
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = 0;
									$cvgroup22 = 0;
									if ($item['cap1'] != 0) {
										$cvgroup11 = $item['unitQty3'] % $item['cap1'];
										$cvgroup12 = ($item['unitQty3'] - ($cvgroup11)) / $item['cap1'];
										$cvgroup21 = $cvgroup11 % $item['cap2'];
										$cvgroup22 = ($cvgroup11 - $cvgroup21) / $item['cap2'];
									} else if ($item['cap2'] != 0) {
										$cvgroup11 = 0;
										$cvgroup12 = 0;
										$cvgroup21 = $item['unitQty3'] % $item['cap2'];
										$cvgroup22 = ($item['unitQty3'] - $cvgroup21) / $item['cap2'];
									} else if ($item['cap3'] != 0) {
										$cvgroup11 = 0;
										$cvgroup12 = 0;
										$cvgroup21 = $item['unitQty3'];
										$cvgroup22 = 0;
									}
									?>
									<tr>
										<td class="centered">
											<?= ($i + $start) ?>
											<!-- | <?= $item['info_id'] ?> | <?= $item['kf_id'] ?> -->
										</td>
										<td class="centered">
											<?= $item['mBarcode'] ?>
										</td>
										<td>
											<input type="text" name="txtmaterialName[]" id="txtmaterialName"
												value="<?= $item['materialName'] . ' | ' . number_format($item['pur_price']) . ' | ' . $item['cur_name'] ?>"
												readonly='true' />
											<input type="hidden" name="txtPurPrice[]" value="<?= $item['pur_price'] ?>" />
											<label class="hidden">
												<?= $item['materialName'] ?>
											</label>
										</td>
										<!-- <td><strong><input type="hidden" name="type[]" class="type" value="unchanged" />
												<input type="hidden" name="tranID[]" value="<?= $item['tranID'] ?>" />
												<input type="hidden" name="addInfoID[]" value="<?= $item['info_id'] ?>" />
												<input type="hidden" name="txtexp_date[]" value="<?= $item['exp_date'] ?>" />
												<input type="hidden" name="id[]" value="<?= $item['materialID'] ?>" />
												<input type="hidden" name="txtSqty1[]" value="<?= $cvgroup12 ?>" />
												<input type="hidden" name="txtSqty2[]" value="<?= $cvgroup22 ?>" />
												<input type="hidden" name="txtSqty3[]" value="<?= $cvgroup21 ?>" />
												<input type="hidden" name="txtcap1[]" value="<?= $item['cap1'] ?>" />
												<input type="hidden" name="txtcap2[]" value="<?= $item['cap2'] ?>" />
												<input type="hidden" name="txtcap3[]" value="<?= $item['cap3'] ?>" />
												<input type="hidden" name="txtStockQTY[]" value="<?= $item['unitQty3'] ?>" />
												<input type="hidden" name="txtunitname3[]" value="<?= $item['unitName3'] ?>" />
												<?= $cvgroup12 . $item['unitName1'] . ' / ' . $cvgroup22 . $item['unitName2'] . ' / ' . $cvgroup21 . $item['unitName3'] ?></strong>
										</td> -->
										<td><strong><input type="hidden" name="type[]" class="type" value="unchanged" />
												<input type="hidden" name="tranID[]" value="<?= $item['tranID'] ?>" />
												<input type="hidden" name="addInfoID[]" value="<?= $item['info_id'] ?>" />
												<input type="hidden" name="txtexp_date[]"
													value="<?= $item['exp_date'] ?>" />
												<input type="hidden" name="id[]" value="<?= $item['materialID'] ?>" />
												<input type="hidden" name="txtSqty1[]" value="<?= $cvgroup12 ?>" />
												<input type="hidden" name="txtSqty2[]" value="<?= $cvgroup22 ?>" />
												<input type="hidden" name="txtSqty3[]" value="<?= $cvgroup21 ?>" />
												<input type="hidden" name="txtcap1[]" value="<?= $item['cap1'] ?>" />
												<input type="hidden" name="txtcap2[]" value="<?= $item['cap2'] ?>" />
												<input type="hidden" name="txtcap3[]" value="<?= $item['cap3'] ?>" />
												<input type="hidden" name="txtStockQTY[]"
													value="<?= $item['unitQty3'] ?>" />
												<input type="hidden" name="txtunitname3[]"
													value="<?= $item['unitName3'] ?>" />
												<?= $cvgroup21 . $item['unitName3'] ?>
											</strong>
										</td>
										<td class="eqcodecols">
											<?= $item['exp_date'] ?>
											<input type="hidden" name="txtExpDate[]" value="<?= $item['exp_date'] ?>">
										</td>
										<!-- <?php if ($item['cap1'] > 0) { ?>
											<td class="eqcodecols">
												<input type="text" name="txtQTY1[]" size='10%' onkeyup='AddAndRemoveSeparator(this);' class='number' autocomplete="off" />
											</td>
										<?php } else { ?><td bgcolor="#999999"></td><?php }
										if ($item['cap2'] > 0) { ?>
											<td class="eqcodecols"><input type="text" name="txtQTY2[]" size='10%' onkeyup='AddAndRemoveSeparator(this);' class='number' autocomplete="off"></td>
										<?php } else { ?><td bgcolor="#999999"></td><?php } ?> -->
										<?php if ($item['cap3'] > 0) { ?>
											<td class="eqcodecols"><input type="text" name="txtQTY3[]" size='10%'
													onkeyup='AddAndRemoveSeparator(this);' class='number' autocomplete="off" />
											</td>
										<?php } else { ?>
											<td bgcolor="#999999"></td>
										<?php } ?>
										<td class="eqcodecols"><input type="text" name="txtReason[]" size='10%'
												autocomplete="off" />
										</td>
										<td class="eqcodecols">
											<select name="TranType[]">
												<?php
												$rs_TranType = LoadTranType();
												while ($row_z = mysql_fetch_array($rs_TranType, MYSQL_ASSOC)) {
													$selected = $row_z['tranType'] == 19 ? "selected" : "";
													?>
													<option value="<?= $row_z['tranType'] ?>" <?= $selected ?>>
														<?= $row_z['Typename'] ?>
													</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<?php $i++;
								} ?>
							</tbody>
						</table>
						<div class="paging">
							<?php
							if ($pagecount > 1) {
								if ($pagenum > 1)
									echo "<a href='?d=report/material_instock&$params&start=" . (($pagenum - 2) * $pagesize) . "' $isselected>&lt; ກັບຄືນ</a>";
								$j = 1;
								$g_start = 0;
								if ($_GET['start'] >= $pagesize * 4)
									$g_start = ($_GET['start'] / $pagesize) - 4;

								for ($i = $g_start; $i < $pagecount; $i++) {
									if ($i == $pagenum - 1)
										$isselected = "class='selected'";
									else
										$isselected = "";

									if ($j <= 15) {
										echo "<a href='?d=report/material_instock&$params&start=" . ($i * $pagesize) . "' $isselected>" . ($i + 1) . "</a>";
									}
									$j++;
								}
								if ($pagenum < $pagecount)
									echo "<a href='?d=report/material_instock&$params&start=" . ($pagenum * $pagesize) . "' $isselected>ຕໍ່ໄປ  &gt;</a>";
							}
							?>
						</div>
					</div>
					<?php if (isset($_SESSION['EDPOSV1role_id'])) { ?>
						<div class="box-footer">

							<button type="submit" class="btn btn-primary" name="btnAdd">ເພີ່ມ</button>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body pad table-responsive" style="overflow-x: auto;">
						<h4>
							<?= $pagedescription ?>
						</h4>
						<table id="example2" class="table table-bordered table-hover beautified editable">
							<thead>
								<tr>
									<th>ລຳດັບ</th>
									<th>ລະຫັດສິນຄ້າ</th>
									<th>ລາຍລະອຽດສິນຄ້າ</th>
									<th>ຈໍານວນ</th>
									<th>ວັນທີໝົດອາຍຸ</th>


									<th>ເຫດຜົນ</th>

								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								$Request = LoadRequest();
								while ($item1 = mysql_fetch_array($Request)) {
									?>
									<tr>
										<td class="centered">
											<?= $i ?>
										</td>
										<td class="centered">
											<?= $item1['mBarcode'] ?>
										</td>
										<td>
											<?= $item1['materialName'] ?>
										</td>
										<td class="centered">
											<?= ($item1['unitQty3']) * (-1) ?>
										</td>
										<td class="centered">
											<?= $item1['exp_date'] ?>
										</td>

										<td class="centered">
											<?= $item1['reason'] ?>
										</td>

									</tr>

									<?php
									$i++;
								} ?>
							</tbody>
						</table>

					</div>
					<?php if (isset($_SESSION['EDPOSV1role_id'])) { ?>
						<div class="box-footer">
							<input type="submit" class="btn btn-success" name="btnAddproduct" value="  ບັນທຶກ  " />

						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</form>
</section>