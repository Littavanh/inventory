<?php
	
	$openID = mysql_real_escape_string(stripslashes($_GET['openID']));
	 

	//================

	//=======Load Open Date
	function LoadOpenDate($openID) {
		return mysql_query("select * from v_opendate WHERE openID='$openID' ");
	}
 
	$resultCur = LoadOpenDate($openID);
	while($rowC = mysql_fetch_array($resultCur, MYSQL_ASSOC)) {
		$openDate = $rowC['datetimeopen'];
		$openUser = $rowC['username']; 
		$openRemark = $rowC['remark']; 
		$closeDate = $rowC['datetimeclose']; 
		$closeUser = $rowC['usernameC']; 
		$closeRemark = $rowC['remark_close']; 
		$infoID_balance = $rowC['info_id']; 
	}
	
	//------------------------------------------------ Building search clause // 	
$whereclause = "";

if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
	$params .= "openID=$openID&infoID=$infoID_balance&";
 
//=======SUM material Open date
function OpenDate($openID) {
	return mysql_query("SELECT * from tb_opendate_d WHERE openID='$openID' and status_id = 1 and openTypeID=1 GROUP BY materialID, exp_date, pur_price  ");
}

//=======SUM material Close date
function CloseDate($openID) {
	return mysql_query("SELECT * from tb_opendate_d WHERE openID='$openID' and status_id = 1 and openTypeID=2 GROUP BY materialID, exp_date, pur_price  ");
}


$SumResult_open = OpenDate($openID);
$SumResult_close = CloseDate($openID);


