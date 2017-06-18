<?php

session_start();
       
function ft_auth($login, $passwd)
{
    if ($login == NULL || $passwd == NULL || file_exists("private/passwd") === FALSE)
        return (FALSE);
    $list = unserialize(file_get_contents("private/passwd"));
    foreach($list as $elem)
    {
        if ($elem['login'] === $login && $elem['passwd'] === hash("sha512", $passwd))
            return (TRUE);
    }
    return (FALSE);
}

if (ft_auth($_POST['login'], $_POST['passwd']) === TRUE)
{
    $_SESSION['logged_on_user'] = $_POST['login'];

    if ($_SESSION['cart'] != NULL)// MERGE DES PANIERS
    {
        $file = file_get_contents("private/passwd");
        $user = unserialize($file);
        foreach($user as &$elem)
        {
            if ($elem['login'] === $_SESSION['logged_on_user'])
            {
                foreach($_SESSION['cart'] as $cart)
                    $elem['cart'][] = $cart;
            }
        }
        $data = serialize($user);
        file_put_contents("private/passwd", $data."\n");
    }
    
    header("Location: index.php");
}
else
{
    $_SESSION['logged_on_user'] = "";
    include("sign_in_error.php");
}
?>
    
