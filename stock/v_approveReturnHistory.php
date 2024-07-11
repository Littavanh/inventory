<?php
session_start();
htmltage("ປະຫວັດອະນຸມັດເບີກສິນຄ້າ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
	header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ປະຫວັດອະນຸມັດເບີກສິນຄ້າ</h1>
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

							<table id="example3" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th>ລຳດັບ</th>
										<th>ເລກທີໃບເບິກ</th>
										<th>ວັນທີຂໍເບີກ</th>
										<th>ຜູ້ຂໍເບີກ</th>
										<th>ຫົວໜ່ວຍທຸລະກິດ</th>
										<th>ໝາຍເຫດ</th>
										<th>ວັນທີ່ຕ້ອງການ</th>
										<th>ຜູ້ອະນຸມັດ</th>
										<th>ໄຟລແນບ</th>
										<th>ລາຍລະອຽດ</th>
									
										<th>ສະຖານະການອະນຸມັດ</th>
										<th>ສະຖານະຮັບເຄື່ອງ</th>
									

									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$a = loadAddjustHistory();

									while ($x = mysql_fetch_array($a)) {
										$transferID = $x['transferID'];
										$b = loadListExport($transferID);
										while ($row = mysql_fetch_array($b)) {
											// echo '<script>console.log("' . $row['transferID'] . '")</script>';




											?>

											<div class="modal fade" id="modal-lg-Image<?= $i ?>" data-backdrop="true">
												<div class="modal-dialog modal-lg">
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
															$imagePath = "dist/image/addjust/" . $row['po_file'];
															if (!file_exists($imagePath) || $row['po_file'] == '') {
																$imagePath = "dist/image/addjust/notfound.png";
															}
															?>
															<embed src="<?= $imagePath ?>" width="100%" height="800px" />


														</div>


													</div>

												</div>

											</div>
											

											<tr>
												<td class="centered">
													<?= $i ?>
												</td>
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
												<?= $row['bu_user_add'] ?>
												</td>
												<td class="centered">
													<?= $row['Dremark'] ?>
												</td>
												<td class="centered">
													<?= $row['date_want'] ?>
												</td>
												<td class="centered">
													<?= $row['approve_name'] ?>
													<?= $row['approve_lastName'] ?>
												</td>

												<td class="centered">
													<a href="#"><i data-toggle="modal"
															data-target="#modal-lg-Image<?= $i ?>">ໄຟລແນບ</i></a>
												</td>
												<td class="centered">
													<a
														href="index.php?d=stock/approveReturnHistoryDetail&transferID=<?= $row['transferID'] ?>"><i>ເບິ່ງລາຍລະອຽດ</i></a>
												</td>
												
												<?php

												if ($row['status_approve_id'] == "3") {
													?>
													<td class="centered">
														<h4><span class="label label-warning ">ລໍຖ້າອະນຸມັດ</span></h4>
													</td>
													<?php

												} else if ($row['status_approve_id'] == "4") {
													?>
														<td class="centered">
															<a href="#"><i data-toggle="modal"
																	data-target="#modal-lg-RejectShow<?= $i ?>">
																	<h4><span class="label label-danger ">ບໍ່ອະນຸມັດ</span></h4>
																</i></a>


														</td>
													<?php
												} else {
													?>
														<td class="centered">
															<h4><span class="label label-success ">ອະນຸມັດສຳເລັດ</span></h4>
														</td>
													<?php
												}
												?>
												<?php

												if ($row['statusGet'] != "") {
													?>
													<td class="centered">

														<h4><span class="label label-primary ">
																<?= $row['statusGet'] ?>
															</span></h4>

													</td>
													<?php
												} else {
													?>
													<td class="centered">

														--

													</td>
													<?php
												}
												?>
												

											</tr>
											<?php
											$i++;
										}
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