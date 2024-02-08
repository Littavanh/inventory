<?php 
	require_once("../indexCode.php"); 
	$wharecause=$_GET['GetInfoID']; 

	function selkindfood($wharecause) {
		return mysql_query("select * from tb_kind_food WHERE status_id=3 and info_id = '$wharecause' order by kf_id  ");
	}
	$_SESSION["EDPOSV1KFSEL_info_id"] = $wharecause;

	?>
	<label>Filter</label>
<select name="kf_id" class="form-control" onchange="document.location='?d=manage/price_setting&kf_id='+this.value">    
	<option value="">ເລືອກກຸ່ມສິນຄ້າ</option>            
	<?php 
		$rs_kf = selkindfood($wharecause);
		while ($row_c = mysql_fetch_array($rs_kf,MYSQL_ASSOC)) {
			$selected = $row_c['kf_id'] == $_SESSION["EDPOSV1MADD_kf_id"] ? "selected" : ""; 
	?>
		<option value="<?= $row_c['kf_id'] ?>" <?= $selected ?>><?= $row_c['kf_name'] ?></option>
	<?php } ?>
</select>
