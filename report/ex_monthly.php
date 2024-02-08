<?php
session_start();
require_once("../config.php");
require_once("m_monthly.php");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 
$date = date('m/Y');
$output_filename = "Monthly report".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ບົດສະຫຼຸບປະຈໍາເດືອນ ".$viewMonth."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
	  	<th>ລຳດັບ</th>							  
		<th>ລາຍລະອຽດ</th>
		<th class="centered">ເດືອນ</th>
		<th class="centered">ປີ</th>
		<th>ມູນຄ່າ(ກີບ)</th>	
		<th>ໝາຍເຫດ</th>	
	  </tr>
		<?php 			
			$i=1;
			$sum_recieve=  0;
			while ($item = mysql_fetch_array($result)) { 
			if ($item['type_income']==1) {
				$sum_recieve=  $sum_recieve+$item['sum_amount'];
			} else if ($item['type_income']==2) {
				$sum_recieve=  $sum_recieve-$item['sum_amount'];
			}
		?>
	<tr>
		<td><?= ($i+$start) ?></td>
		<td ><?= $item['reportDetail'] ?></td>
		<td align="center"><?= $item['view_month'] ?>&nbsp;</td>
		<td align="center"><?= $item['view_year'] ?>&nbsp;</td>
	    <td align="right"><?= number_format($item['sum_amount']) ?>&nbsp;</td>
	    <td align="left"><?= $item['remark'] ?>&nbsp;</td>					             
	</tr>
	<?php $i++; } ?>
	<tr>
		<td colspan="4" align="right"><strong>ຍອດຍັງເຫຼືອ</strong></td>
		<td align="right"><strong><?= number_format($sum_recieve) ?></strong>&nbsp;</td>
		<td align="right">&nbsp;</td>
	</tr>		
</table>
<?php
mysql_close($conn);
 ?>
