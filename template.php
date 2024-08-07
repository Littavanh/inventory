<?php 
  require_once('indexCode.php'); 
  if ($_GET['notification1']=='yes' && $_SESSION['EDPOSV1notification1'] =='yes' ) {
    $_SESSION['EDPOSV1notification1']='no';
  }
  if ($_GET['notification2']=='yes' && $_SESSION['EDPOSV1notification2'] =='yes') {
    $_SESSION['EDPOSV1notification2']='no';
  }
  if (isset($_GET['notification1']) || isset($_GET['EDPOSV1notification2'])) {
    $oldURL = $_SESSION['EDPOSV1GetOrURL'];
    header("Location: ".$oldURL); 
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php function htmltage($title){ ?>
  <title><?php echo $title; ?></title>
  <?php } ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" >
<?php if(isset($_SESSION['EDPOSV1user_id'])) {  ?>
<div class="wrapper">
  <?php 
    $_SESSION['EDPOSV1GetOrURL'] = $_SERVER['REQUEST_URI'];
    $urlNotify1=$_SERVER['REQUEST_URI'].'&notification1=yes';
    $urlNotify2=$_SERVER['REQUEST_URI'].'&notification2=yes';
    $resultCheckCurStock = CheckCurStatusStock();
    while($rowCurStock = mysql_fetch_array($resultCheckCurStock, MYSQL_ASSOC)) {
      $_SESSION['EDPOSV1CurStockStatus'] = $rowCurStock['status_id'];
    } ?>  
  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>EG POS</b> V2.0</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php  
              $resultCountMinStock = CoutnMinStock();
              while($rowCountStock = mysql_fetch_array($resultCountMinStock, MYSQL_ASSOC)) {
                $_SESSION['EDPOSV1CountMinStock'] = $rowCountStock['num_list'];
              }

              $dateView= date('Y-m-d');
              $resultCountStockEXP = CoutnStockEXP($dateView);
              while($rowStockEXP = mysql_fetch_array($resultCountStockEXP, MYSQL_ASSOC)) {
                $_SESSION['EDPOSV1StockEXP'] = $rowStockEXP['num_EXP'];
              }
              $notiCount = $_SESSION['EDPOSV1CountMinStock']+$_SESSION['EDPOSV1StockEXP'];
              if ($notiCount >0) {
            ?>
          
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?=$notiCount?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?=$notiCount?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> ວັດຖຸດີບເຖິງຈຸດຕໍ່າສຸດ <strong><?=$_SESSION['EDPOSV1CurStockStatus'] ?></strong> ລາຍການ
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-minus-circle text-red"></i>ວັດຖຸດີບເຖິງວັນໝົດອາຍຸ <strong><?=$_SESSION['EDPOSV1StockEXP'] ?> </strong>ລາຍການ
                    </a>
                  </li>
                </ul>
              </li>             
            </ul>
          </li>
          <?php } ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">        
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">   
            <img src="users_pic/user_256.png" class="img-circle" alt="User Image">           
              <span class="hidden-xs"><?= $_SESSION['EDPOSV1first_name'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="users_pic/user_256.png" class="img-circle" alt="User Image">
                <p>
                  <?= $_SESSION['EDPOSV1first_name'].' '. $_SESSION['EDPOSV1last_name'] ?>
                  <small>Member since <?=$_SESSION['EDPOSV1dateuser_add']?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
          <!-- Control Sidebar Toggle Button -->      
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar  control-sidebar-dark">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="users_pic/<?=$_SESSION['EDPOSV1user_pic']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $_SESSION['EDPOSV1first_name'].' '. $_SESSION['EDPOSV1last_name'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <? if ($_SESSION['EDPOSV1role_id'] <= 3 ) { ?><li class="header">ເມນູ ຜູ້ບໍລິຫານ</li><?php } else { ?><li class="header">ເມນູ ພະນັກງານ</li><?php } ?>
        <?php if($_SESSION['EDPOSV1role_id'] <=4) { ?>         
        <li <?php if ($_GET['d'] =='index' ) { echo "class='active'";}?>><a href="index.php?d=index"><i class="fa fa-dashboard" ></i> <span>ໜ້າຫຼັກ</span></a></li>
        <li <?php if ($_GET['d'] =='rate/rate' ) { echo "class='active'";}?>><a href="index.php?d=rate/rate"><i class="fa fa-money" ></i> <span>ອັດຕາແລກປ່ຽນ</span></a></li>
        <?php } if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>         
        <li class="treeview <?php if ($_GET['d'] =='manage/zone' || $_GET['d'] =='manage/table' || $_GET['d'] =='manage/kind_of_food_and_drink' || $_GET['d'] =='manage/price_setting') { echo " active menu-open";}?>">
          <a href="#">
            <i class="fa fa-laptop"></i><span>ຈັດການຂໍ້ມູນພື້ນຖານ</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($_GET['d'] =='manage/zone' ) { echo "class='active'";}?>><a href="index.php?d=manage/zone"><i class="fa fa-circle-o"></i> ໂຊນຮ້ານອາຫານ</a></li>
            <li <?php if ($_GET['d'] =='manage/table' ) { echo "class='active'";}?>><a href="index.php?d=manage/table"><i class="fa fa-circle-o"></i> ລາຍການໂຕະ</a></li>
            <li <?php if ($_GET['d'] =='manage/kind_of_food_and_drink' ) { echo "class='active'";}?>><a href="index.php?d=manage/kind_of_food_and_drink"><i class="fa fa-circle-o"></i> ໝວດອາຫານ ແລະ ສິນຄ້າດື່ມ</a></li>
            <li <?php if ($_GET['d'] =='manage/price_setting' ) { echo "class='active'";}?>><a href="index.php?d=manage/price_setting"><i class="fa fa-circle-o"></i> ຕັ້ງລາຄາອາຫານ ແລະ ສິນຄ້າດື່ມ</a></li>         
          </ul>
        </li>        
        <li class="treeview <?php if ($_GET['d'] =='manage/info' || $_GET['d'] =='manage/user' || $_GET['d'] =='stock/setting') { echo " active menu-open";}?>">
          <a href="#">
            <i class="fa fa-gears"></i><span>ຕັ້ງຕ່າ</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($_GET['d'] =='manage/info' ) { echo "class='active'";}?>><a href="index.php?d=manage/info"><i class="fa fa-circle-o"></i> ຂໍ້ມູນກ່ຽວກັບຮ້ານ</a></li>
            <li <?php if ($_GET['d'] =='manage/user' ) { echo "class='active'";}?>><a href="index.php?d=manage/user"><i class="fa fa-circle-o"></i> ຜູ້ໃຊ້</a></li>
            <li <?php if ($_GET['d'] =='stock/setting' ) { echo "class='active'";}?>><a href="index.php?d=stock/setting"><i class="fa fa-circle-o"></i> ກໍານົດການເບິກ</a></li>
          </ul>
        </li>
        <?php } if($_SESSION['EDPOSV1role_id'] <=2  || $_SESSION['EDPOSV1role_id'] == 5) { ?> 
        <li class="treeview <?php if (substr($_GET['d'],0,5)  =='stock') { echo " active menu-open";}?>">
          <a href="#">
            <i class="fa fa-cubes"></i><span>ສາງ</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">
            <li <?php if ($_GET['d'] =='stock/recieve' ) { echo "class='active'";}?>><a href="index.php?d=stock/recieve"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ</a></li>
            <li <?php if ($_GET['d'] =='stock/addjust' ) { echo "class='active'";}?>><a href="index.php?d=stock/addjust"><i class="fa fa-circle-o"></i> ສິນຄ້າອອກສາງ</a></li>
            <li <?php if ($_GET['d'] =='stock/material' ) { echo "class='active'";}?>><a href="index.php?d=stock/material"><i class="fa fa-circle-o"></i> ວັດຖຸດິບ</a></li>      
            <li <?php if ($_GET['d'] =='stock/unit' ) { echo "class='active'";}?>><a href="index.php?d=stock/unit"><i class="fa fa-circle-o"></i> ຫົວໜ່ວຍ</a></li>      
          </ul>
        </li>      
        <?php }  if($_SESSION['EDPOSV1role_id'] <=5) { ?>   
        <li class="treeview <?php if ( substr($_GET['d'],0,6)  =='report') { echo " active ";}?>">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>ລາຍງານ</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
          </a>
          <ul class="treeview-menu">            
            <li class="treeview <?php if (substr($_GET['d'],7) =='table' || substr($_GET['d'],7)  =='food_and_drink') { echo " active menu-open";}?>">
              <a href="#"><i class="fa fa-circle-o"></i> ຂໍ້ມູນພື້ນຖານ<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <li <?php if ($_GET['d'] =='report/table' ) { echo "class='active'";}?>><a href="index.php?d=report/table"><i class="fa fa-circle-o"></i> ລາຍການໂຕະອາຫານ</a></li>
                <li <?php if ($_GET['d'] =='report/food_and_drink' ) { echo "class='active'";}?>><a href="index.php?d=report/food_and_drink"><i class="fa fa-circle-o"></i> ລາຍການສິນຄ້າດື່ມ ແລະ ອາຫານ</a></li>
              </ul>
            </li>
            <li class="treeview <?php if (substr($_GET['d'],7) =='service' || substr($_GET['d'],7)  =='cash_log' || substr($_GET['d'],7)  =='sum_menu') { echo " active menu-open";}?>">
              <a href="#"><i class="fa fa-circle-o"></i> ການບໍລິການ<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <li <?php if ($_GET['d'] =='report/service' ) { echo "class='active'";}?>><a href="index.php?d=report/service"><i class="fa fa-circle-o"></i> ການບໍລິການ</a></li>
                <li <?php if ($_GET['d'] =='report/cash_log' ) { echo "class='active'";}?>><a href="index.php?d=report/cash_log"><i class="fa fa-circle-o"></i> ການຮັບເງິນ</a></li>
                <li <?php if ($_GET['d'] =='report/sum_menu' ) { echo "class='active'";}?>><a href="index.php?d=report/sum_menu"><i class="fa fa-circle-o"></i> ເມນູທີ່ຂາຍ</a></li>
              </ul>
            </li>
            <li class="treeview <?php if (substr($_GET['d'],7) =='receive' || substr($_GET['d'],7)  =='inventory_movement' || substr($_GET['d'],7)  =='stock_transfer' || substr($_GET['d'],7)  =='material_instock' || substr($_GET['d'],7)  =='material_instock' || substr($_GET['d'],7)  =='material_min' || substr($_GET['d'],7)  =='material_exp') { echo " active menu-open";}?>">
              <a href="#"><i class="fa fa-circle-o"></i> ສາງ<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
              <ul class="treeview-menu">
                <li <?php if ($_GET['d'] =='report/receive' ) { echo "class='active'";}?>><a href="index.php?d=report/receive"><i class="fa fa-circle-o"></i> ການຮັບສິນຄ້າ</a></li>
                <li <?php if ($_GET['d'] =='report/inventory_movement' ) { echo "class='active'";}?>><a href="index.php?d=report/inventory_movement"><i class="fa fa-circle-o"></i> ການເຄື່ອນໄຫວສາງ</a></li>
                <li <?php if ($_GET['d'] =='report/stock_transfer' ) { echo "class='active'";}?>><a href="index.php?d=report/stock_transfer"><i class="fa fa-circle-o"></i> ຊໍາລະສິນຄ້າອອກສາງ</a></li>
                <li <?php if ($_GET['d'] =='report/material_instock' ) { echo "class='active'";}?>><a href="index.php?d=report/material_instock"><i class="fa fa-circle-o"></i> ສິນຄ້າໃນສາງ</a></li>
                <li <?php if ($_GET['d'] =='report/material_min' ) { echo "class='active'";}?>><a href="index.php?d=report/material_min"><i class="fa fa-circle-o"></i> ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ</a></li>
                <li <?php if ($_GET['d'] =='report/material_exp' ) { echo "class='active'";}?>><a href="index.php?d=report/material_exp"><i class="fa fa-circle-o"></i> ສິນຄ້າໃກ້ໝົດອາຍຸ</a></li>
              </ul>
            </li> 
          </ul>
        </li>
        <?php } ?>
        <li><a href="help/view.php" target="_blank"><i class="fa fa-book"></i> <span>ຄູ່ມືນໍາໃຊ້</span></a></li>
        <li <?php if ($_GET['d'] =='about/about' ) { echo "class='active'";}?>><a href="index.php?d=about/about" target="_blank"><i class="fa fa-question"></i> <span>ກຽວກັບໂປຼແກຼມ</span></a></li>
        <li><a href="logout.php" target="_blank"><i class="fa fa-sign-out"></i> <span>ອອກໂປຼແກຼມ</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php if ($_SESSION['EDPOSV1CurStockStatus'] == 2) {?>
  <div><h1 class="h1" align="center">ກະລຸນາເປີດງວດກ່ອນເຄື່ອນໄຫວການບໍລິການ <a href="?d=stock/open-stock">ເປີດງວດ</a></h1></div>
  <?php } ?>
    <!-- Content Header (Page header) -->
    <?php if (file_exists($vfilename)) include($vfilename); ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="https://www.facebook.com/EG-POS-209297582890361">EG Soft</a>.</strong> All rights reserved.
  </footer>

    <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
       
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <ul class="control-sidebar-menu">
          
        </ul>        
      </div> 
    </div>
  </aside>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script> 
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })
    //Date picker
    $('#datepicker2').datepicker({
      autoclose: true
    })    
</script>

<?php } ?>
</body>
</html>
