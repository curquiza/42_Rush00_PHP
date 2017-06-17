<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
    <?php include("header.php"); ?>
    <H2><?php
        if ($_GET != NULL)
            echo $_GET['category'];
        else
            echo "All";
        ?></H2>
        <div align=center><div class="product">
        <?php
            $data = ft_getcsv("bdd/product.csv");
            if ($_GET != NULL)
                $filter = $_GET['category'];
            foreach($data as $elem)
            {
                if (ft_filter($elem[1], $filter) === TRUE) : ?>
                    <div class="horse"><div align=center>
                        <p><?php echo $elem[2] ?></p>
                        <div style="font-style:italic"><?php echo $elem[1] ?></div>
                        <div>
                            <?php   
                    if ($elem[5] == 0)
                {
                    echo '<p style="background-color:darkmagenta;color:white">SOLD OUT !</p>';
                    $filigrane = 'style="opacity:0.2";';
                }
                    else
                {
                    echo "<br />";
                    $filigrane = ""; 
                } ?>
                            <img <?php echo $filigrane ?> src="<?php echo $elem[6] ?>"/></div><br />
                        <div><?php echo $elem[4] ?></div>  
                        <form action="add_to_cart.php" method="POST">
                            
                            <select><input<?php 
                    for ($i=0; $i <= $elem[5]; $i++)
                        echo "<option value =".$i.">".$i."</option>"; ?>></select>
                                
<!--                                <input type="number" name="quant" min="1" max="<?php echo $elem[5] ?>" step="1" value="0">-->
                            <input type="hidden" name="id" name="<?php echo $elem[0] ?>">
                            <input class="button_buy" type="submit" name="<?php echo $elem[0] ?>" value="I want it !">
                        </form><br /></div>
                    </div>
                 <?php endif;
            }
        ?>
        </div></div>
    <?php include("footer.php"); ?>
    </body>
</html>

<?php
function    ft_filter($elem, $filter)
{
    if ($filter == NULL)
        return(TRUE);
    else
    {
        if (strstr($elem, $filter) !== FALSE)
            return (TRUE);
    }
    return (FALSE);
}
?>