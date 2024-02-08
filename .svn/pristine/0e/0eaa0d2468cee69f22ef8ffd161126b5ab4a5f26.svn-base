<?php
session_start();
require_once("../config.php");
require_once("m_material_instock.php");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }

$SumResult = SumMaterial($whereclause);
$date = date('Y-m-d');
$output_filename = "Instock".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງານສິນຄ້າໃນສາງ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
							  	<th>ລຳດັບ</th>	
							  	<th>Barcode</th>  								  
							  	<th>ຊື່ ສິນຄ້າ</th>
							  	<th>ຈໍານວນ(1)</th>	  	
						        <th>ຈໍານວນ(2)</th>
						        <th>ຈໍານວນ(3)</th>   
						        <th>ມູນຄ່າ</th>
						        <th>ວັນທີ່ໝົດອາຍຸ</th>           	  	
	  </tr>
							<?php 			
							$i=1;
							$sumPurPrice = 0;
							while ($item = mysql_fetch_array($SumResult)) { 
								$whereGroupID = $item['materialID'];
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = 0;
									$cvgroup22 = 0;
									$sumPurPrice = $sumPurPrice+$item['pur_price'];
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
			<tr bgcolor="#00FFFF">
								<td class="centered"><?= ($i+$start) ?></td>								
								<td><div align="center"><strong><?= $item['mBarcode'] ?></strong></div></td>
								<td><div align="center"><strong><?= $item['materialName'] ?></strong></div></td>
								<td align="right"><strong><?= number_format($cvgroup12).' '.$item['unitName1'] ?></strong></td>
								<td align="right"><strong><?= number_format($cvgroup22).' '.$item['unitName2'] ?></strong></td>
								<td align="right"><strong><?= number_format($cvgroup21).' '.$item['unitName3'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['pur_price']) ?></strong></td>
								<td><strong><?= $item['exp_date'] ?></strong></td>		
			</tr>
			<?php
			/*
				$j=1;				
				$result_detail = LoadTable($whereclause, $whereGroupID);
				while ($itemD = mysql_fetch_array($result_detail)) {
						$convert11 = 0;
						$convert12 = 0;
						$convert21 = 0;
						$convert22 = 0;	
					if  ($itemD['cap1'] !=0){
						$convert11 = $itemD['unitQty3']%$itemD['cap1'];
						$convert12 = ($itemD['unitQty3']-($convert11))/$itemD['cap1'];
						$convert21 = $convert11%$itemD['cap2'];
						$convert22 = ($convert11 - $convert21)/$itemD['cap2'];
					} else if ($itemD['cap2'] !=0) {
						$convert11 = 0;
						$convert12 = 0;
						$convert21 = $itemD['unitQty3']%$itemD['cap2'];
						$convert22 = ($itemD['unitQty3'] - $convert21)/$itemD['cap2'];					
					} else if ($itemD['cap3'] !=0) {
						$convert11 = 0;
						$convert12 = 0;
						$convert21 = $itemD['unitQty3'];
						$convert22 = 0;	
					}	
					*/
			?>
			<!--
			<tr>
				<td><?= $i.'.'.$j ?></td>								
			 
				<td><?= $itemD['materialName'] ?></td>
				<td><?= $convert12.' '.$itemD['unitName1'] ?></td>
				<td><?= $convert22.' '.$itemD['unitName2'] ?></td>
				<td><?= $convert21.' '.$itemD['unitName3'] ?></td>
				<td><?= $itemD['exp_date'] ?></td>
				<td><?= $itemD['username'] ?></td>	
				<td><?= $itemD['date_add'] ?></td>
			</tr>
			-->
			<?php 
				//$j++; }
				$i++; } 
			?>
			<tr bgcolor="#00FFFF">
								<td colspan="4" class="centered">
									<strong>ລວມມູນຄ່າສິນຄ້າໃນສາງງວດວັນທີ <?=$_GET['startdate'].' - '.$_GET['enddate'] ?></strong>
								</td>	
								<td colspan="4" align="left"><strong><?= number_format($sumPurPrice) ?></strong></td>								
							</tr>
	</table>
<?php
mysql_close($conn);
 ?>
