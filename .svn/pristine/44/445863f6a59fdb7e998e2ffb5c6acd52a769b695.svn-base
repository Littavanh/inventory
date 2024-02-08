<aside class="main-sidebar  control-sidebar-dark ">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar ">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="users_pic/user_256.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?= $_SESSION['EDPOSV1lao_fullname'] ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu " data-widget="tree">
            <? if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
            <li class="header">ເມນູ ຜູ້ບໍລິຫານ</li>
            <?php } else { ?>
            <li class="header">ເມນູ ພະນັກງານ</li>
            <?php } ?>
            <?php if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
            <li <?php if ($_GET['d'] == 'index') {
          echo "class='active'";
        } ?>><a href="index.php?d=index"><i class="fa fa-dashboard"></i> <span>ໜ້າຫຼັກ</span></a></li>


            <?php }
      if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
            <li class="treeview <?php if ($_GET['d'] == 'manage/supplier' || $_GET['d'] == 'manage/supplier1' || $_GET['d'] == 'manage/transaction' || $_GET['d'] == 'manage/customer' || $_GET['d'] == 'manage/payment' || $_GET['d'] == 'manage/table' || $_GET['d'] == 'manage/category' || $_GET['d'] == 'manage/category1' || $_GET['d'] == 'manage/price_setting' || $_GET['d'] == 'manage/info_list' || $_GET['d'] == 'manage/info_list1') {
          echo " active menu-open";
        } ?>">
                <a href="#">
                    <i class="fa fa-laptop"></i><span>ຈັດການຂໍ້ມູນພື້ນຖານ</span><span class="pull-right-container"><i
                            class="fa fa-angle-left pull-right"></i></span>
                </a>

                <ul class="treeview-menu">
                    <li class="treeview <?php if ($_GET['d'] == 'manage/supplier' || $_GET['d'] == 'manage/transaction' || $_GET['d'] == 'manage/customer' || $_GET['d'] == 'manage/payment' || $_GET['d'] == 'manage/table' || $_GET['d'] == 'manage/category' || $_GET['d'] == 'manage/price_setting' || $_GET['d'] == 'manage/info_list') {
              echo " active menu-open";
            } ?>">
                        <a href="#">
                            <i class="fa fa-circle-o"></i><span>ສາງລາຍວັນ</span><span class="pull-right-container"><i
                                    class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($_GET['d'] == 'manage/supplier') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/supplier"><i class="fa fa-circle-o"></i> ຂໍ້ມູນຜູ້ສະໜອງ</a></li>
                            <li <?php if ($_GET['d'] == 'manage/category') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/category"><i class="fa fa-circle-o"></i> ໝວດ</a></li>
                            <li <?php if ($_GET['d'] == 'manage/info_list') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/info_list"><i class="fa fa-circle-o"></i> ຂໍ້ມູນຫົວໜ່ວຍທຸລະກິດ</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?php if ($_GET['d'] == 'manage/supplier1' || $_GET['d'] == 'manage/transaction' || $_GET['d'] == 'manage/customer' || $_GET['d'] == 'manage/payment' || $_GET['d'] == 'manage/table' || $_GET['d'] == 'manage/category1' || $_GET['d'] == 'manage/price_setting' || $_GET['d'] == 'manage/info_list1') {
              echo " active menu-open";
            } ?>">
                        <a href="#">
                            <i class="fa fa-circle-o"></i><span>ສາງກິດຈະກຳ</span><span class="pull-right-container"><i
                                    class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($_GET['d'] == 'manage/supplier1') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/supplier1"><i class="fa fa-circle-o"></i> ຂໍ້ມູນຜູ້ສະໜອງ</a></li>
                            <li <?php if ($_GET['d'] == 'manage/category1') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/category1"><i class="fa fa-circle-o"></i> ໝວດ</a></li>
                            <li <?php if ($_GET['d'] == 'manage/info_list1') {
                  echo "class='active'";
                } ?>><a href="index.php?d=manage/info_list1"><i class="fa fa-circle-o"></i> ຂໍ້ມູນຫົວໜ່ວຍທຸລະກິດ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php if ($_GET['d'] == 'manage/info' || $_GET['d'] == 'manage/user' || $_GET['d'] == 'manage/setting' || $_GET['d'] == 'manage/importUser') {
          echo " active menu-open";
        } ?>">
                <a href="#">
                    <i class="fa fa-gears"></i><span>ຕັ້ງຄ່າ</span><span class="pull-right-container"><i
                            class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <?php if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>

                    <li <?php if ($_GET['d'] == 'manage/user') {
                echo "class='active'";
              } ?>><a href="index.php?d=manage/user"><i class="fa fa-circle-o"></i> ຜູ້ໃຊ້</a></li>
                    <li <?php if ($_GET['d'] == 'manage/importUser') {
                echo "class='active'";
              } ?>><a href="index.php?d=manage/importUser"><i class="fa fa-circle-o"></i> Import User</a></li>
                    <?php } ?>
                </ul>
            </li>
            <?php }
      if ($_SESSION['EDPOSV1role_id'] <= 3 || $_SESSION['EDPOSV1role_id'] == 5) { ?>
            <li class="treeview <?php if (substr($_GET['d'], 0, 5) == 'stock' || substr($_GET['d'], 0, 5) == 'stock1') {
          echo " active menu-open";
        } ?>">
                <a href="#">
                    <i class="fa fa-cubes"></i><span>ການເຄື່ອນໄຫວ ສາງ</span><span class="pull-right-container"><i
                            class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li class="treeview <?php if (
              $_GET['d'] == 'stock/recieve' || $_GET['d'] == 'stock/approveRecieve' ||
              $_GET['d'] == 'stock/approveRecieveHistory' || $_GET['d'] == 'stock/addjust' || $_GET['d'] == 'stock/approveAddjust'
              || $_GET['d'] == 'stock/approveAddjustHistory' || $_GET['d'] == 'stock/doneAddjust' || $_GET['d'] == 'stock/material' || $_GET['d'] == 'stock/recieveHistory' || $_GET['d'] == 'stock/returnHistory' || $_GET['d'] == 'stock/return'  || $_GET['d'] == 'stock/returnConfirm' || $_GET['d'] == 'stock/doneReturn' || $_GET['d'] == 'stock/recieveHistory'
            ) {
              echo " active menu-open";
            } ?>">
                        <a href="#">
                            <i class="fa fa-cubes"></i><span>ສາງລາຍວັນ</span><span class="pull-right-container"><i
                                    class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">
                            <!-- <span class="badge bg-warning">2</span> -->
                            <?php if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
                            <li <?php if ($_GET['d'] == 'stock/recieve') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/recieve"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock/recieveHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/recieveHistory"><i class="fa fa-circle-o"></i> ປະຫວັດ
                                    ການຮັບສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock/approveRecieve') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/approveRecieve"><i class="fa fa-circle-o"></i> ອະນຸມັດ ຮັບສິນຄ້າ </a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock/approveRecieveHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/approveRecieveHistory"><i class="fa fa-circle-o"></i> ປະຫວັດອະນຸມັດ
                                    ຮັບສິນຄ້າ </a></li>
                            <li <?php if ($_GET['d'] == 'stock/addjust') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/addjust"><i class="fa fa-circle-o"></i> ການເບີກສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock/approveAddjust') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/approveAddjust"><i class="fa fa-circle-o"></i> ອະນຸມັດ ເບີກສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock/approveAddjustHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/approveAddjustHistory"><i class="fa fa-circle-o"></i>
                                    ປະຫວັດການເບີກສິນຄ້າ</a>
                            </li>
                            <?php
                  if ($_SESSION['EDPOSV1isEmpInventory'] == "yes") {

                    ?>
                            <li <?php if ($_GET['d'] == 'stock/doneAddjust') {
                      echo "class='active'";
                    } ?>><a href="index.php?d=stock/doneAddjust"><i class="fa fa-circle-o"></i> ສຳເລັດການເບີກສິນຄ້າ</a>
                            </li>
                            <?php }
                  ?>
                            <li <?php if ($_GET['d'] == 'stock/return') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/return"><i class="fa fa-circle-o"></i> ການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock/returnHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/returnHistory"><i class="fa fa-circle-o"></i>
                                    ປະຫວັດການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock/returnConfirm') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/returnConfirm"><i class="fa fa-circle-o"></i>
                                    ຢືນຢັນການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <?php
                  if ($_SESSION['EDPOSV1isEmpInventory'] == "yes") {

                    ?>
                            <li <?php if ($_GET['d'] == 'stock/doneReturn') {
                      echo "class='active'";
                    } ?>><a href="index.php?d=stock/doneReturn"><i class="fa fa-circle-o"></i>
                                    ສຳເລັດການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <?php }
                  ?>
                            <!-- <li <?php if ($_GET['d'] == 'stock/transfer') {
                    echo "class='active'";
                  } ?>><a
                      href="index.php?d=stock/transfer"><i class="fa fa-circle-o"></i> ການໂອນສິນຄ້າ</a></li>
                  <li <?php if ($_GET['d'] == 'stock/receive_tran') {
                    echo "class='active'";
                  } ?>><a
                      href="index.php?d=stock/receive_tran"><i class="fa fa-circle-o"></i> ຮັບສິນຄາຈາກການໂອນ</a></li> -->
                            <?php }
                if ($_SESSION['EDPOSV1role_id'] <= 3 || $_SESSION['EDPOSV1role_id'] == 5) { ?>
                            <li <?php if ($_GET['d'] == 'stock/material') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock/material"><i class="fa fa-circle-o"></i> ລາຍການສີນຄ້າ</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="treeview <?php if (
              $_GET['d'] == 'stock1/recieve' || $_GET['d'] == 'stock1/approveRecieve' ||
              $_GET['d'] == 'stock1/approveRecieveHistory' || $_GET['d'] == 'stock1/addjust' || $_GET['d'] == 'stock1/approveAddjust'
              || $_GET['d'] == 'stock1/approveAddjustHistory' || $_GET['d'] == 'stock1/doneAddjust' || $_GET['d'] == 'stock1/returnHistory' || $_GET['d'] == 'stock1/return' || $_GET['d'] == 'stock1/material' || $_GET['d'] == 'stock1/returnConfirm' || $_GET['d'] == 'stock1/doneReturn' || $_GET['d'] == 'stock1/recieveHistory'
            ) {
              echo " active menu-open";
            } ?>">
                        <a href="#">
                            <i class="fa fa-cubes"></i><span>ສາງກິດຈະກຳ</span><span class="pull-right-container"><i
                                    class="fa fa-angle-left pull-right"></i></span>
                        </a>

                        <ul class="treeview-menu">

                            <?php if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
                            <li <?php if ($_GET['d'] == 'stock1/recieve') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/recieve"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock1/recieveHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/recieveHistory"><i class="fa fa-circle-o"></i> ປະຫວັດ
                                    ການຮັບສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock1/approveRecieve') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/approveRecieve"><i class="fa fa-circle-o"></i> ອະນຸມັດ ຮັບສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock1/approveRecieveHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/approveRecieveHistory"><i class="fa fa-circle-o"></i> ປະຫວັດອະນຸມັດ
                                    ຮັບສິນຄ້າ</a></li>
                            <li <?php if ($_GET['d'] == 'stock1/addjust') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/addjust"><i class="fa fa-circle-o"></i> ການເບີກສິນຄ້າ</a></li>
                            <!-- <li <?php if ($_GET['d'] == 'stock1/approveAddjust') {
                    echo "class='active'";
                  } ?>><a
                      href="index.php?d=stock1/approveAddjust"><i class="fa fa-circle-o"></i> ອະນຸມັດ ເບີກສິນຄ້າ</a></li> -->
                            <li <?php if ($_GET['d'] == 'stock1/approveAddjustHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/approveAddjustHistory"><i class="fa fa-circle-o"></i>
                                    ປະຫວັດການເບີກສິນຄ້າ</a>
                            </li>
                            <?php
                  if ($_SESSION['EDPOSV1isEmpInventory'] == "yes") {

                    ?>
                            <li <?php if ($_GET['d'] == 'stock1/doneAddjust') {
                      echo "class='active'";
                    } ?>><a href="index.php?d=stock1/doneAddjust"><i class="fa fa-circle-o"></i>
                                    ສຳເລັດການເບີກສິນຄ້າ</a>
                            </li>
                            <?php }
                  ?>
                            <li <?php if ($_GET['d'] == 'stock1/return') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/return"><i class="fa fa-circle-o"></i> ການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock1/returnHistory') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/returnHistory"><i class="fa fa-circle-o"></i>
                                    ປະຫວັດການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'stock1/returnConfirm') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/returnConfirm"><i class="fa fa-circle-o"></i>
                                    ຢືນຢັນການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <?php
                  if ($_SESSION['EDPOSV1isEmpInventory'] == "yes") {

                    ?>
                            <li <?php if ($_GET['d'] == 'stock1/doneReturn') {
                      echo "class='active'";
                    } ?>><a href="index.php?d=stock1/doneReturn"><i class="fa fa-circle-o"></i>
                                    ສຳເລັດການສົ່ງຄືນສິນຄ້າ</a>
                            </li>
                            <?php }
                  ?>
                            <!-- <li <?php if ($_GET['d'] == 'stock1/transfer') {
                    echo "class='active'";
                  } ?>><a
      href="index.php?d=stock1/transfer"><i class="fa fa-circle-o"></i> ການໂອນສິນຄ້າ</a></li>
  <li <?php if ($_GET['d'] == 'stock1/receive_tran') {
        echo "class='active'";
      } ?>><a
      href="index.php?d=stock1/receive_tran"><i class="fa fa-circle-o"></i> ຮັບສິນຄາຈາກການໂອນ</a></li> -->
                            <?php }
                if ($_SESSION['EDPOSV1role_id'] <= 3 || $_SESSION['EDPOSV1role_id'] == 5) { ?>
                            <li <?php if ($_GET['d'] == 'stock1/material') {
                    echo "class='active'";
                  } ?>><a href="index.php?d=stock1/material"><i class="fa fa-circle-o"></i> ລາຍການສີນຄ້າ</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php }
      if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
            <li class="treeview <?php if (substr($_GET['d'], 0, 6) == 'report') {
          echo " active ";
        } ?>">
                <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>ລາຍງານ</span><span class="pull-right-container"><i
                            class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <!-- <li class="treeview <?php if (substr($_GET['d'], 7) == 'table' || substr($_GET['d'], 7) == 'food_and_drink' || substr($_GET['d'], 7) == 'item') {
              echo " active menu-open";
            } ?>">
              <a href="#"><i class="fa fa-circle-o"></i> ລາຍງານ ຂໍ້ມູນພື້ນຖານ<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
               <!--  <li <?php if ($_GET['d'] == 'report/table') {
                 echo "class='active'";
               } ?>><a href="index.php?d=report/table&startdate=<?= date('Y-m-d') ?>&enddate=<?= date('Y-m-d') ?>"><i class="fa fa-circle-o"></i> ລາຍການໂຕະ</a></li>  
                <li <?php if ($_GET['d'] == 'report/food_and_drink') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/food_and_drink&startdate=<?= date('Y-m-d') ?>&enddate=<?= date('Y-m-d') ?>"><i class="fa fa-circle-o"></i> ລາຍການໝວດ</a></li>
                <li <?php if ($_GET['d'] == 'report/item') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/item&startdate=<?= date('Y-m-d') ?>&enddate=<?= date('Y-m-d') ?>"><i class="fa fa-circle-o"></i> ລາຍການສີນຄ້າ</a></li>
              </ul>
            </li>                                           -->
                    <li class="treeview <?php if ($_GET['d'] == 'report/receive' || $_GET['d'] == 'report/receiveT' || $_GET['d'] == 'report/inventory_movement' || $_GET['d'] == 'report/stock_transfer' || $_GET['d'] == 'report/material_instock' || $_GET['d'] == 'report/material_min'  || $_GET['d'] == 'report/material_exp' ) {
              echo " active menu-open";
              } ?>">
                        <a href="#"><i class="fa fa-circle-o"></i> ລາຍງານ ສາງລາຍວັນ<span class="pull-right-container"><i
                                    class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li <?php if ($_GET['d'] == 'report/receive') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/receive"><i class="fa fa-circle-o"></i> ສິນຄ້າຄົງເຫລືອ</a></li>
                            <li <?php if ($_GET['d'] == 'report/receiveT') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/receiveT"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ (ລວມ)</a></li>
                            <li <?php if ($_GET['d'] == 'report/inventory_movement') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/inventory_movement"><i class="fa fa-circle-o"></i> ການເຄື່ອນໄຫວສາງ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'report/stock_transfer') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/stock_transfer"><i class="fa fa-circle-o"></i> ລາຍງານເບິກສິນຄ້າ</a>
                            </li>
                            <!-- <li <?php if ($_GET['d'] == 'report/material_instock') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/material_instock"><i class="fa fa-circle-o"></i> ສິນຄ້າໃນສາງ</a></li> -->
                            <li <?php if ($_GET['d'] == 'report/material_min') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/material_min"><i class="fa fa-circle-o"></i>
                                    ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ</a></li>
                            <li <?php if ($_GET['d'] == 'report/material_exp') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report/material_exp"><i class="fa fa-circle-o"></i> ສິນຄ້າໃກ້ໝົດອາຍຸ</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?php if ($_GET['d'] == 'report1/receive' || $_GET['d'] == 'report1/receiveT' || $_GET['d'] == 'report1/inventory_movement' || $_GET['d'] == 'report1/stock_transfer' || $_GET['d'] == 'report1/material_instock' || $_GET['d'] == 'report1/material_min'  || $_GET['d'] == 'report1/material_exp' ) {
              echo " active menu-open";
              } ?>">
                        <a href="#"><i class="fa fa-circle-o"></i> ລາຍງານ ສາງກິດຈະກຳ<span
                                class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li <?php if ($_GET['d'] == 'report1/receive') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/receive"><i class="fa fa-circle-o"></i> ສິນຄ້າຄົງເຫລືອ</a></li>
                            <li <?php if ($_GET['d'] == 'report1/receiveT') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/receiveT"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ (ລວມ)</a></li>
                            <li <?php if ($_GET['d'] == 'report1/inventory_movement') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/inventory_movement"><i class="fa fa-circle-o"></i>
                                    ການເຄື່ອນໄຫວສາງ</a>
                            </li>
                            <li <?php if ($_GET['d'] == 'report1/stock_transfer') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/stock_transfer"><i class="fa fa-circle-o"></i> ລາຍງານເບິກສິນຄ້າ</a>
                            </li>
                            <!-- <li <?php if ($_GET['d'] == 'report1/material_instock') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/material_instock"><i class="fa fa-circle-o"></i> ສິນຄ້າໃນສາງ</a></li> -->
                            <li <?php if ($_GET['d'] == 'report1/material_min') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/material_min"><i class="fa fa-circle-o"></i>
                                    ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ</a></li>
                            <li <?php if ($_GET['d'] == 'report1/material_exp') {
                  echo "class='active'";
                } ?>><a href="index.php?d=report1/material_exp"><i class="fa fa-circle-o"></i> ສິນຄ້າໃກ້ໝົດອາຍຸ</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <li <?php if ($_GET['d'] == 'about/about') {
        echo "class='active'";
      } ?>><a href="index.php?d=about/about"><i class="fa fa-question"></i> <span>ກ່ຽວກັບໂປຼແກຼມ</span></a></li>
            <li><a href="help/view.php" target="_blank"><i class="fa fa-book"></i> <span>ຄູ່ມືນໍາໃຊ້</span></a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>ອອກໂປຼແກຼມ</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>