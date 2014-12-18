<?php
function derniere_annonce($nb_derniereannonce)
{
// Connexion à MySQL
include("../fichiers_php/config.php");
/*$link = new PDO('mysql:host=localhost;dbname=test','root','');
if ( !$link ) 
{
  die( 'Could not connect: ' . mysql_error() );
}*/

// Sélection de la base de données
$db=$bdd->query('SELECT * FROM logement');
//verification
if ( !$db ) {
  die ( 'Error selecting database \'logement\' : ' . mysql_error() );
}

// Récupération des lignes
$result=$bdd->query('SELECT * FROM logement ORDER BY id DESC LIMIT 0,'.$nb_derniereannonce.'');
// Vérification
if ( !$result) {
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $result;
  die( $message );}

//prendre les lignes une à une
while ( $row = $result->fetch() ) 
{// Afficher les résultats
	echo '<div class="bloccarrouseltxtimage">';
	echo '<div class="bloccarrouseltxt">';
	if (!empty($row['Nom de la maison']))
	{
		echo '<p><span class="titreannonce">Nom de la maison :</span> <span class="annoncetxt">' . $row['Nom de la maison'] . '' . "\n </span> </p>";
	}
	if (!empty($row['Localisation']))
	{
		echo   '<p><span class="titreannonce"> Localisation :</span> <span class="annoncetxt">' . $row['Localisation'] . ''. "\n </span> </p>";
	}
	if (!empty($row['Nombre_voyageurs']))
	{
		echo '<p><span class="titreannonce"> Le nombre de voyageurs est de :</span> <span class="annoncetxt">' . $row['Nombre_voyageurs'] . '' . "\n </span></p>";
	}
	if (!empty($row['Nb de chambres']))
	{
		echo '<p><span class="titreannonce"> Le nombre de chambres est de :</span> <span class="annoncetxt">' . $row['Nb de chambres'] . '' . "\n </span></p>";
	}
	if (!empty($row['Nb de salles de bains']))
	{
		echo '<p><span class="titreannonce"> Le nombre de salles de bains est de :</span> <span class="annoncetxt">' . $row['Nb de salles de bains'] . '' . "\n </span></p>";
	}
	if (!empty($row['Type_logement']))
	{
		echo '<p><span class="titreannonce"> Type de logement :</span><span class="annoncetxt">' . $row['Type_logement'] . '' . "\n </span></p>";
	}
	if (!empty($row['Description']))
	{
	echo '<p><span class="titreannonce"> Description :</span><span class="annoncetxt">' . $row['Description'] . '' . "\n </span></p>";
	}
	echo '</br></br>';
$result2=$bdd->query('SELECT * FROM logement INNER JOIN photo ON logement.id_users=photo.id');
while ( $row2 = $result2->fetch() ) 
{
	if (id_users==id)
	{
		if (!empty($row2['Liendelaphoto']))
		{
		echo '<p> '.$row2['Liendelaphoto'].'\n </span> </p>';
		}
	}
}
}	

$result->closeCursor();
}
derniere_annonce(5);
?>