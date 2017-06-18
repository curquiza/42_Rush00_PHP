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
                echo "USER<BR/>";
                print_r($_SESSION['cart']); 
            }
            else
            {
                echo "PAS DE USER";
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