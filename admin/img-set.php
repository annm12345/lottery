<?php
require('top.php');

if(isset($_POST['set_price']) ) {
    mysqli_query($con,"DELETE FROM `banner`");
    $fileCount = count($_FILES['images']['name']);
    
    for ($i = 0; $i < $fileCount; $i++) {
        $fileName = $_FILES['images']['name'][$i];
        $tmpName = $_FILES['images']['tmp_name'][$i];
        $fileType = $_FILES['images']['type'][$i];
        
        // Move uploaded file to a permanent location
        move_uploaded_file($tmpName, '../taximage/' . $fileName);

        // Insert image details into the database
        $added_on = date('Y-m-d h:i:s');
        $sql = "INSERT INTO `banner`(`image`, `date`) VALUES ('$fileName','$added_on')";
        mysqli_query($con, $sql);
    }
        ?>
        <script>
            window.alert('Successfully Created Banner');
             window.location.href='img-set.php';
        </script>
        <?php
    
    
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
            background: none;
            margin-bottom: 0px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 2rem;
            padding: 1rem;
            border-radius: 10px;
        }

        .search-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #image_container img {
            width: 100%;
            max-width: 350px;
            height: auto;
            margin-top: 5px;
            margin-bottom: 1rem;
            border-bottom: 1px dashed #000;
        }
        .upload-container {
        text-align: center;
        margin-top: 50px;
        }

        .upload-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        }

        #file-input {
        display: none;
        }

        .preview-container {
        margin-top: 20px;
        }

        .preview-image {
        max-width: 350px;
        margin: 10px;
        border-bottom:1px solid #000;
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
            <!-- Form for uploading images -->
            <!-- <form action="img-set.php" method="post" class="result_container" style="margin-bottom: 10px" enctype="multipart/form-data">
                <div class="list_container">
                     Container to display uploaded images -->
                    <!-- <div id="image_container" style="margin-top: 5px"></div> -->
                    <!-- Hidden file input field for selecting multiple images -->
                    <!-- <input type="file" name="image[]" class="search-field" id="image_input" style="display: none;" multiple onchange="displayImages(this);"> -->
                    <!-- Icon to trigger file input -->
                    <!--<label for="image_input" style="cursor: pointer;">
                        <i class="fas fa-plus-circle"></i>  Use your own add icon 
                    </label>-->
                    <!-- Submit button -->
                    
                </div>
            </form>
            <form action="img-set.php" method="post" class="result_container" style="margin-bottom:5rem" enctype="multipart/form-data">
                <div class="upload-container">
                    <input type="file" name="images[]" id="file-input" multiple>
                    <label for="file-input" class="upload-button">Select Images</label>
                    <input type="submit" value="SET" name="set_price" style="border: none; background: green; color: #fff; padding: 10px; border-radius: 3px; width: 100px;">
                    <div id="preview-container" class="preview-container">
                    <?php

                    $sql_select = "SELECT * FROM `banner`";
                    $result = $con->query($sql_select);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<img src="../taximage/' . $row['image'] . '" class="preview-image">';
                        }
                    }
                    ?>
                    </div>
                   
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript to display selected images -->
    <script>
        const fileInput = document.getElementById('file-input');
        const previewContainer = document.getElementById('preview-container');

        fileInput.addEventListener('change', function() {
        const files = this.files;
        previewContainer.innerHTML = '';

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            reader.onload = function(event) {
            const imgUrl = event.target.result;
            const imgElement = document.createElement('img');
            imgElement.setAttribute('src', imgUrl);
            imgElement.classList.add('preview-image');
            
            const cancelBtn = document.createElement('button');
            cancelBtn.innerHTML = '<i class="fas fa-times"></i>'; // Assuming "fas fa-times" represents the "x" mark icon in Font Awesome
            cancelBtn.classList.add('cancel-btn');
            cancelBtn.addEventListener('click', function() {
                imgElement.remove();
                cancelBtn.remove();
            });

            
            const div = document.createElement('div');
            div.appendChild(cancelBtn);
            div.appendChild(imgElement);
            
            
            previewContainer.appendChild(div);
            };

            reader.readAsDataURL(file);
        }
        });

    </script>



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
