<?php htmltage("ລາຍງາຍການຮັບເງິນ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
$whereclause = " WHERE status_id IN (1,2,20)";
//$rs_status = selstatus($whereclause);
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍງາຍການຮັບເງິນ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/cash_log" />
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
									<p class="right"><a href="report/ex_cash_log.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_cash_log.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>	
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/cash_log'">ຍົກເລີກ</button>
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
							  	<th>ເລກທີ</th>
							  	<th>ມູນຄ່າໃບບີນ(ກີບ)</th>	
							  	<th>ສ່ວນຫຼຸດ(ກີບ)</th>	
						        <th>ຈ່າຍ(ກີບ)</th>	
						        <th>ຈ່າຍ(ໂດລາ)</th>
						        <th>ຈ່າຍ(ບາດ)</th>
						        <th>ອັດຕາແລກປ່ຽນ<br/>ໂດລາ | ບາດ</th>
						        <th>ເງິນທອນ(ກີບ)</th>
						        <th>ລວມຮັບ(ກີບ)</th>
						        <th>ໝາຍເຫດ</th>	
						        <th>ຜູ້ຮັບ</th>
						        <th>ວັນທີຮັບ</th>  
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								$sumDis_LAK = 0;
								$sumPay_LAK = 0;
								$sumPay_USD = 0;
								$sumPay_THB = 0;
								$sumPayTotal_LAK = 0;
								$sumBill_LAK = 0;
								$sumChange = 0;
								while ($item = mysql_fetch_array($result)) { 
									$sumDis_LAK = $sumDis_LAK + $item['discount_lak'];
									$sumPay_LAK = $sumPay_LAK + $item['pay_lak'];
									$sumPay_USD = $sumPay_USD + $item['pay_usd'];
									$sumPay_THB = $sumPay_THB + $item['pay_thb'];

									/*$returnMoney = ($item['pay_total_lak']+$item['discount_lak']) - ($item['bill_total']-$item['discount_lak']);
									if ($returnMoney <=0) {										
										$returnMoney =0;
									} */

									$returnMoney = $item['bill_change'];
									$sumChange = $sumChange + $returnMoney;
									$sumBill_LAK = $sumBill_LAK + $item['bill_total'];
									/*$SetTotalPay = $item['pay_total_lak']+$item['discount_lak']-$returnMoney; */
									$SetTotalPay = $item['receive_lak'];
									$sumPayTotal_LAK = $sumPayTotal_LAK + $SetTotalPay;

									
							?>
								<tr>
									<td class="centered"><?= ($i+$start) ?></td>
									<td class="centered"><?= $item['od_no'] ?></td>
									<td align="right"><?= number_format($item['bill_total']) ?>&nbsp;</td>
									<td align="right"><?= number_format($item['discount_lak']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['pay_lak']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['pay_usd']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['pay_thb']) ?>&nbsp;</td>
					                <td align="center"><?= number_format($item['usd'])." | ".number_format($item['thb']) ?></td>
					                <td align="right"><?=number_format($returnMoney) ?>&nbsp;</td>
					                <td align="right"><?= number_format($SetTotalPay) ?>&nbsp;</td>
					                <td><?= $item['remark'] ?></td>
									<td class="centered"><?= $item['username'] ?></td>
									<td class="centered"><?= $item['date_add'] ?></td>
								</tr>
							<?php $i++; } ?>							      
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" class="centered"><strong>ລວມ</strong></td>
								<td align="right"><strong><?= number_format($sumBill_LAK) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sumDis_LAK) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sumPay_LAK) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sumPay_USD) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sumPay_THB) ?></strong>&nbsp;</td>
								<td></td>
								<td align="right"><strong><?= number_format($sumChange) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sumPayTotal_LAK) ?></strong>&nbsp;</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tfoot>							
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

