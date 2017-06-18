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
				Admin: <input type="text" name="role" value="<?php if ($elem['role'] == 1) echo 'Yes'; else echo 'No';?>">
				<input type="submit" name="submit" value="Change">
				<input type="submit" name="submit" value="Remove">
			</form>
			<?php
		}
		?>
		<br />
		<form class="form-admin" action="admin_users_action.php" method="POST">
			Login: <input type="text" name="login" value="">
			Admin: <input type="text" name="role" value="">
			<input type="submit" name="submit" value="Add">
		</form>
		<?php

		/* Erreurs pour le removed */
		if ($_SESSION['flag_users_remove'] == -1)
		{
			?> <br/> <p>Impossible to remove : this account does not exist </p> <?php
		}
		else if ($_SESSION['flag_users_remove'] == -2)
		{
			?> </br> <p>Impossible to remove your own account </p> <?php
		}
		else if ($_SESSION['flag_users_remove'] == -3)
		{
			?>  <br/> <p>Impossible to remove the "admin" account </p> <?php
		}
		else if ($_SESSION['flag_users_remove'] == 1)
		{
			?> </br> <p> Successfuly removed </p> <?php
		}

		/* Erreur pour le add */
		if ($_SESSION['flag_users_add'] == -1)
		{
			?> <br/> <p>Impossible to add : this account already exists </p> <?php
		}
		else if ($_SESSION['flag_users_add'] == -2)
		{
			?> <br/> <p>Impossible to add : you must choose a valid name and a valid admin status (Yes or No)</p> <?php
		}
		else if ($_SESSION['flag_users_add'] == 1)
		{
			?> </br> <p> Successfuly added </p> <?php
		}

		/* Re-initialisation des flags */
		$_SESSION['flag_users_remove'] = 0;
		$_SESSION['flag_users_add'] = 0;
		?>
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
