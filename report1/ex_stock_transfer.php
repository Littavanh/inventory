<?php
session_start();
date_default_timezone_set('Asia/Vientiane');
require_once("../config.php");
require_once("m_stock_transfer.php");
// $SumResult = SumMaterial($whereclause);
$date = date('Y-m-d');
$output_filename = "Stock_transfer" . $date . ".xls";
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
	$ToDate = date('Y-m-d');
}
echo "<h4>ລາຍງານ ລາຍການຈ່າຍສິນຄ້າອອກສາງ ປະຈໍາເດືອນ " . $FormDate . "</h4> ";
echo "<table border='1'> \n";
?>

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
        <th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;" rowspan="2">ໃບສະເໜີຂໍເບີກ
            ສິນຄ້າເລກທີ່</th>
        <th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;" rowspan="2">ຜູ້ສະເໜີ</th>
        <th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;" rowspan="2">ຂະແໜງນຳໃຊ້</th>
        <th style="white-space: nowrap; overflow: hidden;   vertical-align: middle;" rowspan="2">ເຫດຜົນທີ່ນຳໃຊ້</th>

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
<?php
mysql_close($conn);
?>