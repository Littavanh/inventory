<?php 
	require_once("../indexCode.php"); 
	$wharecause=$_GET['GetInfoID']; 

	$catcount = nr_execute(" SELECT COUNT(*) FROM tb_kind_food WHERE info_id='$wharecause' ");
	$Menucount = nr_execute(" SELECT COUNT(*) FROM tb_food_drink WHERE info_id='$wharecause' ");
	$Materialcount = nr_execute(" SELECT COUNT(*) FROM tb_material WHERE info_id='$wharecause' ");

	?>

<div class="form-group col-md-12">
   	<h4>ໝວດ: <?=number_format($catcount)." ລາຍການ" ?></h4>			                  
</div>
<div class="form-group col-md-12">
   	<h4>ເມນູຂາຍ: <?=number_format($Menucount)." ລາຍການ" ?></h4>			                  
</div>
<div class="form-group col-md-12">
    <h4>ສິນຄ້າ: <?=number_format($Materialcount)." ລາຍການ" ?></h4>						                  
</div>
