<?php
session_start();

include('manage_cart.php');

$cart = $_SESSION['cart'];

$cart = ft_fill_cart($cart, array("id" => $_POST['id'], "quantity" => $_POST['quantity']));

$_SESSION['cart'] = $cart;

if ($_SESSION['logged_on_user'] != "")
{
    $file = file_get_contents("private/passwd");
    $user = unserialize($file);
    foreach($user as &$elem)
    {
        if ($elem['login'] === $_SESSION['logged_on_user'])
            $elem['cart'] = ft_fill_cart($elem['cart'], array("id" => $_POST['id'], "quantity" => $_POST['quantity']));
    }
    $data = serialize($user);
    file_put_contents("private/passwd", $data."\n");
}

header('Location: all_products.php'); 
?>