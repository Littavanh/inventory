<?php
session_start();
require_once("../config.php");
require_once("m_cashdrawer.php");
$result_report = Loadservice_sumary($whereclause);

$date = date('d-m-Y');
$output_filename = "cashflow".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ຮັບ-ຈ່າຍ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
									<th>ລຳດັບ</th>
								  	<th>ວັນທີ</th>
								  	<th>ປະເພດ</th>
								  	<th>ກີບ</th>
								  	<th>ບາດ</th>
								  	<th>ໂດລາ</th>								  	
								  	<th>ລວມມູນຄ່າ</th>
								  	<th>ຜູ້ບັນທືກ</th>        
								  	<th>ວັນທີບັນທືກ</th>   
	  </tr>
							<?php $i=1; $sum_total = 0;
								while ($item = mysql_fetch_array($result_report)) { 
									$sum_lak = $sum_lak + $item['cd_lak'];
									$sum_thb = $sum_thb + $item['cd_thb'];
									$sum_usd = $sum_usd + $item['cd_usd'];
									$sum_total_lak = $sum_total_lak + $item['total_lak'];
							?>
			<tr>
								<td><?= $i  ?></td>
								<td><?= $item['date_open'] ?></td>
								<td><?= $item['remark'] ?></td>
								<td align="right"><?= number_format($item['cd_lak']) ?></td>
								<td align="right"><?= number_format($item['cd_thb']) ?></td>
								<td align="right"><?= number_format($item['cd_usd']) ?></td>
								<td align="right"><?= number_format($item['total_lak']) ?></td>
								<td><?= $item['user_open'] ?></td>
								<td><?= $item['date_log'] ?></td>
			</tr>
		<?php $i++; } ?>
			<tr>
									<td colspan="3" align="center"><strong>ລວມຍອດ</strong></td>
								  	<td align="right"><strong><?=number_format($sum_lak,2) ?></strong></td>                				
								  	<td align="right"><strong><?=number_format($sum_thb,2) ?></strong></td>          
								  	<td align="right"><strong><?=number_format($sum_usd,2) ?></strong></td>          
								  	<td align="right"><strong><?=number_format($sum_total_lak,2) ?></strong></td>          
								  	<td></td>	
								  	<td></td>	
			</tr>		
	</table>
<?php
mysql_close($conn);
 ?>
