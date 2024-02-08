<?php htmltage("ລາຍການໂຕະ");
$whereclause = " WHERE status_id IN (1,2,20)";
$rs_status = selstatus($whereclause);
 ?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<section class="content-header">
    <h1>ລາຍການໂຕະ</h1>    
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">				
				<form method="get">
				<input type="hidden" name="d" value="report/table" />
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
									<select name="status_id" class="form-control">
										<option value="0">-- ສະຖານະທັງໝົດ --</option>
				                        <option value="in_use">ໃຊ້ປົກກະຕິ</option>
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
									<p class="right"><a href="report/ex_table.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Export To Excel" />
				                    </a></p>
				                </div>			                	
			                </div>			                
		                </div>
					</div>
					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="document.location='?d=report/table'">ຍົກເລີກ</button>
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
							  	<th>ຊື່ໂຕະ</th>
							  	<th>ສະຖານະ</th>	  	
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
								<tr>
									<td class="centered"><?= ($i+$start) ?></td>
									<td><?= $item['tb_name'] ?></td>
									<td><?= $item['status_text'] ?></td>
									<td class="centered"><?= $item['user_add_name'] ?></td>
									<td><?= $item['date_add'] ?></td>
									<td><?= $item['user_edit_name'] ?></td>
									<td><?= $item['date_edit'] ?></td>
								</tr>
							<?php $i++; } ?>						
						</tbody>							
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</section>

 