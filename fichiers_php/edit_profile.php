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

    $rez = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
    $rez -> execute(array($_GET["choix_logement"]));
    $numero_new_logement = $rez -> fetch();

    if (isset($_FILES["maj_main_img_logement"]) AND $_FILES["maj_main_img_logement"]["name"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_main_img_logement']['tmp_name'], $main_photo_new_logement);

    }
    if (isset($_FILES["maj_2_img_logement"]) AND $_FILES["maj_2_img_logement"]["name"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-2.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_2_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req -> execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req -> rowCount();
        if ($test<2) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-2.jpg"
            ));
        }
        }
    if (isset($_FILES["maj_3_img_logement"]) AND $_FILES["maj_3_img_logement"]["name"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-3.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_3_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req -> execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req -> rowCount();
        if ($test<3) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-3.jpg"
            ));
        }
    }
    if (isset($_FILES["maj_4_img_logement"]) AND $_FILES["maj_4_img_logement"]["name"]!=NULL) {
//On importe la photo de profil envoyée par l'utilisateur sur le serveur
        $main_photo_new_logement = "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-4.jpg"; //A CORRIGER -> le fichier s'appelle id_user.jpg, il faut gérer le fait qu'on puisse avoir plusieurs images pour 1 utilisateur et plusieurs extensions possibles !

        $resultat = move_uploaded_file($_FILES['maj_4_img_logement']['tmp_name'], $main_photo_new_logement);

        $req = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=:id_logement");
        $req -> execute(array(
            'id_logement' => $_GET["choix_logement"],
        ));
        $test = $req -> rowCount();
        if ($test<4) {
            //On ajoute la photo de profil dans la BDD
            $res = $bdd->prepare("INSERT INTO photo(id_logement, lien_photo) VALUES(:id_logement,:lien_photo)");
            $res->execute(array(
                "id_logement" => $_GET["choix_logement"],
                "lien_photo" => "../photos_logement/{$_GET["choix_logement"]}-{$numero_new_logement['numero_logement']}-4.jpg"
            ));
        }
    }

    if (isset($_POST["localisation"]) AND $_POST["localisation"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET localisation=:localisation WHERE id_logement=:id_logement");
        $desc->execute(array(
            'localisation' => $_POST['localisation'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["description_logement"]) AND $_POST["description_logement"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET description_logement=:description WHERE id_logement=:id_logement");
        $desc->execute(array(
            'description' => $_POST['description_logement'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }
    if (isset($_POST["type_logement"]) AND $_POST["type_logement"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET type_logement=:type_logement WHERE id_logement=:id_logement");
        $desc->execute(array(
            'type_logement' => $_POST['type_logement'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nom_maison"]) AND $_POST["nom_maison"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nom_maison=:nom_maison WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nom_maison' => $_POST['nom_maison'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nombre_voyageurs"]) AND $_POST["nombre_voyageurs"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nombre_voyageurs=:nombre_voyageurs WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_voyageurs' => $_POST['nombre_voyageurs'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nombre_chambres"]) AND $_POST["nombre_chambres"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_chambres=:nombre_chambres WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nombre_chambres' => $_POST['nombre_chambres'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["nb_salles_bains"]) AND $_POST["nb_salles_bains"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET nb_salles_bains=:nb_salles_bains WHERE id_logement=:id_logement");
        $desc->execute(array(
            'nb_salles_bains' => $_POST['nb_salles_bains'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["superficie"]) AND $_POST["superficie"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET superficie=:superficie WHERE id_logement=:id_logement");
        $desc->execute(array(
            'superficie' => $_POST['superficie'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["date_début_disponibilite"]) AND $_POST["date_début_disponibilite"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_début_disponibilite=:date_début_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_début_disponibilite' => $_POST['date_début_disponibilite'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["date_fin_disponibilite"]) AND $_POST["date_fin_disponibilite"] !=NULL) {
        $desc = $bdd->prepare("UPDATE logement SET date_fin_disponibilite=:date_fin_disponibilite WHERE id_logement=:id_logement");
        $desc->execute(array(
            'date_fin_disponibilite' => $_POST['date_fin_disponibilite'],
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["television"]) AND $_POST["television"] !=NULL) {
        if ($_POST["television"] == 'Oui') {
            $tele = 1;
        } else {
            $tele = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET television=:television WHERE id_logement=:id_logement");
        $desc->execute(array(
            'television' => $tele,
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["machine_a_laver"]) AND $_POST["machine_a_laver"] !=NULL) {
        if ($_POST["machine_a_laver"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET machine_a_laver=:machine_a_laver WHERE id_logement=:id_logement");
        $desc->execute(array(
            'machine_a_laver' => $vari,
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["parking"]) AND $_POST["parking"] !=NULL) {
        if ($_POST["parking"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET parking=:parking WHERE id_logement=:id_logement");
        $desc->execute(array(
            'parking' => $vari,
            'id_logement' => $_GET['choix_logement'],
        ));
    }
    if (isset($_POST["climatisation"]) AND $_POST["climatisation"] != NULL) {
        if ($_POST["climatisation"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["climatisation"] == 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET climatisation=:climatisation WHERE id_logement=:id_logement");
        $desc->execute(array(
            'climatisation' => $vari,
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["piscine"]) AND $_POST["piscine"] !=NULL) {
        if ($_POST["piscine"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET piscine=:piscine WHERE id_logement=:id_logement");
        $desc->execute(array(
            'piscine' => $vari,
            'id_logement' => $_GET['choix_logement'],
        ));
    }

    if (isset($_POST["jardin"]) AND $_POST["jardin"] !=NULL) {
        if ($_POST["jardin"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET jardin=:jardin WHERE id_logement=:id_logement");
        $desc->execute(array(
            'jardin' => $vari,
            'id_logement' => $_GET['choix_logement'],
        ));
    }

}

    // Ajout d'un logement
    if (isset($_GET["add"],$_FILES["up_main_img_logement"], $_POST["localisation"], $_POST["description_logement"], $_POST["type_logement"], $_POST["nombre_chambres"], $_POST["nb_salles_bains"]) AND $_POST["localisation"] != NULL AND $_POST["description_logement"] != NULL AND $_POST["type_logement"] != NULL AND $_POST["nombre_chambres"] != NULL AND $_POST["nb_salles_bains"] != NULL AND $_FILES["up_main_img_logement"]!=NULL) {

    //On récupère le nombre de logements que l'utilisateur possède afin de renseigner le bon numéro de logement dans la requête qui suivra
    $rez = $bdd -> prepare("SELECT * FROM logement WHERE id_users=?");
    $rez -> execute(array($_SESSION["userid"]));
    $numero_logement = $rez -> rowCount();

    //On enregistre le logement dans la base de donnée
    $ret = $bdd-> prepare("INSERT INTO logement(id_users,numero_logement) VALUES(:id_users, :numero_logement)");
    $ret->execute(array
    (
        'id_users' => $_SESSION["userid"],
        'numero_logement' => $numero_logement+1,
    ));
    $new_logement = $bdd -> lastInsertId();

    ?> <div class="forum_title"><h7>Votre logement a bien été ajouté !</h7></div> <?php

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

    if (isset($_POST["television"]) AND $_POST["television"] != NULL) {
        if ($_POST["television"] == 'Oui') {
            $tele = 1;
        } else {
            $tele = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET television=:television WHERE id_logement=:id_logement");
        $desc->execute(array(
            'television' => $tele,
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["machine_a_laver"]) AND $_POST["machine_a_laver"] != NULL) {
        if ($_POST["machine_a_laver"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET machine_a_laver=:machine_a_laver WHERE id_logement=:id_logement");
        $desc->execute(array(
            'machine_a_laver' => $vari,
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["parking"]) AND $_POST["parking"] != NULL) {
        if ($_POST["parking"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET parking=:parking WHERE id_logement=:id_logement");
        $desc->execute(array(
            'parking' => $vari,
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["climatisation"]) AND $_POST["climatisation"] != NULL) {
        if ($_POST["climatisation"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET climatisation=:climatisation WHERE id_logement=:id_logement");
        $desc->execute(array(
            'climatisation' => $vari,
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["piscine"]) AND $_POST["piscine"] != NULL) {
        if ($_POST["piscine"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET piscine=:piscine WHERE id_logement=:id_logement");
        $desc->execute(array(
            'piscine' => $vari,
            'id_logement' => $new_logement,
        ));
    }

    if (isset($_POST["jardin"]) AND $_POST["jardin"] != NULL) {
        if ($_POST["jardin"] == 'Oui') {
            $vari = 1;
        } elseif ($_POST["television"] = 'Non') {
            $vari = 0;
        }
        $desc = $bdd->prepare("UPDATE logement SET jardin=:jardin WHERE id_logement=:id_logement");
        $desc->execute(array(
            'jardin' => $vari,
            'id_logement' => $new_logement,
        ));
    }

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
<div class="superglobal">
<div class="global">

    <div class="edit_profil">

    <?php
        if (isset($_GET['choix'])) {echo "";} else {

            //Récupérer les infos utilisateurs pour le rediriger vers son profil
            $req = $bdd -> prepare("SELECT id_logement FROM logement WHERE id_users=:id_user ORDER BY id_logement DESC");
            $req -> execute(array(
                'id_user' => $_SESSION['userid'],
            ));
            $id_log = $req -> fetch();
    ?>
            <div class="left_3_top">
                <div class="left_carre_top"><a href="profil.php?id_logement=<?php echo $id_log[0]; ?>&id_users=<?php echo $_SESSION['userid']; ?>"><p>Consulter votre profil</p></a></div>
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
                <div class="center_carre_bot"><a href="ask.php"><p>Confirmation Validation</p></a></div>
            </div>
            <div class="right_3_bot">
                <div class="right_carre_bot"><a href="edit_profile.php?choix=3<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>"><p>Amis</p></a></div>
            </div>
    <?php } ?>

    <?php
        if (isset($_GET['choix']) AND $_GET["choix"]==2) {

            $ret = $bdd -> prepare("SELECT * FROM logement WHERE id_users=? ORDER BY id_logement DESC");
            $ret -> execute(array($_SESSION["userid"]));
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
<div class="container_edit_profil">
    <form action="edit_profile.php?choix=1<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
    <div class="bloc_search_left">
        <label for="avatar"><?php imageperso ;?></label><br/>
        <p>300x300 : <a href="http://www.fotor.com/fr/" target="_blank">Fotor.com</a></p>
        <input type="file" name="up_avatar" id="up_avatar"><br />
        <label for="description">Description</label><br/>
        <input type="text" name="description"/><br/>
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
            <OPTION><?php echo single; ?></OPTION>
            <OPTION><?php echo couple; ?></OPTION>
            <OPTION><?php married; ?></OPTION>
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
        if (isset($_GET["choix_logement"])) {
            include("block_left.php");
    ?>


    <!-- Critères logement MAJ -->

    <div class="bloc_search_center">

        <label for="television"><?php echo television; ?></label><br/>
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

        <!-- Afficher les informations actuelles de l'utilisateur -->
        <?php $req = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?"); $req -> execute(array($_GET["choix_logement"])); $donnees1 = $req -> fetch();

        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
        $pic -> execute(array($donnees1[0]));
        $url_pic = $pic -> fetch();
        ?>

    <div class="bloc_edit_logement_right">

        <?php echo '<img src="'.$url_pic['lien_photo'].'" class="photo_edit_actual_house">' ?>
        <p><?php echo localisation; ?> : <?php echo $donnees1[2]; ?></p></br>
        <p><?php echo titreannonce; ?> : <?php echo $donnees1[4]; ?></p></br>
        <p><?php echo nbvoyageurs; ?> : <?php echo $donnees1[5]; ?></p></br>
        <p><?php echo choixlogement; ?> : <?php echo $donnees1[6]; ?></p></br>
        <p><?php echo nbchambres; ?> : <?php echo $donnees1[7]; ?></p></br>
        <p><?php echo nbsallesbain; ?> : <?php echo $donnees1[8]; ?></p></br>
        <p><?php echo superficie; ?> : <?php echo $donnees1[9]; ?> m²</p></br>
        <p><?php echo descriptionlogement; ?> : <?php echo $donnees1[10]; ?></p></br>
        <p><?php echo television; ?> : <?php if ($donnees1["television"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p><?php echo machinelaver; ?> : <?php if ($donnees1["machine_a_laver"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p><?php echo parking; ?> : <?php if ($donnees1["parking"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p><?php echo climatisation; ?> : <?php if ($donnees1["climatisation"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p><?php echo piscine; ?> : <?php if ($donnees1["piscine"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>
        <p><?php echo jardin; ?> : <?php if ($donnees1["jardin"] == 1) {echo ' <img src="https://cdn3.iconfinder.com/data/icons/musthave/16/Check.png">';} else {echo ' <img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"> '; } ?></p></br>



    </div>
        <?php } ?>
</div>
    </form>

    <!-- Ajouter un logement -->
    <?php
    if (isset($_GET["choix"]) AND $_GET["choix"]==3 AND empty($_GET["add"])) {
    ?>
    <div class="container_edit_profil">
        <form action="edit_profile.php?choix=<?php echo $_GET["choix"]; ?>&add=1<?php if (isset($_GET["edit_usr"]) AND $_GET["edit_usr"]==1) { ?>&id_user=<?php echo $id_user ?>&edit_usr=1<?php } ?>" method="post" enctype="multipart/form-data">
            <div class="bloc_search_left">
                        <label for="avatar"><?php echo photo1; ?> *</label><br/>
        <p>700x300 : <a href="http://www.fotor.com/fr/" target="_blank">Fotor.com</a></p>
        <input type="file" name="maj_main_img_logement" ><br />
        <label for="avatar"><?php echo photo2; ?></label><br/>
        <input type="file" name="maj_2_img_logement" onclick="return verifphoto2(this)" ><br />
        <label for="avatar"><?php echo photo3; ?></label><br/>
        <input type="file" name="maj_3_img_logement" onclick="return verifphoto3(this)"  ><br />
        <label for="avatar"><?php echo photo4; ?></label><br/>
        <input type="file" name="maj_4_img_logement" onclick="return verifphoto4(this)"  ><br />
        <label for="localisation"><?php echo localisation; ?></label><br/>
        <input type="text" name="localisation"/><br/>
        <label for="description_logement"><?php echo descriptionlogement; ?></label><br/>
        <input type="text" name="description_logement"/><br/>
        <label for="type_logement"><?php echo choixlogement; ?></label><br/>
        <select name="type_logement" id="choix">
            <OPTION></OPTION>
            <option value="Studio"><?php echo studio; ?></option>
            <option value="Appartement"><?php echo appartement; ?></option>
            <option value="Maison"><?php echo maison; ?></option>
            <option value="Pavillon"><?php echo pavillon; ?></option>
            <option value="Bungalow/gite"><?php echo bungalow; ?></option>
            <option value="Bateau/péniche"><?php echo bateau; ?></option>
            <option value="Camping car"><?php echo campingcar; ?></option>
        </select><br/>
        <label for="nom_maison"><?php echo titreannonce; ?></label><br/>
        <input type="text" name="nom_maison"/><br/>
        <label for="nombre_voyageurs"><?php echo nbvoyageursauthorized; ?></label><br/>
        <input type="number" name="nombre_voyageurs"/><br/>
        <label for="nombre_chambres"><?php echo nbchambres; ?></label><br/>
        <input type="number" name="nombre_chambres"/><br/>
        <label for="nb_salles_bains"><?php echo nbsallesbain; ?></label><br/>
        <input type="number" name="nb_salles_bains"/><br/>
        <label for="superficie"><?php echo superficie; ?></label><br/>
        <input type="number" name="superficie"/><br/>

            </div>

            <!-- Critères logement -->

            <div class="bloc_search_center">

               <label for="television"><?php echo television; ?></label><br/>
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
</body>
