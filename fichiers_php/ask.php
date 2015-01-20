<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
            //On récupère l'information envoyée par le lien sur lequel peut cliquer le client (lien affiché dans les lignes qui suivent)

            if (isset($_GET['accept_demand'])) {
                $req = $bdd -> prepare("UPDATE echange SET proprietaire_want = 1 WHERE id_proprietaire=:id_proprietaire AND id_logement=:id_logement");
                $req -> execute(array(
                    'id_proprietaire' => $_SESSION['userid'],
                    'id_logement' => $_GET['id_logement'],
                ));
                //Lorsque la confirmation est faite, on envoie un message à l'autre pour lui dire qu'on est prêt
                $message = "Je suis prêt pour échanger mon logement avec le votre. Quand vous serez prêt, renseignez le afin que l'échange puisse commencer !";
                $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
                $res -> execute(array(
                    "destinataire" => $_GET['destinataire'],
                    "expediteur" => $_SESSION['userid'],
                    "dates" => $date = date("Y-m-d H:i:s"),
                    "message" => $message,
                ));
                if($derid = $bdd -> lastInsertId())
                {
                    $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                    $nv -> execute(array($derid));

                }
                else
                {
                    ?>
                    <div><?php echo errorsendmessage; ?></div> <br/>
                    <a href="index.php"><?php echo retouraccueil; ?></a>
                <?php
                }
                //Ici, on vérifie au passage que si le demandeur a lui aussi validé l'échange, alors l'échange commence
                $retb = $bdd -> prepare("SELECT * FROM echange WHERE id_proprietaire=:id_proprietaire AND id_logement=:id_logement");
                $retb -> execute(array(
                    'id_proprietaire' => $_SESSION['userid'],
                    'id_logement' => $_GET['id_logement'],
                ));
                $ech2bis = $retb -> fetch();
                //Si les deux parties ont validé l'échange, alors l'échange est en cours :
                if ($ech2bis['demandeur_want']==1 AND $ech2bis['proprietaire_want']==1) {
                    $req = $bdd -> prepare("UPDATE echange SET en_cours = 1 WHERE id_logement=?");
                    $req -> execute(array($_GET['id_logement']));
                }
                header("Location : ask.php");
            }

