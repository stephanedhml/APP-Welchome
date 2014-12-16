<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
?>
<html>
    <head>
        <meta charset="utf-8" />
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

                $req = $bdd -> prepare("SELECT id_expediteur, titre, message FROM messages WHERE id_destinataire=?");
                $req -> execute(array($_SESSION["userid"]));
                $nb = $req -> rowCount();


                if ($nb == 0) {
                    echo '<div class="no_msg"><p>Aucun message <br/><br/> <a href="ecriremsg.php" id="btn_connexion">Envoyer un message</a></p></div>';
                }
                else {
                    echo 'Vous avez des messages : <br/>';
                    for ($i=0 ; $i < $nb ; $i++) {
                        $msg_recu = $req -> fetch();
                        $quser = $bdd -> prepare("SELECT username FROM users WHERE id=?");
                        $quser -> execute(array($msg_recu[0]));
                        $un = $quser -> fetch();
                        ?>
                        <table border="1" width="400" style="text-align: center;">
                            <tr>
                                <td>Nom exp&#233;diteur</td>
                                <td>Objet</td>
                                <td>Message</td>

                            </tr>
                            <tr>
                                <td><?php echo $un[0]; ?></td>
                                <td><?php echo $msg_recu[1]; ?></td>
                                <td><?php echo $msg_recu[2]; ?></td><br/>
                            </tr>
                        </table>

                    <?php
                    }
                }
            ?>
            <br/>

        </div>
    </div>
</div>
</body>
</html>