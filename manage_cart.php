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

function    ft_display_cart($full_cart) // ne marche pas
{
    $_SESSION['total'] = 0;
    ?><TABLE><TR align=center>
                <TH>Picture</TH>
                <TH>Category</TH>
                <TH>Breed</TH>
                <TH>Quantity</TH>
                <TH>Price</TH>
            </TR><?php
    foreach ($full_cart as $line)
    {
        $product = NULL;
        $data = ft_getcsv("bdd/product.csv");
        foreach($data as $search)
        {
            if ($search[0] == $line['id'])
            {
                $product = $search;
                break ;
            }
        }
        if ($product != NULL)
        {
            ?><TR align=center>
                <TD><img style="height:70px" src="<?php echo $product[6] ?>"/></TD>
                <TD><?php echo $product[1]?></TD>
                <TD><?php echo $product[2]?></TD>
                <TD><?php echo $line['quantity']?></TD>
                <TD><?php $_SESSION['total'] = $_SESSION['total'] + intval($line['quantity']) * intval($product[4]);
            echo intval($line['quantity']) * intval($product[4])?> $</TD>
            </TR><?php             
        }
    }
    ?></TABLE><?php
}
?>