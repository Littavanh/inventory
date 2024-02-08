<?php
session_start();
require_once("../config.php");
require_once("m_leave.php");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$result_report = LoadLeaveHistory($whereclause);
$date = date('d-m-Y');
$output_filename = "Leave".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍການສິນຄ້າຝາກ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
							  	<th>ລຳດັບ</th>
							  	<th>ເລກລະຫັດ</th>
								<th>ຊື່ຜູ້ຝາກ</th>
								<th>ເບີໂທ</th>								       
								<th>ວັນທີຝາກ</th>										  	
								<th>ລາຍການຝາກ</th>	
								<th>ຈ/ນ ຝາກ</th>	
								<th>ຜູ້ບັນທຶກ</th>
								<th>ຜູ້ເບີກ</th>										
								<th>ວັນທີເບີກ</th>	
								<th>ໝາຍເຫດ</th>	
								<th>ໝົດກໍານົດ</th>
								<th>ສະຖານະ</th>	
	  </tr>
		<?php 			
			$i=1;
								while ($item = mysql_fetch_array($result)) { 
									$status_text = "";						
								if ( $item['status_id']==2) {									 
									$status_text = "ເບີກແລ້ວ";
								} else if ($item['status_id']==3) {  									 
									$status_text = "ໝົດກໍານົດ";
								} else {									 
									$status_text = "ຍັງບໍ່ທັນເບີກ";
								}
							?>
			<tr>
									<td class="centered"><?= ($i+$start) ?></td>
									<td><?= $item['leave_no'] ?></td>
									<td><?= $item['cus_name'] ?></td>
									<td><?= $item['cus_tel'] ?></td>
									<td><?= $item['date_leave'] ?></td>
									<td style="word-break:break-all;"><?= $item['item_name'] ?></td>
									<td align="right"><?= number_format($item['l_item_Qty']) ?>&nbsp;</td>
									<td><?= $item['user_add'] ?></td>
									<td><?= $item['r_user_add'] ?></td>
									<td><?= $item['r_date_add'] ?></td>
									<td style="word-break:break-all;"><?= $item['reason_remark'] ?></td>
									<td><?= $item['date_expire'] ?></td>
									<td><?= $status_text ?></td>
			</tr>
		<?php $i++; } ?>	
	</table>
<?php
mysql_close($conn);
 ?>
