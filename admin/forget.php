<?php
require('top.php');
if(isset($_GET['id']) && isset($_GET['action']) && isset($_GET['password'])){
    $id = $_GET['id'];
    $action=$_GET['action'];
    $password=$_GET['password'];
    if($action=="confirm"){
        $res=mysqli_query($con,"SELECT * FROM `forget` WHERE `id`='$id'");
        while($row=mysqli_fetch_assoc($res)){
            $phone=$row['phone'];
            mysqli_query($con,"UPDATE `forget` SET `comfirm`='true' WHERE `id`='$id'");
            mysqli_query($con,"UPDATE `user` SET `password`='$password' WHERE `phone`='$phone'");
        ?>
        <script>
            window.location.href="forget.php";
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
        overflow-x: scroll; 
        overflow-y: scroll;/* Enable horizontal scrolling */
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
            min-width:768px;
            overflow-x: scroll; 
            overflow-y: scroll;/* Enable horizontal scrolling */
        }
    }



  </style>
  <div class="banner">
        <div class="header-main">
            <div class="result_container">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
                    <p>Password request</p>
                </div>
                <table>
                    <tr>
                        <th>အမည်</th>
                        <th>ဖုန်းနံပါတ်</th>
                        <th>မှတ်ပုံတင်</th>
                        <th>စကားဝှက်အသစ်</th>
                    </tr>
                    <?php
                        $res=mysqli_query($con,"SELECT * FROM `forget` WHERE `comfirm`='' ORDER BY `id` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                            
                    ?>
                    <tr>
                        <td style="border-right:1px dashed gold"><?php echo $row['name'] ?></td>

                        <td style="text-align: center;border-right:1px dashed gold">
                            <span style="font-weight: 600;"><?php echo $row['phone'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed gold">
                            <span style="font-weight: 600;"><?php echo $row['nic'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed gold">
                            <span style="font-weight: 600;"><?php echo $row['password'] ?></span>
                        </td>
                        <td style="text-align: center;border-right:1px dashed gold">
                            <a href="forget.php?id=<?php echo $row['id'] ?>&action=confirm&password=<?php echo $row['password'] ?>" style="font-weight: 600;padding:5px 10px;background:gold;border-radius:3px;">အတည်ပြုသည်</a>
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
