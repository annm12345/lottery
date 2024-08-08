<?php
require('connection.php');


if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
  date_default_timezone_set('Asia/Yangon');
  $added_on=date('Y-m-d h:i:s');

  $res=mysqli_query($con,"SELECT * FROM `admin` where `email`='$email'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $msg="Your email already exist";
  }else{
   mysqli_query($con,"INSERT INTO `admin`(`name`, `email`, `password`, `date`) VALUES ('$name','$email','$password','$added_on')");
   

  }
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(empty($_POST['email']))
    {
        $msg="Please enter user email";
    }
    else if(empty($_POST['password']))
    {
        $msg="Please enter user password";
    }
    else 
    {
        $res=mysqli_query($con,"select * from admin where email='$email' and password='$password'");
        $count=mysqli_num_rows($res);
        if($count>0)
        { 
            $row=mysqli_fetch_assoc($res);
            $_SESSION['LOT_ADMIN_LOGIN']='yes';
            $_SESSION['LOT_ADMIN_EMAIL']=$row['email'];
            $_SESSION['LOT_ADMIN_ID']=$row['id'];
            ?>
            <script>
            window.location.href='index.php';
            </script>
        <?php }
        else 
        {
            $msg="Please enter login correct detail";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Loterry MM| ADMIN</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area" id="login_container" style="height: 90vh;">

    <!--------------------------- Left Box ----------------------------->

       <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #030b30;">
           <div class="featured-image mb-3">
            <img src="assets/images/logo/raffle-ticket-png-png-royalty-free-event-ticket-icon-11562976855k9zv4xya40-removebg-preview.png" class="img-fluid" style="width: 250px;">
           </div>
           <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Ticket Sale</p>
           <small class="text-white text-wrap text-center" style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced To Be Winner Of Lottery.</small>
       </div> 

    <!-------------------- ------ Right Box ---------------------------->
        
        <div class="col-md-6 right-box" id="signin">
            <form action="" class="row align-items-center" method="post">
                <div class="header-text mb-4">
                    <h2>Hello, Sign In</h2>
                    <p>We are happy to have you back.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" name="email" required>
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="submit" class="btn btn-lg btn-primary w-100 fs-6" value="Login" name="login">
                </div>
                <div class="row">
                    <small>Don't have an account? <a href="#" onclick="toggleForms()">Sign Up</a></small>
                </div>
            </form>
        </div> 
        <div class="col-md-6 right-box" id="signup" style="display: none;">
            <form action="" class="row align-items-center" method="post">
                <div class="header-text mb-4">
                    <h2>Hello, Sign Up</h2>
                    <p>We are excited to have you join us.</p>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email Address" name="email" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Your Name" name="name" required>
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password">
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Agree to terms</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="submit" class="btn btn-lg btn-primary w-100 fs-6" name="signup" value="Sign Up">
                </div>
                <div class="row">
                    <small>Already have an account? <a href="#" onclick="toggleForms()">Sign In</a></small>
                </div>
            </form>
        </div>
    </div>

</body>
<script>
    function toggleForms() {
        var signinForm = document.getElementById('signin');
        var signupForm = document.getElementById('signup');

        if (signinForm.style.display === 'none') {
            signinForm.style.display = 'block';
            signupForm.style.display = 'none';
        } else {
            signinForm.style.display = 'none';
            signupForm.style.display = 'block';
        }
    }
</script>
</html>