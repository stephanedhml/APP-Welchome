<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="../style.css" />
</head>
<div class="superglobal">
    <div class="global">

        <?php

        //On récupère toutes les demandes d'échange de l'utilisateur
        $res = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=?");
        $res -> execute(array($_SESSION['userid']));
        $nb_demands = $res -> rowCount();

        //On récupère l'information envoyée par le lien sur lequel peut cliquer le client (lien affiché dans les lignes qui suivent)

        if (isset($_GET['confirm_demand'])) {
            $req = $bdd -> prepare("UPDATE echange SET demandeur_want = 1 WHERE id_demandeur=:id_demandeur AND id_logement=:id_logement");
            $req -> execute(array(
                'id_demandeur' => $_SESSION['userid'],
                'id_logement' => $_GET['id_logement'],
            ));
            //Ici, on vérifie au passage que si le demandeur a lui aussi validé l'échange, alors l'échange commence
            $retb = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:id_demandeur AND id_logement=:id_logement");
            $retb -> execute(array(
                'id_demandeur' => $_SESSION['userid'],
                'id_logement' => $_GET['id_logement'],
            ));
            $ech2bis = $retb -> fetch();
            //Si les deux parties ont validé l'échange, alors l'échange est en cours :
            if ($ech2bis['demandeur_want']==1 AND $ech2bis['proprietaire_want']==1) {
                $req = $bdd -> prepare("UPDATE echange SET en_cours = 1 WHERE id_logement=?");
                $req -> execute(array($_GET['id_logement']));
            }
        }

        //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

        for ($i=0;$i<$nb_demands;$i++) {
        $ech1 = $res -> fetch();
        //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
        $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
        $rep -> execute(array($ech1['id_logement']));
        $house1 = $rep->fetch();
        //On récupère les photos du logement qu'on cherche
        $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
        $pic -> execute(array($house1[0]));
        $url_pic1 = $pic -> fetch();

        ?>
        <div class="recherche">
            <div class="cadre">
                <div class="left">
                    <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic1['lien_photo'].'" class="photo">' ?>
                </div>

                <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house1['id_logement']; ?>&amp;id_users=<?php echo $house1['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house1['localisation']. ' </br>' . $house1['nombre_voyageurs']. ' voyageurs </br>' . $house1['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                    <a href="ask.php?confirm_demand&id_logement=<?php echo $house1['id_logement'] ?>">Confirmer demande</a>
                </div>
            </div><br/>

            <?php
            //Si les deux parties ont validé l'échange, alors l'échange est en cours :
            if ($ech1['id_demandeur']==1 AND $ech1['id_proprietaire']==1) {
                $req = $bdd -> prepare("UPDATE echange SET en_cours = 1 WHERE id_logement=?");
                $req -> execute(array($house1['id_logement']));
            }

            } ?>

            <?php
            //On récupère toutes les demandes d'échanges FAITES à l'utilisateur
            $ret = $bdd -> prepare("SELECT * FROM echange WHERE id_proprietaire=?");
            $ret -> execute(array($_SESSION['userid']));
            $nb_requests = $ret -> rowCount();


            //Liste logements demandés + lien cliquable qui envoie l'information de l'id du logement dont l'utilisateur souhaite valider l'échange

            for ($i=0;$i<$nb_requests;$i++) {
                $ech2 = $ret -> fetch();
                //On récupère les informations sur le logement dont l'id est donné par la requête de l'échange
                $rep = $bdd -> prepare("SELECT * FROM logement WHERE id_logement=?");
                $rep -> execute(array($ech2['id_logement']));
                $house2 = $rep->fetch();

                //On récupère les photos du logement qu'on cherche
                $pic = $bdd -> prepare("SELECT * FROM photo WHERE id_logement=?");
                $pic -> execute(array($house2[0]));
                $url_pic2 = $pic -> fetch();
                ?>
                <div class="recherche">
                    <div class="cadre">
                        <div class="left">
                            <?php echo '<img width="300px" height="200px" align="left" src="'.$url_pic2['lien_photo'].'" class="photo">' ?>
                        </div>

                        <div class="right">
                                    <span>
                                    <a href="annonce.php?id_logement=<?php echo $house2['id_logement']; ?>&amp;id_users=<?php echo $house2['id_users'] ?>" >
                                        <?php echo '<p>' .''.$house2['localisation']. ' </br>' . $house2['nombre_voyageurs']. ' voyageurs </br>' . $house2['type_logement'] . '</p>'; ?> </a><br/>
                                    </span>
                                    <a href="ask.php?accept_demand&id_logement=<?php echo $house2['id_logement'] ?>">Accepter demande</a>
                        </div>
                    </div><br/></div>
            <?php
            }
            //On récupère l'information envoyée par le lien sur lequel peut cliquer le client (lien affiché dans les lignes qui suivent)

            if (isset($_GET['accept_demand'])) {
                $req = $bdd -> prepare("UPDATE echange SET proprietaire_want = 1 WHERE id_proprietaire=:id_proprietaire AND id_logement=:id_logement");
                $req -> execute(array(
                    'id_proprietaire' => $_SESSION['userid'],
                    'id_logement' => $_GET['id_logement'],
                ));
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
            }
            ?>



        </div>
    </div>