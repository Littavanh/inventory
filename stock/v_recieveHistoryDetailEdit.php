<?php
session_start();
htmltage("ລາຍລະອຽດ");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] == 4) {
    header("Location: ?d=index");
}

?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
    <h1>ແກ້ໄຂລາຍການຮັບເຂົ້າ</h1>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <button type="reset" class="btn btn-default"
                        onclick="document.location='?d=stock/recieveHistory'">ປິດ</button>
                </div>
                <div class="box-body">

                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>ເລກທີ ໃບບີນສິນຄ້າ</label>
                            <input type="text" class="form-control" value="<?= $_GET['bill_no'] ?>" readonly />
                        </div>
                        <div class="form-group col-md-3">
                            <label>ລົງວັນທີ</label>
                            <input type="text" class="form-control" value="<?= $_GET['bill_date'] ?>" readonly />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>ເລກທີ ໃບຮັບສິນຄ້າ</label>
                            <input type="text" class="form-control" value="<?= $_GET['whouse_no'] ?>" readonly />
                        </div>
                        <div class="form-group col-md-3">
                            <label>ລົງວັນທີ</label>
                            <input type="text" class="form-control" value="<?= $_GET['whouse_date'] ?>" readonly />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>ເລກທີ ໃບສັ່ງຊື້ (PO)</label>
                            <input type="text" class="form-control" value="<?= $_GET['po_no'] ?>" readonly />
                        </div>
                        <div class="form-group col-md-3">
                            <label>ລົງວັນທີ</label>
                            <input type="text" class="form-control" value="<?= $_GET['po_date'] ?>" readonly />
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>ຫົວໜ່ວຍທຸລະກິດ:</label>
                            <input type="text" class="form-control" value="<?= $_GET['info_name'] ?>" readonly />
                        </div>
                    </div>
                    <form method="post" action="">
                        <div class="box-body">

                            <div class="row">
                                <div class="box-body pad table-responsive">
                                    <h4>
                                        <?= $pagedescription ?>
                                    </h4>

                                    <table id="example1" class="table table-bordered table-hover beautified editable">
                                        <thead>
                                            <tr>


                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    ລຳດັບ<br />Items<br /></th>
                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    ລະຫັດສິນຄ້າ<br />ID<br /></th>

                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    ລາຍລະອຽດສິນຄ້າ<br />Description of Goods<br /></th>

                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    ຫົວໜ່ວຍ<br />Unit<br /></th>

                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    ລາຄາ<br />Unit Price<br /></th>

                                                <th colspan="2" style="white-space: nowrap; overflow: hidden;">
                                                    ຈຳນວນຮັບສິນຄ້າເຂົ້າສາງ</th>
                                                <th rowspan="2"
                                                    style="white-space: nowrap; overflow: hidden; text-align: center;">
                                                    <br /><br />
                                                </th>
                                            </tr>
                                            <tr>


                                                <th style="white-space: nowrap; overflow: hidden;">Quantity</th>
                                                <th style="white-space: nowrap; overflow: hidden;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $load = loadImportDetail($whereImportDetail);
                                            $i = 1;

                                            while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {

                                                ?>

                                                <div class="modal fade" id="modal-lg-Image<?= $i ?>" data-backdrop="true">
                                                    <div class="modal-dialog">
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
                                                                <img src="<?= $imagePath ?>" alt="Image" style="width:100%">


                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>

                                                <tr>
                                                    <td class="centered">
                                                        <?= $i ?>
                                                        <input type="hidden" name="txtTranID"  value="<?=$row['tranID']?>">
                                                    </td>
                                                    <td class="centered">
                                                        <?= $row['mBarcode'] ?>
                                                    </td>

                                                    <td class="">
                                                        <?= $row['materialName'] ?>
                                                    </td>

                                                    <td class="centered">
                                                        <?= $row['uname3'] ?>
                                                    </td>
                                                    <td class="centered">
                                                        <?= number_format($row['pur_price'], 2, '.', ',') ?>
                                                    </td>

                                                    <td class="centered">
                                                        <?= $row['unitQty3'] ?>
                                                    </td>
                                                    <td class="centered">
                                                        <?= number_format($row['pur_price'] * $row['unitQty3'], 2, '.', ',') ?>
                                                    </td>
                                                    <td> <a
                                                            href="?d=stock/recieveHistoryDetailEdit&tranID=<?= $row['tranID'] ?>&po_no=<?= $row['po_no'] ?>&po_date=<?= $row['po_date'] ?>&info_name=<?= $row['info_name'] ?>&bill_no=<?= $row['bill_no'] ?>&bill_date=<?= $row['bill_date'] ?>&whouse_no=<?= $row['whouse_no'] ?>&whouse_date=<?= $row['whouse_date'] ?>&del=<?= $row['traDID'] ?>">
                                                            <i class="fa fa-trash-o"></i></a></td>
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
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary " name="btnSubmitAgain">Submit ໃໝ່</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>