<?php

$user_id = $_SESSION["EDPOSV1user_id"];
$isOrderer = $_SESSION['EDPOSV1isOrderer'];
$TokenKey = $_SESSION['EDPOSV1TokenKey'];

lineManager($TokenKey, $user_id, $api_url);
$lineManagerId = $_SESSION['LineManagerId'];
function loadApprovalSetting($approve_level, $status_approve_id)
{
    return mysql_query("select * from tb_approval_setting where approve_level ='$approve_level' and status_approve_id = '$status_approve_id'");
}



if (isset ($_GET["approve"])) {
    $tranID = $_GET["approve"];


    $load = mysql_query("select * from tb_import where tranID='$tranID'");

    while ($row = mysql_fetch_array($load, MYSQL_ASSOC)) {
        $approve_level = $row['level'];
        $approve_level_as = $row['level'] + 1;
        $status_approve_id = $row['statusApprove_id'];
        // echo '<script>alert("'.$approve_level.'")</script>';
        $check = loadApprovalSetting($approve_level_as, $status_approve_id);

        while ($rowcheck = mysql_fetch_array($check, MYSQL_ASSOC)) {
            $row_userId = $rowcheck['userId'];
            if ($rowcheck['userId'] == 0) {
                $row_userId = $lineManagerId;
            }


            // echo '<script>alert("'.$row_userId.'")</script>';
        }

        $checkMax = mysql_query("select max(approve_level) from tb_approval_setting where status_approve_id = '$status_approve_id'");
        while ($rowcheckMax = mysql_fetch_array($checkMax, MYSQL_ASSOC)) {

            $maxLevel = $rowcheckMax['max(approve_level)'];
            // echo '<script>alert("MaxLevel:'.$maxLevel.'")</script>';
        }

        if ($maxLevel == $approve_level) {
            // echo '<script>alert("MaxLevel=approve_level")</script>';
            $sql = "INSERT INTO tb_transactionh(tranID, traDate, reciever, remark, status_id, user_add, date_add, active_id, openID, supplierID, info_id,bill_no,bill_date,whouse_no,whouse_date,po_no,po_date,lot_no,po_file) 
    SELECT tranID, NOW(), reciever, remark, '1',user_add,NOW(),1,openID, supplierID, info_id,bill_no,bill_date,whouse_no,whouse_date,po_no,po_date,lot_no,po_file FROM tb_import WHERE tranID='$tranID' ";
            $resultH = mysql_query($sql, $conn);
            // echo '<script>alert("'.$resultH.'")</script>';
            if ($resultH) {
                sql_execute("INSERT INTO tb_transactiond(tranID, date_tran, exp_date, materialID, unitQty3, tranType, user_add, date_add,status_id, 
        staffName, Dremark, pur_price,sale_price, receive_dis, location_addr, info_id,
        bill_no, bill_date, whouse_no, whouse_date, po_no, po_date, cur_id, lot_no,po_file) 
    select 	tranID, NOW(), exp_date, materialID, unitQty3, tranType, user_add, NOW(),status_id, 
        staffName, Dremark, pur_price,sale_price, receive_dis, location_addr, info_id,
        bill_no, bill_date, whouse_no, whouse_date, po_no, po_date, cur_id, lot_no,po_file
    from tb_import_detail WHERE tranID='$tranID'");

                sql_execute("UPDATE tb_import SET statusApprove_id='1' WHERE tranID='$tranID'");
                sql_execute("UPDATE tb_import_detail SET statusApprove_id='1' WHERE tranID='$tranID'");
                sql_execute("INSERT INTO tb_approve_history (transferID,approve_level,user_id,remark,user_add,date_add,status_approve_id) VALUES ('$tranID','$approve_level','$user_id','','$user_id',NOW(),'$status_approve_id')");

                //    echo '<script>alert("ss")</script>';
            }


        } else if ($maxLevel > $approve_level) {
            // echo '<script>alert("MaxLevel>approve_level")</script>';
            sql_execute("UPDATE tb_import SET `level`=$approve_level + 1,approver_id='$row_userId' WHERE tranID='$tranID'");

            sql_execute("INSERT INTO tb_approve_history (transferID,approve_level,user_id,remark,user_add,date_add,status_approve_id) VALUES ('$tranID','$approve_level','$user_id','','$user_id',NOW(),'$status_approve_id')");

        }

    }

}

if (isset ($_POST["btnSave"])) {
    $tranID = $_POST['txtTranID'];
    $remarkReject = $_POST['txtRemarkReject'];

    sql_execute("UPDATE tb_import SET statusApprove_id='4',remark_reject='$remarkReject' WHERE tranID='$tranID'");
    sql_execute("UPDATE tb_import_detail SET statusApprove_id='4' WHERE tranID='$tranID'");

}
?>