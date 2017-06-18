<?php
session_start();

if ($_SESSION['cart'] == "")
    header("Location: cart.php");

else if ($_POST['submit'] == "Buy now !" && $_SESSION['logged_on_user'] == "")
    header("Location: sign_in.php");
    
if ($_POST['submit'] == "Buy now !" && $_SESSION['logged_on_user'] != "" && $_SESSION['cart'] != "") // exclure panier vide
{
    $order = array('login' => $_SESSION['logged_on_user'], 'cart' => $_SESSION['cart'], 'total' => $_POST['total']);
    $content = serialize($order);
    file_put_contents("bdd/order", $content."\n", FILE_APPEND);
    
    // VIDER LE PANIER
    $file = file_get_contents("private/passwd");
    $user = unserialize($file);
    foreach($user as &$elem)
    {
        if ($elem['login'] === $_SESSION['logged_on_user'])
        {
            $elem['cart'] = NULL;  
            $_SESSION['cart'] = NULL;
        }
    } 
    $_SESSION['total'] = 0;
    $user = serialize($user);
    file_put_contents("private/passwd", $user."\n");
    
    header("Location: index.php");
    
}

if ($_POST['submit'] == "Remove all..." && $_SESSION['cart'] != "")
{
    if ($_SESSION['logged_on_user'] != "")
    {
        $file = file_get_contents("private/passwd");
        $user = unserialize($file);
        foreach($user as &$elem)
        {
            if ($elem['login'] === $_SESSION['logged_on_user'])
            {
                $elem['cart'] = NULL;  
                $_SESSION['cart'] = NULL;
            }
        } 
        $_SESSION['total'] = 0;
        $user = serialize($user);
        file_put_contents("private/passwd", $user."\n");
    }
    else
    {
        $_SESSION['total'] = 0;
        $_SESSION['cart'] = NULL;
    }
    header("Location: cart.php");
}

//header("Location: cart.php");

    
?>