<?php

if (file_exists("private") === FALSE)
	mkdir("private");
$tab[] = array('login' => 'admin', 'passwd' => hash('sha512', 'admin'), 'cart' => NULL, 'role' => 1);
$tab[] = array('login' => 'test', 'passwd' => hash('sha512', 'test'), 'cart' => NULL, 'role' => 0);
$file = serialize($tab);
file_put_contents("private/passwd", $file);
echo "Installation reussie\n";

?>
