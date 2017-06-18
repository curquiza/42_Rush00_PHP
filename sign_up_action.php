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

    if ($_POST['submit'] === "OK" && $_POST['login'] != NULL && $_POST['passwd'] != NULL || $_POST['login'] == 'admin')
    {
        if (file_exists("private/passwd") === FALSE)
        {
            if (file_exists("private") === FALSE)
                mkdir("private");
            // MERGE DU PANIER
            if ($_SESSION['cart'] != NULL)
                $cur_cart = $_SESSION['cart'];
            else
                $cur_cart = NULL;            
            $user = array(array("login" => $_POST['login'], "passwd" => hash("sha512", $_POST['passwd']), "cart" => $cur_cart, "role" => 0));
            $data = serialize($user);
            file_put_contents("private/passwd", $data."\n");
            $_SESSION['logged_on_user'] = $_POST['login'];
//            $_SESSION['cart'] = array("");
            header("Location: index.php");
        }
        else
        {
            $list = unserialize(file_get_contents("private/passwd"));
            if (ft_check_login($list, $_POST['login']) === TRUE)
            {
                // MERGE DU PANIER
                if ($_SESSION['cart'] != NULL)
                    $cur_cart = $_SESSION['cart'];
                else
                    $cur_cart = NULL;
                $new_user = array("login" => $_POST['login'], "passwd" => hash("sha512", $_POST['passwd']), "cart" => $cur_cart, "role" => 0);
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
        
        
