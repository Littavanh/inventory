<?php
session_start();
require_once("../config.php");
require_once("m_yearly.php");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 
$date = date('Y');
$output_filename = "Yearly report".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ບົດສະຫຼຸບປະຈໍາປີ".$viewyear."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
							  	<th>ລຳດັບ</th>							  							  
							  	<th class="centered">ເດືອນ/ປີ</th>
							  	<th>ລາຍຮັບ</th>	
						        <th>ລາຍຈ່າຍ</th>
						        <th>ສ່ວນຕ່າງ</th>	
	  </tr>
							<?php 			
								$i=1;
								$sum_recieve=  0;
								$sum_payment=  0;
								$sum_intensive=  0;
								while ($item = mysql_fetch_array($result)) { 								 
									$sum_recieve=  $sum_recieve+$item['income'];								
									$sum_payment=  $sum_payment+$item['payment'];
									$sum_intensive=  $sum_recieve-$sum_payment;								
							?>
								<tr>
									<td><?= ($i+$start) ?></td>
									<td align="center"><?= $item['view_month'].'/'.$item['view_year'] ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['income']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['payment']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['income']-$item['payment']) ?>&nbsp;</td>				             
								</tr>
							<?php $i++; } ?>	
	<tr>
								<td colspan="2" align="right"><strong>ລວມ</strong></td>
								<td align="right"><strong><?= number_format($sum_recieve) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sum_payment) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sum_intensive) ?></strong>&nbsp;</td>
	</tr>		
</table>
<?php
mysql_close($conn);
 ?>
