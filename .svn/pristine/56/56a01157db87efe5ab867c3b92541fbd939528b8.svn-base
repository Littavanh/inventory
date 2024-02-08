<?php
session_start();
htmltage("ໂອນສິນຄ້າໄປສາຂາ");

if (isset($_SESSION['EDPOSV1TransferProduct']) && $_SESSION['EDPOSV1tmpProductID_t'] != '') {
	include("v_tranferproduct.php");
}
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['role_id'] == 4) {
	header("Location: ?d=index");
}
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>
<script language="javascript" type="text/javascript">
	function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp = false;
		try {
			xmlhttp = new XMLHttpRequest();
		} catch (e) {
			try {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				try {
					xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e1) {
					xmlhttp = false;
				}
			}
		}

		return xmlhttp;
	}
	/*******************/
	function Findinfo(GetInfoID) {
		//alert("Problem while using XMLHTTP (Account List):\n" );
		var strURL = "function/findInfo.php?GetInfoID=" + GetInfoID;
		var req = getXMLHTTP();
		if (req) {
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {
						document.getElementById('infoIDT').innerHTML = req.responseText;
						'<option>Select City</option>' +
						'</select>';
					} else {
						alert("Problem while using XMLHTTP (Account List):\n" + req.statusText);
					}
				}
			}
			req.open("GET", strURL, true);
			req.send(null);
		}
	}
</script>
<section class="content-header">
	<h1>ໂອນສິນຄ້າໄປສາຂາ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<p><?= $success ?></p>
					<p class="errormessage"><?= $exist ?></p>
				</div>
				<form method="post" id="frmtranH" action="?d=stock/transfer" enctype="multipart/form-data">
					<div class="box-body">
						<div class="row">
							<div class="form-group col-md-4">
								<label>ວັນທີ່ໂອນ</label>
								<div class="input-group date">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input type="text" name="txtDate" class="form-control pull-right" id="datepicker1" autocomplete="off" data-date-format="yyyy-mm-dd" value="<?= $_SESSION['EDPOSV1TransferProducttxtDate'] ?>" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label>ຈາກ ສາງ</label>


								<?php if ($_SESSION['EDPOSV1role_id'] <= '2') { ?>
									<select class="form-control" name="infoIDF" onChange="Findinfo(this.value)" required>
										<?php
										$rs_info = LoadInfo();
										while ($row_c = mysql_fetch_array($rs_info, MYSQL_ASSOC)) {
											$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : "";
										?>
											<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
										<?php } ?>
									</select>
								<?php } else { ?>
									<select name="infoID[]" class="form-control" onChange="FindKF(this.value); " required>
										<option value="<?= $Get_infoID ?>"><?= $Get_infoName ?></option>
									</select>
								<?php } ?>

							</div>
						</div>

						<div class="row">
							<div class="form-group col-md-4">
								<label>ຜູ້ສົ່ງ</label>
								<input type="text" name="txttransfer" class="form-control" value="<?= $_SESSION['EDPOSV1TransferProducttxttransfer'] ?>" required />
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-4" id="infoIDT">
								<label>ໂອນໄປ ສາງ</label>
								<select name="txtinfoIDT" class="form-control" required>
									<option selected>--ເລືອກລາຍການ--</option>
									<?php if (isset($_SESSION['EDPOSV1TransferProducinfoIDF'])) {
										$infoSel = $_SESSION['EDPOSV1TransferProducinfoIDF'];
										$rsInfo_T = LoadInfoID_selT($infoSel);
										while ($row_c = mysql_fetch_array($rsInfo_T, MYSQL_ASSOC)) {
											$selected = $row_c['info_id'] == $_SESSION['EDPOSV1TransferProducinfoIDT'] ? "selected" : "";
									?>
											<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
									<?php }
									}   ?>


								</select>
							</div>
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label>ໝາຍເຫດ</label>
								<textarea name="txtRemark" class="form-control" cols="50" rows="2"><?= $_SESSION['EDPOSV1TransferProducttxtRemark'] ?></textarea>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" class="btn btn-primary" name="btnTransferproduct" value="  ເພີ່ມສິນຄ້າເຂົ້າລາຍການໂອນ  " />
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- show data in table -->
	<?php if ($catcount > 0) { ?>
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<form method="post" id="frmtranD" action="?d=stock/transfer" enctype="multipart/form-data">
						<div class="row">
							<div class="form-group col-md-6">
								<label>ເອກະສານ</label>
								<input name="edit_fileUpload" class="form-control" type="file">
							</div>
						</div>

						<div class="box-body pad table-responsive">
							<table id="example1" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ລຳດັບ</th>
										<th>ຊື່ ວັດຖຸດິບ</th>
										<th>ລາຄາ</th>
										<th>ວັນໝົດອາຍຸ</th>
										<!-- <th>ຫົວໜ່ວຍ(1)</th>
								  	<th>ຈໍານວນ(1)</th>
							        <th>ຫົວໜ່ວຍ(2)</th>
								  	<th>ຈໍານວນ(2)</th> -->
										<th>ຫົວໜ່ວຍ</th>
										<th>ຈໍານວນ</th>
										<?php if ($_SESSION['EDPOSV1role_id'] != 4) { ?>
											<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>

									<?php $i = 1;
									//	$result= loadV_transaction_tran();
									$result = LoadPrice_setting("", "", "");

									while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { ?>
										<tr>
											<td>
												<span><?= ($i + $start) ?></span>
												<input type="hidden" name="type[]" class="type" value="added" />
												<input type="hidden" name="id[]" value="<?= $row['tmpDID'] ?>" />
												<input type="hidden" name="txtstatus_id[]" value="<?= $row['status_id'] ?>" />
											</td>
											<td><input type="hidden" name="txtm_name[]" size="" value="<?= $row['materialName'] ?>" readonly /><?= $row['materialName'] ?></td>
											<td><?= number_format($row['pur_price']) ?></td>
											<td><?= $row['exp_date'] ?></td>
											<!-- <td><?= $row['unitName1'] ?></td>	  
						            <td><?= number_format($row['unitQty1']) ?></td>	          
						          	<td><?= $row['unitName2'] ?></td>	  
						            <td><?= number_format($row['unitQty2']) ?></td>	          -->
											<td><?= $row['unitName3'] ?></td>
											<td><?= number_format($row['unitQty3']) ?></td>
											<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4) { ?>
												<td class="centered">
													<a href="?d=stock/transfer&del_id=<?php echo base64_encode($row["tmpDID"] . "tasoksavhay"); ?>&delinfoid=<?= $row['info_id'] ?>&tranOld=<?= $row['tranOld'] ?>&tranNew=<?= $row['tranNew'] ?>">
														<i class="fa fa-trash-o"></i></a>
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
								<input type="submit" class="btn btn-primary" name="btnSaveTransfer" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  " onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />
							</div>
						<?php } ?>
					</form>
				</div>
			</div>
		</div>
	<?php } ?>
</section>