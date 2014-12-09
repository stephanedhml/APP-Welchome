<<<<<<< HEAD
=======
<link rel="stylesheet" href="derniereannonce.css" />
>>>>>>> origin/master
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
<<<<<<< HEAD
	echo '<div class="bloccarrouseltxtimage">';
	echo '<div class="bloccarrouseltxt">';
	if (!empty($row['date']))
	{
		echo '<p><span class="titreannonce">Date:</span> <span class="annoncetxt">' . $row['date'] . '' . "\n </span> </p>";
=======
	if (!empty($row['date']))
	{
<<<<<<< Updated upstream
		echo '<p><div class="titreannonce">Date:</div><span class="annoncetxt">' . $row['date'] . '' . "\n </span> </p>";
>>>>>>> origin/master
	}	
	if (!empty($row['Localisation']))
	{
		echo   '<p><span class="titreannonce"> Localisation :</span> <span class="annoncetxt">' . $row['Localisation'] . ''. "\n </span> </p>";
	}
	if (!empty($row['Nombre de voyageurs']))
	{
		echo '<p><span class="titreannonce"> Le nombre de voyageurs est de :</span> <span class="annoncetxt">' . $row['Nombre de voyageurs'] . '' . "\n </span></p>";
	}
	if (!empty($row['Type de logement']))
	{
		echo '<p><span class="titreannonce"> Type de logement :</span><span class="annoncetxt">' . $row['Type de logement'] . '' . "\n </span></p>";
	}
	if (!empty($row['Description']))
	{
<<<<<<< HEAD
	echo '<p><span class="titreannonce"> Description :</span><span class="annoncetxt">' . $row['Description'] . '' . "\n </span></p>";
=======
	echo '<p><div class="titreannonce"> Description :</div><span class="annoncetxt">' . $row['Description'] . '' . "\n </span></p>";
=======
		echo '<p class="h2_p2">  Date: ' . $row['date'] . '' . "\n </p>";
	}	
	if (!empty($row['Localisation']))
	{
		echo   '<p class="h2_p2"> Localisation : ' . $row['Localisation'] . ''. "\n </p>";
>>>>>>> origin/master
	}
	if (!empty($row['Nombre de voyageurs']))
	{
		echo '<p class="h2_p2"> Le nombre de voyageurs est de : ' . $row['Nombre de voyageurs'] . '' . "\n </p>";
	}
	if (!empty($row['Type de logement']))
	{
		echo '<p class="h2_p2"> Type de logement : ' . $row['Type de logement'] . '' . "\n </p>";
	}
	if (!empty($row['Description']))
	{
	echo '<p class="h2_p2"> Description : ' . $row['Description'] . '' . "\n </p>";
>>>>>>> Stashed changes
	}
	$i=1;
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <th class="photo1" scope="col"><img src="'.$row['photo1'].'"></th>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <th class="photo2" scope="col"><img src="'.$row['photo2'].'"></th>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <th class="photo3" scope="col"><img src="'.$row['photo3'].'"></th>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <th class="photo4" scope="col"><img src="'.$row['photo4'].'"></th>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <th class="photo5" scope="col"><img src="'.$row['photo5'].'"></th>';
				}
			}
			$i=$i+1;
<<<<<<< Updated upstream
	}echo '</div>';}
		if ($nbcarrousel==3)
{
	$i=1;
	echo '<div id="partie5">';
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <div id="slidess1" class="slidess"><img class="imageslide" src="'.$row['photo1'].'"></img></div>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <div id="slidess2" class="slidess"><img class="imageslide" src="'.$row['photo2'].'"></img></div>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <div id="slidess3" class="slidess"><img class="imageslide" src="'.$row['photo3'].'"></img></div>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <div id="slidess4" class="slidess"><img class="imageslide" src="'.$row['photo4'].'"></img></div>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <div id="slidess5" class="slidess"><img class="imageslide" src="'.$row['photo5'].'"></img></div>';
				}
			}
			$i=$i+1;
	}echo '</div>';}
echo '<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />';
<<<<<<< HEAD
echo '</div>';
=======
=======
	}	
echo '<br />';
>>>>>>> Stashed changes
>>>>>>> origin/master
}
$result->closeCursor();
}
derniere_annonce(3);
?>