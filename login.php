<?php
require('connection.php');


if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $birth=$_POST['birth'];
    $gender=$_POST['gender'];
    $nic=$_POST['nic'];
    $address=$_POST['address'];
    $password=$_POST['password'];
  date_default_timezone_set('Asia/Yangon');
  $added_on=date('Y-m-d h:i:s');

  $res=mysqli_query($con,"SELECT * FROM `user` where `phone`='$phone'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $msg="Your Name already exist";
  }else{
   mysqli_query($con,"INSERT INTO `user`(`name`, `phone`,`birth`,`gender`,`nic`,`address`,`password`, `date`) VALUES ('$name','$phone','$birth','$gender','$nic','$address','$password','$added_on')");
   

  }
}
if(isset($_POST['login'])){
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    if(empty($_POST['phone']))
    {
        $msg="Please enter user email";
    }
    else if(empty($_POST['password']))
    {
        $msg="Please enter user password";
    }
    else 
    {
        $res=mysqli_query($con,"select * from user where phone='$phone' and password='$password'");
        $count=mysqli_num_rows($res);
        if($count>0)
        { 
            $row=mysqli_fetch_assoc($res);
            $_SESSION['LOT_USER_LOGIN']='yes';
            $_SESSION['LOT_USER_PHONE']=$row['phone'];
            $_SESSION['LOT_USER_ID']=$row['id'];
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
    <title>Lottery MM</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area" id="login_container" style="height: 90vh;">

    <!--------------------------- Left Box ----------------------------->

    <!-------------------- ------ Right Box ---------------------------->
        
        <div class="col-md-6 right-box" id="signin">
            <form action="" class="row align-items-center" method="post">
                <div class="header-text mb-4">
                    <h2>မိဘမေတ္တာ Online ထီဆိုင်ကြီးမှ ကြိုဆိုပါတယ်</h2>
                    <p>ထီလက်မှတ်တွေဝယ်ယူပြီး ဆုကြီးများပိုင်ဆိုင်နိုင်ကြပါစေ</p>
                </div>
                <div class="input-group mb-3">
                    <input type="mobile" class="form-control form-control-lg bg-light fs-6" placeholder="ဖုန်းနံပါတ်" name="phone" required>
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
                    <h2>မိဘမေတ္တာ Online ထီဆိုင်ကြီးမှ ကြိုဆိုပါတယ်</h2>
                    <p>ထီလက်မှတ်တွေဝယ်ယူပြီး ဆုကြီးများပိုင်ဆိုင်နိုင်ကြပါစေ</p>
                </div>
                <div class="input-group mb-3">
                    <input type="mobile" class="form-control form-control-lg bg-light fs-6" placeholder="ဖုန်းနံပါတ်" name="phone" required>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="အမည်" name="name" required>
                </div>
                <div class="input-group mb-1" style="display:flex;flex-direction:column;">
                    <label for="birth" class="date-placeholder">မွေးနေ့</label>
                    <input type="date" id="birth" class="form-control form-control-lg bg-light fs-6" name="birth" style="width:100%;" required>
                </div>

                <script>
                    // Hide the label when the input field gets focus
                    document.querySelector('input[type="date"]').addEventListener('focus', function() {
                        document.querySelector('.date-placeholder').style.display = 'none';
                    });

                    // Show the label if the input field is empty when it loses focus
                    document.querySelector('input[type="date"]').addEventListener('blur', function() {
                        if (!this.value) {
                            document.querySelector('.date-placeholder').style.display = 'block';
                        }
                    });
                </script>
                <div class="input-group mb-1">
                    <input type="radio"  name="gender" value="male" required>Male
                    <input type="radio"  name="gender" value="female" required>FeMale
                </div>
                
                <div class="input-group mb-1">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="မှတ်ပုံတင်နံပါတ်မှန်ကန်စွာဖြည့်ပါ" name="nic" required>
                </div>
                <!-- <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="လိပ်စာအပြည့်အစုံ" name="address" required>
                </div> -->
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" id="password" required>
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Retype Password" name="retype_password" id="retype_password" required>
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
                    <input type="submit" class="btn btn-lg btn-primary w-100 fs-6" name="signup" value="Sign Up" id="signup_btn" disabled>
                </div>

                <script>
                    // Selecting password and retype_password input fields
                    var passwordInput = document.getElementById('password');
                    var retypePasswordInput = document.getElementById('retype_password');
                    var submitButton = document.getElementById('signup_btn');

                    // Function to check if password and retype_password match
                    function checkPasswordMatch() {
                        if (passwordInput.value === retypePasswordInput.value) {
                            submitButton.disabled = false;
                        } else {
                            submitButton.disabled = true;
                        }
                    }

                    // Adding event listeners to both input fields to trigger the checkPasswordMatch function on input
                    passwordInput.addEventListener('input', checkPasswordMatch);
                    retypePasswordInput.addEventListener('input', checkPasswordMatch);
                </script>

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