<?php
session_start();
require_once("../config.php");
require_once("m_cash_log.php");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$result_report = LoadCashlog($whereclause);
$date = date('d-m-Y');
$output_filename = "cash_log".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງາຍການຮັບເງິນ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
	  	<th>ລຳດັບ</th>
		<th>ເລກທີ</th>
		<th>ມູນຄ່າໃບບີນ(ກີບ)</th>	
		<th>ສ່ວນຫຼຸດ(ກີບ)</th>	
		<th>ຈ່າຍ(ກີບ)</th>	
		<th>ຈ່າຍ(ໂດລາ)</th>
		<th>ຈ່າຍ(ບາດ)</th>
		<th>ອັດຕາແລກປ່ຽນ<br/>ໂດລາ | ບາດ</th>
		<th>ເງິນທອນ(ກີບ)</th>
		<th>ລວມຮັບ(ກີບ)</th>
		<th>ໝາຍເຫດ</th>	
		<th>ຜູ້ຮັບ</th>
		<th>ວັນທີຮັບ</th> 
	  </tr>
		<?php 			
								$i=1;
								$sumDis_LAK = 0;
								$sumPay_LAK = 0;
								$sumPay_USD = 0;
								$sumPay_THB = 0;
								$sumPayTotal_LAK = 0;
								$sumBill_LAK = 0;
								$sumChange = 0;
								while ($item = mysql_fetch_array($result)) { 
									$sumDis_LAK = $sumDis_LAK + $item['discount_lak'];
									$sumPay_LAK = $sumPay_LAK + $item['pay_lak'];
									$sumPay_USD = $sumPay_USD + $item['pay_usd'];
									$sumPay_THB = $sumPay_THB + $item['pay_thb'];

									/*$returnMoney = ($item['pay_total_lak']+$item['discount_lak']) - ($item['bill_total']-$item['discount_lak']);
									if ($returnMoney <=0) {										
										$returnMoney =0;
									} */

									$returnMoney = $item['bill_change'];
									$sumChange = $sumChange + $returnMoney;
									$sumBill_LAK = $sumBill_LAK + $item['bill_total'];
									/*$SetTotalPay = $item['pay_total_lak']+$item['discount_lak']-$returnMoney; */
									$SetTotalPay = $item['receive_lak'];
									$sumPayTotal_LAK = $sumPayTotal_LAK + $SetTotalPay;
							?>
			<tr>
				<td class="centered"><?= ($i+$start) ?></td>
									<td class="centered"><?= $item['od_no'] ?></td>
									<td align="right"><?= number_format($item['bill_total']) ?></td>
									<td align="right"><?= number_format($item['discount_lak']) ?></td>
					                <td align="right"><?= number_format($item['pay_lak']) ?></td>
					                <td align="right"><?= number_format($item['pay_usd']) ?></td>
					                <td align="right"><?= number_format($item['pay_thb']) ?></td>
					                <td align="center"><?= number_format($item['usd'])." | ".number_format($item['thb']) ?></td>
					                <td align="right"><?= number_format($returnMoney) ?></td>
					                <td align="right"><?= number_format($SetTotalPay) ?></td>
					                <td><?= $item['remark'] ?></td>
									<td class="centered"><?= $item['username'] ?></td>
									<td class="centered"><?= $item['date_add'] ?></td>
			</tr>
		<?php $i++; } ?>
			<tr>
				<td colspan="2" class="centered"><strong>ລວມ</strong></td>
								<td align="right"><strong><?= number_format($sumBill_LAK) ?></strong></td>
								<td align="right"><strong><?= number_format($sumDis_LAK) ?></strong></td>
								<td align="right"><strong><?= number_format($sumPay_LAK) ?></strong></td>
								<td align="right"><strong><?= number_format($sumPay_USD) ?></strong></td>
								<td align="right"><strong><?= number_format($sumPay_THB) ?></strong></td>
								<td></td>
								<td align="right"><strong><?= number_format($sumChange) ?></strong></td>
								<td align="right"><strong><?= number_format($sumPayTotal_LAK) ?></strong></td>
								<td></td>
								<td></td>
								<td></td>
			</tr>		
	</table>
<?php
mysql_close($conn);
 ?>
