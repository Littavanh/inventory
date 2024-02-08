<?php 
session_start();
htmltage("ປ່ຽນໂຕະ");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
if(isset($_SESSION['EDPOSV1change_table']) && $_SESSION['EDPOSV1change_table'] == 'change_table' ){
	include("v_select_table.php");	
} else { 
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 10; URL=$url1");
}
?>
  <link type="text/css" rel="stylesheet" href="css/element.css" />
  <script type="text/javascript" src="js/calculate.js"></script>
<section class="content-header">
    <h1>ປ່ຽນໂຕະ</h1>      
</section>
<section class="content">
<p><?=$success?></p>	
<p class="errormessage"><?=$exist?></p>
<div class="col-md-12">
	<div class="box">
		<div class="box-body pad table-responsive">
			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<th>ລຳດັບ</th>
				  	<th>ຊື່ໂຕະ</th>
				  	<th>ສະຖານະ</th>	  	
			        <th>ມູນຄ່າລວມ</th>
			        <th align="center">ປ່ຽນໂຕະ</th>
				</thead>
				<tbody>
					<?php $result = LoadTable($whereclause); $i = 1; 	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
					<form method="post" action="index.php?d=change_table/change_table">
						<tr>
							<td class ="centered itemcols">
								<span><?= ($i+$start) ?></span>
								<input type="hidden" name="type[]" class="type" value="unchanged" />
				                <input type="hidden" name="txttb_id"  value="<?=$row['tb_id']?>" />
				                <input type="hidden" name="txttb_name"  value="<?=$row['tb_name']?>" />
				                <input type="hidden" name="txtod_no"  value="<?=$row['od_no']?>" />
				                <input type="hidden" name="txttal_price"  value="<?=$row['total']?>" />                
				                </td>
							<td class="eqcodecols"><?= $row['tb_name'] ?></td>	
							<td class="eqcodecols"><?= $row['status_text'] ?></td>
				            <td class="eqcodecols" align="right"><?= number_format($row['total'],2) ?></td>				
				            <td class="eqcodecols">
				                	<!-- <input type="submit" class = "btn btn-block btn-default" name="change_table"  value="ປ່ຽນໂຕະ"  />  -->
				                	<input type="submit" class = "btn btn-block btn-default" name="change_table<?=$i?>"  value="ປ່ຽນໂຕະ" 
				                	onclick="document.location='index.php?d=change_table/change_table&tbID=<?=$row['tb_id']?>&tbName=<?=$row['tb_name']?>&OdNo=<?=$row['od_no']?>&Price=<?=$row['total']?>&zoneName=<?=$row['zone_name']?>' " /> 
				            </td>
						</tr>
				    </form>
					<?php $i++;} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</section>
