<?php
    require_once('connection.php');

    if(isset($_POST['editee'])){
        $id = $_POST['id'];
        // $picname = isset($_POST['picname'])?trim($_POST['picname']): '';
        // if($picname == ""){
        //     $error = "please enter a caption";
        //     header('location: ../public/addpicture.php?error=' .$error);
        //     return false;
        // }else {
        //     $picname = trimData($picname);
        // }
        if(isset($_FILES)){
            $filename = $_FILES['pic']['name'];
            $fileTmp = $_FILES['pic']['tmp_name'];
            $filesize = $_FILES['pic']['size'];
            $filetype = $_FILES['pic']['type'];
            $fileext = explode('.', $filename);
            $fileactualext = strtolower(end($fileext));
            $allow = array('jpg','jpeg','png','gif');

            if(in_array($fileactualext, $allow)){
                if($filesize < 800000){
                    $pic = uniqid('',true).'.'.$fileactualext;
                    $filedestination = '../uploads/'.$pic;
                    if(move_uploaded_file($fileTmp, $filedestination)) {
                        $sql = "UPDATE `admin` SET `img` = '$pic' WHERE `id` = '$id'";
                        $result = mysqli_query($connect, $sql);
                        if($result){
                            $success = "details uploaded";
                            header('location: ../html/admindashboard.php?success=' .$success);
                            return false;
                        }else {
                            $error = "error saving details";
                            header('location: ../html/admindashboard.php?error=' .$error);
                            return false;
                        }
                    }else {
                        $error = "error moving error";
                        header('location: ../html/admindashboard.php?error=' .$error);
                        return false;
                    }
                }else {
                    $error = "file too large (8mb and below)";
                    header('location: ../html/admindashboard.php?error=' .$error);
                    return false;
                }
            }else {
                $error = "please upload an image";
                header('location: ../html/admindashboard.php?error=' .$error);
                return false;
            }
        }
    }else{
        $error = "please log in first";
        header('location: ../html/adminlogin.php?error=' .$error);
        return false;
    }



















    function trimData($data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);

        return $data;
    }

?>