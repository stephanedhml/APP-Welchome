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
<body class="forum_messagerie">

<header>
    <?php include("menus.php"); ?>
</header>
<div class="superglobal">
    <div class="global">

        <div id="bloc_page_msg">
            <?php
            if (!isset($_SESSION["userid"]))
            {
                header ("Location: index.php");
                exit();
            }

            $req = $bdd -> prepare("SELECT id_ami FROM favoris WHERE friend=1 AND id_user=? GROUP BY id_ami");
            $req -> execute(array($_SESSION['userid']));
            $nb_friend = $req -> rowCount();

            if ($nb_friend !==0) {
                ?><table class="tableau_title_friend_box">
                    <tr>
                        <th>Liste d'amis</th>
                    </tr>
                </table>
                <div class="friend_box">
                <?php
                for ($x = 0 ; $x < $nb_friend ; $x++) {
                    $user_friend = $req->fetch();
                    $requst = $bdd -> prepare("SELECT username FROM users INNER JOIN favoris ON users.id_users=favoris.id_ami WHERE users.id_users=?");
                    $requst -> execute(array($user_friend[0]));
                    $usr_friend_name = $requst->fetch();
                    ?>
                    <table class'tableau_friend_box'>
                        <tr>
                            <td class="column_msg_1"><a href="discussion.php?id_friend=<?php echo $user_friend[0];?>"><?php echo $usr_friend_name[0]; ?></a></td>
                        </tr>
                    </table>
                <?php
                }
                ?> </div> <?php
            }

            if (isset($_POST['validation'])) {
                echo '<div class="accept_msg"><h7>Vous avez accepté le dialogue pour l\'échange</h7><br/></div>';
            }
            $req = $bdd -> prepare("
              SELECT id_expediteur, titre_message, date_update, id_message, lu_nonlu, echange, choix  FROM messages AS m1 WHERE id_destinataire=? ORDER BY id_message DESC
              ");
            $req -> execute(array($_SESSION["userid"]));
            $nb = $req -> rowCount();


            if ($nb == 0) {
                echo '<div class="no_msg_r"><p><h7>Aucun message</h7><br/><br/></p></div>';
            }
            else {
                echo '<div class="new_msg"><h7>Messages</h7></div>';

                ?>
                <table class="tableau_new_messages">
                    <tr>
                        <th>Nom exp&#233;diteur</td>
                        <th>Objet</td>
                        <th>Date</td>
                        <th>Statut</th>
                        <?php if (isset($msg_recu[5]) AND $msg_recu[6]==1) {echo '<th>Accepter la proposition</th>';} ?>

                    </tr>

                <?php

                for ($i=0 ; $i < $nb ; $i++) {
                    $msg_recu = $req -> fetch();
                    $quser = $bdd -> prepare("SELECT username FROM users WHERE id_users=?");
                    $quser -> execute(array($msg_recu[0]));
                    $un = $quser -> fetch();
                    ?>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_3"><a href="liremsg.php?id=<?php echo $msg_recu[3] ?>"><?php echo $msg_recu[1] ?></a></td>
                                <td class="column_msg_2"><?php echo $msg_recu[2]; ?></td>
                                <td class="column_msg_2"><?php if ($msg_recu[4] == 1) {echo 'Non Lu';} else {echo 'Lu';} ?></td>
                                <?php if (isset($msg_recu[5]) AND $msg_recu[6]==1) {echo '<td class="column_msg_1"><form action="message.php?id=' . $msg_recu[3] . '" method="post"><input type="submit" name="validation" value="Oui" class="bouton"><input type="submit" name="refus" value="Non" class="bouton"></td></form>' ;} ?>

                            </tr>
                    <?php
                    if (isset($_POST['validation'])) {
                        $ret = $bdd -> prepare("UPDATE echange SET user2=1 WHERE id_demandeur=?");
                        $ret -> execute(array($msg_recu[0]));
                        $fav = ajout_favoris($msg_recu[0],$_SESSION["userid"]);

                        $res = $bdd -> prepare("UPDATE messages SET choix=NULL WHERE id_message=?");
                        $res -> execute(array($_GET['id']));
                    }
                    if (isset($_POST['refus'])) {
                        $res = $bdd -> prepare("UPDATE messages SET choix=NULL WHERE id_message=?");
                        $res -> execute(array($_GET['id']));

                        $ret = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=?");
                        $ret -> execute(array($_GET['id']));

                        header('Location: message.php');
                    }
                    }
                ?>
                </table>
                <?php
            }
            ?>
            <br/>

        </div>
    </div>
</div>
<?php
include("footer2.php");
?>
</body>
</html>