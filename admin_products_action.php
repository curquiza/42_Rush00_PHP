<?
session_start();
include("handler_csv.php");
function ft_get_index($id, $tab)
{
	$i = 0;
	foreach($tab as $elem)
	{
		if ($elem[0] == $id)
			return ($i);
		$i++;
	}
	return (-1);
}

function ft_check_empty_field($tab)
{
	if ($tab['id'] == NULL || $tab['name'] == NULL || $tab['price'] == NULL
		|| $tab['stock'] == NULL || $tab['cat1'] == NULL)
		return (-1);
	return (0);
}

function ft_check_cat($cat1, $cat2)
{
	$tab = ft_getcsv("bdd/category.csv");
	$i = 0;
	foreach ($tab as $elem)
	{
		if ($elem['0'] == $cat1)
			$i++;
	}
	if ($cat2 != NULL)
	{
		$j = 0;
		foreach ($tab as $elem)
		{
			if ($elem['0'] == $cat2)
				$j++;
		}
	}
	else
		$j = 1;
	if ($i == 0 || $j == 0)
		return (-1);
	return (0);
}

$tab = ft_getcsv("bdd/product.csv");

$_SESSION['flag_prod_remove'] = 0;
$_SESSION['flag_prod_add'] = 0;
$_SESSION['flag_prod_change'] = 0;

/* REMOVED */
if ($_POST['submit'] == "Remove")
{
	if (count($tab) <= 1) //s'il ne reste qu'un seul product
		$_SESSION['flag_prod_remove'] = -1;
	else
	{
		$index = ft_get_index($_POST['id'], $tab);
		unset($tab[$index]);
		$tab = array_values($tab);
		ft_putcsv2($tab, "bdd/product.csv");
		$_SESSION['flag_prod_remove'] = 1;
	}
}

/* ADDED */
else if ($_POST['submit'] == "Add")
{
	if (ft_check_empty_field($_POST) == -1) // tous ne sont pas remplis
		$_SESSION['flag_prod_add'] = -1;
	else if (ft_get_index($_POST['id'], $tab) != -1) // l'id existe deja
		$_SESSION['flag_prod_add'] = -2;
	else if (ft_check_cat($_POST['cat1'], $_POST['cat2']) == -1) //une des deux categories n'existe pas
		$_SESSION['flag_prod_add'] = -3;
	else // tout est ok
	{
		$tab[] = array($_POST['id'], $_POST['cat1'].",".$_POST['cat2'], $_POST['name'], "bay", $_POST['price'], $_POST['stock'], "");
		ft_putcsv2($tab, "bdd/product.csv");
		$_SESSION['flag_prod_add'] = 1;
	}
}

header("Location: admin_products_page.php");


?>
