<?php
session_start();
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
require_once("../config.php");
require_once("m_sum.php");

$date = date('Y-m-d');
$output_filename = "Sum".$date.".xls";
// Redirect the output to the stream
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$output_filename}");

echo "<h4>ລາຍງານ ສ່ວນຕ່າງ  ປະຈໍາວັນທີ່ ".$_GET['startdate']." ຫາ ".$_GET['enddate']."</h4> ";
echo "<table border='1'> \n";
?>
		<tr bgcolor='#8EE5EE' >
			<th>ລາຍຮັບ(ກີບ)</th>
			<th>ລາຍຈ່າຍ(ກີບ)</th>                
			<th>ສ່ວນຕ່າງ(ກີບ)</th> 
        </tr>             	  	
			<tr>
				<td align="right"><?=number_format($SumIncome) ?></td>
				<td align="right"><?=number_format($SumPayment) ?></td>
				<td align="right"><?=number_format($SumIncome - $SumPayment) ?></td>		    
			</tr>    		
	</table>
<?php
mysql_close($conn);
 ?>
