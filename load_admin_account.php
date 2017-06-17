<?php
$i = 0;
if (file_exists("private/passwd") === TRUE)
{
	$file = file_get_contents("private/passwd");
	$tab = unserialize($file);
	foreach ($tab as $elem)
	{
		if ($elem['role'] == 1)
			$i++;
	}
}
else
{
	if (file_exists("private") === FALSE)
		mkdir("private");
}
if ($i == 0)
{
	$tab[] = array('login' => 'admin', 'passwd' => hash('sha512', 'admin'), 'cart' => NULL, 'role' => 1);
	$file = serialize($tab);
	file_put_contents("private/passwd", $file);
}
?>
