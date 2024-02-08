<?php htmltage("ການບໍລິການ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ການບໍລິການ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/service" />
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
				                	<label>ພະນັກງານ</label>
									<?php $rs_staff = Loaduser_staff(); ?>
									<select name="staff_id" class="form-control">
										<option value="0">-- ພະນັກງານທັງໝົດ --</option>
										<?php while ($row_c = mysql_fetch_array($rs_staff,MYSQL_ASSOC)) {
											$selected = $row_c['user_id'] == $_GET['staff_id'] ? "selected" : ""; 
										?>
											<option value="<?= $row_c['user_id'] ?>" <?= $selected ?>><?= $row_c['username'] ?></option>
										<?php } ?>
									</select> 							
				                </div>
			                </div>
			                <!-- 
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_service.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			
			                -->
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_service.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_service.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>		                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/service'">ຍົກເລີກ</button>
		            	<button type="submit" class="btn btn-primary">ຄົ້ນຫາ</button>
		            </div>
				</form>
			</div>
		</div>
	</div>
	<?php if ($catcount >0) { ?>
	<div class="row">
		<div class="col-md-12">
			<div class="box">
				<div class="box-body pad table-responsive">
					<table id="example1" class="table table-bordered beautified_report">
						<thead>
							<tr>
							  	<th>ລຳດັບ</th>
							  	<th>ເລກທີການຂາຍ</th>
							  	<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ປ່ອງການຂາຍ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>                
						        <th>ຜູ້ເປີດ</th>
						        <th>ວັນທີເປີດ</th> 
						        <th>ມູນຄ່າລວມ</th>    
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								$sum_total = 0;
								while ($item = mysql_fetch_array($result)) { 
									if ($item['status_id'] !='11') {
										$sum_total = $sum_total + $item['total']; }
								?>
							<tr>
								<td class="centered"><?= ($i+$start) ?></td>
								<td>
				                	<?= $item['od_no'] ?>&nbsp;&nbsp;&nbsp;&nbsp;
				                    <a href="?d=report/getvalue&od=<?=$item['od_no']?>&tbname=<?= $item['tb_name'] ?>&useradd=<?= $item['user_add_name'] ?>&dateadd=<?= $item['date_add'] ?>&svtbst=<?=$item['status_id'] ?>&state=<?=$item['status_text'] ?>" target="_blank">ລາຍລະອຽດ</a>&nbsp;&nbsp;&nbsp;&nbsp;
				                    <!-- <a href="print/bill_print.php?bill_order=<?=base64_encode($item['od_no']) ?>&svtbst=<?=$item['status_id'] ?>&state=<?=$item['status_text'] ?>" target="_blank">ພິມໃບບີນ</a>&nbsp;&nbsp;&nbsp;&nbsp; -->
				                    <a href="print/print-slip.php?bill_order=<?=base64_encode($item['od_no']) ?>&svtbst=<?=$item['status_id'] ?>&state=<?=$item['status_text'] ?>&infoID=<?=$item['info_id']?>" target="_blank">Slip</a>&nbsp;&nbsp;&nbsp;&nbsp;				                    
				                    <?=$item['status_text'] ?>
				                </td>
								<td align="center"><?= $item['tb_name'] ?></td>
								<td class="centered"><?= $item['user_add_name'] ?></td>
								<td class="centered"><?= $item['date_add'] ?></td>
				                <td align="right"><?php if ($item['status_id'] !='11') { echo number_format($item['total']); } else { echo 0; } ?>&nbsp;&nbsp;</td>                
							</tr>    
							<?php $i++; } ?>							      
						</tbody>
						<tfoot>
							<tr>
							  <td colspan="5" class="centered"><strong>ມູນຄ່າລວມ ແຕ່ວັນທີ່ <?=$_GET['startdate']?> ຫາ <?=$_GET['enddate']?></strong></td>
							  <td align="right"><strong><?=number_format($sum_total)?>&nbsp;ກີບ&nbsp;</strong></td>
					  		</tr>
						</tfoot>							
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>
