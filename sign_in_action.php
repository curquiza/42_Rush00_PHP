<?php

session_start();
       
function ft_auth($login, $passwd)
{
    if ($login === NULL || $passwd === NULL || file_exists("private/passwd") === FALSE)
        return (FALSE);
    $list = unserialize(file_get_contents("private/passwd"));
    foreach($list as $elem)
    {
        if ($elem['login'] === $login && $elem['passwd'] === hash("whirlpool", $passwd))
            return (TRUE);
    }
    return (FALSE);
}

if (ft_auth($_POST['login'], $_POST['passwd']) === TRUE)
{
    $_SESSION['logged_on_user'] = $_POST['login'];
    header("Location: index.php");
}
else
{
    $_SESSION['logged_on_user'] = "";
    include("sign_in_error.php");
}
?>
    
