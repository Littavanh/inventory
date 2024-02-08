<?php
date_default_timezone_set('Asia/Vientiane'); // set your timezone
session_start();
require_once("../config.php");
require_once("m_receiveT.php");
$SumResult = SumMaterial($whereclause);
$date = date('Y-m');
$output_filename = "Receive" . $date . ".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");
if (isset($_GET['startdate'])) {
	$FormDate = $_GET['startdate'];
} else {
	$FormDate = date('Y-m');
}
if (isset($_GET['enddate'])) {
	$ToDate = $_GET['enddate'];
} else {
	$ToDate = date('Y-m');
}

echo "<h4>ລາຍງານຮັບເຄື່ອງເຂົ້າສາງ  ປະຈໍາເດືອນ " . $FormDate . "</h4> ";
echo "<table border='1'> \n";

?>

<thead>
	<tr>

		<!-- <th style="white-space: nowrap; overflow: hidden;">ລຳດັບ</th> -->
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ລຳດັບ<br />Items<br /></th>
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">Barcode<br />ID<br /></th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">Barcode</th> -->
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">
			ລາຍລະອຽດສິນຄ້າ<br />Description of Goods<br /></th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">ລາຍລະອຽດສິນຄ້າ</th> -->
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ຫົວໜ່ວຍ<br />Unit<br /></th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">ຫົວໜ່ວຍ</th> -->
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ລາຄາ<br />Unit Price<br />
		</th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">ລາຄາ</th> -->
		<th colspan="2" style="white-space: nowrap; overflow: hidden;">ຈຳນວນຮັບສິນຄ້າເຂົ້າສາງ</th>
		<th rowspan="2" style="white-space: nowrap; overflow: hidden; text-align: center;">ສະກຸນເງິນ<br />Currency<br />
		</th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">ສະກຸນເງິນ</th> -->
		<th style="white-space: nowrap; overflow: hidden;">ວັນ/ເດືອນ/ປີ</th>
		<th colspan="3" style="white-space: nowrap; overflow: hidden;">ໃບບີນສິນຄ້າ</th>
		<th colspan="2" style="white-space: nowrap; overflow: hidden;">ໃບຮັບສິນຄ້າເຂົ້າສາງ</th>
		<th colspan="2" style="white-space: nowrap; overflow: hidden;">ໃບສັ່ງຊື້ PO</th>
	</tr>
	<tr>

		<!-- <th style="white-space: nowrap; overflow: hidden;">Items</th> -->
		<!-- <th style="white-space: nowrap; overflow: hidden;">ID</th> -->
		<!-- <th style="white-space: nowrap; overflow: hidden;">Description of Goods</th> -->
		<!-- <th style="white-space: nowrap; overflow: hidden;">Unit</th> -->
		<!-- <th style="white-space: nowrap; overflow: hidden;">Unit Price</th> -->
		<th style="white-space: nowrap; overflow: hidden;">Quantity</th>
		<th style="white-space: nowrap; overflow: hidden;">Amount</th>
		<!-- <th style="white-space: nowrap; overflow: hidden;">currency</th> -->
		<th style="white-space: nowrap; overflow: hidden;">dd/mm/yy</th>

		<th style="white-space: nowrap; overflow: hidden;">ຜູ້ສົ່ງສິນຄ້າ</th>
		<th style="white-space: nowrap; overflow: hidden;">ເລກທີ</th>
		<th style="white-space: nowrap; overflow: hidden;">ລົງວັນທີ</th>

		<th style="white-space: nowrap; overflow: hidden;">ເລກທີ</th>
		<th style="white-space: nowrap; overflow: hidden;">ລົງວັນທີ</th>

		<th style="white-space: nowrap; overflow: hidden;">ເລກທີ</th>
		<th style="white-space: nowrap; overflow: hidden;">ລົງວັນທີ</th>
	</tr>
