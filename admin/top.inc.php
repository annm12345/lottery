<?php
require('connection.php');
if(isset($_SESSION['LOT_ADMIN_LOGIN']))
{
  $user_id=$_SESSION['LOT_ADMIN_ID'];
  $res=mysqli_query($con,"SELECT * FROM `admin` where `id`='$user_id'");
  $row=mysqli_fetch_assoc($res);
}else
{
   
  ?>
  <script>
    window.location.href='login.php';
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
  <title>Loterry MM| ADMIN</title>

  <!--
    - favicon
  -->
  <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

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
                <span style="text-decoration:underline"><?php echo $row['email'] ?></span>
            </div>
        </div>

        <!-- <div class="header-search-container" style="position: absolute;right:1rem;top:3rem">
            <a href="noti.php" id="noti-toggle">
                <i class="fa-solid fa-bell" style="font-size:1.2rem;color:darkblue"></i>
            </a>
            
        </div> -->
        
      </div>


    </div>

    <nav class="desktop-navigation-menu">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="index.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="ticket_create.php" class="menu-title">ထီစာရင်းသွင်း</a>
          </li>
          <li class="menu-category">
            <a href="prize.php" class="menu-title">ထီတိုက်မည်</a>
          </li>
          

          <li class="menu-category">
            <a href="cash.php" class="menu-title">ငွေသွင်း</a>
          </li>
          <li class="menu-category">
            <a href="cash.php" class="menu-title">ငွေထုတ်</a>
          </li>

          <li class="menu-category">
            <a href="notice.php" class="menu-title">Notice</a>
          </li>
          <li class="menu-category">
            <a href="logout.php" class="menu-title">logout</a>
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

        <a href="ticket_create.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="ticket" style="font-size: 24px;color:#19E9F0;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">ထီစာရင်းသွင်း</span>
            </div>
        </a>

        
        <a href="buy_ticket.php" class="action-btn">
          <div style="display: flex; flex-direction: column; align-items: center;">
              <ion-icon name="gift"  style="font-size: 24px;color: #9C09F6;"></ion-icon>
              <span class="b-name" style="font-size: 12px;">ပေါက်စဉ်</span>
          </div>
        </a>

        <a href="cashin.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="cash-outline"  style="font-size: 24px;color: green;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">ငွေသွင်း</span>
            </div>    
        </a>
        <a href="cashout.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="cash"  style="font-size: 24px;color: green;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">ငွေထုတ်</span>
            </div>    
        </a>

        <a href="notice.php" class="action-btn">
            <div style="display: flex; flex-direction: column; align-items: center;">
                <ion-icon name="newspaper"  style="font-size: 24px;color: #7D3C98;"></ion-icon>
                <span class="b-name" style="font-size: 12px;">Notice</span>
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
        <li class="menu-category">
          <a href="ticket_create.php" class="menu-title">ထီစာရင်းသွင်း</a>
        </li>

        <li class="menu-category">
          <a href="prize.php" class="menu-title">ထီတိုက်မည်</a>
        </li>
        

        <li class="menu-category">
          <a href="cashin.php" class="menu-title">ငွေသွင်း</a>
        </li>
        <li class="menu-category">
          <a href="cashout.php" class="menu-title">ငွေထုတ်</a>
        </li>

        <li class="menu-category">
          <a href="notice.php" class="menu-title">Notice</a>
        </li>

        
        <li class="menu-category">
            <a href="logout.php" class="menu-title">logout</a>
        </li>

      </ul>

      

    </nav>

  </header>
