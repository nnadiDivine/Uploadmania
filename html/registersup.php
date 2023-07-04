<?php
    require_once('../html/connection.php');
    if(isset($_POST['submit'])){
        $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : "";
        $email = isset($_POST['email']) ? trim($_POST['email']) : "";
        // $username = isset($_POST['username']) ? trim($_POST['username']) : "";
        $password = isset($_POST['password']) ? trim($_POST['password']) : "";
        $conpassword = isset($_POST['conpassword']) ? trim($_POST['conpassword']) : "";

        if($fullname == "" || $email == "" || $password == "" || $conpassword == "") {
           $error = urlencode("all fields are required");
           header("location: ../html/register.php?error=".$error);
           return false;
        }else {
            $fullname = trimData($fullname);
            $email = trimData($email);
            $password = trimData($password);
            $conpassword = trimData($conpassword);
        }
      
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = urlencode("please enter a proper email");
            header("location: ../html/register.php?error=".$error);
            return false;
        }else{
            if ($password == $conpassword) {
                $new_pass = md5(md5(md5($conpassword)));
            }else{
                $error = urlencode("Passwords does not match");
                header("location: ../html/register.php?error=".$error);
                return false;
            }
            $check = "SELECT * FROM users WHERE email = '$email'";
            $check_result = mysqli_query($connect, $check);
            if (mysqli_num_rows($check_result) == 1) {
                $error = urlencode("email adress already taken");
            header("location: ../html/register.php?error=".$error);
            return false;
            }else {
                $sql = "INSERT INTO users(fullname, email, passwords) VALUES('$fullname', '$email', '$new_pass')";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    $success = urlencode("registration sucessful");
                    header("location: ../html/login.php?success=".$success);
                    return false;
                }else{
                    $error = urlencode("registration unsucessful");
                    header("location: ../html/register.php?error=".$error);
                    return false;
                }
            }
        }
    }else {
        $error = urlencode("please login firsrt");
        header("location: ../html/login.php?error=".$error);
        return false;
    }


    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

?>