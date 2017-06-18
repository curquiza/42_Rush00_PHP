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

unset($tab);

$tab[] = array('1','Horse','Mustang','bay','4999','15','https://i.skyrock.net/2403/75432403/pics/2943106009_1_7.png');
$tab[] = array('2','Horse','Pure-Bred Spanish Horse','grey','4999','19','https://www.equideow.com/media/equideo/image/chevaux/adulte/iberique/normal/300/gr-pml.png');
$tab[] = array('17','Poney','Fjord','isabel','1799','10','https://www.equideow.com/media/equideo/image/chevaux/adulte/fjord/normal/300/bbk.png');
$tab[] = array('3','Horse','French Trotter','bay','3999','26','https://i.skyrock.net/2403/75432403/pics/2943165259_1_5.png');
$tab[] = array('10','Legendary, Horse','Unicorn','white','500000','1','https://i.skyrock.net/6802/79146802/pics/3013556331_1_21_vMvQTm2E.png');
$tab[] = array('4','Horse','Pure-Bred Arab Horse','white','3999','15','https://i.skyrock.net/2403/75432403/pics/2942892871_1_5.png');
$tab[] = array('5','Horse','Marwari','painted black','9999','7','https://ouranos.equideow.com/media/equideo/image/chevaux/adulte/marwari/normal/300/pie-ov-nr.png');
$tab[] = array('6','Poney','Shetland','alezan','999','50','https://www.equideow.com/media/equideo/image/chevaux/adulte/shetland/normal/300/alz.png');
$tab[] = array('7','Poney','Connemara','bay','1599','30','https://www.equideow.com/media/equideo/image/chevaux/adulte/poney-primitif/normal/300/bai-b.png');
$tab[] = array('8','Foal, Poney','Shetland','alezan','499','2','https://ouranos.equideow.com/media/equideo/image/chevaux/poulain/shetland/normal/300/alz.png');
$tab[] = array('9','Foal, Horse','Mustang','painted','899','2','https://ouranos.equideow.com/media/equideo/image/chevaux/poulain/generique1/normal/300/bkt-alz-b.png');
$tab[] = array('11','Legendary, Horse','Pegasus','black','500000','1','https://ouranos.equideow.com/media/equideo/image/chevaux/adulte/frison/pegase/300/nr.png');
$tab[] = array('12','Horse','Camargue','white','2999','10','https://www.equideow.com/media/equideo/image/chevaux/adulte/primitif/normal/300/gr-c.png');
$tab[] = array('13','Legendary, Horse','Big Pegasus','white','500000','1','https://ouranos.preprod.equideow.com/media/equideo/image/chevaux/adulte/shire/pegase/300/gr-c.png?1828806360');
$tab[] = array('14','Poney','Dartmoor',' black','1199','50','https://www.equideow.com/media/equideo/image/chevaux/adulte/poney-leger/normal/300/nr.png');
$tab[] = array('15','Legendary, Horse','Old Unicorn','white','500000','0','https://ouranos.equideow.com/media/equideo/image/chevaux/adulte/poney-sport/licorne/300/gr-t.png');
$tab[] = array('16','Foal, Poney','Fjord','isabel','499','50','https://i.skyrock.net/2403/75432403/pics/2942905635_1_3.png');
$tab[] = array('18','Legendary, Poney','8-leg Fire Poney','fire','500000','1','https://s-media-cache-ak0.pinimg.com/736x/da/4b/7a/da4b7aa3609ef0d096b5b504af6352a4.jpg');

ft_putcsv($tab, "bdd/product.csv");

               
echo "Installation reussie\n";

?>
