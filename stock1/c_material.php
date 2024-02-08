<?php
$user_id = $_SESSION["EDPOSV1user_id"];



if(isset($_GET["del_id"]) && isset($_SESSION['EDPOSV1role_id']) && $_SESSION['EDPOSV1role_id'] != 4){	
	$id = mysql_real_escape_string(stripslashes( base64_decode($_GET['del_id'])));
	$id = substr($id, 0, strlen($id)-11);
	$GetInfoID = mysql_real_escape_string(stripslashes( ($_GET['infoid'])));

	// get amount in stock
	

	// $sql = "UPDATE tb_material SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE materialID ='$id' and info_id='$GetInfoID' ";
	$sql = "DELETE FROM tb_material_   WHERE materialID ='$id' and info_id='$GetInfoID' ";
	$result = mysql_query($sql, $conn);	
	// delete transection
	$sql = "DELETE FROM tb_transactiond_   WHERE materialID ='$id' and info_id='$GetInfoID'";
	$result = mysql_query($sql, $conn);	
	// upate food list
		$rsRecipe = mysql_query("SELECT * FROM tb_recipe_ WHERE materialID ='$id' and info_id='$GetInfoID' ");	
		while($row = mysql_fetch_array($rsRecipe, MYSQL_ASSOC)) {
			$recipeID = $row['recipeID'];
			$fdID = $row['fd_id'];

			// recipe ID 
			//$sql = "UPDATE tb_recipe_ SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE recipeID ='$recipeID' and info_id='$GetInfoID' ";
			$sql = "DELETE FROM tb_recipe_   WHERE recipeID ='$recipeID' and info_id='$GetInfoID' ";
			$result = mysql_query($sql, $conn);	
			// fd list
			//$sql = "UPDATE tb_food_drink SET status_id = 20, user_edit = '$usr_id', date_edit = NOW() WHERE fd_id ='$fdID' and info_id='$GetInfoID'";
			$sql = "DELETE FROM tb_food_drink_   WHERE fd_id ='$fdID' and info_id='$GetInfoID'";
			$result = mysql_query($sql, $conn);	
			
			

		}
	
	 
	if($result){
		unlink("photos/".$image_name);
		header("Location: ?d=stock/material");
	}else{
		echo "<center><h2>ERROR Delete</h2></center>";
	}
}
  

$result = LoadPrice_setting($whereclause, $Get_infoID, "");