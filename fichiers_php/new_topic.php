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

        <?php
            if(isset($_POST['objet'],$_POST['message'])) {
                $req = $bdd -> prepare("INSERT INTO forum_topic(id_cat,id_user,nom_topic,topic_first_post) VALUES(:cat,:auteur,:nom_topic,:message)");
                $req -> execute(array(
                    'cat' => $_GET['id_topic'],
                    'auteur' => $_SESSION['userid'],
                    'nom_topic' => $_POST['objet'],
                    'message' => $_POST['message'],
                ));
                $rez = $bdd -> prepare("UPDATE forum_forum SET nb_message=nb_message+1 WHERE id_cat=?");
                $rez -> execute(array($_GET['id_topic']));

                echo '<div class="no_msg_r"><p><h7>Votre sujet à bien été posté, ainsi que le premier message</h7><br/><br/></p></div>';
            }
        else { echo '
                        <div class="cadre_topic_post">
                                <div class="answer1">
                                    <form action="new_topic.php?id_topic='. $_GET['id_topic'] .'" method="post">
                                        <label for="username" id="username_form">Objet</label><br/></br>
                                        <input type="text" name="objet" class="objet_field" /><br /><br/>
                                        <label for="password">Message</label><br/></br>
                                        <input type="text" name="message" class="message_field" /><br /><br/></br>
                                        <input type="submit" value="Publier" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>
                        ';
        }
        ?>
    </div>
</div>
</body>
</html>