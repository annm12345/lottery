<?php
require('top.php');
if(isset($_POST['month_search'])){
    $month=$_POST['date'];
    ?>
    <script>
        window.location.href='lottery_list.php?date=<?php echo $month ?>';
    </script>
    <?php
}
?>

    <style>
        .result_container {
            width: 100%;
            max-width: 600px; /* Adjust max-width as needed */
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap:2rem;
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

        .lottery_main {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        .lottery_main img {
            width: 50px;
            height: 50px;
        }

        .lottery_main span {
            font-size: 1.5rem; /* Adjust font size as needed */
            font-weight: bold;
            color: #333; /* Dark gray color */
        }

        .first_lottery a {
            padding:0.5rem 1rem;
            background: #fff;
            color: blue; /* Blue color */
            font-weight: 750;
            text-decoration: none;
            border-radius: 10px;
        }

        .first_lottery {
            display: flex;
            flex-direction:column;
            gap:1rem;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .first_lottery span {
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 1.2rem; /* Adjust font size as needed */
            margin: 0 5px;
            border-radius: 50%;
            background-color: #ffcc00; /* Yellow color */
            color: #fff; /* White text color */
        }
        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            }

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            .result_container {
                padding: 10px;
                margin-bottom:100px;
            }

            .lottery_main span {
                font-size: 1.2rem;
            }

            .first_lottery span {
                width: 30px;
                height: 30px;
                line-height: 30px;
                font-size: 1rem;
            }
        }
    </style>

    <div class="banner">
        <div class="header-main">
            <div class="result_container" style="margin-bottom:10px">
                    <form action="" method="post" class="list_container" style="background:none;margin-bottom:0px">
                        <select type="text" class="search-field" name="date" required>
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
            <div class="result_container">
                
            </div>
            <div class="result_container">
                <?php
                if(isset($_GET['date'])){
                    $date = $_GET['date']; 
                    $p_res = mysqli_query($con, "SELECT * FROM `price` WHERE `id`='$date'");
                    $p_row = mysqli_fetch_assoc($p_res);
                    $title=$p_row['title'];
                    echo "The Lottery tickets of $title ကြိမ်မြောက်";
                    $res = mysqli_query($con, "SELECT DISTINCT(amount),`title` FROM `list` WHERE `title`='$date' ORDER by `amount` ASC ");
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="list_container">
                        <div class="lottery_main">
                            <img src="assets/images/logo/iQ8dzT01.svg" alt="" width="50">
                            <span>ထီ<?php echo $row['amount'] ?>စောင်တွဲ</span>
                        </div>
                        <div class="first_lottery">
                            <p style="color:darkblue;font-weight:600;"><?php 
                            $title_id=$row['title'];
                            $p_res = mysqli_query($con, "SELECT * FROM `price` WHERE `id`='$title_id'");
                            $p_row = mysqli_fetch_assoc($p_res);
                            echo $p_row['title']; ?>ကြိမ်မြောက်</p>
                            <a href="lottery-list-type.php?amount=<?php echo $row['amount'] ?>&date=<?php echo $date ?>">အသေးစိတ်ကြည့်မည်</a>
                        </div>
                    </div>
                <?php } }else{

                    date_default_timezone_set('Asia/Yangon');
                    $added_on = date('F Y'); 
                    $res = mysqli_query($con, "SELECT DISTINCT(amount),`title` FROM `list` WHERE `date`='$added_on' ORDER by `amount` ASC");
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="list_container">
                        <div class="lottery_main">
                            <img src="assets/images/logo/iQ8dzT01.svg" alt="" width="50">
                            <span>ထီ<?php echo $row['amount'] ?>စောင်တွဲ</span>
                        </div>
                        <div class="first_lottery">
                            <p style="color:darkblue;font-weight:600;"><?php 
                            $title_id=$row['title'];
                            $p_res = mysqli_query($con, "SELECT * FROM `price` WHERE `id`='$title_id'");
                            $p_row = mysqli_fetch_assoc($p_res);
                            echo $p_row['title']; ?>ကြိမ်မြောက်</p>
                            <a href="lottery-list-type.php?amount=<?php echo $row['amount'] ?>&date=<?php echo $row['title'] ?>">အသေးစိတ်ကြည့်မည်</a>
                        </div>
                    </div>
                <?php } }?>

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
