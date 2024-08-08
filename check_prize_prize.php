<?php
require('top.php');


if(isset($_GET['list_id'])){
  $list_id=$_GET['list_id'];
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
        .list_container {
            background-color: #19E9F0;
            display: flex;
            align-items: center;
            justify-content:center;
            gap:2rem;
            padding: 1rem;
            border-radius: 10px;
        }
        
        .result_container table {
            width: 100%; /* Table fills the container */
            border-collapse: collapse; /* Remove border spacing */
        }

        .result_container table td {
            padding: 4px;
            text-align: center;
            margin:auto;
            border:1px dashed #36BDEC;
        }
        .result_container table th {
            border:1px dashed #36BDEC;
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


        /* Hide table borders
        .result_container table,
        .result_container table td,
        .result_container table th {
            border: none;
        } */
        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

<div class="result_container" style="">
    <div class="header-table" style="margin-bottom:2rem;border-bottom:1px dashed #19E9F0">
    <?php
    // Get the current month and year
    $current_month = date('n');
    $current_year = date('Y');

    // Calculate the previous month
    $previous_month = $current_month - 1;
    $previous_year = $current_year;

    // If the previous month is December, adjust the year
    if ($previous_month == 0) {
        $previous_month = 12;
        $previous_year--;
    }

    $previousMonthName = date('F', mktime(0, 0, 0, $previous_month, 1, $previous_year));
    $previous_date = $previousMonthName . ' ' . $previous_year;
    ?>
    
    </div>
    <table style="margin-bottom:2rem;">
        <tr>
            <th>အမည်</th>
            <th>ဖုန်းနံပါတ်</th>
            <th>ဆုကြေး</th>
            <th>အရေအတွက်</th>
            <th>ပမာဏ</th>
            <!-- <th></th> Added column for action -->
        </tr>
        <?php
       
        $groupedRows = array();

        // Fetch data from the database
        $t_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `list` WHERE `id`='$list_id'"));
        $t_title = $t_row['title'];
        $res = mysqli_query($con, "SELECT * FROM `htipauksin` WHERE `title`='$t_title'");
        $check=mysqli_num_rows($res);
        if($check>0){
            while ($row = mysqli_fetch_assoc($res)) {
                $alpha = $row['alpha'];
                $num1 = $row['num1'];
                $num2 = $row['num2'];
                $num3 = $row['num3'];
                $num4 = $row['num4'];
                $num5 = $row['num5'];
                $num6 = $row['num6'];
                $prize = $row['prize'];
                $amount = $row['amount'];
    
                // Construct the SQL query based on the numbers provided
                $sql = "SELECT * FROM `lottery` WHERE `alpha`='$alpha' AND `num1`='$num1' AND `num2`='$num2' and `list_id`='$list_id'";
    
                if ($num3 != '') {
                    $sql .= " AND `num3`='$num3'";
                }
    
                if ($num4 != '') {
                    $sql .= " AND `num4`='$num4'";
                }
    
                if ($num5 != '') {
                    $sql .= " AND `num5`='$num5'";
                }
    
                if ($num6 != '') {
                    $sql .= " AND `num6`='$num6'";
                }
    
                // Execute the query
                $lottery_res = mysqli_query($con, $sql);
                while ($lottery_row = mysqli_fetch_assoc($lottery_res)) {
                    $list_id = $lottery_row['list_id'];
                    $list_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT `list`.`id`, `list`.`title`, `buy_list`.* FROM `buy_list` JOIN `list` ON `buy_list`.`list_id` = `list`.`id` WHERE `buy_list`.`list_id` = '$list_id' AND `list`.`title` = '$t_title'"));
    
                    // Print the user's name and other details inside the loop
                    if ($list_row) {
                        $uid = $list_row['uid'];
                        $u_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$uid'"));
    
                        // Group rows by user ID and prize
                        $groupKey = $uid . '_' . $prize;
                        if (!isset($groupedRows[$groupKey])) {
                            $groupedRows[$groupKey] = array(
                                'id'=>$u_row['id'],
                                'name' => $u_row['name'],
                                'phone' => $u_row['phone'],
                                'prize' => $prize,
                                'count' => 1,
                                'total_prize' => $amount
                            );
                        } else {
                            $groupedRows[$groupKey]['count']++;
                            $groupedRows[$groupKey]['total_prize'] += $amount;
                        }
                    }else{
                        echo "ယခုထီလက်မှတ်သည် ကံမထူးပါ၊ ကျေးဇူးတင်ပါသည်။";
                    }
                }
            }
    
            // Sort the array by total prize amount in descending order
            usort($groupedRows, function($a, $b) {
                return $b['total_prize'] - $a['total_prize'];
            });
        }
        else{
            echo "ယခုထီလက်မှတ်သည် ယခုလအတွက် ထီလက်မှတ်ဖြစ်သောကြောင့် ထီတိုက်၍မရနိုင်ပါ";
        }

        // Display the sorted rows
        foreach ($groupedRows as $row) {
            ?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['prize'];?></td>
                <td><?php echo $row['count']; ?></td>
                <td><?php echo $row['total_prize']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
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