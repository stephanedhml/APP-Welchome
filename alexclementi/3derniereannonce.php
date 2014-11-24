<?php
// Connexion à MySQL
$link = new PDO('mysql:host=localhost;dbname=test','root','');
if ( !$link ) {
  die( 'Could not connect: ' . mysql_error() );
}

// Sélection de la base de données
$db=$link->query('SELECT * FROM annonce');
//verification
if ( !$db ) {
  die ( 'Error selecting database \'annonce\' : ' . mysql_error() );
}

// Récupération des lignes
$result=$link->query('SELECT * FROM annonce ORDER BY idannonce DESC LIMIT 0,3');
// Vérification
if ( !$result) {
  $message  = 'Invalid query: ' . mysql_error() . "\n";
  $message .= 'Whole query: ' . $result;
  die( $message );
}

//prendre les lignes une à une
while ( $row = $result->fetch() ) 
{// Afficher les résultats
echo '  Date: ' . $row['date'] . ' : ' . "\n";
echo   ' ' . $row['annonce'] . ''. "\n";
echo '<br />';
}
$result->closeCursor();

?>