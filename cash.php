<?php
require('top.inc.php');
$msg='';

if(isset($_SESSION['LOT_USER_LOGIN'])) {
    $user_id = $_SESSION['LOT_USER_ID'];
    $res = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$user_id'");
    $row = mysqli_fetch_assoc($res);

    if(isset($_POST['cashin'])){
        $image = $_FILES['image']['name'];
        $image_temp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_temp_name, 'taximage/'.$image);
        $taxid = $_POST['taxid'];
        $amount = $_POST['amount'];
        $payment = $_POST['payment'];
        date_default_timezone_set('Asia/Yangon');
        $date = date('Y-m-d');
        $time = date('h:i:s');

        mysqli_query($con,"INSERT INTO `cashin`(`uid`, `image`, `tax_id`, `amount`, `date`,`payment`, `time`,`comfirm`) VALUES ('$user_id','$image','$taxid','$amount','$date','$payment','$time','')");

        $msg="Admin ထံသို့ resquestလုပ်ပြီးပါပြီး။ မကြာခင်အကောင့်အတွင်းသို့ ငွေထည့်သွင်းပေးပါလိမ့်မည်";

    }
    if(isset($_POST['cashout'])){            
            $phone = $_POST['phone'];
            $amount = $_POST['amount'];
            $payment = $_POST['payment'];
            $uname = $_POST['name'];
            date_default_timezone_set('Asia/Yangon');
            $date = date('Y-m-d');
            $time = date('h:i:s');

            mysqli_query($con,"INSERT INTO `cashout`(`uid`,`uname`,`phone`, `amount`, `payment`, `date`, `time`, `comfirm`) VALUES ('$user_id','$uname','$phone','$amount','$payment','$date','$time','')");

            $msg="Admin ထံသို့ resquestလုပ်ပြီးပါပြီး။ မကြာခင်အကောင့်အတွင်းသို့ငွေလွှဲပေးပါလိမ့်မည်";

        }

}
?>


  <style>
    .result_container{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom:2rem;
    }
    .main-heading {
      font-size: 16px; /* Adjust the font size */
      color: #333; /* Adjust the text color */
      margin-bottom: 20px; /* Add some space below the heading */
    }


    .header-search-container {
      flex-grow: 1;
    }

    .search-container-small {
      flex-basis: 30%; /* Set width to 30% for small search bar */
    }

    .search-container-large {
      flex-basis: 70%; /* Set width to 70% for large search bar */
    }

    .search-container-small:not(:last-child) {
      margin-right: 20px; /* Add gap between search bars */
    }

    .search-field {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .search-btn {
      background-color: green;
      color: white;
      border: none;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      cursor: pointer;
    }
    .result_container {
        overflow-x: auto;
        border:1px solid #19E9F0;
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
    }

    .result_container table {
        width: 100%; /* Table fills the container */
        border-collapse: collapse; /* Remove border spacing */
    }

    .result_container table td {
        padding: 4px;
        text-align: center;
        margin:auto;
    }
    .result_container table th {
        text-align: center;
    }
    .result_container table span {
      align-items:center;
      text-align: center;
      background: #19E9F0; /* Set background color to light gold */
      border-radius: 50%; /* Make the background circular */
      width: 40px; /* Set fixed width for circular cells */
      height: 40px; /* Set fixed height for circular cells */
      line-height: 40px; 
      font-weight:600;
    }


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
    }
    .cash-container {
      display: flex;
      flex-direction: column;
      color:#fff;
      background-color: #fff; /* Set background color */
      border: 1px solid #ccc; /* Add border */
      border-radius: 5px; /* Add border radius */
      padding: 10px; /* Add padding */
      max-width: 500px; /* Set max-width if needed */
    }

    .amount,
    .total {
      width:100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px; /* Add margin between sections */
    }

    .cash-container span {
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
    }

    .cash-container span:first-child {
      color: #000; /* Set color for labels */
    }

    .cash-container span:last-child {
      color: #000; /* Set color for values */
    }
    .btn-primary {
      background-color: #1992F7;
      text-align:center;
      color: white; /* Set text color */
      padding: 10px 20px; /* Add padding */
      border: none; /* Remove border */
      border-radius: 5px; /* Add border radius */
      cursor: pointer; /* Add cursor pointer */
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
      text-transform: uppercase; /* Convert text to uppercase */
      transition: background-color 0.3s; /* Add transition effect */
    }

    .btn-primary:hover {
      background-color: goldenrod; /* Change background color on hover */
    }


    /* Responsive styles for smaller screens */

    .contact-box {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9; /* Light gray background */
        border-radius: 10px;
    }

    .contact-box p {
        margin-bottom: 10px;
        margin-left:2rem;
    }
    :root {
        --blue: #0071FF;
        --light-blue: #B6DBF6;
        --dark-blue: #005DD1;
        --grey: #f2f2f2;
    }
    .img-container {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 30px;
        border-radius: 30px;
    }
    .img-area {
        position: relative;
        width: 100%;
        height: 240px;
        background: var(--grey);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .img-area .icon {
        font-size: 100px;
    }
    .img-area h3 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 6px;
        color:#000;
    }
    .img-area p {
        color: #000;
        text-align:center;
    }
    .img-area p span {
        font-weight: 600;
    }
    .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }
    .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }
    .img-area.active:hover::before {
        opacity: 1;
    }
    select#payment {
        width: 150px; /* Adjust the width as needed */
        padding: 8px; /* Add padding to improve appearance */
        font-size: 16px; /* Adjust font size */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 5px; /* Add border radius for rounded corners */
        outline: none; /* Remove the default outline */
        appearance: none; /* Remove default dropdown arrow */
        background-color: #fff; /* Set background color */
        cursor: pointer; /* Show pointer cursor */
    }

    /* Styling for the options within the select element */
    select#payment option {
        padding: 8px; /* Add padding to improve appearance */
        font-size: 16px; /* Adjust font size */
        background-color: #fff; /* Set background color */
    }
    .select-image {
        display: block;
        width: 100%;
        padding: 16px 0;
        border-radius: 15px;
        background: var(--blue);
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all .3s ease;
    }
    .select-image:hover {
        background: var(--dark-blue);
    }

    .btn_container{
        padding:1rem 15rem;
        display:flex;
        gap:2rem;
    }
    .notification-container {
            display: flex;
            justify-content: center;
        }

        .notification {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #dff0d8;
            color: #3c763d;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .notification i {
            margin-right: 10px;
            color: #3c763d;
        }

        
    /* Media query for mobile devices */
    @media (max-width: 768px) {
      .container {
        display: grid; 
        grid-template-columns:40% 60%;/* Display search bars vertically on mobile */
      }

      .header-search-container {
        flex-basis: auto; /* Reset width for mobile */
        margin-right: 0; /* Remove margin */
        margin-bottom: 10px; /* Add space between search bars on mobile */
      }
      .result_container {
       
          margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .cash-container{
        margin: 2rem 1rem;
      }
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
        .header-table {
            margin: 1rem;
        }

        .contact-box {
            padding: 5px;
        }
        .btn_container{
        padding:1rem 1rem;
        }
        .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
    }



  </style>

<div class="header-main">
<div class="container" style="display: flex; justify-content: space-between;">

  <div href="#" class="header-logo" style="display:flex; gap:1.5rem;s">
    <a href="step1.php" class="action-btn">
        <i class="fas fa-money-bill-wave" style="font-size: 1.5rem; color: green; padding: 20px; border-radius: 50%; background: #CBD8F5;"></i>
        <span>ငွေဖြည့်မည်</span>
    </a>
    <a href="step1-out.php" class="action-btn">
        <i class="fa-solid fa-right-from-bracket" style="font-size: 1.5rem; color: blue; padding: 20px; border-radius: 50%; background: #CBD8F5;"></i>
        <span>ငွေထုတ်မည်</span>
    </a>
    <a href="record_cash.php" class="action-btn">
        <i class="fa-solid fa-bookmark" style="font-size: 1.5rem; color: #000; padding: 20px; border-radius: 50%; background: #CBD8F5;"></i>
        <span>မှတ်တမ်း</span>
    </a>


      
  </div>
  
</div>


</div>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function () {
        inputFile.click();
    })

    inputFile.addEventListener('change', function () {
        const image = this.files[0]
        if(image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = ()=> {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item=> item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the buttons and forms
        var cashinBtn = document.getElementById("cashin-btn");
        var cashoutBtn = document.getElementById("cashout-btn");
        var cashinForm = document.getElementById("cashin");
        var cashoutForm = document.getElementById("cashout");

        // Add click event listeners to the buttons
        cashinBtn.addEventListener("click", function() {
            // Show cashin form and hide cashout form
            cashinForm.style.display = "";
            cashoutForm.style.display = "none";
        });

        cashoutBtn.addEventListener("click", function() {
            // Show cashout form and hide cashin form
            cashoutForm.style.display = "";
            cashinForm.style.display = "none";
        });
    });
</script>


<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
