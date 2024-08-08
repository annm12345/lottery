<?php
require('top.inc.php');
$msg = 'Step-2: ငွေပမာဏကိုရွေးချယ်ပါ';
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
if (isset($_SESSION['LOT_USER_LOGIN'])) {
    $user_id = $_SESSION['LOT_USER_ID'];
    $res = mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$user_id'");
    $row = mysqli_fetch_assoc($res);

    if (isset($_POST['go'])) {
        // Check if either checkbox or input field is selected
        if (isset($_POST['payment']) && !empty($_POST['payment'])) {
            $payment = $_POST['payment'];
        } elseif (isset($_POST['amount']) && !empty($_POST['amount'])) {
            $payment = $_POST['amount'];
        } else {
            // Handle case where neither checkbox nor input field is selected
            $msg = 'Please select or enter a payment amount.';
        }

        if (isset($payment)) {
            date_default_timezone_set('Asia/Yangon');
            $date = date('Y-m-d');
            $time = date('h:i:s');
?>
            <script>
                window.location.href = "step3.php?type=<?php echo $type ?>&amount=<?php echo $payment ?>";
            </script>
<?php
            exit; // Ensure script execution stops after redirection
        }
    }
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


    /* Responsive styles for smaller screens */

    .contact-box {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9; /* Light gray background */
        border-radius: 10px;
    }

    .contact-box p {
        margin-bottom: 10px;
        margin-left:2rem;
    }
    :root {
        --blue: #0071FF;
        --light-blue: #B6DBF6;
        --dark-blue: #005DD1;
        --grey: #f2f2f2;
    }
    .img-container {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 30px;
        border-radius: 30px;
    }
    .img-area {
        position: relative;
        width: 100%;
        height: 240px;
        background: var(--grey);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .img-area .icon {
        font-size: 100px;
    }
    .img-area h3 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 6px;
        color:#000;
    }
    .img-area p {
        color: #000;
        text-align:center;
    }
    .img-area p span {
        font-weight: 600;
    }
    .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }
    .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }
    .img-area.active:hover::before {
        opacity: 1;
    }
    select#payment {
        width: 150px; /* Adjust the width as needed */
        padding: 8px; /* Add padding to improve appearance */
        font-size: 16px; /* Adjust font size */
        border: 1px solid #ccc; /* Add a border */
        border-radius: 5px; /* Add border radius for rounded corners */
        outline: none; /* Remove the default outline */
        appearance: none; /* Remove default dropdown arrow */
        background-color: #fff; /* Set background color */
        cursor: pointer; /* Show pointer cursor */
    }

    /* Styling for the options within the select element */
    select#payment option {
        padding: 8px; /* Add padding to improve appearance */
        font-size: 16px; /* Adjust font size */
        background-color: #fff; /* Set background color */
    }
    .select-image {
        display: block;
        width: 100%;
        padding: 16px 0;
        border-radius: 15px;
        background: var(--blue);
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all .3s ease;
    }
    .select-image:hover {
        background: var(--dark-blue);
    }

    .btn_container{
        padding:1rem 15rem;
        display:flex;
        gap:2rem;
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
        .header-table {
            margin: 1rem;
        }

        .contact-box {
            padding: 5px;
        }
        .btn_container{
        padding:1rem 1rem;
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
        <form action="" method="post" class="cash-container" enctype="multipart/form-data" id="cashin">
            
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
                        <style>
                            .payment-option {
                                display: grid;
                                grid-template-columns: repeat(3, 1fr); /* Four columns with equal width */
                                gap: 40px; /* Gap between grid items */
                            }
                            .payment-option .payment-checkbox {
                                display: none;
                            }
                            .payment-option label {
                                margin-right: 20px;
                                cursor: pointer;
                                color: #fff;
                                padding:10px 15px;
                                border-radius:5px;
                                background:gray; /* Default color */
                            }
                            .payment-option .payment-checkbox:checked + label {
                                background:darkblue; /* Change color when checked */
                            }
                            .Payment-input {
                                display: none;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 20px;
                            }

                            .Payment-input .payment-input {
                                flex-grow: 1;
                                padding: 10px;
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                margin-right: 10px;
                                font-size: 16px;
                            }

                            .Payment-input label {
                                font-size: 16px;
                                margin-right: 10px;
                            }
                        </style>

                        <div class="Payment-input">
                            <div class="">
                                <input type="number" name="amount" placeholder="ငွေပမာဏရိုက်ထည့်ပါ"  class="payment-input">
                            </div>
                            <div>
                                <button class="btn-primary" id="cancel">Cancel</button>
                            </div>
                        </div>


                        <div class="payment-option">
                            <div class="">
                                <input type="checkbox" name="payment" value="1000" id="1000" class="payment-checkbox">
                                <label for="1000">၁၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="2000" id="2000" class="payment-checkbox">
                                <label for="2000">၂၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="3000" id="3000" class="payment-checkbox">
                                <label for="3000">၃၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="4000" id="4000" class="payment-checkbox">
                                <label for="4000">၄၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="5000" id="5000" class="payment-checkbox">
                                <label for="5000">၅၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="6000" id="6000" class="payment-checkbox">
                                <label for="6000">၆၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="7000" id="7000" class="payment-checkbox">
                                <label for="7000">၇၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="8000" id="8000" class="payment-checkbox">
                                <label for="8000">၈၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="9000" id="9000" class="payment-checkbox">
                                <label for="9000">၉၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="10000" id="10000" class="payment-checkbox">
                                <label for="10000">၁၀၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="15000" id="15000" class="payment-checkbox">
                                <label for="15000">၁၅၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="20000" id="20000" class="payment-checkbox">
                                <label for="20000">၂၀၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="30000" id="30000" class="payment-checkbox">
                                <label for="30000">၃၀၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="40000" id="40000" class="payment-checkbox">
                                <label for="40000">၄၀၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox" name="payment" value="50000" id="50000" class="payment-checkbox">
                                <label for="50000">၅၀၀၀၀</label>
                            </div>
                            <div class="">
                                <input type="checkbox"  id="another" class="payment-checkbox">
                                <label for="another">အခြား</label>
                            </div>
                        </div>
                        <script>
                             window.onload = function() {
                            var anotherCheckbox = document.getElementById('another');
                            var paymentInput = document.querySelector('.Payment-input');
                            var paymentOption = document.querySelector('.payment-option');
                            var cancelButton = document.getElementById('cancel');

                            anotherCheckbox.addEventListener('change', function() {
                                if (this.checked) {
                                    paymentInput.style.display = 'flex';
                                    paymentOption.style.display = 'none';
                                } else {
                                    paymentInput.style.display = 'none';
                                    paymentOption.style.display = '';
                                }
                            });

                            cancelButton.addEventListener('click', function() {
                                paymentOption.style.display = '';
                                paymentInput.style.display = 'none';
                            });

                            const checkboxes = document.querySelectorAll('.payment-checkbox');

                            checkboxes.forEach(checkbox => {
                                checkbox.addEventListener('change', function() {
                                    checkboxes.forEach(otherCheckbox => {
                                        if (otherCheckbox !== checkbox) {
                                            otherCheckbox.checked = false;
                                        }
                                    });

                                    if (this === anotherCheckbox && this.checked) {
                                        paymentInput.style.display = 'flex';
                                        paymentOption.style.display = 'none';
                                    } else {
                                        paymentInput.style.display = 'none';
                                        paymentOption.style.display = '';
                                    }
                                });
                            });
                        };
                            
                        </script>

            
            <input type="submit" class="btn-primary" value="ဆက်သွားမည်" name="go" style="margin-top:2rem;">
        </form>
    </div>
</div>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function () {
        inputFile.click();
    })

    inputFile.addEventListener('change', function () {
        const image = this.files[0]
        if(image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = ()=> {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item=> item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the buttons and forms
        var cashinBtn = document.getElementById("cashin-btn");
        var cashoutBtn = document.getElementById("cashout-btn");
        var cashinForm = document.getElementById("cashin");
        var cashoutForm = document.getElementById("cashout");

        // Add click event listeners to the buttons
        cashinBtn.addEventListener("click", function() {
            // Show cashin form and hide cashout form
            cashinForm.style.display = "";
            cashoutForm.style.display = "none";
        });

        cashoutBtn.addEventListener("click", function() {
            // Show cashout form and hide cashin form
            cashoutForm.style.display = "";
            cashinForm.style.display = "none";
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
