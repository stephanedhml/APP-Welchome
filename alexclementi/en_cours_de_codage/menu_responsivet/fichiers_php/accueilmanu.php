<!--Page d'accueil Welchome-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style.css" />
        <?php session_start(); ?>
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
		<title>Accueil</title>
	</head>
	
	<body>
	
		<header>
			<?php include("menus.php"); ?>
		</header>
		
		
		<div id="bloc_page">
		
			<div id="partie1">
				<h1>
					Vos vacances à portée de mains gratuitement
				</h1>
					<form action="moteur_de_recherche.php" method="Post">
						<input type="text" name="requete" placeholder="Saisir une destination"
						id="recherche_simple" />
					</form>
				<!-- <div id="bkcolor"></div> -->
			</div>
			
			<div id="partie2">
				<div class="h2_p2">
					<p>
						Proposez vos dates, échangez vos logements
					</p>
				</div>
				<div class="schema1">
                    <img src="../images_diverses/htmlcssjs_logo.png" class="html5_logo">
				</div>
			</div>
			
			<footer>
				<p>
				<!--FOOTER-->
				</p>
			</footer>
			
		</div>
	</body>
</html>