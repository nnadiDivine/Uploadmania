<?php
    require_once('connection.php');

    if (isset($_POST['submit'])) {
        $password = isset($_POST['password'])?trim($_POST['password']): '';
        $conpassword = isset($_POST['conpassword'])?trim($_POST['conpassword']): '';
        $email = $_POST['email'];

        if ($password == "" || $conpassword == "") {
            $error = urldecode("all fields required");
            header("location: ../html/passwordresete.php?email=".$email."&error=".$error);
            return false;
        }
        if ($conpassword != $password) {
            $error = urldecode("password mixmatch");
            header("location: ../html/passwordresete.php?email=".$email."&error=".$error);
            return false;
        }else {
            $new_pass = md5($password);
            $sql = "UPDATE admin SET `password` = '$new_pass' WHERE `email` = '$email'";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                $sucess = urldecode('password changed, now login with new password');
                header('location: ../html/adminlogin.php?success='.$sucess);
                return false;
            }else {
                $error = urldecode("error resetting password");
                header("location: ../html/passwordresete.php?email=".$email."&error=".$error);
                return false;
            }
        }
    }else {
        $error = urldecode('please login first');
        header('location: ../html/adminlogin.php?error='.$error);
        return false;
    }


function trimData($data){
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);

    return $data;
}
 ?>