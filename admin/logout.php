<?php
    require('connection.php');
    require('function.php');
    unset($_SESSION['LOT_ADMIN_LOGIN']);
    unset($_SESSION['LOT_ADMIN_PHONE']);
    unset($_SESSION['LOT_ADMIN_ID']);
    header('location:login.php');
    die();
?>

                  