<?php
$TokenKey =  $_SESSION['EDPOSV1TokenKey'];

function UserList($TokenKey,$lang,$api_url)
{
    $message='';
    
    $urlRoute = $api_url.'Inventory/UserList/';

   $jsonData = array(
       'TokenKey' => $TokenKey,
       'lang' => $lang
   );
   $arr = callAPI($jsonData, $urlRoute);    
   return $arr;
}

?>