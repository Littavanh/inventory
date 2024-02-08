<?php htmltage("ລາຍງານຊໍາລະເຄື່ອງອອກສາງ");
date_default_timezone_set('Asia/Vientiane');
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
	<h1>ລາຍງານການເບີກສິນຄ້າ</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<form method="get">
					<input type="hidden" name="d" value="report/stock_transfer" />
					<div class="box-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group col-md-6">
									<label>ລາຍງານຂອງເດືອນ</label>
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="month" name="startdate" class="form-control pull-right"
											autocomplete="off" data-date-format="yyyy-mm"
											value="<?= $_GET['startdate'] ?>" max="<?= date('Y-m') ?>">
									</div>
								</div>
								<!-- <div class="form-group col-md-6" >
									<label>ເຖິງວັນທີ</label>
									<div class="input-group date" >
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" name="enddate" class="form-control pull-right" id="datepicker2" autocomplete="off" data-date-format="yyyy-mm-dd" value="<?= $_GET['enddate'] ?>">
									</div>
								</div> -->

								<div class="form-group col-md-6">
									<label>ສາງ</label>
									<select class="form-control" name="infoID">
										<option value="0">-- ເລືອກທັງໝົດ --</option>
										<?php
										$rs_info = LoadInfo();
										while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
											$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : "";
											?>
												<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>>
													<?= $row_c['info_name'] ?>
												</option>
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
									<p class="right"><a href="report/ex_stock_transfer.php?<?= $params ?>"
											target="_blank">
											<input type="button" value="Export To Excel" />
										</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default"
							onclick="document.location='?d=report/stock_transfer'">ຍົກເລີກ</button>
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
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									ລຳດັບ<br />Items<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									Barcode<br />ID<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									ລາຍລະອຽດສິນຄ້າ<br />Description of Goods<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									ຫົວໜ່ວຍ<br />Unit<br /></th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									ລາຄາ<br />Unit Price<br /></th>


								<th style="white-space: nowrap; overflow: hidden;" colspan="2">ອອກສາງ</th>
								<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
									ສະກຸນເງິນ<br />Currency<br /></th>
								<th style="white-space: nowrap; overflow: hidden;">ວັນ/ເດືອນ/ປີ</th>
								<th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;"
									rowspan="2">ໃບສະເໜີຂໍເບີກ ສິນຄ້າເລກທີ່</th>
								<th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;"
									rowspan="2">ຜູ້ສະເໜີ</th>
								<th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;"
									rowspan="2">ຂະແໜງນຳໃຊ້</th>
								<th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;"
									rowspan="2">ເຫດຜົນທີ່ນຳໃຊ້</th>

							</tr>
							<tr>


								<th style="white-space: nowrap; overflow: hidden;">Quantity</th>
								<th style="white-space: nowrap; overflow: hidden;">Amount</th>
								<th style="white-space: nowrap; overflow: hidden;">dd/mm/yy</th>



							</tr>
						</thead>
						<tbody>

							<?php
							$SumPrice = 0;
							// ລວມຍອດເງິນ
							$total_purpice_KIP = 0;
							$total_purpice_THB = 0;
							$total_purpice_USA = 0;
							$total_KIP = 0;
							$total_THB = 0;
							$total_USA = 0;
							$j = 1;
							$sumQtyKip = 0;
							$sumQtyThb = 0;
							$sumQtyUsd = 0;
							while ($itemD = mysql_fetch_array($SumResult)) {
								$whereGroupID = $item['Dstatus_id'];









								if ($itemD['cur_name'] == 'ກີບ') {
									$total_purpice_KIP = $total_purpice_KIP + $itemD['pur_price'];
									$sumQtyKip = $sumQtyKip + $itemD['unitQTY3'];
									$total_KIP = $total_KIP + ($itemD['pur_price'] * $itemD['unitQTY3']);
								} else if ($itemD['cur_name'] == 'ບາດ') {
									$total_purpice_THB = $total_purpice_THB + $itemD['pur_price'];
									$sumQtyThb = $sumQtyThb + $itemD['unitQTY3'];
									$total_THB = $total_THB + ($itemD['pur_price'] * $itemD['unitQTY3']);
								} else if ($itemD['cur_name'] == 'ໂດລາ') {
									$total_purpice_USA = $total_purpice_USA + $itemD['pur_price'];
									$sumQtyUsd = $sumQtyUsd + $itemD['unitQTY3'];
									$total_USA = $total_USA + ($itemD['pur_price'] * $itemD['unitQTY3']);
								}
								$sumTotalQty = $sumQtyKip + $sumQtyThb + $sumQtyUsd;


								?>

									<tr>
										<td>
											<?= $j ?> | <?= $itemD['kf_id'] ?>
										</td>
										<td>
											<?= $itemD['mBarcode'] ?>
										</td>
										<td>
											<?= $itemD['materialName'] ?>
										</td>
										<td>
											<?= $itemD['unitName3'] ?>
										</td>
										<td>
											<?= number_format($itemD['pur_price'], 2, '.', ',') ?>
										</td>

										<td align="center">
											<?= number_format($itemD['unitQTY3']) ?>
										</td>
										<td>
											<?= number_format(($itemD['pur_price']) * ($itemD['unitQTY3']), 2, '.', ',') ?>
										</td>
										<td align="center">
											<?= $itemD['cur_name'] ?>
										</td>
										<td>
											<?= date('Y-m-d', strtotime($itemD['date_ad'])) ?>
										</td>

										<td>
											<?= $itemD['releas'] ?>
										</td>
										<td>
											<?= $itemD['staffName'] ?>
										</td>
										<td>
											<?= $itemD['sector'] ?>
										</td>

										<td>
											<?= $itemD['Dremark'] ?>
										</td>
									</tr>

									<?php $j++;

									$totalSumPrice += $SumPrice;
									$i++;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" align="right">ລວມ</td>
								<!-- <td align="right">
									<?= number_format($total_purpice_KIP, 2, '.', ',') ?>
								</td> -->

								<td align="center">
									<?= $sumTotalQty ?>
								</td>

							</tr>
							<tr style="color:#222">
								<td colspan="5" bgcolor="#999999" align="right">ລວມມູນຄ່າ ເງິນກີບ</td>
								<!-- <td align="right">
									<?= number_format($total_purpice_KIP, 2, '.', ',') ?>
								</td> -->

								<td align="center">
									<?= $sumQtyKip ?>
								</td>
								<td align="right" bgcolor="#999999">
									<?= number_format($total_KIP, 2, '.', ',') ?>
								</td>
								<td align="center"> <strong>ກີບ</strong> </td>
							</tr>
							<tr style="color:#222">

								<td colspan="5" bgcolor="#999999" align="right">ລວມມູນຄ່າ ເງິນບາດ</td>
								<!-- <td align="right">
									<?= number_format($total_purpice_THB, 2, '.', ',') ?>
								</td> -->

								<td align="center">
									<?= $sumQtyThb ?>
								</td>
								<td align="right" bgcolor="#999999">
									<?= number_format($total_THB, 2, '.', ',') ?>
								</td>
								<td align="center"> <strong>ບາດ</strong> </td>
							</tr>
							<tr style="color:#222">
								<td colspan="5" bgcolor="#999999" align="right">ລວມມູນຄ່າ ເງິນໂດລາ</td>
								<!-- <td align="right">
									<?= number_format($total_purpice_USA, 2, '.', ',') ?>
								</td> -->

								<td align="center">
									<?= $sumQtyUsd ?>
								</td>
								<td align="right" bgcolor="#999999">
									<?= number_format($total_USA, 2, '.', ',') ?>
								</td>
								<td align="center"> <strong>ໂດລາ</strong> </td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>