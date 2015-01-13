<!--barre de menu-->
<script type="text/javascript" src="../fichier_js/recherche_avancee.js"></script>
<link rel="stylesheet" href="../fichiers_css/recherche_app.css" />
<div class="menu_respo">
    <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
		<ul class="clearfix">
			<?php include("../multilingue/choixlangue.php");?>
            <li><a class="lienaccueil" href="index.php"><img class="accueil" src="logo2.png" /></a></li>

<li class="recherche_avancee "><a href="recherche_avancee.php" class="cl" onmouseover="affiche()" onmouseout="cacher()"><?php echo rechercheavancee ?></a></li>

			<!--<li class="recherche_avancee"><a href="recherche_avancee.php" onmouseover="affiche()" onmouseover="colorer(this)" onmouseout="cacher()"><?php// echo rechercheavancee ?></a></li>-->
			<li><a href="forum.php" class="btn_FORUM cl"><?php echo forum ?></a></li>
            <?php
				include("connexion_inscription_deconnexion_menu.php"); 
			?>
			<li><a class="liendrapeau" href="?lang=fr"><img class="drapeau" src="../multilingue/drapeaufr.png" /></a></li>
			<li><a class="liendrapeau" href="?lang=en"><img class="drapeau" src="../multilingue/drapeauen.png" /></a></li>
		</ul>
	</nav>
</div>
<div id='form_rech'  class="formulaire_r_avancee1"  onmouseover="affiche()" onmouseout="cacher()" onsubmit="cacher()">
	<form method="post" action="cible_recherche.php">
		<div class="container_advanced_search1"  >
			<div class="bloc_search_left1">
				<p><?php echo choixville;?></p>
				<input type="text" name="ville" />
				<p><?php echo choixlogement; ?><br/>
				<div class="liste_deroulante1">
					<input type="checkbox" name="type1" id="case" value="studio"/> <label for="case"><?php echo studio;?></label><br/>
					<input type="checkbox" name="type2" id="case" value="appart"/> <label for="case"><?php echo appartement;?></label><br/>
					<input type="checkbox" name="type3" id="case" value="maison"/> <label for="case"><?php echo maison;?></label><br/>
					<input type="checkbox" name="type4" id="case" value="pavillon"/> <label for="case"><?php echo pavillon;?></label><br/>
					<input type="checkbox" name="type5" id="case" value="bungalow"/> <label for="case"><?php echo bungalow;?></label><br/>
					<input type="checkbox" name="type6" id="case" value="bateau"/> <label for="case"><?php echo bateau;?></label><br/>
					<input type="checkbox" name="type7" id="case" value="camping"/> <label for="case"><?php echo campingcar;?></label><br/>
				</div>
				<br/>
				<!--
        <p><?php echo choixdates;?><br/>
          <?php echo de;?> <input type="date" name="d1" placeholder="JJ/MM/AAAA"> <?php echo à;?> <input type="date" name="d2" placeholder="JJ/MM/AAAA"></p>
        -->
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

				<!--
        <p><?php echo choixpreferences;?><br/>
        <input type="checkbox" name="lieu1" id="case" value="banlieu"/> <label for="case"><?php echo banlieue;?></label><br/>
        <input type="checkbox" name="lieu2" id="case" value="campagne"/> <label for="case"><?php echo campagne;?></label><br/>
        <input type="checkbox" name="lieu3" id="case" value="montagne"/> <label for="case"><?php echo montagne;?></label><br/>
        <input type="checkbox" name="lieu4" id="case" value="ville"/> <label for="case"><?php echo ville;?></label><br/></p>
        -->

			</div>

			<div class="bloc_search_right1">

				<p><input type="submit" value="<?php echo valider;?>" id="btn_valider"/></p><br/>

			</div>
		</div>
	</form>
</div>