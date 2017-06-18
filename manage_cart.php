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
?>