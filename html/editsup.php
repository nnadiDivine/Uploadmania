<?php
    require_once('connection.php');
    if(isset($_POST['edit'])){
        $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : "";
        $id = $_POST['id'];

        if($fullname == "") {
           $error = urlencode("all fields are required");
           header("location: ../html/usersdashboard.php?id=".base64_encode($id)."&error=".$error);
           return false;
        }else{
            $fullname = trimData($fullname);
        }
             $sql = "UPDATE `users` SET `fullname` = '$fullname' WHERE `id` = '$id'";
              $result = mysqli_query($connect, $sql);
              if ($result) {
                  $success = urlencode("details updated (am sorry you will only notice the change of details when you logout and login again)");
                  header("location: ../html/usersdashboard.php?id=".base64_encode($id)."&success=".$success);
                  return false;
              }else{
                  $error = urlencode("error updating details");
                  header("location: ../html/usersdashboard.php?id=".base64_encode($id)."&error=".$error);
                  return false;
              }
    }else {
        $error = urlencode("please login firsrt");
        header("location: ../html/usersdashboard.php?id=".base64_encode($id)."&error=".$error);
        return false;
    }



    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

?>