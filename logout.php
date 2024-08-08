<?php
    require('connection.php');
    unset($_SESSION['LOT_USER_LOGIN']);
    unset($_SESSION['LOT_USER_PHONE']);
    unset($_SESSION['LOT_USER_ID']);
    header('location:login/login.php');
    die();
?>

                  