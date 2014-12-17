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

                $req = $bdd -> prepare("SELECT id_expediteur, titre, message FROM messages WHERE id=?");
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
                        ?>
                        <table class="tableau_new_messages" ">
                            <tr>
                                <th>Nom exp&#233;diteur</td>
                                <th>Objet</td>
                                <th>Message</td>

                            </tr>
                            <tr>
                                <td class="column_msg_1"><?php echo $un[0]; ?></td>
                                <td class="column_msg_2"><?php echo $msg_recu[1]; ?></td>
                                <td class="column_msg_3"><?php echo $msg_recu[2]; ?></td><br/>
                            </tr>
                        </table>
                    <?php
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