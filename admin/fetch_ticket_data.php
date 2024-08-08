<?php
require('connection.php');

// Get the year from the query parameter
$year = $_GET['year'];

// Define an array to store monthly sales data
$monthlySalesData = [];

// Initialize the monthly sales data array with zero values for each month and amount
$months = [
    'January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'
];

foreach ($months as $month) {
    $monthlySalesData[$month] = [];
}

// Assuming you have a database table named 'list' with columns 'date', 'amount', 'sell', and 'price'
// Adjust this query according to your database schema
$query = "SELECT 
            SUBSTRING_INDEX(date, ' ', 1) AS month_name,
            amount,
            SUM(CASE WHEN sell = 'true' THEN 1 ELSE 0 END) AS total_sold_item,
            SUM(CASE WHEN sell = 'custom' THEN 1 ELSE 0 END) AS total_sold_custom_item,
            SUM(CASE WHEN sell != 'true' THEN 1 ELSE 0 END) AS total_remain_item,
            SUM(CASE WHEN sell = 'true' THEN price ELSE 0 END) AS total_sold_price,
            SUM(CASE WHEN sell = 'custom' THEN price ELSE 0 END) AS total_sold_custom_price
          FROM 
            `list`
          WHERE 
            SUBSTRING_INDEX(date, ' ', -1) = ?
          GROUP BY 
            SUBSTRING_INDEX(date, ' ', 1), amount";

// Prepare and execute the statement
$stmt = $con->prepare($query);
$stmt->bind_param('s', $year);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the results and populate the monthly sales data array
while ($row = $result->fetch_assoc()) {
    $monthName = $row['month_name'];
    $amount = $row['amount'];
    $monthlySalesData[$monthName][$amount] = [
        'total_sold_item' => (int)$row['total_sold_item'],
        'total_sold_custom_item' => (int)$row['total_sold_custom_item'],
        'total_remain_item' => (int)$row['total_remain_item'],
        'total_sold_price' => (float)$row['total_sold_price'],
        'total_sold_custom_price' => (float)$row['total_sold_custom_price']
    ];
}

// Convert the array to JSON format
echo json_encode($monthlySalesData);

// Close the statement and database connection
$stmt->close();
$con->close();
?>
