<?php
$req = $bdd -> prepare('INSERT INTO echange(id_demandeur, id_proprietaire, id_logement, date_update) VALUES(:demandeur, :proprietaire, :logement, :date_update)');
$req -> execute(array(
    "demandeur" => $_SESSION["userid"],
    "proprietaire" => $donnees1['id'],
    "logement" => $donnees['id'],
    "date_update" => date("Y-m-d H:i:s"),
));