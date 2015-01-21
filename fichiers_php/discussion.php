<!--pas encore traduit -->
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

        <?php include("menu2.php"); ?>

<div class="superglobal">
    <div class="global">

        <div id="bloc_page_msg">
            <?php
            //Traitement du formulaire envoyé - placé ici à cause de "header" qui requiert qu'aucun code HTML ne soit inséré avant lui : http://www.commentcamarche.net/faq/878-redirection-php-redirect-header
            if (isset($_POST["message"]) AND $_POST["message"]!=NULL)
            {
                $message = $_POST["message"];
                $userid = $_SESSION["userid"];
                //On fait correspondre le pseudo du destinataire avec son id
                $id2 = $_GET["id_friend"];
                /* $req = $bdd -> prepare("SELECT id_destinataire FROM messages WHERE id_destinataire = ? ");
                $req -> execute(array($id2));
                $dn = $req -> fetch(); */

                $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
                $res -> execute(array(
                    "destinataire" => $id2,
                    "expediteur" => $userid,
                    "dates" => $date = date("Y-m-d H:i:s"),
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
                    <div><?php echo errorsendmessage; ?></div> <br/>
                    <a href="index.php"><?php echo retouraccueil; ?></a>
                <?php
                }
            }

            if (!isset($_SESSION["userid"]))
            {
                header ("Location: index.php");
                exit();
            }
            $id = $_GET['id_friend'];

            $req = $bdd -> query("SELECT id_expediteur, titre_message, message, id_message, echange FROM messages WHERE id_expediteur= '" . $_GET['id_friend'] . "' AND id_destinataire= '" . $_SESSION["userid"] . "' OR id_expediteur= '" . $_SESSION["userid"] . "' AND id_destinataire= '" . $_GET['id_friend'] . "' ORDER BY date_update DESC");
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
                        <th><?php echo nameexpediteur; ?></th>
                        <th>Message</th>
                    </tr>
                </table>

                <?php

                for ($i=0 ; $i < $nb AND $i < 8 ; $i++) {
                    $msg_recu = $req -> fetch();
                    $quser = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $quser -> execute(array($msg_recu[0]));
                    $un = $quser -> fetch();

                    $lu = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=? AND id_expediteur= '" . $_GET['id_friend'] . "' ");
                    $lu -> execute(array($msg_recu[3]));


                        if ($i<7) {
                            ?>
                            <table class="tableau_new_messages">
                            <tr>
                                <td class="column_msg_1">
                                    <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                                    <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un[1]; ?></a></p>
                                </td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                            </tr>
                            </table>
                        <?php
                        } else { ?>
                            <table class="tableau_new_last_messages">
                            <tr>
                                <td class="column_msg_1">
                                    <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                                    <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un[1]; ?></a></p>
                                </td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                            </tr>
                            </table>
                        <?php
                        }
                if ($i==0) {
                    ?>
                    <div class="cadre_answer_post_discussion" >
                                        <div class="answer1" >
                                            <form action = "discussion.php?id_friend=<?php echo $_GET['id_friend'] ?>" method = "post" >
                                                <label for="message" >Message</label ><br /></br >
                                                <textarea type = "text" name = "message" class="post_message" ></textarea ><br /><br />
                                                <input type = "submit" value = "Poster" id = "btn_connexion" /><br /><br />
                                            </form >
                                        </div >
                    </div>
                    <?php
                    }

                    }
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