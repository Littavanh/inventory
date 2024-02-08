<?php
session_start();
require_once("../config.php");
require_once("m_table.php");
$result_report = LoadTable($whereclause);
$date = date('Y-m-d');
$output_filename = "table_list".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍການໂຕະ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
	  	<th>ລຳດັບ</th>
	  	<th>ຊື່ໂຕະ</th>
	  	<th>ສະຖານະ</th>	  	
        <th>ຜູ້ເພີ່ມ</th>
        <th>ວັນທີເພີ່ມ</th>     
        <th>ຜູ້ແກ້ໄຂ</th>
        <th>ວັນທີແກ້ໄຂ</th>             	  	
	  </tr>
		<?php 

			$i=1;
			while ($item = mysql_fetch_array($result_report)) { ?>
			<tr>
				<td><?= ($i+$start) ?></td>
				<td><?= $item['tb_name'] ?></td>
				<td><?= $item['status_text'] ?></td>
				<td><?= $item['user_add_name'] ?></td>
				<td><?= $item['date_add'] ?></td>
				<td><?= $item['user_edit_name'] ?></td>
				<td><?= $item['date_edit'] ?></td>
			</tr>
		<?php $i++; } ?>
	</table>
<?php
mysql_close($conn);
 ?>
