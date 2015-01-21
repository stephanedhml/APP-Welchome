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
        <?php include("menu2.php"); ?>
    </div>
<div class="superglobal">
<div class="global">
    <div class="forum_title"><h7>RECHERCHE AVANCÉE</h7></div>
    <div id="form_rech" class="formulaire_r_avancee">
	<form method="post" action="cible_recherche.php">
<div class="container_advanced_search">
    <div class="bloc_search_left">
        <p><?php echo choixville;?></p>
        <input type="text" name="ville" />
	   <p><?php echo choixlogement; ?><br/>
           <div class="liste_deroulante1">
                <input type="checkbox" name="type1" id="case" /> <label for="case"><?php echo studio;?></label><br/>
                <input type="checkbox" name="type2" id="case" /> <label for="case"><?php echo appartement;?></label><br/>
                <input type="checkbox" name="type3" id="case" /> <label for="case"><?php echo maison;?></label><br/>
                <input type="checkbox" name="type4" id="case" /> <label for="case"><?php echo pavillon;?></label><br/>
                <input type="checkbox" name="type5" id="case" /> <label for="case"><?php echo bungalow;?></label><br/>
                <input type="checkbox" name="type6" id="case" /> <label for="case"><?php echo bateau;?></label><br/>
                <input type="checkbox" name="type7" id="case" /> <label for="case"><?php echo campingcar;?></label><br/>
           </div>
            <br/>
        <!--
        <p><?php echo choixdates;?><br/>
          <?php echo de;?> <input type="date" name="d1" placeholder="JJ/MM/AAAA"> <?php echo à;?> <input type="date" name="d2" placeholder="JJ/MM/AAAA"></p>
        -->
    </div>
    <div class="bloc_search_center">
        <p><?php echo capacitéaccueil;?><br/>
        <input type="number" name="capacite" value="Capacité d'accueil" min="0"></p>

        <?php echo nbchambres;?><br />
        <input type="number" name="nb_room" min="0"/>
        </p>

        <p>
            <?php echo nbsallesbain;?><br />
            <input type="number" name="nb_bathroom" min="0" />
        </p>


        <p><?php echo surfacemin;?><br/>
        <input type="number" name="surface_min" value="Surface minimale" min="0"></p></br>

        <!--
        <p><?php echo choixpreferences;?><br/>
        <input type="checkbox" name="lieu1" id="case" value="banlieu"/> <label for="case"><?php echo banlieue;?></label><br/>
        <input type="checkbox" name="lieu2" id="case" value="campagne"/> <label for="case"><?php echo campagne;?></label><br/>
        <input type="checkbox" name="lieu3" id="case" value="montagne"/> <label for="case"><?php echo montagne;?></label><br/>
        <input type="checkbox" name="lieu4" id="case" value="ville"/> <label for="case"><?php echo ville;?></label><br/></p>
        -->
        <p>Nom du logement</br>
            <input type="texte" name="nom_log" id="nmlgt"/></p><br/>
    </div>

    <div class="bloc_search_right">

        <p><?php echo choixattribut;?><br/><br/>
        <!-- <input type="checkbox" name="case01" id="case" value="animaux"/> <label for="case"><?php echo animaux;?></label><br/>
        <input type="checkbox" name="case02" id="case" value="clim"/> <label for="case"><?php echo climatisation;?></label><br/>
        <input type="checkbox" name="case03" id="case" value="chauffage"/> <label for="case"><?php echo chauffage;?></label><br/>
        <input type="checkbox" name="case04" id="case" value="laver"/> <label for="case"><?php echo machinelaver;?></label><br/>
        <input type="checkbox" name="case05" id="case" value="sèche linge"/> <label for="case"><?php echo sechelinge;?></label><br/>
        <input type="checkbox" name="case06" id="case" value="cheminée"/> <label for="case"><?php echo cheminee;?></label><br/>
        <input type="checkbox" name="case07" id="case" value="télé"/> <label for="case"><?php echo tele;?></label><br/>
        <input type="checkbox" name="case08" id="case" value="parking"/> <label for="case"><?php echo parking;?></label><br/>
        <input type="checkbox" name="case09" id="case" value="piscine"/> <label for="case"><?php echo piscine;?></label><br/>
        <input type="checkbox" name="case010" id="case" value="jardin"/> <label for="case"><?php echo jardin;?></label><br/>
        <input type="checkbox" name="case011" id="case" value="balcon"/> <label for="case"><?php echo balcon;?></label><br/>
        <input type="checkbox" name="case012" id="case" value="wifi"/> <label for="case"><?php echo internet;?></label><br/><br/></p> -->

            <label for="television"><?php echo tele; ?></label><br/>
            <select name="television">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>
            <label for="machine_a_laver"><?php echo machinelaver; ?></label><br/>
            <select name="machine_a_laver">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>
            <label for="parking"><?php echo parking; ?></label><br/>
            <select name="parking">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>
            <label for="climatisation"><?php echo climatisation; ?></label><br/>
            <select name="climatisation">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>
            <label for="piscine"><?php echo piscine; ?></label><br/>
            <select name="piscine">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>
            <label for="jardin"><?php echo jardin; ?></label><br/>
            <select name="jardin">
                <OPTION></option>
                <OPTION><?php echo yes; ?></option>
                <OPTION><?php echo no; ?></option>
            </select><br/>

            <p><input type="submit" value="<?php echo valider;?>" id="btn_valider"/></p><br/>

    </div>
</div>
</form>
        </div>
</div>
</div>
    <?php
    include("footer2.php");
    ?>
    </body>
</html>
