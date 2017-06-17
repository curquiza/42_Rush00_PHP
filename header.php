<h1> Coco.com : achète ton poney en ligne !</h1>
    
<?php
if ($_SESSION['logged_on_user'] == NULL)
{
?>
<a href="sign_in.html" > SIGN IN </a> <br />
<a href="sign_up.html" > SIGN UP </a> <br />
<?php
}
else
{
    ?>
    <p> Bonjour <?php echo $_SESSION['logged_on_user'];?> </p>
    <a href="sign_out.html" > SIGN OUT </a> <br />
    <?php
}
?>
<br />
<hr color=grey size=2% />
<br />

