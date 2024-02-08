<?php 
session_start();
htmltage("ປັບປຸງລາຄາສີນຄ້າ");
 
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['role_id'] ==4) { header("Location: ?d=index"); }
?>
<link type="text/css" rel="stylesheet" href="css/element.css" />
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/Action.js"></script>
<script type="text/javascript" src="js/calculate.js"></script>
<script language="javascript" type="text/javascript">
  function getXMLHTTP() { //fuction to return the xml http object
        var xmlhttp=false;  
        try{
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)    {       
            try{            
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                try{
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1){
                    xmlhttp=false;
                }
            }
        }
            
        return xmlhttp;
    }
/*******************/
    
</script>  
<section class="content-header">
    <h1>ປັບປຸງລາຄາສີນຄ້າ</h1>    
</section>
<section class="content">
<form method="post" id="frmtranH" action="?d=price/adjust" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header with-border">
					<p class="errormessage"><?=$exist?></p>
					<p><?=$success?></p>  
				</div>				
					<div class="box-body">					
						<div class="row">
						<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
				                 <div class="form-group col-md-12">
					                <label>ສາຂາ</label>
					                <select class="form-control" name="infoID" onchange="document.location='index.php?d=price/adjust&infoID='+this.value+'&type=<?=$_GET['type'] ?>'" required >
					                	<option value="">-- ເລືອກ ສາຂາ --</option>		
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
				                	<div class="form-group col-md-12">
					                <label>ສາຂາ</label>
					                <select class="form-control" name="infoID" required >
										<option value="<?=$GnfoID?>"><?=$Get_infoName ?></option>										
									</select>
					            </div>    	
				                <?php } ?>		
				            </div>
			            <div class="row">
			            	<div class="form-group col-md-12" >
			                  	<label>ເລືອກສິນຄ້າ</label>
			                  	<select class="form-control" name="type" onChange="document.location='index.php?d=price/adjust&infoID=<?=$_GET['infoID'] ?>&type='+this.value ">	
									<option value="0">--ກະລຸນາເລືອກ--</option>
									<?php 
										for ($x = 1; $x <= 3; $x++) {
										    $selected = $x == $_GET['type'] ? "selected" : ""; 
										    if ($x==1) {
										    	$y = "ສິນຄ້າ ທັງໝົດ";
										    } else if ($x==2) {
											   	$y = "ຕາມ ໝວດສິນຄ້າ";
											} else if ($x==3) {
										    	$y = "ຕາມ ລາຍການສີນຄ້າ";
										    } 
									?>
									<option value="<?=$x?>" <?= $selected ?>><?=$y?></option>
									<?php } ?>
								</select>
			                </div>
			            </div>
						<div class="row">
			            	<div class="form-group col-md-12" >
			                  	<label>ເລືອກປະເພດ (ຈໍານວນ/%)</label>
			                  	<select class="form-control" name="txtUpdateType">	
									<?php 
										for ($x = 1; $x <= 2; $x++) {
										    $selected = $x == $_SESSION["EDPOSV1UpdatePriceType"] ? "selected" : ""; 
										    if ($x==1) {
										    	$y = "ຈໍານວນເງິນ";
										    } else if ($x==2) {
											   	$y = "ເປີເຊັນ";
											} 
									?>
									<option value="<?=$x?>" <?= $selected ?>><?=$y?></option>
									<?php } ?>
								</select>
			                </div>
			            </div>
			            <div class="form-group">
				        	<label>ຈ/ນ ທີ່ປັບປຸງ ລາຄາຂາຍຍ່ອຍ</label>
				            <input type="text" name="txtprice_adjust1" class="form-control" autocomplete="off" value="0" onkeyup ="AddAndRemoveSeparator(this);" class="number" required />
				        </div>	
				        <div class="form-group">
				        	<label>ຈ/ນ ທີ່ປັບປຸງ ລາຄາຂາຍຍົກ</label>
				            <input type="text" name="txtprice_adjust2" class="form-control" autocomplete="off" value="0" onkeyup ="AddAndRemoveSeparator(this);" class="number" required />
				        </div>					        			           
			            <div class="row">
			            	<div class="form-group col-md-12">
			                  <label>ໝາຍເຫດ</label>
			                  <textarea name="txtRemarkF" class="form-control" cols="50" rows="2"><?=$_SESSION['EDPOSV1AddProducttxtRemark'] ?></textarea>
			                </div>
			            </div>
					</div>
					<div class="box-footer">						
		            	<input type="submit" class="btn btn-primary" name="btnAdjustPrice" value="ຢືນຢັນການປັບປຸວລາຄາ" />
		            </div>				
			</div>
		</div>
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3>ລາຍການສິນຄ້າທີ່ຈະທໍາການ ປັບປຸງລາຄາ</h3>
				</div>				
					<div class="box-body">
						<div class="row">
							<?php if ($_GET['type'] == "1") { 
								$_SESSION["EDPOSV1PriceAdjust_infoid"]=$_GET['infoID'];
								$_SESSION["EDPOSV1PriceAdjust_type"]=$_GET['type'];
								$infoID = $_GET['infoID'];
							?>
								<div class="form-group col-md-12">
				                 	<h1>ປັບປຸງລາຄາ ສິນຄ້າທັງໝົດ</h1>			                  
				                </div>
			                <?php } else if ($_GET['type'] == "2") { ?>
				                <div class="form-group col-md-12">
								   	<div class="box-body pad table-responsive">
								   		<table id="example1" class="table table-bordered table-hover beautified">
								   			<thead>
												<tr>
													<th class="centered">#</th>
													<th >ໝວດສີນຄ້າ</th>													  	
												</tr>
											</thead>
											<tbody>
											<?php 
												$i = 1; 
												$wherecase="";
												$_SESSION["EDPOSV1PriceAdjust_infoid"]=$_GET['infoID'];
												$_SESSION["EDPOSV1PriceAdjust_type"]=$_GET['type'];
												$infoID = $_GET['infoID'];
												$result = LoadKindOfFood($infoID);
												while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
											<tr>
												<td class="centered">
													<input type="checkbox" name="cbSel[]" id="cbSel<?=$i ?>" value="<?=$row['kf_id']?>" >
													<input type="hidden" name="type[]" class="type" value="unchanged" />													
												</td>
												<td align="left"><?= $row['kf_name'] ?></td>				
											</tr>
											<?php } ?>
											</tbody>
								   		</table>
								   	</div>	                  
								</div>			
							<?php } else if ($_GET['type'] == "3") { ?>               
				                <div class="form-group col-md-12">
				                   	<div class="box-body pad table-responsive">
								   		<table id="example1" class="table table-bordered table-hover beautified">
								   			<thead>
												<tr>
													<th class="centered">#</th>
													<th >ລະຫັດສະນຄ້າ</th>
													<th >ຊື່ສິນຄ້າ</th>
													<th >ລາຄາຂາຍຍ່ອຍ</th>	  	
													<th >ລາຄາຂາຍຍົກ</th>
													<th >ໝວດສິນຄ້າ</th>
												</tr>
												<tbody>
													<?php 
												$i = 1; 
												$wherecase="";
												$_SESSION["EDPOSV1PriceAdjust_infoid"]=$_GET['infoID'];
												$_SESSION["EDPOSV1PriceAdjust_type"]=$_GET['type'];
												$infoID = $_GET['infoID'];
												$result = LoadAllItem($infoID);
												while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
											<tr>
												<td class="centered">
													<input type="checkbox" name="cbSel[]" id="cbSel<?=$i ?>" value="<?=$row['fd_id']?>" >
													<input type="hidden" name="type[]" class="type" value="unchanged" />													
												</td>
												<td align="left"><?= $row['fd_Barcode'] ?></td>		
												<td align="left"><?= $row['fd_name'] ?></td>														
												<td align="left"><?= number_format($row['price']) ?></td>		
												<td align="left"><?= number_format($row['price2']) ?></td>		
												<td align="left"><?= $row['kf_name'] ?></td>		
											</tr>
											<?php } ?>
												</tbody
											</thead>
								   		</table>
								   	</div>	  		                  
				                </div>
				            <?php }   ?>
			            </div>										 			             
					</div>					 
			</div>
		</div>
	</div>
</form>	 
</section>
