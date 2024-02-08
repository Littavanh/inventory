<?php
session_start();
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
require_once("../config.php");
require_once("m_service.php");

$date = date('Y-m-d');
$output_filename = "service_summary".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍການບໍລິການ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
	  	<th>ລຳດັບ</th>
	  	<th>ເລກທີການຂາຍ</th>
	  	<th>ປ່ອງການຂາຍ</th>                
        <th>ຜູ້ເປີດ</th>
        <th>ວັນທີເປີດ</th> 
        <th>ມູນຄ່າລວມ</th>
        </tr>             	  	
	 <?php 			
			$i=1;
			$sum_total = 0;
			$result_service_ex = Loadservice_sumary($whereclause);
			while ($item = mysql_fetch_array($result_service_ex)) { 
				if ($item['status_id'] !='11') {
					$sum_total = $sum_total + $item['total']; }
			//$sum_total = $sum_total + $item['total']; 

			?>
			<tr>
				<td class="centered"><?= ($i+$start) ?></td>
				<td><?= $item['od_no'] ?></td>
				<td align="center"><?= $item['tb_name'] ?></td>
				<td class="centered"><?= $item['user_add_name'] ?></td>
				<td class="centered"><?= $item['date_add'] ?></td>
                <td align="right"><?php if ($item['status_id'] !='11') { echo number_format($item['total']); } else { echo 0; } ?>&nbsp;&nbsp;</td>                
			</tr>    
		<?php 
			$i++; } ?>
			<tr>
			  <td colspan="5" class="centered"><strong>ມູນຄ່າລວມ ແຕ່ວັນທີ່ <?=$_GET['startdate']?> ຫາ <?=$_GET['enddate']?></strong></td>
			  <td align="right"><strong><?=number_format($sum_total)?>&nbsp;ກີບ&nbsp;</strong></td>
	  </tr>  
	</table>
<?php
mysql_close($conn);
 ?>
