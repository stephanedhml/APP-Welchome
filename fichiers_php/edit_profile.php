<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>


<?php
//On différencie l'admin d'un utilisateur lambda

if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) {$id_user=$_GET['id_user'];} else {$id_user=$_SESSION['userid'];}

if (isset($_FILES["up_avatar"]) AND $_FILES["up_avatar"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
    $up_avatar_folder = "../photos_utilisateurs/{$id_user}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['up_avatar']['tmp_name'], $up_avatar_folder);
//On ajoute la photo de profil dans la BDD
        $res = $bdd->prepare("UPDATE users SET avatar= '../photos_utilisateurs/{$id_user}.jpg' WHERE id_users=?");
        $res->execute(array($id_user));
    }

if (isset($_POST["description"]) AND $_POST["description"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET description=:description WHERE id_users=:id_user");
    $desc -> execute(array(
        'description' => $_POST['description'],
        'id_user' => $id_user,
    ));
}

if (isset($_POST["tel"])AND $_POST["tel"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET tel=:tel WHERE id_users=:id_user");
    $desc -> execute(array(
        'tel' => $_POST['tel'],
        'id_user' => $id_user,
    ));
}

if (isset($_POST["metier"])AND $_POST["metier"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET profession=:profession WHERE id_users=:id_user");
    $desc -> execute(array(
        'profession' => $_POST['metier'],
        'id_user' => $id_user,
    ));
}

if (isset($_POST["sexe"])AND $_POST["sexe"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET sexe=:sexe WHERE id_users=:id_user");
    $desc -> execute(array(
        'sexe' => $_POST['sexe'],
        'id_user' => $id_user,
    ));
}

if (isset($_POST["situation"])AND $_POST["situation"]!=NULL ) {
    $desc = $bdd -> prepare("UPDATE users SET situation=:situation WHERE id_users=:id_user");
    $desc -> execute(array(
        'situation' => $_POST['situation'],
        'id_user' => $id_user,
    ));
}

// Logement MAJ
if (isset($_GET["update"])) {

    $rez = $bdd->prepare("SELECT * FROM logement WHERE id_logement=?");
    $rez->execute(array($_GET["choix_logement"]));
    $numero_new_logement = $rez->fetch();

    if (isset($_FILES["maj_main_img_logement"]) AND $_FILES["maj_main_img_logement"]["name"] != NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_main_img_logement']['tmp_name'], $main_photo_new_logement);

    }
    if (isset($_FILES["maj_2_img_logement"]) AND $_FILES["maj_2_img_logement"]["name"] != NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-2.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_2_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd->prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req->execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req->rowCount();
        if ($test < 2) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-2.jpg"
            ));
        }
    }
    if (isset($_FILES["maj_3_img_logement"]) AND $_FILES["maj_3_img_logement"]["name"] != NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-3.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_3_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd->prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req->execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req->rowCount();
        if ($test < 3) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-3.jpg"
            ));
        }
    }
    if (isset($_FILES["maj_4_img_logement"]) AND $_FILES["maj_4_img_logement"]["name"] != NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-4.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_4_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd->prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req->execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req->rowCount();
        if ($test < 4) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-4.jpg"
            ));
        }
    }

    if (isset($_POST["localisation"]) AND $_POST["localisation"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET localisation=:localisation WHERE id_logement=:id_logement");
        $desc->execute(array(
            'localisation' => $_POST['localisation'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["description_logement"]) AND $_POST["description_logement"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET description_logement=:description WHERE id_logement=:id_logement");
        $desc->execute(array(
            'description' => $_POST['description_logement'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }
    if (isset($_POST["type_logement"]) AND $_POST["type_logement"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET type_logement=:type_logement WHERE id_logement=:id_logement");
        $desc->execute(array(
            'type_logement' => $_POST['type_logement'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nom_maison"]) AND $_POST["nom_maison"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nom_maison=:nom_maison WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nom_maison' => $_POST['nom_maison'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nombre_voyageurs"]) AND $_POST["nombre_voyageurs"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nombre_voyageurs=:nombre_voyageurs WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_voyageurs' => $_POST['nombre_voyageurs'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nombre_chambres"]) AND $_POST["nombre_chambres"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_chambres=:nombre_chambres WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_chambres' => $_POST['nombre_chambres'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nb_salles_bains"]) AND $_POST["nb_salles_bains"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_salles_bains=:nb_salles_bains WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nb_salles_bains' => $_POST['nb_salles_bains'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["superficie"]) AND $_POST["superficie"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET superficie=:superficie WHERE id_logement=:id_logement");
        $desc->execute(array(
            'superficie' => $_POST['superficie'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["date_début_disponibilite"]) AND $_POST["date_début_disponibilite"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_début_disponibilite=:date_début_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_début_disponibilite' => $_POST['date_début_disponibilite'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["date_fin_disponibilite"]) AND $_POST["date_fin_disponibilite"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_fin_disponibilite=:date_fin_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_fin_disponibilite' => $_POST['date_fin_disponibilite'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }
//MISE A JOUR DES CRITERES

    $req = $bdd->query("SELECT * FROM equipement");

    while ($equipement = $req->fetch()) {
        $id_equipement = $equipement[0];

        if (isset($_POST["$id_equipement-1"]) AND $_POST["$id_equipement-1"] != NULL) {

            $desc = $bdd->prepare("INSERT INTO annonce_equipement(id_logement, id_equipement) VALUES (:id_logement,:id_equipement)");
            $desc->execute(array(
                'id_logement' => $_GET["choix_logement"],
                'id_equipement' => $equipement[0],
            ));
        }
        if (isset($_POST["$id_equipement-0"]) AND $_POST["$id_equipement-0"] != NULL) {

            $desc = $bdd->prepare("DELETE FROM annonce_equipement WHERE id_equipement=:id_equipement AND id_logement=:id_logement");
            $desc->execute(array(
                'id_logement' => $_GET["choix_logement"],
                'id_equipement' => $equipement[0],
            ));
        }
    }
}
    // Ajout d'un logement

    if (isset($_GET["add"],$_FILES["up_main_img_logement"], $_POST["localisation"], $_POST["description_logement"], $_POST["type_logement"], $_POST["nombre_chambres"], $_POST["nb_salles_bains"]) AND $_POST["localisation"]!= NULL AND $_POST["description_logement"]!= NULL AND $_POST["type_logement"]!= NULL AND $_POST["nombre_chambres"]!= NULL AND $_POST["nb_salles_bains"]!= NULL AND $_FILES["up_main_img_logement"]!= NULL) {
    var_dump($_GET["add"]);
    //On récupère le nombre de logements que l'utilisateur possède afin de renseigner le bon numéro de logement dans la requête qui suivra
    $rez = $bdd -> prepare("SELECT * FROM logement WHERE id_users=?");
    $rez -> execute(array($id_user));
    $numero_logement = $rez -> rowCount();

    //On enregistre le logement dans la base de donnée
    $ret = $bdd-> prepare("INSERT INTO logement(id_users,numero_logement) VALUES(:id_users, :numero_logement)");
    $ret->execute(array
    (
        'id_users' => $id_user,
        'numero_logement' => $numero_logement+1,
    ));
    $new_logement = $bdd -> lastInsertId();

    $req = $bdd->query("SELECT * FROM equipement");

    while ($equipement = $req->fetch()) {
        $id_equipement = $equipement[0];

            if (isset($_POST["$id_equipement-1"]) AND $_POST["$id_equipement-1"] != NULL) {

                $desc = $bdd->prepare("INSERT INTO annonce_equipement(id_logement, id_equipement) VALUES (:id_logement,:id_equipement)");
                $desc->execute(array(
                    'id_logement' => $new_logement,
                    'id_equipement' => $equipement[0],
                ));
            }
        }

    ?>
        <div class="forum_title" xmlns="http://www.w3.org/1999/html"><h7>Votre logement a bien été ajouté !</h7></div> <?php

    $numero_new_logement = $numero_logement+1 ;


    if (isset($_FILES["up_main_img_logement"]) AND $_FILES["up_main_img_logement"]["name"]!= NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$new_logement}-{$numero_new_logement}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['up_main_img_logement']['tmp_name'], $main_photo_new_logement);
//On ajoute la photo de profil dans la BDD
        $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
        $res->execute(array(
            "id_logement" => $new_logement,
            "lien_photo" => "../photos_logement/{$new_logement}-{$numero_new_logement}.jpg"
        ));
    }
        if (isset($_FILES["up_2_img_logement"]) AND $_FILES["up_2_img_logement"]["name"]!= NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
            $main_photo_new_logement = "../photos_logement/{$new_logement}-{$numero_new_logement}-2.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

            $resultat = move_uploaded_file($_FILES['up_2_img_logement']['tmp_name'], $main_photo_new_logement);
//On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $new_logement,
                "lien_photo" => "../photos_logement/{$new_logement}-{$numero_new_logement}-2.jpg"
            ));
        }
        if (isset($_FILES["up_3_img_logement"]) AND $_FILES["up_3_img_logement"]["name"]!= NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
            $main_photo_new_logement = "../photos_logement/{$new_logement}-{$numero_new_logement}-3.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

            $resultat = move_uploaded_file($_FILES['up_3_img_logement']['tmp_name'], $main_photo_new_logement);
//On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $new_logement,
                "lien_photo" => "../photos_logement/{$new_logement}-{$numero_new_logement}-3.jpg"
            ));
        }
        if (isset($_FILES["up_4_img_logement"]) AND $_FILES["up_4_img_logement"]["name"]!= NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
            $main_photo_new_logement = "../photos_logement/{$new_logement}-{$numero_new_logement}-4.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

            $resultat = move_uploaded_file($_FILES['up_4_img_logement']['tmp_name'], $main_photo_new_logement);
//On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $new_logement,
                "lien_photo" => "../photos_logement/{$new_logement}-{$numero_new_logement}-4.jpg"
            ));
        }

    if (isset($_POST["localisation"]) AND $_POST["localisation"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET localisation=:localisation WHERE id_logement=:id_logement");
        $desc->execute(array(
            'localisation' => $_POST['localisation'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["description_logement"]) AND $_POST["description_logement"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET description_logement=:description WHERE id_logement=:id_logement");
        $desc->execute(array(
            'description' => $_POST['description_logement'],
            'id_logement' => $new_logement,
        ));
    }
    if (isset($_POST["type_logement"]) AND $_POST["type_logement"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET type_logement=:type_logement WHERE id_logement=:id_logement");
        $desc->execute(array(
            'type_logement' => $_POST['type_logement'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["nom_maison"]) AND $_POST["nom_maison"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nom_maison=:nom_maison WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nom_maison' => $_POST['nom_maison'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["nombre_voyageurs"]) AND $_POST["nombre_voyageurs"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nombre_voyageurs=:nombre_voyageurs WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_voyageurs' => $_POST['nombre_voyageurs'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["nombre_chambres"]) AND $_POST["nombre_chambres"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_chambres=:nombre_chambres WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_chambres' => $_POST['nombre_chambres'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["nb_salles_bains"]) AND $_POST["nb_salles_bains"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_salles_bains=:nb_salles_bains WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nb_salles_bains' => $_POST['nb_salles_bains'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["superficie"]) AND $_POST["superficie"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET superficie=:superficie WHERE id_logement=:id_logement");
        $desc->execute(array(
            'superficie' => $_POST['superficie'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["date_début_disponibilite"]) AND $_POST["date_début_disponibilite"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_début_disponibilite=:date_début_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_début_disponibilite' => $_POST['date_début_disponibilite'],
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["date_fin_disponibilite"]) AND $_POST["date_fin_disponibilite"] != NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_fin_disponibilite=:date_fin_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_fin_disponibilite' => $_POST['date_fin_disponibilite'],
            'id_logement' => $new_logement,
        ));
    }

    $req = $bdd->query("SELECT * FROM equipement");

    while ($equipement = $req->fetch()) {
        $id_equipement = $equipement[0];

        if (isset($_GET['update'])) {
        if (isset($_POST["$id_equipement-1"]) AND $_POST["$id_equipement-1"] != NULL) {

            $desc = $bdd->prepare("INSERT INTO annonce_equipement(id_logement, id_equipement) VALUES (:id_logement,:id_equipement)");
            $desc->execute(array(
                'id_logement' => $_GET["choix_logement"],
                'id_equipement' => $equipement[0],
            ));
        }
    } }

}
elseif (isset($_GET["add"], $_POST["localisation"], $_POST["description_logement"], $_POST["type_logement"], $_POST["nombre_chambres"], $_POST["nb_salles_bains"]) AND $_POST["localisation"] == NULL AND $_POST["description_logement"] == NULL AND $_POST["type_logement"] == NULL AND $_POST["nombre_chambres"] == NULL AND $_POST["nb_salles_bains"] == NULL) {?> <div class="forum_title"><h7>Vous n'avez pas renseigné tous les champs obligatoires (avec des *)</h7></div> <?php } ?>

<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../fichier_js/ajout_photo.js"></script>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css"/>
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Edition Profil</title>
</head>

<body>
<div class="header">
    <?php include("menu2.php"); ?>
</div>
<div class="superglobal">
<div class="global">

    <div class="edit_profil">

    <?php
        if (isset($_GET['choix'])) {echo "";} else {

            //Récupérer les infos utilisateurs pour le rediriger vers son profil
            $req = $bdd -> prepare("SELECT id_logement FROM logement WHERE id_users=:id_user ORDER BY id_logement DESC");
            $req -> execute(array(
                'id_user' => $id_user,
            ));
            $id_log = $req -> fetch();
    ?>
            <div class="left_3_top">
                <div class="left_carre_top"><a href="profil.php?id_logement=<?php echo $id_log[0]; ?>&id_users=<?php echo $id_user; ?>"><p><?php echo consultprofile; ?></p></a></div>
            </div>
            <div class="center_3_top">
                <div class="center_carre_top"><a href="edit_profile.php?choix=2<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>"><p><?php echo modifytenement; ?></p></a></div>
            </div>
            <div class="right_3_top">
                <div class="right_carre_top"><a href="edit_profile.php?choix=3<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>"><p><?php echo addtenement; ?></p></a></div>
            </div>
            <div class="left_3_bot">
                <div class="left_carre_bot"><a href="edit_profile.php?choix=1<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>"><p><?php echo editprofile; ?></p></a></div>
            </div>
            <div class="center_3_bot">
                <div class="center_carre_bot"><a href="ask.php"><p><?php echo confirmval; ?></p></a></div>
            </div>
            <div class="right_3_bot">
                <div class="right_carre_bot"><a href="friends.php"><p><?php echo friends; ?></p></a></div>
            </div>
    <?php } ?>

    <?php
        if (isset($_GET['choix']) AND $_GET["choix"]==2) {

            $ret = $bdd -> prepare("SELECT * FROM logement WHERE id_users=? ORDER BY id_logement DESC");
            $ret -> execute(array($id_user));
            $nmber = $ret -> rowCount();
            ?> <div class="container_liste_logements"> <?php
            for ($i=0 ; $i < $nmber ; $i++) {
                $house = $ret -> fetch();

                $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                $pic -> execute(array($house[0]));
                $url_pic = $pic -> fetch();

                    ?>
                <div class="cadre_logement">
                    <div class="left_cadre_logement">
                        <?php echo '<img src="'.$url_pic['lien_photo'].'" class="photo">' ?>
                    </div>

                    <div class="right_cadre_logement">
                                    <span>
                                    <a href="edit_profile.php?choix_logement=<?php echo $house[0]; ?>&choix<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>"><?php echo $house["nom_maison"] ; ?></a>
                                    <a href="edit_profile.php?choix_logement=<?php echo $house[0]; ?>&choix<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>">
                                        <?php echo '<p>' .''.$house['localisation']. ' </br>' . $house['nombre_voyageurs']. ' voyageurs </br>' . $house['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                    </div>
                </div><br/>

    <?php } ?> </div> <?php } ?>

    <?php if (isset($_GET["choix"]) AND $_GET["choix"]==1) { ?>
<div class="container_edit_profil" style="height: 700px;">
    <form action="edit_profile.php?choix=1<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
    <div class="bloc_edit_left">
        <label for="avatar">Avatar</label>
        (300x300 : <a href="http://www.fotor.com/fr/" target="_blank">Fotor.com)</a>
        <input type="file" name="up_avatar" id="up_avatar"><br />
        <label for="description">Description</label><br/>
        <textarea type="text" name="description" style="height: 200px; width: 300px"/></textarea><br/>
        <label for="username" id="username_form"><?php echo genre; ?></label></br>
        <SELECT name="sexe" size="1">
            <OPTION></OPTION>
            <OPTION><?php echo homme; ?></OPTION>
            <OPTION><?php echo femme; ?></OPTION>
            <OPTION><?php echo autre; ?></OPTION>
        </SELECT></br>
        <label for="tel"><?php echo numtel; ?></label></br>
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
        <input type="submit" value="<?php echo valider; ?>" id="btn_validation_edit" /><br/><br/>
    </div>

    <!-- Afficher les informations actuelles de l'utilisateur -->
    <?php $req = $bdd -> prepare("SELECT * FROM users WHERE id_users=?"); $req -> execute(array($id_user)); $donnees = $req -> fetch(); ?>
    <div class="bloc_edit_user_right">
        <?php echo '<img   src="'.$donnees ['avatar'].'"  class="profil">'  ?>
        <p>Description : <?php echo $donnees['description'] ;?></p>
        <p>E-mail: <?php if ($donnees['email']!=NULL) { echo $donnees['email'] ;} else {echo "Non renseigné";}?></p>
        <p><?php echo genre ; ?> : <?php if ($donnees['sexe']!=NULL) {echo $donnees['sexe'] ;}?></p>
        <p>Tel : <?php if ($donnees['tel']!=NULL) { echo $donnees['tel'] ;} else {echo "Non renseigné";}?></p>
        <p>Profession : <?php if ($donnees['profession']!=NULL) { echo $donnees['profession'] ;} else {echo "Non renseigné";}?> </p>
        <p>Situation : <?php if ($donnees['situation']!=NULL) { echo $donnees['situation'] ;} else {echo "Non renseigné";}?></p>
    </div>

    <?php } ?>
        <!-- Logement MAJ -->

    <?php
        if (isset($_GET["choix_logement"])) { ?>
    <link rel="stylesheet" href="../style.css"/>
<div class="container_edit_profil">

    <form action="edit_profile.php?choix_logement=<?php echo $_GET["choix_logement"]; ?>&choix&update<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
        <?php include("block_maj_left.php") ?>
    <!-- Critères logement MAJ -->

    <div class="bloc_edit_center">

        <?php
        $req = $bdd -> query("SELECT * FROM equipement");

        while ($equipement = $req -> fetch()) { ?>
        <label for="<?php echo $equipement['nom'] ?>"><?php echo $equipement['nom'] ?></label><br/>
            <input type="radio" name="<?php echo $equipement['id_equipement'] ?>-0">&nbsp;<label>Non&nbsp;</label>&nbsp;&nbsp;
            <input type="radio" name="<?php echo $equipement['id_equipement'] ?>-1">&nbsp;<label>Oui&nbsp;</label><br>
        <?php
        }
        ?>
        <input type="submit" value="<?php echo valider; ?>" id="btn_validation_edit" /><br/><br/>
    </div>

        <!-- Afficher les informations actuelles de l'utilisateur -->
        <?php $req = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?"); $req -> execute(array($_GET["choix_logement"])); $donnees1 = $req -> fetch();

        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
        $pic -> execute(array($donnees1[0]));
        $url_pic = $pic -> fetch();
        ?>

    <div class="bloc_edit_logement_right">

        <?php echo '<img src="'.$url_pic['lien_photo'].'" class="photo_edit_actual_house">' ?>
        <div class="text_lefted">
        <p><?php echo localisation; ?> : <?php echo $donnees1[2]; ?></p></br>
        <p><?php echo titreannonce; ?> : <?php echo $donnees1[4]; ?></p></br>
        <p><?php echo nbvoyageurs; ?> : <?php echo $donnees1[5]; ?></p></br>
        <p>Type de logement : <?php echo $donnees1[6]; ?></p></br>
        <p><?php echo nbchambres; ?> : <?php echo $donnees1[7]; ?></p></br>
        <p><?php echo nbsallesbain; ?> : <?php echo $donnees1[8]; ?></p></br>
        <p><?php echo superficie; ?> : <?php echo $donnees1[9]; ?> m²</p></br>
        <p><?php echo descriptionlogement; ?> : <?php echo $donnees1[10]; ?></p></br>
        <?php
        $req = $bdd -> prepare("SELECT * FROM annonce_equipement WHERE id_logement=?");
        $req -> execute(array($_GET['choix_logement']));
        ?> <p>Equipements :</p><br/> <?php
        while ($equip = $req -> fetch()) {
            $ret = $bdd -> prepare("SELECT * FROM equipement WHERE id_equipement=?");
            $ret -> execute(array($equip[1]));
            $nom_equip = $ret -> fetch();
            ?>
            <p><?php echo $nom_equip[1] ?> <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png"></p>
        <?php } ?>
        </div>
        <?php
        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
        $pic -> execute(array($_GET["choix_logement"]));
        $allpic = $pic -> fetch();
        while ($allpic = $pic -> fetch()) {
        ?>
        <img src="<?php echo $allpic['lien_photo'] ?>" class="photo_edit_actual_house">
        <?php
        }
        ?>
    </div>
        <?php
        } ?>
</div>
    </form>

    <!-- Ajouter un logement -->
    <?php
    if (isset($_GET["choix"]) AND $_GET["choix"]==3 AND empty($_GET["add"])) {
    ?>
    <div class="container_edit_profil">
        <form action="edit_profile.php?choix=<?php echo $_GET["choix"]; ?>&add=1<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
           <?php include("block_add_left.php")?>

            <!-- Critères logement -->

            <div class="bloc_add_center">
        <?php
        $req = $bdd -> query("SELECT * FROM equipement");

        while ($equipement = $req -> fetch()) { ?>
        <label for="<?php echo $equipement['nom'] ?>"><?php echo $equipement['nom'] ?></label><br>
            <input type="radio" name="<?php echo $equipement['id_equipement'] ?>-0">&nbsp;&nbsp;<label>Non</label>
            &nbsp;&nbsp;<input type="radio" name="<?php echo $equipement['id_equipement'] ?>-1">&nbsp;&nbsp;<label>Oui</label><br>
        <?php
        }
        ?>

        <!-- ANCIENNE METHODE
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
        <label for="jardin"><?php echo jardin ?></label><br/>
        <select name="jardin">
            <OPTION></option>
            <OPTION><?php echo yes; ?></option>
            <OPTION><?php echo no; ?></option>
        </select><br/>


                <!-- CHAMPS POUR DATES DISPO LOGEMENT
                <label for="date_début_disponibilite">Date de début de disponibilité</label><br/>
                <input type="date" name="date_début_disponibilite"/><br/>
                <label for="date_fin_disponibilite">Date de fin de disponibilité</label><br/>
                <input type="date" name="date_fin_disponibilite"/><br/> -->

                <input type="submit" value="<?php echo valider; ?>" id="btn_validation_edit" /><br/><br/>
            </div>
    <?php } /* elseif (isset($_GET["choix"], $_POST["localisation"], $_POST["description_logement"], $_POST["type_logement"], $_POST["nombre_chambres"], $_POST["nb_salles_bains"]) AND $_GET["choix"]==3 AND $_POST["localisation"] != NULL AND $_POST["description_logement"] != NULL AND $_POST["type_logement"] != NULL AND $_POST["nombre_chambres"] != NULL AND $_POST["nb_salles_bains"] != NULL ) {?> <div class="forum_title"><h7>Votre logement a bien été ajouté !</h7></div> <?php } */ ?>

        </form>
    </div>
</div>
</div>
    <?php
    include("footer2.php");
    ?>
    </div>
</body>
</html>
