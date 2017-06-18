<?php
session_start();

function ft_get_cat1($str)
{
	$tab = explode(',', $str);
	return ($tab[0]);
}

function ft_get_cat2($str)
{
	$tab = explode(',', $str);
	return ($tab[1]);
}

?>
<html>
    <head>
        <?php include("settings.php"); ?>
    </head>
    <body>
  		<?php include("header.php"); ?>
    	<H2> Admin - Categories </H2> <br/>

		<?php
		$tab = ft_getcsv("bdd/product.csv");
		foreach($tab as $elem)
		{
			?>
			<form class="form-admin" action="admin_products_action.php" method="POST">
				ID: <?php echo $elem[0]; ?> <br \> <input type="hidden" name="id" value="<?php echo $elem[0]; ?>">
				Name: <input type="text" name="name" value="<?php echo $elem[2]; ?>">
				$: <input type="text" name="price" value="<?php echo $elem[4]; ?>">
				stock: <input type="text" name="stock" value="<?php echo $elem[5]; ?>">
				Cat1: <input type="text" name="cat1" value="<?php echo ft_get_cat1($elem[1]); ?>">
				Cat2: <input type="text" name="cat2" value="<?php echo ft_get_cat2($elem[1]); ?>">
				<input type="submit" name="submit" value="Change">
				<input type="submit" name="submit" value="Remove">
			</form> <br />
			<?php
		}
		?>
		<br />
		<form class="form-admin" action="admin_products_action.php" method="POST">
			ID: <input type="text" name="id" value="">
			Name: <input type="text" name="name" value="">
			$: <input type="text" name="price" value="">
			stock: <input type="text" name="stock" value="">
			Cat1: <input type="text" name="cat1" value="">
			Cat2: <input type="text" name="cat2" value="">
			<input type="submit" name="submit" value="Add">
		</form>
		<?php

		/* Erreurs pour le removed */
		if ($_SESSION['flag_prod_remove'] == -1)
		{
			?> <br /> <p>Impossible to remove : you must have at least one product</p> <?php
		}
		else if ($_SESSION['flag_prod_remove'] == 1)
		{
			?> <br /> <p>Successfully removed</p> <?php
		}

		/* Erreurs pour le add */
		if ($_SESSION['flag_prod_add'] == -1)
		{
			?> <br /> <p>Impossible to add : you must fill all the fields ("Cat2" is in option)</p> <?php
		}
		if ($_SESSION['flag_prod_add'] == -2)
		{
			?> <br /> <p>Impossible to add : this ID already exists</p> <?php
		}
		if ($_SESSION['flag_prod_add'] == -3)
		{
			?> <br /> <p>Impossible to add : one of the two categories does not exist</p> <?php
		}
		else if ($_SESSION['flag_prod_add'] == 1)
		{
			?> <br /> <p>Successfully added</p> <?php
		}

		/*Erreurs pour le change */
		if ($_SESSION['flag_prod_change'] == -1)
		{
			?> <br /> <p>Impossible to modify : you must fill all the fields (except "Cat2")</p> <?php
		}
		if ($_SESSION['flag_prod_change'] == -2)
		{
			?> <br /> <p>Impossible to modify : one of the two categories does not exist</p> <?php
		}
		else if ($_SESSION['flag_prod_change'] == 1)
		{
			?> <br /> <p>Successfully modified</p> <?php
		}

		/* Re-initialisation des flags */
		$_SESSION['flag_prod_remove'] = 0;
		$_SESSION['flag_prod_add'] = 0;
		$_SESSION['flag_prod_change'] = 0;
		?>
		<br />
    	<?php include("footer.php"); ?>
	</body>
</html>
