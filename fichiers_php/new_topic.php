<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();

if (isset($_SESSION["userid"])) {

    $rel = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
    $rel -> execute(array($_SESSION['userid']));
    $user = $rel -> fetch();

}

if ($user[8]==1) {
    if (isset($_GET['new_cat_complete'])) {
        $req = $bdd -> prepare("INSERT INTO forum_forum(nom_cat,description) VALUES(:nom,:description)");
        $req -> execute(array(
            'nom' => $_POST['name'],
            'description' => $_POST['description'],
        ));

        header ("Location: forum.php");
        exit();
    }
}
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
    <?php include("menu2.php"); ?>
</header>

<div class="superglobal">
    <div class="global">

        <?php
        if(isset($_POST['objet'],$_POST['message'])) {
                $req = $bdd -> prepare("INSERT INTO forum_topic(id_cat,id_user,nom_topic,topic_first_post) VALUES(:cat,:auteur,:nom_topic,:message)");
                $req -> execute(array(
                    'cat' => $_GET['id_cat'],
                    'auteur' => $_SESSION['userid'],
                    'nom_topic' => $_POST['objet'],
                    'message' => $_POST['message'],
                ));
                $new_topic = $bdd -> lastInsertId();


                $rez = $bdd -> prepare("UPDATE forum_forum SET nb_message=nb_message+1 WHERE id_cat=?");
                $rez -> execute(array($_GET['id_cat']));

                $lst = $bdd -> prepare("UPDATE forum_forum SET last_message=? WHERE id_cat=?");
                $lst -> execute(array($_SESSION['userid'],$_GET['id_cat']));

                header('Location: topic.php?id_topic='.$new_topic.'&id_cat='. $_GET['id_cat'].'');
            }
        elseif ($user[8]==1) {
            if (isset($_GET['new_cat'])) {
                ?>
                <div class="cadre_topic_post">
                    <div class="answer1">
                        <form action="new_topic.php?new_cat_complete" method="post">
                            <label for="username" id="username_form">Nom de la catégorie</label><br/></br>
                            <input type="text" name="name" class="objet_field" /><br /><br/>
                            <label for="password">Description</label><br/></br>
                            <textarea name="description" class="message_field"></textarea><br /><br/></br>
                            <input type="submit" value="'.publier.'" id="btn_connexion" /><br/><br/>
                        </form>
                    </div>
                </div>
            <?php
            }
            else { echo '
                        <div class="cadre_topic_post">
                                <div class="answer1">
                                    <form action="new_topic.php?id_cat='. $_GET['id_cat'] .'" method="post">
                                        <label for="username" id="username_form">Objet</label><br/></br>
                                        <input type="text" name="objet" class="objet_field" /><br /><br/>
                                        <label for="password">Message</label><br/></br>
                                        <textarea name="message" class="message_field"></textarea><br /><br/></br>
                                        <input type="submit" value="Créer" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>
                        ';
            }
        }
        else { echo '
                        <div class="cadre_topic_post">
                                <div class="answer1">
                                    <form action="new_topic.php?id_cat='. $_GET['id_cat'] .'" method="post">
                                        <label for="username" id="username_form">Objet</label><br/></br>
                                        <input type="text" name="objet" class="objet_field" /><br /><br/>
                                        <label for="password">Message</label><br/></br>
                                        <textarea name="message" class="message_field"></textarea><br /><br/></br>
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