<?php
require('top.php');
if(isset($_GET['uid']) && isset($_GET['hti_id']) && isset($_GET['amount']) && isset($_GET['count'])){
    $uid=$_GET['uid'];
    $hti_id=$_GET['hti_id'];
    $amount=$_GET['amount'];
    $count=$_GET['count'];
    $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` where `id`='$uid'"));
    $hti_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `htipauksin` where `id`='$hti_id'"));
    $title=$hti_row['title'];
    date_default_timezone_set('Asia/Yangon');
    $added_on=date('Y-m-d');

    if(isset($_POST['send'])){
        $desc=$_POST['desc'];
        mysqli_query($con,"INSERT INTO `result`(`u_id`, `hti_id`, `desc`, `date`) VALUES ('$uid','$hti_id','$desc','$added_on')");

        
            $uid = $u_row['id'];

   
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
            window.alert("အကြောင်းကြားစာပေးပို့ပြီးပါပြီ။")
            window.location.href="check_prize_prize.php?id=<?php echo $hti_id ?>&title=<?php echo $title ?>";
        </script>
        <?php
    }
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
    .result_container table a:hover{
        cursor:pointer;
        box-shadow:2px 5px 5px 5px #DBDEF1;
    }


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
    }
    

    td {
        text-align: justify;
    }

    td textarea{
        border: none;
        outline: none;
        height: 150px;
        word-wrap: break-word;
        width: 100%; /* Ensure the input takes the full width of the cell */
        box-sizing: border-box; /* Include padding and border in the width calculation */
        resize: none; /* Prevent resizing */
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
    }



  </style>
  <div class="banner">
        <div class="header-main">
            <form action="" method="post" class="result_container">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
                    <p>အကြောင်းကြားစာ</p>
                </div>
                <table>
                    <tr>
                        
                        <td style="text-align: justify;">
                        <textarea style="border:none;outline:none;font-size:1rem;font-weight:500;" name="desc" id="">ဂုဏ်ယူပါသည် <?php echo $u_row['name'] ?>။ သင်သည် <?php echo $hti_row['title'] ?> သိန်းဆုထီကံထူးရှင်ရွေးချယ်ပွဲတွင် (<?php echo $hti_row['alpha'] ?>- <?php echo $hti_row['num1'] ?><?php echo $hti_row['num2'] ?><?php  if($hti_row['num3']==''){ echo ''; }else{ echo $hti_row['num3'];}  ?><?php if($hti_row['num4']==''){ echo ''; }else{ echo $hti_row['num4'];}  ?><?php if($hti_row['num5']==''){ echo ''; }else{ echo $hti_row['num5'];}   ?><?php if($hti_row['num6']==''){ echo ''; }else{ echo $hti_row['num6'];}   ?>) ဖြင့် ကျပ်<?php echo $hti_row['prize'] ?> ဆုအား <?php echo $count ?>ခု ရရှိခဲ့ပါသည် ။</textarea>
                            <input type="submit" style="font-weight: 600;padding:1rem;border-radius:5px;background:blue;max-width:150px;outline:none;border:none;color:#fff;" value="ပေးပို့မည်" name="send">
                        </td>
                    </tr>

                </table>
            </form>
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
