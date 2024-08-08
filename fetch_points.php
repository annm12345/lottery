<?php
require('connection.php');

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $result = mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$user_id'");
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo $row['amount'];
    } else {
        echo '0';
    }
}
?>
