<?php

$bdd = "php_exam";
$hote = "localhost";
$user = "root";
$mdp = "";

$con = mysqli_connect($hote, $user, $mdp, $bdd);

if(!$con){

    echo "Echec de la connexion à la bdd";
    die();

} else {

    echo "Connexion réussie<br>";
}
?>