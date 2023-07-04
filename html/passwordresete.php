<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/adminlogin.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="../fontawesome6/css/all.css?v=<?php echo time(); ?>">
</head>
<body>
    <section class="nav flex">
    <aside>
        <a href="../html/index.php"><div class="logo">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
<style type="text/css">
.st0{fill:#76C2AF;}
.st1{opacity:0.2;}
.st2{fill:#231F20;}
.st3{fill:#FFFFFF;}
</style>
<g id="Layer_1">
<g>
    <circle class="st0" cx="32" cy="32" r="32"/>
</g>
<g class="st1">
    <g>
        <path class="st2" d="M48,32c0-8.8-7.2-16-16-16c-7.5,0-13.8,5.2-15.5,12.1C11.7,28.9,8,33,8,38c0,5.5,4.5,10,10,10h8
            c1.1,0,2-0.9,2-2v-5.5c0-0.8-0.7-1.5-1.5-1.5h-3.1c-1.5,0-1.9-1-0.9-2.2l7.7-9.8c1-1.2,2.6-1.2,3.5,0l7.7,9.8
            c1,1.2,0.6,2.2-0.9,2.2h-3.1c-0.8,0-1.5,0.7-1.5,1.5V46c0,1.1,0.9,2,2,2h10c4.4,0,8-3.6,8-8S52.4,32,48,32z"/>
    </g>
</g>
<g>
    <g>
        <path class="st3" d="M48,30c0-8.8-7.2-16-16-16c-7.5,0-13.8,5.2-15.5,12.1C11.7,26.9,8,31,8,36c0,5.5,4.5,10,10,10h8
            c1.1,0,2-0.9,2-2v-5.5c0-0.8-0.7-1.5-1.5-1.5h-3.1c-1.5,0-1.9-1-0.9-2.2l7.7-9.8c1-1.2,2.6-1.2,3.5,0l7.7,9.8
            c1,1.2,0.6,2.2-0.9,2.2h-3.1c-0.8,0-1.5,0.7-1.5,1.5V44c0,1.1,0.9,2,2,2h10c4.4,0,8-3.6,8-8S52.4,30,48,30z"/>
    </g>
</g>
</g>
<g id="Layer_2">
</g>
</svg>
<h1 class="">UPLOAD MANIA</h1></div></a>
<h1 class="fas fa-bars" id="open"></h1>
<h1 class="fas fa-close" id="close"></h1>
</aside>
        <nav class="nav-sect" id="nav">
            <div class="nav-links">
                <a href="">Terms & Conditions</a>
                <a href="">Help</a>
                <a href="contact.php">Contact Us</a>
                <a href="">Privacy Policy</a>
                <a href="login.php" class="button">Login & SignUp</a>
            </div>
        </nav>
    </section>

    <!-- Login Section -->
    <section class="form-sect2" id="log-el">
      <div class="form-box nav-top">
        <h3 class="">Reset Password</h3>
        <p class="p">Welcome its good to have you back</p>
        <form action="../html/passwordsub.php" method="POST">
          <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>"><br>
          <input class="" type="text" placeholder="Password" required name="password"><br>
          <input class="" type="text" placeholder="Confirm Password" required name="conpassword"><br>
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
                <div class="text-center">
				</div>
          <button class="" type="submit" name="submit">Submit</button>
        </form>
      </div>
    </section>
    </form>



</body>
<script src="../javascript/index.js"></script>
<script>
let openNave = document.getElementById('open');
let closeNave = document.getElementById('close');
let nav = document.getElementById('nav');

console.log(openNave);
openNave.onclick = () => {
    nav.style.display="block"
    openNave.style.display="none"
    closeNave.style.display="block"
}
closeNave.onclick = () => {
    nav.style.display="none"
    openNave.style.display="block"
    closeNave.style.display="none"
}
console.log("hi");
</script>
</html>