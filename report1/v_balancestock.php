<?php htmltage("ລາຍງານສິນຄ້າໃນສາງ ຕາມກະ"); 
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >5) { header("Location: ?d=index"); exit(); }
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍງານສິນຄ້າໃນສາງ ຕາມກະ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/balancestock" />
					<div class="box-body">						
			            <div class="row">
			                <div class="col-md-3">
				                <div class="form-group">
				                  <label>ວັນທີ່ເປີດ</label>
				                  <input type="text"  name="openDate" class="form-control" value = "<?=$openDate?>" readonly />
				                  <input type="text"  name="infoID"   value = "<?=$infoID_balance?>"  />
				                </div>
				                <div class="form-group">
				                  <label>ຜູ້ເປີດ</label>
				                  <input type="text"  name="openUser" class="form-control" value = "<?=$openUser?>" readonly />
				                </div>	
				                <div class="form-group">
				                  <label>ໝາຍເຫດການເປີດ</label>
				                  <input type="text"  name="openRemark" class="form-control" value = "<?=$openRemark?>" readonly />
				                </div>			                
			                </div>			                
			                <div class="col-md-3">
				                <div class="form-group">
				                  <label>ວັນທີ່ປິດ</label>
				                  <input type="text"  name="closeDate" class="form-control" value = "<?=$closeDate?>" readonly />
				                </div>
				                <div class="form-group">
				                  <label>ຜູ້ປິດ</label>
				                  <input type="text"  name="closeUser" class="form-control" value = "<?=$closeUser?>" readonly />
				                </div>
				                <div class="form-group">
				                  <label>ໝາຍເຫດການປິດ</label>
				                  <input type="text"  name="closeRemark" class="form-control" value = "<?=$closeRemark?>" readonly />
				                </div>				                
			                </div>
			                <div class="col-md-3">
				                <div class="form-group">
									<p class="right"><a href="report/ex_balancestock.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                    <p class="right"><a href="report/print_balancestock.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
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
							  	<th>ຊື່ ສິນຄ້າ</th>
							  	<th>ຈໍານວນ(1)</th>	  	
						        <th>ຈໍານວນ(2)</th>
						        <th>ຈໍານວນ(3)</th>   
						        <th>ມູນຄ່າ</th>
						        <th>ວັນທີ່ໝົດອາຍຸ</th>  
							</tr>
						</thead>
						<tbody>	
							<tr bgcolor="#00FFFF">
								<td align="left" colspan="7">ເປີດກະ:&nbsp;<?=$openDate ?>&nbsp;ຜູ້ເປີດ:&nbsp;<?=$openUser ?>&nbsp;ໝາຍເຫດການເປີດ:&nbsp;<?=$openRemark ?></td>	
							</tr>					
							<?php 			
								$i=1;
								while ($item = mysql_fetch_array($SumResult_open)) { 								
							?>
							<tr>
								<td class="centered"><?= ($i+$start) ?></td>								
								<td align="left"><strong><?= $item['materialName'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty1']).' '.$item['unitName1'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty2']).' '.$item['unitName2'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty3']).' '.$item['unitName3'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['pur_price']) ?></strong></td>
								<td><strong><?= $item['exp_date'] ?></strong></td>								
							</tr>
							<?php 
								$i++; } 
							?>		
							<tr bgcolor="#00FFFF">
								<td align="left" colspan="7">ວັນທີ່ປິດ:&nbsp;<?=$closeDate ?>&nbsp;ຜູ້ປິດ:&nbsp;<?=$closeUser ?>&nbsp;ໝາຍເຫດການປິດ:&nbsp;<?=$closeRemark ?></td>
							</tr>	
							<?php 			
								$i=1;
								while ($item = mysql_fetch_array($SumResult_close)) { 								
							?>
							<tr>
								<td class="centered"><?= ($i+$start) ?></td>								
								<td align="left"><strong><?= $item['materialName'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty1']).' '.$item['unitName1'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty2']).' '.$item['unitName2'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['unitQty3']).' '.$item['unitName3'] ?></strong></td>
								<td align="right"><strong><?= number_format($item['pur_price']) ?></strong></td>
								<td><strong><?= $item['exp_date'] ?></strong></td>								
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
</section>
