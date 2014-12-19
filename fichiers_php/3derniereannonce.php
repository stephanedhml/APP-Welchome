<link rel="stylesheet" href="../style.css" />
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
$i=1;
// Récupération des lignes
$result=$bdd->query('SELECT * FROM logement NATURAL JOIN photo ORDER BY id_logement DESC LIMIT 0,'.$nb_derniereannonce.'');
// Vérification
if ( !$result) {
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $result;
  die( $message );}

//prendre les lignes une à une
echo '<div class="wrapper" >';
echo '<div class="carrousel">';
echo '<div class="schema1">';
while ( $row = $result->fetch() ) 
{// Afficher les résultats
	/*if (!empty($row['nom_maison']))
	{
		echo '<p><span class="titreannonce">Nom de la maison :</span> <span class="annoncetxt">' . $row['nom_maison'] . '' . "\n </span> </p>";
	}
	if (!empty($row['localisation']))
	{
		echo   '<p><span class="titreannonce"> Localisation :</span> <span class="annoncetxt">' . $row['localisation'] . ''. "\n </span> </p>";
	}
	if (!empty($row['nombre_voyageurs']))
	{
		echo '<p><span class="titreannonce"> Le nombre de voyageurs est de :</span> <span class="annoncetxt">' . $row['nombre_voyageurs'] . '' . "\n </span></p>";
	}
	if (!empty($row['nb_chambres']))
	{
		echo '<p><span class="titreannonce"> Le nombre de chambres est de :</span> <span class="annoncetxt">' . $row['nb_chambres'] . '' . "\n </span></p>";
	}
	if (!empty($row['nb_salles_bains']))
	{
		echo '<p><span class="titreannonce"> Le nombre de salles de bains est de :</span> <span class="annoncetxt">' . $row['nb_salles_bains'] . '' . "\n </span></p>";
	}
	if (!empty($row['type_logement']))
	{
		echo '<p><span class="titreannonce"> Type de logement :</span><span class="annoncetxt">' . $row['type_logement'] . '' . "\n </span></p>";
	}
	if (!empty($row['description_logement']))
	{
	echo '<p><span class="titreannonce"> Description :</span><span class="annoncetxt">' . $row['description_logement'] . '' . "\n </span></p>";
	}*/
	if ($i==1)
	{
	echo '<div class="plan p1"><a href="annonce.php?id-logement='."><img class="w1" src="'.$row['lien_photo'].'"/></a></span> </div>';
	}
	if ($i==2)
	{
	echo '<div class="plan p2"><a href="annonce.php"><img class="w1" src="'.$row['lien_photo'].'"/></a></span> </div>';
	}
	if ($i==3)
	{
	echo '<div class="plan p3"><img class="w3" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	if ($i==4)
	{
	echo '<div class="plan p4"><img class="w4" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	if ($i==5)
	{
	echo '<div class="plan p5"><img class="w5" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	if ($i==6)
	{
	echo '<div class="plan p6"><img class="w6" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	if ($i==7)
	{
	echo '<div class="plan p7"><img class="w7" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	if ($i==8)
	{
	echo '<div class="plan p8"><img class="w8" src="'.$row['lien_photo'].'"/></span> </div>';
	}
	$i=$i+1;
}	
echo '</div>';
echo '</div>';
echo '</div>';
$result->closeCursor();
}
derniere_annonce(8);
?>