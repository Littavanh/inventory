<?php htmltage("ບົດສະຫຼຸບປີ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }

 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ບົດສະຫຼຸບປີ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/yearly" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">
				                <div class="form-group">
				                  <label>ບົດສະຫຼຸບປີ</label>
				                   <select name="viewyear" class="form-control">  
										<option value="">ກະລຸນາເລືອກ</option>              
										<?php 
											$rs_zone = ViewMonth();
											while ($row_z = mysql_fetch_array($rs_zone,MYSQL_ASSOC)) {
												$selected = $row_z['viewyear'] == $_GET['viewyear'] ? "selected" : ""; 
										?>
										<option value="<?= $row_z['viewyear'] ?>" <?= $selected ?>><?= $row_z['viewyear'] ?></option>
										<?php } ?>
									</select>
				                </div>			                
			                </div>
			                 <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_yearly.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_yearly.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>	
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/yearly'">ຍົກເລີກ</button>
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
					<table id="example15" class="table table-bordered beautified_report">
						<thead>
							<tr>
							  	<th>ລຳດັບ</th>							  							  
							  	<th class="centered">ເດືອນ/ປີ</th>
							  	<th>ລາຍຮັບ</th>	
						        <th>ລາຍຈ່າຍ</th>
						        <th>ສ່ວນຕ່າງ</th>							        
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								$sum_recieve=  0;
								$sum_payment=  0;
								$sum_intensive=  0;
								while ($item = mysql_fetch_array($result)) { 								 
									$sum_recieve=  $sum_recieve+$item['income'];								
									$sum_payment=  $sum_payment+$item['payment'];
									$sum_intensive=  $sum_recieve-$sum_payment;								
							?>
								<tr>
									<td><?= ($i+$start) ?></td>
									<td align="center"><a href="index.php?d=report/monthly&viewmonth=<?=$item['view_month'].'/'.$item['view_year']?>"><?= $item['view_month'].'/'.$item['view_year'] ?></a>&nbsp;</td>
					                <td align="right"><?= number_format($item['income']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['payment']) ?>&nbsp;</td>
					                <td align="right"><?= number_format($item['income']-$item['payment']) ?>&nbsp;</td>				             
								</tr>
							<?php $i++; } ?>							      
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" align="right"><strong>ລວມ</strong></td>
								<td align="right"><strong><?= number_format($sum_recieve) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sum_payment) ?></strong>&nbsp;</td>
								<td align="right"><strong><?= number_format($sum_intensive) ?></strong>&nbsp;</td>
							</tr>
						</tfoot>							
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

