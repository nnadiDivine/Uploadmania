<?php
    require_once('connection.php');
  
// if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];// file name
    $fileTmpName = $_FILES['file']['tmp_name'];//temporal location of the file
    $fileSize = $_FILES['file']['size'];//size of the file
    $fileError = $_FILES['file']['error'];// error message incase the file upload is broken
    $fileType = $_FILES['file']['type'];// type of file png,exe etc

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('png', 'jpg', 'jpeg', 'mp4', 'mp3', 'wav');

    if (in_array($fileActualExt, $allowed)) {
        // code to check if there was error
        if ($fileError === 0) {
            //code to check if file size is less than 1gb
            if ($fileSize < 80000000) {
                
                $fileNameNew = uniqid('', true).".".$fileActualExt;// creating a variable that generates random name for our files
                $fileDestination = '../uploads/'.$fileNameNew;// creating the varaiable that stores the file into uploads folder
                //move_uploaded_file($fileTmpName, $fileDestination); this will move the file location from its temporal location to fileDestination
                // header("Location: dashboard.php?uploadsuccess");
                if(move_uploaded_file($fileTmpName, $fileDestination)) {
                    // $sql = "INSERT INTO files VALUES '$id','$fileName','$fileNameNew', '$fileSize', '$fileType'";
                    $sql = "INSERT INTO `files` (`id`, `filenames`, `filesize`, `filetype`, `filename`) VALUES ('$id', '$fileNameNew', '$fileSize', '$fileType', '$fileName');";
                    // files(id,filename,filenames,filesize,filetype) VALUES(
                    $result = mysqli_query($connect, $sql);
                    if($result){
                        $success = "details uploaded";
                        header('location: usersdashboard.php?success=' .$success);
                        return false;
                    }else {
                        $error = "error saving details";
                        header('location: usersdashboard.php?error=' .$error);
                        return false;
                    }
                }else {
                    $error = "error moving files";
                    header('location: usersdashboard.php?error=' .$error);
                    return false;
                }
            }else {
                $error = "This file is too big";
                header('location: usersdashboard.php?' .$error);
                return false;
            }
        } else {
            $error = "There was an error uploading this file";
            header('location: usersdashboard.php?' .$error);
            return false;
        }
        
    } else{
        $error = "File format not supported.";
        header('location: usersdashboard.php?' .$error);
        return false;
    }
//  }
?>