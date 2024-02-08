<?php htmltage("ປະຫວັດການຮັບເງິນ");
if ( !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >4) { header("Location: ?d=index"); exit(); }

if(isset($_SESSION['EDPOSV1sh_Rcalulate']) && $_SESSION['EDPOSV1sh_Rcalulate'] == 'Rsh_calulate' ){
	include("v_payment.php");
}  else if (isset($_SESSION['EDPOSV1sh_Rcalulate']) &&  $_SESSION['EDPOSV1sh_Rcalulate'] == 'Rsh_payment') {
	include("v_payment_info.php");
} 
 ?>
  <link type="text/css" rel="stylesheet" href="css/element.css" />
  <script type="text/javascript" src="js/calculate.js"></script> 
<section class="content-header">
    <h1>ປະຫວັດການຮັບເງິນ</h1>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">					 
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
				</div>
				<div class="box-body">
					<div class="row">
						<form method="post" id="editable" action="?d=receive/history_cus">
							<div class="col-md-12">
								<div class="form-group col-md-4">
					                <label>ຍອດຄ້າງຊໍາລະ</label>
					                <input type="text" name="txtTotalBalance" value="<?=number_format($_SESSION["EDPOSV1MADD_RTotalBalance"]) ?>" class="form-control" readonly="true" />
					            </div>	
							</div>
							<div class="col-md-12">
								<div class="form-group col-md-4">
									<button type="submit" name="btncalculate_sh" class="btn btn-primary" >ຮັບເງິນ</button>
								</div>								
							</div>
						</form>
					</div>
					
				</div>
				<div class="box-header with-border">
					<h3 class="box-title">ປະຫວັດການຮັບເງິນ</h3>
				</div>
				<form method="get">
					<input type="hidden" name="d" value="receive/history_cus" />
					<div class="box-body">
						<div class="row">
			                <div class="form-group col-md-4">
			                  <label for="exampleInputEmail1">ແຕ່ວັນທີ</label>
			                  <div class="input-group date">
				                  	<div class="input-group-addon">
				                  		<i class="fa fa-calendar"></i>
				                  	</div>
			                  	<input type="text" name="startdate" class="form-control pull-right" id="datepicker1"  autocomplete="off"
			                  			value="<?php if ($_GET['startdate']!='') { echo $_GET['startdate']; } else { echo date('Y-m-d'); }?>" data-date-format="yyyy-mm-dd">
			                  	</div>
			                </div>
			                <div class="form-group col-md-4">
			                  <label for="exampleInputEmail1">ເຖິງວັນທີ</label>
				                  <div class="input-group date">
				                  	<div class="input-group-addon">
				                  		<i class="fa fa-calendar"></i>
				                  	</div>	
				                  	<input type="text" name="enddate" class="form-control pull-right" id="datepicker2"  autocomplete="off"
				                  	value="<?php if ($_GET['enddate']!='') { echo $_GET['enddate']; } else { echo date('Y-m-d'); }?>" data-date-format="yyyy-mm-dd" >
				                  </div>
			                </div>
		                </div>
		                <div class="box-footer">
							<button type="reset" class="btn btn-default" onclick="document.location='?d=receive/history_cus'">ຍົກເລີກ</button>
			            	<button type="submit" class="btn btn-primary">ຄົ້ນຫາ</button>
			            	
			            	<p class="right"><a href="receive/ex_history_cus.php?<?=$params?>" target="_blank">
				                    <input type="button" value="Print" />
				                    </a></p>

			            	<button type="button" class="btn btn-info" onclick="document.location='receive/ex_history_cus.php?<?=$params?>' , '_blank'">Export To Excel</button>
			            </div>
		                <div class="row">
		                <div class="box-body pad table-responsive">
						<table id="example2" class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>ລຳດັບ</th>
								  	<th>ລາຍລະອຽດ</th>
								  	<th>ລວມມູນຄ່າ</th>
								  	<th>ຜູ້ບັນທືກ</th>        
								  	<th>ວັນທີບັນທືກ</th>        							      
								</tr>
							</thead>
							<tbody>						
							<?php $i=1; $sum_total = 0;
								while ($item = mysql_fetch_array($result)) { 
								 	$sum_total = $sum_total+abs($item['amount_credit']);
							?>
							<tr bgcolor="#0000FF" style="color:#FFF">
								<tr >
								<td><?= $i  ?></td>
								<td><?='ຈ່າຍໃບບິນເລກທີ: '.$item['billNo'] ?></td>
								<td align="right"><?= number_format(abs($item['amount_credit'])) ?></td>
								<td><?= $item['username'] ?></td>
								<td><?= $item['date_add'] ?></td>
							</tr> 					
							<?php 	$i++; } ?>						
							</tbody>	
							<tfoot>
								<tr>
									<td colspan="2" align="center"><strong>ລວມຍອດ</strong></td>
								  	<td align="right"><strong><?=number_format($sum_total) ?></strong></td>                				
								  	<td></td>	
								  	<td></td>			      
								</tr>
							</tfoot>
					</table>
			</div>
		                </div>
		            </div>
				</form>			 
					 
				</div>	
			</div>
		</div>
	</div>
</section>