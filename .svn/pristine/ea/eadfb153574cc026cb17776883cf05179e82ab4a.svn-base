<?php
session_start();
if (!isset($_SESSION['EDPOSV1user_id'])) {
	header("Location: ../login.php");
	exit();
}
include_once("../config.php");
include_once("m_approveRecievePrint_.php");
$result = headerPrint();
$result_eq = detailPrint();

$row = mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>ໃບຮັບສິນຄ້າ</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="../css/printformat/print.css" media="print" />
    <link type="text/css" rel="stylesheet" href="../css/printformat/formatpage.css" />
    <script src="../js/Action.js" type="text/javascript"></script>
    <script>
    function loadedCloseWindows() {
        window.setTimeout(CloseMe, 100);
    }

    function CloseMe() {
        window.close();
    }
    </script>
    <style>
    body {
        margin: 0;
        padding: 0;
    }
    @page { margin: 0; }
    </style>

</head>

<body onload="printWindow();">
    <div id="pagesize">
        <div id="headbox">
            <table>
                <tr >
                    <td align="center" width="20%">
                        <div>
                            <img src="../dist/logo/logo.jpg" width="200" height="150" />
                        </div>
                    </td>
                    <!-- <td align="left" width="100%" style="padding: 0 5px;">
                        <h3>LAO WORLD PUBLIC COMPANY</h3>
                        <h6>HEAD OFFICE : T4 RD, BAN PHONETHAN NEUA, SAYSETTHA DISTRICT, VIENTIANE, LAO PDR.</h6>
                        <h5>Fax: (+856) 21 415-409 Office: (+856) 21 415-477, website: www.laoworldpublic.com</h5>
                    </td> -->
                </tr>

            </table>
            <div id="topic" style="top: 1em;">
                <h1>ໃບຮັບສິນຄ້າ</h1>

            </div>
        </div>

        <div id="tbl_content3">
            <table border="0">
                <tr class="tb_h">
                    <td style="padding: 0 5px; width: 35%;">
                        <div>
                            <h3 align="left">ຂໍ້ມູນການຮັບສິນຄ້າ :</h3>
                            <p align="left">ໃບຮັບສິນຄ້າເລກທີ : <?=$row['bill_no']?></p>
                            <p align="left">ວັນທີຮັບສິນຄ້າ : <?=$row['traDate']?></p>
                            <!-- <p align="left">ຈຸດປະສົງ : <?=$row['remark']?> </p> -->
                            <p align="left">ໃບບິນ PO : <?= $row["po_no"] ?></p>
                            <p align="left">ຫົວໜ່ວຍຮັບສິນຄ້າ : <?= $row["info_name"] ?></p>
                            <p align="left">ຜູ້ສະໜອງ : <?= $row["supplierName"] ?></p>

                        </div>

                    </td>
					<!-- <td style="padding: 0 5px; width: 35%;">
                        <div>
                          
                            <p align="left">ຜູ້ຂໍຮັບສິນຄ້າ : <?=$row['reciever']?></p>
                            <p align="left">ຜູ້ອະນຸມັດ : <?=$row['approver']?> <?=$row['approver_last_name']?> </p>
                  

                        </div>

                    </td> -->

                </tr>
            </table>
            <br>
            <table border="1">
                <tr class="tb_h">
                    <td style="padding: 0 5px;">ລ/ດ <br /><span class="item_ct"> Item</span></td>
                    <td style="padding: 0 5px;">ລະຫັດສິນຄ້າ<br /><span class="item_ct"> ID</span></td>
                    <!--<th>ເລກ serial</th>-->
                    <td style="padding: 0 5px;">ລາຍການສິນຄ້າ <br /><span class="item_ct"> Description</span></td>
					
                    <td style="padding: 0 5px;">ຈຳນວນ <br /> <span class="item_ct"> Quantity</span></td>
                    <td style="padding: 0 5px;">ລາຄາ <br /> <span class="item_ct"> Price</span></td>
                    <td style="padding: 0 5px;">ລວມ <br /> <span class="item_ct"> Total </span></td>
                    <!-- <td>ໝາຍເຫດ <br /><span class="item_ct"> Remark</span> </td> -->
                </tr>
                <?php
				$num_r = mysql_num_rows($result_eq);
				// if ($num_r <= 12) {
				// 	//$num_r = 21 - $num_r;
				// 	$num_r = 12;
				// }
				$k = 0;
				$total_price = 0;
				$total_sumQty = 0;
				$total_sumPrice = 0;
				//$discount = 0;
				while (@$row_eq = mysql_fetch_array($result_eq, MYSQL_ASSOC)) {
					$k++;
					$total_price = $row_eq["pur_price"] * $row_eq["unitQty3"]
						// $discount += $row_eq["discount"];
						?>
                <tr>
                    <td class="centered">
                        <?= $k ?>
                    </td>
                    <!--<td><? //=$row_eq["eq_no"]?></td>-->
                    <!--<td><? //=$row_eq["serial_num"]?> </td>-->
                    <td class="centered" style="padding: 0.5em">
                        <?= $row_eq["mBarcode"] ?>
                    </td>
                    <td style="padding: 0.5em">
                        <?= $row_eq["materialName"] ?>
                    </td>
                    <td class="centered">
                        <?= $row_eq["unitQty3"] ?>
                    </td>
                    <td style="padding: 0.5em">
                        <?= number_format($row_eq["pur_price"],2, '.', ',') ?>
                    </td>
                    <td style="padding: 0.5em">
                        <?= number_format($total_price,2, '.', ',') ?>
                    </td>
                    <!-- <td style="padding: 0.5em">
                        <?= $row_eq["Dremark"] ?>
                    </td> -->
                </tr>
                <?php 
                $total_sumQty = $total_sumQty + $row_eq["unitQty3"];
                $total_sumPrice = $total_sumPrice + $row_eq["pur_price"] * $row_eq["unitQty3"] ;
                 }
					?>
                    <tr>
                        <td style="padding: 0 5px;" align="right" colspan="3"><b>ລວມ</b></td>
                        <td class="centered"><b><?=number_format($total_sumQty)?></b></td>
                        <td></td>
                        <td style="padding: 0 5px;" colspan="3"><b><?=number_format($total_sumPrice,2, '.', ',')?></b></td>
                    </tr>
					<?php
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
        <br>
        <div id="tbl_content3">

            <table border="1">
                <tr>
                    <th align="left">Comments:</th>
                </tr>
                <tr>
                    <td style="padding: 0 5px; height: 125px;">

                    </td>
                </tr>
            </table>
        </div>

        <div id="signature" style="border-style: groove; padding: 10px;">
            <table border="0">
                <tr class="centered">
                    <td>
                        <b>ຜູ້ຮັບເຄື່ອງ</b>
                    </td>

                    <td>
                        <b>ຜູ້ມອບເຄື່ອງ</b>
                    </td>
                    <td>
                        <b>ຜູ້ຢັ້ງຢືນ</b>
                    </td>
                </tr>
                <tr class="centered">
                    <td>
                        <?= $row['reciever'] ?>
                    </td>
                    <td>
                    <?= $row['orderer'] ?>
                    </td>
                    <td>
                        <?= $row['approver'] ?> <?= $row['approver_last_name'] ?>
                    </td>

                </tr>

            </table>


        </div>
    </div>
</body>

</html>