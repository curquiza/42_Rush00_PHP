<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2>My cart</H2>
        <div align=center><div class="product">
        <?php
            if ($_SESSION['logged_on_user'] != "")
            {
                print_r($_SESSION['cart']);
                echo "USER<BR/>";
                $file = file_get_contents("private/passwd"); // PANIER DS LA BDD USER
                $user = unserialize($file);
                foreach($user as $elem)
                {
                    if ($elem['login'] === $_SESSION['logged_on_user'] && $elem['cart'] != NULL)
                        print_r($elem['cart']);
                }
            }
            else
            {
                echo "PAS DE USER<BR/>";
                if ($_SESSION['cart'] != NULL)
                    print_r($_SESSION['cart']);
            }

        ?>
        <form action="#" method="post">
            <input type="button" name="submit" value="Remove all...">
            <input type="button" name="submit" value="Buy now !">
            
        </form>
    </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>