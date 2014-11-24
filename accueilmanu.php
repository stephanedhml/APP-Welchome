<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styleaccueil.css" />
        <?php include("menu_responsivet/menu_responsive.js"); ?>
		<title>Accueil</title>
	</head>
	
	<body>
		<header>
        <?php include("menu_responsivet/menus.php"); ?>
		</header>
		
		
	<div id="bloc_page">
			<div id="partie1">
			
					<h1>
					Vos vacances à portée de mains gratuitement
					</h1>
					
					<form method="post" action="accueilmanu_recherche.php">
						<p>
							<input type="text" name="recherche_simple" placeholder="Rechercher" id="recherche_simple" />
						</p>
					</form>	
			<!-- <div id="bkcolor"></div> -->
			</div>
			<div id="partie2">
				<div class="h2_p2">
				<p>Proposez vos dates, échangez vos logements</p>
				</div>

                <div class="schema1">
                    <img src="htmlcssjs_logo.png" class="html5_logo">
                </div>
			</div>
			
		<footer>
			<p>
			
			</p>
		</footer>
	</div>
	</body>
</html>