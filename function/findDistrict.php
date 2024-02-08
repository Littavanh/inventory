<?php 
	require_once("../indexCode.php"); 
	$wharecause=$_GET['GetProID']; 

	function LoadDistrict($wharecause) {
		return mysql_query("select * from tb_district WHERE proID= '$wharecause' ");
	}?>
<select name="districtID[]" required>
<?php 			
	$rsSelAcc = LoadDistrict($wharecause);
	while ($row_c = mysql_fetch_array($rsSelAcc,MYSQL_ASSOC)) {			
?>
	<option value="<?=$row_c['districtID'] ?>" <?=$selected?>><?=$row_c['districtName'] ?></option>
<?php } ?>
</select> 

