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
            
            echo "version SESSION<br />";
            if ($_SESSION['cart'] != NULL) // PANIER VERSION SESSION
            {
                foreach($_SESSION['cart'] as $elem)
                {
                    print_r($elem);
                    echo "<br />";  
                }
            }
            
            $file = file_get_contents("private/passwd"); // PANIER DS LA BDD USER
            $user = unserialize($file);
            foreach($user as $elem)
            {
                if ($elem['login'] === $_SESSION['logged_on_user'])
                {
                    echo "version USER<br />";
                    if ($elem['cart'] != NULL)
                    {
                        foreach($elem['cart'] as $elem)
                        {
                            print_r($elem);
                            echo "<br />";  
                        }                       
                    }

                }
            }
            
        ?>
        </div></div>
<!--
        <form align=center action="remove_from_cart.php" method="post">
            <input type="button" name="submit" value="Remove all">
        </form>
-->
    <?php include("footer.php"); ?>
    </body>
</html>