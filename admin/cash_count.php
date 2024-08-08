<?php
require('connection.php');

$cashin_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `cashin` WHERE `comfirm`=''"));
$cashout_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `cashout` WHERE `comfirm`=''"));
$request_count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `forget` WHERE `comfirm`=''"));

$response = array(
    'cashin_count' => $cashin_count,
    'cashout_count' => $cashout_count,
    'request_count' => $request_count
);

// Set the appropriate content type for JSON
header('Content-Type: application/json');

// Return the response as JSON
echo json_encode($response);
?>
