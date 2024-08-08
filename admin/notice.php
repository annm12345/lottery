<?php
require('top.php');

date_default_timezone_set('Asia/Yangon');
$added_on = date('Y-m-d H:i:s');

if(isset($_POST['send'])){
    $desc = $_POST['desc'];
    mysqli_query($con,"INSERT INTO `noti`(`desc`, `date`) VALUES ('$desc','$added_on')");
    ?>
    <script>        
        window.alert("အားလုံးသို့အသိပေးပြီးပါပြီ။")
        window.location.href="notice.php";
    </script>
    <?php
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

    .notification-container {
            display: flex;
            flex-direction:column;
            gap:0.5rem;
            justify-content: center;
            margin-bottom:5rem;
        }

        .notification {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #dff0d8;
            color: #3c763d;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align:justify;
        }

        .notification i {
            margin-right: 10px;
            color: #3c763d;
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
        .notification-container {
                padding: 20px;
            }

            .notification {
                width: 100%;
            }
    }



  </style>
  <div class="banner">
        <div class="header-main">
            <form action="" method="post" class="result_container">
                <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
                    <p>အကြောင်းကြားစာ</p>
                </div>
                <table>
                    <tr>
                        
                        <td style="text-align: justify;">
                        <textarea style="border:none;outline:none;font-size:1rem;font-weight:500;" name="desc" id="" required></textarea>
                            <input type="submit" style="font-weight: 600;padding:1rem;border-radius:5px;background: #1992F7;max-width:200px;outline:none;border:none;color:#ff1" value="အားလုံးသို့အသိပေးမည်" name="send">
                        </td>
                    </tr>

                </table>
            </form>

            <div class="notification-container">
                <?php
                $noti_res=mysqli_query($con,"SELECT * FROM `noti` ORDER BY `id` DESC");
                while($noti_row=mysqli_fetch_assoc($noti_res)){
                ?>
                <p><?php echo $noti_row['date'] ?></p>
                <div class="notification">
                    <i class="fas fa-check-circle"></i>
                    <p><?php echo $noti_row['desc'] ?></p>
                </div>
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
