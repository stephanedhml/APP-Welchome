<?php

function derniere_annonce($nb_derniereannonce)
{
// Connexion à MySQL
$link = new PDO('mysql:host=localhost;dbname=test','root','');
if ( !$link ) 
{
  die( 'Could not connect: ' . mysqli_error() );
}

// Sélection de la base de données
$db=$link->query('SELECT * FROM annonce');
//verification
if ( !$db ) {
  die ( 'Error selecting database \'annonce\' : ' . mysqli_error() );
}

// Récupération des lignes
$result=$link->query('SELECT * FROM annonce ORDER BY idannonce DESC LIMIT 0,'.$nb_derniereannonce.'');
// Vérification
if ( !$result) {
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $result;
  die( $message );
}

//prendre les lignes une à une
while ( $row = $result->fetch() ) 
{// Afficher les résultats
echo '  Date: ' . $row['date'] . ' : ' . "\n";
echo   ' ' . $row['annonce'] . ''. "\n";
echo '<br />';

$imagecommentaire=$link->query('SELECT image FROM annonce DESC');
	While ( $picture = $imagecommentaire->fetch() )
	{
	echo "<img src='".$picture['image']."' />";
	echo '<br/>';
	}
}
$result->closeCursor();
}
//echo "<img src='".$image['url']."'/>";
//utiliser un fetch
derniere_annonce(2);
?>