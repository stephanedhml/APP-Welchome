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

    if ($_FILES['up_avatar']['error'] > 0) {
        echo "Une erreur est survenue lors de l'envoi de la photo";
    } else {
        $resultat = move_uploaded_file($_FILES['up_avatar']['tmp_name'], $up_avatar_folder);
    }
//On ajoute la photo de profil dans la BDD
    try {
        $res = $bdd->prepare("UPDATE users SET avatar= '../photos_utilisateurs/{$_SESSION['userid']}.jpg' WHERE id_users=?");
        $res->execute(array($_SESSION['userid']));
    } catch(Exception $e){
        var_dump($e);
    }
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
        <label for="username" id="username_form">Edition profil</label><br/></br>
        <br/><label for="avatar">Image perso</label><br/><input type="file" name="up_avatar" id="up_avatar"><br />
        <input type="submit" value="Valider les modifications" id="btn_connexion" /><br/><br/>
    </form>
</body>
