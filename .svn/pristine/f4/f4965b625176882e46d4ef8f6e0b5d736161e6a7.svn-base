<?php 
session_start();
htmltage("Import Excel file");
if ($_SESSION['EDPOSV1CurStockStatus'] == 2 || !isset($_SESSION['EDPOSV1user_id']) || $_SESSION['EDPOSV1role_id'] ==4 ) { header("Location: ?d=index"); }

?>
  <link type="text/css" rel="stylesheet" href="css/element.css" />
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
        var strURL="function/findKF.php?GetInfoID="+GetInfoID;
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
    function FindUnit1(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findUnit1.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('selUnit1').innerHTML=req.responseText;
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
    function FindUnit2(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findUnit2.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('selUnit2').innerHTML=req.responseText;
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
    function FindUnit3(GetInfoID) {      
        //alert("Problem while using XMLHTTP (Account List):\n" );
        var strURL="function/findUnit3.php?GetInfoID="+GetInfoID;
        var req = getXMLHTTP();       
        if (req) {            
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    // only if "OK"
                    if (req.status == 200) {                        
                        document.getElementById('selUnit3').innerHTML=req.responseText;
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
    <h1>Import Excel file</h1>    
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
					<form method="post" id="frmImport" action="?d=stock/material_import" enctype="multipart/form-data">
						<div class="row">
							<div class=" form-group col-md-4">	
								<label>BU/ຫົວໜ່ວຍທຸລະກິດ</label>
								<?php if ( $_SESSION['EDPOSV1role_id'] <= '2') { ?>										                
									<select name="infoID" class="form-control" onChange="FindKF(this.value); FindUnit1(this.value); FindUnit2(this.value); FindUnit3(this.value);" required>
										<option value="">-- ເລືອກBU/ຫົວໜ່ວຍທຸລະກິດ --</option>
										<?php 
											$rs_info = LoadInfo();
											while ($row_c = mysql_fetch_array($rs_info,MYSQL_ASSOC)) {
												$selected = $row_c['info_id'] == $row['info_id'] ? "selected" : ""; 
										?>
											<option value="<?=  $row_c['info_id'] ?>" <?= $selected ?>><?= encrypt_decrypt('decrypt', $row_c['info_name']) ?></option>
										<?php } ?>
									</select>											    
								<?php } else { ?>										        
								    <select  name="infoID" class="form-control">
										<option value="<?=$Get_infoID?>"><?=$Get_infoName ?></option>										
									</select>											        
								<?php } ?>	
							</div>
						</div>
						<div class="row">
							<div class="form-group">
							<label>Upload Excel File</label>
							<input type="file" name="file" class="form-control">
							</div>
						</div> 			           
						</div>
						 <div class="box-footer">
			                <button type="submit" name="btnImportProduct" class="btn btn-primary">Upload</button>
			              </div>						  
					</form>	

                    <?php
$objCSV = fopen("customer.csv", "r");
?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
?>
  <tr>
    <td><div align="center"><?php echo $objArr[0];?></div></td>
    <td><?php echo $objArr[1];?></td>
    <td><?php echo $objArr[2];?></td>
    <td><div align="center"><?php echo $objArr[3];?></div></td>
    <td align="right"><?php echo $objArr[4];?></td>
    <td align="right"><?php echo $objArr[5];?></td>
  </tr>
<?php
}
fclose($objCSV);
?>
</table>
					 
				</div>
			</div>
		</div>
	</div>
</section>
 