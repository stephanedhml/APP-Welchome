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
<body class="forum_messagerie" onload="cacher()">

<header>
    <?php include("menu2.php"); ?>
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

                $req = $bdd -> prepare("SELECT id_expediteur, message, id_message, echange, choix, lu_nonlu FROM messages WHERE id_message=?");
                $req -> execute(array($_GET['id']));
                $nb = $req -> rowCount();


                if ($nb == 0) {
                    echo '<div class="no_msg"><p><h7>'.nomessage.'</h7><br/><br/><a href="ecriremsg.php" id="btn_connexion">'.sendmessage.'</a></p></div>';
                }
                else {
                    echo '<div class="new_msg"><h7>Messages</h7></div>';
                    for ($i=0 ; $i < $nb AND $i < 5 ; $i++) {
                        $msg_recu = $req -> fetch();
                        $quser = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                        $quser -> execute(array($msg_recu[0]));
                        $un = $quser -> fetch();
                        if ($msg_recu['lu_nonlu']==1) {
                            $lu = $bdd->prepare("UPDATE messages SET lu_nonlu=NULL WHERE id_message=? ");
                            $lu->execute(array($msg_recu[2]));

                            $id_msg = $_GET['id'];
                            header("Location: liremsg.php?id=$id_msg");
                            exit();
                        }
                        ?>
                        <table class="tableau_new_messages" ">
                            <tr>
                                <th><?php echo nameexpediteur; ?></th>
                                <th>Message</th>
                                <?php if (isset($msg_recu[3]) AND $msg_recu[4]==1) {echo '<th>Accepter la proposition</th>';} ?>

                            </tr>
                            <tr>
                                <td class="column_msg_1">
                                    <img src='<?php echo $un["avatar"];?>' class='img_member'><br/>
                                    <p><a href='profil.php?id_logement=2&amp;id_users=<?php echo $un[0]; ?>'><?php echo $un[1]; ?></a></p>
                                </td>
                                <td class="column_msg_3"><?php echo $msg_recu[1]; ?></td>
                                <?php if (isset($msg_recu[3]) AND $msg_recu[4]==1) {echo '<td class="column_msg_1"><form action="message.php?id=' . $_GET['id'] . '" method="post"><input type="submit" name="validation" value="Oui" class="bouton"><input type="submit" name="refus" value="Non" class="bouton"></td></form>' ;} ?><br/>
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
                    if (isset($_POST["message"]))
                    {
                        $message = $_POST["message"];
                        $userid = $_SESSION["userid"];
                        //On fait correspondre le pseudo du destinataire avec son id
                        $id2 = $_GET["id"];
                        $req = $bdd -> prepare("SELECT id_expediteur FROM messages WHERE id_message = ? ");
                        $req -> execute(array($id2));
                        $dn = $req -> fetch();

                        $res = $bdd -> prepare("INSERT INTO messages(id_destinataire,id_expediteur,date_update,message) VALUES(:destinataire,:expediteur,:dates, :message)");
                        $res -> execute(array(
                            "destinataire" => $dn[0],
                            "expediteur" => $userid,
                            "dates" => $date = date("Y-m-d H:i:s"),
                            "message" => $message,
                        ));


                        if($derid = $bdd -> lastInsertId())
                        {
                            $nv = $bdd -> prepare("UPDATE messages SET lu_nonlu = 1 WHERE id_message=?");
                            $nv -> execute(array($derid));
                            ?>
                            <div class="no_msg"><h7><?php echo messagesent;?></h7><br/><br/>
                                <a href="index.php"><?php echo retouraccueil; ?></a></div>
                        <?php
                        }
                        else
                        {
                            ?>
                            <div><?php echo errorsendmessage; ?></div> <br/>
                            <a href="index.php"><?php echo retouraccueil; ?></a>
                        <?php
                        }

                    }
                    $id = $_GET['id'];
                    echo '
                        <div class="cadre_answer_post_discussion">
                                <div class="answer1">
                                    <form action="liremsg.php?id='. $id .'" method="post">
                                        <label for="message">Message</label><br/></br>
                                        <textarea type="text" name="message" class="post_message" ></textarea><br /><br/>
                                        <input type="submit" value="'.poster.'" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>';
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