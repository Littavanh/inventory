<?php
session_start();
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
require_once("../config.php");
require_once("m_payment.php");

$date = date('Y-m-d');
$output_filename = "Payment".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍການບໍລິການ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
			<th>ລຳດັບ</th>
			<th>ວັນທີ</th>
			<th>ຜູ້ຈ່າຍ</th>
			<th>ປະເພດລາຍຈ່າຍ</th>  
			<th>ໝາຍເຫດ</th>
			<th>ມູນຄ່າລວມ(ກີບ)</th>  							   
			<th>ຜູ້ບັນທຶກ</th>
			<th>ວັນທີເປີດ</th> 
        </tr>             	  	
	 <?php 			
			$i=1;
			$sum_total = 0;
			$result_service_ex = Loadservice_sumary($whereclause);
			while ($item = mysql_fetch_array($result_service_ex)) { 
					$sum_total = $sum_total + $item['pur_price']; ?>
			<tr>
				<td align="center"><?= ($i+$start) ?></td>
				<td align="center"><?=$item['traDate'] ?></td>
				<td><?=$item['staffName'] ?></td>
				<td><?=$item['Typename'] ?></td>
				<td><?=$item['remark'] ?></td>
				<td align="right"><?=number_format($item['pur_price']) ?></td>								
				<td align="right"><?= $item['username'] ?></td>
				<td align="right"><?= $item['date_add'] ?></td>                  
			</tr>    
		<?php 
			$i++; } ?>
			<tr>
				<td colspan="4" class="centered"><strong>ສັງລວມລາຍຈ່າຍ ແຕ່ວັນທີ່ <?=$_GET['startdate']?> ຫາ <?=$_GET['enddate']?></strong></td>
				<td colspan="2" align="right"><strong><?=number_format($sum_total)?></strong></td>
				<td></td>
				<td></td>
	  		</tr>  
	</table>
<?php
mysql_close($conn);
 ?>
