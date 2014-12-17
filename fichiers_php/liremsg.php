<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="stylesheet" href="../style.css" />
    </head>
<body>

<header>
    <?php include("menus.php"); ?>
</header>
<div class="superglobal">
    <div class="global">

        <div id="bloc_page_msg">
            <?php
                if (!isset($_SESSION["userid"]))
                {
                    header ("Location: accueilmanu.php");
                    exit();
                }

                $req = $bdd -> prepare("SELECT id_expediteur, titre, message, id, echange FROM messages WHERE id=?");
                $req -> execute(array($_GET['id']));
                $nb = $req -> rowCount();


                if ($nb == 0) {
                    echo '<div class="no_msg"><p><h7>Aucun message</h7><br/><br/><a href="ecriremsg.php" id="btn_connexion">Envoyer un message</a></p></div>';
                }
                else {
                    echo '<div class="new_msg"><h7>Messages</h7></div>';
                    for ($i=0 ; $i < $nb AND $i < 5 ; $i++) {
                        $msg_recu = $req -> fetch();
                        $quser = $bdd -> prepare("SELECT username FROM users WHERE id=?");
                        $quser -> execute(array($msg_recu[0]));
                        $un = $quser -> fetch();

                        $lu = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id=? ");
                        $lu -> execute(array($msg_recu[3]));

                        ?>
                        <table class="tableau_new_messages" ">
                            <tr>
                                <th>Nom exp&#233;diteur</th>
                                <th>Objet</th>
                                <th>Message</th>
                                <?php if (isset($msg_recu[4])) {echo '<th>Accepter la proposition</th>';} ?>

                            </tr>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_2"><?php echo $msg_recu[1]; ?></td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                                <?php if (isset($msg_recu[4])) {echo '<td class="column_msg_1"><form action="liremsg.php?id=' . $_GET['id'] . '" method="post"><input type="submit" name="validation" value="Oui" class="bouton"></td></form>' ;} ?><br/>
                            </tr>
                        </table> <br/>
                    <?php
                    if (isset($_POST['validation'])) {
                        $req = $bdd -> prepare("UPDATE echange SET user2=1 WHERE id_demandeur=?");
                        $req -> execute(array($msg_recu[0]));
                        echo '<div class="no_msg"><h7>Vous avez accepté le dialogue pour l\'échange</h7><br/><br/> <a href="accueilmanu.php">Retourner à l\'accueil</a></div>';
                        $fav = ajout_favoris($msg_recu[0],$_SESSION["userid"]);
                    }

                    }
                    echo '<div class="no_msg"><p><a href="ecriremsg.php" id="btn_connexion">Envoyer un message</a></p></div>';
                }
            ?>
            <br/>

        </div>
    </div>
</div>
</body>
</html>