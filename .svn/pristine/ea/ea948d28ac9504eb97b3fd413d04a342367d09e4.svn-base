<?php 
 $Get_infoID= $_SESSION['EDPOSV1info_id'];
    $Get_infoName=$_SESSION['EDPOSV1info_name'];
	
	
		unset($_SESSION["EDPOSV1MADD_txtFDID1"]);
		unset($_SESSION["EDPOSV1MADD_txtFDID2"]);
		unset($_SESSION["EDPOSV1MADD_txtFDID3"]);
		unset($_SESSION["EDPOSV1MADD_txtRecieve1"]);
		unset($_SESSION["EDPOSV1MADD_txtRecieve2"]);
		unset($_SESSION["EDPOSV1MADD_txtRecieve3"]);
    
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['edit_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$GetM_InfoID = mysql_real_escape_string(stripslashes( ($_GET['infoid'])));
	
	$rsMaterial = mysql_query("select * from v_material WHERE status_id IN (3) AND materialID ='$id' and info_id='$GetM_InfoID' ");	
	$CountM = nr_execute("SELECT COUNT(*) FROM v_material  WHERE status_id IN (3) AND materialID ='$id' and info_id='$GetM_InfoID' ");
	if ($CountM > 0) {
		while ($rowM = mysql_fetch_array($rsMaterial,MYSQL_ASSOC)) {
			$_SESSION["EDPOSV1MADD_infoID"]=$rowM['info_id'];
			$_SESSION["EDPOSV1MADD_Mid"]=$rowM['materialID'];
			$_SESSION["EDPOSV1MADD_txtBarcode3"]=$rowM['mBarcode'];	
			$_SESSION["EDPOSV1MADD_txtm_name"]=$rowM['materialName'];	
			$_SESSION["EDPOSV1MADD_kf_id"]=$rowM['kf_id'];	
			$_SESSION["EDPOSV1MADD_unit1"]=$rowM['unitname1'];
			$_SESSION["EDPOSV1MADD_unitNameQty1"]=$rowM['unitQty1'];
			$_SESSION["EDPOSV1MADD_unit2"]=$rowM['unitname2'];
			$_SESSION["EDPOSV1MADD_unitNameQty2"]=$rowM['unitQty2'];
			$_SESSION["EDPOSV1MADD_unit1"]=$rowM['unitname1'];
			$_SESSION["EDPOSV1MADD_unit2"]=$rowM['unitname2'];
			$_SESSION["EDPOSV1MADD_unit3"]=$rowM['unitname3'];
			$_SESSION["EDPOSV1MADD_unitNameQty3"]=$rowM['unitQty3'];
			$_SESSION["EDPOSV1MADD_txtm_Remark"]=$rowM['materialRemark'];	
			$_SESSION["EDPOSV1MADD_txtm_Remark1"]=$rowM['materialRemark1'];	
			$_SESSION["EDPOSV1MADD_txtm_Remark2"]=$rowM['materialRemark2'];	
			$_SESSION["EDPOSV1MADD_min_stock"]=$rowM['min_stock'];
			$_SESSION["EDPOSV1MADD_minUnitID"]=$rowM['min_unitID'];
			$_SESSION["EDPOSV1MADD_Ingredient"]=$rowM['ingredient'];
			$_SESSION["EDPOSV1MADD_mOpenStock"]=$rowM['mOpenStock'];

			$_SESSION["EDPOSV1MADD_Ingredient_old"]=$rowM['ingredient'];
			$_SESSION["EDPOSV1MADD_mOpenStock_old"]=$rowM['mOpenStock'];


			/* $_SESSION["EDPOSV1MADD_txtprice1"]=$txtprice1;	
			$_SESSION["EDPOSV1MADD_txtprice2"]=$txtprice2;	
			$_SESSION["EDPOSV1MADD_txtprice3"]=$txtprice3;	 */
			 		
		}	
	} else {
			unset($_SESSION["EDPOSV1MADD_infoID"]);
			unset($_SESSION["EDPOSV1MADD_Mid"]);
			unset($_SESSION["EDPOSV1MADD_txtBarcode"]);	
			unset($_SESSION["EDPOSV1MADD_txtm_name"]);	
			unset($_SESSION["EDPOSV1MADD_kf_id"]);	
			unset($_SESSION["EDPOSV1MADD_unit1"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty1"]);
			unset($_SESSION["EDPOSV1MADD_unit2"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty2"]);
			unset($_SESSION["EDPOSV1MADD_unit1"]);
			unset($_SESSION["EDPOSV1MADD_unit2"]);
			unset($_SESSION["EDPOSV1MADD_unit3"]);
			unset($_SESSION["EDPOSV1MADD_unitNameQty3"]);
			unset($_SESSION["EDPOSV1MADD_txtm_Remark"]);	
			unset($_SESSION["EDPOSV1MADD_txtm_Remark1"]);	
			unset($_SESSION["EDPOSV1MADD_txtm_Remark2"]);	
			unset($_SESSION["EDPOSV1MADD_min_stock"]);
			unset($_SESSION["EDPOSV1MADD_minUnitID"]);
			unset($_SESSION["EDPOSV1MADD_Ingredient"]);
			unset($_SESSION["EDPOSV1MADD_mOpenStock"]);

		}
	$_SESSION["EDPOSV1MADD_txtprice1"]=0;
	$_SESSION["EDPOSV1MADD_txtprice12"]=0;
	$_SESSION["EDPOSV1MADD_txtprice2"]=0;
	$_SESSION["EDPOSV1MADD_txtprice22"]=0;
	$_SESSION["EDPOSV1MADD_txtprice3"]=0;
	$_SESSION["EDPOSV1MADD_txtprice32"]=0;
	$_SESSION["EDPOSV1MADD_txtBarcode2"]="";
	$_SESSION["EDPOSV1MADD_txtBarcode1"]="";
	
 	$rsRecipe1 = mysql_query("select * from v_recipe WHERE status_id IN (3) AND materialID ='$id' and info_id='$GetM_InfoID' and unitID='1' ");		
 	$rsRecipe2 = mysql_query("select * from v_recipe WHERE status_id IN (3) AND materialID ='$id' and info_id='$GetM_InfoID' and unitID='2' ");	
 	$rsRecipe3 = mysql_query("select * from v_recipe WHERE status_id IN (3) AND materialID ='$id' and info_id='$GetM_InfoID' and unitID='3' ");	
 	
	//$CountRecipe = nr_execute("SELECT COUNT(*) FROM v_recipe  WHERE status_id IN (3) AND materialID ='$id'  and info_id='$GetM_InfoID' ");
	//if ($CountRecipe > 0) {
		while ($rowR = mysql_fetch_array($rsRecipe3,MYSQL_ASSOC)) {
			$_SESSION["EDPOSV1MADD_txtBarcode3"]=$rowR['fd_Barcode'];
			$_SESSION["EDPOSV1MADD_txtFDID3"] = $rowR['fd_id'];
			$_SESSION["EDPOSV1MADD_txtRecieve3"] = $rowR['recipeID'];
			$_SESSION["EDPOSV1MADD_cy_id3"] = $rowR['cy_id'];
			if ($rowR['recipePrice']>0) { 
				$_SESSION["EDPOSV1MADD_txtprice3"]=number_format($rowR['recipePrice']);	
			} else if ($rowR['recipePrice']==0) {
				$_SESSION["EDPOSV1MADD_txtprice3"]=0;
			} 
			if ($rowR['recipePrice2']>0) {
				$_SESSION["EDPOSV1MADD_txtprice32"]=number_format($rowR['recipePrice2']);
			} else if ($rowR['recipePrice2']==0) {
				$_SESSION["EDPOSV1MADD_txtprice32"]=0;
			} 
		}		
	//}
	
		while ($rowR = mysql_fetch_array($rsRecipe2,MYSQL_ASSOC)) {
			$_SESSION["EDPOSV1MADD_txtBarcode2"]=$rowR['fd_Barcode'];
			$_SESSION["EDPOSV1MADD_txtFDID2"] = $rowR['fd_id'];
			$_SESSION["EDPOSV1MADD_txtRecieve2"] = $rowR['recipeID'];
			$_SESSION["EDPOSV1MADD_cy_id2"] = $rowR['cy_id'];
			if ($rowR['recipePrice']>0) { 
				$_SESSION["EDPOSV1MADD_txtprice2"]=number_format($rowR['recipePrice']);	
			} else if ($rowR['recipePrice']==0) {
				$_SESSION["EDPOSV1MADD_txtprice2"]=0;
			} 
			if ($rowR['recipePrice2']>0) {
				$_SESSION["EDPOSV1MADD_txtprice22"]=number_format($rowR['recipePrice2']);
			} else if ($rowR['recipePrice2']==0) {
				$_SESSION["EDPOSV1MADD_txtprice22"]=0;
			} 
		}
		
		
		while ($rowR = mysql_fetch_array($rsRecipe1,MYSQL_ASSOC)) {
			$_SESSION["EDPOSV1MADD_txtBarcode1"]=$rowR['fd_Barcode'];
			$_SESSION["EDPOSV1MADD_txtFDID1"] = $rowR['fd_id'];
			$_SESSION["EDPOSV1MADD_txtRecieve1"] = $rowR['recipeID'];
			$_SESSION["EDPOSV1MADD_cy_id1"] = $rowR['cy_id'];
			if ($rowR['recipePrice']>0) { 
				$_SESSION["EDPOSV1MADD_txtprice1"]=number_format($rowR['recipePrice']);	
			} else if ($rowR['recipePrice']==0) {
				$_SESSION["EDPOSV1MADD_txtprice1"]=0;
			} 
			if ($rowR['recipePrice2']>0) {
				$_SESSION["EDPOSV1MADD_txtprice12"]=number_format($rowR['recipePrice2']);
			} else if ($rowR['recipePrice2']==0) {
				$_SESSION["EDPOSV1MADD_txtprice12"]=0;
			} 
		}

function selkindfood($SelInfoID){
	return mysql_query(" select * from tb_kind_food WHERE status_id=3 and info_id='$SelInfoID' ");
}

 function LoadCurrentcy(){
 	return mysql_query("select * from tb_currency ");	 
}

function LoadInfo() { 
    return mysql_query("select distinct info_id, info_name, info_id from tb_info WHERE status_id IN (1)  ");
}
