<link rel="stylesheet" href="derniereannonce.css" />
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
		echo '<span class="annonce">  Date: ' . $row['date'] . '' . "\n </span>";
		echo '<br/>';
	}	
	if (!empty($row['Localisation']))
	{
		echo   '<span class="annonce"> Localisation : ' . $row['Localisation'] . ''. "\n </span>";
		echo '<br/>';
	}
	if (!empty($row['Nombre de voyageurs']))
	{
		echo '<span class="annonce"> Le nombre de voyageurs est de : ' . $row['Nombre de voyageurs'] . '' . "\n </span>";
		echo '<br/>';
	}
	if (!empty($row['Type de logement']))
	{
		echo '<span class="annonce"> Type de logement : ' . $row['Type de logement'] . '' . "\n </span>";
		echo '<br/>';
	}
	if (!empty($row['Description']))
	{
	echo '<span class="annonce"> Description : ' . $row['Description'] . '' . "\n </span>";
	echo '<br/>';
	}
	$i=1;
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <th  scope="col"><img class="photo1" src="'.$row['photo1'].'"></th>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <th  scope="col"><img class="photo2" src="'.$row['photo2'].'"></th>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <th  scope="col"><img class="photo3" src="'.$row['photo3'].'"></th>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <th  scope="col"><img class="photo4" src="'.$row['photo4'].'"></th>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <th  scope="col"><img class="photo5"src="'.$row['photo5'].'"></th>';
				}
			}
			$i=$i+1;
	}	
echo '<br />';
}
$result->closeCursor();
}
?>