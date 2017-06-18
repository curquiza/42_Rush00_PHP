<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
  		<?php include("header.php"); ?>
    	<H2>Account</H2> <br/>

		<?php
		$file = file_get_contents("private/passwd");
		$tab = unserialize($file);
		?>
			<form class="form-admin" action="account_action.php" method="POST">
				Login: <?php echo $_SESSION['logged_on_user']; ?> <br />
				<input type="hidden" name="login" value="<?php echo $_SESSION['logged_on_user']; ?>">
				New login: <input type="text" name="newlogin" value="">
				<input type="submit" name="submit" value="Change">
				<input type="submit" name="submit" value="Remove">
			</form> <br />
		<br />
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
