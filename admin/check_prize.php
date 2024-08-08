<?php
require('top.php');

if(isset($_GET['id']) && isset($_GET['title'])){
  $id=$_GET['id'];
  $title=$_GET['title'];
  
  
  $w_res=mysqli_query($con,"SELECT * FROM `htipauksin` WHERE `title`='$title' and `id`='$id'");
  while($w_row=mysqli_fetch_assoc($w_res)){
    $prize=$w_row['prize'];
    $alpha=$w_row['alpha'];
    $num1=$w_row['num1'];
    $num2=$w_row['num2'];
    $num3=$w_row['num3'];
    $num4=$w_row['num4'];
    $num5=$w_row['num5'];
    $num6=$w_row['num6'];
  }
  if ($num6 == '' && $num5==''  && $num4=='' && $num3=='') {
    $lottery_res=mysqli_query($con,"SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' ");
  } 
  elseif ($num6 == '' && $num5==''  && $num4=='0') {
    $lottery_res=mysqli_query($con,"SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' ");
  } 
  elseif ($num6 == '' && $num5=='') {
    $lottery_res=mysqli_query($con,"SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' AND `num4`='$num4' ");
  } 
  elseif ($num6 == '') {
    $lottery_res=mysqli_query($con,"SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' AND `num4`='$num4' AND `num5`='$num5' ");
  } else {
    $lottery_res=mysqli_query($con,"SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' AND `num3`='$num3' AND `num4`='$num4' AND `num5`='$num5' AND `num6`='$num6' ");
  }
}

?>
<main>
    <div class="banner" style="margin-bottom:15rem;">
      <style>
        .result_container {
            overflow-x: auto;
            margin: 2rem 15rem;
            border-radius:5px;
            display:block; /* Enable horizontal scrolling on smaller screens */
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
          
              margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
          }
          .cash-container{
            margin: 2rem 1rem;
          }
          .result_container table {
                overflow-x: scroll; /* Enable horizontal scrolling */
            }
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



      </style>

      <div class="result_container">
        <div class="header-table" style="margin-bottom:2rem;border-bottom:1px dashed #19E9F0">
          <p>Winning lottery of <?php echo $title ?></p>
        </div>
        <?php
          while($lottery_row=mysqli_fetch_assoc($lottery_res)){
            $list_id = $lottery_row['list_id'];
            $list_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT `list`.`id`, `list`.`title`, `buy_list`.* FROM `buy_list` JOIN `list` ON `buy_list`.`list_id` = `list`.`id` WHERE `buy_list`.`list_id` = '$list_id' AND `list`.`title` = '$title'"));

            $uid=$list_row['uid'];
            $u_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `user` WHERE `id`='$uid'"));
          ?>
          <a href="view_user.php?id=<?php echo $uid ?>" style="margin-bottom:0.5rem;font-weight:500;"> <?php echo $u_row['name'] ?></a>
        <table style="margin-bottom:2rem;">
          <span style="font-weight:600;margin-bottom:2rem;">Grand Price <?php echo $prize ?></span>
          <tr style="margin-right:3rem;">
            <td><span><?php echo $lottery_row['alpha'] ?></span></td>            
            <td><span><?php echo $lottery_row['num1'] ?></span></td>            
            <td><span><?php echo $lottery_row['num2'] ?></span></td>            
            <td><span><?php echo $lottery_row['num3'] ?></span></td>            
            <td><span><?php echo $lottery_row['num4'] ?></span></td>            
            <td><span><?php echo $lottery_row['num5'] ?></span></td>            
            <td><span><?php echo $lottery_row['num6'] ?></span></td> 
          </tr>
          
        </table>
        <?php 
          $noti_res=mysqli_query($con,"SELECT * FROM `result` where `u_id`='$uid' AND `hti_id`='$id'");
          if(mysqli_num_rows($noti_res)){
          }else{
            ?>
            <a href="result.php?uid=<?php echo $u_row['id'] ?>&hti_id=<?php echo $id ?>" class="btn-primary" style="margin-bottom:2rem;">အကြောင်းကြားမည်</a>
            <?php
          }
        ?>
        
        <?php  }?>
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