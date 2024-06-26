<?php htmltage("ລາຍງານ ສິນຄ້າຄົງເຫລືອ"); ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
	<h1>ລາຍງານ ສິນຄ້າຄົງເຫລືອ</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form method="get">
					<input type="hidden" name="d" value="report1/receive" />
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group col-md-6">
									<label>ລາຍງານຂອງເດືອນ</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="month" name="startdate" class="form-control pull-right" autocomplete="off" data-date-format="yyyy-mm" value="<?= $_GET['startdate']  ?>" max="<?= date('Y-m') ?>">
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
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<p class="right">
										<a href="report1/ex_receive.php?<?= $params ?>" target="_blank">
											<input type="button" value="Export To Excel" />
										</a>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report1/receive'">ຍົກເລີກ</button>
						<button type="submit" class="btn btn-primary">ຄົ້ນຫາ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body pad table-responsive">
					<table id="example1" class="table table-bordered beautified_report">
						<thead>
							<tr>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ລຳດັບ<br />Items<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">Barcode<br />ID<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ລາຍລະອຽດສິນຄ້າ<br />Description of Goods<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ຫົວໜ່ວຍ<br />Unit<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ລາຄາ<br />Unit Price<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ສະກຸນເງິນ<br />Currency<br /></th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;" colspan="2">ຍອດຍົກມາ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;" colspan="2">ຮັບສິນຄ້າເຂົ້າ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;" colspan="2">ຈ່າຍສິນຄ້າອອກ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;" colspan="2">ຍອດຄົງເຫລືອທ້າຍເດືອນ</th>
							</tr>
							<tr>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ຈຳນວນ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ລວມມູນຄ່າ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ຈຳນວນ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ລວມມູນຄ່າ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ຈຳນວນ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ລວມມູນຄ່າ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ຈຳນວນ</th>
								<th style="white-space: nowrap; overflow: hidden; text-align: center;">ລວມມູນຄ່າ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 1;
							$sumQTY1 = 0;
							$sumQTY2 = 0;
							$sumQTY3 = 0;
							$sumQTY4 = 0;
							$sumPrice1= 0;
							$sumPrice2= 0;
							$sumPrice3= 0;
							$sumPrice4= 0;
							$result_detail = LoadTableV2($start_month, $start_year,  $whereclause);
							while ($itemD = mysql_fetch_array($result_detail)) {
								if ($itemD['acc_bl'] > 0 || $itemD['recive_bl'] > 0 || $itemD['out_bl'] || $itemD['total_bl'] > 0) {

									$sumQTY1 = $sumQTY1 + $itemD['acc_bl'];
									$sumQTY2 = $sumQTY2 + $itemD['recive_bl'];
									$sumQTY3 = $sumQTY3 + abs($itemD['out_bl']);
									$sumQTY4 = $sumQTY4 + $itemD['total_bl'];
									//===============================================
									$sumPrice1 = ($sumPrice1 + ($itemD['acc_bl'] * $itemD['pur_price']));
									$sumPrice2 = ($sumPrice2 + ($itemD['recive_bl'] * $itemD['pur_price']));
									$sumPrice3 = ($sumPrice3 + (abs($itemD['out_bl']) * $itemD['pur_price']));
									$sumPrice4 = ($sumPrice4 + ($itemD['total_bl'] * $itemD['pur_price']));
									//=================
									// sum by currency Before Balance
									if ($itemD['cur_name'] == 'kip') {
										$sumLAK1 = $sumLAK1 + ($itemD['pur_price'] * $itemD['acc_bl']);
										$sumLAK2 = $sumLAK2 + ($itemD['pur_price'] * $itemD['recive_bl']);
										$sumLAK3 = $sumLAK3 + ($itemD['pur_price'] * abs($itemD['out_bl']));
										$sumLAK4 = $sumLAK4 + ($itemD['pur_price'] * $itemD['total_bl']);
									} else if ($itemD['cur_name'] == 'thb') {
										$sumTHB1 = $sumTHB1 + ($itemD['pur_price']  * $itemD['acc_bl']);
										$sumTHB2 = $sumTHB2 + ($itemD['pur_price']  * $itemD['recive_bl']);
										$sumTHB3 = $sumTHB3 + ($itemD['pur_price']  * abs($itemD['out_bl']));
										$sumTHB4 = $sumTHB4 + ($itemD['pur_price']  * $itemD['total_bl']);
									} elseif ($itemD['cur_name'] == 'usd') {
										$sumUSD1 = $sumUSD1 + ($itemD['pur_price']  * $itemD['acc_bl']);
										$sumUSD2 = $sumUSD2 + ($itemD['pur_price']  * $itemD['recive_bl']);
										$sumUSD3 = $sumUSD3 + ($itemD['pur_price']  * abs($itemD['out_bl']));
										$sumUSD4 = $sumUSD4 + ($itemD['pur_price']  * $itemD['total_bl']);
									}

							?>
									<tr>
										<td><?= $i ?></td>
										<td align="center"><?= $itemD['mBarcode'] ?></td>
										<td><?= $itemD['materialName'] ?></td>
										<td><?= $itemD['unitName3'] ?></td>
										<td align="right"><?=($itemD['pur_price'] == 0) ? '-' :  number_format($itemD['pur_price'],2, '.', ',') ?></td>
										<td align="center"><?= $itemD['cur_name'] ?></td>
										<td align="right"><?= ($itemD['acc_bl'] == 0) ? '-' : number_format($itemD['acc_bl'])  ?></td>
				

										<td align="right"><?= ($itemD['acc_bl'] * $itemD['pur_price'] == 0) ? '-' : number_format($itemD['acc_bl'] * $itemD['pur_price'],2, '.', ',')  ?></td>
										<td align="right"><?= ($itemD['recive_bl'] == 0) ? '-' : number_format($itemD['recive_bl']) ?></td>
										<td align="right"><?= ($itemD['recive_bl'] * $itemD['pur_price'] == 0) ? '-' : number_format($itemD['recive_bl'] * $itemD['pur_price'],2, '.', ',') ?></td>
										<td align="right"><?= ($itemD['out_bl'] == 0) ? '-' : number_format(abs($itemD['out_bl'])) ?></td>
										<td align="right"><?= ($itemD['out_bl'] * $itemD['pur_price'] == 0) ? '-' : number_format(abs($itemD['out_bl']) * $itemD['pur_price'],2, '.', ',') ?></td>
										<td align="right"><?= ($itemD['total_bl'] == 0) ? '-' : number_format($itemD['total_bl']) ?></td>
										<td align="right"><?= ($itemD['total_bl'] * $itemD['pur_price'] == 0) ? '-' : number_format($itemD['total_bl'] * $itemD['pur_price'],2, '.', ',') ?></td>
									</tr>

							<?php $i++;
								}
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" align="right"><strong>ລວມ</strong></td>
								<td align="right"><strong><?= number_format($sumQTY1) ?></strong></td>
								<td align="right"><strong></strong></td>
								<td align="right"><strong><?= number_format($sumQTY2) ?></strong></td>
								<td align="right"><strong> </strong></td>
								<td align="right"><strong><?= number_format($sumQTY3) ?></strong></td>
								<td align="right"><strong> </strong></td>
								<td align="right"><strong><?= number_format($sumQTY4) ?></strong></td>
								<td align="right"><strong> </strong></td>
							</tr>
							<tr>
								<td colspan="6" align="right" style="color:#222" bgcolor="#c0c0c0"><strong>ລວມມູນຄ່າ ເງີນກີບ</strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumLAK1,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumLAK2,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumLAK3,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumLAK4,2, '.', ',') ?></strong></td>
							</tr>
							<tr>
								<td colspan="6" align="right" style="color:#222" bgcolor="#c0c0c0"><strong>ລວມມູນຄ່າ ເງີນບາດ</strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumTHB1,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumTHB2,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumTHB3,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumTHB4,2, '.', ',') ?></strong></td>
							</tr>
							<tr>
								<td colspan="6" align="right" style="color:#222" bgcolor="#c0c0c0"><strong>ລວມມູນຄ່າ ໂດລາ</strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumUSD1,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumUSD2,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumUSD3,2, '.', ',') ?></strong></td>
								<td align="right"></td>
								<td align="right" style="color:#222" bgcolor="#c0c0c0"><strong><?= number_format($sumUSD4,2, '.', ',') ?></strong></td>
							</tr>

						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>