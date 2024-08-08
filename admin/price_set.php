<?php
require('top.php');
if(isset($_POST['set_price'])){
    $month=$_POST['displayedMonth'];
    $title=$_POST['title'];
    $price=$_POST['price'];
    $count=$_POST['count'];
    $image = $_FILES['image']['name'];
    $image_temp_name = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_temp_name, '../taximage/'.$image);

    $res=mysqli_query($con,"SELECT * FROM `price` WHERE `date`='$month'");
    if(mysqli_num_rows($res)>0){
        mysqli_query($con,"UPDATE `price` SET `price`='$price',`title`='$title',`image`='$image',`count_alpha`='$count' WHERE `date`='$month'");
        ?>
        <script>
            window.location.href='price_set.php';
        </script>
        <?php

    }else{
        mysqli_query($con,"INSERT INTO `price`(`price`, `title`,`image`,`count_alpha`, `date`) VALUES ('$price','$title','$image','$count','$month')");
        ?>
        <script>
            window.location.href='price_set.php';
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
    


    /* Hide table borders */
    .result_container table,
    .result_container table td,
    .result_container table th {
        border: none;
    }
    

    /* Responsive styles for smaller screens */
    .list_container {
            background-color: gold;
            display: flex;
            align-items: center;
            justify-content:center;
            gap:2rem;
            padding: 1rem;
            border-radius: 10px;
        }
        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            }

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
            <form action="price_set.php" method="post" class="result_container" style="margin-bottom:10px" enctype="multipart/form-data">
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <label for="monthPicker">လ</label>
                    <input type="month" class="search-field" id="monthPicker" name="date" required>
                    <input type="text" class="search-field" name="displayedMonth" id="displayedMonth" required style="display:none">
                </div>
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <label for="title">အကြိမ်မြောက်</label>
                    <input type="number" name="title" class="search-field" required>
                </div>
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <label for="price">ဈေးနှုန်း</label>
                    <input type="number" name="price" class="search-field" required>
                </div>
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <label for="count">အက္ခရာ</label>
                    <input type="number" name="count" class="search-field" required>
                </div>
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <label for="image">ထီနမူနာ</label>
                    <div id="image_container" style="margin-top: 5px;display:none;"></div>
                    <input type="file" name="image" class="search-field" required onchange="displayImage(this);" id="image">
                </div>
                <div class="list_container" style="background:none;margin-bottom:0px">
                    <input type="submit" value="SET" name="set_price" style="border:none;background:green;color:#fff;padding:10px;border-radius:10px;width: 100px;">

                </div>
            </form>

            <script>
                function displayImage(input) {
                    var imageContainer = document.getElementById('image_container');
                    var image = document.getElementById('image');
                    imageContainer.innerHTML = ''; // Clear previous image (if any)

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.width = '100%'; // Make the image responsive
                            img.style.maxWidth = '200px'; // Set max width to 200px
                            img.style.height = 'auto'; // Maintain aspect ratio
                            imageContainer.appendChild(img);
                            imageContainer.style.display='';
                            image.style.display='none';
                        }

                        reader.readAsDataURL(input.files[0]); // Read the selected file as data URL
                    }
                }

                // Get the input element
                const monthInput = document.getElementById('monthPicker');
                // Get the span element for displaying formatted value
                const displayedMonth = document.getElementById('displayedMonth');

                // Add event listener to listen for changes in the input value
                monthInput.addEventListener('change', function() {
                    // Get the selected month value (yyyy-MM)
                    const selectedMonth = this.value;

                    // Split the selected month value into year and month parts
                    const [year, month] = selectedMonth.split('-');

                    // Get the month name based on the month number
                    const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                    const selectedMonthName = monthNames[parseInt(month) - 1]; // Subtract 1 because month number starts from 0

                    // Set the formatted value in the span element
                    displayedMonth.value = `${selectedMonthName} ${year}`;
                });
            </script>

            <div class="result_container" style="margin-bottom:4rem;">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed gold">
                    <p>လအလိုက် ထီလက်မှတ်ဈေးနှန်းသတ်မှတ်ချက်များ</p>
                </div>
                    <table>
                        <tr>
                            <th style="text-align: center; border-right: 1px solid gold;border-top: 1px solid gold;">လ</th>
                            <th style="text-align: center; border-right: 1px solid gold;border-top: 1px solid gold;">အကြိမ်မြောက်</th>
                            <th style="text-align: center; border-right: 1px solid gold;border-top: 1px solid gold;">တစ်စောင်ဈေးနှုန်း</th>
                            <th style="border-top: 1px solid gold;"></th>
                        </tr>
                        <?php
                        $res=mysqli_query($con,"SELECT * FROM `price` ORDER BY `date` DESC");
                        while($row=mysqli_fetch_assoc($res)){
                        ?>
                        <tr>
                            <td style="text-align: center; border-right: 1px solid gold;border-top: 1px solid gold;">
                                <span style="font-weight: 600;"><?php echo $row['date'] ?></span>
                            </td>
                            <td style="text-align: center; border-right: 1px solid gold;border-top: 1px solid gold;">
                                <span style="font-weight: 600;"><?php echo $row['title'] ?>ကြိမ်မြောက်</span>
                            </td>
                            <td style="text-align: center;border-top: 1px solid gold;">
                                <span style="font-weight: 600;"><?php echo $row['price'] ?></span>
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
