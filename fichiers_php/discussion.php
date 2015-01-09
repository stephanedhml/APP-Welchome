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
            $id = $_GET['id_friend'];
            echo '
                            <div class="cadre_msg_answer"
                            <div class="contentg">
                                <div class="msg_form">
                                    <form action="discussion.php?id_friend='. $_GET['id_friend'] .'&refresh=1" method="post" xmlns="http://www.w3.org/1999/html">
                                        <label for="titre">Titre du message</label>
                                        <input type="text" name="titre"> <br/>
                                        <label for="message">Message</label>
                                        <input type="text" name="message"> <br /><br />
                                        <input type="submit" value="Envoyer"> <!-- onclick="window.location.href=window.location.href" -->
                                    </form>
                                </div>
                            </div>
                            </div> ';


            $req = $bdd -> query("SELECT id_expediteur, titre_message, message, id_message, echange FROM messages WHERE id_expediteur= '" . $_GET['id_friend'] . "' OR id_expediteur= '" . $_SESSION["userid"] . "' ORDER BY date_update DESC");
            /* $req -> execute(array($_GET['id_friend'], $_SESSION["userid"])); */
            $nb = $req -> rowCount();


            if ($nb == 0) {
                echo '<div class="no_msg"><p><h7>Aucun message</h7></p></div>';
            }
            else {
                echo '<div class="new_msg"><h7>Messages</h7></div>';

                ?>

                <table class="tableau_new_messages">
                    <tr>
                        <th>Nom exp&#233;diteur</th>
                        <th>Objet</th>
                        <th>Message</th>
                    </tr>

                <?php

                for ($i=0 ; $i < $nb AND $i < 15 ; $i++) {
                    $msg_recu = $req -> fetch();
                    $quser = $bdd -> prepare("SELECT username FROM users WHERE id_users=?");
                    $quser -> execute(array($msg_recu[0]));
                    $un = $quser -> fetch();

                    $lu = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=? AND id_expediteur= '" . $_GET['id_friend'] . "' ");
                    $lu -> execute(array($msg_recu[3]));

                    ?>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_2"><?php echo $msg_recu[1]; ?></td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                            </tr>
                <?php

                    }
                ?> </table> <br/> <?php
                if (isset($_POST["titre"], $_POST["message"]))
                {
                    $titre = $_POST["titre"];
                    $message = $_POST["message"];
                    $userid = $_SESSION["userid"];
                    //On fait correspondre le pseudo du destinataire avec son id
                    $id2 = $_GET["id_friend"];
                    /* $req = $bdd -> prepare("SELECT id_destinataire FROM messages WHERE id_destinataire = ? ");
                    $req -> execute(array($id2));
                    $dn = $req -> fetch(); */

                    $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message) VALUES(:destinataire,:expediteur,:dates,:titre, :message)");
                    $res -> execute(array(
                        "destinataire" => $id2,
                        "expediteur" => $userid,
                        "dates" => $date = date("Y-m-d H:i:s"),
                        "titre" => $titre,
                        "message" => $message,
                    ));


                    if($derid = $bdd -> lastInsertId())
                    {
                        $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                        $nv -> execute(array($derid));
                        header('Location: discussion.php?id_friend='.$_GET['id_friend'].'');
                    }
                    else
                    {
                        ?>
                        <div>Il y a eu un problème lors de l'envoi de votre message, veuillez r&#233;essayer.</div> <br/>
                        <a href="index.php">Retourner à l'accueil</a>
                    <?php
                    }
                }
            }
            ?>
            <br/>

        </div>
    </div>
</div>
</body>
</html>