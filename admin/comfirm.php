<?php
require('top.php');
if(isset($_GET['id']) && isset($_GET['cashin'])){
    $id = $_GET['id'];
    $res = mysqli_query($con, "SELECT * FROM `cashin` WHERE id='$id'");
    while($row = mysqli_fetch_assoc($res)){
        $uid = $row['uid'];
        $u_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$uid'"));

        // Move the following HTML code inside the while loop
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
        border:1px solid #19E9F0;
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
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
    .cash-container {
      display: flex;
      flex-direction: column;
      color:#fff;
      background-color: #fff; /* Set background color */
      border: 1px solid #ccc; /* Add border */
      border-radius: 5px; /* Add border radius */
      padding: 10px; /* Add padding */
      max-width: 500px; /* Set max-width if needed */
    }

    .amount,
    .total {
      width:100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px; /* Add margin between sections */
    }

    .cash-container span {
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
    }

    .cash-container span:first-child {
      color: #000; /* Set color for labels */
    }

    .cash-container span:last-child {
      color: #000; /* Set color for values */
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


    /* Responsive styles for smaller screens */

    .contact-box {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9; /* Light gray background */
        border-radius: 10px;
    }

    .contact-box p {
        margin-bottom: 10px;
        margin-left:2rem;
    }
    :root {
        --blue: #0071FF;
        --light-blue: #B6DBF6;
        --dark-blue: #005DD1;
        --grey: #f2f2f2;
    }
    .img-container {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 30px;
        border-radius: 30px;
        
    }
    .img-container.mobile-view .img-area {
        max-width: 100vw;
        max-height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        z-index: 9999;
    }
    
    .img-area {
        position: relative;
        width: 100%;
        height: 240px;
        background: var(--grey);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .img-area .icon {
        font-size: 100px;
    }
    .img-area h3 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 6px;
        color:#000;
    }
    .img-area p {
        color: #000;
        text-align:center;
    }
    .img-area p span {
        font-weight: 600;
    }
    .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }
    .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }
    .img-area.active:hover::before {
        opacity: 1;
    }
    .select-image {
        display: block;
        width: 100%;
        padding: 16px 0;
        border-radius: 15px;
        background: var(--blue);
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all .3s ease;
    }
    .select-image:hover {
        background: var(--dark-blue);
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
       
          margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .cash-container{
        margin: 2rem 1rem;
      }
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
        .header-table {
            margin: 1rem;
        }

        .contact-box {
            padding: 5px;
        }
    }



  </style>
  <div class="banner">
    <div class="header-main">
      
      <div class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
          <p>ငွေသွင်းမည်</p>
        </div>
        <div class="contact-box">
            <p>Name: <?php echo $u_row['name'] ?></p>
            <p>NIC: <?php echo $u_row['nic'] ?></p>
            <p>Phone: <?php echo $u_row['phone'] ?></p>
            <p>Address: <?php echo $u_row['address'] ?></p>
        </div>
        
      </div>

      <?php
       ?>
      <form action="" method="post" class="cash-container" enctype="multipart/form-data">
            <!-- <style>
                /* Styles for the modal */
                .modal {
                    display: none; /* Hidden by default */
                    position: fixed; /* Stay in place */
                    z-index: 1000; /* Sit on top */
                    padding-top: 50px; /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%; /* Full width */
                    height: 100%; /* Full height */
                    overflow: auto; /* Enable scroll if needed */
                    background-color: rgb(0,0,0); /* Fallback color */
                    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                }

                /* Modal Content */
                .modal-content {
                    margin: auto;
                    display: block;
                    width: 80%;
                    max-width: 700px;
                }

                /* The Close Button */
                .close {
                    position: absolute;
                    top: 10px;
                    right: 25px;
                    color: #f1f1f1;
                    font-size: 35px;
                    font-weight: bold;
                    transition: 0.3s;
                }

                .close:hover,
                .close:focus {
                    color: #bbb;
                    text-decoration: none;
                    cursor: pointer;
                }
            </style> -->

            <!-- Image Display Container -->
            <!-- <div id="imageModal" class="modal">
                <span class="close" onclick="closeModal()">&times;</span>
                <img class="modal-content" id="imgDisplay">
            </div> -->

            <!-- Your Image Container -->
            

            <!-- <script>
                function openModal(imageUrl) {
                    var modal = document.getElementById("imageModal");
                    var img = document.getElementById("imgDisplay");
                    img.src = imageUrl;
                    modal.style.display = "block";
                }

                function closeModal() {
                    var modal = document.getElementById("imageModal");
                    modal.style.display = "none";
                } -->
            </script>
            <div class="amount"> 
              <span>လုပ်ငန်းစဉ်နံပါတ်နောက်ဆုံး(၄)လုံး</span>
              <input type="number" id="" style="width:100px;text-align:center;border:none;outline:none;" value="<?php echo $row['tax_id'] ?>" readonly>
          </div>
          <div class="amount"> 
              <span>ထည့်သွင်းငွေပမာဏ</span>
              <span style="color:green"><?php echo $row['amount'] ?> KS</span>
          </div>
          
          <a href="cashin.php?id=<?php echo $row['id'] ?>&cashin=true" class="btn-primary">Comfirm</a>
       </from>
    </div>
  </div>
  <?php } }elseif(isset($_GET['id']) && isset($_GET['cashout'])){
    $id = $_GET['id'];
    $res = mysqli_query($con, "SELECT * FROM `cashout` WHERE id='$id'");
    while($row = mysqli_fetch_assoc($res)){
        $uid = $row['uid'];
        $u_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$uid'"));

        // Move the following HTML code inside the while loop
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
        border:1px solid gold;
        margin: 2rem 15rem;
        border-radius:5px;
        display:block; /* Enable horizontal scrolling on smaller screens */
    }
    .cash-container{
      margin: 2rem 15rem;
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
      background: gold; /* Set background color to light gold */
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
    .cash-container {
      display: flex;
      flex-direction: column;
      color:#fff;
      background-color: #fff; /* Set background color */
      border: 1px solid #ccc; /* Add border */
      border-radius: 5px; /* Add border radius */
      padding: 10px; /* Add padding */
      max-width: 500px; /* Set max-width if needed */
    }

    .amount,
    .total {
      width:100%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 5px; /* Add margin between sections */
    }

    .cash-container span {
      font-size: 16px; /* Set font size */
      font-weight: bold; /* Set font weight */
    }

    .cash-container span:first-child {
      color: #000; /* Set color for labels */
    }

    .cash-container span:last-child {
      color: #000; /* Set color for values */
    }
    .btn-primary {
      background-color: gold;
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


    /* Responsive styles for smaller screens */

    .contact-box {
        margin-top: 20px;
        padding: 10px;
        background-color: #f9f9f9; /* Light gray background */
        border-radius: 10px;
    }

    .contact-box p {
        margin-bottom: 10px;
        margin-left:2rem;
    }
    :root {
        --blue: #0071FF;
        --light-blue: #B6DBF6;
        --dark-blue: #005DD1;
        --grey: #f2f2f2;
    }
    .img-container {
        max-width: 400px;
        width: 100%;
        background: #fff;
        padding: 30px;
        border-radius: 30px;
    }
    .img-area {
        position: relative;
        width: 100%;
        height: 240px;
        background: var(--grey);
        margin-bottom: 30px;
        border-radius: 15px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .img-area .icon {
        font-size: 100px;
    }
    .img-area h3 {
        font-size: 20px;
        font-weight: 500;
        margin-bottom: 6px;
        color:#000;
    }
    .img-area p {
        color: #000;
        text-align:center;
    }
    .img-area p span {
        font-weight: 600;
    }
    .img-area img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        z-index: 100;
    }
    .img-area::before {
        content: attr(data-img);
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, .5);
        color: #fff;
        font-weight: 500;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        pointer-events: none;
        opacity: 0;
        transition: all .3s ease;
        z-index: 200;
    }
    .img-area.active:hover::before {
        opacity: 1;
    }
    .select-image {
        display: block;
        width: 100%;
        padding: 16px 0;
        border-radius: 15px;
        background: var(--blue);
        color: #fff;
        font-weight: 500;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: all .3s ease;
    }
    .select-image:hover {
        background: var(--dark-blue);
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
       
          margin: 2rem 1rem; /* Enable horizontal scrolling on smaller screens */
      }
      .cash-container{
        margin: 2rem 1rem;
      }
      .result_container table {
            overflow-x: scroll; /* Enable horizontal scrolling */
        }
        .header-table {
            margin: 1rem;
        }

        .contact-box {
            padding: 5px;
        }
    }



  </style>
  <div class="banner">
    <div class="header-main">
      
      

      <div class="result_container">
        <div class="header-table" style="margin:2rem;border-bottom:1px dashed #19E9F0">
          <p>ငွေထုတ်မည်</p>
        </div>
        <div class="contact-box">
            <p>Name: <?php echo $u_row['name'] ?></p>
            <p>NIC: <?php echo $u_row['nic'] ?></p>
            <p>Phone: <?php echo $u_row['phone'] ?></p>
            <p>Address: <?php echo $u_row['address'] ?></p>
        </div>
        
      </div>

      <?php
       ?>
      <form action="" method="post" class="cash-container" enctype="multipart/form-data">
            <div class="amount"> 
              <span>ထုတ်ယူမည့်ဖုန်းနံပါတ်</span>
              <input type="number" id="" style="width:100px;text-align:center;border:none;outline:none;" value="<?php echo $row['phone'] ?>">
          </div>
          <div class="amount"> 
              <span>ထုတ်ယူမည့်ငွေပမာဏ</span>
              <span style="color:green"><?php echo $row['amount'] ?> KS</span>
          </div>
          <div class="amount"> 
              <span>ထုတ်ယူမည့်နေရာ</span>
              <span style="color:green"><?php echo $row['payment'] ?></span>
          </div>
          
          <a href="cashout.php?id=<?php echo $row['id'] ?>&cashout=true" class="btn-primary">Comfirm</a>
       </from>
    </div>
  </div>
  <?php } } ?>



</main>

<!--
    - custom js link
-->
<script src="./assets/js/script.js"></script>
<script>
    const selectImage = document.querySelector('.select-image');
    const inputFile = document.querySelector('#file');
    const imgArea = document.querySelector('.img-area');

    selectImage.addEventListener('click', function () {
        inputFile.click();
    })

    inputFile.addEventListener('change', function () {
        const image = this.files[0]
        if(image.size < 2000000) {
            const reader = new FileReader();
            reader.onload = ()=> {
                const allImg = imgArea.querySelectorAll('img');
                allImg.forEach(item=> item.remove());
                const imgUrl = reader.result;
                const img = document.createElement('img');
                img.src = imgUrl;
                imgArea.appendChild(img);
                imgArea.classList.add('active');
                imgArea.dataset.img = image.name;
            }
            reader.readAsDataURL(image);
        } else {
            alert("Image size more than 2MB");
        }
    })
</script>

<!--
    - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
