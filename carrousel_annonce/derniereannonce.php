<link rel="stylesheet" href="derniereannonce.css" />
<script type="text/javascript" src="../carrousel/jquery.js"></script>
<script type="text/javascript" src="../carrousel/carrousel1.js"></script>
<script type="text/javascript" src="../carrousel/carrousel2.js"></script>
<script type="text/javascript" src="../carrousel/carrousel3.js"></script>
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
$nbcarrousel=0;
//prendre les lignes une à une

while ( $row = $result->fetch() ) 
{// Afficher les résultats
	echo '<div class="bloccarrouseltxt">';
	if (!empty($row['date']))
	{
		echo '<p><div class="titreannonce">Date:</div><span class="annoncetxt">' . $row['date'] . '' . "\n </span> </p>";
	}	
	if (!empty($row['Localisation']))
	{
		echo   '<p><div class="titreannonce"> Localisation :</div><span class="annoncetxt">' . $row['Localisation'] . ''. "\n </span> </p>";
	}
	if (!empty($row['Nombre de voyageurs']))
	{
		echo '<p><div class="titreannonce"> Le nombre de voyageurs est de :</div><span class="annoncetxt">' . $row['Nombre de voyageurs'] . '' . "\n </span></p>";
	}
	if (!empty($row['Type de logement']))
	{
		echo '<p><div class="titreannonce"> Type de logement :</div><span class="annoncetxt">' . $row['Type de logement'] . '' . "\n </span></p>";
	}
	if (!empty($row['Description']))
	{
	echo '<p><div class="titreannonce"> Description :</div><span class="annoncetxt">' . $row['Description'] . '' . "\n </span></p>";
	}
	$nbcarrousel=$nbcarrousel+1;
	echo '</div>'	;
	
	if ($nbcarrousel==1)
{
	$i=1;
	echo '<div id="partie3">';
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <div id="slidesss1" class="slidesss"><img class="imageslide" src="'.$row['photo1'].'"></img></div>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <div id="slidesss2" class="slidesss"><img class="imageslide" src="'.$row['photo2'].'"></img></div>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <div id="slidesss3" class="slidesss"><img class="imageslide" src="'.$row['photo3'].'"></img></div>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <div id="slidesss4" class="slidesss"><img class="imageslide" src="'.$row['photo4'].'"></img></div>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <div id="slidesss5" class="slidesss"><img class="imageslide" src="'.$row['photo5'].'"></img></div>';
				}
			}
			$i=$i+1;
	}echo '</div>';}
	
	if ($nbcarrousel==2)
{
	$i=1;
	echo '<div id="partie4">';
	while ($i<=5)
	{
			if ($i==1 )
			{
				if (!empty($row['photo1']))
				{
					echo '    <div id="slides1" class="slides"><img class="imageslide" src="'.$row['photo1'].'"></img></div>';
				}
			}
			if ($i==2) 
			{
				if (!empty($row['photo2']))
				{
					echo '    <div id="slides2" class="slides"><img class="imageslide" src="'.$row['photo2'].'"></img></div>';
				}
			}
			if ($i==3)
			{
				if (!empty($row['photo3']))
				{
				echo '    <div id="slides3" class="slides"><img class="imageslide" src="'.$row['photo3'].'"></img></div>';
				}
			}
			if ($i==4) 
			{
				if (!empty($row['photo4']))
				{
				echo '    <div id="slides4" class="slides"><img class="imageslide" src="'.$row['photo4'].'"></img></div>';
				}
			}
			if ($i==5) 
			{
				if (!empty($row['photo5']))
				{
				echo '    <div id="slides5" class="slides"><img class="imageslide" src="'.$row['photo5'].'"></img></div>';
				}
			}
			$i=$i+1;
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
}
$result->closeCursor();
}
derniere_annonce(3);
?>