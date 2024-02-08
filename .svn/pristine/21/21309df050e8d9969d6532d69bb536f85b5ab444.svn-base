<?php 
session_start();
htmltage("ກ໋ອບປີ້ ຂໍ້ມູນສີນຄ້າ");
 
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
    function Findinfo(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findInfo.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('infoIDT').innerHTML=req.responseText;
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
    function CountProductList(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findCountProduct.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('productList').innerHTML=req.responseText;
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
</script>  
<section class="content-header">
    <h1>ກ໋ອບປີ້ ຂໍ້ມູນສີນຄ້າ</h1>    
</section>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<p class="errormessage">***ລາຍການສິນຄ້າເກົ່າຈະຖືກລົບອອກໄປແລ້ວ ລາຍສິນຄ້າໃໝ່ຈະຖືກສ້າງຂື້ນມາແທນ</p>
					<p><?=$success?></p>  
				</div>
				<form method="post" id="frmtranH" action="?d=stock/duplicate" enctype="multipart/form-data">
					<div class="box-body">					
						<div class="row">
						<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>
				                 <div class="form-group col-md-12">
					                <label>ຈາກ ສາຂາ</label>
					                <select class="form-control" name="infoIDF" onChange="Findinfo(this.value); CountProductList(this.value);" required >
					                	<option value="">-- ເລືອກ ສາຂາ --</option>		
											<?php 
												$rs_info = LoadInfo();
												while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $_SESSION['EDPOSV1AddProducinfoIDF'] ? "selected" : ""; 
											?>
												<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
											<?php } ?>
									</select>
					            </div>    	
				                <?php } else { ?>
				                	<div class="form-group col-md-12">
					                <label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
					                <select class="form-control" name="infoIDF" required >
										<option value="<?=$GnfoID?>"><?=$Get_infoName ?></option>										
									</select>
					            </div>    	
				                <?php } ?>		
				            </div>
			            <div class="row">
			            	<div class="form-group col-md-12" id="infoIDT">
			                  	<label>ໂອນໄປ ສາຂາ</label>
			                  	<select name="txtinfoIDT" class="form-control" required>
									<option value="">-- ເລືອກ ສາຂາ --</option>									 
								</select>
			                </div>
			            </div>			           
			            <div class="row">
			            	<div class="form-group col-md-12">
			                  <label>ໝາຍເຫດ</label>
			                  <textarea name="txtRemarkF" class="form-control" cols="50" rows="2"><?=$_SESSION['EDPOSV1AddProducttxtRemark'] ?></textarea>
			                </div>
			            </div>
					</div>
					<div class="box-footer">						
		            	<input type="submit" class="btn btn-primary" name="btnDuplicateData" value="  ເລີ່ມການ ກ໋ອບປີ້ ຂໍ້ມູນສີນຄ້າ  " />
		            </div>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3>ລາຍການສິນຄ້າທີ່ຈະທໍາການ ກ໋ອບປີ້</h3>
				</div>				
					<div class="box-body">
						<div class="row" id="productList">
							<div class="form-group col-md-12">
			                 	<h4>ໝວດ <?=" 0 ລາຍການ" ?></h4>			                  
			                </div>
			                <div class="form-group col-md-12">
							   	<h4>ເມນູຂາຍ: <?=" 0 ລາຍການ" ?></h4>			                  
							</div>			               
			                <div class="form-group col-md-12">
			                   <h4>ສິນຄ້າ <?=" 0 ລາຍການ" ?></h4>						                  
			                </div>
			            </div>										 			             
					</div>					 
			</div>
		</div>
	</div>
	 
</section>
