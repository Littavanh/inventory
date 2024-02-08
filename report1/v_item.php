<?php htmltage("ລາຍງານສິນຄ້າໃນສາງ"); 
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍງານສິນຄ້າໃນສາງ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/material_instock" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-6">
				                <div class="form-group col-md-6">
				                  <label>ວັນທີ</label>
				                  <div class="input-group date">
					                  	<div class="input-group-addon">
					                  		<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text"  name="startdate" class="form-control pull-right" value = "<?=date('Y/m/d')?>" readonly />
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
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_item.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_item.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/material_instock'">ຍົກເລີກ</button>
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
					<h4><?= $pagedescription ?></h4>
					<table id="example21" class="table table-bordered beautified_report">
						<thead>
							<tr>
							  	<th>ລຳດັບ</th>	  								  
							  	<th>Barcode</th>
								<th>ຊື່ ສິນຄ້າ</th>
							  	<th>ຈໍານວນ(1)</th>	  	
						        <th>ຈໍານວນ(2)</th>
						        <th>ຈໍານວນ(3)</th>   
						        <th>ມູນຄ່າ</th>
						        <th>ວັນທີ່ໝົດອາຍຸ</th>  
							</tr>
						</thead>
						<tbody>						
							<?php 			
							$i=1;
							$sumPurPrice = 0;
							while ($item = mysql_fetch_array($SumResult)) { 
								$whereGroupID = $item['materialID'];
									$cvgroup11 = 0;
									$cvgroup12 = 0;
									$cvgroup21 = 0;
									$cvgroup22 = 0;
									$sumPurPrice = $sumPurPrice+$item['pur_price'];
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
							<tr >
								<td class="centered"><?= ($i+$start) ?></td>								
								<td><div align="left"><strong><?= $item['mBarcode'] ?></strong></div></td>
								<td><div align="left"><strong><?= $item['materialName'] ?></strong></div></td>
								<td align="right"><strong><?= number_format($cvgroup12).' '.$item['unitName1'] ?></strong></td>
								<td align="right"><strong><?= number_format($cvgroup22).' '.$item['unitName2'] ?></strong></td>
								<td align="right"><strong><?= number_format($cvgroup21).' '.$item['unitName3'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['pur_price']) ?></strong></td>
								<td><strong><?= $item['exp_date'] ?></strong></td>								
							</tr>							
							<?php 							
								$i++; } 
							?>						      
						</tbody>
						<tfoot>
							<tr bgcolor="#00FFFF">
								<td colspan="6" class="centered">
									<strong>ລວມມູນຄ່າສິນຄ້າໃນສາງງວດວັນທີ <?=$_GET['startdate'].' - '.$_GET['enddate'] ?></strong>
								</td>	
								<td colspan="4" align="left"><strong><?= number_format($sumPurPrice) ?></strong></td>								
							</tr>
						</tfoot>				
					</table>
						<div class="paging">
<?php
	if ($pagecount > 1){
		if ($pagenum > 1) echo "<a href='?d=report/material_instock&$params&start=".(($pagenum-2)*$pagesize)."' $isselected>&lt; ກັບຄືນ</a>";
		$j=1;
		$g_start = 0;
		if($_GET['start'] >= $pagesize*4) $g_start = ($_GET['start'] / $pagesize) - 4;
		
		for ($i = $g_start; $i < $pagecount; $i++){
			if ($i == $pagenum-1) $isselected = "class='selected'";
			else $isselected = "";
		
			if($j<=15){
				echo "<a href='?d=report/material_instock&$params&start=".($i*$pagesize)."' $isselected>".($i+1)."</a>";
			}
			$j++;
		}
		if ($pagenum < $pagecount) echo "<a href='?d=report/material_instock&$params&start=".($pagenum*$pagesize)."' $isselected>ຕໍ່ໄປ  &gt;</a>";
	}
?>
</div>
				</div>
			</div>
		</div>
	</div>
</section>
