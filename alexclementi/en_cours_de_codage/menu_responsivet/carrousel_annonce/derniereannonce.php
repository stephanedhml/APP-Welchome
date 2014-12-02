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
	if (!empty($row['date']))
	{
		echo '  Date: ' . $row['date'] . '' . "\n";
		echo '<br />';
	}	
	if (!empty($row['Localisation']))
	{
		echo   'Localisation : ' . $row['Localisation'] . ''. "\n";
		echo '<br />';
	}
	if (!empty($row['Nombre de voyageurs']))
	{
		echo 'Le nombre de voyageurs est de : ' . $row['Nombre de voyageurs'] . '' . "\n";
		echo '<br />';
	}
	if (!empty($row['Type de logement']))
	{
		echo ' Type de logement : ' . $row['Type de logement'] . '' . "\n";
		echo '<br />';
	}
	if (!empty($row['Description']))
	{
	echo ' Description : ' . $row['Description'] . '' . "\n";
	echo '<br />';
	}
	$i=1;
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <th scope="col"><img src="'.$row['photo1'].'"></th>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <th scope="col"><img src="'.$row['photo2'].'"></th>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <th scope="col"><img src="'.$row['photo3'].'"></th>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <th scope="col"><img src="'.$row['photo4'].'"></th>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <th scope="col"><img src="'.$row['photo5'].'"></th>';
				}
			}
			$i=$i+1;
	}	
echo '<br />';
}
$result->closeCursor();
}
derniere_annonce(3);
?>