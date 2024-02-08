<?php
session_start();
require_once("../config.php");
require_once("m_material_min.php");
$SumResult = SumMaterial($whereclause, '');
$date = date('Y-m-d');
$output_filename = "Stock_min".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງານ ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ  ປະຈໍາວັນທີ່ ".$date."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
	  		<th>ລຳດັບ</th>	 
		  	<th>ຊື່ ສິນຄ້າ</th>
		  	<th>ຈໍານວນ(1)</th>	  	
	        <th>ຈໍານວນ(2)</th>
	        <th>ຈໍານວນ(3)</th>     
	        <th>ຈໍານວນທັງໝົດໃນສາງ(3)</th>
	        <th>ຈຸດຕໍ່າສຸດ</th>   
	        <th>ວັນທີ່ຮັບຄັ້ງສູດທ້າຍ</th>	           	  	
	  </tr>
		<?php 			
			$i=1;
			while ($item = mysql_fetch_array($SumResult)) { 
				$whereGroupID = $item['materialID'];
				$cvgroup11 = 0;
					$cvgroup12 = 0;
					$cvgroup21 = 0;
					$cvgroup22 = 0;
				if  ($item['cap1'] !=0){
					$cvgroup11 = $item['unitQty3']%$item['cap1'];
					$cvgroup12 = ($item['unitQty3']-($cvgroup11))/$item['cap1'];
					$cvgroup21 = $cvgroup11%$item['cap2'];
					$cvgroup22 = ($cvgroup11 - $cvgroup21)/$item['cap2'];
				} else if ($item['cap2'] !=0) {
					$cvgroup11 = 0;
					$cvgroup12 = 0;
					$cvgroup21 = $item['unitQty3']%$item['cap2'];
					$cvgroup22 = ($item['unitQty3'] - $cvgroup21)/$item['cap2'];					
				} else if ($item['cap3'] !=0) {
					$cvgroup11 = 0;
					$cvgroup12 = 0;
					$cvgroup21 = $item['unitQty3'];
					$cvgroup22 = 0;
				}
			?>
			<tr>
				<td class="centered"><?= ($i+$start) ?></td>								
				<td><?= $item['materialName'] ?></td>
				<td align="right"><?= number_format($cvgroup12).' '.$item['unitName1'] ?></td>
				<td align="right"><?= number_format($cvgroup22).' '.$item['unitName2'] ?></td>
				<td align="right"><?= number_format($cvgroup21).' '.$item['unitName3'] ?></td>
				<td align="right"><?= number_format($item['unitQty3']).' '.$item['unitName3'] ?></td>	
				<td align="right"><?= number_format($item['min_stock']).' '.$item['unitName3'] ?></td>
				<td align="center"><?= $item['date_tran'] ?></td>
			</tr>
			<?php    $i++; } 	?>
	</table>
<?php
mysql_close($conn);
 ?>
