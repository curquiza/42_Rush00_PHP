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
    echo "Welcome back ".$_POST['login']." !\n";
    echo '<html><body><br /><a href="index.php">Let\'s go shopping !</a></body></html>';
}
else
{
    $_SESSION['logged_on_user'] = "";
    echo "Sorry, we were enable to log you in...\n";
    echo '<html><body><br /><a href="index.php">Back to the main page</a></body></html>';
}
print_r($_SESSION);
?>