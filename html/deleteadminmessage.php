<?php
require_once("connection.php");
if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    //deleting completely from a table
    $sql = "DELETE FROM adminmessages WHERE id = '$id'";

    // $sql2 = "UPDATE `staffs` SET `statuss` = 0 WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header('location: ../html/usersdashboard.php');
    }else {
        header('location: ../html/usersdashboard.php');
    }
}else {
    $failed = "please login first";
    header('location: ../html/usersdashboard.php?error='.$failed);
}
?>