<?php
require('top.inc.php');
$msg='';

if(isset($_SESSION['LOT_USER_LOGIN'])) {
  $user_id = $_SESSION['LOT_USER_ID'];

  if(isset($_GET['list_id'])) {
      $list_id = $_GET['list_id']; 
      if(isset($_POST['buy'])) {
          $amount=$_POST['amount'];
          date_default_timezone_set('Asia/Yangon');
          $added_on = date('F Y');
          $date=date('Y-m-d');
          $res = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$user_id'");
          $check = mysqli_num_rows($res);
          $check_point = mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$user_id'");
          if (mysqli_num_rows($check_point) > 0) {
              $row = mysqli_fetch_assoc($check_point);
              $originalAmount = $row['amount'];
              if($originalAmount > $amount){
                  mysqli_autocommit($con, false); // Start transaction
                  // Fetch and lock the list for update
                  $list_query = mysqli_query($con, "SELECT * FROM `list` WHERE `id`='$list_id' AND `sell`='' FOR UPDATE");
                  if(mysqli_num_rows($list_query) > 0) {
                      mysqli_query($con, "INSERT INTO `buy_list`(`uid`, `list_id`,`date`,`day`) VALUES ('$user_id','$list_id','$added_on','$date')");
                      mysqli_query($con, "UPDATE `list` SET `sell`='true' WHERE `id`='$list_id'");
                      $newAmount = $originalAmount - $amount;
                      mysqli_query($con, "UPDATE `point` SET `amount`='$newAmount' WHERE `uid`='$user_id'");
                      mysqli_commit($con); // Commit transaction
                      echo "<script>
                              window.alert('ထီလက်မှတ်ဝယ်ယူမှုအောင်မြင်ပါသည်။ ဝန်ဆောင်မှုအားအသုံးပြုခြင်းအတွက်ကျေးဇူးတင်ရှိပါသည်။');
                              window.location.href='lottery_list.php';
                            </script>";
                  } else {
                      mysqli_rollback($con); // Rollback transaction
                      $msg = 'ထီလက်မှတ်ဝယ်ယူမှုမအောင်မြင်ပါ။ ရောင်းချပြီးသောထီလက်မှတ်ဖြစ်ပါသည်';
                  }
                  mysqli_autocommit($con, true); // Enable autocommit
              } else {
                  $msg = 'ထီလက်မှတ်ဝယ်ယူမှုမအောင်မြင်ပါ။ ထီလက်မှတ်ဝယ်ယူရန် ငွေလုံလောက်မှုမရှိပါ။';
              }
          } 
      }
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
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
    }

    .result_container table {
        width: 100%; /* Table fills the container */
        
    }

    .result_container table td:nth-child(1) {
        width: 30%;
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:1px 3px 3px white;
    }
    .result_container table td:nth-child(2) {
        width: 70%;
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:3px 10px 10px #fff;
    }
    .result_container table th {
        text-align: center;
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
      background-color: #19E9F0;
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
   /* Styles for notifications */
   .notification-container {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
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
        .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
    }



  </style>
  <div class="banner">
    <div class="header-main">
      
      

      <form action="" method="post" class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
          <p>လက်မှတ်များ</p>
        </div>
        <table>
          <tr>
            <th>အက္ခရာ</th>
            <th colspan="6">နံပါတ်</th>
            <th></th>
          </tr>
          <?php
          if(isset($_GET['list_id'])){
            $list_id=$_GET['list_id'];
            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` Where `id`='$list_id'"));
            $res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' ORDER BY `id` ASC");
            while($row=mysqli_fetch_assoc($res)){
          ?>
          <tr style="background-image:url(lottery.png);background-position:center;">
            <td><span ><?php echo $row['alpha'] ?></span></td>            
            <td ><span><?php echo $row['num1'] ?>      <?php echo $row['num2'] ?>     <?php echo $row['num3'] ?>     <?php echo $row['num4'] ?>     <?php echo $row['num5'] ?>     <?php echo $row['num6'] ?></span></td>            
                 
          </tr>
          <?php } } ?>
      
        </table>
      </div>
      <?php
        if($msg!==''){
            ?>
            <div class="notification-container">
                <div class="notification">
                    <i class="fas fa-check-circle"></i>
                    <p><?php echo $msg ?></p>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="cash-container" style="margin-bottom:5rem;">
            <div class="amount"> 
                <span>ဈေးနှုန်း</span>
                <span style="color:green;display:flex;"><input type="text" name="amount" id="total-amount" style="border:none;outline:none;" value="<?php echo $list_row['price'] ?>" readonly> KS</span>
            </div>
            <div class="total"> 
                <span>ထီလက်မှတ်အရေအတွက်</span>
                <span><?php echo $list_row['amount'] ?></span>
            </div>
            <input type="button" class="btn-primary" id="buy-btn" value="ဝယ်ယူမည်" name="buy">
        </div>

        <style>
            .confirm-box {
                display: none;
                position: fixed;
                width:380px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #f8f9fa; /* Light gray background */
                border: 2px solid #007bff; /* Blue border */
                border-radius: 8px; /* Rounded corners */
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
                z-index: 9999;
            }

            .confirm-box p {
                font-size: 18px;
                margin-bottom: 20px;
            }

            .confirm-box button, .btn-second {
                background-color: #007bff; /* Blue button */
                color: #ffffff; /* White text */
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                margin-right: 10px;
            }

            .confirm-box button:hover {
                background-color: #0056b3; /* Darker blue on hover */
            }
            .btn-list{
              display:grid;
              grid-template-columns:1fr 1fr;
              gap:0.5rem;
            }

            @media only screen and (max-width: 768px) {
                
            }
        </style>

        <div id="confirm-box" class="confirm-box">
            <p>ဤထီလက်မှတ်အားဝယ်ယူမည်မှာသေချာပါသလား !</p>
            <div class="btn-list">
              <input type="submit" id="confirm-yes" name="buy" value="သေချာပါသည်" class="btn-second">
              <button id="confirm-no" class="btn-second">မသေချာပါ</button>
            </div>
            
        </div>
        <script>
            document.getElementById('buy-btn').addEventListener('click', function() {
                document.getElementById('confirm-box').style.display = 'block';
            });

            document.getElementById('confirm-yes').addEventListener('click', function() {
                document.getElementById('confirm-box').style.display = 'none';
            });

            document.getElementById('confirm-no').addEventListener('click', function() {
                event.preventDefault(); 
                document.getElementById('confirm-box').style.display = 'none';
            });

        </script>
    </form>
  </div>



</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
