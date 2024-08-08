<?php

// API endpoint
$apiUrl = "https://lotteryofmyanmar.000webhostapp.com/restApi/user/getuserdata.php";

// API key
$apiKey = "kyaw";

// Empty JSON data
$jsonData = json_encode(array());

// Initialize cURL
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, $apiUrl);

// Set the HTTP method (POST)
curl_setopt($ch, CURLOPT_POST, true);

// Set the API key as a query parameter
$apiUrlWithKey = $apiUrl . "?api_key=" . $apiKey;
curl_setopt($ch, CURLOPT_URL, $apiUrlWithKey);

// Set the JSON data to be sent
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

// Set headers to indicate JSON content
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

// Return the response instead of outputting it
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request and fetch the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo "Error: " . curl_error($ch);
} else {
    // Print the response
    echo $response;
}

// Close cURL session
curl_close($ch);
?>
