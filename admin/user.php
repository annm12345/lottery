<?php
require('top.php');
if(isset($_GET['id']) && isset($_GET['action'])){
    $id = $_GET['id'];
    $action=$_GET['action'];
    if($action=="confirm"){
        $res=mysqli_query($con,"SELECT * FROM `buy_list` WHERE `id`='$id'");
        while($row=mysqli_fetch_assoc($res)){
            $list_id=$row['list_id'];
            mysqli_query($con,"UPDATE `buy_list` SET `confirm`='true' WHERE `id`='$id'");
            mysqli_query($con,"UPDATE `list` SET `sell`='true' WHERE `id`='$list_id'");
        ?>
        <script>
            window.location.href="sale_list.php";
        </script>
        <?php
        }
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
                    <p>Customers</p>
                </div>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Point</th>
                    </tr>
                    <?php
                        $res=mysqli_query($con,"SELECT * FROM `user` ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            $uid=$row['id'];
                            $p_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `point` WHERE `uid`='$uid' "));
                    ?>
                    <tr>
                        <td style="border-right:1px dashed gold"><?php echo $row['name'] ?></td>

                        <td style="text-align: center;border-right:1px dashed gold">
                            <span style="font-weight: 600;"><?php echo $row['phone'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed gold">
                            <span style="font-weight: 600;"><?php if($p_row){
                                 echo $p_row['amount'];
                            }else{
                                echo '0';
                            }
                                ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed gold">
                            <a href="view_user.php?id=<?php echo $row['id'] ?>" style="font-weight: 600;padding:5px 10px;background:gold;border-radius:3px;">View</a>
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
