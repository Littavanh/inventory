<?php htmltage("ລາຍງານສິນຄ້າໃກ້ໝົດອາຍຸ"); ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍງານສິນຄ້າໃກ້ໝົດອາຍຸ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/material_exp" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">				               
				                <div class="form-group">
				                  <label>ເຖິງວັນທີ</label>
					                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>	
					                  	<input type="hidden"  name="startdate" size="12" value = "<?=$result_open?>" readonly />
					                  	<input type="text" name="enddate" class="form-control pull-right" id="datepicker2" autocomplete="off" data-date-format="yyyy-mm-dd" 
					                  	value = "<?php if (isset($_GET['enddate'])) { echo $_GET['enddate']; } else { echo date('Y-m-d'); }?>">
					                  </div>
				                </div>				                
			                </div>
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_material_exp.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/material_exp'" >ຍົກເລີກ</button>
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
							  	<th>ຊື່ ສິນຄ້າ</th>
							  	<th>ຈໍານວນ(1)</th>	  	
						        <th>ຈໍານວນ(2)</th>
						        <th>ຈໍານວນ(3)</th>     
						        <th>ວັນທີ່ຮັບເຂົ້າ</th>   
						        <th>ວັນທີ່ໝົດອາຍຸ</th>	
							</tr>
						</thead>
						<tbody>						
							<?php 			
							$i=1;
							while ($item = mysql_fetch_array($SumResult)) { 
								$whereGroupID = $item['materialID'];
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = 0;
									$cvgroup22 = 0;
								if  ($item['cap1'] !=0){
									$cvgroup11 = $item['unitQty3']%$item['cap1'];
									$cvgroup12 = ($item['unitQty3']-($cvgroup11))/$item['cap1'];
									$cvgroup21 = $cvgroup11%$item['cap2'];
									$cvgroup22 = ($cvgroup11 - $cvgroup21)/$item['cap2'];
								} else if ($item['cap2'] !=0) {
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = $item['unitQty3']%$item['cap2'];
									$cvgroup22 = ($item['unitQty3'] - $cvgroup21)/$item['cap2'];					
								} else if ($item['cap3'] !=0) {
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = $item['unitQty3'];
									$cvgroup22 = 0;
								}								
							?>
							<tr>
								<td class="centered"><?= ($i+$start) ?></td>								
								<td><?= $item['materialName'] ?></td>
								<td align="right"><?= number_format($cvgroup12).' '.$item['unitName1'] ?></td>
								<td align="right"><?= number_format($cvgroup22).' '.$item['unitName2'] ?></td>
								<td align="right"><?= number_format($cvgroup21).' '.$item['unitName3'] ?></td>
								<td align="center"><?= $item['date_tran'] ?></td>
								<td align="center"><?= $item['exp_date'] ?></td>
							</tr>
							<?php $i++; }  	?>							      
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>
