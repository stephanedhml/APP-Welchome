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

                    <div id="wrapper" >



                        <div class="carrousel">
                            <div class="plan p1"><img src="../wall/wall7.jpg" alt="" class="w1"></div>
                            <div class="plan p2"><img src="../wall/wall6.jpg" alt="" class="w2"></div>
                            <div class="plan p3"><img src="../wall/wall5.jpg" alt="" class="w3"></div>
                            <div class="plan p4"><img src="../wall/wall4.jpg" alt="" class="w4"></div>
                            <div class="plan p5"><img src="../wall/wall3.jpg" alt="" class="w5"></div>
                            <div class="plan p6"><img src="../wall/wall2.jpeg" alt="" class="w6"></div>
                            <div class="plan p7"><img src="../wall/wall1.jpg" alt="" class="w7"></div>
                            <div class="plan p8"><img src="../wall/wall4.jpg" alt="" class="w8"></div>
                        </div>

                    </div>
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