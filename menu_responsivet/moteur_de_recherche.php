<?

if(isset($_POST['requete']) && $_POST['requete'] != NULL) // on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
{
mysql_connect('localhost','root','root');
mysql_select_db('Recherche'); // on se connecte à MySQL. 
$requete = htmlspecialchars($_POST['requete']); // on crée une variable $requete pour faciliter l'écriture de la requête SQL.
$query = mysql_query("SELECT * FROM recherche WHERE Localisation LIKE '%$requete%' ORDER BY id DESC") or die (mysql_error()); 
$nb_resultats = mysql_num_rows($query); // on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
{
// maintenant, on va afficher les résultats 
?>
<h3>Résultats de votre recherche.</h3>
<p>Nous avons trouvé <? echo $nb_resultats; 
if($nb_resultats > 1) { echo ' résultats'; } else { echo ' résultat'; } // on vérifie le nombre de résultats pour orthographier correctement. 
?>
 dans notre base de données. Voici les maisons que nous avons trouvées:<br/>
<br/>
<?
while($donnees = mysql_fetch_array($query)) // on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction
{
?>
<a href="fonction.php?id=<? echo $donnees['id']; ?>"><? echo '<p>' . $donnees['Localisation']. ' - ' . $donnees['Nombre de voyageurs']. ' voyageurs - ' . $donnees['Type de logement'] . " : <br/>  ". $donnees['Description'] . '</p>'; ?></a><br/>

<?
} // fin de la boucle
?><br/>
<br/>
<a href="accueilmanu.php">Faire une nouvelle recherche</a></p>
<?
} // Afficher l'éventuelle erreur.
else
{ //HTML
?>
<h3>Pas de résultats</h3>
<p>Nous n'avons trouvé aucun résultat pour votre requête "<? echo $_POST['requete']; ?>". <a href="accueilmanu.php">Réessayez</a> avec autre chose.</p>
<?
}
mysql_close(); // on ferme mysql
}
else
{ // HTML
?>

<?
}

?>