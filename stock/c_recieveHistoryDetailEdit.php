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

if (isset($_GET["edit"])) {
    $id = $_GET['edit'];


    $sql = "UPDATE tb_import_detail SET statusApprove_id='2' WHERE tranID ='$id'";

    $result = mysql_query($sql, $conn);
    if ($result) {
        header("Location: ?d=stock/recieveHistory");

    } else {
        echo "<center><h2>ERROR Delete</h2></center>";
    }
}

?>