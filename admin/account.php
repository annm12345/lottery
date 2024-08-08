<?php
require('top.php');
?>

<main>
    <style>
        .banner {
            display: flex;
            flex-direction:column;
            justify-content: center;
            gap:3rem;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 1rem 15rem;
        }

        .setting {
            display: flex;
            align-items: center;
            margin-left:30rem;
            gap:1.5rem;
        }

        .setting ion-icon {
            margin-right: 5px;
            
        }
        .setting a{
            text-decoration:none;
        }
        @media (max-width: 768px) {
          .banner{
            margin: 1rem 1rem;
          }
          .setting {
                display: flex;
                align-items: center;
                margin-left:0rem;
            }
        }

    </style>

    <div class="banner">
        <div class="setting">
            <ion-icon name="mail" style="font-size: 30px;color:green;"></ion-icon>
            <a>Inbox</a>
        </div>
        <div class="setting">
            <ion-icon name="settings" style="font-size: 30px;color:darkblue"></ion-icon>
            <a>Setting</a>
        </div>
        <div class="setting">
            <ion-icon name="help-circle" style="font-size: 30px;color:darkgray"></ion-icon>
            <a>Help</a>
        </div>
        <div class="setting">
            <ion-icon name="log-out" style="font-size: 30px;color:red"></ion-icon>
            <a href="logout.php">Logout</a>
        </div>
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