<!--barre de menu-->

<div class="menu_respo">
    <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
		<ul class="clearfix">
			<li><a href="../fichiers_php/accueilmanu.php">Accueil</a></li>
			<li><a href="../fichiers_php/profil.php">Profil</a></li>
			<li class="recherche_avancee"><a href="../fichiers_php/recherche_avancee.php">Recherche avancée</a></li>
			<li><a href="#">Forum</a></li>
            <?php
				include("../fichiers_php/connexion_inscription_deconnexion_menu.php"); 
			?>
		</ul>
	</nav>
</div>