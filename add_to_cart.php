<?php

session_start();

print_r($_POST);

//if ($_POST['submit'] === "I want it !")
//{
//    foreach($_POST as $key=>$val)
//    {
//        if ($key !== "submit") // verifier que c'est un ID de la BDD
//        {
//            echo "panier rempli\n";
//            echo $key."\n";
//            echo $val."\n";
//            print_r(array(['id'] => "14", ['quant'] => "1"));
////            if ($_SESSION['float_cart'] == NULL)
////                $_SESSION['float_cart'] = array(array(['id'] => $key, ['quant'] => $val));
////            else
////                $_SESSION['float_cart'][] = array(['id'] => $key, ['quant'] => $val);         
//        }
//    }
//}
//print_r($_SESSION);
?>
