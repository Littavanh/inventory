<?php
date_default_timezone_set('Asia/Vientiane');
session_start();
htmltage("ລາຍການສິນຄ້າລໍຖ້າໂອນ");

if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['role_id'] == 4) {
	header("Location: ?d=index");
}
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ລາຍການສິນຄ້າລໍຖ້າໂອນ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4>ເນື້ອໃນການໂອນ</h4>
				</div>

				<form method="post" id="frmtranH" action="?d=stock/tran_detail" enctype="multipart/form-data">
					<div class="box-body">

						<div class="row">
							<div class="form-group col-md-12" id="infoIDT">
								<label>ວັນທີ່ໂອນ</label>
								<input type="text" name="txttransfer" class="form-control" value="<?= $_SESSION['EDPOSV1RTransferDate'] ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12" id="infoIDT">
								<label>ຈາກ ສາຂາ</label>
								<input type="text" name="txttransfer" class="form-control" value="<?= $_SESSION['EDPOSV1_infoNameSend'] ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12" id="infoIDT">
								<label>ໂອນໄປ ສາຂາ</label>
								<input type="text" name="txttransfer" class="form-control" value="<?= $_SESSION['EDPOSV1_infoNameReceive'] ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12" id="infoIDT">
								<label>ຜູ້ສົ່ງ</label>
								<input type="text" name="txttransfer" class="form-control" value="<?= $_SESSION['EDPOSV1RTransfertxtransfer'] ?>" readonly />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<label>ໝາຍເຫດ</label>
								<textarea name="txtRemarkF" class="form-control" cols="50" rows="3" readonly=""><?= $_SESSION['EDPOSV1RTransferRemark'] ?></textarea>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-12">
								<p><a href="doc/index.php?filename=<?= $_SESSION['EDPOSV1RTransferfilename'] ?>" target="_blank">ດາວໂຫຼດເອກະສານຂັດຕິດ</a></p>
							</div>
						</div>
					</div>

				</form>
			</div>
		</div>
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h4>ລາຍການສິນຄ້າລໍຖ້າຮັບ</h4>
					<p class="errormessage" align="center">ກະລຸນາກວດກາສິນຄ້າຄືນເພື່ອຄວາມຖືກຕ້ອງ</p>
					<p class="errormessage"><?= $exits ?></p>
					<p><?= $success ?></p>
				</div>
				<div class="box-body">
					<form method="post" id="frmPriceSetting" action="?d=stock/tran_detail" enctype="multipart/form-data">
						<div class="box-body pad table-responsive">
							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th>ລຳດັບ</th>
										<th>ຊື່ ວັດຖຸດິບ</th>
										<th>ວັນໝົດອາຍຸ</th>
										<!-- <th>ຫົວໜ່ວຍ(1)</th>
										<th>ຈໍານວນ(1)</th>
										<th>ຫົວໜ່ວຍ(2)</th>
										<th>ຈໍານວນ(2)</th> -->
										<th>ຫົວໜ່ວຍ</th>
										<th>ຈໍານວນ</th>
										<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
											<th>ຍົກເລີກ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									$wherecause = $_SESSION['EDPOSV1_RtranID'];
									$result = LoadTranDetail($wherecause);

									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
										<tr>
											<td class="centered itemcols">
												<span><?= ($i + $start) ?></span>
												<input type="hidden" name="type[]" class="type" value="unchanged" />
												<input type="hidden" name="thid[]" value="<?= $row['traID'] ?>" />
												<input type="hidden" name="id[]" value="<?= $row['tradid'] ?>" />
												<input type="hidden" name="mName[]" value="<?= $row['materialName'] ?>" />
											</td>
											<td><?= $row['materialName'] ?></td>
											<td><?= $row['exp_date'] ?></td>
											<!-- <td><?= $row['unitName1'] ?></td>
											<td><?= $row['unitQty1'] < 0 ? $row['unitQty1'] * -1 : $row['unitQty1'] ?></td>
											<td><?= $row['unitName2'] ?></td>
											<td><?= $row['unitQty2'] < 0 ? $row['unitQty2'] * -1 : $row['unitQty2'] ?></td> -->
											<td><?= $row['unitName3']  ?></td>
											<td><?= $row['unitQty3'] < 0 ? $row['unitQty3'] * -1 : $row['unitQty3'] ?></td>
											<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
												<td class="centered">
													<a href="?d=stock/tran_detail&del_id=<?php echo base64_encode($row["traID"] . "tasoksavhay"); ?>&infoID=<?= $row["info_id"] ?>&tranID=<?= $row["tranID"] ?>&trandid=<?= $row['tradid'] ?>&mid=<?= $row['materialID'] ?>&cnid=<?= $row['cnid'] ?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a>
												</td>
											<?php } ?>
										</tr>
									<?php $i++;
									} ?>
								</tbody>
							</table>
						</div>
						<?php if (isset($_SESSION['EDPOSV1role_id'])) { ?>
							<div class="box-footer">
								<?php
								$CcountTranList = nr_execute(" select COUNT(*) from v_transaction_tran WHERE tranID='$wherecause' and Dstatus_id IN (15) ");
								if ($CcountTranList > 0) { ?>
									<input type="submit" class="btn btn-primary" name="btnSaveTransfer" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  " onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />
								<?php } else { ?>
									<button type="button" class="btn btn-info" onclick="document.location='?d=stock/receive_tran&infoID=<?= $_SESSION['EDPOSV1RTransferInfoT'] ?>'">&nbsp;&nbsp;&nbsp;&nbsp;ປິດ&nbsp;&nbsp;&nbsp;&nbsp;</button>
								<?php } ?>
							</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	</div>



</section>