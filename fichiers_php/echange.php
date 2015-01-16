<!-- pas encore traduit -->
<?php
$req = $bdd -> prepare('INSERT INTO echange(id_demandeur, id_proprietaire, id_logement, date_update) VALUES(:demandeur, :proprietaire, :logement, :date_update)');
$req -> execute(array(
    "demandeur" => $_SESSION["userid"],
    "proprietaire" => $donnees1['id'],
    "logement" => $donnees['id'],
    "date_update" => date("Y-m-d H:i:s"),
));
$res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre,message) VALUES(:destinataire,:expediteur,:dates,:titre, :message)");
$res -> execute(array(
    "destinataire" => $donnees1['id'],
    "expediteur" => $_SESSION["userid"],
    "dates" => $date = date("Y-m-d H:i:s"),
    "titre" => "Proposition d'échange",
    "message" => "Voulez vous échanger votre logement avec moi ?",
));
$nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id=?");
$nv -> execute(array($bdd -> lastInsertId()));
?>