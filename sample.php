<?php
require('top.inc.php');
?>


<main>
    <div class="banner" style="margin-bottom:15rem;">
    <style>
      

        @media screen and (max-width: 600px) {
            img {
            max-width: 100%;
            height: auto;
            }
        }

    </style>
    <div class="product-minimal" style="padding:1rem;">
    <p><?php
        date_default_timezone_set('Asia/Yangon');

        // Get the current month and year
        $currentMonthYear = date('F Y');

        // Retrieve data based on the current month and year
        $t_row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `date`='$currentMonthYear'"));

        // Check if data is found for the current month and year
        if ($t_row) {
            $t_title = $t_row['title'];
            echo $t_title . " ထီလက်မှတ်နမူနာ</p>";
            echo '<div><img src="taximage/' . $t_row['image'] . '" alt=""></div>';
        } else {
            // Handle case where no data is found for the current month and year
            echo "No data found for the current month and year.";
        }
        ?>

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

