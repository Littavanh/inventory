<?php htmltage("ລາຍງານການເຄື່ອນໄຫວສາງ"); ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
	<h1>ລາຍງານການເຄື່ອນໄຫວສາງ</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form method="get">
					<input type="hidden" name="d" value="report/inventory_movement" />
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group col-md-6">
									<label>ແຕ່ວັນທີ</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="date" name="startdate" class="form-control pull-right" id="datepicker1" autocomplete="off" data-date-format="yyyy-mm-dd" value="<?= $_GET['startdate']  ?>">
									</div>
								</div>
								<div class="form-group col-md-6">
									<label>ເຖິງວັນທີ</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="date" name="enddate" class="form-control pull-right" id="datepicker2" autocomplete="off" data-date-format="yyyy-mm-dd" value="<?= $_GET['enddate']  ?>">
									</div>
								</div>

								<div class="form-group col-md-6">
									<label>ສາງ</label>
									<select class="form-control" name="infoID">
										<option value="0">-- ເລືອກທັງໝົດ --</option>
										<?php
										$rs_info = LoadInfo();
										while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
											$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : "";
										?>
											<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-md-5">
									<label>ໝວດສິນຄ້າ</label>
									<select class="form-control" name="categoryID" id="select2">
										<option value="0">-- ເລືອກທັງໝົດ --</option>
										<?php
										$cate = LoadCategory();
										while ($row_c = mysql_fetch_array($cate, MYSQL_ASSOC)) {
											$selected = $row_c['kf_id'] == $_GET['categoryID'] ? "selected" : "";
											?>
											<option value="<?= $row_c['kf_id'] ?>" <?= $selected ?>>
												<?= $row_c['kf_name'] ?>
											</option>
										<?php } ?>
									</select>
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p class="right"><a href="report/ex_inventory_movement.php?<?= $params ?>" target="_blank">
											<input type="button" value="Export To Excel" />
										</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/inventory_movement'">ຍົກເລີກ</button>
						<button type="submit" class="btn btn-primary">ຄົ້ນຫາ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<style>
		th {
			text-align: center;
		}
	</style>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body pad table-responsive">
					<table id="example1" class="table table-bordered beautified_report">
						<thead>
							<tr>
								<th>ລຳດັບ</th>
								<th>ວັນທີ່</th>
								<th>ຮັບເຂົ້າ/ຕັດອອກ</th>
								<th>ຊື່ ວັດຖຸດິບ</th>
								<!-- <th>ຈໍານວນ(1)</th>
								<th>ຈໍານວນ(2)</th> -->
								<th>ຈໍານວນ</th>
								<th>ລວມມູນຄ່າ</th>
								<th>ວັນທີ່ໝົດອາຍຸ</th>
								<th>ຜູ້ແກ້ໄຂ</th>
								<th>ວັນທີແກ້ໄຂ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$SumTotalIn = '0';
							$SumTotalOut = '0';
							while ($itemD = mysql_fetch_array($result_detail)) {
								$convert11 = 0;
								$convert12 = 0;
								$convert21 = 0;
								$convert22 = 0;
								if ($itemD['unitQty3'] > 0) {
									$SumTotalIn = $SumTotalIn + ($itemD['pur_price'] * $itemD['unitQty3']);
								} else {
									$SumTotalOut = $SumTotalOut + ($itemD['pur_price'] * $itemD['unitQty3']);
									// $SumTotalOut = $SumTotalOut + ($itemD['sale_price']* $itemD['unitQty3']);
								}


								if ($itemD['cap1'] != 0) {
									$convert11 = $itemD['unitQty3'] % $itemD['cap1'];
									$convert12 = ($itemD['unitQty3'] - ($convert11)) / $itemD['cap1'];
									$convert21 = $convert11 % $itemD['cap2'];
									$convert22 = ($convert11 - $convert21) / $itemD['cap2'];
								} else if ($itemD['cap2'] != 0) {
									$convert11 = 0;
									$convert12 = 0;
									$convert21 = $itemD['unitQty3'] % $itemD['cap2'];
									$convert22 = ($itemD['unitQty3'] - $convert21) / $itemD['cap2'];
								} else if ($itemD['cap3'] != 0) {
									$convert11 = 0;
									$convert12 = 0;
									$convert21 = $itemD['unitQty3'];
									$convert22 = 0;
								}
							?>
								<tr>
									<td class="centered"><?= ($i + $start) ?></td>
									<td><?= $itemD['date_tran'] ?></td>
									<td><?= $itemD['Typename'] ?></td>
									<td><?= $itemD['materialName'] ?></td>
									<!-- <td><?= number_format($convert12) . ' ' . $itemD['unitName1'] ?></td>
									<td><?= number_format($convert22) . ' ' . $itemD['unitName2'] ?></td> -->
									<td><?= number_format($convert21) . ' ' . $itemD['unitName3'] ?></td>
									<td align="right"><?= number_format($itemD['pur_price'] * $itemD['unitQty3'],2, '.', ',') ?></td>
									<td><?= $itemD['exp_date'] ?></td>
									<td><?= $itemD['username'] ?></td>
									<td><?= $itemD['date_add'] ?></td>
								</tr>

							<?php
								$i++;
							}
							?>
						</tbody>
						<tfoot>
							<tr style="color:#FFF" bgcolor="#999999">
								<td class="centered" colspan="4" rowspan="2">ລວມມູນຄ່າ <br> <?= $_GET['startdate'] ?> - <?= $_GET['enddate'] ?></td>
								<td align="center" colspan="4">ລວມມູນຄ່າ ຮັບເຂົ້າ</td>
								<td align="center" colspan="3">ລວມມູນຄ່າ ຈ່າຍອອກ</td>
							</tr>
							<tr style="color:#FFF" bgcolor="#999999">
								<td align="center" colspan="4"><?= number_format($SumTotalIn,2, '.', ',') ?></td>
								<td align="center" colspan="3"><?= number_format($SumTotalOut,2, '.', ',') ?></td>
							</tr>

						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>