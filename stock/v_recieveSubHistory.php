<?php
session_start();
htmltage("ປະຫວັດ ຮັບສິນຄ້າ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
	header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ປະຫວັດ ຮັບສິນຄ້າ</h1>
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
										<!-- <th>TranID</th>
										<th>TranDate</th> -->
										<th>ເລກທີໃບສັ່ງຊື້</th>
										<th>ວັນທີໃບສັ່ງຊື້</th>
										<th>ຜູ້ຮັບສິນຄ້າ</th>
										<!-- <th>ຜູ້ມອບສິນຄ້າ</th> -->
										<th>ຫົວໜ່ວຍທຸລະກິດ</th>
										<th>ຜູ້ສະໜອງ</th>
										<th>ຜູ້ອະນຸມັດ</th>
										<th>ພິມບິນ</th>
										<th>ເອກະສານອ້າງອີງ</th>
										<th>ລາຍລະອຽດ</th>
										<th>ສະຖານະ</th>
										<th>ໝາຍເຫດ</th>


									</tr>
								</thead>
								<tbody>
									<?php
									$load = loadImportPending($where);
									$i = 1;
									while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {

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
														$imagePath = "dist/image/" . $row['po_file'];
														if (!file_exists($imagePath) || $row['po_file'] == '') {
															$imagePath = "dist/image/notfound.png";
														}
														?>
														<embed src="<?=$imagePath?>"  width="100%"
                                                        height="800px" />


													</div>


												</div>

											</div>

										</div>
										<div class="modal fade" id="modal-lg-RejectShow<?= $i ?>" data-backdrop="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h4 class="modal-title ">ໝາຍເຫດ</h4>
														<button type="button" class="close" data-dismiss="modal"
															aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>


													<div class="modal-body">

														<div class="row">
															<div class="row col-md-12 ">
																<div class="form-group col-md-10">

																	<textarea name="txtRemarkReject" class="form-control" readonly
																		cols="50"
																		rows="4"><?= $row['remark_reject'] ?></textarea>
																</div>
															</div>
														</div>


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
												<?= $row['po_no'] ?>
											</td>
											<td class="centered">
												<?= $row['po_date'] ?>
											</td>
											<td class="centered">
												<?= $row['reciever'] ?>
											</td>
											<!-- <td class="centered">
												<?= $row['orderer_name'] ?> <?= $row['orderer_lastName'] ?>
											</td> -->
											<td class="centered">
												<?= $row['info_name'] ?>
											</td>
											<td class="centered">
												<?= $row['supplierName'] ?>
											</td>
											<?php
                                            if ($row['approver_id'] == 1) {
                                                ?>
                                                <td class="centered">
												<!-- <?= $row['orderer_name'] ?>
													<?= $row['orderer_lastName'] ?> -->
                                                   ພະນັງງານສາງ
                                                </td>
                                                <?php
                                            } else {
                                                ?>

                                                <td class="centered">
                                                    <?= $row['approver'] ?>
                                                    <?= $row['approver_last_name'] ?>
                                                </td>
                                                <?php
                                            }
                                            ?>
											 <td class="centered"><a class="btn btn-warning"
                                                    href="print/approveRecieveSubPrint.php?d=stock&tranID=<?= $row['tranID'] ?>"
                                                    target="_blank" role="button"><i class="fa fa-print"></i></td>
											<td class="centered">
												<a href="#"><i data-toggle="modal"
														data-target="#modal-lg-Image<?= $i ?>">ໄຟລແນບ</i></a>
											</td>

											<td class="centered">
												<a
													href="index.php?d=stock/recieveSubHistoryDetail&tranID=<?= $row['tranID'] ?>&po_no=<?= $row['po_no'] ?>&po_date=<?= $row['po_date'] ?>&info_name=<?= $row['info_name'] ?>&bill_no=<?= $row['bill_no'] ?>&bill_date=<?= $row['bill_date'] ?>&whouse_no=<?= $row['whouse_no'] ?>&whouse_date=<?= $row['whouse_date'] ?>"><i>ເບິ່ງລາຍລະອຽດ</i></a>
											</td>
											<?php

											if ($row['statusApprove_id'] == "2") {
												?>
												<td class="centered">
													<h4><span class="label label-warning">ລໍຖ້າອະນຸມັດ</span></h4>
												</td>
												<?php
											} else if ($row['statusApprove_id'] == "4") {
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
														<h4><span class="label label-success">ອະນຸມັດແລ້ວ</span></h4>
													</td>
												<?php
											}
											?>
											<!-- <td class="centered"> <a class="btn btn-success" href="?d=stock1/approveRecieve&approve=<?= $row['tranID'] ?>" onclick="return confirm('ທ່ານຕ້ອງການອະນຸມັດແທ້ບໍ່ ?')">ອະນຸມັດ</a></td> -->
											<td>	<h5> <?=$row['remark_reject']?></h5></td>
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