<?php
session_start();
require_once("../config.php");
require_once("m_history_cus.php");
//if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$result_report = Loadservice_sumary($whereclause);
$date = date('d-m-Y');
$output_filename = "payment_history".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ປະຫວັດການຊໍາລະ ວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr>
			<th>ລຳດັບ</th>
			<th>ລາຍລະອຽດ</th>
			<th>ລວມມູນຄ່າ</th>
			<th>ຜູ້ບັນທືກ</th>        
			<th>ວັນທີບັນທືກ</th> 
	  </tr>
		<?php $i=1;  
			while ($item = mysql_fetch_array($result_report)) { 
				$sum_total = $sum_total+abs($item['amount_credit']);
		?>
				<tr >
								<td><?= $i  ?></td>
								<td><?='ຈ່າຍໃບບິນເລກທີ: '.$item['od_no'] ?></td>
								<td align="right"><?= number_format(abs($item['amount_credit'])) ?></td>
								<td><?= $item['username'] ?></td>
								<td><?= $item['date_add'] ?></td>
				</tr> 					
				<?php 	$i++; } ?>
			<tr>
				<td colspan="3" align="center"><strong>ລວມຍອດ</strong></td>
			  	<td><strong><?=number_format($sum_total) ?></strong></td>                				
			  	<td></td>	
			  	      
			</tr>		
	</table>
<?php
mysql_close($conn);
 ?>
