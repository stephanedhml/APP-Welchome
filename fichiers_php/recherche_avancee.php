<?php
include("config.php");
include("modeles.php");

session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="../style.css" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
        <title>Recherche avancée</title>
        </head>

    <body>
    <div class="header">
        <?php include("menus.php"); ?>
    </div>

    <div class="formulaire_r_avancee">
	<form method="post" action="cible_recherche.php">
<div class="container_advanced_search">
    <div class="bloc_search_left">
        <p>Dans quelle ville souhaitez-vous aller ?</p>
        <input type="text" name="ville" />
	   <p>Par quel(s) type(s) de logement êtes vous interessé?<br/>
           <div class="liste_deroulante1">
                <input type="checkbox" name="type1" id="case" value="studio"/> <label for="case">un studio</label><br/>
                <input type="checkbox" name="type2" id="case" value="appart"/> <label for="case">un appartement</label><br/>
                <input type="checkbox" name="type3" id="case" value="maison"/> <label for="case">une maison</label><br/>
                <input type="checkbox" name="type4" id="case" value="pavillon"/> <label for="case">un pavillon</label><br/>
                <input type="checkbox" name="type5" id="case" value="bungalow"/> <label for="case">un bungalow ou un gîte</label><br/>
                <input type="checkbox" name="type6" id="case" value="bateau"/> <label for="case">un bateau ou une péniche</label><br/>
                <input type="checkbox" name="type7" id="case" value="camping"/> <label for="case">un camping car</label><br/>
           </div>
            <br/>

        <p>Veuillez entrez les dates qui vous conviennent:<br/>
          de <input type="date" name="d1" placeholder="JJ/MM/AAAA"> à <input type="date" name="d2" placeholder="JJ/MM/AAAA"></p>
    </div>
    <div class="bloc_search_center">
        <p>Entrez la capacité d'accueil qui vous intéresse.<br/>
        <input type="number" name="capacite" value="Capacité d'accueil" min="0"></p>

        Combien de chambres voulez-vous?<br />
        <input type="number" name="nb_room" min="0"/>
        </p>

        <p>
            Combien de salles de bain voulez-vous ?<br />
            <input type="number" name="nb_bathroom" min="0" />
        </p>


        <p>Entrer la surface minimale du logement que vous souhaitez.<br/>
        <input type="number" name="surface_min" value="Surface minimale" min="0"></p>

        <p>Avez-vous des préférences parmi les propositions suivantes ?<br/>
        <input type="checkbox" name="lieu1" id="case" value="banlieu"/> <label for="case">Banlieue</label><br/>
        <input type="checkbox" name="lieu2" id="case" value="campagne"/> <label for="case">Campagne</label><br/>
        <input type="checkbox" name="lieu3" id="case" value="montagne"/> <label for="case">Montagne</label><br/>
        <input type="checkbox" name="lieu4" id="case" value="ville"/> <label for="case">Ville</label><br/></p>

    </div>

    <div class="bloc_search_right">

        <p>Cochez les attributs qui vous intéressent<br/><br/>
        <input type="checkbox" name="case01" id="case" value="animaux"/> <label for="case">Animaux acceptés</label><br/>
        <input type="checkbox" name="case02" id="case" value="clim"/> <label for="case">Climatisation</label><br/>
        <input type="checkbox" name="case03" id="case" value="chauffage"/> <label for="case">Chauffage</label><br/>
        <input type="checkbox" name="case04" id="case" value="laver"/> <label for="case">Machine à laver</label><br/>
        <input type="checkbox" name="case05" id="case" value="sèche linge"/> <label for="case">Sèche linge</label><br/>
        <input type="checkbox" name="case06" id="case" value="cheminée"/> <label for="case">Cheminée</label><br/>
        <input type="checkbox" name="case07" id="case" value="télé"/> <label for="case">Télévision</label><br/>
        <input type="checkbox" name="case08" id="case" value="parking"/> <label for="case">Parking</label><br/>
        <input type="checkbox" name="case09" id="case" value="piscine"/> <label for="case">Piscine</label><br/>
        <input type="checkbox" name="case010" id="case" value="jardin"/> <label for="case">Jardin</label><br/>
        <input type="checkbox" name="case011" id="case" value="balcon"/> <label for="case">Balcon</label><br/>
        <input type="checkbox" name="case012" id="case" value="wifi"/> <label for="case">Internet en wifi</label><br/><br/></p>

            <p><input type="submit" value="Valider" id="btn_valider"/></p><br/>

    </div>
</div>
</form>
        </div>
    <?php
    include("footer.php");
    ?>
    </body>
</html>
