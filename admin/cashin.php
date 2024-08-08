<?php
require('top.php');

if(isset($_GET['id']) && isset($_GET['cashin'])){
    $id = $_GET['id'];
    $cashin=$_GET['cashin'];
    if($cashin=="true"){
        $res=mysqli_query($con,"SELECT * FROM `cashin` WHERE `id`='$id'");
        while($row=mysqli_fetch_assoc($res)){
            $uid = $row['uid'];
            $amount = $row['amount'];

            // Update the 'cashin' table
            mysqli_query($con, "UPDATE `cashin` SET `comfirm`='true' WHERE `id`='$id'");
            // Check if the user exists in the 'point' table
            $check = mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$uid'");
            if (mysqli_num_rows($check) > 0) {
                // User exists, fetch the original amount
                $row = mysqli_fetch_assoc($check);
                $originalAmount = $row['amount'];

                // Calculate the new amount by adding $amount to the original amount
                $newAmount = $originalAmount + $amount;

                // Update the 'point' table with the new amount
                mysqli_query($con, "UPDATE `point` SET `amount`='$newAmount' WHERE `uid`='$uid'");
            } else {
                // User does not exist, insert a new record with the amount
                mysqli_query($con, "INSERT INTO `point`(`uid`, `amount`) VALUES ('$uid','$amount')");
            }

        ?>
        <script>
            window.location.href="cashin.php";
        </script>
        <?php
        }
    }
}
if(isset($_GET['id']) && isset($_GET['cashout'])){
    $id = $_GET['id'];
    $cashout=$_GET['cashout'];
    if($cashout=="true"){
        $res=mysqli_query($con,"SELECT * FROM `cashout` WHERE `id`='$id'");
        while($row=mysqli_fetch_assoc($res)){
            $uid = $row['uid'];
            $amount = $row['amount'];

            // Update the 'cashin' table
            mysqli_query($con, "UPDATE `cashout` SET `comfirm`='true' WHERE `id`='$id'");
            // Check if the user exists in the 'point' table
            $check = mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$uid'");
            if (mysqli_num_rows($check) > 0) {
                // User exists, fetch the original amount
                $row = mysqli_fetch_assoc($check);
                $originalAmount = $row['amount'];

                // Calculate the new amount by adding $amount to the original amount
                $newAmount = $originalAmount - $amount;

                // Update the 'point' table with the new amount
                mysqli_query($con, "UPDATE `point` SET `amount`='$newAmount' WHERE `uid`='$uid'");
            } 
        ?>
        <script>
            window.location.href="cashout.php";
        </script>
        <?php
        }
    }
}

?>


  <style>
    
    .result_container {
        overflow-x: auto;
        border:1px solid #19E9F0;
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
    

    .btn_container {
        padding: 1rem 15rem; /* Adjust the padding as needed */
        display: flex;
        justify-content: space-between;
    }

    /* CSS for the buttons */
    .btn-primary {
        padding: 10px 20px; /* Adjust padding for buttons */
        border-bottom:3px solid #1992F7; /* Button background color */
        color: #000; /* Button text color *//* Remove button border */
        border-radius: 1px; /* Add border radius for rounded corners */
        cursor: pointer; /* Show pointer cursor on hover */
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
       
          margin: 0rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
        .btn_container{
        padding:1rem 1rem;
        }
    }



  </style>
  <div class="banner">
        <div class="header-main">
            <div class="result_container" id="cashin">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>ငွေသွင်းစာရင်း</p>
                </div>
                <table>
                    <tr>
                        <th>အမည်</th>
                        <th>ငွေပမာဏ</th>
                        <th>Payment</th>
                        <th>No(6)</th>
                        <th>ရက်စွဲ</th>
                        <th>အချိန်</th>
                        <th></th>
                    </tr>
                    <?php
                    $res = mysqli_query($con, "SELECT * FROM `cashin` ORDER BY `id` DESC");
                    while ($row = mysqli_fetch_assoc($res)) {
                        $uid = $row['uid'];
                        $u_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$uid'"));
                    ?>
                        <tr style="border-bottom: 1px dashed #19E9F0">
                            <td style="border-right: 1px dashed #19E9F0"><?php echo $u_row['name'] ?></td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <span style="font-weight: 600;"><?php echo $row['amount'] ?> KS</span>
                            </td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <span style="font-weight: 600;"><?php echo $row['payment'] ?></span>
                            </td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <span style="font-weight: 600;background:lightgray;"><?php echo $row['tax_id'] ?></span>
                            </td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <span style="font-weight: 600;"><?php echo $row['date'] ?></span>
                            </td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <span style="font-weight: 600;"><?php echo $row['time'] ?></span>
                            </td>
                            <td style="text-align: center;border-right: 1px dashed #19E9F0">
                                <?php
                                if ($row['comfirm'] == 'true') {
                                    echo "<span style='font-weight: 600;'>Confirmed</span>";
                                } else {
                                ?>
                                    <button type="button" class="buy-btn" data-id="<?php echo $row['id']; ?>" style="font-weight: 600;padding:5px 10px;background:#1992F7;border-radius:3px;color:#ff1">Confirm</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                <style>
                    .confirm-box {
                        display: none;
                        position: fixed;
                        width:380px;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        background-color: #f8f9fa; /* Light gray background */
                        border: 2px solid #007bff; /* Blue border */
                        border-radius: 8px; /* Rounded corners */
                        padding: 20px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Shadow effect */
                        z-index: 9999;
                    }

                    .confirm-box p {
                        font-size: 18px;
                        margin-bottom: 20px;
                    }

                    .confirm-box button, .btn-second {
                        background-color: #007bff; /* Blue button */
                        color: #ffffff; /* White text */
                        border: none;
                        padding: 10px 20px;
                        border-radius: 5px;
                        cursor: pointer;
                        margin-right: 10px;
                    }

                    .confirm-box button:hover {
                        background-color: #0056b3; /* Darker blue on hover */
                    }
                    .btn-list{
                    display:grid;
                    grid-template-columns:1fr 1fr;
                    gap:0.5rem;
                    }

                    @media only screen and (max-width: 768px) {
                        
                    }
                </style>

                <div id="confirm-box" class="confirm-box" style="display: none;">
                    <p>ငွေသွင်းမည်မှာသေချာပါသလား?</p>
                    <div class="btn-list">
                        <button id="confirm-yes" class="btn-second">သေချာပါသည်</button>
                        <button id="confirm-no" class="btn-second">မသေချာပါ</button>
                    </div>
                </div>
                <script>
                    document.getElementById('cashin').addEventListener('click', function(event) {
                        if (event.target.classList.contains('buy-btn')) {
                            document.getElementById('confirm-box').style.display = 'block';
                            var confirmButton = document.getElementById('confirm-yes');
                            confirmButton.setAttribute('data-id', event.target.getAttribute('data-id'));
                        }
                    });

                    document.getElementById('confirm-yes').addEventListener('click', function() {
                        document.getElementById('confirm-box').style.display = 'none';
                        var id = document.getElementById('confirm-yes').getAttribute('data-id');
                        window.location.href = 'cashin.php?id=' + id + '&cashin=true';
                    });

                    document.getElementById('confirm-no').addEventListener('click', function() {
                        document.getElementById('confirm-box').style.display = 'none';
                    });
                </script>
            </div>
                

            </div>
            
        </div>
    </div>


</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
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
