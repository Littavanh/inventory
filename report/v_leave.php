<?php htmltage("ລາຍການສິນຄ້າຝາກ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$whereclause = " WHERE status_id IN (1,2,20)";
//$rs_status = selstatus($whereclause);
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍການສິນຄ້າຝາກ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/leave" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">
				                <div class="form-group col-md-6">
				                  <label>ແຕ່ວັນທີ</label>
				                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>
				                  	<input type="text" name="startdate" class="form-control pull-right" id="datepicker1" autocomplete="off" data-date-format="yyyy-mm-dd" value = "<?=$_GET['startdate']  ?>">
				                  	</div>
				                </div>
				                <div class="form-group col-md-6">
				                  <label>ເຖິງວັນທີ</label>
					                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>	
					                  	<input type="text" name="enddate" class="form-control pull-right" id="datepicker2" autocomplete="off" data-date-format="yyyy-mm-dd" value = "<?=$_GET['enddate']  ?>">
					                  </div>
				                </div>		
				                <?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
				                 <div class="form-group col-md-6">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" >
										<option value="0">-- ເລືອກທັງໝົດ --</option>
											<?php 
												$rs_info = LoadInfo();
												while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : ""; 
											?>
												<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
											<?php } ?>
									</select>
					            </div>    	
				                <?php } else { ?>
				                	<div class="form-group col-md-6">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" >
										<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
									</select>
					            </div>    	
				                <?php } ?>	
				                <div class="form-group col-md-6">
					                <label>ສະຖານະ</label>
					                <select class="form-control" name="status" >			
										<?php 
												for ($x = 0; $x <= 3; $x++) {
												    $selected = $x == $_GET['status'] ? "selected" : ""; 
												    if ($x==0) {
												    	$y = "---ທັງໝົດ---";
												    } else if ($x==1) {
												    	$y = "ຍັງບໍ່ທັນເບີກ";
												    } else if ($x==2) {
												    	$y = "ເບີກແລ້ວ";
												    } else if ($x==3) {
												    	$y = "ໝົດກໍານົດ";
												    }
											?>
												<option value="<?=$x?>" <?= $selected ?>><?=$y?></option>
											<?php } ?>
									</select>
					            </div>    	                
			                </div>
			                <!--
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_cash_log.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			                
			                 -->
			                 <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_leave.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_leave.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>	
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/leave'">ຍົກເລີກ</button>
		            	<button type="submit" class="btn btn-primary">ຄົ້ນຫາ</button>
		            </div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body pad table-responsive">
					<table id="example1" class="table table-bordered beautified_report">
						<thead>
							<tr>
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
						</thead>
						<tbody>						
							<?php 			
								$i=1;								
								while ($item = mysql_fetch_array($result)) { 		
									$status_text = "";						
								if ( $item['status_id']==2) {
									echo "<tr style='background-color:#6FC'>";
									$status_text = "ເບີກແລ້ວ";
								} else if ($item['status_id']==3) {  
									echo "<tr style='background-color:#999' >";
									$status_text = "ໝົດກໍານົດ";
								} else {
									echo "<tr>";
									$status_text = "ຍັງບໍ່ທັນເບີກ";
								} 	?>	
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
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

