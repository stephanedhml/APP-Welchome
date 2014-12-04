<!--Page d'accueil Welchome-->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
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
		
			<?php include("carrousel.php"); ?>
			
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
			
			<!--<div id="partie3">
				<?php //include '../carrousel_annonce/derniereannonce.php' ?>
			</div>-->

			<footer>
				<p>
				<!--FOOTER-->
				</p>
			</footer>
			
		</div>
	</body>
</html>