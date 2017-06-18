<?php
function    ft_fill_cart($current, $to_add)
{
    if ($current == NULL)
        return(array($to_add));
    $new = 1;
    foreach($current as &$elem)
    {
        if ($elem['id'] === $to_add['id'])
        {
            $elem['quantity'] = $elem['quantity'] + $to_add['quantity'];
            $new = 0;
            $to_add = NULL;
        }
    }
    if ($new === 1)
        $current[] = array("id" => $_POST['id'], "quantity" => $_POST['quantity']);
    return ($current);
}

function    ft_display_cart($elem)
{
    $data = ft_getcsv("bdd/product.csv");
    $product = NULL;
    foreach($data as $line)
    {
        if ($line[0] == $elem['id'])
        {
            $product = $line;
            break ;
        }
    }
    ?>
        <TR align=center>
            <TD><img style="height:70px" src="<?php echo $product[6] ?>"/></TD>
            <TD><?php echo $product[1]?></TD>
            <TD><?php echo $product[2]?></TD>
            <TD><?php echo $elem['quantity']?></TD>
            <TD><?php echo intval($elem['quantity']) * intval($product[4])?> $</TD>
        </TR>
    <?php
    return (intval($elem['quantity']) * intval($product[4]));    
}
?>