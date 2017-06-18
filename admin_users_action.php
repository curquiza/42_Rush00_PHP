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

$_SESSION['flag_users_remove'] = 0;
$_SESSION['flag_users_add'] = 0;
$_SESSION['flag_users_change'] = 0;

/* REMOVED */
if ($_POST['submit'] == "Remove" && $_POST['login'] != NULL)
{
	if ($_POST['login'] == $_SESSION['logged_on_user'])
		$_SESSION['flag_users_remove'] = -2;
	else if ($_POST['login'] === "admin")
		$_SESSION['flag_users_remove'] = -3;
	else if (($index = ft_get_index($_POST['login'], $tab)) != -1)
	{
		unset($tab[$index]);
		$tab = array_values($tab);
		$file = serialize($tab);
		file_put_contents("private/passwd", $file);
		$_SESSION['flag_users_remove'] = 1;
	}
	else
		$_SESSION['flag_users_remove'] = -1;
}

/* ADDED */
else if ($_POST['submit'] == "Add" && $_POST['login'] != NULL && ($_POST['role'] == "Yes" || $_POST['role'] == 'No'))
{
	if (ft_get_index($_POST['login'], $tab) == -1)
	{
		if ($_POST['role'] == 'Yes')
			$role = 1;
		else
			$role = 0;
		$tab[] = array('login' => $_POST['login'], 'passwd' => hash('sha512', '123'), 'cart' => NULL, 'role' => $role);
		$file = serialize($tab);
		file_put_contents("private/passwd", $file);
		$_SESSION['flag_users_add'] = 1;
	}
	else
		$_SESSION['flag_users_add'] = -1;
}
else if ($_POST['submit'] == "Add")
		$_SESSION['flag_users_add'] = -2;

/* CHANGE */
else if ($_POST['submit'] == "Change" && $_POST['login'] != NULL && ($_POST['role'] == "Yes" || $_POST['role'] == 'No'))
{
	if (($index = ft_get_index($_POST['login'], $tab)) != -1)
	{
		if ($_POST['login'] == "admin")
			$_SESSION['flag_users_change'] = -3;
		else
		{
			if ($_POST['newlogin'] != NULL && ft_get_index($_POST['newlogin'], $tab) == -1)
			{
				$tab[$index]['login'] = $_POST['newlogin'];
				if ($_POST['login'] == $_SESSION['logged_on_user'])
					$_SESSION['logged_on_user'] = $_POST['newlogin'];
			}
			if ($_POST['login'] == $_SESSION['logged_on_user'] && $_POST['role'] == 'No')
				$_SESSION['flag_users_change'] = -4;
			else
			{
				if ($_POST['role'] == 'Yes')
					$role = 1;
				else
					$role = 0;
				$tab[$index]['role'] = $role;
				$file = serialize($tab);
				file_put_contents("private/passwd", $file);
				$_SESSION['flag_users_change'] = 1;
			}
		}
	}
	else
		$_SESSION['flag_users_change'] = -1;
}
else if ($_POST['submit'] == "Change")
		$_SESSION['flag_users_change'] = -2;

header("Location: admin_users_page.php");


?>
