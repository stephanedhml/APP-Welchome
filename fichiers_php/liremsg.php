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

                $req = $bdd -> prepare("SELECT id_expediteur, titre_message, message, id_message, echange, choix FROM messages WHERE id_message=?");
                $req -> execute(array($_GET['id']));
                $nb = $req -> rowCount();


                if ($nb == 0) {
                    echo '<div class="no_msg"><p><h7>Aucun message</h7><br/><br/><a href="ecriremsg.php" id="btn_connexion">Envoyer un message</a></p></div>';
                }
                else {
                    echo '<div class="new_msg"><h7>Messages</h7></div>';
                    for ($i=0 ; $i < $nb AND $i < 5 ; $i++) {
                        $msg_recu = $req -> fetch();
                        $quser = $bdd -> prepare("SELECT username FROM users WHERE id_users=?");
                        $quser -> execute(array($msg_recu[0]));
                        $un = $quser -> fetch();

                        $lu = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=? ");
                        $lu -> execute(array($msg_recu[3]));

                        ?>
                        <table class="tableau_new_messages" ">
                            <tr>
                                <th>Nom exp&#233;diteur</th>
                                <th>Objet</th>
                                <th>Message</th>
                                <?php if (isset($msg_recu[4]) AND $msg_recu[5]==1) {echo '<th>Accepter la proposition</th>';} ?>

                            </tr>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_2"><?php echo $msg_recu[1]; ?></td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td>
                                <?php if (isset($msg_recu[4]) AND $msg_recu[5]==1) {echo '<td class="column_msg_1"><form action="liremsg.php?id=' . $_GET['id'] . '" method="post"><input type="submit" name="validation" value="Oui" class="bouton"><input type="submit" name="refus" value="Non" class="bouton"></td></form>' ;} ?><br/>
                            </tr>
                        </table> <br/>
                    <?php
                    if (isset($_POST['validation'])) {
                        $req = $bdd -> prepare("UPDATE echange SET user2=1 WHERE id_demandeur=?");
                        $req -> execute(array($msg_recu[0]));


                        echo 'accueil</a></div>';
                        $fav = ajout_favoris($msg_recu[0],$_SESSION["userid"]);

                        header('Location: message.php');
                    }

                    if (isset($_POST['refus'])) {
                        $res = $bdd -> prepare("UPDATE messages SET choix=NULL WHERE id_message=?");
                        $res -> execute(array($_GET['id']));

                        $ret = $bdd -> prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=?");
                        $ret -> execute(array($_GET['id']));

                        header('Location: liremsg.php?id='.$_GET['id'].'');
                    }

                    }
                    if (isset($_POST["titre"], $_POST["message"]))
                    {
                        $titre = $_POST["titre"];
                        $message = $_POST["message"];
                        $userid = $_SESSION["userid"];
                        //On fait correspondre le pseudo du destinataire avec son id
                        $id2 = $_GET["id"];
                        $req = $bdd -> prepare("SELECT id_expediteur FROM messages WHERE id_message = ? ");
                        $req -> execute(array($id2));
                        $dn = $req -> fetch();

                        $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,titre_message,message) VALUES(:destinataire,:expediteur,:dates,:titre, :message)");
                        $res -> execute(array(
                            "destinataire" => $dn[0],
                            "expediteur" => $userid,
                            "dates" => $date = date("Y-m-d H:i:s"),
                            "titre" => $titre,
                            "message" => $message,
                        ));


                        if($derid = $bdd -> lastInsertId())
                        {
                            $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                            $nv -> execute(array($derid));
                            ?>
                            <div class="no_msg"><h7>Votre message a bien &#233;t&#233; envoy&#233; !</h7><br/><br/>
                                <a href="index.php">Retourner à l'accueil</a></div>
                        <?php
                        }
                        else
                        {
                            ?>
                            <div>Il y a eu un problème lors de l'envoi de votre message, veuillez r&#233;essayer.</div> <br/>
                            <a href="index.php">Retourner à l'accueil</a>
                        <?php
                        }

                    }
                    $id = $_GET['id'];
                    echo '

                            <div class="cadre_msg_answermsg">
                            <div class="contentg">
                                <div class="msg_form">
                                    <form action="liremsg.php?id='. $id .'" method="post" xmlns="http://www.w3.org/1999/html">
                                        <label for="titre">Titre du message</label>
                                        <input type="text" name="titre"> <br/>
                                        <label for="message">Message</label>
                                        <input type="text" name="message"> <br /><br />
                                        <input type="submit" value="Envoyer">
                                    </form>
                                </div>
                            </div>
                            </div> ';
                }
            ?>
            <br/>

        </div>
    </div>
</div>
</body>
</html>