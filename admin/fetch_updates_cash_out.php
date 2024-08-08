<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

require('connection.php');

$res = mysqli_query($con, "SELECT * FROM `cashin` ORDER BY `id` DESC");
while ($row = mysqli_fetch_assoc($res)) {
    $uid = $row['uid'];
    $u_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `user` WHERE `id`='$uid'"));

    // Construct the data to be sent as an SSE event
    $data = [
        'name' => $u_row['name'],
        'amount' => $row['amount'] . ' KS',
        'payment' => $row['payment'],
        'tax_id' => $row['tax_id'],
        'date' => $row['date'],
        'time' => $row['time'],
        'comfirm' => $row['comfirm']
    ];

    // Send the data as an SSE event
    echo "data: " . json_encode($data) . "\n\n";

    // Flush the output buffer to ensure data is sent immediately
    ob_flush();
    flush();
}

// Close the connection
mysqli_close($con);
?>
