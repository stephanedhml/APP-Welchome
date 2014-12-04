<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog</title>
    <link href="Forum.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <h1>Forum</h1>
        <p><a href="Forum.php">Retour à la liste des billets</a></p>
 
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

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo $donnees['titre']; ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>
    
    <p>
    <?php
    echo nl2br($donnees['contenu']);
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

// Récupération des commentaires
 // Fin de la boucle des commentaires
$req->closeCursor();
?>
</body>
</html>

<html>
      <form action="minichat_post.php" method="post">
        <p>
        <label for="auteur">Pseudo</label> : <input type="text" name="auteur" id="auteur" /><br />
        <label for="commentaire">Message</label> :  <input type="text" name="commentaire" id="commentaire" /><br />

        <input type="submit" value="Envoyer" />
    </p>
    </form>

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

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT auteur, commentaire FROM commentaires ORDER BY ID ASC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['auteur']) . '</strong> : ' . htmlspecialchars($donnees['commentaire']) . '</p>';
}

$reponse->closeCursor();

?>
    </body>
</html>