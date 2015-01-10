<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>


<?php

if (isset($_FILES["up_avatar"]) AND $_FILES["up_avatar"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
    $up_avatar_folder = "../photos_utilisateurs/{$_SESSION['userid']}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['up_avatar']['tmp_name'], $up_avatar_folder);
//On ajoute la photo de profil dans la BDD
    try {
        $res = $bdd->prepare("UPDATE users SET avatar= '../photos_utilisateurs/{$_SESSION['userid']}.jpg' WHERE id_users=?");
        $res->execute(array($_SESSION['userid']));
    } catch(Exception $e){
        var_dump($e);
    }
}

if (isset($_POST["description"]) AND $_POST["description"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET description=:description WHERE id_users=:id_user");
    $desc -> execute(array(
        'description' => $_POST['description'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["tel"])AND $_POST["tel"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET tel=:tel WHERE id_users=:id_user");
    $desc -> execute(array(
        'tel' => $_POST['tel'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["metier"])AND $_POST["metier"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET profession=:profession WHERE id_users=:id_user");
    $desc -> execute(array(
        'profession' => $_POST['metier'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["sexe"])AND $_POST["sexe"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET sexe=:sexe WHERE id_users=:id_user");
    $desc -> execute(array(
        'sexe' => $_POST['sexe'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["situation"])AND $_POST["situation"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET situation=:situation WHERE id_users=:id_user");
    $desc -> execute(array(
        'situation' => $_POST['situation'],
        'id_user' => $_SESSION['userid'],
    ));
}

// Logement

if (isset($_POST["localisation"])AND $_POST["localisation"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET localisation=:localisation WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'localisation' => $_POST['localisation'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["description_logement"])AND $_POST["description_logement"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET description_logement=:description WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'description' => $_POST['description_logement'],
        'id_logement' => $_GET['choix_logement'],
    ));
}
if (isset($_POST["type_logement"]) AND $_POST["type_logement"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET type_logement=:type_logement WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'type_logement' => $_POST['type_logement'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["nom_maison"])AND $_POST["nom_maison"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET nom_maison=:nom_maison WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'nom_maison' => $_POST['nom_maison'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["nombre_voyageurs"])AND $_POST["nombre_voyageurs"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET nombre_voyageurs=:nombre_voyageurs WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'nombre_voyageurs' => $_POST['nombre_voyageurs'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["nombre_chambres"])AND $_POST["nombre_chambres"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET nb_chambres=:nombre_chambres WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'nombre_chambres' => $_POST['nombre_chambres'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["nb_salles_bains"])AND $_POST["nb_salles_bains"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET nb_salles_bains=:nb_salles_bains WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'nb_salles_bains' => $_POST['nb_salles_bains'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["superficie"])AND $_POST["superficie"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET superficie=:superficie WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'superficie' => $_POST['superficie'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["date_début_disponibilite"])AND $_POST["date_début_disponibilite"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET date_début_disponibilite=:date_début_disponibilite WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'date_début_disponibilite' => $_POST['date_début_disponibilite'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["date_fin_disponibilite"])AND $_POST["date_fin_disponibilite"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE logement SET date_fin_disponibilite=:date_fin_disponibilite WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'date_fin_disponibilite' => $_POST['date_fin_disponibilite'],
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["television"])AND $_POST["television"]!=NULL ) {
    if ($_POST["television"]=='Oui') {$tele=1;} else {$tele=0;}
    $desc = $bdd -> prepare("UPDATE logement SET television=:television WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'television' => $tele,
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["machine_a_laver"])AND $_POST["machine_a_laver"]!=NULL ) {
    if ($_POST["machine_a_laver"]=='Oui') {$vari=1;} elseif ($_POST["television"]='Non') {$vari=0;}
    $desc = $bdd -> prepare("UPDATE logement SET machine_a_laver=:machine_a_laver WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'machine_a_laver' => $vari,
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["parking"])AND $_POST["parking"]!=NULL ) {
    if ($_POST["parking"]=='Oui') {$vari=1;} elseif ($_POST["television"]='Non') {$vari=0;}
    $desc = $bdd -> prepare("UPDATE logement SET parking=:parking WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'parking' => $vari,
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["climatisation"])AND $_POST["climatisation"]!=NULL ) {
    if ($_POST["climatisation"]=='Oui') {$vari=1;} elseif ($_POST["television"]='Non') {$vari=0;}
    $desc = $bdd -> prepare("UPDATE logement SET climatisation=:climatisation WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'climatisation' => $vari,
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["piscine"])AND $_POST["piscine"]!=NULL ) {
    if ($_POST["piscine"]=='Oui') {$vari=1;} elseif ($_POST["television"]='Non') {$vari=0;}
    $desc = $bdd -> prepare("UPDATE logement SET piscine=:piscine WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'piscine' => $vari,
        'id_logement' => $_GET['choix_logement'],
    ));
}

if (isset($_POST["jardin"])AND $_POST["jardin"]!=NULL ) {
    if ($_POST["jardin"]=='Oui') {$vari=1;} elseif ($_POST["television"]='Non') {$vari=0;}
    $desc = $bdd -> prepare("UPDATE logement SET jardin=:jardin WHERE id_logement=:id_logement");
    $desc -> execute(array(
        'jardin' => $vari,
        'id_logement' => $_GET['choix_logement'],
    ));
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="stylesheet" href="../fichiers_css/annonce.css"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="js/owlcarroussel/owl.carousel.css" rel="stylesheet">
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Edition Profil</title>
</head>

<body>
    <div class="header">
        <?php include("menus.php"); ?>
    </div>
    <div class="edit_profil">

    <?php
        if (isset($_GET['choix'])) {echo "";} else {
    ?>
            <div class="left_half">
                <div class="left_carre"><a href="edit_profile.php?choix=1"><p>Editer votre profil</p></a></div>
            </div>
            <div class="right_half">
                <div class="right_carre"><a href="edit_profile.php?choix=2"><p>Ajouter/modifier un logement</p></a></div>
            </div>
    <?php } ?>

    <?php
        if (isset($_GET['choix']) AND $_GET["choix"]==2) {

            $ret = $bdd -> prepare("SELECT * FROM logement WHERE id_users=?");
            $ret -> execute(array($_SESSION["userid"]));
            $nmber = $ret -> rowCount();

            for ($i=0 ; $i < $nmber ; $i++) {
                $house = $ret -> fetch();
                    ?>

            <a href="edit_profile.php?choix_logement=<?php echo $house[0]; ?>"><?php echo $house["nom_maison"] ; ?></a>

    <?php } } ?>

    <?php if (isset($_GET["choix"]) AND $_GET["choix"]==1) { ?>
<div class="container_edit_profil">
    <form action="edit_profile.php?choix=1" method="post" enctype="multipart/form-data">
    <div class="bloc_search_left">
        <label for="avatar">Image perso</label><br/>
        <input type="file" name="up_avatar" id="up_avatar"><br />
        <label for="description">Description</label><br/>
        <input type="text" name="description"/><br/>
        <label for="username" id="username_form">Sexe</label></br>
        <SELECT name="sexe" size="1">
            <OPTION></OPTION>
            <OPTION>Homme</OPTION>
            <OPTION>Femme</OPTION>
            <OPTION>Autre</OPTION>
        </SELECT></br>
        <label for="tel">Numéro de Téléphone</label></br>
        <input type="tel" name="tel" /><br/>
        <label for="profession">Profession</label><br/>
        <input type="text" name="metier"/><br/>
        <label for="situation">Situation</label><br/>
        <SELECT name="situation" size="1">
            <OPTION></OPTION>
            <OPTION>Célibataire</OPTION>
            <OPTION>Couple</OPTION>
            <OPTION>Marié</OPTION>
        </SELECT></br>
        <input type="submit" value="Valider les modifications" id="btn_validation_edit" /><br/><br/>
    </div>

    <!-- Afficher les informations actuelles de l'utilisateur -->
    <?php $req = $bdd -> prepare("SELECT * FROM users WHERE id_users=?"); $req -> execute(array($_SESSION['userid'])); $donnees = $req -> fetch(); ?>
    <div class="bloc_edit_user_right">
        <?php echo '<img   src="'.$donnees ['avatar'].'"  class="profil">'  ?>
        <p>Description : <?php echo $donnees['description'] ;?></p>
        <p>E-mail: <?php if ($donnees['email']!=NULL) { echo $donnees['email'] ;} else {echo "Non renseigné";}?></p>
        <p>Sexe : <?php if ($donnees['sexe']!=NULL) {echo $donnees['sexe'] ;}?></p>
        <p>Tel: <?php if ($donnees['tel']!=NULL) { echo $donnees['tel'] ;} else {echo "Non renseigné";}?></p>
        <p> Profession: <?php if ($donnees['profession']!=NULL) { echo $donnees['profession'] ;} else {echo "Non renseigné";}?> </p>
        <p>Situation: <?php if ($donnees['situation']!=NULL) { echo $donnees['situation'] ;} else {echo "Non renseigné";}?></p>
    </div>

    <?php } ?>
        <!-- Logement -->

    <?php
        if (isset($_GET["choix_logement"])) {
    ?>
<div class="container_edit_profil">
    <form action="edit_profile.php?choix_logement=<?php echo $_GET["choix_logement"]; ?>" method="post" enctype="multipart/form-data">
    <div class="bloc_search_left">
        <label for="localisation">Localisation</label><br/>
        <input type="text" name="localisation"/><br/>
        <label for="description_logement">Description du logement</label><br/>
        <input type="text" name="description_logement"/><br/>
        <label for="type_logement">Type de logement</label><br/>
        <select name="type_logement" id="choix">
            <OPTION></OPTION>
            <option value="Studio">studio</option>
            <option value="Appartement">appartement</option>
            <option value="Maison">maison</option>
            <option value="Pavillon">pavillon</option>
            <option value="Bungalow/gite">bungalow</option>
            <option value="Bateau/péniche">bateau</option>
            <option value="Camping car">caming car</option>
        </select><br/>
        <label for="nom_maison">Nom maison</label><br/>
        <input type="text" name="nom_maison"/><br/>
        <label for="nombre_voyageurs">Nombre de voyageurs permis</label><br/>
        <input type="number" name="nombre_voyageurs"/><br/>
        <label for="nombre_chambres">Nombre de chambres</label><br/>
        <input type="number" name="nombre_chambres"/><br/>
        <label for="nb_salles_bains">Nombre de salles de bain</label><br/>
        <input type="number" name="nb_salles_bains"/><br/>
        <label for="superficie">Superficie (en m2)</label><br/>
        <input type="number" name="superficie"/><br/>

    </div>

    <!-- Critères logement -->

    <div class="bloc_search_center">

        <label for="television">Télévision</label><br/>
        <select name="television">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>
        <label for="machine_a_laver">Machine à laver</label><br/>
        <select name="machine_a_laver">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>
        <label for="parking">Parking</label><br/>
        <select name="parking">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>
        <label for="climatisation">Climatisation</label><br/>
        <select name="climatisation">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>
        <label for="piscine">Piscine</label><br/>
        <select name="piscine">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>
        <label for="jardin">Jardin</label><br/>
        <select name="jardin">
            <OPTION></option>
            <OPTION>Oui</option>
            <OPTION>Non</option>
        </select><br/>

        <!-- CHAMPS POUR DATES DISPO LOGEMENT
        <label for="date_début_disponibilite">Date de début de disponibilité</label><br/>
        <input type="date" name="date_début_disponibilite"/><br/>
        <label for="date_fin_disponibilite">Date de fin de disponibilité</label><br/>
        <input type="date" name="date_fin_disponibilite"/><br/> -->

        <input type="submit" value="Valider les modifications" id="btn_validation_edit" /><br/><br/>
    </div>

        <!-- Afficher les informations actuelles de l'utilisateur -->
        <?php $req = $bdd -> prepare("SELECT * FROM logement NATURAL JOIN Photo WHERE id_logement=?"); $req -> execute(array($_GET["choix_logement"])); $donnees1 = $req -> fetch(); ?>

    <div class="bloc_edit_logement_right">

        <?php echo '<img src="'.$donnees1 ['lien_photo'].'" class="photo_edit_actual_house">' ?>
        <p>Localisation : <?php echo $donnees1[2]; ?></p></br>
        <p>Nom maison : <?php echo $donnees1[4]; ?></p></br>
        <p>Nombre voyageurs : <?php echo $donnees1[5]; ?></p></br>
        <p>Type logement : <?php echo $donnees1[6]; ?></p></br>
        <p>Nombre chambres : <?php echo $donnees1[7]; ?></p></br>
        <p>Nombre salles de bain : <?php echo $donnees1[8]; ?></p></br>
        <p>Superficie : <?php echo $donnees1[9]; ?> m²</p></br>
        <p>Description du logement : <?php echo $donnees1[10]; ?></p></br>
        <p>Télévision : <?php if ($donnees1[15] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p>Machine à laver : <?php if ($donnees1[16] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p>Parking : <?php if ($donnees1[17] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p>Climatisation : <?php if ($donnees1[18] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p>Piscine : <?php if ($donnees1[19] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p>Jardin : <?php if ($donnees1[20] = 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>



    </div>
        <?php } ?>
</div>
    </form>
</body>
