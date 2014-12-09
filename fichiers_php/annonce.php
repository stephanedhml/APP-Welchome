<?php
	include("config.php");
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="stylesheet" href="../style.css"/>
        <link rel="stylesheet" href="../fichiers_css/annonce.css"/>        
		<?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<title>Maison Provence</title>
	</head>
	
	<body>
	
	<?php
			
			$annonce = htmlspecialchars($_GET['id'] );
			$recherche_id =$bdd->query("SELECT * FROM logement NATURAL JOIN Photo WHERE id=$annonce ");
			$donnees = $recherche_id->fetch()



	?>

    <header>
        <?php include("menus.php"); ?>
    </header>
		<div id="bloc_page">
			<section id="bloc0">
				<div id="bloc1">
					<div id="banniere_image">
						<?php echo '<img  align="left" src="'.$donnees ['Liendelaphoto'].'" class="Photo">' ?>
			                <div id="banniere_description">
			                    Villa Santa Clara, Provence
			                    <a href="#" class="bouton_rouge">Plus de photos <img src="flecheblanchedroite.png" alt="" /></a>
							</div>
					</div>
				    
				    <aside id="description1">
				    	 

				    	
				    	
				 	</aside>
				</div>

				<div id="bloc2">
					<?php echo $donnees['Description'];?>      		
				
					<aside id="équipements2">
						
					</aside>
					<h1 id="disponibilités">Disponibilités:</h1>
					
				</div>
			</section>
		</div>
    </body>
</html>