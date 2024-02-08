<?php	
session_start();
if (!isset($_SESSION['EDPOSV1user_id'])) {
	header("Location: ../login.php");
	exit();
}
include_once("../config.php");
include_once("m_approveAddjustPrint.php");
$result = headerPrint();
$result_eq = detailPrint();

$row = mysql_fetch_array($result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>ໃບສະເໜີຂໍເບີກສິນຄ້າ</title>
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

    #watermark {
        color: rgba(192, 192, 192, 0.16);
        height: 100%;
        left: 0;
        line-height: 2;
        margin: 0;
        position: fixed;
        top: 0;
        transform: rotate(-30deg);
        transform-origin: 0 100%;
        width: 200%;
        /* word-spacing: 10px; */
        font-size: 10px;
        z-index: 1;


    }
    </style>

</head>

<body onload="printWindow(); loadedCloseWindows();">
    <p id="watermark"></p>
    <div id="pagesize">
        <div id="headbox">
            <table>
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

            </table>
            <div id="topic" style="top: 1em;">
                <h1>ໃບສະເໜີຂໍເບີກສິນຄ້າ</h1>
            </div>
        </div>

        <div id="tbl_content3">
            <table border="1">
                <tr class="tb_h">
                    <td style="padding: 0 5px; width: 65%;">
                        <div>
                            <h4 align="left">ຂໍ້ມູນການຂໍເບີກສິນຄ້າ :</h4>
                         
                            <p align="left">ພະແນກ : <?=$row['cusAddress']?></p>
                            <p align="left">ຊື່ຜູ້ຂໍເບີກ : <?=$row['first_name']?> <?=$row['last_name']?> </p>
                            <p align="left">ຕຳແໜ່ງ : <?=$row['cusTel']?> </p>
                            <p align="left">ເບີໂທ: <?=$row['contract_no']?> </p>
                            <p align="left">ເຫດຜົນນຳໃຊ້: <?=$row['contract_no']?> </p>
                        </div>
                    </td>
                    <td style="padding: 0 5px; width: 35%;">
                        <div>
                            <p align="left">ເລກທີ: <?=$row['invoiceCode']?> /<?=$row['buCode']?>. </p>
                            <p align="left">ວັນທີ: <?=$row['invoice_date']?></p>

                        </div>
                    </td>
                </tr>
            </table>

            <table border="1">
                <tr class="tb_h">
                    <td>
                        <p align="center">ລ/ດ</p>
                        <p align="center">No.</p>
                    </td>
                    <td>
                        <p align="center">ລາຍລະອຽດ</p>
                        <p align="center">DESCRIPTION</p>
                    </td>
                    <td>
                        <p align="center">ລາຄາ</p>
                        <p align="center">PRICE</p>
                    </td>
                    <td>
                        <p align="center">ຈຳນວນ</p>
                        <p align="center">QTY</p>
                    </td>
                    <td>
                        <p align="center">ມູນຄ່າ</p>
                        <p align="center">AMOUNT</p>
                    </td>
                </tr>
                <tr>
                    <td class="centered" style="width: 5%;">1</td>
                    <td style="padding: 0 5px; width: 60%;">
                      
                        <p align="left">ປະຈຳເດືອນ: <?=$row['billMonth']?> / <?=$row['billYear']?> </p>
                       
                    </td>
                    <td align="right" style="padding-bottom: 10%; width: 13%; ">
                        <p align="right" style="padding: 0 5px; " <?php if($roomPrice == 0) echo "hidden";?>>
                            <?=$roomPrice?></p>
                        <p align="right" style="padding: 0 5px; " <?php if($centraladPrice == 0) echo "hidden";?>>
                            <?=$centraladPrice?></p>
                    </td>
                    <td class="centered" style="padding-bottom: 10%; width: 8%; ">
                        <p align="center" <?php if($roomPrice == 0) echo "hidden";?>><?=$qty1?></p>
                        <p align="center" <?php if($centraladPrice == 0) echo "hidden";?>><?=$qty2?></p>
                    </td>
                    <td align="right" style="padding-bottom: 10%; width: 14%; ">
                        <p align="right" style="padding: 0 5px; " <?php if($roomPrice == 0) echo "hidden";?>>
                            <?=$roomPrice?></p>
                        <p align="right" style="padding: 0 5px; " <?php if($centraladPrice == 0) echo "hidden";?>>
                            <?=$centraladPrice?></p>
                    </td>
                </tr>

            </table>
        </div>

        <div id="signature3">
            <table border="0">
                <tr>
                    <td style="width: 100%;">
                        <h4 align="left">ໝາຍເຫດ: <?=$row['rermark']?></h4>



                    </td>

                </tr>
                <tr>
                    <td>
                        <b>• ໃບຂໍເບີກສິນຄ້າ ຕ້ອງມີລາຍເຊັນ ຜູ້ຈັດການທົ່ວໄປ ຫຼື ຜູ້ຈັດການພະແນກ ທີື່ຕົນຂຶ້ນກັບ ຂຶ້ນໄປ
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


        </div>
        <div id="signature3">
            <table border="0">
                <tr class="centered">
                    <td>
                        <h4>ຜູ້ຂໍເບີກ</h4>
                    </td>

                    <td>
                        <h4>ຜູ້ກວດກາ</h4>
                    </td>
                    <td>
                        <h4>ຜູ້ຢັ້ງຢືນ</h4>
                    </td>

                    <td>
                        <h4>ຜູ້ອະນຸມັດ</h4>
                    </td>

                </tr>

            </table>


        </div>
    </div>
</body>

</html>