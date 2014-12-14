<?php
include("config.php");
include("modeles.php");

$re = $bdd->prepare("INSERT INTO logement(Localisation,Nom_maison,Nombre_voyageurs,Type_logement,Nb_chambres,Nb_salles_bain,Description) VALUES(:localisation, :nom_maison, :nb_personne, :logement, :nb_chambres, :nb_salle_bain, :description)");
$re->execute(array
(
    'localisation' => $_POST['localisation'],
    'nom_maison' => $_POST['nom_maison'],
    'nb_personne' => $_POST['nb_personne'],
    'logement' => $_POST['logement'],
    'nb_chambres' => $_POST['nb_chambres'],
    'nb_salle_bain' => $_POST['nb_salle_bain'],
    'description' => $_POST['description']
));



?>