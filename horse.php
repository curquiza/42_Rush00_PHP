<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2>Horses</H2>
        <div align=center><div class="product">
        <?php
        $fd = fopen("bdd/horses.csv", "r");
        while (($line = fgetcsv($fd, "r")) !== FALSE)
            $data[] = $line;
        foreach($data as $elem)
        {
            if (strstr($elem[1], "Horse") !== FALSE) : ?>
                <div class="horse"><div align=center>
                    <p><?php echo $elem[2] ?></p>
                    <div style="font-style:italic"><?php echo $elem[1] ?></div>
                    <div><br /><img src="<?php echo $elem[6] ?>"/></div><br />
                    <div><?php echo $elem[4] ?> $</div>
                    <form action="add_to_cart.php" method="POST">
                        <input class="button_buy" type="button" name="<?php echo $elem[0] ?>" value="I want one !">
                    </form><br /></div>
                </div>
            <?php endif;
        }
        ?>
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>