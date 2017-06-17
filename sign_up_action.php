<?php
session_start();
?>

<html>
    <head>
      <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H1>Sign Up</H1> <br />
<!--
    <form action="sign_up_action.php" method="POST">
        Choose a login: <input type="text" name="login" value="">
        <br/ >
        Create a password: <input type="password" name="passwd" value="">
        <br/ >
        <input type="submit" name="submit" value="OK">
    </form> <br />
-->
    

<?php
function    ft_check_login($list, $new_login)
{
    foreach($list as $elem)
    {
        if ($elem['login'] === $new_login)
            return (FALSE);
    }
    return (TRUE);
}

    if ($_POST['submit'] === "OK" && $_POST['login'] !== NULL && $_POST['passwd'] !== NULL)
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
            echo "Welcome ".$_POST['login']." !\n";
            echo '<html><body><br /><a href="index.php">Let\'s go shopping !</a></body></html>';
        }
        else
        {
            $list = unserialize(file_get_contents("private/passwd"));
            if (ft_check_login($list, $_POST['login']) === TRUE)
            {
                // transvaser le panier en cours ! Et le merger au besoin avec le panier deja rempli !
                $new_user = array("login" => $_POST['login'], "passwd" => hash("whirlpool", $_POST['passwd']), "cart" => NULL, "role" => 0);
                $list[] = $new_user;
                //print_r($list);
                $data = serialize($list);
                file_put_contents("private/passwd", $data."\n");
                $_SESSION['logged_on_user'] = $_POST['login'];
                echo "Welcome ".$_POST['login']." !\n"; // rediriger vers l'accueil
                echo '<html><body><br /><a href="index.php">Let\'s go shopping !</a></body></html>';
            }
            else
            {
                ?>
                <p> Enable to create your account... Please, Try again ! <p/> <br />
                <form action="sign_up_action.php" method="POST">
                    Choose a login: <input type="text" name="login" value="">
                    <br/ >
                    Create a password: <input type="password" name="passwd" value="">
                    <br/ >
                    <input type="submit" name="submit" value="OK">
                </form> <br />
            <?php
            }
                
        }
    }
    else
        echo "Enable to create your account... Please, Try again !\n";
//print_r($_SESSION);
?>
        
        <?php include("footer.php"); ?>
    </body>
</html>