<?php
session_start();

$cart = $_SESSION['cart'];
$cart[] = array("id" => $_POST['id'], "quantity" => $_POST['quantity']);
$_SESSION['cart'] = $cart;

header('Location: all_products.php'); 
?>