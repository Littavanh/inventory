<?php

if (isset($_GET["del"])) {
    $id = $_GET['del'];


    $sql = "DELETE FROM tb_import_detail WHERE traDID ='$id'";

    $result = mysql_query($sql, $conn);
    if ($result) {


    } else {
        echo "<center><h2>ERROR Delete</h2></center>";
    }
}


if (isset($_POST["btnSubmitAgain"])) {
    $id = $_POST['txtTranID'];


    $sql = "UPDATE tb_import SET statusApprove_id='2' WHERE tranID ='$id'";

    $result = mysql_query($sql, $conn);
    if ($result) {
        $sql1 = "UPDATE tb_import_detail SET statusApprove_id='2' WHERE tranID ='$id'";

        $result1 = mysql_query($sql1, $conn);
        if ($result1) {
            header("Location: ?d=stock/recieveHistory");
        } else {
            echo "<center><h2>ERROR Delete</h2></center>";
        }
    } else {
        echo "<center><h2>ERROR Delete</h2></center>";
    }
}
?>