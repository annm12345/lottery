<?php
require('top.php');
$msg='';
if(isset($_POST['set'])){
    $prize=$_POST['prize'];
    $title=$_POST['title'];
    $amount=$_POST['amount'];
    date_default_timezone_set('Asia/Yangon');
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
    
    // Get input values
    $alphas = $_POST['alpha'];
    $nums = $_POST['nums'];
    
    // Separate nums into num1 to num6
    $nums_array = str_split($nums);
    $num1 = isset($nums_array[0]) ? $nums_array[0] : ''; // Adjust index if necessary
    $num2 = isset($nums_array[1]) ? $nums_array[1] : '';
    $num3 = isset($nums_array[2]) ? $nums_array[2] : '';
    $num4 = isset($nums_array[3]) ? $nums_array[3] : '';
    $num5 = isset($nums_array[4]) ? $nums_array[4] : '';
    $num6 = isset($nums_array[5]) ? $nums_array[5] : '';

    // Alternatively, you can use array slicing to remove empty elements
    $nums_array = array_slice($nums_array, 0, 6); // Ensure only first 6 elements are considered
    $num1 = isset($nums_array[0]) ? $nums_array[0] : '';
    $num2 = isset($nums_array[1]) ? $nums_array[1] : '';
    $num3 = isset($nums_array[2]) ? $nums_array[2] : '';
    $num4 = isset($nums_array[3]) ? $nums_array[3] : '';
    $num5 = isset($nums_array[4]) ? $nums_array[4] : '';
    $num6 = isset($nums_array[5]) ? $nums_array[5] : '';

    
    // Insert data into the database
    mysqli_query($con,"INSERT INTO `htipauksin`(`prize`, `alpha`, `num1`, `num2`, `num3`, `num4`, `num5`, `num6`,`title`,`amount`, `date`) VALUES ('$prize','$alphas','$num1','$num2','$num3','$num4','$num5','$num6','$title','$amount','$previousMonthYear')");
    $msg="Successfully inserted";
}
?>


  <style>
    
    .result_container{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom:2rem;
    }
    .main-heading {
      font-size: 16px; /* Adjust the font size */
      color: #333; /* Adjust the text color */
      margin-bottom: 20px; /* Add some space below the heading */
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

    .search-container-small:not(:last-child) {
      margin-right: 20px; /* Add gap between search bars */
    }

    .search-field {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
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
    .result_container {
        overflow-x: auto;
        border:1px solid #19E9F0;
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
    }

    .result_container table {
        width: 100%; /* Table fills the container */
        border-collapse: collapse; /* Remove border spacing */
    }

    .result_container table td {
        padding: 4px;
        text-align: center;
        margin:auto;
    }
    .result_container table th {
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


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
    }
    .cash-container {
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
    .check_container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding:2rem 15rem; /* Adjust margin as needed */
    }

    .check_container input[type="text"] {
        width: 40px; /* Adjust width as needed */
        height: 40px; /* Adjust height as needed */
        text-align: center;
        font-size: 16px; /* Adjust font size as needed */
        background:#19E9F0;
        border:none;
        outline:none;
        color:#000; /* Border color */
        border-radius: 50%; /* Adjust border radius as needed */
        outline: none;
        transition: border-color 0.3s ease; /* Smooth transition for border color */
    }

    .check_container input[type="text"]:focus {
        border-color: blue; /* Border color when input is focused */
    }



    /* Responsive styles for smaller screens */
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
        grid-template-columns:40% 60%;
        gap:0.2rem;/* Display search bars vertically on mobile */
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
        .check_container {
            
            padding:2rem 1rem; /* Adjust margin as needed */
        }
        .check_container input[type="text"] {
            width: 30px; /* Adjust width for smaller screens */
            height: 30px; /* Adjust height for smaller screens */
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
    <div class="header-main">
      <form action="" method="post">
        <div class="container" style="display:flex;">
          <span>ထီပေါက်စဉ်ထည့်သွင်းမည်</span>
        </div>
          <?php
            if($msg!==''){
                ?>
                <div class="notification-container">
                    <div class="notification">
                        <i class="fas fa-check-circle"></i>
                        <p><?php echo $msg ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        
        <div class="container">
          <select type="text" class="search-field" name="title" required>
            <option class="search-field" value="" selected disabled hidden>--ကြိမ်မြောက်</option>
            <?php 
             $t_res = mysqli_query($con, "SELECT * FROM `price`");
             while ($t_row = mysqli_fetch_assoc($t_res)) {
            ?>
            <option class="search-field" value="<?php echo $t_row['id'] ?>"><?php echo $t_row['title'] ?>ကြိမ်မြောက်</option>
            <?php } ?>
          </select>
          <input type="text" class="search-field" name="prize" placeholder="ဆုကြေး(စာဖြင့်)" required>
          <input type="number" class="search-field" name="amount" placeholder="ဆုကြေး(ဂဏန်းဖြင့်)" required>
          

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
        
        
          <div class="container" style="margin-top: 1rem;;margin-bottom: 2rem;">
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
                                grid-template-columns: repeat(5, 1fr); /* Adjust to two columns for mobile */
                                position: absolute;
                                top: calc(100% + 10px); /* Add some space between select and options */
                                left: 0;
                                min-width: 400px;
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
                                    grid-template-columns: repeat(5, 1fr); /* Adjust to two columns for mobile */
                                    gap:0.5rem;
                                }
                                .keypad-options button{
                                    font-size:12px;
                                }
                            }
                        </style>
                <div class="header-search-container search-container-small" id="alpha-res-container">
                  <div class="keypad-select">
                            <button id="alpha_select" type="button">အက္ခရာ</button>
                            <select id="selectAlpha" class="alpha" name="alpha">
                                <option selected disabled hidden>အက္ခရာ</option>
                                <?php
                                    date_default_timezone_set('Asia/Yangon');
                                    $month = date('F Y');
                                    $res = mysqli_query($con, "SELECT * FROM `price` WHERE `date`='$month'");
                                    $row = mysqli_fetch_assoc($res);
                                    $title_res = $row['title'];
                                    $alpha_res = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `title`='$title_res'"));
                                    $alpha_count=33;
                                    
                                ?>
                                <script>
                                    var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                                    var arrayCountalpha = 33;
                                    // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                                    for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                        document.write('<option value="' + alphaoption[i] + '">' + alphaoption[i] + '</option>');
                                    }
                                </script>

                            </select>
                            <div class="keypad-options-alpha">
                                <script>
                                    var alphaoption = ['က', 'ခ', 'ဂ', 'ဃ', 'င', 'စ', 'ဆ', 'ဇ', 'ဈ', 'ည', 'ဍ', 'ဌ', 'ဋ', 'ဎ', 'ဏ', 'တ', 'ထ', 'ဒ', 'ဓ', 'န', 'ပ', 'ဖ', 'ဗ', 'ဘ', 'မ', 'ယ', 'ရ', 'လ', 'ဝ', 'သ', 'ဟ', 'ဠ', 'အ', 'ကက', 'ကခ', 'ကဂ', 'ကဃ', 'ကင', 'ကစ', 'ကဆ', 'ကဇ', 'ကဈ', 'ကည', 'ကဍ', 'ကဌ']; // Array of alphabets
                                    var arrayCountalpha = 33;
                                    // Loop through the array to create options dynamically, limiting to arrayCountalpha characters
                                    for (var i = 0; i < alphaoption.length && i < arrayCountalpha; i++) {
                                        document.write('<button value="' + alphaoption[i] + '" type="button">' + alphaoption[i] + '</button>');
                                    }
                                </script>
                                
                            </div>
                        </div>
                </div>
                <div class="header-search-container search-container-large">
                    <input type="number" name="nums" class="search-field" placeholder="နံပါတ်" id="num-input" oninput="limitInputLength(this, 6)">
                </div>
            </div>
        <div class="container">
          <input type="submit" class="btn-primary" name="set" value="ထည့်သွင်းမည်">
        </div>
      </form>
      <script>
          // Define the searchByAlpha function
          function searchByAlpha(value) {
              // Your implementation here
              console.log("Searching by alpha:", value);
              // Example: You can perform an AJAX request or any other action based on the selected value
          }

         
                    const selectAlpha = document.getElementById('selectAlpha');
                    const keypadOptionsAlpha = document.querySelector('.keypad-options-alpha');
                    const keypadButtonsalpha = document.querySelectorAll('.keypad-options-alpha button');
                    const alphaSelectButton = document.getElementById('alpha_select');

                    
                    alphaSelectButton.addEventListener('click', function () {
                        keypadOptionsAlpha.style.display = keypadOptionsAlpha.style.display === 'grid' ? 'none' : 'grid';
                    });

                    keypadButtonsalpha.forEach(button => {
                        button.addEventListener('click', function(event) {
                            selectAlpha.value = this.value;
                            keypadOptionsAlpha.style.display = 'none';
                            alphaSelectButton.textContent = this.textContent; // Update select button text
                            event.stopPropagation(); // Prevents the click event from reaching the select button
                            
                        });
                    });

                    document.addEventListener('click', function (event) {
                        if (!keypadOptionsAlpha.contains(event.target) && event.target !== alphaSelectButton) {
                            keypadOptionsAlpha.style.display = 'none';
                        }
                    });
      </script>



      <!-- <div class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
          <span>ထိပေါက်စဉ်တိုက်ခြင်း</span>
        </div>
        <table>
          <tr>
            <th>အက္ခရာ</th>
            <th colspan="6">နံပါတ်</th>
            <th></th>
          </tr>
          <tr>
            <td><span>က</span></td>            
            <td><span>၁</span></td>            
            <td><span>၂</span></td>            
            <td><span>၃</span></td>            
            <td><span>၄</span></td>            
            <td><span>၅</span></td>            
            <td><span>6</span></td> 
          </tr>
          
        </table>
      </div>

      <div class="cash-container">
          <div class="amount"> 
              <span>Total Amount</span>
              <span style="color:green">2000 KS</span>
          </div>
          <div class="total"> 
              <span>Total tickets</span>
              <span>8</span>
          </div>
          
          <a href="#" class="btn-primary"> Buy Ticket</a>
      </div> -->
    </div>

    <!-- <div class="header-main">
        <div class="container">
          <span>ထီပေါက်စဉ်ထည့်သွင်းမည်</span>
        </div>
        <div class="container">
          <a href="prize.php" class="btn-primary">ထီတိုက်မည်</a>
        </div>
    </div> -->
  </div>



</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
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
</script>

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
