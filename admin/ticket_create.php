<?php
require('top.php');


$price = $_POST['price'] ?? '';
$amount = $_POST['amount'] ?? '';
$type = $_POST['type'] ?? '';
$title = $_POST['title'] ?? '';
$sell_type = $_POST['sell_type'] ?? '';

// Determine the value of $sell based on $sell_type
if ($sell_type == "လက်လီ") {
    $sell = '';
} else if ($sell_type == "လက်ကား") {
    $sell = 'custom';
}

$custom_name = $_POST['custom_name'] ?? '';
$custom_mobile = $_POST['custom_mobile'] ?? '';
$message='';



if (isset($_POST['createNum'])) {
    date_default_timezone_set('Asia/Yangon');
    $added_on = date('F Y');
    $date=date('Y-m-d');
    $alphas = $_POST['alpha'] ?? [];
    $num1s = $_POST['num1'] ?? [];
    $num2s = $_POST['num2'] ?? [];
    $num3s = $_POST['num3'] ?? [];
    $num4s = $_POST['num4'] ?? [];
    $num5s = $_POST['num5'] ?? [];
    $num6s = $_POST['num6'] ?? [];

        if (!empty($alphas) && !empty($num1s) && !empty($num2s) && !empty($num3s) && !empty($num4s) && !empty($num5s) && !empty($num6s)) {
            for ($i = 0; $i < count($alphas); $i++) {
                $alpha = mysqli_real_escape_string($con, $alphas[$i]);
                $num1 = mysqli_real_escape_string($con, $num1s[$i]);
                $num2 = mysqli_real_escape_string($con, $num2s[$i]);
                $num3 = mysqli_real_escape_string($con, $num3s[$i]);
                $num4 = mysqli_real_escape_string($con, $num4s[$i]);
                $num5 = mysqli_real_escape_string($con, $num5s[$i]);
                $num6 = mysqli_real_escape_string($con, $num6s[$i]);

                $res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' AND `num4`='$num4' AND `num5`='$num5' AND `num6`='$num6' AND `date`='$added_on'");
                if (mysqli_num_rows($res) > 0) {
                    $matchingLotteries = array(); // Initialize array to collect matching lotteries
                    while ($row = mysqli_fetch_assoc($res)) {
                        $matchingLotteries[] = $row; // Collect matching lotteries
                    }
                    ?>
                    <script>
                        var message = "ထီလက်မှတ်ဖြည့်သွင်းခြင်းမအောင်မြင်ပါ။ ယခုလအတွင်း တူညီသောအက္ခရာနှင့်နံပါတ်ရှိနေပါသည်။\n\n";
                        <?php foreach($matchingLotteries as $lottery): ?>
                            message += "<?= $lottery['alpha'] ?> <?= $lottery['num1'] ?> <?= $lottery['num2'] ?> <?= $lottery['num3'] ?> <?= $lottery['num4'] ?> <?= $lottery['num5'] ?> <?= $lottery['num6'] ?>";
                        <?php endforeach; ?>
                        window.alert(message);
                        window.location.href="ticket_create.php";
                    </script>
                    <?php


                    
                    exit; // Exit the loop if duplicates found
                }
            }

            $query = "INSERT INTO `list`(`title`, `amount`, `price`, `type`, `sell`, `date`) VALUES ('$title', '$amount', '$price', '$type', '$sell', '$added_on')";
            mysqli_query($con, $query);
            $list_id = mysqli_insert_id($con);
            if($sell==='custom'){
                $query_custom = "INSERT INTO `custom`(`list_id`, `name`, `mobile`, `date`) VALUES (?, ?, ?, ?)";
                $stmt_custom = mysqli_prepare($con, $query_custom);
                mysqli_stmt_bind_param($stmt_custom, "isss", $list_id, $custom_name, $custom_mobile, $date);
                mysqli_stmt_execute($stmt_custom);
            }
            for ($i = 0; $i < count($alphas); $i++) {
                $alpha = mysqli_real_escape_string($con, $alphas[$i]);
                $num1 = mysqli_real_escape_string($con, $num1s[$i]);
                $num2 = mysqli_real_escape_string($con, $num2s[$i]);
                $num3 = mysqli_real_escape_string($con, $num3s[$i]);
                $num4 = mysqli_real_escape_string($con, $num4s[$i]);
                $num5 = mysqli_real_escape_string($con, $num5s[$i]);
                $num6 = mysqli_real_escape_string($con, $num6s[$i]);

                $query = "INSERT INTO `lottery`(`list_id`, `alpha`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`,`date`) VALUES ('$list_id', '$alpha', '$num1', '$num2', '$num3', '$num4', '$num5', '$num6','$added_on')";
                mysqli_query($con, $query);
                $message="ထီလက်မှတ်ဖြည့်သွင်းခြင်းအောင်မြင်ပါသည်";

            }
        } else {
            ?>
            <script>
                window.alert('ထီလက်မှတ်ဖြည့်သွင်းခြင်းမအောင်မြင်ပါ။ထီလက်မှတ်များအားပြည့်စုံစွာဖြည့်သွင်းပါ။');
                window.location.href="ticket_create.php";
            </script>
            <?php
        }
    
}else if (isset($_POST['createINT'])) {
    date_default_timezone_set('Asia/Yangon');
    $added_on = date('F Y');
    $date=date('Y-m-d');

    if (isset($_POST['numall']) && is_array($_POST['numall'])) {
        $numAll = $_POST['numall'];
        $alphas = $_POST['alphaINT'] ?? [];

        // Initialize arrays for num1s, num2s, etc.
        $num1s = [];
        $num2s = [];
        $num3s = [];
        $num4s = [];
        $num5s = [];
        $num6s = [];

        // Iterate through each numAll value and assign to respective array
        foreach ($numAll as $numValue) {
            $numArray = str_split($numValue);
            $num1s[] = $numArray[0] ?? '';
            $num2s[] = $numArray[1] ?? '';
            $num3s[] = $numArray[2] ?? '';
            $num4s[] = $numArray[3] ?? '';
            $num5s[] = $numArray[4] ?? '';
            $num6s[] = $numArray[5] ?? '';
        }

        if (!empty($alphas) && !empty($num1s) && !empty($num2s) && !empty($num3s) && !empty($num4s) && !empty($num5s) && !empty($num6s)) {
            for ($i = 0; $i < count($alphas); $i++) {
                $alpha = mysqli_real_escape_string($con, $alphas[$i]);
                $num1 = mysqli_real_escape_string($con, $num1s[$i]);
                $num2 = mysqli_real_escape_string($con, $num2s[$i]);
                $num3 = mysqli_real_escape_string($con, $num3s[$i]);
                $num4 = mysqli_real_escape_string($con, $num4s[$i]);
                $num5 = mysqli_real_escape_string($con, $num5s[$i]);
                $num6 = mysqli_real_escape_string($con, $num6s[$i]);

                $res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' AND `num4`='$num4' AND `num5`='$num5' AND `num6`='$num6' AND `date`='$added_on'");
                if (mysqli_num_rows($res) > 0) {
                    $matchingLotteries = array(); // Initialize array to collect matching lotteries
                    while ($row = mysqli_fetch_assoc($res)) {
                        $matchingLotteries[] = $row; // Collect matching lotteries
                    }
                    ?>
                    <script>
                        var message = "ထီလက်မှတ်ဖြည့်သွင်းခြင်းမအောင်မြင်ပါ။ ယခုလအတွင်း တူညီသောအက္ခရာနှင့်နံပါတ်ရှိနေပါသည်။\n\n";
                        <?php foreach($matchingLotteries as $lottery): ?>
                            message += "<?= $lottery['alpha'] ?> <?= $lottery['num1'] ?> <?= $lottery['num2'] ?> <?= $lottery['num3'] ?> <?= $lottery['num4'] ?> <?= $lottery['num5'] ?> <?= $lottery['num6'] ?>";
                        <?php endforeach; ?>
                        window.alert(message);
                        window.location.href="ticket_create.php";
                    </script>
                    <?php
                    exit;// Exit the loop if duplicate found
                }
            }

            $query = "INSERT INTO `list`(`title`, `amount`, `price`, `type`, `sell`, `date`) VALUES ('$title', '$amount', '$price', '$type', '$sell', '$added_on')";
            mysqli_query($con, $query);
            $list_id = mysqli_insert_id($con);
            if($sell==='custom'){
                $query_custom = "INSERT INTO `custom`(`list_id`, `name`, `mobile`, `date`) VALUES (?, ?, ?, ?)";
                $stmt_custom = mysqli_prepare($con, $query_custom);
                mysqli_stmt_bind_param($stmt_custom, "isss", $list_id, $custom_name, $custom_mobile, $date);
                mysqli_stmt_execute($stmt_custom);
            }

            for ($i = 0; $i < count($alphas); $i++) {
                $alpha = mysqli_real_escape_string($con, $alphas[$i]);
                $num1 = mysqli_real_escape_string($con, $num1s[$i]);
                $num2 = mysqli_real_escape_string($con, $num2s[$i]);
                $num3 = mysqli_real_escape_string($con, $num3s[$i]);
                $num4 = mysqli_real_escape_string($con, $num4s[$i]);
                $num5 = mysqli_real_escape_string($con, $num5s[$i]);
                $num6 = mysqli_real_escape_string($con, $num6s[$i]);

                $query = "INSERT INTO `lottery`(`list_id`, `alpha`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`,`date`) VALUES ('$list_id', '$alpha', '$num1', '$num2', '$num3', '$num4', '$num5', '$num6','$added_on')";
                mysqli_query($con, $query);
                $message="ထီလက်မှတ်ဖြည့်သွင်းခြင်းအောင်မြင်ပါသည်";
            }
        } else {
            ?>
            <script>
                window.alert('ထီလက်မှတ်ဖြည့်သွင်းခြင်းမအောင်မြင်ပါ။ထီလက်မှတ်များအားပြည့်စုံစွာဖြည့်သွင်းပါ။');
                window.location.href="ticket_create.php";
            </script>
            <?php
        }
    } 
}
?>




  <style>
    body.dark-mode-variables .header-search-theme input[type="text"] {
        background-color: lightblue;
        color: #000;
        width: 90px;
        height: 40px;
        padding: 5px 10px;
        border: none;
        border-radius: 10px;
        outline: none;
    }

    .header-search-theme input[type="text"] {
        background-color: lightgreen;
        color: #000;
        width: 90px;
        height: 40px;
        padding: 5px 10px;
        border: none;
        border-radius: 10px;
        outline: none;
    }

    .dark-mode-toggle {
        
        cursor: pointer;
        min-width: 220px;
        height: 40px; /* Adjust as needed */
        position: relative;
        transition: background-color 0.3s ease;
        border-radius:10px;
  
    }

    .dark-mode-toggle span {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        line-height: 1;
        transition: transform 0.3s ease;
        padding:10px;
        background:blue;
        border-radius:10px;
        color:#fff;
    }

    .dark-mode-toggle span.active {
        transform: translate(calc(100% + 30px), -50%);
        margin-left:10px;
        background:none;
        color:darkblue;
    }


    
    .result_container {
        overflow-x: auto;
        border:1px solid #19E9F0;
        margin: 0rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .result_container table {
        width: 100%; /* Table fills the container */
    }
    .result_container table tr{
        background-image:url(../lottery.png);
        background-position:center;
    }
    
    .result_container table td{
        border:3px solid #fff;
    }
    
    .result_container table td:nth-child(1) {
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:1px 3px 3px white;

    }
    .result_container table td:nth-child(2) {
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:3px 10px 10px #fff;
        display:flex;
        gap:0.5rem;
    }
   
    .header-search-container {
      flex-grow: 1;
    }

    .search-container-small {
      flex-basis: 30%; /* Set width to 30% for small search bar */
    }

    .search-container-large {
      flex-basis: 70%; /* Set width to 70% for large search bar */
    }


    .search-btn {
      background-color: green;
      color: white;
      border: none;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      cursor: pointer;
    }
    .cash-container {
        margin:2rem 15rem;
      display: flex;
      flex-direction: column;
      color:#fff;
      background-color: #fff; /* Set background color */
      border: 1px solid #ccc; /* Add border */
      border-radius: 5px; /* Add border radius */
      padding: 10px; /* Add padding */
      max-width: 500px; /* Set max-width if needed */
    }

    .amount,
    .total {
      width:100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px; /* Add margin between sections */
    }

    .cash-container span {
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
    }

    .cash-container span:first-child {
      color: #000; /* Set color for labels */
    }

    .cash-container span:last-child {
      color: #000; /* Set color for values */
    }
    .btn-primary {
      background-color: #19E9F0;
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

    .input{
        border:none;
        outline:none;
        align-items:center;
        text-align: center; 
        width: 30px; 
        height: 40px; 
        line-height: 40px; 
        font-weight:600;
        background:transparent;
        text-shadow:1px 3px 3px #fff;
    }
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



    /* Media query for mobile devices */
    @media (max-width: 768px) {
      .container {
        display: grid; 
        grid-template-columns:40% 60%;/* Display search bars vertically on mobile */
      }
      .cash-container{
        margin: 2rem 1rem;
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
        }
        .search-option {
            font-size: 14px; /* Adjust font size for smaller screens */
        }
        .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
    }



  </style>
 <div class="banner">
        <?php
            date_default_timezone_set('Asia/Yangon');
            $month = date('F Y');
            $res = mysqli_query($con, "SELECT * FROM `price` WHERE `date`='$month'");
            $row = mysqli_fetch_assoc($res);
            $title_res = $row['title'];
            $alpha_res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `title`='$title_res'"));
            $alpha_count=$alpha_res['count_alpha'];
            
        ?>
        <form action="" class="header-main" method="post" style="margin-top: 0rem;">
            <div class="container" style="margin-bottom: 0rem;margin-top: 0rem;">
                <div class="header-search-container">
                    <input type="text" class="search-field" placeholder="<?php echo $row['title'] ?>ကြိမ်မြောက်" required value="<?php echo $row['title'] ?> ကြိမ်မြောက်" readonly>
                    <input type="hidden" name="title" class="search-field" placeholder="<?php echo $row['title'] ?>ကြိမ်မြောက်" required value="<?php echo $row['id'] ?>" >
                </div>
            </div>
            <div class="container" style="margin-bottom: 1rem;margin-top: 0rem;">
                <div class="header-search-theme" style="display:flex;gap:0.5rem;">
                    <input type="text" name="sell_type" id="sell_type_input" readonly required value="လက်လီ" placeholder="လက်လီ">
                    <div class="dark-mode-toggle" style="width:300px;background:#AFDEEF;">
                        <span class="material-icons-sharp active" id="darkModeIcon" >
                            လက်ကား
                        </span>
                        <span class="material-icons-sharp" id="lightModeIcon">
                        လက်လီ
                        </span>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-bottom: 1rem;display:none" id="custom_box">
                <div class="header-search-container search-container-large">
                    <input type="text" name="custom_name" class="search-field" id="custom_name" placeholder="ဝယ်သူအမည်" style="width:100%;padding:14px 10px;text-align:center;font-size:15px;font-weight:700;" >
                </div>
                <div class="header-search-container search-container-large">
                    <input type="tel" name="custom_mobile" class="search-field" id="custom_mobile" placeholder="ဝယ်သူဖုန်းနံပါတ်" style="width:100%;padding:14px 10px;text-align:center;font-size:15px;font-weight:700;" >
                </div>
            </div>
            <script>
                        const sellTypeInput = document.getElementById('sell_type_input');
                        const custombox = document.getElementById('custom_box');
                        const lightModeIcon = document.getElementById('lightModeIcon');
                        const darkModeIcon = document.getElementById('darkModeIcon');
                        const darkModeToggle = document.querySelector('.dark-mode-toggle');

                        darkModeToggle.addEventListener('click', () => {
                            document.body.classList.toggle('dark-mode-variables');
                            lightModeIcon.classList.toggle('active');
                            darkModeIcon.classList.toggle('active');

                            // Update the sell_type_input value based on dark mode state
                            sellTypeInput.value = document.body.classList.contains('dark-mode-variables') ? 'လက်ကား' : 'လက်လီ';
                            if (sellTypeInput.value === 'လက်ကား') {
                                custombox.style.display = '';
                                document.getElementById('custom_name').setAttribute('required', '');
                                document.getElementById('custom_mobile').setAttribute('required', '');
                            } else {
                                custombox.style.display = 'none';
                                document.getElementById('custom_name').removeAttribute('required');
                                document.getElementById('custom_mobile').removeAttribute('required');
                            }
                        });


                </script>
            <style>
                .search-container-small {
                    position: relative;
                    width: 100%;
                    max-width: 200px; /* Limit maximum width */
                }
                .search-container-small button,#type_select,#alpha_select,#num-input{
                    padding: 10px;
                    width: 100%;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    cursor: pointer;
                }
                .grid-select {
                    display: none;
                    position: absolute;
                    grid-template-columns: repeat(3, 1fr); /* Adjust to two columns for mobile */
                    gap: 5px; /* Add some gap between buttons */
                    top: calc(100% + 10px); /* Add some space between select and options */
                    left: 0;
                    width: 300px;
                    background-color: #fff;
                    border-top: none;
                    border-radius: 0 0 5px 5px;
                    z-index: 1;
                    text-align: center;
                }
                .type{
                    display: none;
                    position: absolute;
                    grid-template-columns: repeat(2, 1fr); /* Adjust to two columns for mobile */
                    gap: 5px; /* Add some gap between buttons */
                    top: calc(100% + 10px); /* Add some space between select and options */
                    left: 0;
                    width: 220px;
                    background-color: #fff;
                    border-top: none;
                    border-radius: 0 0 5px 5px;
                    z-index: 1;
                    text-align: center;
                }
                .alpha{
                    display: none;
                    position: absolute;
                    grid-template-columns: repeat(4, 1fr); /* Adjust to two columns for mobile */
                    gap: 5px; /* Add some gap between buttons */
                    top: calc(100% + 10px); /* Add some space between select and options */
                    left: 0;
                    width: 220px;
                    background-color: #fff;
                    border-top: none;
                    border-radius: 0 0 5px 5px;
                    z-index: 1;
                    text-align: center;
                }
                
                .search-option,.search-option-type ,.search-option-alpha{
                    display: block;
                    width: 100%;
                    padding: 10px;
                    text-align: center;
                    border: none;
                    color:#fff;
                    background-color: rgba(0, 0, 255, 0.5);
                    cursor: pointer;
                    border-radius:3px;
                }

                .search-option:hover {
                    background-color: lightblue;
                }

                .selected {
                    background-color: #007bff;
                    color: #fff;
                }

                /* Hide native dropdown arrow */
                .search-field::-ms-expand {
                    display: none;
                }

                .search-field {
                    -webkit-appearance: none;
                    -moz-appearance: none;
                    appearance: none;
                    background-color: transparent;
                    border: none;
                    font-size: 12px;
                    cursor: pointer;
                    width: 100%;
                    padding: 5px;
                    margin-bottom: 10px;
                }
            </style>
            <div class="container" style="margin-bottom: 1rem;">
                <div class="header-search-container search-container-small">
                    <button id="count_select">စောင်ရေ</button>
                    <select name="count" class="search-field" id="count" style="display:none">
                        <option value="1">၁</option>
                        <option value="3">၃</option>
                        <option value="5">၅</option>
                        <option value="6">၆</option>
                        <option value="8">၈</option>
                        <option value="9">၉</option>
                        <option value="10">၁၀</option>
                        <option value="11">၁၁</option>
                        <option value="50">၅၀</option>
                        <option value="100">၁၀၀</option>
                        <!-- Add other options as needed -->
                    </select>

                    <div class="grid-select count" id="custom-select">
                        <div class="search-option" data-value="1">၁</div>
                        <div class="search-option" data-value="3">၃</div>
                        <div class="search-option" data-value="5">၅</div>
                        <div class="search-option" data-value="6">၆</div>
                        <div class="search-option" data-value="8">၈</div>
                        <div class="search-option" data-value="9">၉</div>
                        <div class="search-option" data-value="10">၁၀</div>
                        <div class="search-option" data-value="11">၁၁</div>
                        <div class="search-option" data-value="50">၅၀</div>
                        <div class="search-option" data-value="100">၁၀၀</div>
                    </div>
                </div>
                
                <div class="header-search-container search-container-large">
                    <button id="type_select" >အမျိုးအစား</button>
                    <select type="search" name="type" id="type" class="search-field" style="width: 100%; padding: 10px;display:none;">
                        <option style="background-color: #f8f9fa;color: #333;font-size: 12px;" selected disabled hidden>အမျိုးအစား</option>
                        <option value="num" class="search-option" style="background-color: #f8f9fa;color: #333;font-size: 12px;">အက္ခရာတူနံပါတ်ကွဲ</option>
                        <option value="alpha" class="search-option" id="alpha-option" style="background-color: #f8f9fa;color: #333;font-size: 12px;">အက္ခရာကွဲနံပါတ်တူ</option>
                        <option value="int" class="search-option" style="background-color: #f8f9fa;color: #333;font-size: 12px;">အင်တာနက်</option>
                    </select>
                    <div class="grid-select type" id="type-select">
                        <div class="search-option-type" data-value="num">အက္ခရာတူနံပါတ်ကွဲ</div>
                        <div class="search-option-type" id="alphaoption" data-value="alpha">အက္ခရာကွဲနံပါတ်တူ</div>
                        <div class="search-option-type" data-value="int">အင်တာနက်</div>
                    </div>
                </div>
            </div>

            <div class="container" style="margin-bottom: 1rem;">
                <div class="header-search-container search-container-small" id="alpha-res-container">
                    <button id="alpha_select" >အမျိုးအစား</button>
                    <select name="search" class="search-field" id="alpha" onchange="" style="display:none">
                        <option value="" selected disabled hidden>အက္ခရာ</option>
                        <script>
                            var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                            var arrayCountalpha = <?php echo isset($alpha_res['count_alpha']) ? $alpha_res['count_alpha'] : 0; ?>;
                            // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                            for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                document.write('<option value="' + alphaoption[i] + '">' + alphaoption[i] + '</option>');
                            }
                        </script>
                    </select>
                    <div class="grid-select alpha" id="alpha-select">
                        
                        <script>
                            var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                            var arrayCountalpha = <?php echo isset($alpha_res['count_alpha']) ? $alpha_res['count_alpha'] : 0; ?>;
                            // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                            for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                document.write('<div class="search-option-alpha" data-value="' + alphaoption[i] + '">' + alphaoption[i] + '</div>');
                            }
                        </script>
                    </div>

                </div>
                <div class="header-search-container search-container-large">
                    <input type="number" name="search" class="search-field" placeholder="နံပါတ်" id="num-input" style="width:100%;padding:14px 10px;text-align:center;font-size:15px;font-weight:700;" oninput="limitInputLength(this, 6)">
                </div>
            </div>
            <?php if($message !== ''): ?>
                <div class="notification-container">
                    <div class="notification">
                        <i class="fas fa-check-circle"></i>
                        <p><?php echo $message ?></p>
                    </div>
                </div>
            <?php endif; ?>
            <div class="result_container" style="height: 300px; overflow-y: auto;">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>Tickets</p>
                </div>
                <table style="margin-bottom:2rem;">
                    <tr style="background-image:url();background-position:center;">
                        <th style="text-align:justify">အက္ခရာ</th>
                        <th style="text-align:justify">နံပါတ်</th>
                    </tr>
                    <tbody id="table-body" style="">
                        <!-- Existing rows here -->
                    </tbody>
                    <tbody id="table-body-int" style="background-image:url();background-position:center;">
                        <!-- Existing rows here -->
                    </tbody>
                </table>
            </div>
            <div class="cash-container">
                <div class="amount">
                    <span>Total Amount</span>
                    <span style="color:green"><input type="number" placeholder="<?php echo $row['price'] ?>" style="border:none;outline:none;" name="price" id="totalPrice" required value="<?php echo $row['price'] ?>" readonly> KS</span>
                </div>
                <div class="total">
                    <span>Total tickets</span>
                    <span><input type="number" name="amount" id="total-ticket" style="border:none;outline:none;" readonly></span>
                </div>
                <input type="submit" class="btn-primary" value="စာရင်းသွင်း" id="createNum" name="createNum">
                <input type="submit" class="btn-primary" value="စာရင်းသွင်း" class="createINT" id="createINT" name="createINT" style="display:none">
            </div>
        </form>
