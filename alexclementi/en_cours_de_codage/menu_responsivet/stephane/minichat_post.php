<?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Forum', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (auteur, commentaire) VALUES(?, ?)');
$req->execute(array($_POST['auteur'], $_POST['commentaire']));

// Redirection du visiteur vers la page du minichat
header('Location: commentaires.php?billet=1');
?>