<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2>Horses</H2>
        <div align=center><div class="product">
        <?php
            include("handler_csv.php");
            $data = ft_getcsv();
            foreach($data as $elem)
            {
                if (strstr($elem[1], "Horse") !== FALSE) : ?>
                    <div class="horse"><div align=center>
                        <p><?php echo $elem[2] ?></p>
                        <div style="font-style:italic"><?php echo $elem[1] ?></div>
                        <div><br /><img src="<?php echo $elem[6] ?>"/></div><br />
                        <div><?php echo $elem[4] ?> $</div>
                        <form action="add_to_cart.php" method="POST">
                            <input type="number" name="<?php echo $elem[0] ?>" min="1" max="<?php echo $elem[5] ?>" step="1" value="0">
                            <input class="button_buy" type="submit" name="submit" value="I want it !">
                        </form><br /></div>
                    </div>
                <?php endif;
            }
        ?>
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>