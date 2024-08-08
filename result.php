<?php
require('top.inc.php');
if(isset($_SESSION['LOT_USER_LOGIN']))
{
  $user_id=$_SESSION['LOT_USER_ID'];
  
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
            <div class="result_container" style="margin-bottom:5rem;">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>Your result</p>
                </div>
                <?php 
                $res=mysqli_query($con,"SELECT * FROM `result` where `u_id`='$user_id' ORDER BY `id` DESC");
                while($row=mysqli_fetch_assoc($res)){
                ?>
                <table>
                    <tr>
                        <th style="text-decoration:underline 2px solid darkblue;">အကြောင်းကြားစာ  (at <?php echo $row['date'] ?>)</th>
                        
                    </tr>
                    <tr>
                        
                        <td style="text-align: justify;">
                            <span style="font-weight: 600;"><?php echo $row['desc'] ?></span>
                            <!-- <a href="#" style="font-weight: 600;padding:1rem;border-radius:5px;background:gold;max-width:150px;">ဆုငွေထုတ်မည်</a> -->
                        </td>
                    </tr>

                </table>
                <?php } ?>
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
