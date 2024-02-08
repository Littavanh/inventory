<?php

	$od_no = $_SESSION["EDPOSV1service_odno"];
	// -------------------------------------------	
$whereclause = "";
$whereclause .= " od_no = '$od_no'  AND ";
if ($whereclause != "") $whereclause = "WHERE  " . substr($whereclause, 0, strlen($whereclause)-5);


$params = "";
$params .= "od_no=$od_no&";	
	
// --------------------------------------------------------- Build Paging
$catcount = nr_execute("SELECT COUNT(*) FROM v_service_detail $whereclause");
		
function Loadservice_detail($whereclause) {
	return mysql_query("select * from v_service_detail $whereclause order by rd_id ");
}
$result = Loadservice_detail($whereclause);

