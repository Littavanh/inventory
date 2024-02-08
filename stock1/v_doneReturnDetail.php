<?php
session_start();
htmltage("ລາຍລະອຽດ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
	header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ລາຍລະອຽດ</h1>
</section>
<section class="content">
	<form method="post" id="" action="?d=stock1/returnConfirmDetail&bId=<?= $_SESSION['bId'] ?>" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">

					<div class="box-body">
						<button type="reset" class="btn btn-default"
							onclick="document.location='?d=stock1/doneReturn'">ປິດ</button>
						<div class="row">
							<div class="box-body pad table-responsive">
								<h4>
									<?= $pagedescription ?>
								</h4>

								<table id="example1" class="table table-bordered table-hover beautified editable">
									<thead>
										<tr>
											<th>ລຳດັບ</th>
											<th>ລາຍການ</th>

											<th>ຈຳນວນ</th>
											<th>ນຳໃຊ້</th>
											<th>ສົ່ງຄືນ</th>
											<th>ໝາຍເຫດ</th>


										</tr>
									</thead>
									<tbody>
										<?php
										$load = loadAddjustHistory();
										$i = 1;
										while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {

											?>



											<tr>
												<input type="hidden" name="type[]" class="type" value="added" />
												<input type="hidden" name="txttraDID[]" class="type"
													value="<?= $row['traDID'] ?>" />
												<td class="centered">
													<?= $i ?>
												</td>
												<!-- <td class="centered">
												<?= $row['tranID'] ?>
											</td> -->
												<td>
													<?= $row['materialName'] ?>
												</td>

												<td class="centered">
													<?= ($row['unitQty3']) * (-1) ?>
													<input type="hidden" name="txtQty[]" id="txtQty<?= $i ?>"
														value="<?= ($row['unitQty3']) * (-1) ?>">
												</td>

												<td class="centered">
													<?= $row['qty_used'] ?>

												</td>

												<td class="centered">
													<?= $row['qty_return'] ?>

												</td>
												<td class="centered">
													<?= $row['remark_return'] ?>

												</td>

											</tr>
											<?php
											$i++;
										}
										?>
									</tbody>
								</table>

							</div>
						</div>
					</div>
					<!-- <div class="box-footer">
						<div style="display:flex; justify-content:flex-end; width:100%; padding: 10px;">
						
							<input type="submit" name="btnConfirmReturn" class="btn btn-success"
								value="ຢືນຢັນສົ່ງຄືນສິນຄ້າ">

						</div>
					</div> -->
				</div>
			</div>

		</div>
	</form>
</section>
<script>
	function cal(qty, i) {

		txtQty = document.getElementById("txtQty" + i).value;

		qty = qty;
		// alert(txtQty);
		// alert(qty);
		if (txtQty >= qty) {
			document.getElementById("txtReturn" + i).value = txtQty - qty;
			console.log(document.getElementById("txtReturn" + i).value);
		} else {
			alert("ຈຳນວນນຳໃຊ້ຕ້ອງນ້ອຍກ່ວາຈຳນວນທີ່ເບີກມາ!!");
			document.getElementById("txtUsed" + i).value = "";
			document.getElementById("txtReturn" + i).value = "";
		}


	}
</script>