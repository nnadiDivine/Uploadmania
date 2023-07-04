<?php
require_once("connection.php");
if (isset($_GET['id'])) {
    $id = base64_decode($_GET['id']);

    //deleting completely from a table
    $sql = "DELETE FROM users WHERE id = '$id'";

    // $sql2 = "UPDATE `staffs` SET `statuss` = 0 WHERE `id` = '$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        header('location: ../html/admindashboard.php');
    }else {
        header('location: ../html/admindashboard.php');
    }
}else {
    $failed = "please login first";
    header('location: ../html/admindashboard.php?error='.$failed);
}
?>