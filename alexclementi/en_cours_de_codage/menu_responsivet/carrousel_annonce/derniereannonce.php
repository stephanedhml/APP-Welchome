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
  die( $message );
}

//prendre les lignes une à une
while ( $row = $result->fetch() ) 
{// Afficher les résultats
echo '  Date: ' . $row['date'] . '' . "\n";
echo '<br />';
echo   'Localisation : ' . $row['Localisation'] . ''. "\n";
echo '<br />';
echo 'Le nombre de voyageurs est de : ' . $row['Nombre de voyageurs'] . '' . "\n";
echo '<br />';
echo ' Type de logement : ' . $row['Type de logement'] . '' . "\n";
echo '<br />';
echo ' Description : ' . $row['Description'] . '' . "\n";
echo '<br />';
echo '    <th scope="col"><img src="'.$row['photo'].'"></th>';
echo '<br />';
}
$result->closeCursor();
}
derniere_annonce(3);
?>