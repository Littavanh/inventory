<?php

$userId = $_SESSION['EDPOSV1user_id'];
function loadAddjustHistory()
{
    $userId = $_SESSION['EDPOSV1user_id'];
    //    echo '<script>alert("'.$where.'")</script>';

    return mysql_query("select * from v_export_ where return_approver='$userId' and status_get_id = 5  group by `transferID` order by traDID DESC");
}

?>