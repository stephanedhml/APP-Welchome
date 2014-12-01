<?php

function derniers_commentaires($nb_dernierscommentaires)
{
// Connexion à MySQL
$link = new PDO('mysql:host=localhost;dbname=test','root','');
if ( !$link ) 
{
  die( 'Could not connect: ' . mysqli_error() );
}

// Sélection de la base de données
$db=$link->query('SELECT * FROM commentaires');
//verification
if ( !$db ) {
  die ( 'Error selecting database \'commentaires\' : ' . mysqli_error() );
}

// Récupération des lignes
$result=$link->query('SELECT * FROM commentaires ORDER BY idcommentaire DESC LIMIT 0,'.$nb_dernierscommentaires.'');
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
echo   ' ' . $row['commentaire'] . ''. "\n";
echo '<br />';
}
$result->closeCursor();
}
//selectionner la photo de profil et l'afficher 
?>