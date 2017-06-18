<?
session_start();
include("handler_csv.php");
function ft_get_index($cat, $tab)
{
	$i = 0;
	foreach($tab as $elem)
	{
		if ($elem[0] == $cat)
			return ($i);
		$i++;
	}
	return (-1);
}

$tab = ft_getcsv("bdd/category.csv");

$_SESSION['flag_cat_remove'] = 0;
$_SESSION['flag_cat_add'] = 0;

/* REMOVED */
if ($_POST['submit'] == "Remove" && $_POST['category'] != NULL)
{
	if (($index = ft_get_index($_POST['category'], $tab)) != -1) //si la categorie existe bien
	{
		unset($tab[$index]);
		$tab = array_values($tab);
		ft_putcsv2($tab, "bdd/category.csv");
		//$file = serialize($tab);
		//file_put_contents("private/passwd", $file);
		$_SESSION['flag_cat_remove'] = 1;
	}
	else
		$_SESSION['flag_cat_remove'] = -1;
}

/* ADDED */
else if ($_POST['submit'] == "Add" && $_POST['category'] != NULL)
{
	if (ft_get_index($_POST['category'], $tab) == -1) //si la categorie n'existe pas
	{
		$tab[] = array('login' => $_POST['category']);
		ft_putcsv2($tab, "bdd/category.csv");
		//$file = serialize($tab);
	//	$file = serialize($tab);
	//	file_put_contents("private/passwd", $file);
		$_SESSION['flag_cat_add'] = 1;
	}
	else
		$_SESSION['flag_cat_add'] = -1;
}

header("Location: admin_categories_page.php");


?>
