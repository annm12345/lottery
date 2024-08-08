<?php
require('top.inc.php');
if(isset($_GET['amount'])&& isset($_GET['date'])) {
    $amount = $_GET['amount'];
    $date = $_GET['date'];
}
?>

<style>
    .result_container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 2rem;
    }

    .list_container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 2rem;
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
        height: 60px;
        line-height: 60px;
        text-align: center;
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0 5px;
        color: #000;
    }

    .first_lottery a {
        padding: 0.3rem 0.5rem;
        background: blue;
        margin-left:1rem;
        color: #fff;
        font-weight: 750;
        text-decoration: none;
        border-radius: 10px;
    }

    .first_lottery {
        display: grid;
        grid-template-columns: 65% 40%;
        justify-content: space-around;
        align-items: center;
        text-align: center;
        gap: 2rem;
    }

    .first_lottery span {
        height: auto;
        line-height: normal;
        font-size: 1.2rem;
        font-weight: 700;
        margin: 0 5px;
        border: 1px solid #000;
        padding: 0.5rem 0.5rem;
        border-radius: 10px;
        background-color: #fff;
        color: #000;
    }

    .form-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .form-group {
        margin-bottom: 15px;
        display: flex;
    }

    .form-group label {
        margin-bottom: 10px;
    }

    .form-group select,
    .form-group input[type="text"],
    .form-group input[type="number"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    

    .type {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: url('data:image/svg+xml;utf8,<svg fill="%23444" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/></svg>') no-repeat right center;
        background-size: 24px 24px;
        padding-right: 30px;
    }

    /* Apply grid layout to the select element */
    .type {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px; /* Adjust the gap between buttons */
        padding: 0;
        border: none;
        cursor: pointer;
    }

    /* Style the options to resemble keypad buttons */
    .type option {
        padding: 20px;
        font-size: 15px;
        text-align: center;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        border-radius: 10px;
        cursor: pointer;
    }

    /* Hover effect for options */
    .type option:hover {
        background-color: #e0e0e0;
    }


    button.btn {
        padding: 0px 20px;
        height:50px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Media query for mobile responsiveness */
    @media (max-width: 768px) {
        
        .result_container {
            padding: 10px;
            margin-bottom: 100px;
        }

        .lottery_main span {
            font-size: 1rem;
        }

        .first_lottery span {
            font-size: 0.87rem;
        }

        .form-group {
            display: flex;
            gap: 10px;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .form-group select {
            width: 100%;
        }

        .form-group input[type="text"],
        .form-group input[type="number"] {
            width: 100%;
        }
    }
</style>



    <div class="banner">
        <div class="header-main">
            <!-- <div class="form-container">
                <div style="display:flex;flex-direction:column;gap:0.3rem;margin-top:-6rem;margin-bottom:-6rem;">
                    <div class="form-group">
                        <button class="btn" style="padding: 5px 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;" onclick="resetPage()">RESET</button>
                    </div>
                </div>

            </div> -->
            <div class="form-container">
                <div style="display:flex;flex-direction:column;gap:0.3rem;margin-top:-6rem;">
                    <div class="form-group">
                        <style>
                            .keypad-select {
                                position: relative;
                                width: 100%;
                                max-width: 200px; /* Limit maximum width */
                                margin-bottom: 20px; /* Add some space between keypads */
                            }
                            .keypad-select select{
                                display:none;
                            }

                            /* Style for the select button */
                            .keypad-select button, .keypad-options button {
                                padding: 10px;
                                width: 100%;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                                background-color: blue; /* Green background */
                                color: white; /* White text */
                                font-size: 16px;
                                transition: background-color 0.3s; /* Smooth transition */
                                margin-bottom: 5px; /* Add some space between buttons */
                            }

                            /* On hover, change background color */
                            .keypad-select button:hover, .keypad-options button:hover {
                                background-color: #45a049;
                            }

                            /* Style for the keypad options container */
                            .keypad-options, .keypad-options-alpha {
                                display: none;
                                grid-template-columns: repeat(3, 1fr); /* Adjust to two columns for mobile */
                                position: absolute;
                                top: calc(100% + 10px); /* Add some space between select and options */
                                left: 0;
                                width: 100%;
                                background-color: rgba(255, 255, 250, 0.5);
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                z-index: 1;
                                text-align: center;
                                padding: 10px;
                            }

                            /* Style for the keypad options buttons */
                            .keypad-options button, .keypad-options-alpha button {
                                display: inline-block;
                                padding: 5px 10px;
                                margin: 5px;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                                background-color: blue; /* Green background */
                                color: white; /* White text */
                                font-size: 16px;
                                transition: background-color 0.3s; /* Smooth transition */
                            }

                            /* On hover, change background color of options */
                            .keypad-options button:hover, .keypad-options-alpha button:hover {
                                background-color: #45a049;
                            }

                            /* Media query for smaller screens */
                            @media screen and (max-width: 480px) {
                                .keypad-options, .keypad-options-alpha {
                                    min-width: 200px; /* Limit maximum width for mobile */
                                    max-height: 300px; /* Limit maximum height for mobile */
                                    overflow-y: auto; /* Add scrollbar if options exceed maximum height */
                                }
                                .keypad-options-alpha{
                                    gap:0.5rem;
                                }
                                .keypad-options{
                                    grid-template-columns: repeat(2, 1fr); /* Adjust to two columns for mobile */
                                    gap:0.5rem;
                                }
                                .keypad-options button{
                                    font-size:12px;
                                }
                            }
                        </style>
                        <div class="keypad-select">
                            <button id="type_select">အမျိုးအစား</button>
                            <select id="selectOption" class="type">
                                <option selected disabled hidden>အမျိုးအစား</option>
                                <option value="num">နံပါတ်ကွဲ</option>
                                <option value="alpha">အက္ခရာကွဲ</option>
                                <option value="int">အင်တာနက်</option>
                            </select>
                            <div class="keypad-options">
                                <button value="num">နံပါတ်ကွဲ</button>
                                <button value="alpha">အက္ခရာကွဲ</button>
                                <button value="int">အင်တာနက်</button>
                            </div>
                        </div>
                        <div class="keypad-select">
                            <button id="alpha_select">အက္ခရာ</button>
                            <select id="selectAlpha" class="alpha">
                                <option selected disabled hidden>အက္ခရာ</option>
                                <?php
                                    date_default_timezone_set('Asia/Yangon');
                                    $month = date('F Y');
                                    $res = mysqli_query($con, "SELECT * FROM `price` WHERE `date`='$month'");
                                    $row = mysqli_fetch_assoc($res);
                                    $title_res = $row['title'];
                                    $alpha_res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `title`='$title_res'"));
                                    $alpha_count=$alpha_res['count_alpha'];
                                    
                                ?>
                                <script>
                                    var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                                    var arrayCountalpha = <?php echo isset($alpha_res['count_alpha']) ? $alpha_res['count_alpha'] : 0; ?>;
                                    // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                                    for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                        document.write('<option value="' + alphaoption[i] + '">' + alphaoption[i] + '</option>');
                                    }
                                </script>

                            </select>
                            <div class="keypad-options-alpha">
                                <script>
                                    var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                                    var arrayCountalpha = <?php echo isset($alpha_res['count_alpha']) ? $alpha_res['count_alpha'] : 0; ?>;
                                    // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                                    for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                        document.write('<button value="' + alphaoption[i] + '">' + alphaoption[i] + '</button>');
                                    }
                                </script>
                                
                            </div>
                        </div>
                        
                        <!-- <select id="message-search" class="type" style="">
                            <option selected disabled hidden>အမျိုးအစား</option>
                            <option value="num">အက္ခရာတူနံပါတ်ကွဲ</option>
                            <option value="alpha">အက္ခရာကွဲနံပါတ်တူ</option>
                            <option value="int">အင်တာနက်</option>
                        </select> -->

                        <!-- <select id="selectAlpha" class="alpha">
                            <option selected disabled hidden>အက္ခရာ</option>
                            <option value="က">က</option>
                        </select> -->
                        <button class="btn" onclick="resetPage()">RESET</button>
                    </div>
                    <!-- <div class="form-group">
                        <input type="number" class="message-search" placeholder="ရှာလိုသောနံပါတ်ရိုက်ထည့်ပါ" oninput="limitInputLength(this, 6)">
                    </div> -->
                </div>
            </div>

            <div id="result_container" style="margin-top:-5rem;margin-bottom:3rem;"></div>
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                function resetPage() {
                    // Reload the page
                    location.reload();
                }
                
                function limitInputLength(input, maxLength) {
                        if (input.value.length > maxLength) {
                            input.value = input.value.slice(0, maxLength);
                        }
                    }
                $(document).ready(function(){
                    const selectElement = document.getElementById('selectOption');
                    const selectAlpha = document.getElementById('selectAlpha');
                    const keypadOptions = document.querySelector('.keypad-options');
                    const keypadOptionsAlpha = document.querySelector('.keypad-options-alpha');
                    const keypadButtons = document.querySelectorAll('.keypad-options button');
                    const keypadButtonsalpha = document.querySelectorAll('.keypad-options-alpha button');
                    const typeSelectButton = document.getElementById('type_select');
                    const alphaSelectButton = document.getElementById('alpha_select');

                    // Toggle keypad options visibility when clicking on the select button
                    typeSelectButton.addEventListener('click', function () {
                        keypadOptions.style.display = keypadOptions.style.display === 'grid' ? 'none' : 'grid';
                    });
                    alphaSelectButton.addEventListener('click', function () {
                        keypadOptionsAlpha.style.display = keypadOptionsAlpha.style.display === 'grid' ? 'none' : 'grid';
                    });

                    // Set selected option when keypad option is clicked
                    keypadButtons.forEach(button => {
                        button.addEventListener('click', function(event) {
                            selectElement.value = this.value;
                            keypadOptions.style.display = 'none';
                            typeSelectButton.textContent = this.textContent; // Update select button text
                            event.stopPropagation(); // Prevents the click event from reaching the select button
                            fetchData();
                        });
                    });
                    keypadButtonsalpha.forEach(button => {
                        button.addEventListener('click', function(event) {
                            selectAlpha.value = this.value;
                            keypadOptionsAlpha.style.display = 'none';
                            alphaSelectButton.textContent = this.textContent; // Update select button text
                            event.stopPropagation(); // Prevents the click event from reaching the select button
                            fetchData();
                        });
                    });

                    // Close keypad options when clicking outside of it
                    document.addEventListener('click', function (event) {
                        if (!keypadOptions.contains(event.target) && event.target !== typeSelectButton) {
                            keypadOptions.style.display = 'none';
                        }
                    });
                    document.addEventListener('click', function (event) {
                        if (!keypadOptionsAlpha.contains(event.target) && event.target !== alphaSelectButton) {
                            keypadOptionsAlpha.style.display = 'none';
                        }
                    });

                    const messageSearch = $('.message-search');

                    function fetchData() {
                        var num = $('.message-search').val();
                        var type = $('#selectOption option:selected').val();
                        var alpha = $('#selectAlpha option:selected').val();
                        // If neither type nor alpha are selected
                        if (type == "အမျိုးအစား" && alpha == "အက္ခရာ" && num == "") {
                            $.ajax({
                                url: 'fetch_for_ticket.php',
                                type: 'GET',
                                data: { amount: '<?php echo $amount ?>', date: '<?php echo $date ?>' },
                                dataType: 'html',
                                success: function (response) {
                                    $('#result_container').html(response);
                                },
                                error: function (xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }
                    else if(type != "အမျိုးအစား" && alpha != "အက္ခရာ"  && num != "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>',type: type,alpha: alpha,num:num},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    else if(type == "အမျိုးအစား" && alpha == "အက္ခရာ"  && num != "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>',num:num},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    else if(type == "အမျိုးအစား" && alpha != "အက္ခရာ"  && num != "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>',alpha:alpha,num:num},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    else if(type != "အမျိုးအစား" && alpha == "အက္ခရာ"  && num != "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>',type:type,num:num},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    else if(type != "အမျိုးအစား" && alpha != "အက္ခရာ"  && num == "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>',type:type,alpha:alpha},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    else if (type !== "" && alpha == "အက္ခရာ"  && num == "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>', type: type},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    // Check if only type is selected
                    else if (type == "အမျိုးအစား" && alpha!=''  && num == "") {
                        $.ajax({
                            url: 'fetch_for_ticket.php',
                            type: 'GET',
                            data: {amount: '<?php echo $amount ?>', date: '<?php echo $date ?>', alpha: alpha},
                            dataType: 'html',
                            success: function(response) {
                                $('#result_container').html(response);
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    }
                    
                }

                // Fetch data when document is ready
                fetchData();
                // Bind change event to elements for fetching data
                
                $('#selectAlpha').on('change', function() {
                    fetchData();
                });
                messageSearch.on('input', fetchData);
                // setInterval(function() {
                //     // Call the fetchAndDisplayProducts function with your desired parameters
                //     fetchData();
                // }, 1000);
            });

            </script>
            <!-- 
            <div class="result_container" style="margin-top:-6rem;" id="data">
                <?php
                    if(isset($_GET['amount'])&& isset($_GET['date'])) {
                        $amount = $_GET['amount'];
                        $date = $_GET['date'];
                        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `amount`='$amount'AND `date`='$date' AND `sell`!='true'");
                        while ($row = mysqli_fetch_assoc($res)) {
                            $list_id=$row['id'];
                            $lot_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' limit 1"));
                            $lot_simple_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'"));
                ?>
                        <div class="list_container" >
                            
                            <div class="first_lottery">
                                <div class="" style="display:flex;flex-direction:column;gap:0.5rem;">
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <?php
                                    // Assuming $row is defined earlier in your code
                                    if ($row['type'] == 'alpha' || $row['type'] == 'num') {
                                        $lot_last_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` DESC LIMIT 1"));

                                        echo '<span class="Aname">';
                                        echo $lot_row['alpha'] . '   ';

                                        if ($row['type'] == 'alpha') {
                                            echo '-';
                                            echo $lot_last_row['alpha'];
                                        }

                                        echo $lot_row['num1'] . ' ' . $lot_row['num2'] . ' ' . $lot_row['num3'] . ' ' . $lot_row['num4'] . ' ' . $lot_row['num5'] . ' ' . $lot_row['num6'];

                                        if ($row['type'] == 'num') {
                                            echo '-';
                                            echo $lot_last_row['num6'];
                                        }

                                        echo '</span>';
                                    }

                                    if ($row['type'] == 'int') {
                                        $lot_int_res = mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' ORDER BY `id` ASC LIMIT 3");
                                        while ($lot_int_row = mysqli_fetch_assoc($lot_int_res)) {
                                            echo '<span class="Aname">';
                                            echo $lot_int_row['alpha'] . ' ' . $lot_int_row['num1'] . ' ' . $lot_int_row['num2'] . ' ' . $lot_int_row['num3'] . ' ' . $lot_int_row['num4'] . ' ' . $lot_int_row['num5'] . ' ' . $lot_int_row['num6'];
                                            echo '</span>';
                                        }
                                    }
                                    ?>

                                    <?php
                                        $lot_simple_res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id'");
                                        while($lot_simple_row=mysqli_fetch_assoc($lot_simple_res)){
                                    ?>
                                    <span style="display:none" id="pname"><?php echo $row['type'] ?></span>
                                    <span class="Aname" style="display:none">
                                        <?php
                                            echo $lot_simple_row['alpha'];
                                            echo $lot_simple_row['num1'];
                                            echo $lot_simple_row['num2'];
                                            echo $lot_simple_row['num3'];
                                            echo $lot_simple_row['num4'];
                                            echo $lot_simple_row['num5'];
                                            echo $lot_simple_row['num6'];
                                        ?>
                                    </span>
                                    <?php } ?>
                                    



                                </div>
                                <a href="lottery.php?list_id=<?php echo $row['id'] ?>">ဝယ်ယူမည်</a>
                            </div>
                        </div>
                <?php
                        }
                    }
                ?>
                

            </div> -->
            <!-- 
            <div id="result_container" style="margin-top:-6rem;"></div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function(){
                    // Function to fetch data via AJAX
                    function fetchData() {
                        var amount = <?php echo json_encode($amount); ?>;
                        var date = <?php echo json_encode($date); ?>;
                        var type = $('#message-search option:selected').val();
                        var alpha = $('#selectAlpha option:selected').val();
                        
                        // Check if no type is selected
                        if (type ="") {
                            // Fetch by date
                            $.ajax({
                                url: 'fetch.php',
                                type: 'GET',
                                data: {amount: amount, date: date,type: type, alpha: alpha},
                                dataType: 'json',
                                success: function(response) {
                                    // Handle successful response
                                    displayData(response);
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(error);
                                }
                            });
                        } else {
                            // Fetch by selected type, alpha, and input number
                            $.ajax({
                                url: 'fetch.php',
                                type: 'GET',
                                data: {amount: amount, date: date},
                                dataType: 'json',
                                success: function(response) {
                                    // Handle successful response
                                    displayData(response);
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                    console.error(error);
                                }
                            });
                        }
                    }

                    // Function to display fetched data
                    function displayData(data) {
                        var resultContainer = $('#result_container');
                        resultContainer.empty(); // Clear previous data

                        // Loop through fetched data and append to result container
                        $.each(data, function(index, item) {
                            var html = '<div class="list_container">';
                            html += '<div class="first_lottery">';
                            html += '<div style="display:flex;flex-direction:column;gap:0.5rem;">';
                            html += '<span>' + item.type + '</span>';
                            html += '<span>' + item.alpha + ' ' + item.num1 + ' ' + item.num2 + ' ' + item.num3 + ' ' + item.num4 + ' ' + item.num5 + ' ' + item.num6 + '</span>';
                            html += '</div>';
                            html += '<a href="lottery.php?list_id=' + item.id + '">ဝယ်ယူမည်</a>';
                            html += '</div>';
                            html += '</div>';

                            resultContainer.append(html);
                        });
                    }

                    // Example usage: Fetch data when document is ready
                    fetchData();

                    // Bind change event to elements for fetching data
                    $('#message-search, .message-search, #selectAlpha').on('change keyup', function() {
                        fetchData();
                    });
                });
            </script> -->
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
