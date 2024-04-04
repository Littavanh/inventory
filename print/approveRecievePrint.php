<?php
session_start();
if (!isset($_SESSION['EDPOSV1user_id'])) {
    header("Location: ../login.php");
    exit();
}
include_once ("../config.php");
include_once ("m_approveRecievePrint.php");
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

    @page {
        margin: 0;
    }

    .container {
        display: flex;
        justify-content: space-between;
    }

    .line {
        border: 1px solid;
    }
    </style>

</head>

<body onload="printWindow();">
    <div id="pagesize">
        <div id="headbox">
            <table>
                <tr>
                    <td align="center" width="20%">
                        <div>
                            <img src="../dist/logo/logo.jpg" width="200" height="150" />
                        </div>
                    </td>

                </tr>

            </table>
            <div class="line"></div>
            <div class="container">
                <div class="row" align="center">

                </div>
                <div class="row" align="right">
                    <h5>ເລກທີ:
                        <b>
                            <?= $row['whouse_no'] ?>
                        </b>
                    </h5>
                    <h5>ນະຄອນຫຼວງວຽງຈັນ, ວັນທີ:
                        <b>
                            <?= $row['whouse_date'] ?>
                        </b>
                    </h5>
                </div>
            </div>


        </div>
        <br>
        <br>
        <div id="topic">
            <h1>ໃບຮັບເຄື່ອງ</h1>
            <!-- <h4>ເບີກຖາວອນ <input type="checkbox" name="" id="" checked></h4>
            <h4>ເບີກຊົ່ວຄາວ <input type="checkbox" name="" id=""></h4> -->
        </div>

        <div id="tbl_content3">
            <table border="1">
                <tr>
                    <td style="padding: 0 5px;">ອີງຕາມແຜນສະເໜີ</td>
                    <td style="padding: 0 5px;" colspan="3">ໃບສະເໜີຂໍຈັດຊື້-ຈັດຈ້າງ, ເລກທີ
                        <b>
                            <?= $row['po_no'] ?>
                        </b> ,
                        ລົງວັນທີ
                        <b>
                            <?= $row['po_date'] ?>
                        </b>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 0 5px;">ຜູ້ຈັດຊື້</td>


                    <td style="padding: 0 5px;">
                        <b>
                            <?= $row['orderer_name'] ?>
                            <?= $row['orderer_lastName'] ?>
                        </b>
                    </td>

                    <td style="padding: 0 5px;">ຜູ້ສະເໜີຊື້</td>
                    <td style="padding: 0 5px;">
                        <b>
                            <?= $row['proposer_name'] ?>
                            <?= $row['proposer_last_name'] ?>
                        </b>
                    </td>
                </tr>

                <tr>
                    <td style="padding: 0 5px;">ສັງກັດໜ່ວຍງານ</td>
                    <td style="padding: 0 5px;"></td>
                    <td style="padding: 0 5px;">ສັງກັດໜ່ວຍງານ</td>
                    <td style="padding: 0 5px;">
                        <b>
                            <?= $row['info_name'] ?>
                        </b>
                    </td>
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
                    <td style="padding: 0 5px;">ສະກຸນເງິນ <br /> <span class="item_ct"> Currency </span></td>
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
                $total_sumQtyKip = 0;
                $total_sumPriceKip = 0;
                $total_sumQtyUsd = 0;
                $total_sumPriceUsd = 0;
                $total_sumQtyThb = 0;
                $total_sumPriceThb = 0;
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
                    <!--<td><? //=$row_eq["eq_no"]      ?></td>-->
                    <!--<td><? //=$row_eq["serial_num"]      ?> </td>-->
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
                        <?= number_format($row_eq["pur_price"], 2, '.', ',') ?>
                    </td>
                    <td style="padding: 0.5em">
                        <?= number_format($total_price, 2, '.', ',') ?>
                    </td>
                    <td class="centered" style="padding: 0.5em">
                        <?= $row_eq["currency"] ?>
                    </td>
                </tr>
                <?php
                    if ($row_eq['currency'] == 'ກີບ') {
                        $total_sumQtyKip = $total_sumQtyKip + $row_eq["unitQty3"];
                        $total_sumPriceKip = $total_sumPriceKip + $row_eq["pur_price"] * $row_eq["unitQty3"];
                    }
                    if ($row_eq['currency'] == 'ໂດລາ') {
                        $total_sumQtyUsd = $total_sumQtyUsd + $row_eq["unitQty3"];
                        $total_sumPriceUsd = $total_sumPriceUsd + $row_eq["pur_price"] * $row_eq["unitQty3"];
                    }
                    if ($row_eq['currency'] == 'ບາດ') {
                        $total_sumQtyThb = $total_sumQtyThb + $row_eq["unitQty3"];
                        $total_sumPriceThb = $total_sumPriceThb + $row_eq["pur_price"] * $row_eq["unitQty3"];
                    }
                }
                ?>
                <tr>
                    <td style="padding: 0 5px;" align="right" colspan="3"><b>ລວມ ເປັນກີບ</b></td>
                    <td class="centered"><b>
                            <?= number_format($total_sumQtyKip) ?>
                        </b></td>
                    <td></td>
                    <td style="padding: 0 5px;" colspan="3"><b>
                            <?= number_format($total_sumPriceKip, 2, '.', ',') ?>
                        </b></td>
                   
                </tr>
                <tr>
                    <td style="padding: 0 5px;" align="right" colspan="3"><b>ລວມ ເປັນບາດ</b></td>
                    <td class="centered"><b>
                            <?= number_format($total_sumQtyThb) ?>
                        </b></td>
                    <td></td>
                    <td style="padding: 0 5px;" colspan="3"><b>
                            <?= number_format($total_sumPriceThb, 2, '.', ',') ?>
                        </b></td>
               
                </tr>
                <tr>
                    <td style="padding: 0 5px;" align="right" colspan="3"><b>ລວມ ເປັນໂດລາ</b></td>
                    <td class="centered"><b>
                            <?= number_format($total_sumQtyUsd) ?>
                        </b></td>
                    <td></td>
                    <td style="padding: 0 5px;" colspan="3"><b>
                            <?= number_format($total_sumPriceUsd, 2, '.', ',') ?>
                        </b></td>
                   
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


        <div id="signature">
            <table border="1">
                <tr class="centered">
                    <td>
                        <b>ຜູ້ຢັ້ງຢືນ</b>
                    </td>

                    <td>
                        <b>ຜູ້ກວດກາ</b>
                    </td>
                    <td>
                        <b>ຜູ້ຮັບສິນຄ້າ</b>
                    </td>
                    <td>
                        <b>ຜູ້ມອບສິນຄ້າ</b>
                    </td>
                </tr>
                <tr class="centered">
                    <td align="center">
                        <?php

                        $checkA = checkApproveSignature();

                        while (@$row_ca = mysql_fetch_array($checkA, MYSQL_ASSOC)) {
                            //  echo '<script>alert("'.$row_ca['first_name'].'")</script>';
                            ?>
                        <?php if ($row_ca['approve_level'] == 3) {
                                ?>
                        <div class="row" style="border: none;">
                            <?php
                                    $imagePath = "../dist/signature/" . $row_ca['signature'];
                                    if (!file_exists($imagePath) || $row_ca['signature'] == '') {
                                        $imagePath = "";
                                    }
                                    ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row_ca['first_name'] ?>
                            <?= $row_ca['last_name'] ?>
                        </h4>
                        <?php
                            }
                            ?>
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php

                        $checkA = checkApproveSignature();

                        while (@$row_ca = mysql_fetch_array($checkA, MYSQL_ASSOC)) {
                            //  echo '<script>alert("'.$row_ca['first_name'].'")</script>';
                            ?>
                        <?php if ($row_ca['approve_level'] == 2) {
                                ?>
                        <div class="row" style="border: none;">
                            <?php
                                    $imagePath = "../dist/signature/" . $row_ca['signature'];
                                    if (!file_exists($imagePath) || $row_ca['signature'] == '') {
                                        $imagePath = "";
                                    }
                                    ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row_ca['first_name'] ?>
                            <?= $row_ca['last_name'] ?>
                        </h4>
                        <?php
                            }
                            ?>
                        <?php } ?>
                    </td>
                    <td align="center">
                        <?php

                        $checkA = checkApproveSignature();

                        while (@$row_ca = mysql_fetch_array($checkA, MYSQL_ASSOC)) {
                            //  echo '<script>alert("'.$row_ca['first_name'].'")</script>';
                            ?>
                        <?php if ($row_ca['approve_level'] == 1) {
                                ?>
                        <div class="row" style="border: none;">
                            <?php
                                    $imagePath = "../dist/signature/" . $row_ca['signature'];
                                    if (!file_exists($imagePath) || $row_ca['signature'] == '') {
                                        $imagePath = "";
                                    }
                                    ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row_ca['first_name'] ?>
                            <?= $row_ca['last_name'] ?>
                        </h4>
                        <?php
                            }
                            ?>
                        <?php } ?>
                    </td>
                    <td align="center">

                        <div class="row" style="border: none;">
                            <?php
                            $imagePath = "../dist/signature/" . $row['signature'];
                            if (!file_exists($imagePath) || $row_ca['signature'] == '') {
                                $imagePath = "";
                            }
                            ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row['reciever'] ?>

                        </h4>

                    </td>
                </tr>
                <!-- <tr>
                    <td align="center">
                        <h4>
                            ຊື່ແຈ້ງ:...............................
                        </h4>
                    </td>
                    <td align="center">
                        <h4>
                            ຊື່ແຈ້ງ:...............................
                        </h4>
                    </td>
                    <td align="center">
                        <h4>
                            ຊື່ແຈ້ງ:...............................
                        </h4>
                    </td>
                    <td align="center">
                        <h4>
                            ຊື່ແຈ້ງ:...............................
                        </h4>
                    </td>
                </tr> -->
            </table>


        </div>
        <br>
        <br>
        <div id="tbl_content3">

            <table border="1">
                <tr>
                    <th align="left">ໝາຍເຫດ:</th>
                </tr>
                <tr>
                    <td style="padding: 0 5px; height: 125px;">
                        <?= $row['remark'] ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>