</thead>
<tbody>
	<?php


	while ($item = mysql_fetch_array($SumResult)) {
		$whereGroupID = $item['materialID'];


		?>

		<?php
		$j = 1;
		$sumPriceBill = 0;
		$sumDiscountBill = 0;
		$sumTotalPriceBill = 0;
		$sumGroupQTY1 = 0;
		$sumGroupQTY2 = 0;
		$sumGroupQTY3 = 0;
		$sumGroupPrice = 0;

		$sumGroupUnitName1 = "";
		$sumGroupUnitName2 = "";
		$sumGroupUnitName3 = "";


		$result_detail = LoadTable($whereclause, $whereGroupID);
		while ($itemD = mysql_fetch_array($result_detail)) {

			$convert11 = 0;
			$convert12 = 0;
			$convert21 = 0;
			$convert22 = 0;
			$sumTotalPrice = $sumTotalPrice + (($itemD['pur_price'] - $itemD['receive_dis']) * $itemD['unitQty3']);
			$sumDiscount = $sumDiscount + ($itemD['receive_dis'] * $itemD['unitQty3']);
			$sumPrice = $sumPrice + ($itemD['pur_price']);

			$sumTotalPriceBill = $sumTotalPriceBill + (($itemD['pur_price'] - $itemD['receive_dis']) * $itemD['unitQty3']);
			$sumDiscountBill = $sumDiscountBill + ($itemD['receive_dis'] * $itemD['unitQty3']);
			$sumPriceBill = $sumPriceBill + ($itemD['pur_price']);

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
			$sumGroupQTY1 = $sumGroupQTY1 + $convert12;
			$sumGroupQTY2 = $sumGroupQTY2 + $convert22;
			$sumGroupQTY3 = $sumGroupQTY3 + $convert21;
			$sumGroupUnitName1 = $itemD['unitName1'];
			$sumGroupUnitName2 = $itemD['unitName2'];
			$sumGroupUnitName3 = $itemD['unitName3'];
			$sumGroupPrice = $sumGroupPrice + $itemD['pur_price'];
			?>

			<tr>
				<td>
					<?= $j ?>
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
				<td>
					<?= number_format($convert21) ?>
				</td>
				<td>
					<?= number_format(($itemD['pur_price'] * $itemD['unitQty3']) - ($itemD['receive_dis'] * $itemD['unitQty3']), 2, '.', ',') ?>
				</td>
				<td>
					<?= $itemD['cur_name'] ?>
				</td>
				<td>
					<?= date('y-m-d', strtotime($itemD['date_tran'])) ?>
				</td>
				<td>
					<?= $itemD['supplierName'] ?>
				</td>
				<td>
					<?= $itemD['bill_no'] ?>
				</td>
				<td>
					<?= $itemD['bill_date'] ?>
				</td>
				<td>
					<?= $itemD['whouse'] ?>
				</td>
				<td>
					<?= $itemD['whouseDate'] ?>
				</td>
				<td>
					<?= $itemD['po_no'] ?>
				</td>
				<td>
					<?= $itemD['po_date'] ?>
				</td>
			</tr>

			<?php $j++;
		}

		?>

		<?php
	} ?>
</tbody>
<tfoot>

	<tr style="color:#FFF" bgcolor="#999999">

		<td colspan="5" align="center"><strong>ລວມມູນຄ່າ ຮັບສິນຄ້າເຂົ້າສາງ ປະຈໍາເດືອນ
				<?= $_GET['startdate'] ?>
			</strong></td>
		<td align="center"><strong>
				<?= number_format(LoadCount_Qty3($whereclause), 2, '.', ',') ?>
			</strong></td>
		<td align="right"><strong>
				<?= number_format(LoadCount_Cur('ກີບ', $whereclause), 2, '.', ',') ?>
			</strong></td>
		<td align="right"><strong>ກີບ</strong></td>
	</tr>
	<tr style="color:#222">
		<td colspan="6" align="center"></td>

		<td align="right"><strong>
				<?= number_format(LoadCount_Cur('ບາດ', $whereclause), 2, '.', ',') ?>
			</strong></td>
		<td align="right"><strong>ບາດ</strong></td>
	</tr>
	<tr style="color:#222 ">
		<td colspan="6" align="center"></td>

		<td align="right"><strong>
				<?= number_format(LoadCount_Cur('ໂດລາ', $whereclause), 2, '.', ',') ?>
			</strong></td>
		<td align="right"><strong>ໂດລາ</strong></td>
	</tr>
</tfoot>


<?php
mysql_close($conn);
?>