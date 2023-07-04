<?php
    require_once('../html/connection.php');
    if(isset($_POST['submit'])){
        $message = isset($_POST['message']) ? trim($_POST['message']) : "";
        $topic = isset($_POST['topic']) ? trim($_POST['topic']) : "";

        if($message == "" || $topic == "") {
           $error = urlencode("all fields are required");
           header("location: ../html/admindashboard.php?error=".$error);
           return false;
        }else {
            $message = trimData($message);
            $topic = trimData($topic);
        }
      
        // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $error = urlencode("please enter a proper email");
        //     header("location: ../html/admindashboard.php?error=".$error);
        //     return false;
        // }else{
        //     if ($password == $conpassword) {
        //         $new_pass = md5(md5(md5($conpassword)));
        //     }else{
        //         $error = urlencode("Passwords does not match");
        //         header("location: ../html/admindashboard.php?error=".$error);
        //         return false;
        //     }
            $check = "SELECT * FROM admin";
            $check_result = mysqli_query($connect, $check);
            $row = mysqli_fetch_assoc($check_result);
            $fullname = $row['fullname'];
            // if (mysqli_num_rows($check_result) == 1) {
            //     $error = urlencode("email adress already taken");
            // header("location: ../html/admindashboard.php?error=".$error);
            // return false;
            // }else {
                $sql = "INSERT INTO adminmessages(message, fullname, topic) VALUES('$message', '$fullname', '$topic')";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    $success = urlencode("Message sent sucessful");
                    header("location: ../html/admindashboard.php?success=".$success);
                    return false;
                }else{
                    $error = urlencode("Message not sent");
                    header("location: ../html/admindashboard.php?error=".$error);
                    return false;
                }
            }
        // }
    else {
        $error = urlencode("please login firsrt");
        header("location: ../html/admindashboard.php?error=".$error);
        return false;
    }


    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

?>