<?
session_start();
function ft_get_index($login, $tab)
{
	$i = 0;
	foreach($tab as $elem)
	{
		if ($elem['login'] == $login)
			return ($i);
		$i++;
	}
	return (-1);
}
$file = file_get_contents("private/passwd");
$tab = unserialize($file);
/* REMOVED */
if ($_POST['submit'] == "Yes" && $_POST['login'] != NULL)
{
	if (($index = ft_get_index($_POST['login'], $tab)) != -1 && $_POST['login'] != "admin")
	{
		unset($tab[$index]);
		$tab = array_values($tab);
		$file = serialize($tab);
		file_put_contents("private/passwd", $file);
		$_SESSION['flag_users_remove'] = 1;
		$_SESSION['logged_on_user'] = "";
		if ($_SESSION['cart'] != NULL)
		    $_SESSION['cart'] = "";
		header('Location: index.php');
	}
	else
		$_SESSION['flag_users_remove'] = -1;
}
?>
