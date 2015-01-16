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
                ?>
                <img src="../images_diverses/friends.png" class="friend_logo">
                <div class="friend_box">
                <?php
                for ($x = 0 ; $x < $nb_friend ; $x++) {
                    $user_friend = $req->fetch();
                    $requst = $bdd -> prepare("SELECT * FROM users INNER JOIN favoris ON users.id_users=favoris.id_ami WHERE users.id_users=?");
                    $requst -> execute(array($user_friend[0]));
                    $usr_friend_name = $requst->fetch();
                    ?>
                            <td class="column_msg_1"><a href="discussion.php?id_friend=<?php echo $user_friend[0];?>">
                                    <img src='<?php echo $usr_friend_name["avatar"];?>' class='img_member_fav'><br/>
                                    <!-- <p><a href='discussion.php?id_friend=<?php echo $user_friend[0];?>'><?php echo $usr_friend_name[1]; ?></a></p> -->
                                </a>
                            </td>
                <?php
                }
                ?> </div> <?php
            }

            if (isset($_POST['validation'])) {
                echo '<div class="accept_msg"><h7>'.dialogueaccept.'</h7><br/></div>';
            }
            $req = $bdd -> prepare("
              SELECT id_expediteur, titre_message, date_update, id_message, lu_nonlu, echange, choix, message  FROM messages AS m1 WHERE id_destinataire=? ORDER BY id_message DESC
              ");
            $req -> execute(array($_SESSION["userid"]));
            $nb = $req -> rowCount();



            if ($nb == 0) {
                echo '<div class="no_msg_r"><p><h7>'.nomessage.'</h7><br/><br/></p></div>';
            }
            else {
                echo '<div class="new_msg"><h7>Messages</h7></div>';

                ?>
                <table class="tableau_new_messages">
                    <tr>
                        <th><?php echo nameexpediteur; ?></td>
                        <th>Message</td>
                        <th>Date</td>
                        <th><?php echo statut; ?></th>
                        <?php if (isset($msg_recu[5]) AND $msg_recu[6]==1) {?> Accepter une discussion <?php } ?>

                    </tr>

                <?php

                for ($i=0 ; $i < $nb ; $i++) {
                    $msg_recu = $req -> fetch();
                    //On vérifie si les deux utilisateurs qui conversent n'ont pas accepté de devenir amis en récupérant les données dans la requête qui suit
                    $ret = $bdd -> prepare("SELECT * FROM echange WHERE id_demandeur=:demandeur AND id_proprietaire=:proprietaire");
                    $ret -> execute(array(
                        'demandeur' => $msg_recu[0],
                        'proprietaire' => $_SESSION['userid'],
                    ));
                    $ech = $ret -> fetch();

                    $quser = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $quser -> execute(array($msg_recu[0]));
                    $un = $quser -> fetch();
                    ?>
                            <tr>
                                <td class="column_msg_1">
                                    <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                                    <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un[1]; ?></a></p>
                                </td>
                                <td class="column_msg_3"><a href="liremsg.php?id=<?php echo $msg_recu[3] ?>"><?php echo $msg_recu['message'] ?></a></td>
                                <td class="column_msg_2"><?php echo $msg_recu[2]; ?></td>
                                <td class="column_msg_2"><?php if ($msg_recu[4] == 1) {echo 'Non Lu';} else {echo 'Lu';} ?></td>
                                <?php if (isset($msg_recu[5]) AND $msg_recu[6]==1 AND $ech[6]!==1) {echo '<td class="column_msg_1"><form action="message.php?id=' . $msg_recu[3] . '" method="post"><input type="submit" name="validation" value="'.yes.'" class="bouton"><input type="submit" name="refus" value="'.no.'" class="bouton"></td></form>' ;} ?>

                            </tr>
                    <?php
                    if (isset($_POST['validation'])) {
                        $ret = $bdd -> prepare("UPDATE echange SET user2=1 WHERE id_demandeur=?");
                        $ret -> execute(array($msg_recu[0]));
                        $fav = ajout_favoris($msg_recu[0],$_SESSION["userid"],$ech['id_logement'],$ech['id_logement_asked']);

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