<h1> PoneyLand : buy your poney online !</h1> <br/>  
<?php
if ($_SESSION['logged_on_user'] == NULL)
{
?>
<a href="sign_in.php" > SIGN IN </a> <br />
<a href="sign_up.html" > SIGN UP </a> <br />
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
<hr color=grey size=2% />
<br />

