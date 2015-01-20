<?php

include("config.php");
include("modeles.php");

session_start();
$rel = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
$rel -> execute(array($_SESSION['userid']));
$user = $rel -> fetch();
if (isset($_SESSION['userid']) AND $user[8]==1) {
// Demandes de requête provenant du forum
if (isset($_GET["del_msg"]) AND $_GET["del_msg"] == 1) {
    ?>
    <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
    <?php

    $req = $bdd->prepare("DELETE FROM forum_post WHERE id_post=?");
    $req->execute(array($_GET["id_post"]));

    header('Location: topic.php?id_topic=' . $_GET['id_topic'] . ' &id_cat=' . $_GET['id_cat'] . '');
}

if (isset($_GET["del_topic"]) AND $_GET["del_topic"] == 1) {
    ?>
    <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
    <?php

    $req = $bdd->prepare("DELETE FROM forum_topic WHERE id_topic=?");
    $req->execute(array($_GET["id_topic"]));

    header('Location: site.php?id_cat=' . $_GET['id_cat'] . '');
}

// Requêtes venant de la page administrateur
//Supression d'un utilisateur et de ses logements

if (isset($_GET["del_usr"]) AND $_GET["del_usr"] == 1) {
    $ret = $bdd->prepare("DELETE FROM logement WHERE id_users=?");
    $ret->execute(array($_GET["id_user"]));

    $req = $bdd->prepare("DELETE FROM users WHERE id_users=?");
    $req->execute(array($_GET["id_user"]));
}

if (isset($_GET["del_logement"]) AND $_GET["del_logement"] == 1) {
    $ret = $bdd->prepare("DELETE FROM logement WHERE id_logement=?");
    $ret->execute(array($_GET["id_logement"]));
}
if (isset($_GET["new_equip"]) AND $_GET["new_equip"] != NULL) {

    $desc = $bdd->prepare("INSERT INTO equipement(nom) VALUES (:nom)");
    $desc->execute(array(
        'nom' => $_GET["new_equip"],
    ));
    header('Location: admin.php');
}
if (isset($_GET["del_equip"]) AND $_GET["del_equip"] != NULL) {

    $desc = $bdd->prepare("DELETE FROM equipement WHERE id_equipement=:id");
    $desc->execute(array(
        'id' => $_GET["del_equip"],
    ));
    header('Location: admin.php');
}
if (isset($_GET["usr_admin"]) AND $_GET["usr_admin"] != NULL) {

    $desc = $bdd->prepare("UPDATE users SET rights=1 WHERE id_users=:id");
    $desc->execute(array(
        'id' => $_GET["id_user"],
    ));
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css"/>
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Administration</title>
</head>

<body>

<header>
    <?php include("menu2.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
        <div class="add_equipement_container">
            <div class="add_equipement_top">
                <?php
                $req = $bdd->query("SELECT * FROM equipement");
                ?>Liste des équipements disponibles : <?php
                while ($equipement = $req->fetch()) {
                    echo $equipement['nom'];?>&nbsp;<a href="admin.php?del_equip=<?php echo $equipement['id_equipement'] ?>"><img src="http://www.britishairways.com/assets/images/information/icons/red-cross-16x16.png"></a> ,&nbsp;<?php
                }
                ?>
            </div>
            <div class="add_equipement_bottom_field"><form action="admin.php"><label style="font-size: 25px;">Ajouter un nouvel équipement :&nbsp;</label><input type="text" name="new_equip" style="height: 30px; position: absolute; margin-top: 5px; width: 200px;"></form></div>

        </div>
        <div class="search_bar_bkoff">
            <form action="admin.php" method="post">
                <input type="text" name="search" placeholder="Rechercher un utilisateur ou une annonce"
                       id="recherche_simple"/>
                <input type="submit" id="input" value="Rechercher">
            </form>
        </div>
        <?php
        // Requêtes provenant de admin.php
        if (isset($_POST['search'])) {

            //Si ADMIN cherche un utilisateur
            $req_usr = $bdd->prepare("SELECT * FROM users WHERE username=?");
            $req_usr->execute(array($_POST['search']));
            $user_info_nb = $req_usr->rowCount();
            //Si ADMIN cherche logement
            $req_logement = $bdd->prepare("SELECT * FROM logement WHERE nom_maison=?");
            $req_logement->execute(array($_POST['search']));
            $logement_info_nb = $req_logement->rowCount();

            //Si la recherche correspond à un utilisateur, on execute ça
            if ($user_info_nb != 0) {
                $user_info = $req_usr->fetch();

                $ret = $bdd->prepare("SELECT * FROM logement WHERE id_users=? ORDER BY id_logement DESC");
                $ret->execute(array($user_info['id_users']));
                ?>
                <div class="admin_container">
                    <div class="user_info">
                        <div class="user_cadre">
                            <a href='admin.php?id_user=<?php echo $user_info[0] ?>&del_usr=1'>
                            <div class="supp">
                                <p>Supprimer définitivement <?php echo $user_info[1] ?></p>
                            </div></a>
                            <div class="photo_user_pos"><img src="<?php echo $user_info['avatar'] ?>" class="img_user_admin"></div>
                            <div class="info_container">

                            <p>Pseudo : <?php echo $user_info[1] ?></p>

                            <p>Sexe : <?php echo $user_info['sexe'] ?></p>

                            <p>Tel. : <?php echo $user_info['tel'] ?></p>

                            <p>Situation : <?php echo $user_info['situation'] ?></p>

                            <p>Profession : <?php echo $user_info['profession'] ?></p>

                            <a href="edit_profile.php?id_user=<?php echo $user_info[0]; ?>&amp;edit_usr=1">Editer le profil de <?php echo $user_info[1] ?></a><br>
                            <a href="admin.php?id_user=<?php echo $user_info[0]; ?>&amp;usr_admin=1">Promouvoir <?php echo $user_info[1] ?> administrateur</a>

                            </div>
                        </div>
                    </div>
                    <div class="logement_info">
                        <?php
                        $nb_house = $ret->rowCount();
                        for ($i = 0; $i < $nb_house; $i++) {
                            $house = $ret->fetch();
                            $pic = $bdd->prepare("SELECT * FROM photo WHERE id_logement=?");
                            $pic->execute(array($house[0]));
                            $url_pic = $pic->fetch();
                            ?>
                            <div class="cadre_admin">
                                <div class="left">
                                    <?php echo '<img width="300px" height="200px" align="left" src="' . $url_pic['lien_photo'] . '" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house['id_logement']; ?>&amp;id_users=<?php echo $user_info[0] ?>">
                                        <?php echo '<p>' . $house['nom_maison'] . ' </br>' . $house['localisation'] . ' </br>' . $house['nombre_voyageurs'] . ' voyageurs </br>' . $house['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                </div>
                                <a href='admin.php?id_logement=<?php echo $house[0] ?>&del_logement=1'>
                                    <div class="supp_logement">
                                        <p>Supprimer définitivement : <?php echo $house['nom_maison'] ?></p>
                                    </div></a>
                            </div>
                            <br/>
                        <?php } ?>
                    </div>
                </div>
            <?php
            }
            //Si la recherche correspond à une annonce, on execute ça
            if ($logement_info_nb != 0) {
                $logement_info = $req_logement->fetch();

                $ret = $bdd->prepare("SELECT * FROM users WHERE id_users=?");
                $ret->execute(array($logement_info['id_users']));
                $user_info = $ret -> fetch();
                ?>
                <div class="admin_container">
                    <div class="user_info">
                        <div class="user_cadre">
                            <a href='admin.php?id_user=<?php echo $user_info[0] ?>&del_usr=1'>
                            <div class="supp">
                                    <p style="text-decoration: ">Supprimer définitivement <?php echo $user_info[1] ?></p>
                            </div>
                            </a>
                            <div class="photo_user_pos">
                            <img src="<?php echo $user_info['avatar'] ?>" class="img_user_admin">
                            </div>
                            <div class="info_container">
                            <p><?php echo $user_info[1] ?></p>

                            <p><?php echo $user_info['sexe'] ?></p>

                            <p><?php echo $user_info['tel'] ?></p>

                            <p><?php echo $user_info['situation'] ?></p>

                            <p><?php echo $user_info['profession'] ?></p>

                            <a href="edit_profile.php?id_user=<?php echo $user_info[0]; ?>&amp;edit_usr=1"><?php echo editerunprofil; ?></a><br>
                            <a href="admin.php?id_user=<?php echo $user_info[0]; ?>&amp;usr_admin=1">Promouvoir <?php echo $user_info[1] ?> administrateur</a>


                            </div>
                        </div>
                    </div>
                    <div class="logement_info">
                        <?php
                            $pic = $bdd->prepare("SELECT * FROM photo WHERE id_logement=?");
                            $pic->execute(array($logement_info[0]));
                            $url_pic = $pic->fetch();
                            ?>
                            <div class="cadre_admin">
                                <div class="left">
                                    <?php echo '<img width="300px" height="200px" align="left" src="' . $url_pic['lien_photo'] . '" class="photo">' ?>
                                </div>

                                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $logement_info['id_logement']; ?>&amp;id_users=<?php echo $user_info[0] ?>">
                                        <?php echo '<p>' . $logement_info['nom_maison'] . ' </br>' . $logement_info['localisation'] . ' </br>' . $logement_info['nombre_voyageurs'] . ' voyageurs </br>' . $logement_info['type_logement'] . '</p>'; ?> </a><br/>

                                    </span>
                                </div>
                                <a href='admin.php?id_logement=<?php echo $logement_info[0] ?>&del_logement=1'>
                                <div class="supp_logement">
                                    <p>Supprimer définitivement : <?php echo $logement_info['nom_maison'] ?></p>
                                </div></a>
                            </div><br/>
                    </div>
                </div>
            <?php
            }
        }
        }
        else {
            header ("Location: index.php");
            exit();
        }
        ?>

    </div>
</div>