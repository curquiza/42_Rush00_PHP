<?php
function    ft_getcsv()
{
    $fd = fopen("bdd/product.csv", "r");
    while (($line = fgetcsv($fd, "r")) !== FALSE)
        $data[] = $line;
    fclose($fd);
    return ($data);
}
?>