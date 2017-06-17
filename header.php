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
    <a class="category" href="horse.php">Horses</a>
    <a class="category" href="poney.php">Poneys</a>
    <a class="category" href="foal.php">Foals</a>
    <a class="category" href="legendary.php">Legendary</a>
</div>
<br />
<hr  />
<br />