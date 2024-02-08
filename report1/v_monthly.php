<?php htmltage("ບົດສະຫຼຸບເດືອນ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$whereclause = " WHERE status_id IN (1,2,20)";
//$rs_status = selstatus($whereclause);
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ບົດສະຫຼຸບເດືອນ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/monthly" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">
				                <div class="form-group">
				                  <label>ບົດສະຫຼຸບເດືອນ</label>
				                   <select name="viewmonth" class="form-control">  
										<option value="">ກະລຸນາເລືອກ</option>              
										<?php 
											$rs_zone = ViewMonth();
											while ($row_z = mysql_fetch_array($rs_zone,MYSQL_ASSOC)) {
												$selected = $row_z['viewMonth'] == $_GET['viewmonth'] ? "selected" : ""; 
										?>
										<option value="<?= $row_z['viewMonth'] ?>" <?= $selected ?>><?= $row_z['viewMonth'] ?></option>
										<?php } ?>
									</select>
				                </div>			                
			                </div>
			                 <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_monthly.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_monthly.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>	
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/monthly'">ຍົກເລີກ</button>
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
							  	<th>ລາຍລະອຽດ</th>
							  	<th class="centered">ເດືອນ</th>
							  	<th class="centered">ປີ</th>
							  	<th>ມູນຄ່າ(ກີບ)</th>	
						        <th>ໝາຍເຫດ</th>							        
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								$sum_recieve=  0;
								while ($item = mysql_fetch_array($result)) { 
								if ($item['type_income']==1) {
									$sum_recieve=  $sum_recieve+$item['sum_amount'];
								} else if ($item['type_income']==2) {
									$sum_recieve=  $sum_recieve-$item['sum_amount'];
								}
							?>
								<tr>
									<td><?= ($i+$start) ?></td>
									<td ><?= $item['reportDetail'] ?></td>
									<td align="center"><?= $item['view_month'] ?>&nbsp;</td>
									<td align="center"><?= $item['view_year'] ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['sum_amount']) ?>&nbsp;</td>
					                <td align="left"><?= $item['remark'] ?>&nbsp;</td>					             
								</tr>
							<?php $i++; } ?>							      
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>ຍອດຍັງເຫຼືອ</strong></td>
								<td align="right"><strong><?= number_format($sum_recieve) ?></strong>&nbsp;</td>
								<td align="right">&nbsp;</td>
							</tr>
						</tfoot>							
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

