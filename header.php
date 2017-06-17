<h1> PoneyLand : buy your poney online !</h1> <br/>  
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
    <p> Bonjour <?php echo $_SESSION['logged_on_user'];?> </p>
    <a href="sign_out.php" > SIGN OUT </a> <br />
    <?php
}
?>
<br />
<div>
    <a class="category" href="horse.php">Horses</a>
    <a class="category" href="poney.php">Poneys</a>
    <a class="category" href="foal.php">Foals</a>
    <a class="category" href="legendary.php">Legendary</a>
</div>
<br />
<hr color=grey size=2% />
<br />