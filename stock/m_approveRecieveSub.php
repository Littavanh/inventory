<?php
$TokenKey = $_SESSION['EDPOSV1TokenKey'];
$userId = $_SESSION['EDPOSV1user_id'];
$isOrderer = $_SESSION['EDPOSV1isOrderer'];
$isEmpInventory = $_SESSION['EDPOSV1isEmpInventory'];
if ($isEmpInventory == '1') {
    function loadImportPendingSub($isEmpInventory)
    {
           echo '<script>console.log("'.$isEmpInventory.'")</script>';
        return mysql_query("select * from v_import where approver_id IN ('$isEmpInventory',2613) and statusApprove_id='2' and inventype='2' order by traID DESC");
    }


} else {
    function loadImportPendingSub($userId)
    {
        //    echo '<script>alert("'.$where.'")</script>';
        return mysql_query("select * from v_import where approver_id='$userId' and statusApprove_id='2' and inventype='2' order by traID DESC");
    }

}




function lineManager($TokenKey, $userId, $api_url)
{

    $message = '';

    $ch = curl_init($api_url . 'Inventory/lineManager');

    $jsonData = array(
        'TokenKey' => $TokenKey,
        'userId' => $userId
    );


    $payload = json_encode($jsonData);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);


    $arr = json_decode($result, true);

    $_SESSION['StatusCode'] = $arr['StatusCode'];
    $_SESSION['ModelErrors'] = $arr['ModelErrors'];
    $_SESSION['IsSuccess'] = $arr['IsSuccess'];
    $_SESSION['CommonErrors'] = $arr['CommonErrors'];
    $_SESSION['LineManagerId'] = $arr['LineManagerId'];
    $_SESSION['LineManagerFullName'] = $arr['LineManagerFullName'];

    //    echo '<script>alert("'.$_SESSION['LineManagerId'].'")</script>';



}
?>