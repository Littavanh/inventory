<?php 
	require_once("../indexCode.php"); 
	$wharecause=$_GET['GetInfoID']; 

	function selInfoTran($wharecause) {
		return mysql_query(" select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1) and info_id <> '$wharecause'  ");
	}
	?>
<label>ໂອນໄປ ສາງ</label>
<select name="txtinfoIDT" class="form-control">       
	<option value="">-- ເລືອກສາງຮັບສິນຄ້າ --</option>	         
	<?php 
		$rsM1 = selInfoTran($wharecause);
		while ($row_c = mysql_fetch_array($rsM1,MYSQL_ASSOC)) {
			$selected = $row_c['info_id'] == $_SESSION["EDPOSV1MADD_infoIDT"] ? "selected" : ""; 
	?>
	<option value="<?= $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
	<?php } ?>
</select>
