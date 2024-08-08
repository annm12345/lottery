<?php
require('connection.php');

// Get the year from the query parameter
$year = $_GET['year'];

// Define an array to store monthly sales data
$monthlySalesData = [];

// Assuming you have a database table named 'list' with columns 'date' and 'price'
// Adjust this query according to your database schema
$res = mysqli_query($con, "SELECT 
                            SUM(price) AS total_price,
                            SUBSTRING_INDEX(date, ' ', 1) AS month_name
                          FROM 
                            `list` 
                          WHERE 
                            sell='true' AND 
                            SUBSTRING_INDEX(date, ' ', -1) = '$year'
                          GROUP BY 
                            SUBSTRING_INDEX(date, ' ', 1)");

if ($res) {
    // Initialize the monthly sales data array with zero values for each month
    $months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    foreach ($months as $index => $month) {
        $monthlySalesData[$month] = 0;
    }

    // Fetch the results and store them in the monthlySalesData array
    while ($row = mysqli_fetch_assoc($res)) {
        $monthName = $row['month_name'];
        $monthlySalesData[$monthName] = (int)$row['total_price'];
    }
} else {
    // Handle the case where the query fails
    // For example, you could log an error or return an empty array
    // Logging or error handling depends on your specific application requirements
    error_log("Failed to fetch monthly sales data: " . mysqli_error($con));
}

// Convert the array to JSON format
echo json_encode($monthlySalesData);

// Close the database connection if necessary
mysqli_close($con);
?>
