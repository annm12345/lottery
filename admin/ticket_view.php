<?php
require('top.php');
$msg='';



?>


  <style>
    .result_container{
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom:2rem;
    }
    .main-heading {
      font-size: 16px; /* Adjust the font size */
      color: #333; /* Adjust the text color */
      margin-bottom: 20px; /* Add some space below the heading */
    }


    .header-search-container {
      flex-grow: 1;
    }

    .search-container-small {
      flex-basis: 30%; /* Set width to 30% for small search bar */
    }

    .search-container-large {
      flex-basis: 70%; /* Set width to 70% for large search bar */
    }

    .search-container-small:not(:last-child) {
      margin-right: 20px; /* Add gap between search bars */
    }

    .search-field {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .search-btn {
      background-color: green;
      color: white;
      border: none;
      padding: 10px;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
      cursor: pointer;
    }
    .result_container {
        overflow-x: auto;
        /* border:1px solid #19E9F0; */
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
    }

    .result_container table {
        width: 100%; /* Table fills the container */
         /* Remove border spacing */
    }

    .result_container table td:nth-child(1) {
        width: 30%;
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:1px 3px 3px white;
    }
    .result_container table td:nth-child(2) {
        width: 70%;
        text-align:center;
        padding:0.5rem 1rem;
        font-weight:800;
        color:black;
        font-size:24px;
        text-shadow:3px 10px 10px #fff;
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
      
      .result_container {
       
          margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
    }



  </style>
  <div class="banner">
    <div class="header-main">
      
      

      <form action="" method="post" class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
          <p>Tickets</p>
        </div>
        <table>
          <tr>
            <th>အက္ခရာ</th>
            <th>နံပါတ်</th>
          </tr>
          <?php
          if(isset($_GET['list_id'])){
            $list_id=$_GET['list_id'];
            $list_row=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `list` Where `id`='$list_id'"));
            $res=mysqli_query($con,"SELECT * FROM `lottery` Where `list_id`='$list_id' ORDER BY `id` ASC");
            while($row=mysqli_fetch_assoc($res)){
          ?>
          <tr style="background-image:url(../lottery.png);background-position:center;">
            <td><span><?php echo $row['alpha'] ?></span></td>            
            <td ><span><?php echo $row['num1'] ?>      <?php echo $row['num2'] ?>     <?php echo $row['num3'] ?>     <?php echo $row['num4'] ?>     <?php echo $row['num5'] ?>     <?php echo $row['num6'] ?></span></td>            
                 
          </tr>
          <?php } } ?>
      
        </table>
      </div>
    </form>
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
