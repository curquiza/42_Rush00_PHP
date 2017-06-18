<?php

include("handler_csv.php");
/* creation des comptes par defaut */
if (file_exists("private") === FALSE)
	mkdir("private");
$tab[] = array('login' => 'admin', 'passwd' => hash('sha512', 'admin'), 'cart' => NULL, 'role' => 1);
$tab[] = array('login' => 'test', 'passwd' => hash('sha512', 'test'), 'cart' => NULL, 'role' => 0);
$file = serialize($tab);
file_put_contents("private/passwd", $file);

/* creation du fichier category.csv */
if (file_exists("bdd") === FALSE)
	mkdir("bdd");
unset($tab);
$tab[] = array('name' => 'Horse', 'id' => 0);
$tab[] = array('name' => 'Poney', 'id' => 1);
$tab[] = array('name' => 'Foal', 'id' => 2);
$tab[] = array('name' => 'Legendary', 'id' => 3);
ft_putcsv2($tab, "bdd/category.csv");

echo "Installation reussie\n";

?>
