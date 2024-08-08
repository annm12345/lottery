<?php
require('top.inc.php');
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
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            font-size: 1.2rem; 
            font-weight: 700;/* Adjust font size as needed */
            margin: 0 5px;
            border-radius: 50%;
            background-color: #fff;
            color:#000; /* Dark gray color */
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
            font-size: 1.2rem; 
            font-weight: 700;/* Adjust font size as needed */
            margin: 0 5px;
            border-radius: 50%;
            background-color: #fff;
            color:#000; /* Yellow color */
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
                width: 25px;
                height: 25px;
                line-height: 25px;
                font-size: 0.87rem;
            }
        }
    </style>

    <div class="banner">
        <div class="header-main">
            <div class="result_container">
                <?php
                    if(isset($_GET['amount']) && isset($_GET['type']) && isset($_GET['date'])) {
                        $amount = $_GET['amount'];
                        $type = $_GET['type'];
                        $date = $_GET['date'];
                        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `amount`='$amount' AND `type`='$type' AND `date`='$date' AND `sell`!='true'");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                ?>
                        <div class="list_container">
                            <div class="lottery_main">
                                <img src="assets/images/logo/iQ8dzT01.svg" alt="" width="50">
                                <span><?php echo $lot_row['alpha'] ?></span>
                            </div>
                            <div class="first_lottery">
                                <div class="">
                                    <span><?php echo $lot_row['num1'] ?></span>
                                    <span><?php echo $lot_row['num2'] ?></span>
                                    <span><?php echo $lot_row['num3'] ?></span>
                                    <span><?php echo $lot_row['num4'] ?></span>
                                    <span><?php echo $lot_row['num5'] ?></span>
                                    <span><?php echo $lot_row['num6'] ?></span>
                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">အသေးစိတ်ကြည့်မည်</a>
                                <p style="color:darkblue;font-weight:600;"><?php echo $row['title'] ?></p>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>

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
