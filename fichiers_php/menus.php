<!--barre de menu-->
<script type="text/javascript" src="../fichier_js/recherche_avancee.js"></script>
<link rel="stylesheet" href="../fichiers_css/recherche_app.css" />
<div class="menu_respo">
    <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
		<ul class="clearfix">
			<?php include("../multilingue/choixlangue.php");?>
            <li><a class="lienaccueil" href="index.php"><img class="accueil" src="logo2.png" /></a></li>

            <li class="recherche_avancee"><a href="recherche_avancee.php" onmouseover="affiche()"  class="cl" ><?php echo rechercheavancee ?></a></li>

			<!-- <li class="recherche_avancee"><a href="recherche_avancee.php" onmouseover="affiche()" onmouseover="colorer(this)" onmouseout="cacher()"><?php// echo rechercheavancee ?></a></li> -->
			<li><a href="forum.php" class="btn_FORUM cl"><?php echo forum ?></a></li>
		

            <?php
				include("connexion_inscription_deconnexion_menu.php"); 
			?>
		</ul>
	</nav>
</div>



<div id='formrech'  class="formulaire_r_av"  onmouseover="affiche()" onmouseout="cacher()" onsubmit="cacher()">
	<form method="post" action="cible_recherche.php">
		<div class="container_advanced_sea"  >
			<div class="bloc_search_left1">
				<p><?php echo choixville;?></p>
				<input type="text" name="ville" />
				<p><?php echo choixlogement; ?><br/>
				<div class="liste_deroulante1">
					<div class="col1">
						<input type="checkbox" name="type1" id="case" /> <label for="case"><?php echo studio;?></label><br/>
						<input type="checkbox" name="type2" id="case" /> <label for="case"><?php echo appartement;?></label><br/>
						<input type="checkbox" name="type3" id="case" /> <label for="case"><?php echo maison;?></label><br/>
						<input type="checkbox" name="type4" id="case" /> <label for="case"><?php echo pavillon;?></label><br/>
					</div>
					<div class="col2">
						<input type="checkbox" name="type5" id="case" /> <label for="case"><?php echo bungalow;?></label><br/>
						<input type="checkbox" name="type6" id="case" /> <label for="case"><?php echo bateau;?></label><br/>
						<input type="checkbox" name="type7" id="case" /> <label for="case"><?php echo campingcar;?></label><br/>
					</div>
				</div>
				<br/>


			</div>
			<div class="bloc_search_center1">
				<p><?php echo capacitéaccueil;?>
					<input type="number" class="in" name="capacite" value="Capacité d'accueil" min="0"></p>

				<?php echo nbchambres;?>
				<input type="number" class="in" name="nb_room" min="0"/>
				</p>

				<p>
					<?php echo nbsallesbain;?>
					<input type="number" class="in" name="nb_bathroom" min="0" />
				</p>


				<p><?php echo surfacemin;?>
					<input type="number" class="in" name="surface_min" value="Surface minimale" min="0"></p>

				<p><?php echo choixpreferences;?><br/>
					<div class="coll1">
					<input type="checkbox" name="lieu1" id="case" value="banlieu"/> <label for="case"><?php echo banlieue;?></label><br/>
					<input type="checkbox" name="lieu2" id="case" value="campagne"/> <label for="case"><?php echo campagne;?></label><br/>
				</div>
				<div class="coll2"
					<input type="checkbox" name="lieu3" id="case" value="montagne"/> <label for="case"><?php echo montagne;?></label><br/>
					<input type="checkbox" name="lieu4" id="case" value="ville"/> <label for="case"><?php echo ville;?></label><br/></p>
			</div>

			</div>

			<div class="bloc_search_right1"></br>


				<p>Nom du logement
					<input type="texte" name="nom_log" value="" id="nmlgt"/></p><br/>

				<p><input type="submit" value="<?php echo valider;?>" id="btn_valider"/></p><br/>

			</div>
		</div>
	</form>
