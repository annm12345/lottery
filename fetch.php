<?php
// Include your database connection file here
include('connection.php');

// Check if amount and date parameters are set
if(isset($_GET['amount']) && isset($_GET['date'])) {
    $amount = $_GET['amount'];
    $date = $_GET['date'];
    if($amount!=='' && $date!==''){
         // Perform SQL query to fetch data based on amount and date
        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `date`='$date' AND `amount`='$amount' AND `sell`!='true'");
        $data = array();

        // Fetch data and store in an array
        while ($row = mysqli_fetch_assoc($res)) {
            $list_id = $row['id'];
            $lot_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id' "));
            $lot_simple_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id'"));

            // Append data to result array
            $data[] = array(
                'type' => $row['type'],
                'alpha' => $lot_row['alpha'],
                'num1' => $lot_row['num1'],
                'num2' => $lot_row['num2'],
                'num3' => $lot_row['num3'],
                'num4' => $lot_row['num4'],
                'num5' => $lot_row['num5'],
                'num6' => $lot_row['num6']
            );
        }

    }else{
        // Perform SQL query to fetch data based on amount and date
        $res = mysqli_query($con, "SELECT * FROM `list` WHERE `amount`='$amount' AND `date`='$date' AND `sell`!='true'");
        $data = array();

        // Fetch data and store in an array
        while ($row = mysqli_fetch_assoc($res)) {
            $list_id = $row['id'];
            $lot_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id'"));
            $lot_simple_row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `lottery` WHERE `list_id`='$list_id'"));

            // Append data to result array
            $data[] = array(
                'type' => $row['type'],
                'alpha' => $lot_row['alpha'],
                'num1' => $lot_row['num1'],
                'num2' => $lot_row['num2'],
                'num3' => $lot_row['num3'],
                'num4' => $lot_row['num4'],
                'num5' => $lot_row['num5'],
                'num6' => $lot_row['num6']
            );
        }

    }

    

    // Return JSON response
    echo json_encode($data);
}
    

?>
