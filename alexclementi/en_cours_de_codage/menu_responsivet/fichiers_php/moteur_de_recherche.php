<?php
// on se connecte à MySQL.
include( 'config.php');
?>

<head>
	<meta charset="utf-8" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
	<link rel="stylesheet" href="../style.css" />
	<link rel="stylesheet" href="../fichiers_css/moteur_de_recherche.css" />

	<?php include("../menu_responsive/javascript/menu_responsive.js");
	?>
	<title>Recherche</title>
</head>

<body>
<div class="header">
	<?php include("menus.php"); ?>
</div>

<div class="recherche">

        <?php
			// on vérifie d'abord l'existence du POST et aussi si la requete n'est pas vide.
			if(isset($_POST['requete']) && $_POST['requete'] != NULL) 
			{

				// on crée une variable $requete pour faciliter l'écriture de la requête SQL.
				$requete = htmlspecialchars($_POST['requete']); 
				$nbresult =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE Localisation LIKE '%$requete%' ORDER BY id DESC");
				
				// on utilise la fonction mysql_num_rows pour compter les résultats pour vérifier par après
				$nb_resultats = $nbresult->rowCount(); 
				
				if($nb_resultats != 0) // si le nombre de résultats est supérieur à 0, on continue
				{
					// maintenant, on va afficher les résultats 
		?>
					<img src="../images_diverses/search_result.png" class="search_result">
					<p>
					Nous avons trouvé 
						<?php echo $nb_resultats; 
							// on vérifie le nombre de résultats pour orthographier correctement. 
							if($nb_resultats > 1) { echo ' résultats'; } else { echo ' résultat'; } 
						?>
					dans notre base de données. Voici les logements que nous avons trouvées:<br/><br/>

				    </p>


					
		<?php
					// on fait un while pour afficher la liste des fonctions trouvées, ainsi que l'id qui permettra de faire le lien vers la page de la fonction :
					while($donnees = $nbresult->fetch()) 
					
					{
		?>
						<div class="cadre">
                            <?php echo '<img width="125px" height="125px" align="left" src="'.$donnees ['Liendelaphoto'].'" class="photo">' ?>
                                <aside class="description"><a href="fonction.php?id=<?php echo $donnees['id']; ?>" id="<?php echo $donnees['id']; ?>" class="lien">
					<?php echo '<p>' .''.$donnees['Localisation']. ' </br>' . $donnees['Nombre de voyageurs']. ' voyageurs </br>' . $donnees['Type de logement'] . " </br>  ". $donnees['Description'] . '</p>'; ?> </a><br/>
                                </aside>



                            </div><br/>
		<?php
					} // fin du while

		?>		 <br/><br/>
					<a href="../fichiers_php/accueilmanu.php" class="nlle_r">Faire une nouvelle recherche</a></p>
		<?php
				} 
				// Afficher l'éventuelle erreur :
				else
				{ //HTML
		?>
					<h3>Pas de résultats</h3>
					<p>Nous n'avons trouvé aucun résultat pour votre requête "<?php echo $_POST['requete']; ?>". <a href="accueilmanu.php">Réessayez</a> avec autre chose.</p>
		<?php
				}
				$nbresult->closeCursor(); // on ferme mysql
			}
			else
			{ // HTML
		?>
		<?php
			}
		?>
	</p>
</body>

