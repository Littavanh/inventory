<?php
session_start();
if (!isset($_SESSION['EDPOSV1user_id'])) {
    header("Location: ../login.php");
    exit();
}
include_once("../config.php");
include_once("m_returnPrint.php");
$result = headerPrint();
$result_eq = detailPrint();

$row = mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>ໃບສົ່ງຄືນສິນຄ້າ</title>
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

<body onload="printWindow(); loadedCloseWindows();">
    <p id="watermark"></p>
    <div id="pagesize">
        <div id="headbox">
            <!-- <table>
                <tr>
                    <td align="left" width="20%">
                        <div>
                            <img src="../dist/logo/logo.jpg" width="200" height="150" />
                        </div>
                    </td>
                    <td align="left" width="100%" style="padding: 0 5px;">
                        <h3>LAO WORLD PUBLIC COMPANY</h3>
                        <h6>HEAD OFFICE : T4 RD, BAN PHONETHAN NEUA, SAYSETTHA DISTRICT, VIENTIANE, LAO PDR.</h6>
                        <h5>Fax: (+856) 21 415-409 Office: (+856) 21 415-477, website: www.laoworldpublic.com</h5>
                    </td>
                </tr>

            </table> -->
            <div class="line"></div>
            <div class="container">
                <div class="row" align="center">
                    <h5>ພະແນກ ບໍລິຫານ</h5>
                    <h5>ຂະແໜງຄຸ້ມຄອງສາງລາຍວັນ</h5>
                </div>
                <div class="row" align="left">
                    <h5>ເລກທີ:
                        <?= $row['release'] ?>
                    </h5>
                    <h5>ວັນທີ:
                        <?= $row['date_tran'] ?>
                    </h5>
                </div>
            </div>


        </div>
        <div id="topic">
            <h1>ໃບສົ່ງຄືນສິນຄ້າ</h1>
            <!-- <h4>ເບີກຖາວອນ <input type="checkbox" name="" id="" checked></h4>
            <h4>ເບີກຊົ່ວຄາວ <input type="checkbox" name="" id=""></h4> -->
        </div>
        <div id="tbl_content3">
            <table border="1">
                <tr class="tb_h">
                    <td style="padding: 0 5px; width: 65%;">
                        <div>
                            <!-- <h4 align="left">ຂໍ້ມູນການຂໍເບີກສິນຄ້າ :</h4> -->


                            <p align="left">ຊື່ຜູ້ຂໍສົ່ງ :
                                <?= $row['first_name'] ?>
                                <?= $row['last_name'] ?>
                            </p>
                            <p align="left">ເບີໂທ:
                                <?= $_SESSION['EDPOSV1emp_mobile'] ?>
                            </p>
                            <!-- <p align="left">ເຫດຜົນນຳໃຊ້:
                                <?= $row['Dremark'] ?>
                            </p> -->
                            <!-- <p align="left">ວັນທີສົ່ງຄືນ (ກໍລະນີເບີກຊົ່ວຄາວ): </p> -->
                        </div>

                    </td>

                    <td style="padding: 0 5px; width: 35%;">
                        <div>
                            <p align="left">ຫົວໜ່ວຍທຸລະກິດ :
                                <?= $row['info_name'] ?>
                            </p>
                            <p align="left">ພະແນກ :
                                <?= $_SESSION['EDPOSV1emp_dep'] ?>
                            </p>
                            <p align="left">ຕຳແໜ່ງ :
                                <?= $_SESSION['EDPOSV1emp_position'] ?>
                            </p>


                        </div>
                    </td>
                </tr>
            </table>

            <table border="1">
                <tr class="tb_h">
                    <td style="padding: 0 5px;">
                        <p align="center">ລ/ດ</p>
                        <!-- <p align="center">Item</p> -->
                    </td>
                    <td style="padding: 0 5px;">
                        <p align="center">ລະຫັດສິນຄ້າ</p>
                        <!-- <p align="center">ID</p> -->
                    </td>
                    <td style="padding: 0 5px;">
                        <p align="center">ລາຍການສິນຄ້າ</p>
                        <!-- <p align="center">Description</p> -->
                    </td>
                    <td style="padding: 0 5px;">
                        <p align="center">ຈຳນວນ</p>
                        <!-- <p align="center">Quantity</p> -->
                    </td>
                    <td style="padding: 0 5px;">
                        <p align="center">ຫົວໜ່ວຍ</p>
                        <!-- <p align="center">Unit</p> -->
                    </td>
                    <td style="padding: 0 5px;">
                        <p align="center">ໝາຍເຫດ</p>
                        <!-- <p align="center">Remark</p> -->
                    </td>
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
                 
                
					if($row_eq['qty_return'] > 0){
					
						$k++;
                    ?>
                    <tr>
                        <td class="centered" style="width: 5%;">
                            <?= $k ?>
                        </td>
                        <td style="padding: 0 5px; width: 13%;">

                            <p align="center">
                                <?= $row_eq['mBarcode'] ?>
                            </p>

                        </td>
                        <td style="padding: 0 5px; width: 60%;">

                            <p align="left">
                                <?= $row_eq['materialName'] ?>
                            </p>

                        </td>
                        <td style="padding: 0 5px; width: 13%; ">
                            <p align="center">
                                <?= number_format($row_eq['qty_return'])?>
                            </p>
                        </td>
                        <td style="padding: 0 5px; width: 13%; ">
                            <p align="center">
                                <?= $row_eq['uname3'] ?>
                            </p>
                        </td>
                        <td style="padding: 0 5px; width: 20%; ">
                            <p align="left">
                                <!-- <?= $row_eq['Dremark'] ?> -->
                            </p>
                        </td>
                    </tr>
                    <?php
                    $total_sumQty = $total_sumQty + $row_eq["qty_return"];
                    
					}
                }
                ?>
                <tr>
                    <td style="padding: 0 5px;" align="right" colspan="3">
                        <b>
                            <p>ລວມ</p>

                        </b>
                    </td>
                    <td class="centered">
                        <b>
                            <?= number_format($total_sumQty) ?>
                        </b>
                    </td>
                    <!-- <td style="padding: 0 5px;">
                        <?= number_format($total_sumPrice, 2, '.', ',') ?>
                    </td> -->
                </tr>
            </table>
        </div>

        <!-- <div id="signature3">
            <table border="0">
                <tr>
                    <td style="width: 100%;">
                        <h4 align="left">ໝາຍເຫດ:
                            <?= $row['rermark'] ?>
                        </h4>



                    </td>

                </tr>
                <tr>
                    <td>
                        <b>• ໃບຂໍເບີກສິນຄ້າ ຕ້ອງມີລາຍເຊັນ ຜູ້ຈັດການທົ່ວໄປ ຫຼື ຜູ້ຈັດການພະແນກ ທີ່ຕົນຂຶ້ນກັບ ຂຶ້ນໄປ
                            ເປັນຜູ້ອະນຸມັດ ທຸກຄັ້ງ</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>• ການເບີກເຄືື່ອງ ທຸກຄັ້ງ ກ່ອນຈະອອກສາງຕ້ອງກວດກາເບີື່ງສະພາບ ແລະ ຈໍານວນທີ່ໄດ້ຮັບໃຫ້ລະອຽດ
                            ແລ້ວຈຶ່ງເຊັນຮັບເຄືື່ອງ</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>• ການເບີກເຄືື່ອງໄປນຳໃຊ້ ທຸກຄັ້ງ ກໍລະນີເຄືື່ອງເຫລືອຕ້ອງສົ່ງຄືນສາງ ເພືື່ອນາຍສາງຈະໄດ້ຈັດເກັບ ແລະ
                            ລົງບັນຊີຄຸ້ມຄອງຕໍໍ່ໄປ</b>
                    </td>
                </tr>
            </table>


        </div> -->
        <!-- <br> -->
        <div id="signature3">
            <table border="0">
                <tr>
                    <td style="width: 25%;" align="center">
                        <h4>ຜູ້ອະນຸມັດ</h4>
                    </td>
                    <td style="width: 25%;" align="center">
                        <h4>ຜູ້ຢັ້ງຢືນ</h4>
                    </td>
                    <td style="width: 25%;" align="center">
                        <h4>ຜູ້ກວດກາ</h4>
                    </td>
                    <td style="width: 25%;" align="center">
                        <h4>ຜູ້ຂໍສົ່ງຄືນ</h4>
                    </td>






                </tr>

                <tr>
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
                            $imagePath = "../dist/signature/" . $row['signature_user_add'];
                            if (!file_exists($imagePath) || $row['signature_user_add'] == '') {
                                $imagePath = "";
                            }
                            ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row['first_name'] ?>
                            <?= $row['last_name'] ?>
                        </h4>
                    </td>





                </tr>

            </table>


        </div>
        <br><br>
        <div id="signature3">
            <table border="0">
                <tr>
                    <!-- <td style="width: 50%;" align="center">
                        <h4>ຜູ້ເບີກສາງ</h4>
                    </td> -->
                    <td style="width: 50%;" align="center">
                        <h4>ຜູ້ຮັບສິນຄ້າ</h4>
                    </td>


                </tr>

                <tr>
                    <td align="center">
                        <div class="row" style="border: none;">
                            <?php
                            $imagePath = "../dist/signature/" . $row['signature_user_add2'];
                            if (!file_exists($imagePath) || $row['signature_user_add2'] == '') {
                                $imagePath = "";
                            }
                            ?>
                            <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                        </div>
                        <h4>
                            <?= $row['user_add_return_first_name'] ?>
                            <?= $row['user_add_return_last_name'] ?>
                        </h4>
                    </td>
                    <!-- <td align="center">
                    <div class="row" style="border: none;">
                                    <?php
                                    $imagePath = "../dist/signature/" . $row['signature_reciever'];
                                    if (!file_exists($imagePath) || $row['signature_reciever'] == '') {
                                        $imagePath = "";
                                    }
                                    ?>
                                    <embed src="<?= $imagePath ?>" width="120px" height="120px" />


                                </div>
                        <h4>
                            <?= $row['reciever'] ?>

                        </h4>
                    </td> -->


                </tr>

            </table>


        </div>
    </div>
</body>

</html>