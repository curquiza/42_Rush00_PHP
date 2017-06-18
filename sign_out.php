<?php
session_start();
$_SESSION['logged_on_user'] = "";
if ($_SESSION['cart'] != NULL)
    $_SESSION['cart'] = "";
header('Location: index.php');     
?>