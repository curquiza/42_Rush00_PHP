<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2>Poneys</H2>
        <div style="display:flex">
        <?php
        $fd = fopen("bdd/horses.csv", "r");
        while (($line = fgetcsv($fd, "r")) !== FALSE)
            $data[] = $line;
//        print_r($data);
        foreach($data as $elem)
        {
            if (strstr($elem[1], "Poney") !== FALSE)
            {
                echo '<div>'.$elem[2].'<br /><img src="'.$elem[6].'"/></div>';
            }
        }
        ?>
        </div>
    <?php include("footer.php"); ?>
    </body>
</html>