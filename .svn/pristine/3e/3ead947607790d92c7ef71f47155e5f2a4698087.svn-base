<?php 
session_start();
//include_once("function_sel.php");
htmltage("ຂໍ້ມູນຜູ້ໃຊ້");
?>
 <script type="text/javascript" src="js/calculate.js"></script>
<section class="content-header">
    <h1>ຂໍ້ມູນຜູ້ໃຊ້</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"></h3>
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
				</div>				
				<form method="post" id="frmguesthouse" action="?d=profile/profile" enctype="multipart/form-data">
					<?php
						$rsUser = LoadAllUser($user_id); 
						while($row = mysql_fetch_array($rsUser, MYSQL_ASSOC)){
							if ($row['role_id'] == '1') {
								$RoleName = 'Super user';
							} else if ($row['role_id'] == '2') {
								$RoleName = 'Administrator';
							} else if ($row['role_id'] == '3') {
								$RoleName = 'Manage';
							} else if ($row['role_id'] == '4') {
								$RoleName = 'Sale';
							} else if ($row['role_id'] == '5') {
								$RoleName = 'Stock';
							}
					?>
					<div class="box-body">
						<div class="row">
							<dir class="col-md-6">
								<div class="form-group">
				                  <label>ຊື່ເຂົ້າໃຊ້</label>
				                  <input type="hidden" name="txtUserID" class="form-control" value="<?=$user_id ?>" />
				                  <input type="text" name="txtUsername" class="form-control" value="<?=$row['username'] ?>" readonly />
				                </div>
				                <div class="form-group">
				                  <label>ຊື່</label>
				                  <input type="text" name="txtfirst_name" class="form-control" value="<?=$row['first_name'] ?>" />
				                </div>
				                 <div class="form-group">
				                  <label>ນາມສະກຸນ</label>
				                  <input type="text" name="txtlast_name" class="form-control" size = "60" value="<?=$row['last_name'] ?>" />
				                </div>
				                <div class="form-group">
				                  <label>ສິດການເຂົ້າໃຊ້</label>
				                  <input type="text" name="txtrole_name" size = "60" class="form-control" value="<?=$RoleName ?>" readonly />
				                </div>				                
							</dir>
							<dir class="col-md-6">							 
				                <div class="form-group">				                  	
				                  	<img class="" src="<?= 'users_pic/'.$row['pic'] ?>" alt="User Avatar" height="200" width="200" >
				                </div>
				                <div class="form-group">
				                  	<label>ຮູບ</label>
				                    <input name="fileUpload" type="file" class="form-control"  >
				                </div>				                
							</dir>
			            </div>
					</div>
					<?php } ?>
					<?php if(isset($_SESSION['EDPOSV1role_id'])){ ?>
						<div class="box-footer">
			            	<input type="submit" name="btnsave_info" class= "btn btn-primary" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
				            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">ປ່ຽນລະຫັດຜ່ານ</button>				                
			            </div>
		            <?php } ?>	
				</form>
				<form method="post" id="UpdatePassword" action="?d=profile/profile" enctype="multipart/form-data">
				 <div class="modal fade" id="modal-default">
			          <div class="modal-dialog">
			            <div class="modal-content">
			              <div class="modal-header">
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                  <span aria-hidden="true">&times;</span></button>
			                <h4 class="modal-title">ປ່ຽນລະຫັດຜ່ານ</h4>
			              </div>
			              <div class="modal-body">			                 
			                 	<div class="form-group">
				                  <label>ລະຫັດຜ່ານເກົ່າ</label>
				                  <input type="password" name="txtOldPassword" class="form-control" size = "60" value="" required />
				                </div>
				                <div class="form-group">
				                  <label>ລະຫັດຜ່ານໃໝ່</label>
				                  <input type="password" name="txtNewpassword" class="form-control" size = "60" value="" required />
				                </div>
				                <div class="form-group">
				                  <label>ຢໍ້າຄືນລະຫັດຜ່ານໃໝ່</label>
				                  <input type="password" name="txtConfirm" class="form-control" size = "60" value="" required />
				                </div>
			              </div>
			              <div class="modal-footer">
			                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">ປິດ</button>
			                <button type="submit" name="btResetPWD" class="btn btn-primary">ປ່ຽນລະຫັດຜ່ານ</button>
			              </div>
			            </div>
			            <!-- /.modal-content -->
			          </div>
			          <!-- /.modal-dialog -->
			        </div>
			        <!-- /.modal -->
        		</form>
			</div>
		</div>
	</div>
</section>

