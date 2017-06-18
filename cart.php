<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
        <?php include("manage_cart.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2>My cart</H2>
        <div align=center><div class="product">
        <?php
            if ($_SESSION['logged_on_user'] != "")
            {
                $file = file_get_contents("private/passwd"); // PANIER DS LA BDD USER
                $user = unserialize($file);
                foreach($user as $elem)
                {
                    if ($elem['login'] === $_SESSION['logged_on_user'] && $elem['cart'] != NULL)
                        ft_display_cart($elem['cart']);  

                }
            }
            else
            {
                if ($_SESSION['cart'] != NULL)
                    ft_display_cart($_SESSION['cart']);
            }
        ?>
        <H2>TOTAL = <?php echo $_SESSION['total'] ?> $</H2>
        
        <form action="action_cart.php" method="POST">
            <input type="submit" name="submit" value="Remove all...">
            <input type="submit" name="submit" value="Buy now !">
            <input type="hidden" name="total" value="<?php echo $_SESSION['total'] ?>">
        </form>
            
    </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>