<?php
function    ft_getcsv($path)
{
    $fd = fopen($path, "r");
    while (($line = fgetcsv($fd, "r")) !== FALSE)
        $data[] = $line;
    fclose($fd);
    return ($data);
}

function    ft_putcsv($data)
{
    $fd = fopen("bdd/product.csv", "w");
    foreach($data as $elem)
        fputcsv($fd, $elem);
    fclose($fd);
}

////function    ft_getcategory()
////{
//    $fd = fopen("bdd/category.csv", "r");
//    while (($line = fgetcsv($fd, "r")) !== FALSE)
//        $data[] = $line;
//    fclose($fd);
//    return ($data);
////}

?>