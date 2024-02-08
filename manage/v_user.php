<?php
session_start();
//include_once("function_sel.php");
htmltage("ລາຍການຜູ້ເຂົ້າໃຊ້");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] > 2) {
	header("Location: ?d=index");
}
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>

<section class="content-header">
	<h1>ລາຍການຜູ້ເຂົ້າໃຊ້</h1>
</section>


<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<p><?= $success ?></p>
					<p class="errormessage"><?= $exist ?></p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="box-body pad table-responsive">
							<form method="post" id="editable" action="?d=manage/user">
								<table id="example1" class="table table-bordered table-hover beautified editable">
									<thead>
										<tr>
											<th>ລ/ດ</th>
											<th>User Id</th>
											<th>ຊື່ເຂົ້າໃຊ້</th>
											<th>ຊື່</th>
											<th>ນາມສະກຸນ</th>
											<th>ສິດການເຂົ້າໃຊ້</th>
											<th>ສາງ</th>
											<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] <= 2) { ?>
												<th>Reset</th>
												<th>ລຶບ</th>
											<?php } ?>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
										while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {  ?>
											<tr>
												<td class="centered">
													<span><?= ($i + $start) ?></span>
													<input type="hidden" name="type[]" class="type" value="unchanged" />
													<input type="hidden" name="user_id_form[]" value="<?= $row['user_id'] ?>" />
												</td>
												<td>
												<input type="text" name="userId_form[]" size="" value="<?= $row['user_id'] ?>" />
												</td>
												<td>
													<input type="text" name="username_form[]" size="" value="<?= $row['username'] ?>" />
													<label class="hidden"><?= $row['username'] ?></label>
												</td>
												<td>
													<input type="text" name="first_name_form[]" size="" value="<?= $row['first_name'] ?>" />
													<label class="hidden"><?= $row['first_name'] ?></label>
												</td>
												<td>
													<input type="text" name="last_name_form[]" size="" value="<?= $row['last_name'] ?>" />
													<label class="hidden"><?= $row['last_name'] ?></label>
												</td>
												<td>
													<select name="role_id_form[]">
														<?php
														$rs_user = selUser_role();
														while ($row_cc = mysql_fetch_array($rs_user, MYSQL_ASSOC)) {
															$selected = $row_cc['role_id'] == $row['role_id'] ? "selected" : "";
														?>
															<option value="<?= $row_cc['role_id'] ?>" <?= $selected ?>><?= $row_cc['role_name'] ?></option>
														<?php } ?>
													</select>
												</td>

												<td>
													<select name="infoIDSel[]">
														<?php
														$rs_Company = LoadCompanyProfile();
														while ($row_cc = mysql_fetch_array($rs_Company, MYSQL_ASSOC)) {
															$selected = $row_cc['info_id'] == $row['info_id'] ? "selected" : "";
														?>
															<option value="<?= $row_cc['info_id'] ?>" <?= $selected ?>><?= $row_cc['info_name'] ?></option>
														<?php } ?>
													</select>
												</td>
												<?php if (isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] <= 2) { ?>
													<td class="centered adjust"><a href="?d=manage/user&reset=<?php echo base64_encode($row["user_id"] . "tasoksavhay"); ?>&user=<?= $row['username'] ?>" onclick="return confirm('ທ່ານຕ້ອງການ Reset Password ແທ້ບໍ...?')">Reset (123456)</a> </td>

													<td class="centered adjust"><a href="?d=manage/user&del_id=<?php echo base64_encode($row["user_id"] . "tasoksavhay"); ?>" onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a> </td>
												<? } ?>
											</tr>
										<?php $i++;
										} ?>
									</tbody>
								</table>
								<?php if ($_SESSION['EDPOSV1role_id'] <= 3) { ?>
									<div class="box-footer">
										<input type="button" id="adduser" class="btn btn-primary" value="  &#3776;&#3742;&#3765;&#3784;&#3745;  " />
										<input type="button" id="reset" class="btn btn-default" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " />
										<input type="submit" class="btn btn-success right" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  " id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')" />
									</div>
								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

</div>
<table class="template hidden" id="tab">
	<tr>
		<td class="centered">
			<span></span>
			<input type="hidden" name="type[]" class="type" value="added" />
			<input type="hidden" name="id[]" />
			<input type="hidden" name="user_id_form[]" />
		</td>

		<td class="adjust"><input type="text" name="userid_form[]" size="" value="" /></td>
		<td class="adjust"><input type="text" name="username_form[]" size="" value="" /></td>
		<td class="eqcodecols itemcode"><input type="text" name="first_name_form[]" size="" value="" /></td>
		<td class="eqcodecols itemcode"><input type="text" name="last_name_form[]" size="" value="" /></td>
		<td class="eqcodecols itemcode">
			<select name="role_id_form[]">
				<?php
				$rs_user = selUser_role();
				while ($row_cc = mysql_fetch_array($rs_user, MYSQL_ASSOC)) {
					$selected = $row_cc['role_id'] == $_GET['role_id'] ? "selected" : "";
				?>
					<option value="<?= $row_cc['role_id'] ?>"><?= $row_cc['role_name'] ?></option>
				<?php } ?>
			</select>
		</td>

		<td>
			<select name="infoIDSel[]">
				<?php
				$rs_Company = LoadCompanyProfile();
				while ($row_cc = mysql_fetch_array($rs_Company, MYSQL_ASSOC)) {

				?>
					<option value="<?= $row_cc['info_id'] ?>"><?= $row_cc['info_name'] ?></option>
				<?php } ?>
			</select>
		</td>
		<td>Reset (123456)</td>
		<td class="centered adjust"><i class="fa fa-trash-o delete1"></td>
	</tr>
</table>