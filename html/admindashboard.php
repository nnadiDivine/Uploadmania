<?php
require_once('connection.php');
session_start();
if (!isset($_SESSION['id'])) {
    header('location: index.php');
}
$id = $_SESSION['id'];
$fullname = $_SESSION['fullname'];
$sqle = "SELECT * FROM `admin` WHERE id = '$id'";
 $checke = mysqli_query($connect, $sqle);
 $rowe = mysqli_fetch_assoc($checke);
 $password = $rowe['password'];
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
    <link rel="stylesheet" href="../css/login2.css?v=<?php echo time(); ?>">
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
            <a class="add box"><i class="fas fa-comment-medical"></i><i class="i">Send Messages</i></a>
            <a class="cloud box"><i class="fas fa-comment-dots"></i><i class="i">View Messages</i></a>
            <a class="file box"><i class="fas fa-user"></i><i class="ie">View Users</i></a>
            <a class="setting"><i class="fas fa-gear"></i><i class="i">Setting</i></a>
            <a href="../html/adminlogout.php" class="black"><i class="fas fa-sign-out"></i><i class="i">LogOut</i></a>
            </div>
        </div>
        <div class="elements">
        <nav >
                <section class="flex" style="width: 100%;">
                <h1 class="fas fa-bars black"></h1>
                <h1 class="fas fa-close black" id="closeNav"></h1>
            <div class="flr">
                <a href="index.php"><i class="fas fa-home"></i></a>
            </div>
            </section>
            </nav>
            </nav>
            <div class="center">
                <div class="add-staff">
                <div class="title">
                    <h2>New Message</h2>
                </div>
                <div class="form-box nav-top">
    <form action="../html/adminmessage.php" method="POST" enctype="multipart/form-data">
      <input class="input" type="text" placeholder="Topic" required name="topic"><br>
      <textarea name="message" class="input" id="" cols="30" rows="10" placeholder="Message"></textarea>
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
      <button class="" type="submit" name="submit">Send</button>
    </form>
  </div>
                </div>
                <!-- View Staff Section  -->
                <div class="wrapper-div help-div2 box2" id="up">
                    <div class="title" id="myHeader">
                    <span><input type="text" name="keyword" id="search" placeholder="Search"><i class="fas fa-search"></i></span>
                        <h2>My Messages</h2>
                    </div>
                    <div id="table" class="table">
                        <?php
                        // $sqla = "SELECT * FROM `users` WHERE id = '$id'";
                        // $checka = mysqli_query($connect, $sqla);
                        //  while ($rowa = mysqli_fetch_assoc($checka)) {
                        //     $useremail = $rowa['email'];
                        // }
                         ?>
                        <?php
                        $sql = "SELECT * FROM usersmessages";
                        $check = mysqli_query($connect, $sql);
                        
                        $count = 0;
                            while ($row = mysqli_fetch_assoc($check)) {
                            $sqle = "SELECT * FROM users";
                            $checke = mysqli_query($connect, $sqle);
                            $rowe = mysqli_fetch_assoc($checke);
                                $count++;
                                $id = $row['ide'];
                                $fname = $row['name'];
                                $img = $rowe['img'];
                                $mail = $row['mail'];
                                $email = $rowe['email'];
                                $message = $row['message'];
                                
                                $picture;
                                $user;
                               if ($mail == $email) {
                                   $picture = $img;
                                   $user = "User";
                               }else {
                                   $picture = "../img/bubble.png";
                                   $user = "Not a user";
                               }
                              

                           

                            
                            ?>
                        <div class="table-datas" id="fresult">
                            <img src="../uploads/<?= $picture ?>" alt="" style="width: 10%; height: 100%; border-radius: 50px;" class="mr">
                            <div class="info">
                            <div style="width: 100%;"><b class="tname"><?= $fname?></b><a><?= $user?></a></div><br>
                            <div style="width: 100%;"><i><?= $message ?></i>
                            <a href="../html/deleteusersmessage.php?id=<?php echo base64_encode($id); ?>" class="fas fa-trash-can alert-danger"></a></div>
                            </div>
                            </div>
                        
                        <?php } ?>
                    </div>
                </div>
    
            <!-- uploaded files section  -->
            <div class="uploaded-div box2" id="up">
                <div class="title">
                <span><input type="text" name="keyword" id="search" placeholder="Search"><i class="fas fa-search"></i></span>
                    <h2>My Users</h2>
                </div>
                <div id="table" class="table">
                    <?php
                    $sql = "SELECT * FROM users";
                    $check = mysqli_query($connect, $sql);
                    $count = 0;
                        while ($row = mysqli_fetch_assoc($check)) {
                            $count++;
						 $id = $row['id'];
                            $fname = $row['fullname'];
                            $fnames = $row['img'];
                            $email = $row['email'];
                            // $si = $row['filesize'];

                            $picture;
                        //   if ($type == "image/png" || $type == "image/jpeg") {
                              $picture = $fnames;
                        //   }

                          if (strlen($fname) > 12) {
                              $fnamenew = substr_replace($fname, '...', 12);
                          }else{
                              $fnamenew = $fname;
                          }

                          if (strlen($email) > 12) {
                            $emailnew = substr_replace($email, '...', 12);
                        }else{
                            $emailnew = $email;
                        }
                          ?>
                    <div class="table-datas" id="fresult">
                        <img src="../uploads/<?= $picture ?>" alt="" style="width: 100%; height: 100%;">
                        <div class="info">
                        <p class="tname"><?= $fnamenew?></p>
                        <i><?= $emailnew ?></i>
                        <a href="../html/deleteusers.php?id=<?php echo base64_encode($id); ?>" class="fas fa-trash-can alert-danger"></a>
                        </div>
                        </div>
                    
                    <?php } ?>
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
                    <form action="../html/editsub.php" method="POST" class="Signup-form">
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
                    <form action="../html/pasedite.php" method="POST" class="Signup-form">
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
				</div>
                    <div class="form-group">
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
                    <form action="../html/addpick.php" method="POST" enctype="multipart/form-data" class="Signup-form">
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

				
                
            </div>
            </div>
        </div>
    </section>
</body>
<script src="../javascript/script2.js?v=<?php echo time(); ?>"></script>
<script src="../javascript/jquery-3.2.1.min.js?v=<?php echo time(); ?>"></script>
<script>
    let fresult = document.querySelector('#fresult');
	let input = document.querySelector('#search');
	let body = document.querySelector('#table');
    let bool = false;

    




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

    
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

    
</script>
</html>