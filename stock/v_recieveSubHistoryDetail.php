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
    <h1>ລາຍລະອຽດ</h1>
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <button type="reset" class="btn btn-default"
                        onclick="document.location='?d=stock/recieveSubHistory'">ປິດ</button>
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
                                                ສະຖານະ<br />Status<br /></th>
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
                                                    <?= number_format($row['pur_price'],2, '.', ',') ?>
                                                </td>
                                                <td class="centered">
                                                    <?= $row['unitQty3'] ?>
                                                </td>
                                                <td class="centered">
                                                    <?= number_format($row['pur_price'] * $row['unitQty3'],2, '.', ',') ?>
                                                </td>
                                                <?php

                                                if ($row['statusApprove_id'] == "2") {
                                                    ?>
                                                    <td class="centered">
                                                        <h4><span class="label label-warning">ລໍຖ້າອະນຸມັດ</span></h4>
                                                    </td>
                                                    <?php
                                                } else if ($row['statusApprove_id'] == "4") {
                                                    ?>
                                                        <td class="centered">
                                                            <h4><span class="label label-danger ">ບໍ່ອະນຸມັດ</span></h4>
                                                        </td>
                                                    <?php
                                                } else {
                                                    ?>
                                                        <td class="centered">
                                                            <h4><span class="label label-success">ອະນຸມັດແລ້ວ</span></h4>
                                                        </td>
                                                    <?php
                                                }
                                                ?>

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
                </div>
            </div>
        </div>
</section>