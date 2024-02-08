<?php htmltage("ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ"); ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ຈໍານວນສິນຄ້າຈຸດຕໍ່າສຸດ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">						
					<div class="box-body">						
			            <div class="row">			                
			                <div class="col-md-6">
			                
				                 <div class="form-group">
					                <label>ສາງ</label>
					                <select class="form-control" name="infoID" onChange="document.location='index.php?d=report1/material_min&infoID='+this.value">
										<option value="0">-- ເລືອກທັງໝົດ --</option>
											<?php 
												$rs_info = LoadInfo();
												while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $_GET['infoID'] ? "selected" : ""; 
											?>
												<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= $row_c['info_name'] ?></option>
											<?php } ?>
									</select>
					            </div>    	
				                 
				                <div class="form-group">
									<p><a href="report1/ex_material_min.php?<?=$params?>" target="_blank">
						            <input type="button" value="Export To Excel" />
						            </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
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
							  	<th>Barcode</th>
							  	<th>ຊື່ ສິນຄ້າ</th>
							  	<th>ຈໍານວນ(1)</th>	  	
						        <th>ຈໍານວນ(2)</th>
						        <th>ຈໍານວນ(3)</th>     
						        <th>ຈໍານວນທັງໝົດໃນສາງ(3)</th>
						        <th>ຈຸດຕໍ່າສຸດ</th>   
						        <th>ວັນທີ່ຮັບຄັ້ງສຸດທ້າຍ</th>	
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
								<td><?= $item['mBarcode'] ?></td>								
								<td><?= $item['materialName'] ?></td>
								<td align="right"><?= number_format($cvgroup12).' '.$item['unitName1'] ?></td>
								<td align="right"><?= number_format($cvgroup22).' '.$item['unitName2'] ?></td>
								<td align="right"><?= number_format($cvgroup21).' '.$item['unitName3'] ?></td>
								<td align="right"><?= number_format($item['unitQty3']).' '.$item['unitName3'] ?></td>	
								<td align="right"><?= number_format($item['min_stock']).' '.$item['unitName3'] ?></td>
								<td align="center"><?= $item['date_tran'] ?></td>
							</tr>
					 

							<?php 
								 
								$i++; } 
							?>							      
						</tbody>						
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>
