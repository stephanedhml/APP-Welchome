<!--barre de menu-->

<div class="menu_respo">
    <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
		<ul class="clearfix">
			<li><a href="accueilmanu.php" class="btn_ACCUEIL">Accueil</a></li>
			<li class="recherche_avancee"><a href="recherche_avancee.php">Recherche avancée</a></li>
			<li><a href="forum.php" class="btn_FORUM">Forum</a></li>
            <?php
				include("connexion_inscription_deconnexion_menu.php"); 
			?>
			<!--
			<a class="liendrapeau" href="?lang=fr"><img class="drapeau" src="../multilingue/drapeaufr.png" /></a>
			<a class="liendrapeau" href="?lang=en"><img class="drapeau" src="../multilingue/drapeauen.png" /></a> -->
			<?php include("../multilingue/choixlangue.php");?>
		</ul>
	</nav>
</div>