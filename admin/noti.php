<?php
require('top.inc.php');
?>

<main>
    <style>
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

        /* Responsive */
        @media (max-width: 768px) {
            .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
        }
    </style>
        <div class="notification-container">
            <div class="notification">
                <i class="fas fa-check-circle"></i>
                <p>Your notification message goes here.</p>
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