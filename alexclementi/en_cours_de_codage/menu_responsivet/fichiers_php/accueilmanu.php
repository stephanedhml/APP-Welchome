<!--Page d'accueil Welchome-->

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style.css" />
		<script type="text/javascript" src="../carrousel/jquery.js"></script>
		<script type="text/javascript" src="../carrousel/carrousel.js"></script>
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
				<div id="slide1" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide2" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide3" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide4" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide5" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide6" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
				
				<div id="slide7" class="slide">
					<h1>
						Vos vacances à portée de mains gratuitement
					</h1>
						<form action="moteur_de_recherche.php" method="Post">
							<input type="text" name="requete" placeholder="Saisir une destination"
							id="recherche_simple" />
						</form>
					<!-- <div id="bkcolor"></div> -->
				</div>
			</div>	
			
			<!--<div class="navigation">
				<span>1</span>
				<span>2</span>
				<span>3</span>
				<span>4</span>
				<span>5</span>
				<span>6</span>
				<span>7</span>
			</div>
			-->
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