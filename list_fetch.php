<?php
    require('connection.php');

    function fetchProductContainers($con, $added_on, $price) {
        $amounts = [1,3,5, 6, 8, 9, 10, 11, 50, 100];
        $html = '';
    
        foreach ($amounts as $amount) {
            $query = "SELECT * FROM `list` WHERE `date`='$added_on' AND sell='' AND `amount`='$amount'";
            $result = mysqli_query($con, $query);
            $num_rows = mysqli_num_rows($result);
    
            $link = "lottery-list-type.php?amount=$amount&date=$added_on";
            
            $disabledClass = ($num_rows > 0) ? '' : 'disabled';
    
            $html .= '<div class="product-container-small ' . $disabledClass . '">';
            $html .= '<div class="ticket-icon">';
            $html .= '<a href="' . $link . '" style="color:#1252F1"><ion-icon name="ticket"></ion-icon></a>';
            $html .= '</div>';
            $html .= '<div class="product-details">';
            $html .= '<h4 class="product-title"><a href="' . $link . '" style="color:#000">' . $amount . ' စောင်တွဲ </a></h4>';
            $html .= '<p class="product-price">ks ' . ($amount * $price) . '</p>';
            $html .= '</div>';
            $html .= '</div>';
        }
    
        return $html;
    }
    
    // Check if AJAX request is sent
    if (isset($_POST['added_on']) && isset($_POST['price'])) {
        $added_on = $_POST['added_on'];
        $price = $_POST['price'];
    
        // Fetch and return product containers HTML
        echo fetchProductContainers($con, $added_on, $price);
    } else {
        // Handle invalid request
        echo 'Invalid request';
    }
?>
