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
            foreach($_SESSION['cart'] as $elem)
            {
                print_r($elem);
                echo "<br />";  
            }
        ?>
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>