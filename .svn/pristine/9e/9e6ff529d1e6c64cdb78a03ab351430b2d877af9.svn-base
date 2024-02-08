<?php
session_start();
htmltage("ອະນຸມັດເບີກສິນຄ້າ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
	header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ອະນຸມັດເບີກສິນຄ້າ</h1>
</section>
<section class="content">

	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">

				<div class="box-body">

					<div class="row">
						<div class="box-body pad table-responsive">
							<h4>
								<?= $pagedescription ?>
							</h4>

							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th>ລຳດັບ</th>

										<th>ໃບເບີກເລກທີ</th>
										<th>ວັນທີ</th>
										<th>ຜູ້ຂໍເບີກ</th>
										<th>ພາກສ່ວນ</th>
										<th>ໝາຍເຫດ</th>
										<th>ຜູ້ອະນຸມັດ</th>
										<th>Status</th>
										<th>File</th>
										<th>View Data</th>
										<th>Action</th>


									</tr>
								</thead>
								<tbody>
									<?php
									$load = loadExportPending($where);
									$i = 1;
									while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {

										?>

										<div class="modal fade" id="modal-lg-Image<?= $i ?>" data-backdrop="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title ">ໄຟລແນບ</h4>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-body">


														<?php
														$imagePath = "dist/image/addjust" . $row['po_file'];
														if (!file_exists($imagePath) || $row['po_file'] == '') {
															$imagePath = "dist/image/addjust/notfound.png";
														}
														?>
														<img src="<?= $imagePath ?>" alt="Image" style="width:100%">


													</div>


												</div>

											</div>

										</div>

										<tr>
											<td class="centered">
												<?= $i ?>
											</td>
											<!-- <td class="centered">
												<?= $row['tranID'] ?>
											</td>
											<td class="centered">
												<?= $row['traDate'] ?>
											</td> -->
											<td class="centered">
												<?= $row['release'] ?>
											</td>
											<td class="centered">
												<?= $row['date_tran'] ?>
											</td>
											<td class="centered">
												<?= $row['first_name'] ?>
												<?= $row['last_name'] ?>
											</td>
											<td class="centered">
												<?= $row['info_name'] ?>
											</td>
											<td class="centered">
												<?= $row['Dremark'] ?>
											</td>
											<td class="centered">
											<?= $row['approve_name'] ?>
												<?= $row['approve_lastName'] ?>
											</td>
											<td class="centered">
											<span class="label label-warning ">
													<?= $row['text'] ?>
												</span>
											</td>
											<td class="centered">
												<a href="#"><i data-toggle="modal"
														data-target="#modal-lg-Image<?= $i ?>">ໄຟລແນບ</i></a>
											</td>

											<td class="centered">
												<a
													href="index.php?d=stock/approveAddjustDetail&id=<?= $row['transferID'] ?>"><i>ເບິ່ງລາຍລະອຽດ</i></a>
											</td>
											<td class="centered">
												<a class="btn btn-success"
													href="?d=stock/approveAddjust&approve=<?= $row['transferID'] ?>"
													onclick="return confirm('ທ່ານຕ້ອງການອະນຸມັດແທ້ບໍ່ ?')">ອະນຸມັດ</a>
													<a class="btn btn-danger"
													href="?d=stock/approveAddjust&reject=<?= $row['transferID'] ?>"
													onclick="return confirm('ທ່ານຕ້ອງການປະຕິເສດອະນຸມັດແທ້ບໍ່ ?')">ບໍ່ອະນຸມັດ</a>
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
			</div>
		</div>
	</div>
</section>