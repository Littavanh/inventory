<?php 
	require_once("../indexCode.php"); 
	$wharecause=$_GET['GetInfoID']; 

	function selUnit($wharecause) {
		return mysql_query("select * from tb_unit WHERE status_id=3 and info_id = '$wharecause' order by unitID ");
	}

	?>
<label>ຫົວໜ່ວຍ(3)</label>
<select name="unit3" class="form-control">                
	<option value="" >--------</option>
	<?php 
		$rsM1 = selUnit($wharecause);
		while ($row_c = mysql_fetch_array($rsM1,MYSQL_ASSOC)) {
			$selected = $row_c['unitID'] == $_SESSION["EDPOSV1MADD_unit3"] ? "selected" : ""; 
	?>
	<option value="<?= $row_c['unitID'] ?>" <?= $selected ?>><?= $row_c['unitName'] ?></option>
	<?php } ?>
</select>
