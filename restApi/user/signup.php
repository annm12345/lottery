<?php
require('../connection.php');
// Define your API key
$apiKey = "kyaw";

// Get the API key from the query parameters
$requestApiKey = $_GET['api_key'] ?? '';

// Check if the API key matches
if ($requestApiKey !== $apiKey) {
    http_response_code(401); // Unauthorized
    echo json_encode(array("error" => "Unauthorized"));
    exit();
}

// Get the JSON data from the request body
$jsonData = file_get_contents('php://input');

$requestData = json_decode($jsonData, true);
$name = $requestData['name'] ?? '';
$phone = $requestData['phone'] ?? '';
$birth = $requestData['birth'] ?? '';
$gender = $requestData['gender'] ?? '';
$nic = $requestData['nic'] ?? '';
$address = $requestData['address'] ?? '';
$passowrd = $requestData['passowrd'] ?? '';



    // Check if the phone number already exists in the database
    $res = mysqli_query($con, "SELECT * FROM `user` WHERE `phone`='$phone'");
    if(mysqli_num_rows($res) > 0) {
        // Phone number already exists
        $responseData = array(
            "message" => "exist."
        );
    } else {
        date_default_timezone_set('Asia/Yangon');
        $added_on=date('Y-m-d h:i:s');

        mysqli_query($con,"INSERT INTO `user`(`name`, `phone`, `birth`, `gender`, `nic`, `address`, `password`, `date`) VALUES ('$name','$phone','$birth','$gender','$nic','$address','$passowrd','$added_on')");

        $responseData = array(
            "message" => "success"
        );
    }


// Set headers to indicate JSON content
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($responseData,JSON_UNESCAPED_UNICODE);
?>
