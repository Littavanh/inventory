<?php
session_start();
require_once("../config.php");
require_once("m_openbalance.php");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }

 
$date = date('Y-m-d');
$output_filename = "Open balance".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງານ ເປີດ/ປິດກະ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr >
							  	<th>ລຳດັບ</th>	  								  
							  	<th>ວັນທີ່ເປີດ</th>
							  	<th>ໝາຍເຫດການເປີດ</th>
							  	<th>ຜູ້ເປີດ</th>
							  	<th>ວັນທີ່ປິດ</th>	  							        						          
						        <th>ໝາຍເຫດການປິດ</th>		
						        <th>ຜູ້ປິດ</th>		       	  	
	  </tr>
							<?php 			
								$i=1;								
								while ($item = mysql_fetch_array($SumResult)) { 								
							?>
			<tr>
								<td class="centered"><?= ($i+$start) ?></td>								
								<td><?= $item['datetimeopen'] ?></td>
								<td><?= $item['remark'] ?></td>
								<td><?= $item['username'] ?></td>
								<td><?= $item['datetimeclose'] ?></td>
								<td><?= $item['remark_close'] ?></td>
								<td><?= $item['usernameC'] ?></td> 								
							</tr>	
			<?php 
				$i++; } 
			?>
	</table>
<?php
mysql_close($conn);
 ?>
