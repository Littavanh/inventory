<?php
session_start();
require_once("../config.php");
require_once("m_sum_menu.php");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$date = date('Y-m-d');
$output_filename = "summary_menu".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງານເມນູທີ່ຂາຍ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
<style type="text/css">
<!--
.style1 {font-weight: bold}
-->
</style>
		<tr bgcolor='#8EE5EE' >
	  	<th>ລຳດັບ</th>           
        <th>ອາການ ແລະ ສິນຄ້າດື່ມ</th>
        <th>ຈໍານວນ</th> 
        <th>ລວມ ຂາຍ</th> 
		<th>ລວມ ຕົ້ນທຶນ</th>
		<th>ລວມ ສ່ວນຕ່າງ</th>  
        </tr>             	  	
	 <?php 			
			$i=1;
			$sum_total = 0;
			$sum_cub=0;
			$result_service_ex = Loadservice_sumary($whereclause);
			while ($item = mysql_fetch_array($result_service_ex)) { 
			$sum_total = $sum_total + $item['total']; 
			$sum_total_cost = $sum_total_cost + $item['total_cost']; 
			$whereGroupID = $item['kf_name'];	
			?>
			<tr>
				<td bgcolor="#00FFFF" class="centered style1">
		      	<div align="center"><?= ($i+$start) ?></div><div align="center"></div></td>				
				<td bgcolor="#00FFFF" class="centered"><strong><?= $item['kf_name'] ?></strong></td>
				<td bgcolor="#00FFFF" class="centered"><div align="right"><strong><?= $item['qty'] ?></strong></div></td>
                <td bgcolor="#00FFFF" align="right"><strong><?=number_format($item['total']) ?>&nbsp;&nbsp;</strong></td>
                <td bgcolor="#00FFFF" align="right"><strong><?=number_format($item['total_cost']) ?>&nbsp;&nbsp;</strong></td>                
				<td bgcolor="#00FFFF" align="right"><strong><?=number_format($item['total']-$item['total_cost']) ?>&nbsp;&nbsp;</strong></td>                  
			</tr>  
			<?php
				$j=1;				
				$result_detail = LoadMenuDetail($whereclause, $whereGroupID);
				while ($itemD = mysql_fetch_array($result_detail)) {
					if ($itemD['count_cm']==1) {
						$sum_cub=$sum_cub+$itemD['qty'];
					}
			?>  
				<tr>
					<td class="centered"><div align="right"><?= ($i+$start).'.'.$j ?></div></td>				
					<td class="centered"><div align="left"><?= $itemD['fd_name'] ?></div></td>
					<td class="centered"><?= $itemD['qty'] ?></td>
	                <td align="right"><?=number_format($itemD['total']) ?>&nbsp;&nbsp;</td>   
	                <td align="right"><?=number_format($itemD['total_cost']) ?>&nbsp;&nbsp;</td>                
					<td align="right"><?=number_format($itemD['total']-$itemD['total_cost']) ?>&nbsp;&nbsp;</td>             
				</tr>
			<?php 
				$j++; }
				$i++; } 
			?>
			<tr>
				<td colspan="2" class="centered"><strong>ມູນຄ່າລວມ ແຕ່ວັນທີ່ <?=$_GET['startdate']?> ຫາ <?=$_GET['enddate']?></strong></td>
				<td align="right"><strong><?=number_format($sum_cub)?>&nbsp;&nbsp;</strong></td>
				<td align="right"><strong><?=number_format($sum_total)?>&nbsp;ກີບ&nbsp;</strong></td>
				<td align="right"><strong><?=number_format($sum_total_cost)?>&nbsp;ກີບ&nbsp;</strong></td>
				<td align="right"><strong><?=number_format($sum_total-$sum_total_cost)?>&nbsp;ກີບ&nbsp;</strong></td>
	  </tr>  
	</table>
<?php
mysql_close($conn);
 ?>
