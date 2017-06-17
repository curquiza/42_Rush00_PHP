<div class="titre-site">
    <a href="index.php">
        <img id="logo-accueil" src="http://img11.hostingpics.net/pics/498265CanterlotCastleRainbowDash3.png" alt="logo-accueil"><img/>
    </a>
    <h1> PoneyLand : buy your poney online !</h1> <br/>
</div>
<?php
if ($_SESSION['logged_on_user'] == NULL)
{
?>
<a href="sign_in.php" > SIGN IN </a> <br />
<a href="sign_up.php" > SIGN UP </a> <br />
<div><a href="#" class="btn btn-info btn-lg"><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</a><span class="glyphicon">&#xe116;</span></div>
<?php
}
else
{
    ?>
    <p> User: <?php echo " ".$_SESSION['logged_on_user'];?> </p>
    <a href="sign_out.php" > SIGN OUT </a> <br />
    <?php
}
?>
<br />
<div style="display: flex; justify-content: center">
    <a class="category2" href="all_products.php">All</a> 
    <?php
    include("handler_csv.php");
    $data = ft_getcsv("bdd/category.csv");
    foreach($data as $elem)
    {
        ?><a class="category" href="all_products.php?category=<?php echo $elem[0] ?>"><?php echo $elem[0] ?></a><?php
    }
        
?>
<!--
//    <a class="category" href="horse.php">Horses</a>
//    <a class="category" href="poney.php">Poneys</a>
//    <a class="category" href="foal.php">Foals</a>
//    <a class="category" href="legendary.php">Legendary</a>
-->
</div>
<br />
<hr  />
<br />