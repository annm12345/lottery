<?php
require('top.php');
if(isset($_SESSION['LOT_USER_LOGIN'])) {
    $user_id = $_SESSION['LOT_USER_ID'];
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
    


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
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
            <div class="result_container">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
                    <p>Your tickets</p>
                </div>
                <table>
                    <tr>
                        <th>Type</th>
                        <th>Total Tickets</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        $res=mysqli_query($con,"SELECT * FROM `buy_list` WHERE `uid`='$user_id' ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['uid'];
                            $list_id=$row['list_id'];
                            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));
                            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` WHERE `id`='$list_id'"));

                    ?>
                    <tr>
                        <td style="display:flex;align-items:center;justify-content:center;padding:2rem;">
                            <a href="ticket_view.php?list_id=<?php echo $list_id ?>" style="position: relative;">
                                <ion-icon name="ticket" style="font-size: 24px;color: gold;"></ion-icon>
                                <p class="count" style="position: absolute; top: 0; left: 110%; transform: translateX(-50%); margin-top: -12px; font-weight: bold;"><?php echo $list_row['amount'] ?></p>
                        </a>
                        </td>

                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['amount'] ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $list_row['price'] ?></span>
                        </td>
                        <td style="text-align: center;">
                            <span style="font-weight: 600;"><?php echo $row['day'] ?></span>
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

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
