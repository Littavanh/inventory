<?php htmltage("ລາຍການໝວດ");
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍການໝວດ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/food_and_drink" />
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
				                <div class="form-group">
				                	<label>ສະຖານະ</label>
				                	<?php 
										$whereclause = " WHERE status_id IN (3,20)";
										$rs_status = selstatus($whereclause);
									?>
									<select name="status_id" class="form-control" >
										<option value="0">-- ສະຖານະທັງໝົດ --</option>
										<?php while ($row_c = mysql_fetch_array($rs_status,MYSQL_ASSOC)) {
											$selected = $row_c['status_id'] == $_GET['status_id'] ? "selected" : ""; 
										?>
											<option value="<?= $row_c['status_id'] ?>" <?= $selected ?>><?= $row_c['status_text'] ?></option>
										<?php } ?>
									</select> 								
				                </div>
			                </div>
			                <div class="col-md-6">
				                <div class="form-group">
									<p class="right"><a href="report/ex_food_and_drink.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/food_and_drink'">ຍົກເລີກ</button>
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
							  	<th>ປະເພດອາຫານ ແລະ ສິນຄ້າດື່ມ</th>
							  	<th>ສະຖານະ/ລາຄາ</th>	  	
						        <th>ຜູ້ເພີ່ມ</th>
						        <th>ວັນທີເພີ່ມ</th>     
						        <th>ຜູ້ແກ້ໄຂ</th>
						        <th>ວັນທີແກ້ໄຂ</th>      
							</tr>
						</thead>
						<tbody>						
							<?php 			
								$i=1;
								while ($item = mysql_fetch_array($result)) { ?>
							<tr bgcolor="#00FFCC">
								<td class="centered"><?= ($i+$start) ?></td>
								<td><?= $item['kf_name'] ?></td>
								<td align="center"><?= $item['status_text'] ?></td>
								<td class="centered"><?= $item['user_add_name'] ?></td>
								<td><?= $item['date_add'] ?></td>
								<td><?= $item['user_edit_name'] ?></td>
								<td><?= $item['date_edit'] ?></td>
							</tr>
				            <? 
						    	 $whereclause_kind_food = " WHERE kf_id = ".$item['kf_id']." AND  status_id IN (8,9)" ;
								 $result_food_drink = Loadfood_drink($whereclause_kind_food);				
					 			 $j = 1;
					             while ($row_cc = mysql_fetch_array($result_food_drink)) {			 
							?>
							<tr>
							  <td align="right"><?=$i.".".$j ?>&nbsp;</td>
								<td><?= $row_cc['fd_name'] ?></td>
				                <td align="right"><?=number_format($row_cc['price']) ?></td>
								<td class="centered"><?= $item['user_add_name'] ?></td>
								<td><?= $row_cc['date_add'] ?></td>
								<td><?= $row_cc['user_edit_name'] ?></td>
								<td><?= $row_cc['date_edit'] ?></td>
					  </tr>      
						<?php 
							$j++; }
							$i++; } ?>						
						</tbody>							
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>