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

        <table class="tableau_forum_accueil">
            <tr>
                <th>Membre</th>
                <th>Messages</th>
            </tr>
            <?php
            $ret = $bdd -> prepare("SELECT topic_first_post FROM forum_topic WHERE id_topic=?");
            $ret -> execute(array($_GET['id_topic']));
            $premier_post = $ret -> fetch();
            echo "
            <tr>
                <td></td>
                <td>$premier_post[0]</td>
            </tr>
            ";

            $req = $bdd -> prepare("SELECT * FROM forum_post WHERE id_topic=?");
            $req -> execute(array($_GET['id_topic']));
            $nb = $req -> rowCount();

                for ($i=0;$i<$nb;$i++) {
                    $post = $req -> fetch();
                    ?>
                    <tr>
                        <td></td>
                        <td><?php echo $post[3];?></td>
                    </tr>
                <?php
                }
            ?>

        </table>

        <?php
        if(isset($_POST['message'])) {
            $req = $bdd -> prepare("INSERT INTO forum_post(id_user,id_topic,texte_post) VALUES(:auteur,:id_topic,:message)");
            $req -> execute(array(
                'auteur' => $_SESSION['userid'],
                'id_topic' => $_GET['id_topic'],
                'message' => $_POST['message'],
            ));
            echo '<div class="no_msg_r"><p><h7>Votre message à bien été posté !</h7><br/><br/></p></div>';
            }
        else {
        if(isset($_SESSION['userid'])){

            echo '
                        <div class="cadrec">
                                <div class="connex1">
                                    <form action="topic.php?id_topic='. $_GET['id_topic'] .'" method="post">
                                        <label for="password">Message</label><br/>
                                        <input type="text" name="message" id="message" /><br /><br/>
                                        <input type="submit" value="Poster" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>
                        ';
        }
        else {echo '<a href="sign_up.php" id="btn_connexion">Inscrivez vous pour répondre !</a>'; }
        }
        ?>
    </div>
</div>
</body>
</html>