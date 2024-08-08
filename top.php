<?php
require('connection.php');
if(isset($_SESSION['LOT_USER_LOGIN']))
{
  $user_id=$_SESSION['LOT_USER_ID'];
  $res=mysqli_query($con,"SELECT * FROM `user` where `id`='$user_id'");
  $row=mysqli_fetch_assoc($res);
}else
{
   
  ?>
  <script>
    window.location.href='login/login.php';
  </script>
  
  <?php
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lottery MM</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/viber_image_2024-03-08_07-42-09-471-removebg-preview.png" type="image/x-icon">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style-prefix.css">

  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


</head>

<body>


  <div class="overlay" data-overlay></div>

  <!--
    - MODAL
  -->

  <div class="modal closed" data-modal>

    <div class="modal-close-overlay" data-modal-overlay></div>

    <div class="modal-content">

      <button class="modal-close-btn" data-modal-close>
        <ion-icon name="close-outline"></ion-icon>
      </button>

      <div class="newsletter-img">
        <img src="./assets/images/newsletter.png" alt="subscribe newsletter" width="400" height="400">
      </div>

      <div class="newsletter">

        <form action="#">

          <div class="newsletter-header">

            <h3 class="newsletter-title">Subscribe Newsletter.</h3>

            <p class="newsletter-desc">
              Subscribe the <b>Anon</b> to get latest products and discount update.
            </p>

          </div>

          <input type="email" name="email" class="email-field" placeholder="Email Address" required>

          <button type="submit" class="btn-newsletter">Subscribe</button>

        </form>

      </div>

    </div>

  </div>





  <!--
    - NOTIFICATION TOAST
  -->

  <div class="notification-toast closed" data-toast>

    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
      <img src="./assets/images/products/jewellery-1.jpg" alt="Rose Gold Earrings" width="80" height="70">
    </div>

    <div class="toast-detail">

      <p class="toast-message">
        Someone in new just bought
      </p>

      <p class="toast-title">
        Rose Gold Earrings
      </p>

      <p class="toast-meta">
        <time datetime="PT2M">2 Minutes</time> ago
      </p>

    </div>

  </div>





  <!--
    - HEADER
  -->

  <header>

    

    <div class="header-main">

      <div class="container" style="display: flex; justify-content: space-between;">

        <div href="#" class="header-logo" style="display:flex; gap:1.5rem;border:1px solid #6495ED;padding:1rem;border-radius:10px">
            <button class="action-btn">
                <ion-icon name="person-outline" style="font-size:1.5rem;color:darkblue"></ion-icon>
            </button>
            <div class="user_detail" style="display:flex; flex-direction: column; gap: 0.2rem;">
                <span style="text-decoration:underline"><?php echo $row['name'] ?></span>
                <span style="text-decoration:underline"><?php echo $row['phone'] ?></span>
                <span style="display:flex;gap:1rem;align-items:center;color:darkblue;font-weight:680;"><i class="fa-regular fa-money-bill-1" style="color:green"></i>
                <p id="userPoints"></p> 
                
                 KS</span>
                  <script>
                  // JavaScript code
                  function fetchUserPoints() {
                      var userId = <?php echo json_encode($user_id); ?>; // PHP variable to JavaScript
                      
                      // AJAX request
                      var xhr = new XMLHttpRequest();
                      xhr.open('GET', 'fetch_points.php?user_id=' + userId, true);
                      xhr.onreadystatechange = function() {
                          if (xhr.readyState == 4 && xhr.status == 200) {
                              var points = xhr.responseText;
                              document.getElementById('userPoints').innerHTML = points;
                          }
                      };
                      xhr.send();
                  }
                
                  fetchUserPoints();
                //   setInterval(function() {
                //     // Call the fetchAndDisplayProducts function with your desired parameters
                //     fetchUserPoints();
                // }, 1000);
                </script>
                
            </div>
        </div>
        

        <div class="header-search-container" style="position: absolute;right:1rem;top:3rem">
            <a href="noti.php" id="noti-toggle">
                <i class="fa-solid fa-bell" style="font-size:1.2rem;color:darkblue"></i>
            </a>
            
        </div>
        
      </div>
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

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="index.php" class="menu-title">Home</a>
          </li>
          <!-- <li class="menu-category">
            <a href="promotion.php" class="menu-title">Promotion</a>

          </li> -->

          <li class="menu-category">
            <a href="lottery_list.php" class="menu-title">Buy Ticket</a>
            <!-- 
            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">1</a>
              </li>

              <li class="dropdown-item">
                <a href="#">3</a>
              </li>

              <li class="dropdown-item">
                <a href="#">5</a>
              </li>

              <li class="dropdown-item">
                <a href="#">9</a>
              </li>
              <li class="dropdown-item">
                <a href="#">100</a>
              </li>

            </ul> -->
          </li>
          <li class="menu-category">
            <a href="myticket.php" class="menu-title">My ticket</a>
          </li>

          <!-- <li class="menu-category">
            <a href="cash.php" class="menu-title">ငွေသွင်း|ထုတ်</a>
          </li> -->

          <li class="menu-category">
            <a href="prize.php" class="menu-title">ထီပေါက်စဉ်</a>
          </li>
          

          <li class="menu-category">
            <a href="result.php" class="menu-title">Result</a>
          </li>


          <li class="menu-category">
            <a href="account.php" class="menu-title">Account</a>
          </li>

        </ul>

      </div>

    </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

        <a href="index.php"class="action-btn">
          <div style="display: flex; flex-direction: column; align-items: center;">
              <ion-icon name="home"  style="font-size: 24px;color: #158BC2;"></ion-icon>
              <span class="b-name" style="font-size: 12px;">Home</span>
          </div>
        </a>


        <a href="lottery_list.php" class="action-btn">
          <div style="display: flex; flex-direction: column; align-items: center;">
              <ion-icon name="ticket"  style="font-size: 24px;color: #19E9F0;"></ion-icon>
              <span class="b-name" style="font-size: 12px;">Buyticket</span>
          </div>
        </a>

        
        <a href="myticket.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="bag-handle" style="font-size: 24px;color: green;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">Myticket</span>
            </div>
            <!-- <span class="count">0</span> -->
        </a>

        <!-- <a href="cash.php" class="action-btn">
          <div style="display: flex; flex-direction: column; align-items: center;">
              <ion-icon name="cash"  style="font-size: 24px;color: green;"></ion-icon>
              <span class="b-name" style="font-size: 12px;">ငွေသွင်း</span>
          </div>
        </a> -->

        <!-- <a href="prize.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="medal"  style="font-size: 24px;color: blue;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">ထီပေါက်စဉ်</span>
            </div>    
        </a> -->


      <!-- <button class="action-btn">
        <ion-icon name="heart-outline"></ion-icon>

        <span class="count">0</span>
      </button> -->

      <a href="account.php" class="action-btn">
          <div style="display: flex; flex-direction: column; align-items: center;">
              <ion-icon name="person"  style="font-size: 24px;color: #7D3C98;"></ion-icon>
              <span class="b-name" style="font-size: 12px;">Account</span>
          </div>    
      </a>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="index.php" class="menu-title">Home</a>
        </li>

        
        <!-- <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <a href="promotion.php" class="menu-title">Promotion</a>

          </button>
        </li> -->

        <li class="menu-category">

          <a href="lottery_list.php" class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Buy Ticket</p>

            <!-- <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div> -->
          </a>
          <!-- 
          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">1</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">3</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">5</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">9</a>
            </li>
            <li class="submenu-category">
              <a href="#" class="submenu-title">100</a>
            </li>

          </ul> -->

        </li>
        <li class="menu-category">
          <a href="myticket.php" class="menu-title">My Ticket</a>
        </li>

        <!-- <li class="menu-category">
          <a href="myticket.php" class="menu-title">ငွေသွင်း|ထုတ်</a>
        </li> -->
        <li class="menu-category">
          <a href="prize.php" class="menu-title">ထီပေါက်စဉ်</a>
        </li>

        <li class="menu-category">
          <a href="result.php" class="menu-title">Result</a>
        </li>

        <li class="menu-category">
          <a href="account.php" class="menu-title">Account</a>
        </li>

      </ul>

      

    </nav>

  </header>
