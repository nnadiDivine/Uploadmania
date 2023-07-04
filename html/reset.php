<?php
    require_once('connection.php');
    if(isset($_POST['reset'])){
        $email = isset($_POST['email2']) ? trim($_POST['email2']) : "";


        if($email == "") {
           $error = urlencode("all fields are required");
           header("location: ../html/login.php?error=".$error);
           return false;
        }else{
            $email = trimData($email);
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = urlencode("please enter a proper email");
            header("location: ../html/login.php?error=".$error);
            return false;
        }else {
            $check = "SELECT * FROM users WHERE email = '$email'";
            $check_result = mysqli_query($connect, $check);
            if (mysqli_num_rows($check_result) == 1) {
                $to = $email;
                $subject = 'password recovery';
                $mailcontent = '
                    <div class="container">
                    div class="row">
                    <h3 class=text-center">VINE.CUM</h3>
                    <p>we got a request to reset your password, if this was you, click the link <b><i><a href="https://www.vine.cum/html/passwordreset.php?email='.$email.'"></a>Password Reset</a></i></b> to rest password or ignore and nothing will happen to your account </p>
                    </div>
                </div>
                ';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF=8" . "\r\n";
                $headers .= 'From: <support@vine.com>' . "\r\n";
                $sent = mail($to, $subject,$mailcontent,$headers);
                if ($sent) {
                    $sucess = urlencode("check your mail");
                    header("location: ../html/login.php?sucess=".$sucess);
                    return false;
                }else {
                    $error = urlencode("please check your network");
                    header("location: ../html/login.php?error=".$error);
                    return false;
                }
            }else {
                $error = urlencode("please enter a valid email");
                header("location: ../html/login.php?error=".$error);
                return false;
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