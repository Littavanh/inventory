<?php

$TokenKey = $_SESSION['EDPOSV1TokenKey'];


if (isset($_POST["btnImport"])) {

    $load = UserList($TokenKey, "1", $api_url);
    foreach ($load as $row) {
        $userId = $row['empid'];
        $userName = $row['username'];
        $firstName = $row['firstName'];
        $lastName = $row['LastName'];
        $roleId = $row['roleid'];
        $passWord = md5('123456505uK5@v@y' . $userName);


        if (mysql_num_rows(mysql_query("SELECT * FROM tb_user WHERE username = '$userName' and status_id = 3")) == 0) {
            sql_execute("INSERT INTO tb_user(user_id,info_id, status_id,username,password,role_id, first_name,last_name,pricesaleID) 
        VALUES('$userId','1', 3,'$userName', '$passWord', '$roleId', '$firstName', '$lastName','$pricesaleID')");



        }



    }
echo '<script>alert("Import Success")</script>';
}

?>