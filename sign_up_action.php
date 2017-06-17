<?php
session_start();

function    ft_check_login($list, $new_login)
{
    foreach($list as $elem)
    {
        if ($elem['login'] === $new_login)
            return (FALSE);
    }
    return (TRUE);
}

    if ($_POST['submit'] === "OK" && $_POST['login'] != NULL && $_POST['passwd'] != NULL)
    {
        if (file_exists("private/passwd") === FALSE)
        {
            if (file_exists("private") === FALSE)
                mkdir("private");
            // transvaser le panier en cours ! Et le merger au besoin avec le panier deja rempli !
            $user = array(array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']), "cart" => NULL, "role" => 0));
            $data = serialize($user);
            file_put_contents("private/passwd", $data."\n");
            $_SESSION['logged_on_user'] = $_POST['login'];
            header("Location: index.php");
        }
        else
        {
            $list = unserialize(file_get_contents("private/passwd"));
            if (ft_check_login($list, $_POST['login']) === TRUE)
            {
                // transvaser le panier en cours ! Et le merger au besoin avec le panier deja rempli !
                $new_user = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']), "cart" => NULL, "role" => 0);
                $list[] = $new_user;
                $data = serialize($list);
                file_put_contents("private/passwd", $data."\n");
                $_SESSION['logged_on_user'] = $_POST['login'];
                header("Location: index.php");
            }
            else
            {
                include("sign_up_error.php");
            }
                
        }
    }
    else
        include("sign_up_error.php");
//print_r($_SESSION);
?>
        
        