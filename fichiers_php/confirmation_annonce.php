<?php
include("config.php");
include("modeles.php");

$re = $bdd->prepare("INSERT INTO logement(localisation,nom_maison,nombre_voyageurs,type_logement,nb_chambres,nb_salles_bains,description_logement) VALUES(:localisation, :nom_maison, :nb_personne, :logement, :nb_chambres, :nb_salle_bain, :description)");
$re->execute(array
(
    'localisation' => $_POST['localisation'],
    'nom_maison' => $_POST['nom_maison'],
    'nb_personne' => $_POST['nb_personne'],
    'logement' => $_POST['logement'],
    'nb_chambres' => $_POST['nb_chambres'],
    'nb_salle_bain' => $_POST['nb_salle_bain'],
    'description' => $_POST['description'],
));



?>