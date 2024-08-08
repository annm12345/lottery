<?php
require('top.inc.php');
if(isset($_GET['id'])){
  $id=$_GET['id'];
  mysqli_query($con,"DELETE FROM `htipauksin` where `id`='$id'");
  ?>
  <script>
      window.location.href='prize.php';
  </script>
  <?php
}

if(isset($_POST['month_search'])){
  $title=$_POST['title'];
  ?>
  <script>
      window.location.href='prize.php?title=<?php echo $title ?>';
  </script>
  <?php
}
?>

<main>
    <div class="banner" style="margin-bottom:15rem;">
      <style>
        .result_container {
            overflow-x: auto;
            margin: 2rem 15rem;
            border-radius:5px;
            display:block; /* Enable horizontal scrolling on smaller screens */
        }
        .list_container {
            background-color: #19E9F0;
            display: flex;
            align-items: center;
            justify-content:center;
            gap:2rem;
            padding: 1rem;
            border-radius: 10px;
        }
        
        .result_container table {
            width: 100%; /* Table fills the container */
            border-collapse: collapse; /* Remove border spacing */
        }

        .result_container table td {
            padding: 4px;
            text-align: center;
            margin:auto;
            border:1px dashed #36BDEC;
        }
        .result_container table th {
            border:1px dashed #36BDEC;
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


        /* Hide table borders
        .result_container table,
        .result_container table td,
        .result_container table th {
            border: none;
        } */
        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            }

        /* Responsive styles for smaller screens */
      

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



      </style>

            <div class="result_container" style="margin-bottom:10px">
                    <form action="" method="post" class="list_container" style="background:none;margin-bottom:0px">
                        <select type="text" class="search-field" name="title" required>
                            <option class="search-field" value="" selected disabled hidden>--ကြိမ်မြောက်</option>
                            <?php 
                             $t_res = mysqli_query($con, "SELECT * FROM `price`");
                             while ($t_row = mysqli_fetch_assoc($t_res)) {
                            ?>
                            <option class="search-field" value="<?php echo $t_row['id'] ?>"><?php echo $t_row['title'] ?>ကြိမ်မြောက်</option>
                            <?php } ?>
                        </select>
                        <input type="submit" value="Search" name="month_search" style="border:none;background:green;color:#000;padding:10px;border-radius:3px;width: 100px;">
                    </form>
                    <!-- <form action="" method="post" class="list_container" style="background:none">
                        <label for="">Date</label>
                        <input type="date" class="search-field"  required>
                        <input type="submit" value="Search" name="date_search" style="border:none;background:green;color:#000;padding:10px;border-radius:3px;width: 100px;">
                    </form> -->
                    <script>
                        // Get the input element
                        const monthInput = document.getElementById('monthPicker');
                        // Get the span element for displaying formatted value
                        const displayedMonth = document.getElementById('displayedMonth');

                        // Add event listener to listen for changes in the input value
                        monthInput.addEventListener('change', function() {
                        // Get the selected month value (yyyy-MM)
                        const selectedMonth = this.value;

                        // Split the selected month value into year and month parts
                        const [year, month] = selectedMonth.split('-');

                        // Get the month name based on the month number
                        const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        const selectedMonthName = monthNames[parseInt(month) - 1]; // Subtract 1 because month number starts from 0

                        // Set the formatted value in the span element
                        displayedMonth.value = `${selectedMonthName} ${year}`;
                        });
                    </script>
            </div>
            <?php
            if (isset($_GET['title'])) {
                $title = $_GET['title'];
            ?>
                <div class="result_container">
                    <div class="header-table" style="margin-bottom:2rem;border-bottom:1px dashed #19E9F0">
                        <?php
                        date_default_timezone_set('Asia/Yangon');

                        // Get the current month and year
                        $currentMonth = date('m');
                        $currentYear = date('Y');

                        // Subtract one month from the current month
                        $previousMonth = date('m', strtotime('-1 month'));

                        // If the current month is January, decrement the year
                        if ($currentMonth == '01') {
                            $previousYear = $currentYear - 1;
                        } else {
                            $previousYear = $currentYear;
                        }

                        // Format the previous month and year
                        $previousMonthYear = date('F Y', strtotime("$previousYear-$previousMonth"));
                        ?>
                        <p><?php $t_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `price` WHERE `id`='$title'"));
                            echo $t_title = $t_row['title']; ?> ကြိမ်မြောက်အတွက်ထီပေါက်စဉ်</p>
                    </div>
                    <table style="margin-bottom:2rem;">
                        <tr>
                            <th>အက္ခရာ</th>
                            <th>နံပါတ်</th>
                            <th>ဆုကြေး</th>
                        </tr>
                        <?php
                        $res = mysqli_query($con, "SELECT * FROM `htipauksin` WHERE `title`='$title'");
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['alpha'] ?></td>
                                <td>
                                    <?php
                                    // Display the number only if it's not equal to 0
                                    if ($row['num1'] != '') echo $row['num1'];
                                    if ($row['num2'] != '') echo $row['num2'];
                                    if ($row['num3'] != '') echo $row['num3'];
                                    if ($row['num4'] != '') echo $row['num4'];
                                    if ($row['num5'] != '') echo $row['num5'];
                                    if ($row['num6'] != '') echo $row['num6'];
                                    ?>
                                </td>
                                <td><?php echo $row['prize'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } else { ?>
                <div class="result_container" style="">
                <div class="header-table" style="margin-bottom:2rem;border-bottom:1px dashed #19E9F0">
                        <?php
                    
                        // Get the current month and year
                        $current_month = date('n');
                        $current_year = date('Y');
                    
                        // Calculate the previous month
                        $previous_month = $current_month - 1;
                        $previous_year = $current_year;
                    
                        // If the previous month is December, adjust the year
                        if ($previous_month == 0) {
                            $previous_month = 12;
                            $previous_year--;
                        }
                    
                        $previousMonthName = date('F', mktime(0, 0, 0, $previous_month, 1, $previous_year));
                        $previous_date = $previousMonthName . ' ' . $previous_year;
                        $t_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `price` WHERE `date`='$previous_date'"));
                        $t_title = $t_row['title'];
                        ?>
                        <p><?php echo $t_title ?> ကြိမ်မြောက်အတွက်ထီပေါက်စဉ်</p>
                    </div>
                    <table style="margin-bottom:2rem;">
                        <tr>
                            <th>အက္ခရာ</th>
                            <th>နံပါတ်</th>
                            <th>ဆုကြေး</th>
                        </tr>
                        <?php
                        $t_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `price` WHERE `date`='$previous_date'"));
                        $t_title = $t_row['id'];
                        $res = mysqli_query($con, "SELECT * FROM `htipauksin` WHERE `title`='$t_title'");
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                            <tr>
                                <td><?php echo $row['alpha'] ?></td>
                                <td>
                                    <?php
                                    // Display the number only if it's not equal to 0
                                    if ($row['num1'] != '') echo $row['num1'];
                                    if ($row['num2'] != '') echo $row['num2'];
                                    if ($row['num3'] != '') echo $row['num3'];
                                    if ($row['num4'] != '') echo $row['num4'];
                                    if ($row['num5'] != '') echo $row['num5'];
                                    if ($row['num6'] != '') echo $row['num6'];
                                    ?>
                                </td>
                                <td><?php echo $row['prize'] ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>


      
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