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
						<?php echo '<img  align="left" src="'.$donnees ['Liendelaphoto'].'" class="photo">' ?>
			                <div id="banniere_description">
			                    Villa Santa Clara, Provence
			                    <a href="#" class="bouton_rouge">Plus de photos <img src="flecheblanchedroite.png" alt="" /></a>
							</div>
					</div>
				    
				    <aside id="description1">
				    	 <?php echo $donnees['Description'];?> 

				    	
				    	
				 	</aside>
				</div>

				<div id="bloc2">
					<div id="équipements1">
				 			<h1 id="équipements">Equipements:</h1>
							<li><a>Accueil</a></li>
			                <li><a>Offres</a></li>
			                <li><a>Proposer une annonce</a></li>
			                <li><a>Forum</a></li>
			            	<li><a>Mon Profil</a></li>
			            	<li><a>Déconnexion</a></li>
					</div>      		
				
					<aside id="équipements2">
							<li><a>Accueil</a></li>
			                <li><a>Offres</a></li>
			                <li><a>Proposer une annonce</a></li>
			                <li><a>Forum</a></li>
			            	<li><a>Mon Profil</a></li>
			            	<li><a>Déconnexion</a></li>
					</aside>
					<h1 id="disponibilités">Disponibilités:</h1>
					<iframe name="InlineFrame1" id="InlineFrame1" style="width:690px;height:235px;" src="http://www.mathieuweb.fr/calendrier/calendrier-des-semaines.php?nb_mois=1&nb_mois_ligne=4&mois=0&an=0&langue=fr&texte_color=B9CBDD&week_color=DAE9F8&week_end_color=C7DAED&police_color=453413&sel=true" scrolling="no" frameborder="0" allowtransparency="true"></iframe>	
				</div>
			</section>
		</div>
    </body>
</html>