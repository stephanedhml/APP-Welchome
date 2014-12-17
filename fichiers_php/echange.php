<?php
$req = $bdd -> prepare('INSERT INTO echange(id_demandeur, id_proprietaire, id_logement) VALUES(:demandeur, :proprietaire, :logement)');
$req -> execute(array(
    "demandeur" => $_SESSION["userid"],
    "proprietaire" => $donnees1['id'],
    "logement" => $donnees['id'],
));