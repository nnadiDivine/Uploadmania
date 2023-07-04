<?php
    require_once('connection.php');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//PASSWORDS
    if(isset($_POST['edite'])){
        $oldpassword = isset($_POST['oldpassword']) ? trim($_POST['oldpassword']) : "";
        $oldpassword = md5(md5(md5($oldpassword)));
        $newpassword = isset($_POST['newpassword']) ? trim($_POST['newpassword']) : "";
        $conpassword = isset($_POST['conpassword']) ? trim($_POST['conpassword']) : "";
        $id = $_POST['id'];
        $sqle = "SELECT * FROM `admin` WHERE id = '$id'";
        $result = mysqli_query($connect, $sqle);
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
       
        if($oldpassword == "" && $newpassword == "" && $conpassword == "") {
           $error = urlencode("all fields are required");
           header("location: ../html/admindashboard.php?id=".base64_encode($id)."&error=".$error);
           return false;
    }else{
        if($oldpassword === $password){
            if ($newpassword === $conpassword) {
                $oldpassword = trimData($oldpassword);
                $newpassword = trimData($newpassword);
                $conpassword = trimData($conpassword);
            }else{
                $error = urlencode("the paswords does not match");
               header("location: ../html/admindashboard.php?id=".base64_encode($id)."&error=".$error);
               return false;
            }
        }else{
            $error = urlencode("incorrect password");
            header("location: ../html/admindashboard.php?id=".base64_encode($id)."&error=".$error);
            return false;
        }
        }
           
            $conpassword = md5(md5(md5($conpassword)));
             $sql = "UPDATE `admin` SET `password` = '$conpassword' WHERE `id` = '$id'";
              $result = mysqli_query($connect, $sql);
              if ($result) {
                  $success = urlencode("details updated (am sorry you will only notice the change of details when you logout and login again)");
                  header("location: ../html/admindashboard.php?id=".base64_encode($id)."&success=".$success);
                  return false;
              }else{
                  $error = urlencode("error updating details");
                  header("location: ../html/admindashboard.php?id=".base64_encode($id)."&error=".$error);
                  return false;
              }
            
    }else {
        $error = urlencode("please login firsrt");
        header("location: ../html/admindashboard.php?id=".base64_encode($id)."&error=".$error);
        return false;
    }


    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

?>