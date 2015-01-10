<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>


<?php

if (isset($_FILES["up_avatar"])) {
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

if (isset($_POST["description"])) {
    $desc = $bdd -> prepare("UPDATE users SET description=:description WHERE id_users=:id_user");
    $desc -> execute(array(
        'description' => $_POST['description'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["tel"])) {
    $desc = $bdd -> prepare("UPDATE users SET tel=:tel WHERE id_users=:id_user");
    $desc -> execute(array(
        'tel' => $_POST['tel'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["metier"])) {
    $desc = $bdd -> prepare("UPDATE users SET profession=:profession WHERE id_users=:id_user");
    $desc -> execute(array(
        'profession' => $_POST['metier'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["sexe"])) {
    $desc = $bdd -> prepare("UPDATE users SET sexe=:sexe WHERE id_users=:id_user");
    $desc -> execute(array(
        'sexe' => $_POST['sexe'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["situation"])) {
    $desc = $bdd -> prepare("UPDATE users SET situation=:situation WHERE id_users=:id_user");
    $desc -> execute(array(
        'situation' => $_POST['situation'],
        'id_user' => $_SESSION['userid'],
    ));
}

// Logement

if (isset($_POST["localisation"])) {
    $desc = $bdd -> prepare("UPDATE logement SET localisation=:localisation WHERE id_users=:id_user");
    $desc -> execute(array(
        'localisation' => $_POST['localisation'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["description_logement"])) {
    $desc = $bdd -> prepare("UPDATE logement SET description_logement=:description WHERE id_users=:id_user");
    $desc -> execute(array(
        'description' => $_POST['description_logement'],
        'id_user' => $_SESSION['userid'],
    ));
}
if (isset($_POST["type_logement"])) {
    $desc = $bdd -> prepare("UPDATE logement SET type_logement=:type_logement WHERE id_users=:id_user");
    $desc -> execute(array(
        'type_logement' => $_POST['type_logement'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["nom_maison"])) {
    $desc = $bdd -> prepare("UPDATE logement SET nom_maison=:nom_maison WHERE id_users=:id_user");
    $desc -> execute(array(
        'nom_maison' => $_POST['nom_maison'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["nombre_voyageurs"])) {
    $desc = $bdd -> prepare("UPDATE logement SET nombre_voyageurs=:nombre_voyageurs WHERE id_users=:id_user");
    $desc -> execute(array(
        'nombre_voyageurs' => $_POST['nombre_voyageurs'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["nombre_chambres"])) {
    $desc = $bdd -> prepare("UPDATE logement SET nb_chambres=:nombre_chambres WHERE id_users=:id_user");
    $desc -> execute(array(
        'nombre_chambres' => $_POST['nombre_chambres'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["nb_salles_bains"])) {
    $desc = $bdd -> prepare("UPDATE logement SET nb_salles_bains=:nb_salles_bains WHERE id_users=:id_user");
    $desc -> execute(array(
        'nb_salles_bains' => $_POST['nb_salles_bains'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["superficie"])) {
    $desc = $bdd -> prepare("UPDATE logement SET superficie=:superficie WHERE id_users=:id_user");
    $desc -> execute(array(
        'superficie' => $_POST['superficie'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["date_début_disponibilite"])) {
    $desc = $bdd -> prepare("UPDATE logement SET date_début_disponibilite=:date_début_disponibilite WHERE id_users=:id_user");
    $desc -> execute(array(
        'date_début_disponibilite' => $_POST['date_début_disponibilite'],
        'id_user' => $_SESSION['userid'],
    ));
}

if (isset($_POST["date_fin_disponibilite"])) {
    $desc = $bdd -> prepare("UPDATE logement SET date_fin_disponibilite=:date_fin_disponibilite WHERE id_users=:id_user");
    $desc -> execute(array(
        'date_fin_disponibilite' => $_POST['date_fin_disponibilite'],
        'id_user' => $_SESSION['userid'],
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
    <form action="edit_profile.php" method="post" enctype="multipart/form-data">
        <label for="username" id="username_form">Edition profil</label><br/>
        <label for="avatar">Image perso</label><br/>
        <input type="file" name="up_avatar" id="up_avatar"><br />
        <label for="description">Description</label><br/>
        <input type="text" name="description"/><br/>
        <label for="username" id="username_form">Sexe</label></br>
        <SELECT name="sexe" size="1">
            <OPTION>Homme
            <OPTION>Femme
            <OPTION>Autre
        </SELECT></br>
        <label for="tel">Numéro de Téléphone</label></br>
        <input type="tel" name="tel" /><br/>
        <label for="profession">Profession</label><br/>
        <input type="text" name="metier"/><br/>
        <label for="situation">Situation</label><br/>
        <SELECT name="situation" size="1">
            <OPTION>Célibataire
            <OPTION>Couple
            <OPTION>Marié
        </SELECT></br>

        <!-- Logement -->
        <label for="localisation">Localisation</label><br/>
        <input type="text" name="localisation"/><br/>
        <label for="description_logement">Description du logement</label><br/>
        <input type="text" name="description_logement"/><br/>
        <label for="type_logement">Type de logement</label><br/>
        <select name="type_logement" id="choix">
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
        <!-- CHAMPS POUR DATES DISPO LOGEMENT
        <label for="date_début_disponibilite">Date de début de disponibilité</label><br/>
        <input type="date" name="date_début_disponibilite"/><br/>
        <label for="date_fin_disponibilite">Date de fin de disponibilité</label><br/>
        <input type="date" name="date_fin_disponibilite"/><br/> -->

        <input type="submit" value="Valider les modifications" id="btn_connexion" /><br/><br/>
    </form>
</body>
