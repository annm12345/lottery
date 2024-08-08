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




$res = mysqli_query($con, "SELECT * FROM `user` ORDER BY `id` ASC");
if(mysqli_num_rows($res) > 0) {
    // Phone number already exists
    $row=mysqli_fetch_assoc($res);
    $id = $row['id'];
    $name = $row['name'];
    $phone = $row['phone'];
    $birth = $row['birth'];
    $gender = $row['gender'];
    $nic = $row['nic'];
    $address = $row['address'];
    $responseData = array(
        "message" => "success",
        'name' => $name,
        'phone' => $phone,
        'birth' => $birth,
        'gender' => $gender,            
        'nic' => $nic,
        'address' => $address,
        
    );
} else {
    
    $responseData = array(
        "message" => "fail"
    );
}

// Set headers to indicate JSON content
header('Content-Type: application/json');

// Return the data as JSON
echo json_encode($responseData,JSON_UNESCAPED_UNICODE);
?>
