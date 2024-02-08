<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];

$_SESSION['tranID'] = $_GET['tranID'];
$tranID = $_SESSION['tranID'];
$whereImportDetail = "where tranID='$tranID'";
function loadImportDetail($whereImportDetail)
{
    //    echo '<script>alert("'.$where.'")</script>';
    return mysql_query("select * from v_import_detail $whereImportDetail order by tranID DESC");
}
?>