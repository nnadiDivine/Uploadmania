

<?php
require_once('../html/connection.php');
if(isset($_POST['submit'])){
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";

    if($email == "" || $password == "") {
       $error = urlencode("all fields are required");
       header("location: ../html/login.php?error=".$error);
       return false;
    }else{
        $email = trimData($email);
        $password = trimData($password);
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = urlencode("please enter a proper email");
        header("location: ../html/login.php?error=".$error);
        return false;
    }else {
        $new_pass = md5(md5(md5($password)));
        $sql = "SELECT * FROM users WHERE email = '$email' AND passwords = '$new_pass'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
                if (isset($_SESSION['id'])) {
                    setcookie('uploadmania', base64_encode(json_encode([ 'id' => $_SESSION['id']])), time() + (86400 * 120), "/");
                }else {
                    $failed = urlencode("email or password is incorrect");
                    header('loction: ../html/login.php?error='.$failed);
                    return false;
                }
                header("location: ../html/usersdashboard.php");
                return false;

            }
        }else {
            $error = 'user not found';
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

