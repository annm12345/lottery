<?php
require('top.inc.php');
?>


<main>
    <div class="banner" style="margin-bottom:15rem;">
    <style>
        .responsive-table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        .responsive-table th,
        .responsive-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .responsive-table th {
            background-color: #f2f2f2;
        }

        .responsive-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .responsive-table tbody tr:hover {
            background-color: #ddd;
        }


        @media screen and (max-width: 600px) {
            .responsive-table {
            border: 0;
            }
            .responsive-table thead {
            }
            .responsive-table tr {
            border-bottom: 2px solid #ddd;
            margin-bottom: 8px;
            }
            .responsive-table td {
            border-bottom: none;
            justify-content: center;
            text-align: left;
            }
            .responsive-table td::before {
            display: none;
            }
        }

    </style>
    <div class="product-minimal" style="padding:1rem;">
    <p><?php
        
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
        // date_default_timezone_set('Asia/Yangon');
        // $added_on = date('F Y'); 
        $t_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `price` WHERE `date`='$previous_date'"));
        $t_title=$t_row['id'];
        echo $t_row['title'] ?> ကြိမ်မြောက်ကံထူးရှင်များ</p>
    <table class="responsive-table">
        <thead>
        <tr>
            <th>အမည်</th>
            <th>ဆုကြေး</th>
            <th>ဖုန်းနံပါတ်</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $result = mysqli_query($con, "SELECT r.u_id, h.id, h.prize, h.alpha, h.num1, h.num2, h.num3, h.num4, h.num5, h.num6, h.title, h.date, r.desc
                        FROM htipauksin AS h
                        INNER JOIN result AS r ON h.id = r.hti_id
                        WHERE h.title = '$t_title'
                        ORDER BY h.id ASC");

            while ($row = mysqli_fetch_assoc($result)) {
                $u_id = $row['u_id'];
                $u_res = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user WHERE id = '$u_id'"));
                ?>
                <tr>
                    <td><?php echo $u_res['name'] ?></td>
                    <td><?php echo $row['prize'] ?></td>
                    <td class="phone"><?php echo $u_res['phone'] ?></td>
                </tr>
        <?php } ?>

        <script>
            // Get all phone number elements
            var phoneNumberElements = document.querySelectorAll('.phone');

            // Iterate over each phone number element
            phoneNumberElements.forEach(function(phoneNumberElement) {
                // Get the text content of the phone number
                var phoneNumber = phoneNumberElement.textContent;

                // Replace the first 7 characters with asterisks
                var hiddenPhoneNumber = phoneNumber.replace(/^.{7}/, '*******');

                // Update the content of the phone number element with the hidden phone number
                phoneNumberElement.textContent = hiddenPhoneNumber;
            });
        </script>

        

        </tbody>
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

