<?php 
session_start();
htmltage("ຕັ້ງລາຄາ");
if (!isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] >3) { header("Location: ?d=index"); }

if(isset($_SESSION['EDPOSV1show_image']) && $_SESSION['EDPOSV1show_image'] == 'show_image' ){
	include("v_show_image.php");	
}
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
    function FindKF(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findKF1.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('selKFID').innerHTML=req.responseText;
                        '<option>Select City</option>'+
                        '</select>';                        
                    } else {
                        alert("Problem while using XMLHTTP (Account List):\n" + req.statusText);
                    }
                }               
            }           
            req.open("GET", strURL, true);
            req.send(null);
        }       
    } 
 /*******************/    
</script>  
<section class="content-header">
    <h1>ຕັ້ງລາຄາ</h1>    
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<form method="get">
						<input type="hidden" name="d" value="manage/price_setting" />
						<?php if ( $_SESSION['EDPOSV1role_id'] == '1') { ?>
				                 <div class="form-group col-md-3">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" onchange="FindKF(this.value); document.location='?d=manage/price_setting&kf_id=<?=base64_decode($_GET['kf_id']) ?>&infoID='+this.value" >
										<option value="0">-- ກະລຸນາເລືອກ --</option>
											<?php 
												$rs_info = LoadInfo();
												while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $_SESSION["EDPOSV1KFSEL_info_id"] ? "selected" : ""; 
											?>
												<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
											<?php } ?>
									</select>
					            </div>    	
				                <?php } else { ?>
				                	<div class="form-group col-md-3">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoID" >
										<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
									</select>
					            </div>    	
				                <?php } ?>	
						<div class="form-group col-md-3" id="selKFID">
		                	<label>Filter</label>		                
							<select name="kf_id" class="form-control" onchange="document.location='?d=manage/price_setting&infoID=<?=$_GET['infoID'] ?>&kf_id='+this.value">
								<option value="0">-- ໝວດສິນຄ້າ --</option>
								<?php 
									if ($_SESSION['EDPOSV1role_id'] != '1') {
										$SelInfoID=$_SESSION['EDPOSV1info_id'];
										$rs_kinfood = selkindfood($SelInfoID);
										while ($row_c = mysql_fetch_array($rs_kinfood,MYSQL_ASSOC)) {
										$selected = $row_c['kf_id'] == base64_decode($_GET['kf_id']) ? "selected" : ""; 
								?>
									<option value="<?= base64_encode($row_c['kf_id']) ?>" <?= $selected ?>><?= $row_c['kf_name'] ?></option>
								<?php } } ?>
								<?php 
									if ($_SESSION["EDPOSV1KFSEL_info_id"] != '') {
										$SelInfoID=$_SESSION['EDPOSV1KFSEL_info_id'];
										$rs_kinfood = selkindfood($SelInfoID);
										while ($row_c = mysql_fetch_array($rs_kinfood,MYSQL_ASSOC)) {
										$selected = $row_c['kf_id'] == base64_decode($_GET['kf_id']) ? "selected" : ""; 
								?>
									<option value="<?= base64_encode($row_c['kf_id']) ?>" <?= $selected ?>><?= $row_c['kf_name'] ?></option>
								<?php } } ?>
							</select>
							
		           		</div> 
		           		<div class="row">
			           		<div class="form-group col-md-3" >
			           			<label>.</label>
			           			<input type="submit" class = "form-control btn btn-success right" value="ຄົ້ນຫາ" />
			           		</div>
		           		</div>
					</form>
					<p><?=$success?></p>
					<p class="errormessage"><?=$exist?></p>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="box-body pad table-responsive">
						<form method="post" id="frmPriceSetting" action="index.php?d=manage/price_setting" enctype="multipart/form-data">
							<table id="example1" class="table table-bordered table-hover beautified editable">
								<thead>
									<tr>
										<th width="10">ລຳດັບ</th>
									  	<th>Barcode</th>
									  	<th>ຊື່</th>
									  	<th>ລາຍລະອຽດ1</th>
									  	<th>ລາຍລະອຽດ2</th>
									  	<!-- <th>ລາຍລະອຽດ3</th>	-->
									  	<th>ໝວດ</th>
									  	<th>ລາຄາ (1)</th>
									  	<th>ລາຄາ (2)</th>
									  	<th>ລາຄາ (3)</th>
									  	<!-- <th>ລາຍລະອຽດ</th> -->
								        <th>ເບິ່ງຮູບ</th>  	  	
								        <th>ລາຍການສິນຄ້າ</th>
								        <!-- <th>ຜູ້ແກ້ໄຂ</th>
								        <th>ວັນທີ່ແກ້ໄຂ</th>      -->   
									  	<?php if($_SESSION['EDPOSV1role_id'] <=3){ ?>
										<th>ລຶບ</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; while($row = mysql_fetch_array($result, MYSQL_ASSOC)){  ?>
										<tr>
											<td class ="centered itemcols">
												<span><?= ($i+$start) ?></span>
												<input type="hidden" name="type[]" class="type" value="unchanged" />
								                <input type="hidden" name="id[]"  value="<?=$row['fd_id']?>" />
								                <input type="hidden" name="infoidSet[]"  value="<?=$_GET['infoID']?>" />
								                <input type="hidden" name="txtstatus_id[]"  value="<?=$row['status_id']?>" />                
								                </td>
											<td class="eqcodecols">
												<input type="text" name="txtBarcode[]" size = "" value="<?= $row['fd_Barcode'] ?>" />
												<label class="hidden"><?= $row['fd_Barcode'] ?></label>
											</td>
											<td class="eqcodecols">
												<input type="text" name="txtfd_name[]" size = "" value="<?= $row['fd_name'] ?>" required />
												<label class="hidden"><?= $row['fd_name'] ?></label>
											</td>
											<td class="eqcodecols">
												<input type="text" name="txtdetail1[]" size = "" value="<?= $row['detail1'] ?>"  />
												<label class="hidden"><?= $row['detail1'] ?></label>
											</td>
											<td class="eqcodecols">
												<input type="text" name="txtdetail2[]" size = "" value="<?= $row['detail2'] ?>"  />
												<label class="hidden"><?= $row['detail2'] ?></label>
											</td>
											<!-- <td class="eqcodecols">
												<input type="text" name="txtdetail3[]" size = "" value="<?= $row['detail3'] ?>"  />
												<label class="hidden"><?= $row['detail3'] ?></label>
											</td> -->
								          	<td class="eqcodecols">
								            	<select name="kf_id[]">                
														<?php 
															$SelInfoID=$row['info_id'];
															$rs_kf = selkindfood($SelInfoID);
															while ($row_c = mysql_fetch_array($rs_kf,MYSQL_ASSOC)) {
															$selected = $row_c['kf_id'] == $row['kf_id'] ? "selected" : ""; 
														?>
															<option value="<?= $row_c['kf_id'] ?>" <?= $selected ?>><?= $row_c['kf_name'] ?></option>
														<?php } ?>
												</select>
								            </td>
								            <td class="eqcodecols"><?= number_format($row['price']) ?></td>
								            <td class="eqcodecols"><?= number_format($row['price2']) ?></td>
								            <td class="eqcodecols"><?= number_format($row['price3']) ?></td>
								            <!-- <td class="eqcodecols"><a href="">ລາຍລະອຽດ</a></td> -->
								          	<td class="eqcodecols" align="center">
								          		<a href="?d=manage/price_setting&show_image=true&image=<?=$row['photo']?>&menu_name=<?=$row['fd_name']?>&menu_no=<?=$row['fd_id']?>">ເບິ່ງຮູບ</a>
								          	</td>
								          	<td class="eqcodecols" align="center">
								         	 	<a href="?d=manage/getvalues&recipeid=<?=$row['fd_id']?>&fdname=<?=$row['fd_name']?>">ລາຍການສິນຄ້າ</a>
								          	</td>
								          	<!-- <td class="eqcodecols"><?= $row['user_add_name'] ?></td>
								            <td class="eqcodecols"><?= $row['date_add'] ?></td>   -->         
										  	<?php if($_SESSION['EDPOSV1role_id'] <=3){ ?>
											<td class="centered" >
								            <a href ="?d=manage/price_setting&del_id=<?php echo base64_encode($row["fd_id"]."tasoksavhay"); ?>&image=<?=base64_encode($row['photo'])?>&kf_id=<?=$_GET['kf_id'] ?>" 
								            onclick="return confirm('ທ່ານຕ້ອງການລຶບແທ້ບໍ...?')"><i class="fa fa-trash-o"></i></a> </td>						
											<?php } ?>
										</tr>
									<?php $i++;} ?>	
								</tbody>
							</table>							 
					   			<?php 
					   				$CompanySel = mysql_real_escape_string(stripslashes( ($_GET['infoID'])));
					   				if($_SESSION['EDPOSV1role_id'] <=3 && $CompanySel>0){ ?>
								<div class="box-footer">		
							        <input type="button" id="adduser" class = "btn btn-primary" value="  &#3776;&#3742;&#3765;&#3784;&#3745;  " />
									<input type="button" id="reset" class = "btn btn-default" value="  &#3725;&#3771;&#3713;&#3776;&#3749;&#3765;&#3713;  " />
									<input type="submit" class = "btn btn-success right" value="  &#3738;&#3761;&#3737;&#3735;&#3766;&#3713;  "  id="right" onclick="return confirm('ທ່ານຕ້ອງການບັນທຶກແທ້ບໍ...?')"/>
								</div>
								<?php } ?>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<table class="template hidden" id = "tab">			
	<tr>
		<td class = "centered">
			<span></span>
			<input type="hidden" name="type[]" class="type" value="added" />
            <input type="hidden" name="id[]"  value="" />
            <input type="hidden" name="eq_id[]" />          
            <input type="hidden" name="infoidSet[]"  value="<?=$_GET['infoID']?>" />
		</td>
		<td class="eqcodecols"><input type="text" name="txtBarcode[]" size = "" value="" /></td>	
		<td class="eqcodecols"><input type="text" name="txtfd_name[]" size = "" value="" required /></td>	
		<td class="eqcodecols"><input type="text" name="txtdetail1[]" size = "" value=""  /></td>	
		<td class="eqcodecols"><input type="text" name="txtdetail2[]" size = "" value=""  /></td>	
		<!-- <td class="eqcodecols"><input type="text" name="txtdetail3[]" size = "" value=""  /></td>	 -->
		<td class="eqcodecols">
            	<select name="kf_id[]" required>    
            		<option value="">ເລືອກກຸ່ມສິນຄ້າ</option>            
						<?php 
							$SelInfoID = $_GET['infoID'];
							$rs_kf = selkindfood($SelInfoID);
							while ($row_c = mysql_fetch_array($rs_kf,MYSQL_ASSOC)) {
						?>
							<option value="<?= $row_c['kf_id'] ?>" <?= $selected ?>><?= $row_c['kf_name'] ?></option>
						<?php } ?>
				</select>
        </td>
        <td class="eqcodecols">0</td>
         <td class="eqcodecols">0</td>
          <td class="eqcodecols">0</td>
        <!-- <td class="eqcodecols">ລາຍລະອຽດ</td> -->
        <td class="eqcodecols"><input name="fileUpload[]" type="file"></td>
        <td class="eqcodecols">ລາຍການສິນຄ້າ</td>
        <!-- <td class="eqcodecols"><?= $_SESSION['EDPOSV1user_name'] ?></td>				
        <td class="eqcodecols"><?= date('Y-m-d H:m:s') ?></td>	-->        
		<td class="centered"><i class="fa fa-trash-o delete1"></td>
	</tr>
</table>
