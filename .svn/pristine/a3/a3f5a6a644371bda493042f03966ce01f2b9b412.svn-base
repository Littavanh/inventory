<?php 
session_start();
htmltage("ກໍານົດການເບິກ");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >3) { header("Location: ?d=index"); }
$whereclause = " WHERE status_id IN (8,9)";
//$rs_status = selstatus($whereclause);
?>
<script type="text/javascript" src="js/calculate.js"></script>
<section class="content-header">
    <h1>ກໍານົດການເບິກ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					 <h4>ສະຖານະ ປະຈຸບັນ</h4>
				</div>			
					<form method="post" id="frmroomtype" action="?d=manage/setting">
					<div class="box-body">
						<div class="row">
							<div class="form-group col-md-4">
			                  <label>ສະຖານະ ກໍານົດການເບິກ(ປະຈຸບັນ)</label>
			                  <input type="text" name="textfield1" class="form-control" value="<?=$cur_text ?>" readonly="readonly" />
			                </div>
			                <div class="form-group col-md-4">
			                  <label>ວັນທີ່ແກ້ໄຂ</label>
			                  <input type="text" name="textfield2" class="form-control" value="<?=$cur_date ?>" readonly="readonly" />
			                </div>
			                <div class="form-group col-md-4">
			                  <label>ຜູ້ແກ້ໄຂ</label>
			                  <input type="text" name="textfield3" class="form-control" value="<?=$cur_user ?>" readonly="readonly" />
			                </div>
			                <div class="form-group col-md-12">
			                  <label>ໝາຍເຫດ</label>
			                  <textarea name="textarea1" cols="45" class="form-control" rows="2" readonly="readonly"><?=$remark ?></textarea>
			                </div>
			            </div>			            
			            <hr>
			            <div class="box-header with-border"><h4>ປັບປຸງ ສະຖານະ</h4></div>						
						<input type="hidden" name="STID" value="<?=$ST_appID ?>" readonly="readonly" />
						<div class="row">
							<div class="form-group col-md-4">
						        <label>ກໍານົດການເບິກ</label>
						        <input type="text" name="ST_text" class="form-control" value="<?=$ST_text ?>" readonly="readonly" />
					        </div>									
						</div>
						<div class="row">
							<div class="form-group col-md-4">
						        <label>ໝາຍເຫດ</label>
						        <textarea name="txtremark" cols="45" class="form-control" rows="2"><?=$remark ?></textarea>
					        </div>										
						</div>						
					</div>
					<div class="box-footer">
		            	<button type="submit" name="btnSaveStatus" class="btn btn-primary">ບັນທຶກ</button>
		            </div>
		            </form>
				<hr>
						<div class="box-body pad table-responsive">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th width="10">ລຳດັບ</th>
					  	<th>ກໍານົດການເບິກ</th>
					  	<th>ໝາຍເຫດ</th>
				        <th>ຜູ້ແກ້ໄຂ</th>
				        <th>ວັນທີ່ແກ້ໄຂ</th>	
					</tr>
				</thead>
				<tbody>
				  <?php 
					$i = 1;
					while($row = mysql_fetch_array($result, MYSQL_ASSOC)){ ?>
					<tr <?php if ($row['approveStatus'] ==2) { echo "bgcolor='#00CC33'" ;}?>>
						<td class ="centered itemcols">
							<span><?= ($i+$start) ?></span>
							<input type="hidden" name="type[]" class="type" value="unchanged" />
			                <input type="hidden" name="id[]"  value="<?=$row['approveID']?>" />
						</td>
						<td class="eqcodecols"><?= $row['approveText'] ?></td>				
			            <td class="eqcodecols"><?= $row['remark'] ?></td>				
			            <td class="eqcodecols"><?= $row['username'] ?></td>				
			            <td class="eqcodecols"><?= $row['date_add'] ?></td>						  
					</tr>
					<?php $i++;} ?>						
				</tbody>
			</table>
		</div>
			</div>
		</div>	
	</div>
</section>