</div>


</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
    // // Get the select element
    // var countSelect = document.getElementById('count');
    // var alphaOption = document.getElementById('alpha-option');

    // // Add change event listener to the count select element
    // countSelect.addEventListener('change', function() {
    //     // Get the selected value of the count select
    //     var selectedCount = parseInt(this.value);

    //     // Check if the selected count is greater than $alpha_count
    //     // If it is, disable the alpha option; otherwise, enable it
    //     if (selectedCount > <?php echo $alpha_count; ?>) {
    //         alphaOption.disabled = true;
    //     } else {
    //         alphaOption.disabled = false;
    //     }
    // });

    function limitAlphaLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }

    function limitInputLength(input, maxLength) {
        if (input.value.length > maxLength) {
            input.value = input.value.slice(0, maxLength);
        }
    }
    var numInputforalphaNum = document.getElementById('num-input');
    var createNumBtn = document.getElementById('createNum');
    // Function to enable/disable createNum button based on input length
    function checkInputLength() {
        if (numInputforalphaNum.value.length < 6) {
            createNumBtn.disabled = true;
        } else {
            createNumBtn.disabled = false;
        }
    }
    numInputforalphaNum.addEventListener('input', checkInputLength);

    // Call checkInputLength function initially
    checkInputLength();

    

    document.addEventListener('DOMContentLoaded', function() {
        var countInput = document.getElementById('count');
        var alpha = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ','ည','ဍ','ဌ','ဋ','ဎ','ဏ','တ','ထ','ဒ','ဓ','န','ပ','ဖ','ဗ','ဘ','မ','ယ','ရ','လ','ဝ','သ','ဟ','ဠ','အ','ကက','ကခ','ကဂ','ကဃ','ကင','ကစ','ကဆ','ကဇ','ကဈ','ကည','ကဍ','ကဌ']; // Array of alphabets

        function generateRows() {
            var countInput = document.getElementById('count');
            var totalPriceInput = document.getElementById('totalPrice');
            var totalTicketInput = document.getElementById('total-ticket');

            document.getElementById('table-body').innerHTML = '';
            var count = parseInt(countInput.value);
            var pricePerItem = <?php echo $row['price'] ?>;
            var totalPrice = count * pricePerItem;
            totalPriceInput.value = totalPrice;
            totalTicketInput.value = count;

            var numInput = parseInt(document.getElementById('num-input').value.trim()) || 0; // Get the trimmed value of num-input and parse it as an integer
            var numArray = [];

            if (numInput) {
                numArray = numInput.toString().padStart(6, '0').split('').map(Number); // Pad the number to 6 digits with leading zeros if necessary
            }

            for (var i = 0; i < count; i++) {
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td><input type="text" class="input alpha-set" name="alpha[]" readonly required></td>
                    <td>
                    <input type="text" class="input" id="num1_${i}" value="${numArray[0] !== undefined ? numArray[0] : ''}" name="num1[]" required>
                    <input type="text" class="input" id="num2_${i}" value="${numArray[1] !== undefined ? numArray[1] : ''}" name="num2[]" required>
                    <input type="text" class="input" id="num3_${i}" value="${numArray[2] !== undefined ? numArray[2] : ''}" name="num3[]" required>
                    <input type="text" class="input" id="num4_${i}" value="${numArray[3] !== undefined ? numArray[3] : ''}" name="num4[]" required>
                    <input type="text" class="input" id="num5_${i}" value="${numArray[4] !== undefined ? numArray[4] : ''}" name="num5[]" required>
                    <input type="text" class="input" id="num6_${i}" value="${numArray[5] !== undefined ? numArray[5] : ''}" name="num6[]" required>
                    </td>
                    
            `;
                document.getElementById('table-body').appendChild(newRow);
                if (document.getElementById('type').value === 'num') {
                    numInput++; // Increment numInput
                    numArray = numInput.toString().padStart(6, '0').split('').map(Number);
                }
            }

            var numInputs = document.querySelectorAll('.input[id^="num"]');
            numInputs.forEach(function(input) {
                if (input.value === '') {
                    input.removeAttribute('required');
                }
            });
            // Update alpha-set inputs based on the selected option
            toggleSearchContainer(document.getElementById('type').value);
        }

        const countOptions = document.querySelector('.grid-select.count');
        const countSelectButton = document.getElementById('count_select');
        var alphaOption = document.getElementById('alphaoption');
        const typeOptions = document.querySelector('.grid-select.type');
        const typeSelectButton = document.getElementById('type_select');
        const alphaOptions = document.querySelector('.grid-select.alpha');
        const alphaSelectButton = document.getElementById('alpha_select'); 
        
        countSelectButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent page reload
            countOptions.style.display = countOptions.style.display === 'grid' ? 'none' : 'grid';
            alphaOptions.style.display = 'none';
            typeOptions.style.display = 'none' ;
        });
        typeSelectButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent page reload
            alphaOptions.style.display = 'none';
            countOptions.style.display ='none' ;
            typeOptions.style.display = typeOptions.style.display === 'grid' ? 'none' : 'grid';
        });
        alphaSelectButton.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent page reload
            typeOptions.style.display = 'none' ;
            countOptions.style.display ='none' ;
            alphaOptions.style.display = alphaOptions.style.display === 'grid' ? 'none' : 'grid';
        });

        var select = document.getElementById('count');
        var customSelect = document.getElementById('custom-select');
        var type = document.getElementById('type');
        var typeSelect = document.getElementById('type-select');
        var alpha = document.getElementById('alpha');
        var alphaSelect = document.getElementById('alpha-select');
        
        // Event listener for native select change
        select.addEventListener('change', function() {
            var selectedValue = this.value;
            // Update custom select display
            updateCustomSelect(selectedValue);
        });
        type.addEventListener('change', function() {
            var selectedValue = this.value;
            // Update custom select display
            updatetypeSelect(selectedValue);
        });
        alpha.addEventListener('change', function() {
            var selectedValue = this.value;
            // Update custom select display
            updatealphaSelect(selectedValue);
        });
        
        // Event listener for custom select options
        customSelect.addEventListener('click', function(e) {
    if (e.target.classList.contains('search-option')) {
        var selectedValue = e.target.getAttribute('data-value');
        // Update native select value
        select.value = selectedValue;
        countSelectButton.textContent = e.target.textContent;
        generateRows();
        // Check if the selected count is greater than $alpha_count
        // If it is, hide the alpha option; otherwise, show it
        if (parseInt(selectedValue) > <?php echo $alpha_count; ?>) {
            document.getElementById('alphaoption').style.display = "none";
        } else {
            document.getElementById('alphaoption').style.display = "";
        }
        countOptions.style.display ='none' ;
        // Update custom select display
        updateCustomSelect(selectedValue);
    }
});

        typeSelect.addEventListener('click', function(e) {
            if (e.target.classList.contains('search-option-type')) {
                var selectedValue = e.target.getAttribute('data-value');
                // Update native select value
                type.value = selectedValue;
                typeSelectButton.textContent =e.target.textContent;
                toggleSearchContainer(selectedValue);
                typeOptions.style.display = 'none' ;
                updatetypeSelect(selectedValue);
            }
        });
        alphaSelect.addEventListener('click', function(e) {
            if (e.target.classList.contains('search-option-alpha')) {
                var selectedValue = e.target.getAttribute('data-value');
                // Update native select value
                alpha.value = selectedValue;
                alphaSelectButton.textContent =e.target.textContent;
                var value = document.getElementById('type').value;
                toggleSearchContainer(value);
                alphaOptions.style.display = 'none';
                
                updatealphaSelect(selectedValue);
            }
        });
        

        // Function to update custom select display
        function updateCustomSelect(selectedValue) {
            var options = customSelect.getElementsByClassName('search-option');
            for (var i = 0; i < options.length; i++) {
                options[i].classList.remove('selected');
                if (options[i].getAttribute('data-value') === selectedValue) {
                    options[i].classList.add('selected');
                }
            }
        }
        function updatetypeSelect(selectedValue) {
            var options = customSelect.getElementsByClassName('search-option-type');
            for (var i = 0; i < options.length; i++) {
                options[i].classList.remove('selected');
                if (options[i].getAttribute('data-value') === selectedValue) {
                    options[i].classList.add('selected');
                }
            }
        }
        function updatealphaSelect(selectedValue) {
            var options = customSelect.getElementsByClassName('search-option-alpha');
            for (var i = 0; i < options.length; i++) {
                options[i].classList.remove('selected');
                if (options[i].getAttribute('data-value') === selectedValue) {
                    options[i].classList.add('selected');
                }
            }
        }
        function toggleSearchContainer(value) {
            var alphaSets = document.querySelectorAll('.alpha-set');
            var currentAlpha = document.getElementById('alpha').value;
            var alpha = document.getElementById('alpha');
            var numInput = document.getElementById('num-input');
            var tableBody = document.getElementById('table-body');
            var tablebodyint = document.getElementById('table-body-int');
            var createNum = document.getElementById('createNum');
            var createINT = document.getElementById('createINT');
            if (value === 'num' || value === '') {
                alpha.style.display = 'none';
                numInput.style.display = 'block';
                createNum.style.display = 'block';
                createINT.style.display = 'none';
                tableBody.style.display = ''; // Hide the table
                tablebodyint.style.display = 'none'; // Hide the table
                for (var i = 0; i < alphaSets.length; i++) {
                    alphaSets[i].value = currentAlpha;
                }
            } else if (value === 'alpha') {
                alpha.style.display = 'none';
                numInput.style.display = 'block';
                createNum.style.display = 'block';
                createINT.style.display = 'none';
                tableBody.style.display = ''; // Show the table
                tablebodyint.style.display = 'none'; // Hide the table

                var alphaArray = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                var countAlpha = <?php echo isset($alpha_res['count_alpha']) ? $alpha_res['count_alpha'] : 0; ?>; // Assuming $alpha_count 
                var truncatedAlphaArray = alphaArray.slice(0, countAlpha);// Assuming $alpha_count contains the number of alpha
                var startIndex = alphaArray.indexOf(currentAlpha);

                // Loop through alphaArray and assign values to alphaSets
                for (var i = 0; i < alphaSets.length; i++) {
                    // Wrap around to the beginning if we reach the end of the array
                    var alphaIndex = (startIndex + i) % truncatedAlphaArray.length;
                    alphaSets[i].value = truncatedAlphaArray[alphaIndex];
                }

            } else if (value === 'int') {
                alpha.style.display = 'none';
                numInput.style.display = 'none';
                tableBody.style.display = 'none'; 
                createNum.style.display = 'none';
                createINT.style.display = 'block';
                tablebodyint.style.display = 'block'; // Show the table

                tablebodyint.innerHTML = ''; // Clear existing rows

                var countInput = parseInt(document.getElementById('count').value);
                for (var i = 0; i < countInput; i++) {
                    var newRow = document.createElement('tr');
                    newRow.style.display = 'flex';
                    newRow.style.backgroundImage = 'url( lottery.png  )';
                    newRow.innerHTML = `
                        <td><input type="text" class="input" style="border-radius:10px;width:100px; background:#19E9F0;color:#000;" name="alphaINT[]" required></td>
                        <td><input type="number" class="input" style="border-radius:10px;width:200px;background:#19E9F0;color:#000;" name="numall[]" id="numAll" oninput="limitInputLength(this, 6)" ></td>
                    `;
                    tablebodyint.appendChild(newRow);
                }
                // Get all numAll input fields and the createINT button
                var numAllInputs = document.querySelectorAll('input[name="numall[]"]');
                var createINTBtn = document.getElementById('createINT');

                // Function to check the length of numAll inputs and enable/disable createINT button accordingly
                function checkInputLengthINT() {
                    var allInputsValid = true;
                    numAllInputs.forEach(function(input) {
                        if (input.value.length < 6) {
                            allInputsValid = false;
                        }
                    });
                    createINTBtn.disabled = !allInputsValid;
                }

                // Event listener for input on each numAll input field
                numAllInputs.forEach(function(input) {
                    input.addEventListener('input', checkInputLengthINT);
                });

                // Call checkInputLength function initially
                checkInputLengthINT();


            }
        }

        document.getElementById('alpha').addEventListener('input', function() {
            var value = document.getElementById('type').value;
            toggleSearchContainer(value);
        });

        document.getElementById('type').addEventListener('change', function() {
            var value = this.value;
            toggleSearchContainer(value);
        });

        
        document.getElementById('num-input').addEventListener('input', function() {
            var numInput = parseInt(this.value.trim()) || 0; // Get the trimmed value of num-input and parse it as an integer
            var numArray = [];

            if (numInput) {
                numArray = numInput.toString().padStart(6, '0').split('').map(Number); // Pad the number to 6 digits with leading zeros if necessary
            }

            var rows = document.querySelectorAll('#table-body tr');
            rows.forEach(function(row, index) {
                var numInputs = row.querySelectorAll('.input[id^="num"]');
                var value = document.getElementById('type').value;
                if (value !== "alpha") {
                    var incrementedValue = numInput + index; // Calculate the incremented value for each row
                    var incrementedArray = incrementedValue.toString().padStart(6, '0').split('').map(Number); // Convert incremented value to array format
                    for (var i = 0; i < numInputs.length; i++) {
                        numInputs[i].value = incrementedArray[i] !== undefined ? incrementedArray[i] : ''; // Update input value with incrementedArray value or empty string
                    }
                } else {
                    // Handle alpha behavior here
                    // For example, you might want to set all alpha-set inputs to 'A' or any other default value
                    for (var i = 0; i < numInputs.length; i++) {
                        numInputs[i].value = numArray[i]; // Set all alpha-set inputs to 'A'
                    }
                }
            });
        });
    });

</script>



<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