if (isset($_GET["del_voeu"]) AND $_GET["del_voeu"] == 1) {

    $req = $bdd->prepare("DELETE FROM echange WHERE id_logement_asked=:id_logement AND id_demandeur=:id_demandeur");
    $req->execute(array(
        'id_logement' => $_GET["id_logement"],
        'id_demandeur' => $_SESSION['userid'],
    ));
    //On informe l'autre utilisateur qu'on ne veut plus échanger
    $message = "Je suis désolé, je ne souhaite plus échanger mon logement avec vous !";
    $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
    $res -> execute(array(
        "destinataire" => $_GET['destinataire'],
        "expediteur" => $_SESSION['userid'],
        "dates" => $date = date("Y-m-d H:i:s"),
        "message" => $message,
    ));
    if($derid = $bdd -> lastInsertId())
    {
        $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
        $nv -> execute(array($derid));
        header('Location: ask.php');
    }
    else
    {
        ?>
        <div><?php echo errorsendmessage; ?></div> <br/>
        <a href="index.php"><?php echo retouraccueil; ?></a>
    <?php
    }

    header('Location: ask.php');
}
if (isset($_GET["del_request"]) AND $_GET["del_request"] == 1) {

    $req = $bdd->prepare("DELETE FROM echange WHERE id_logement=:id_logement AND id_proprietaire=:id_proprietaire AND id_demandeur=:id_demandeur");
    $req->execute(array(
        'id_logement' => $_GET["id_logement"],
        'id_proprietaire' => $_SESSION['userid'],
        'id_demandeur' => $_GET['id_demandeur']
    ));

    //On informe l'autre utilisateur qu'on ne veut plus échanger
    $message = "Je suis désolé, je ne souhaite plus échanger mon logement avec vous";
    $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
    $res -> execute(array(
        "destinataire" => $_GET['id_demandeur'],
        "expediteur" => $_SESSION['userid'],
        "dates" => $date = date("Y-m-d H:i:s"),
        "message" => $message,
    ));
    if($derid = $bdd -> lastInsertId())
    {
        $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
        $nv -> execute(array($derid));
        header('Location: ask.php');
    }
    else
    {
        ?>
        <div><?php echo errorsendmessage; ?></div> <br/>
        <a href="index.php"><?php echo retouraccueil; ?></a>
    <?php
    }

    header('Location: ask.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css" />
    <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
    <title>Confirmation/Validation</title>
</head>

<body>

<header>
    <?php include("menu2.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
        <div class="admin_container">
            <div class="demandes_logement">
                <div class="voeux"><h7>Vos voeux</h7></div>
        <?php

        //On récupère l'information envoyée par le lien sur lequel peut cliquer le client (lien affiché dans les lignes qui suivent)

        if (isset($_GET['confirm_demand'])) {

            $req = $bdd -> prepare("UPDATE echange SET demandeur_want=1 WHERE id_demandeur=:id_demandeur AND id_logement_asked=:id_logement");
            $req -> execute(array(
                'id_demandeur' => $_SESSION['userid'],
                'id_logement' => $_GET['id_logement'],
            ));

            //Lorsque la confirmation est faite, on envoie un message à l'autre pour lui dire qu'on est prêt
            $message = "Je suis prêt pour échanger mon logement avec le votre. Quand vous serez prêt, renseignez le afin que l'échange puisse commencer !";
            $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
            $res -> execute(array(
                "destinataire" => $_GET['destinataire'],
                "expediteur" => $_SESSION['userid'],
                "dates" => $date = date("Y-m-d H:i:s"),
                "message" => $message,
            ));
            if($derid = $bdd -> lastInsertId())
            {
                $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                $nv -> execute(array($derid));
                header('Location: ask.php');
            }
            else
            {
                ?>
                <div><?php echo errorsendmessage; ?></div> <br/>
                <a href="index.php"><?php echo retouraccueil; ?></a>
            <?php
            }
            //Ici, on vérifie au passage que si le demandeur a lui aussi validé l'échange, alors l'échange commence
            $retb = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:id_demandeur AND id_logement_asked=:id_logement");
            $retb -> execute(array(
                'id_demandeur' => $_SESSION['userid'],
                'id_logement' => $_GET['id_logement'],
            ));
            $ech2bis = $retb -> fetch();
            //Si les deux parties ont validé l'échange, alors l'échange est en cours :
            if ($ech2bis['demandeur_want']==1 AND $ech2bis['proprietaire_want']==1) {
                $req = $bdd -> prepare("UPDATE echange SET en_cours = 1 WHERE id_logement_asked=?");
                $req -> execute(array($_GET['id_logement']));
            }
        }

        //On récupère toutes les demandes d'échange de l'utilisateur
        $res = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=? AND en_cours=0 AND demandeur_has_visited=0");
        $res -> execute(array($_SESSION['userid']));
        $nb_demands = $res -> rowCount();
        //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

        for ($i=0;$i<$nb_demands;$i++) {
        $ech1 = $res -> fetch();
        //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
        $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
        $rep -> execute(array($ech1['id_logement_asked']));
        $house1 = $rep->fetch();
        //On récupère les photos du logement qu'on cherche
        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
        $pic -> execute(array($house1[0]));
        $url_pic1 = $pic -> fetch();

        ?>
            <div class="cadre_ask">
                <div class="img_gauche">
                    <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic1['lien_photo'].'" class="photo">' ?>
                </div>

                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house1['id_logement']; ?>&amp;id_users=<?php echo $house1['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house1['localisation']. ' </br>' . $house1['nombre_voyageurs']. ' voyageurs </br>' . $house1['type_logement'] . '</p>'; ?> </a><br/>

                                    </span>
                </div>
            </div>
            <div class="choice1"><a href="ask.php?del_voeu=1&id_logement=<?php echo $house1['id_logement'] ?>&destinataire=<?php echo $ech1['id_proprietaire'] ?>">Supprimer ce voeu</a></div>
            <?php if ($ech1['demandeur_want']!=1) { ?> <div class="choice"><a href="ask.php?confirm_demand&id_logement=<?php echo $house1['id_logement'] ?>&destinataire=<?php echo $ech1['id_proprietaire'] ?>">Commencer l'échange</a></div> <?php } else { ?> <div class="choice"><a>En attente de l'autre utilisateur</a></div> <?php } ?>
        <?php

            } ?>
            </div>
            <div class="owner_logement">
                <div class="voeux"><h7>Utilisateurs désirant échanger avec vous</h7></div>
            <?php
            //On récupère toutes les demandes d'échanges FAITES à l'utilisateur
            $ret = $bdd -> prepare("SELECT * FROM echange WHERE id_proprietaire=? AND en_cours=0  AND end_ech=0");
            $ret -> execute(array($_SESSION['userid']));
            $nb_requests = $ret -> rowCount();


            //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

            for ($i=0;$i<$nb_requests;$i++) {
                $ech2 = $ret -> fetch();
                //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
                $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
                $rep -> execute(array($ech2['id_logement']));
                $house2 = $rep->fetch();

                //On récupère les informations sur le demandeur
                $rei = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                $rei -> execute(array($ech2['id_demandeur']));
                $demandeur = $rei -> fetch();

                //On récupère les photos du logement qu'on cherche
                $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                $pic -> execute(array($house2[0]));
                $url_pic2 = $pic -> fetch();
                ?>
                    <div class="user_want">
                        <img src='<?php echo $demandeur["avatar"];?>' class='img_member_ask'>
                        <div class="list_info_user">
                            <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $demandeur[0]; ?>'><?php echo $demandeur[1]; ?></a></p>
                            <p><?php if ($demandeur['sexe']!=NULL) {echo $demandeur['sexe'] ;}?></p>
                            <p>E-mail: <?php if ($demandeur['email']!=NULL) { echo $demandeur['email'] ;} else {echo "Non renseigné";}?></p>
                            <p>Tel: <?php if ($demandeur['tel']!=NULL) { echo $demandeur['tel'] ;} else {echo "Non renseigné";}?></p>
                            <p>Situation: <?php if ($demandeur['situation']!=NULL) { echo $demandeur['situation'] ;} else {echo "Non renseigné";}?></p>
                            <p>Profession: <?php if ($demandeur['profession']!=NULL) { echo $demandeur['profession'] ;} else {echo "Non renseigné";}?> </p>
                        </div>
                    </div>
                    <div class="cadre_ask_want">
                        <div class="img_gauche">
                            <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic2['lien_photo'].'" class="photo">' ?>
                        </div>

                        <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house2['id_logement']; ?>&amp;id_users=<?php echo $house2['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house2['localisation']. ' </br>' . $house2['nombre_voyageurs']. ' voyageurs </br>' . $house2['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                        </div>
                    </div>
                <div class="choice1"><a href="ask.php?del_request=1&id_logement=<?php echo $house2['id_logement'] ?>&id_proprietaire=<?php echo $ech2['id_proprietaire'] ?>&id_demandeur=<?php echo $ech2['id_demandeur'] ?>">Supprimer cette demande</a></div>
                <?php if ($ech2['proprietaire_want']!=1) { ?><div class="choice"><a href="ask.php?accept_demand&id_logement=<?php echo $house2['id_logement'] ?>&destinataire=<?php echo $demandeur['id_users'] ?>">Commencer l'échange</a></div><?php } else { ?> <div class="choice"><a href="ask.php?accept_demand&id_logement=<?php echo $house2['id_logement'] ?>">En attente de l'autre utilisateur</a></div> <?php } ?>
            <?php
            }
            ?>
            </div>
                <div class="en_cours">
                    <div class="voeux"<h7>Echanges en cours</h7></div>
                    <?php
                    //Partie PROPRIETAIRE à l'origine
                    if (isset($_GET['end_proprio'])) {

                        $req = $bdd -> prepare("UPDATE echange SET demandeur_has_visited=1 WHERE id_proprietaire=:id_proprietaire AND id_logement=:id_logement");
                        $req -> execute(array(
                            'id_proprietaire' => $_SESSION['userid'],
                            'id_logement' => $_GET['id_logement'],
                        ));
                        //Lorsque la confirmation est faite, on envoie un message à l'autre pour lui dire qu'on est prêt
                        $message = "J'atteste que l'échange est terminé, faites de même pour que nous puissions donner notre avis sur nos logements respectifs !";
                        $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
                        $res -> execute(array(
                            "destinataire" => $_GET['destinataire'],
                            "expediteur" => $_SESSION['userid'],
                            "dates" => $date = date("Y-m-d H:i:s"),
                            "message" => $message,
                        ));
                        if($derid = $bdd -> lastInsertId())
                        {
                            $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                            $nv -> execute(array($derid));
                           }
                        else
                        {
                            ?>
                            <div><?php echo errorsendmessage; ?></div> <br/>
                            <a href="index.php"><?php echo retouraccueil; ?></a>
                        <?php
                        }
                        //Ici, on vérifie au passage que si le demandeur a lui aussi validé l'échange, alors l'échange commence
                        $retb = $bdd -> prepare("SELECT * FROM echange WHERE id_proprietaire=:id_demandeur AND id_logement=:id_logement");
                        $retb -> execute(array(
                            'id_demandeur' => $_SESSION['userid'],
                            'id_logement' => $_GET['id_logement'],
                        ));
                        $ech2bis = $retb -> fetch();
                        //Si les deux parties ont validé l'échange, alors l'échange est en cours :
                        if (strcasecmp($ech2bis['proprietaire_has_visited'],"1") == 0) {
                            switch ($ech2bis['demandeur_has_visited']) {

                                case 0:
                                    echo "";
                                    break;
                                case 1:
                                    $req = $bdd -> prepare("UPDATE echange SET end_ech = 1, en_cours = 0 WHERE id_logement=?");
                                    $req -> execute(array($_GET['id_logement']));

                                    $req = $bdd -> prepare("UPDATE echange SET user1 = 0, user2 = 0 WHERE id_logement=?");
                                    $req -> execute(array($_GET['id_logement']));
                                    break;
                            }}
                    }
                    //On récupère toutes les demandes d'échange de l'utilisateur
                    $res = $bdd -> prepare("SELECT * FROM echange WHERE id_proprietaire=? AND en_cours=1 AND end_ech=0 ");
                    $res -> execute(array($_SESSION['userid']));
                    $nb_en_cours = $res -> rowCount();

                    //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

                    for ($i=0;$i<$nb_en_cours;$i++) {
                        $ech3 = $res -> fetch();
                        //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
                        $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
                        $rep -> execute(array($ech3['id_logement']));
                        $house1 = $rep->fetch();
                        //On récupère les photos du logement qu'on cherche
                        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                        $pic -> execute(array($house1[0]));
                        $url_pic1 = $pic -> fetch();

                        ?>
                        <div class="cadre_ask">
                            <div class="img_gauche">
                                <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic1['lien_photo'].'" class="photo">' ?>
                            </div>

                            <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house1['id_logement']; ?>&amp;id_users=<?php echo $house1['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house1['localisation']. ' </br>' . $house1['nombre_voyageurs']. ' voyageurs </br>' . $house1['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                            </div>
                        </div>
                        <?php if ($ech3['demandeur_has_visited']!=1) { ?><div class="end"><a href="ask.php?end_proprio&id_logement=<?php echo $house1['id_logement'] ?>&destinataire=<?php echo $ech3['id_demandeur'] ?>">Confirmer la fin de l'échange</a></div><?php } else { ?> <div class="choice"><a>En attente de l'autre utilisateur</a></div> <?php } ?>

                    <?php

                    } ?>
        <?php
                    //Partie DEMANDEUR (à l'origine)
                    if (isset($_GET['end_demandeur'])) {

                        $req = $bdd -> prepare("UPDATE echange SET proprietaire_has_visited=1 WHERE id_demandeur=:id_demandeur AND id_logement_asked=:id_logement");
                        $req -> execute(array(
                            'id_demandeur' => $_SESSION['userid'],
                            'id_logement' => $_GET['id_logement'],
                        ));
                        //Lorsque la confirmation est faite, on envoie un message à l'autre pour lui dire qu'on est prêt
                        $message = "J'atteste que l'échange est terminé, faites de même pour que nous puissions donner notre avis sur nos logements respectifs !";
                        $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
                        $res -> execute(array(
                            "destinataire" => $_GET['destinataire'],
                            "expediteur" => $_SESSION['userid'],
                            "dates" => $date = date("Y-m-d H:i:s"),
                            "message" => $message,
                        ));
                        if($derid = $bdd -> lastInsertId())
                        {
                            $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                            $nv -> execute(array($derid));

                        }
                        else
                        {
                            ?>
                            <div><?php echo errorsendmessage; ?></div> <br/>
                            <a href="index.php"><?php echo retouraccueil; ?></a>
                        <?php
                        }
                        //Ici, on vérifie au passage que si le demandeur a lui aussi validé l'échange, alors l'échange commence
                        $retb = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:id_demandeur AND id_logement_asked=:id_logement");
                        $retb -> execute(array(
                            'id_demandeur' => $_SESSION['userid'],
                            'id_logement' => $_GET['id_logement'],
                        ));
                        $ech2bis = $retb -> fetch();
                        //Si les deux parties ont validé l'échange, alors l'échange est en cours :
                        if (strcasecmp($ech2bis['demandeur_has_visited'],"1") == 0) {
                            switch ($ech2bis['proprietaire_has_visited']) {

                                case 0:
                                    echo "";
                                    break;
                                case 1:
                                    $req = $bdd -> prepare("UPDATE echange SET end_ech = 1, en_cours = 0 WHERE id_logement_asked=?");
                                    $req -> execute(array($_GET['id_logement']));

                                    $req = $bdd -> prepare("UPDATE echange SET user1 = 0, user2 = 0 WHERE id_logement=?");
                                    $req -> execute(array($_GET['id_logement']));
                                    break;
                            }}
                    }
                    //On récupère toutes les demandes d'échange de l'utilisateur
                    $res = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=? AND en_cours=1 AND end_ech=0 ");
                    $res -> execute(array($_SESSION['userid']));
                    $nb_en_cours = $res -> rowCount();

                    //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

                    for ($i=0;$i<$nb_en_cours;$i++) {
                        $ech3 = $res -> fetch();
                        //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
                        $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
                        $rep -> execute(array($ech3['id_logement_asked']));
                        $house1 = $rep->fetch();
                        //On récupère les photos du logement qu'on cherche
                        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                        $pic -> execute(array($house1[0]));
                        $url_pic1 = $pic -> fetch();

                        ?>
                        <div class="cadre_ask">
                            <div class="img_gauche">
                                <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic1['lien_photo'].'" class="photo">' ?>
                            </div>

                            <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house1['id_logement']; ?>&amp;id_users=<?php echo $house1['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house1['localisation']. ' </br>' . $house1['nombre_voyageurs']. ' voyageurs </br>' . $house1['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                            </div>
                        </div>
                        <?php if ($ech3['proprietaire_has_visited']!=1) { ?><div class="end"><a href="ask.php?end_demandeur&id_logement=<?php echo $house1['id_logement'] ?>&destinataire=<?php echo $ech3['id_proprietaire'] ?>">Confirmer la fin de l'échange</a></div><?php } else { ?> <div class="choice"><a>En attente de l'autre utilisateur</a></div> <?php } ?>

                    <?php

                    } ?>
                </div>
        </div>
        </div>
    </div>
</body>