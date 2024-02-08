<?php htmltage("ລາຍງານ ສັງລວມລາຍຮັບ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍງານ ສັງລວມລາຍຮັບ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/revenue" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">
				                <div class="form-group">
				                  <label>ແຕ່ວັນທີ</label>
				                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>
				                  	<input type="text" name="startdate" class="form-control pull-right" id="datepicker1" autocomplete="off" data-date-format="yyyy-mm-dd" value = "<?=$_GET['startdate']  ?>">
				                  	</div>
				                </div>
				                <div class="form-group">
				                  <label>ເຖິງວັນທີ</label>
					                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>	
					                  	<input type="text" name="enddate" class="form-control pull-right" id="datepicker2" autocomplete="off" data-date-format="yyyy-mm-dd" value = "<?=$_GET['enddate']  ?>">
					                  </div>
				                </div>
			                </div>
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_revenue.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/revenue'">ຍົກເລີກ</button>
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
							  	<th>ເລກທີ</th>
							  	<th>ມູນຄ່າລວມ(ກີບ)</th>                
							  	<th>ສ່ວນຫຼຸດ(ກີບ)</th>  
							  	<th>ຮັບເງິນ(ກີບ)</th>  
							  	<th>ຮັບເງິນ(ບາດ)</th>  
							  	<th>ຮັບເງິນ(ໂດລາ)</th>  
							  	<th>ຮັບເງິນໂຕຈິງ(ກີບ)</th>  
						        <th>ຜູ້ຮັບ</th>
						        <th>ວັນທີເປີດ</th> 
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								$sum_total = 0;
								while ($item = mysql_fetch_array($result)) { 
								$sum_total = $sum_total + $item['pay_total_lak']; ?>
							<tr>
								<td align="center"><?= ($i+$start) ?></td>
								<td align="center"><?=$item['od_no'] ?></td>
								<td align="right"><?=number_format($item['total']) ?></td>
								<td align="right"><?=number_format($item['pay_total_lak']) ?></td>
								<td align="right"><?=number_format($item['pay_lak']) ?></td>
								<td align="right"><?=number_format($item['pay_thb']) ?></td>
								<td align="right"><?=number_format($item['pay_usd']) ?></td>
								<td align="right"><?=number_format($item['pay_total_lak']) ?></td>
								<td align="right"><?= $item['username'] ?></td>
								<td align="right"><?= $item['date_add'] ?></td>        
							</tr>    
							<?php $i++; } ?>							      
						</tbody>
						<tfoot>
							<tr>
							  <td colspan="6" class="centered"><strong>ສັງລວມລາຍຮັບ ແຕ່ວັນທີ່ <?=$_GET['startdate']?> ຫາ <?=$_GET['enddate']?></strong></td>
							  <td colspan="2" align="right"><strong><?=number_format($sum_total)?></strong></td>
							  <td></td>
							  <td></td>
					  		</tr>
						</tfoot>							
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>
