<!--barre de menu-->
<script type="text/javascript" src="../fichier_js/recherche_avancee.js"></script>
<link rel="stylesheet" href="../fichiers_css/recherche_app.css" />
<div class="menu_respo">
    <nav class="clearfix">
        <a href="#" id="pull">Menu</a>
        <ul class="clearfix">
            <?php include("../multilingue/choixlangue.php");?>
            <li><a class="lienaccueil" href="index.php"><img class="accueil" src="logo2.png" /></a></li>

            <li class="recherche_avancee"><a href="recherche_avancee.php" class="cl" <!-- onclick="affiche()" onmouseout="cacher()" --><?php echo rechercheavancee ?></a></li>

            <!-- <li class="recherche_avancee"><a href="recherche_avancee.php" onmouseover="affiche()" onmouseover="colorer(this)" onmouseout="cacher()"><?php// echo rechercheavancee ?></a></li> -->
            <li><a href="forum.php" class="btn_FORUM cl"><?php echo forum ?></a></li>
            <?php
            include("connexion_inscription_deconnexion_menu.php");
            ?>
            <li><a class="liendrapeau" href="?lang=fr"><img class="drapeau" src="../multilingue/drapeaufr.png" /></a></li>
            <li><a class="liendrapeau" href="?lang=en"><img class="drapeau" src="../multilingue/drapeauen.png" /></a></li>
        </ul>
    </nav>
</div>

<?php /* Le code qui était ici a été déplacé dans menu2.php, il posait beaucoup de problèmes avec les redirections dans la messagerie, pour explications demander à Manu */ ?>
