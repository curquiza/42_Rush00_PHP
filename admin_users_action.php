<?

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

if ($_POST['login'] != NULL && $_POST['submit'] == "Remove")
{
	if (($index = ft_get_index($_POST['login'], $tab)) != -1)
	{
		unset($tab[$index]);
		$tab = array_values($tab);
	}
	else if ($_POST['login'] == $_SESSION['logged_on_user'])
		$_SESSION['flag_users_remove'] = -2;
	else if ($_POST['login'] == "admin")
		$_SESSION['flag_users_remove'] = -3;
	else
		$_SESSION['flag_users_remove'] = -1;
}

header("Location: admin_users_page.php");


?>
