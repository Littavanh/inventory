<?php



$user_id = $_SESSION["EDPOSV1user_id"];

$bId = $_SESSION['bId'];
lineManager($TokenKey, $user_id, $api_url);
$lineManagerId = $_SESSION['LineManagerId'];

if (isset($_POST['btnConfirmReturn'])) {
  if (isset($_POST['type'])) {

    for ($i = 0; $i < count($_POST['type']); $i++) {

      $txttraDID = mysql_real_escape_string(stripslashes($_POST['txttraDID'][$i]));
      $txtUsed = mysql_real_escape_string(stripslashes($_POST['txtUsed'][$i]));
      $txtReturn = mysql_real_escape_string(stripslashes($_POST['txtReturn'][$i]));
      $txtRemark = mysql_real_escape_string(stripslashes($_POST['txtRemark'][$i]));
      // echo '<script>alert("' . $txtUsed . '")</script>';
      // echo '<script>alert("' . $txtReturn . '")</script>';
      // echo '<script>alert("' . $txtRemark . '")</script>';
      sql_execute("UPDATE tb_export_ SET status_get_id='5',qty_used= '$txtUsed',qty_return= '$txtReturn', return_approver= '$lineManagerId',date_return2= NOW(),remark_return= '$txtRemark' WHERE traDID='$txttraDID'");
    }
    // sql_execute("UPDATE tb_export_ SET status_get_id='$cb_status',date_get='$txtDateGet',user_add2='$user_id',po_file='$name1' WHERE `release`='$release'");
    // sql_execute("UPDATE tb_transactiond_ SET status_id='1' WHERE `release`='$release'");
  }
}



?>