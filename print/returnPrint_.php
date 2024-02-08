<?php
session_start();
if (!isset($_SESSION['EDPOSV1user_id'])) {
	header("Location: ../login.php");
	exit();
}
include_once("../config.php");
include_once("m_returnPrint_.php");
$result = headerPrint();
$result_eq = detailPrint();

$row = mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>ໃບສົ່ງຄືນສິນຄ້າ</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link type="text/css" rel="stylesheet" href="../css/print.css" media="print" />
	<link type="text/css" rel="stylesheet" href="../css/formatpage.css" />
	<script src="../js/Action.js" type="text/javascript"></script>
</head>

<body onload="printWindow();">
	<div id="pagesize">
		<div id="headbox">
			<div id="topic">
				<h1>ໃບສົ່ງຄືນສິນຄ້າ</h1>
			</div>

		</div>
		<div id="to_control">
			<tr class="tb_h">
				<td>
					<p>ວັນທີຂໍເບີກສິນຄ້າ :
						<?= $row["date_tran"] ?>
					</p>
					<p>ຈຸດປະສົງ :
						<?= $row["Dremark"] ?>
					</p>
					<p>ວັນທີສົ່ງຄືນ :
						<?= $row["date_return2"] ?>
					</p>
				</td>
			</tr>
		</div>
		<div id="tbl_content">
			<table border="1">
				<tr class="tb_h">
					<td>ລ/ດ <br /><span class="item_ct"> item</span></td>
					<!--<th>ເລກລະຫັດ</th>-->
					<!--<th>ເລກ serial</th>-->
					<td>ລາຍການສິນຄ້າ <br /><span class="item_ct"> Description</span></td>
					<td>ຈຳນວນ <br /> <span class="item_ct"> Quantity</span></td>
					<td>ໃຊ້ໝົດແລ້ວ <br /> <span class="item_ct"> Used</span></td>
					<td>ສົ່ງຄືນ <br /> <span class="item_ct"> Return </span></td>
					<td>ໝາຍເຫດ <br /><span class="item_ct"> Remark</span> </td>
				</tr>
				<?php
				$num_r = mysql_num_rows($result_eq);
				// if ($num_r <= 12) {
				// 	//$num_r = 21 - $num_r;
				// 	$num_r = 12;
				// }
				$k = 0;
				$total_price = 0;
				//$discount = 0;
				while (@$row_eq = mysql_fetch_array($result_eq, MYSQL_ASSOC)) {
					$k++;
					// $total_price = $row_eq["pur_price"] * $row_eq["unitQty3"] * (-1);
						// $discount += $row_eq["discount"];
						?>
					<tr>
						<td class="centered">
							<?= $k ?>
						</td>
						<!--<td><? //=$row_eq["eq_no"]?></td>-->
						<!--<td><? //=$row_eq["serial_num"]?> </td>-->
						<td style="padding: 0.5em">
							<?= $row_eq["materialName"] ?>
						</td>
						<td class="centered">
							<?= (-1)*($row_eq["unitQty3"]) ?>
						</td>
						<td class="centered">
							<?= $row_eq["qty_used"] ?>
						</td>
						<td class="centered">
							<?=  $row_eq["qty_return"] ?>
						</td>
						<td style="padding: 0.5em">
							<?= $row_eq["remark_return"] ?>
						</td>
					</tr>
					<?php
				}
				for ($i = $k + 1; $i <= $num_r; $i++) { ?>
					<tr>
						<td class="centered">
							<?= $i ?>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				<?php } ?>
			</table>
		</div>


		<div id="signature">
			<table border="0">
				<tr class="centered">
				
					
					<td>
						ຜູ້ຂໍສົ່ງຄືນ
					</td>
					<td>
						ຜູ້ຢັ້ງຢືນ
					</td>
					
					<td>
						ຜູ້ອະນຸມັດ
					</td>

				</tr>

			</table>


		</div>
	</div>
</body>

</html>