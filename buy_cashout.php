<?php
require('connection.php');

$response = array("status" => "error", "message" => "An error occurred.");

if(isset($_GET['list_id']) && isset($_GET['uid']) && isset($_GET['amount'])) {
    $list_id = $_GET['list_id']; 
    $user_id = $_GET['uid'];
    $amount = $_GET['amount']; // Use $_GET for amount parameter

    date_default_timezone_set('Asia/Yangon');
    $added_on = date('F Y');
    $date = date('Y-m-d');

    // Begin a transaction
    mysqli_begin_transaction($con);

    try {
        // Lock the selected list row for update to prevent other users from buying it simultaneously
        mysqli_query($con, "SELECT * FROM `list` WHERE `id`='$list_id' AND `sell`='false' FOR UPDATE");

        // Check if the user has enough points
        $p_res = mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$user_id'");
        $p_check = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `point` WHERE `uid`='$user_id'"));
        $row = mysqli_fetch_assoc($p_res);
        $originalAmount = $row['amount'];

        if ($originalAmount >= $amount || $p_check==0) {
            // Calculate the new amount by subtracting $amount from the original amount
            $newAmount = $originalAmount - $amount;

            // Ensure the new amount is not negative
            if ($newAmount >= 0) {
                // Update the 'point' table with the new amount
                mysqli_query($con, "UPDATE `point` SET `amount`='$newAmount' WHERE `uid`='$user_id'");
                // Using prepared statement to prevent SQL injection
                mysqli_query($con, "INSERT INTO `buy_list`(`uid`, `list_id`,`date`,`day`) VALUES ('$user_id','$list_id','$added_on','$date')");
                mysqli_query($con, "UPDATE `list` SET `sell`='true' WHERE `id`='$list_id'");
                $response = array("status" => "success", "message" => "ထီလက်မှတ်ဝယ်ယူမှုအောင်မြင်ပါသည်။ ဝန်ဆောင်မှုအားအသုံးပြုခြင်းအတွက်ကျေးဇူးတင်ရှိပါသည်။");
            } else {
                // If newAmount is negative, rollback the transaction
                mysqli_rollback($con);
                $response = array("status" => "error", "message" => "Insufficient balance.");
            }
        } else {
            $response = array("status" => "error", "message" => "User not found or insufficient balance.");
        }

        // Commit the transaction
        mysqli_commit($con);
    } catch (Exception $e) {
        // Rollback the transaction if an error occurs
        mysqli_rollback($con);
        $response = array("status" => "error", "message" => "An error occurred.");
    }

}

// Return the response as JSON
echo json_encode($response);
?>
