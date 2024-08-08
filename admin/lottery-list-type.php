<?php
require('top.php');
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
            gap: 2rem;
            flex-direction:column;
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

        /* Media query for mobile responsiveness */
        @media (max-width: 768px) {
            .result_container {
                padding: 10px;
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
            <div class="result_container">
                <?php
                    if(isset($_GET['amount']) && isset($_GET['date'])){
                    $amount=$_GET['amount'];
                    $date=$_GET['date'];
                    $res = mysqli_query($con, "SELECT DISTINCT(type),`title` FROM `list` where `amount`='$amount' and `title`='$date'");
                    while ($row = mysqli_fetch_assoc($res)) {
                ?>
                    <div class="list_container">
                        <div class="lottery_main">
                            <img src="assets/images/logo/iQ8dzT01.svg" alt="" width="50">
                            <span><?php
                            if($row['type']=="num"){
                                echo $amount;
                                echo "ဆောင်တွဲ";
                                echo "<br>";
                                echo "အက္ခရာတူနံပါတ်ကွဲ";
                            }
                            elseif($row['type']=="alpha"){
                                echo $amount;
                                echo "ဆောင်တွဲ";
                                echo "<br>";
                                echo "အက္ခရာကွဲနံပါတ်တူ";
                            }elseif($row['type']=="int"){
                                echo $amount;
                                echo "ဆောင်တွဲ";
                                echo "<br>";
                                echo "အင်တာနက်";
                            }
                             ?></span>
                        </div>
                        <div class="first_lottery">
                            <p style="color:darkblue;font-weight:600;"><?php 
                            $title_id=$row['title'];
                            $p_res = mysqli_query($con, "SELECT * FROM `price` WHERE `id`='$title_id'");
                            $p_row = mysqli_fetch_assoc($p_res);
                            echo $p_row['title']; ?>ကြိမ်မြောက်</p>
                            <a href="lottery_list_detail.php?amount=<?php echo $amount ?>&type=<?php echo $row['type'] ?>&date=<?php echo $date ?>">အသေးစိတ်ကြည့်မည်</a>
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
