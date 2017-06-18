<?php
session_start();

function    ft_fill_cart($current, $to_add)
{
    if ($current == NULL)
        return(array($to_add));
    $new = 1;
    foreach($current as &$elem)
    {
        if ($elem['id'] === $to_add['id'])
        {
            $elem['quantity'] = $elem['quantity'] + $to_add['quantity'];
            $new = 0;
            $to_add = NULL;
        }
    }
    if ($new === 1)
        $current[] = array("id" => $_POST['id'], "quantity" => $_POST['quantity']);
    return ($current);
}

$cart = $_SESSION['cart'];

$cart = ft_fill_cart($cart, array("id" => $_POST['id'], "quantity" => $_POST['quantity']));
//$cart[] = array("id" => $_POST['id'], "quantity" => $_POST['quantity']);

$_SESSION['cart'] = $cart;

if ($_SESSION['logged_on_user'] != "")
{
    $file = file_get_contents("private/passwd");
    $user = unserialize($file);
    foreach($user as &$elem)
    {
        if ($elem['login'] === $_SESSION['logged_on_user'])
            $elem['cart'] = ft_fill_cart($elem['cart'], array("id" => $_POST['id'], "quantity" => $_POST['quantity']));
//            $elem['cart'][] = array("id" => $_POST['id'], "quantity" => $_POST['quantity']);
    }
    $data = serialize($user);
    file_put_contents("private/passwd", $data."\n");
}

header('Location: all_products.php'); 
?>