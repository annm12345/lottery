<?php
require('../connection.php');

$msg='';
if(isset($_POST['request'])){
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $nic=$_POST['nic'];
   $password=$_POST['password'];
   date_default_timezone_set('Asia/Yangon');
   $added_on=date('Y-m-d h:i:s');

   $res=mysqli_query($con,"SELECT * FROM `user` where `phone`='$phone'");
   $check=mysqli_num_rows($res);
   if($check>0){
      $u_res=mysqli_query($con,"SELECT * FROM `user` where `phone`='$phone' AND `name`='$name'");
      $u_check=mysqli_num_rows($u_res);
      if($u_check>0){
         $n_res=mysqli_query($con,"SELECT * FROM `user` where `phone`='$phone' AND `name`='$name' AND `nic`='$nic'");
         $n_check=mysqli_num_rows($n_res);
         if($n_check>0){
         mysqli_query($con,"INSERT INTO `forget`(`name`, `phone`, `nic`, `password`, `date`, `comfirm`) VALUES ('$name','$phone','$nic','$password','$added_on','')");
            $msg="တောင်းဆိုမှုအောင်မြင်ပါသည် ADMIN team မှ စကားဝှက်အသစ်ပြင်ဆင်ထည့်သွင်းပေးပါလိမ့်မည်";
         }else{
            $msg="Your NIC is not exist in the system";
         }
      }else{
         $msg="Your Name is not exist in the system";
      }
      
   }else{
   
      $msg="Your phone number is not exist in the system";

 }
}
if(isset($_POST['signup'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $birth=$_POST['birth'];
    $gender=$_POST['gender'];
    $nic=$_POST['nic'];
    $address='';
    $password=$_POST['password'];
  date_default_timezone_set('Asia/Yangon');
  $added_on=date('Y-m-d h:i:s');

  $res=mysqli_query($con,"SELECT * FROM `user` where `phone`='$phone'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $msg="Your Phone number already exist";
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
            window.location.href='../index.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
     <div class="container">
        <div class="box">
        <div class="box-login" id="login">
            <div class="top-header">
                <h3>မိဘမေတ္တာ Online ထီဆိုင်ကြီးမှ ကြိုဆိုပါတယ်</h3>
                <small>ထီလက်မှတ်တွေဝယ်ယူပြီး ဆုကြီးများပိုင်ဆိုင်နိုင်ကြပါစေ</small>
            </div>
            <form method="post" action="" class="input-group">
                 <div class="input-field">
                    <input type="mobile" class="input-box" id="phone" name="phone" required>
                    <label for="phone">Phone</label>
                 </div>
                 <div class="input-field">
                    <input type="password" class="input-box" id="logPassword" name="password" required>
                    <label for="logPassword">Password</label>
                    <div class="eye-area">
                     <div  class="eye-box" onclick="myLogPassword()">
                      <i class="fa-regular fa-eye" id="eye"></i>
                      <i class="fa-regular fa-eye-slash" id="eye-slash"></i>
                   </div>
                 </div>
                 </div>
                 <div class="input-field">
                    <?php echo $msg ?>
                 </div>
                 <div class="input-field">
                    <input type="submit" class="input-submit" value="Login" name="login" required>
                 </div>
                 <div class="forgot">
                     <a href="#" id="forget">Forgot password?</a>
                  </div>

                  

                
            </form>

            <style>
                     /* Popup form styles */
                     .popup-form {
                        position: fixed;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: lightblue;
                        border-radius: 10px;
                        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                        padding: 20px;
                        z-index: 1000;
                        max-width: 350px;
                        width: 100%;
                        text-align: center;
                     }

                     .popup-form h2 {
                        font-size: 1.5rem;
                        margin-bottom: 20px;
                     }

                     .popup-form label {
                        display: block;
                        margin-bottom: 10px;
                        font-weight: bold;
                     }

                     .popup-form input{
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        margin-bottom: 20px;
                        box-sizing: border-box;
                     }

                     .popup-form input[type="submit"],
                     .popup-form a {
                        display: inline-block;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 5px;
                        background-color: #007bff;
                        color: #fff;
                        text-decoration: none;
                        cursor: pointer;
                        transition: background-color 0.3s;
                     }

                     .popup-form input[type="submit"]:hover,
                     .popup-form a:hover {
                        background-color: #0056b3;
                     }

                     .close {
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        font-size: 1.2rem;
                        color: #777;
                        cursor: pointer;
                     }
                  </style>

                  <!-- Popup form -->
                  <div id="passwordRequestForm" class="popup-form" style="display: none;">
                     <span class="close" id="closeForm">&times;</span>
                     <form action="" method="post">
                        <h2>Forgot Password?</h2>
                        <label for="name">ယခင်ဖြည့်သွင်းထားသောအမည်ဖြည့်သွင်းပါ</label>
                        <input type="text" id="email" name="name" required>
                        <label for="phone">ယခင်ဖြည့်သွင်းထားသောဖုန်းနံပါတ်ဖြည့်သွင်းပါ</label>
                        <input type="tel" id="email" name="phone" required>
                        <label for="phone">ယခင်ဖြည့်သွင်းထားသောမှတ်ပုံတင်ဖြည့်သွင်းပါ</label>
                        <input type="text" id="email" name="nic" required>
                        <label for="password">စကားဝှက်အသစ်ထည့်သွင်းပါ</label>
                        <input type="text" id="email" name="password" required>
                        <input type="submit" value="တောင်းဆိုမည်" name="request">
                        <!-- <a href="#" id="closeForm">Close</a> -->
                     </form>
                  </div>

                  <!-- Script to handle popup form display and close -->
                  <script>
                     document.getElementById('forget').addEventListener('click', function(event) {
                        event.preventDefault();
                        document.getElementById('passwordRequestForm').style.display = 'block';
                     });

                     document.getElementById('closeForm').addEventListener('click', function(event) {
                        event.preventDefault();
                        document.getElementById('passwordRequestForm').style.display = 'none';
                     });
                  </script>
         </div>

            <!---------------------------- register --------------------------------------->

            <form method="post" action="" class="box-register" id="register">
               <div class="top-header">
                  <h3>မိဘမေတ္တာ Online ထီဆိုင်ကြီးမှ ကြိုဆိုပါတယ်</h3>
                  <small>ထီလက်မှတ်တွေဝယ်ယူပြီး ဆုကြီးများပိုင်ဆိုင်နိုင်ကြပါစေ</small>
               </div>
               <div class="input-group">
                  <div class="input-field">
                        <input type="text" class="input-box" id="regUsername" name="name" required>
                        <label for="regUsername">အမည်</label>
                  </div>
                  <div class="input-field">
                        <input type="mobile" class="input-box" id="regEmail" name="phone" required>
                        <label for="regEmail">ဖုန်းနံပါတ်</label>
                  </div>
                  <div class="input-field">
                        <input type="date" class="input-box" id="birth" name="birth" required>
                        <label for="birth">မွေးနေ့</label>
                  </div>
                  <div class="input-field">
                        <input type="text" class="input-box" id="nic" name="nic" required>
                        <label for="nic">မှတ်ပုံတင်ဖြည့်သွင်းပါ</label>
                  </div>
                  <div class="input-field">
                        <input type="radio" name="gender" value="male" required>Male
                        <input type="radio" name="gender" value="female" required>FeMale
                  </div>
                  <div class="input-field">
                        <input type="password" class="input-box" name="password" id="password" required>
                        <label for="password">Password</label>
                        <div class="eye-area">
                           <div class="eye-box" onclick="myRegPassword()">
                              <i class="fa-regular fa-eye" id="eye-2"></i>
                              <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                           </div>
                        </div>
                  </div>
                  <div class="input-field">
                        <input type="password" class="input-box" name="retype_password" id="retype_password" required>
                        <label for="retype_password">Confirm Password</label>
                        <div class="eye-area">
                           <div class="eye-box" onclick="myRegPassword()">
                              <i class="fa-regular fa-eye" id="eye-2"></i>
                              <i class="fa-regular fa-eye-slash" id="eye-slash-2"></i>
                           </div>
                        </div>
                  </div>
                  <div class="input-field">
                    <?php echo $msg ?>
                 </div>
                  <div class="input-field">
                        <input type="submit" class="input-submit" name="signup" value="Sign Up" id="signup_btn" required>
                  </div>
               </div>
            </form>

         <div class="switch" style="bottom: 10px;">
            <a href="#" class="login active" onclick="login()">Login</a>
            <a href="#" class="register" onclick="register()">Register</a>
            <div class="btn-active" id="btn"></div>
         </div>
         
        </div>
        
     </div>
     <script>
         var passwordInput = document.getElementById('password');
         var retypePasswordInput = document.getElementById('retype_password');
         var submitButton = document.getElementById('signup_btn');

         // Function to check if password and retype_password match
         function checkPasswordMatch() {
            if (passwordInput.value === retypePasswordInput.value && passwordInput.value !== '' && retypePasswordInput.value !== '') {
               submitButton.disabled = false;
            } else {
               submitButton.disabled = true;
            }
         }

         // Adding event listeners to both input fields to trigger the checkPasswordMatch function on input
         passwordInput.addEventListener('input', checkPasswordMatch);
         retypePasswordInput.addEventListener('input', checkPasswordMatch);

        var x = document.getElementById('login');
        var y = document.getElementById('register');
        var z = document.getElementById('btn');

        function login(){
            x.style.left = "27px";
            y.style.right = "-350px";
            z.style.left = "0px";
        }
        function register(){
            x.style.left = "-350px";
            y.style.right = "25px";
            z.style.left = "150px";
        }


   // View Password codes

         
      
        function myLogPassword(){

         var a = document.getElementById("logPassword");
         var b = document.getElementById("eye");
         var c = document.getElementById("eye-slash");

         if(a.type === "password"){
            a.type = "text";
            b.style.opacity = "0";
            c.style.opacity = "1";
         }else{
            a.type = "password";
            b.style.opacity = "1";
            c.style.opacity = "0";
         }

        }

        function myRegPassword(){
    
         var d = document.getElementById("regPassword");
         var b = document.getElementById("eye-2");
         var c = document.getElementById("eye-slash-2");
 
         if(d.type === "password"){
            d.type = "text";
            b.style.opacity = "0";
            c.style.opacity = "1";
         }else{
            d.type = "password";
            b.style.opacity = "1";
            c.style.opacity = "0";
         }

        }
     </script>
</body>
</html>