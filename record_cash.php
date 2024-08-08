<?php
require('top.inc.php');
if(isset($_SESSION['LOT_USER_LOGIN'])) {
    $user_id = $_SESSION['LOT_USER_ID'];
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
            <div class="btn_container">
                <button class="btn-primary" id="cashin-btn">ငွေသွင်းစာရင်း</button>
                <button class="btn-primary" id="cashout-btn">ငွေထုတ်စာရင်း</button>
            </div>
            <div class="result_container" style="margin-bottom:5rem;" id="cashin">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>ငွေသွင်းစာရင်း</p>
                </div>
                <table>
                    <tr>
                        <th>ငွေပမာဏ</th>
                        <th>Payment</th>
                        <th>NO(6)</th>
                        <th>ရက်စွဲ</th>
                        <th>အချိန်</th>
                    </tr>
                    <?php
                        $res=mysqli_query($con,"SELECT * FROM `cashin` where `uid`='$user_id' ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $comfirm=$row['comfirm'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));

                    ?>
                    <tr style="border-bottom:1px dashed #19E9F0">
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['amount'] ?> KS</span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['payment'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['tax_id'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['date'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['time'] ?></span>
                            
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                        <?php
                        if($comfirm=='true'){
                            ?>
                                   <span style="font-weight: 600;color:blue;font-size:1.4rem;"><i class="fa-regular fa-thumbs-up"></i></span> 
                                    <?php
                                }else{
                                    ?>
                                    <span style="font-weight: 600;color:red;font-size:0.8rem;">Checking</span>
                                    <?php
                                }
                        ?>
                            
                            
                            
                            
                        </td>
                        

                    </tr>
                    <?php } ?>

                </table>
            </div>
            <div class="result_container"  id="cashout" style="display:none;margin-bottom:5rem;">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>ငွေထုတ်စာရင်း</p>
                </div>
                <table>
                    <tr>
                        <th>ဖုန်းနံပါတ်</th>
                        <th>ငွေပမာဏ</th>
                        <th>Payment</th>
                        <th>ရက်စွဲ</th>
                        <th>အချိန်</th>
                    </tr>
                    <?php
                        $res=mysqli_query($con,"SELECT * FROM `cashout` where `uid`='$user_id'  ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $comfirm_cashout=$row['comfirm'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));

                    ?>
                    <tr style="border-bottom:1px dashed #19E9F0">
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['phone'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['amount'] ?> KS</span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php if($row['payment']=='kpay'){echo 'KPay';}else{echo 'Wave money';} ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['date'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed #19E9F0">
                            <span style="font-weight: 600;"><?php echo $row['time'] ?></span>
                        </td>
                        <td>
                            <?php
                                if($comfirm_cashout=='true'){
                                    ?>
                                    <span style="font-weight: 600;color:blue;font-size:1.4rem;"><i class="fa-regular fa-thumbs-up"></i></span>
                                    <?php
                                }else{
                                    ?>
                                    <span style="font-weight: 600;color:red;font-size:0.8rem;">Checking</span>
                                    
                                    <?php
                                }
                            ?>  
                        </td>
                        
                        

                    </tr>
                    <?php } ?>

                </table>
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
