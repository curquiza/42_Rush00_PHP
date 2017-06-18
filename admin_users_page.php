<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
  		<?php include("header.php"); ?>
    	<H2> Admin - Users </H2> <br/>

		<?php
		$file = file_get_contents("private/passwd");
		$tab = unserialize($file);
		foreach($tab as $elem)
		{
			?>
			<form class="form-admin" action="admin_users_action.php" method="POST">
				Login: <input type="text" name="login" value="<?php echo $elem['login']; ?>">
				Admin: <input type="text" name="role" value="<?php if ($elem['role'] == 1) echo 'Yes'; else 'No';?>">
				<input type="submit" name="submit" value="Change">
				<input type="submit" name="submit" value="Remove">
				<input type="submit" name="submit" value="Add">
			</form>

			<?php
		}
		if ($_SESSION['flag_users_remove'] == -1)
		{
			?> <p>Impossible to remove : this account does not exist </p> <?php
		}
		else if ($_SESSION['flag_users_remove'] == -2)
		{
			?> <p>Impossible to remove your own account </p> <?php
		}
		else if ($_SESSION['flag_users_remove'] == -3)
		{
			?> <p>Impossible to remove the "admin" account </p> <?php
		}
		?>
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
