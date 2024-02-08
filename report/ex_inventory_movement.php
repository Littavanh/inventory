<?php
session_start();
require_once("../config.php");
require_once("m_inventory_movement.php");
$date = date('Y-m-d');
$output_filename = "Inventory_movement".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");
if (isset($_GET['startdate'])) {
	$FormDate = $_GET['startdate'];
} else {
	$FormDate = date('Y-m-d');
}
if (isset($_GET['enddate'])) {
	$ToDate = $_GET['enddate'];
} else {
	$ToDate = date('Y-m-d');
}
echo "<h4>ລາຍງານການເຄື່ອນໄຫວສາງ  ປະຈໍາວັນທີ່ ".$FormDate." ຫາ ".$ToDate."</h4> ";
echo "<table border='1'> \n";
?>
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
<?php  mysql_close($conn);   ?>
