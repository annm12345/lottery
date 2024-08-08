<?php
require('connection.php');
date_default_timezone_set('Asia/Yangon');
$added_on = date('F Y'); 
mysqli_query($con, "UPDATE `lottery` SET `date`='$added_on' WHERE `list_id` > 21");

?>