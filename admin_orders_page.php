<?php
session_start();
?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
  		<?php include("header.php"); ?>
    	<H2> Admin - Categories </H2> <br/>

		<?php
		$tab = ft_getcsv("bdd/category.csv");
		foreach($tab as $elem)
		{
			?>
			<form class="form-admin" action="admin_categories_action.php" method="POST">
				Category: <?php echo $elem[0]; ?> 
				<input type="hidden" name="category" value="<?php echo $elem[0]; ?>">
				<input type="submit" name="submit" value="Remove">
			</form> <br />
			<?php
		}
		?>
		<br />
		<form class="form-admin" action="admin_categories_action.php" method="POST">
			Category: <input type="text" name="category" value="">
			<input type="submit" name="submit" value="Add">
		</form>
		<?php

		/* Erreurs pour le removed */
		if ($_SESSION['flag_cat_remove'] == -1)
		{
			?> <br /> <p>Impossible to remove this category </p> <?php
		}
		else if ($_SESSION['flag_cat_remove'] == -2)
		{
			?> <br /> <p> You must have at least one category </p> <?php
		}
		else if ($_SESSION['flag_cat_remove'] == 1)
		{
			?> <br /> <p> Successfuly removed </p> <?php
		}

		/* Erreurs pour le add */
		if ($_SESSION['flag_cat_add'] == -1)
		{
			?> <br /> <p>Impossible to add this category </p> <?php
		}
		else if ($_SESSION['flag_cat_add'] == 1)
		{
			?> <br /> <p> Successfuly added </p> <?php
		}

		/*Erreurs pour le change */
		/* à faire */

		/* Re-initialisation des flags */
		$_SESSION['flag_cat_remove'] = 0;
		$_SESSION['flag_cat_add'] = 0;
		?>
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
