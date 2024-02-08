<?php
session_start();
 htmltage("ລາຍການສິນຄ້າ");
if (($_SESSION['EDPOSV1CurStockStatus'] == 2) || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<body onLoad="document.fcalulate.paid_kip.focus()">
<div id="cover">
	<div id="dialogparent">
		<div class="mask"></div>
		<div id="dialog">
			<h1 class="h1 centered">ລາຍການສິນຄ້າ ກໍານົດປະເພດສິນຄ້າທີ່ແຖມ</h1>
			<form method = "post" name="fcalulate">
				<div class="col-md-12">	
					<table id="example1" class="table table-bordered table-hover beautified">
						<thead>
							<tr>
								<th class="centered">#</th>
								<th >ລະຫັດສະນຄ້າ</th>
								<th >ຊື່ສິນຄ້າ</th>	  	
							</tr>
						</thead>
						<tbody>
							<?php 
								$i = 1; 
								$wherecase="";
								$result = LoadItemList($infoID);
								while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
							<tr>
								<td class="centered">
									<input type="checkbox" name="cbSel[]" id="cbSel<?=$i ?>" value="<?=$row['fd_id']?>" >
									<input type="hidden" name="type[]" class="type" value="unchanged" />
									<input type="hidden" name="id[]"  value="<?=$row['fd_id']?>" />
									<input type="hidden" name="fd_Barcode[]"  value="<?=$row['fd_Barcode']?>" />
									<input type="hidden" name="fd_name[]"  value="<?=$row['fd_name']?>" />
								</td>
								<td align="left"><?= $row['fd_Barcode'] ?></td>
								<td align="left"><?= $row['fd_name'] ?></td>				
							</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
				</div>
				<div class="col-md-12">			
						<div class="form-group menubox" align='left'>
							<input type="submit" name ="btncancel" class = "btn btn-app" value="     &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;     " />
				        	<input type="submit" name="btnSaveFree" class= "btn btn-app" style="color:#FFF; background:#00a65a; border:#008d4c" value = "ເພີ່ມກໍານົດ ສິນຄ້າທີ່ແຖມ"  />
				        	
				        	<a href="<?=$urlRefresh ?>" class="btn btn-app">
				                <i class="fa fa-repeat"></i> Refresh
				              </a>
						</div>				 
				</div>	
			</form>
		</div>
	</div>
</div>
</body>