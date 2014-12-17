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
            $id = $_GET['id_friend'];
            echo '
                            <div class="cadre_msg_answer"
                            <div class="contentg">
                                <div class="msg_form">
                                    <form action="discussion.php?id_friend='. $_GET['id_friend'] .'" method="post" xmlns="http://www.w3.org/1999/html">
                                        <label for="titre">Titre du message</label>
                                        <input type="text" name="titre"> <br/>
                                        <label for="message">Message</label>
                                        <input type="text" name="message"> <br /><br />
                                        <input type="submit" value="Envoyer">
                                    </form>
                                </div>
                            </div>
                            </div> ';

            $req = $bdd -> prepare("SELECT id_expediteur, titre, message, id, echange FROM messages WHERE id_expediteur=? ORDER BY date_update DESC");
            $req -> execute(array($_GET['id_friend']));
            $nb = $req -> rowCount();


            if ($nb == 0) {
                echo '<div class="no_msg"><p><h7>Aucun message</h7></p></div>';
            }
            else {
                echo '<div class="new_msg"><h7>Messages</h7></div>';
                for ($i=0 ; $i < $nb ; $i++) {
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
                            </tr>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_2"><?php echo $msg_recu[1]; ?></td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                            </tr>
                        </table> <br/>
                    <?php

                    }
                if (isset($_POST["titre"], $_POST["message"]))
                {
                    $titre = $_POST["titre"];
                    $message = $_POST["message"];
                    $userid = $_SESSION["userid"];
                    //On fait correspondre le pseudo du destinataire avec son id
                    $id2 = $_GET["id_friend"];
                    $req = $bdd -> prepare("SELECT id_destinataire FROM messages WHERE id_destinataire = ? ");
                    $req -> execute(array($id2));
                    $dn = $req -> fetch();

                    $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre,message) VALUES(:destinataire,:expediteur,:dates,:titre, :message)");
                    $res -> execute(array(
                        "destinataire" => $dn[0],
                        "expediteur" => $userid,
                        "dates" => $date = date("Y-m-d H:i:s"),
                        "titre" => $titre,
                        "message" => $message,
                    ));


                    if($derid = $bdd -> lastInsertId())
                    {
                        $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id=?");
                        $nv -> execute(array($derid));
                        ?>
                        <div class="no_msg"><h7>Votre message a bien &#233;t&#233; envoy&#233; !</h7><br/><br/>
                            <a href="accueilmanu.php">Retourner à l'accueil</a></div>
                    <?php
                    }
                    else
                    {
                        ?>
                        <div>Il y a eu un problème lors de l'envoi de votre message, veuillez r&#233;essayer.</div> <br/>
                        <a href="accueilmanu.php">Retourner à l'accueil</a>
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