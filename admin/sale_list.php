<?php
require('top.php');
if(isset($_POST['month_search'])){
    $month=$_POST['date'];
    ?>
    <script>
        window.location.href='sale_list.php?mdate=<?php echo $month ?>';
    </script>
    <?php
}
if(isset($_POST['date_search'])){
    $month=$_POST['date'];
    ?>
    <script>
        window.location.href='sale_list.php?date=<?php echo $month ?>';
    </script>
    <?php
}
?>


  <style>
    
    .result_container {
        overflow-x: auto;
        border:1px solid gold;
        margin: 0rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
   

    .result_container table {
        width: 100%; /* Table fills the container */
        border-collapse: collapse; /* Remove border spacing */
    }

    .result_container table td {
        padding: 4px;
        text-align: center; /* Center text */
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
    

    /* Responsive styles for smaller screens */
    .list_container {
            background-color: gold;
            display: flex;
            align-items: center;
            justify-content:center;
            gap:2rem;
            padding: 1rem;
            border-radius: 10px;
        }
        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
       
          margin: 0rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .result_container table {
         
            overflow-x: scroll; /* Enable horizontal scrolling */
            overflow-y: scroll; 
        }
    }



  </style>
  <div class="banner">
        <div class="header-main">
            <div class="result_container" style="margin-bottom:10px">
                    <form action="" method="post" class="list_container" style="background:none;margin-bottom:0px">
                        <label for="">Months</label>
                        <input type="month" class="search-field" id="monthPicker" required>
                        <input type="text" class="search-field" name="date" id="displayedMonth" required style="display:none">
                        <input type="submit" value="Search" name="month_search" style="border:none;background:green;color:#fff;padding:10px;border-radius:3px;width: 100px;">
                    </form>
                    <form action="" method="post" class="list_container" style="background:none">
                        <label for="">Date</label>
                        <input type="date"  name="date" class="search-field"  required>
                        <input type="submit" value="Search" name="date_search" style="border:none;background:green;color:#fff;padding:10px;border-radius:3px;width: 100px;">
                    </form>
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
            <div class="result_container">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
                    <p>Tickets Sale List 
                        <?php if(isset($_GET['date'])){
                            $date=$_GET['date'];
                            echo 'of ';
                            echo $date; 
                            }elseif(isset($_GET['mdate'])){
                                $date=$_GET['mdate'];
                                echo 'of ';
                                echo $date; 
                                } 
                        ?>
                    </p>
                </div>
                <table style="margin-bottom:4rem;">
                    <tr>
                        <!-- <th>Type</th> -->
                        <!-- <th>Total Tickets</th> -->
                        <th>Total Amount</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        if(isset($_GET['mdate'])){
                            $date=$_GET['mdate'];
                        $res=mysqli_query($con,"SELECT * FROM `buy_list` WHERE `date`='$date' ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $list_id=$row['list_id'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));
                            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` WHERE `id`='$list_id'"));

                    ?>
                    <tr>
                        <!-- <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;">
                                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;"><?php echo $list_row['amount'] ?></p>
                            </a>
                        </td> -->

                        <!-- <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['amount'] ?></span>
                        </td> -->
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['price'] ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $row['day'] ?></span>
                        </td>
                        <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;padding:0.5rem 1rem; border-radius:5px;background:blue;color:#fff;">
                               ကြည့်မည်
                            </a>
                        </td>
                    </tr>
                    <?php } }elseif(isset($_GET['date'])){
                            $date=$_GET['date'];
                        $res=mysqli_query($con,"SELECT * FROM `buy_list` WHERE `day`='$date' ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $list_id=$row['list_id'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));
                            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` WHERE `id`='$list_id'"));

                    ?>
                    <tr>
                        <!-- <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;">
                                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;"><?php echo $list_row['amount'] ?></p>
                            </a>
                        </td> -->

                        <!-- <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['amount'] ?></span>
                        </td> -->
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['price'] ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $row['day'] ?></span>
                        </td>
                        <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;padding:0.5rem 1rem; border-radius:5px;background:blue;color:#fff;">
                               ကြည့်မည်
                            </a>
                        </td>
                    </tr>
                    <?php } }else{
                        $res=mysqli_query($con,"SELECT * FROM `buy_list` ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $list_id=$row['list_id'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));
                            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` WHERE `id`='$list_id'"));

                    ?>
                    <tr>
                        <!-- <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;">
                                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;"><?php echo $list_row['amount'] ?></p>
                            </a>
                        </td> -->

                        <!-- <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['amount'] ?></span>
                        </td> -->
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['price'] ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $row['day'] ?></span>
                        </td>
                        <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;padding:0.5rem 1rem; border-radius:5px;background:blue;color:#fff;">
                               ကြည့်မည်
                            </a>
                        </td>
                    </tr>
                    <?php } } ?>

                </table>
            </div>
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
