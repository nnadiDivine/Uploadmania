<?php
require_once('connection.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
$id = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$sqle = "SELECT * FROM `users` WHERE id = '$id'";
 $checke = mysqli_query($connect, $sqle);
 $rowe = mysqli_fetch_assoc($checke);
 $password = $rowe['passwords'];
 $img = $rowe['img'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../fontawesome6/css/all.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/usersdashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
</head>
<body>

    <section class="flex">
        <div class="inner-dashboard">
        <div class="dashboard">
            <div class="dashboard-pic">
            <!-- <i class="fas fa-user-circle"></i><br> -->
            <!-- <div class="gallery"></div> -->
            <img src="../uploads/<?= $img ?>" alt="" style="width: 60%; height: 60%; border-radius: 100px;">
            <p><?= $fullname?></p>
            </div>
            
        </div>
        <div class="dashboard-icon">
            <a class="cloud box"><i class="fas fa-cloud-upload-alt"></i><i class="i">Add File</i></a>
            <a class="file box"><i class="fas fa-file-alt"></i><i class="ie">My Files</i></a>
            <a class="help box"><i class="fas fa-question"></i><i class="ie">Help</i></a>
            <a class="setting"><i class="fab fa-whmcs"></i><i class="i">Setting</i></a>
            <a href="../html/logout.php" class="black"><i class="fas fa-sign-out"></i><i class="i">LogOut</i></a>
            </div>
        </div>
        <div class="elements">
            <nav >
                <section class="flex">
                <h1 class="fas fa-bars black"></h1>
                <h1 class="fas fa-close black" id="closeNav"></h1>
            <div class="flr">
                <a href="indexe.php"><i class="fas fa-home"></i></a>
            <i class="fas fa-bell gold message" id="bell"></i>
            </div>
            </section>
            </nav>
            <div class="center">
            <!-- upload section  -->
        <div class="wrapper-div box2">
        <div class="wrapper">
        <!-- <header>File Uploader Javascript</header> -->
        <form action="../html/uploads.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" id="file" class="file-input" hidden>
        <i class="fas fa-cloud-upload-alt"></i>
        <p>Browse File To Upload</p>
        <input type="hidden" name="id" value="<?= $id ?>">
        <!-- <button name="submit">name</button> -->
        </form>
        <section class="progress-area"></section>
        <section class="uploaded-area"></section>
    </div>
    </div>
    
            <!-- uploaded files section  -->
            <div class="uploaded-div box2" id="up">
                <div class="title" id="myHeader">
                <span><input type="text" name="keyword" id="search" placeholder="Search"><i class="fas fa-search"></i></span>
                    <h2>My Uploads</h2>
                </div>
                <div id="table" class="table">
                    <?php
                    $sql = "SELECT * FROM files WHERE id = '$id'";
                    $check = mysqli_query($connect, $sql);
                    $count = 0;
                        while ($row = mysqli_fetch_assoc($check)) {
                            $count++;
                            $id = $row['mainid'];
                            $fname = $row['filename'];
                            $fnames = $row['filenames'];
                            $type = $row['filetype'];
                            $si = $row['filesize'];

                            $picture;
                          if ($type == "image/png" || $type == "image/jpeg") {
                              $picture = $fnames;
                          }else if ($type == "audio/wav" || $type == "audio/mp3") {
                              $picture = "music.png";
                          }else if ($type == "video/mp4") {
                            $picture = "video.webp";
                          }else{
                              $picture = "file.png";
                          }

                          $fnamenew = $fname;
                          if (strlen($fname) > 12) {
                              $fnamenew = substr_replace($fname, '...', 12);
                          }
                          ?>
                    <div class="table-datas" id="fresult">
                        <img src="../uploads/<?= $picture ?>" alt="" style="width: 100%; height: 70%;">
                        <div class="info">
                        <div style="width: 100%;"><i class="tname"><?= $fnamenew?></i><a class="fas fa-ellipsis-vertical drop" id="drop"></a></div>
                        <div style="width: 100%;" class="mtee"><i><?= convert_filesize($si)?></i>
                        <a href="../html/deletefiles.php?id=<?php echo base64_encode($id); ?>" class="fas fa-trash-can alert-danger"></a>
                        <a href="../uploads/<?= $fnames?>" class="fas fa-download mr" download></a></div>
                        
                        </div>
                        <div class="dropdown-content">
                                    <p><?= $fname?></p>
                                    <p class="mtee">File type: <?= $type?></p>
                            </div>
                      
                        </div>
                        
                        
                    
                    <?php } ?>
                    <?php
                      function convert_filesize($bytes, $decimals = 2){
                        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
                        $factor = floor((strlen($bytes) - 1) / 3);
                        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
                    }
                    ?>
                </div>
            </div>

            <!-- HELP SECTION  -->
            <div class="help-div box2">
                <div class="title">
                    <h2>Help</h2>
                </div>
                <div class="border-bottom">
              <h3>Uploadind A File</h3>
              <p>Step one click on the add file section</p>
              <p>Step two click on the box that says Browse file to upload</p>
              <p>Step three Select the file you want to upload</p>
              <p>Step four once the file has been uploaded click on the My Files section</p>
              <p>Refresh your browser and you shoud be able to view you file there.</p>
              </div>  
              <div class="border-bottom">
              <h3>Updating Account Details</h3>
              <p>Step one click on the add file section</p>
              <p>Step two click on the box that says Browse file to upload</p>
              <p>Step three Select the file you want to upload</p>
              <p>Step four once the file has been uploaded click on the My Files section</p>
              <p>Refresh your browser and you shoud be able to view you file there.</p>
              </div>
              <div class="border-bottom">
              <h3>Uploadind A File</h3>
              <p>Step one click on the add file section</p>
              <p>Step two click on the box that says Browse file to upload</p>
              <p>Step three Select the file you want to upload</p>
              <p>Step four once the file has been uploaded click on the My Files section</p>
              <p>Refresh your browser and you shoud be able to view you file there.</p>
              </div>
            </div>

            <!-- setting SECTION  -->
            <div class="setting-div box2">
                <div class="set-mini">
                <section class="flex">
                <div class="change-password" id="modalBtn">
                    <h1 class="fas fa-user-pen"></h1>
                    <p>Change Fullname</p>
                </div>
                <div id="simpleModal" class="modal">
                    <div class="modalContent">
                        <span class="closeBtn">&times;</span>
                    <form action="../html/editsup.php" method="POST" class="Signup-form">
                    <div class="signUp" id="signUp">
                        <h3 class="text-center mt-3 white">Change Fullname</h3>
                        <div class="form-group">
					<label>Fullname: </label>
					<input type="text" name="fullname" style="border: 1px solid #222; padding: 10px 10px;" class="form-control" value="<?php echo $fullname ?>">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
                        <button name="edit" class="form-btn mt-3">Change</button>
                    </div>
                    </form>
                    </div>
                </div>
                <div class="change-password" id="modalBtn2">
                <h1 class="fas fa-user-lock"></h1>
                    <p>change password</p>
                </div>
                <div id="simpleModal2" class="modal">
                    <div class="modalContent">
                        <span class="closeBtn2">&times;</span>
                    <form action="../html/pasedit.php" method="POST" class="Signup-form">
                    <div class="signUp" id="signUp">
                        <h3 class="text-center mt-3 white">Change Password</h3>
                        <div class="form-group">
					<label>Old Password: </label>
					<input type="text" name="oldpassword" style="border: 1px solid #222; padding: 10px 10px;" class="form-control" value="">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
                <div class="form-group">
					<label>New Password: </label>
					<input type="text" name="newpassword" style="border: 1px solid #222; padding: 10px 10px;" class="form-control" value="">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>    <div class="form-group">
					<label>Confirm Password: </label>
					<input type="text" name="conpassword" style="border: 1px solid #222; padding: 10px 10px;" class="form-control" value="">
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
                        <button name="edite" class="form-btn mt-3">Change</button>
                    </div>
                    </form>
                    </div>
                </div>
                </section>
                <div class="change-password mt ma" id="modalBtn3">
                <h1 class="fas fa-users-viewfinder"></h1>
                    <p>Change Picture</p>
                </div>
                <div id="simpleModal3" class="modal">
                    <div class="modalContent">
                        <span class="closeBtn3">&times;</span>
                    <form action="../html/addpic.php" method="POST" enctype="multipart/form-data" class="Signup-form">
                    <div class="signUp" id="signUp">
                        <h3 class="text-center mt-3 white">Change Picture</h3>
                        <div class="form-group">
                    <div class="hinput">
					<input type="file" name="pic" id="gallery-photo-add" class="form-control1">
                    </div>
					<input type="hidden" name="id" value="<?php echo $id ?>">
				</div>
                        <button name="editee" class="form-btn mt-3">Change</button>
                    </div>
                    </form>
                    </div>
                </div>

                </div>
				<div class="form-group">
					<?php if(isset($_GET['error'])) {?>
					<div class="alert alert-danger">
						<?=urldecode($_GET['error'])?>
					</div>
					<?php } elseif(isset($_GET['success'])) { ?>
					<div class="alert alert-success">
						<?=urldecode($_GET['success'])?>
					</div>
					<?php } ?>
				</div>
                
            </div>
              <!-- View Staff Section  -->
              <div class="wrapper-div help-div2 box2" id="up">
                <div class="title">
                <span><input type="text" name="keyword" id="search" placeholder="Search"><i class="fas fa-search"></i></span>
                    <h2>My Messages</h2>
                </div>
                <div id="table" class="table">
                    <?php
                    $sql = "SELECT * FROM adminmessages";
                    $check = mysqli_query($connect, $sql);
                    $count = 0;
                        while ($row = mysqli_fetch_assoc($check)) {
                            $count++;
						 $id = $row['id'];
                            $fullname = $row['fullname'];
                            $topic = $row['topic'];
                            $fnames = $row['img'];
                            $message = $row['message'];
                            // $si = $row['filesize'];

                          

                         
                          ?>
                    <div class="table-datas one" id="fresult">
                        <div style="width: 10%; height: 100%; border-radius: 50px; text-align: center;">
                        <img src="../uploads/<?= $fnames ?>" alt="" style="width: 100%; height: 100%; border-radius: 50px;" class="mr"><br>
                        <!-- <p class="tnamee"><?= $fullname?></p> -->
                        </div>
                        <div class="info">
                        <div style="width: 100%;"><b class="tname"><?= $topic?></b></div><br>
                        <div style="width: 100%;"><i><?= $message?></i>
                        <a href="../html/deleteadminmessage.php?id=<?php echo base64_encode($id); ?>" class="fas fa-trash-can alert-danger"></a></div>
                        </div>
                        </div>
                    
                    <?php } ?>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
<script src="../javascript/script.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/jquery-3.2.1.min.js?v=<?php echo time(); ?>"></script>
<script>
    let fresult = document.querySelector('#fresult');
	let input = document.querySelector('#search');
	let body = document.querySelector('#table');
	let one = document.querySelector('.one');
	let bell = document.querySelector('#bell');
    let bool = false;

    
    if (one.innerHTML == 1) {
        bell.classList.add("fa-bounce");
    }



    input.oninput = () => {
        let val = input.value;
        let row = document.querySelectorAll('#table .table-datas');
        row.forEach(element => {
            if ((element.querySelector('.tname').innerHTML.toLowerCase().trim()).indexOf(val.toLowerCase().trim()) != -1) {
                element.style.display  = ""
                // body.style.background="var(--c5)";
            }else {
                element.style.display  = "none";
                // bool = true;
                // body.style.background="black";
            }
        });
    }

    if (table.innerHTML == "") {
        // Object.assign(body.style,{background="black",width="100%",height="100%"});
        body.style.background="black";
        // body.style.width="100%";
        // body.style.height="100%";
    }

    let block = document.querySelectorAll("#drop");
    // let body = document.querySelectorAll("#table");
   block.forEach(element => {
       element.onclick = () => {
        //    console.log(element.parentElement.parentElement);
        element.parentElement.parentElement.parentElement.querySelector(".dropdown-content").style.bottom="0px";
        element.style.color="var(--c2)";
    }
    element.ondblclick = () => {
        element.parentElement.parentElement.parentElement.querySelector(".dropdown-content").style.bottom="-100px";
        element.style.color="black";
    }
   });
    // block.
    


</script>
</html>