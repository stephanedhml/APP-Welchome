<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();
$rez = $bdd -> prepare("UPDATE forum_topic SET nb_views=nb_views+1 WHERE id_topic=?");
$rez -> execute(array($_GET['id_topic']));

$ret = $bdd -> prepare("SELECT * FROM forum_forum WHERE id_cat=?");
$ret -> execute(array($_GET["id_cat"]));
$name_cat = $ret -> fetch();

$ret = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_topic=?");
$ret -> execute(array($_GET["id_topic"]));
$name_topic = $ret -> fetch();

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
        if(isset($_POST['message']) AND $_POST['message'] != '') {
            $req = $bdd -> prepare("INSERT INTO forum_post(id_user,id_topic,texte_post) VALUES(:auteur,:id_topic,:message)");
            $req -> execute(array(
                'auteur' => $_SESSION['userid'],
                'id_topic' => $_GET['id_topic'],
                'message' => $_POST['message'],
            ));
            $rez = $bdd -> prepare("UPDATE forum_topic SET nb_answer=nb_answer+1 WHERE id_topic=?");
            $rez -> execute(array($_GET['id_cat']));

            $lst = $bdd -> prepare("UPDATE forum_forum SET last_message=? WHERE id_cat=?");
            $lst -> execute(array($_SESSION['userid'],$_GET['id_cat']));

            echo '<div class="msg_send">
                        <p><h7>Votre message à bien été posté !</h7><br/><br/></p>
                        <a href="topic.php?id_topic='.$_GET['id_topic'].'&id_cat='.$_GET['id_cat'].'" id="btn_see_msg">Voir votre message</a>
                  </div>';
        ?>


        <div class="forum_top">
            <div class="arborescence">
                <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
            </div>
            <div class="forum_top_r_button">
                <a href="new_topic.php?id_topic=<?php echo $_GET['id_cat'] ?>" id="btn_new_topic">Nouveau Sujet</a>
            </div>
        </div>


        <table class="tableau_topic">
            <tr>
                <th>Membre</th>
                <th>Messages</th>
            </tr>
            <?php
            $ret = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_topic=?");
            $ret -> execute(array($_GET['id_topic']));
            $premier_post = $ret -> fetch();

            $res = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
            $res -> execute(array($premier_post[2]));
            $auteur = $res -> fetch();

            echo "
            <tr>
                <td>
                <img src='$auteur[10]' class='img_member'><br/>
                <p><a href='profil.php?id_logement=2&amp;id_users=$auteur[0]'>$auteur[1]</a></p>
                </td>
                <td>$premier_post[4]</td>
            </tr>
            ";

            $req = $bdd -> prepare("SELECT * FROM forum_post WHERE id_topic=?");
            $req -> execute(array($_GET['id_topic']));
            $nb = $req -> rowCount();


                for ($i=0;$i<$nb;$i++) {
                    $post = $req -> fetch();
                    $ret = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $ret -> execute(array($post[1]));
                    $membre = $ret -> fetch();
                    ?>
                    <tr>
                        <td>
                            <?php echo '<img src="'.$membre[10].'" class="img_member">';?></br>
                            <p><a href="profil.php?id_logement=2&amp;id_users=<?php echo $membre[0]; ?>"><?php echo "$membre[1]";?></a></p>
                        </td>
                        <td><?php echo $post[3];?></td>
                    </tr>
                <?php
                }
            ?>

        </table>
        <?php
            }
        else {
        if(isset($_SESSION['userid'])){
            ?>

            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
                </div>
                <div class="forum_top_r_button">
                    <a href="new_topic.php?id_topic=<?php echo $_GET['id_cat'] ?>" id="btn_new_topic">Nouveau Sujet</a>
                </div>
            </div>

            <table class="tableau_forum_accueil">
                <tr>
                    <th>Membre</th>
                    <th>Messages</th>
                </tr>
                <?php
                $ret = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_topic=?");
                $ret -> execute(array($_GET['id_topic']));
                $premier_post = $ret -> fetch();

                $res = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                $res -> execute(array($premier_post[2]));
                $auteur = $res -> fetch();

                echo "
            <tr>
                <td>
                <img src='$auteur[10]' class='img_member'><br/>
                <p><a href='profil.php?id_logement=2&amp;id_users=$auteur[0]'>$auteur[1]</a></p>
                </td>
                <td>$premier_post[4]</td>
            </tr>
            ";

                $req = $bdd -> prepare("SELECT * FROM forum_post WHERE id_topic=?");
                $req -> execute(array($_GET['id_topic']));
                $nb = $req -> rowCount();


                for ($i=0;$i<$nb;$i++) {
                    $post = $req -> fetch();
                    $ret = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $ret -> execute(array($post[1]));
                    $membre = $ret -> fetch();
                    ?>
                    <tr>
                        <td>
                            <?php echo '<img src="'.$membre[10].'" class="img_member">';?></br>
                            <p><a href="profil.php?id_logement=2&amp;id_users=<?php echo $membre[0]; ?>"><?php echo "$membre[1]";?></a></p>
                        </td>
                        <td><?php echo $post[3];?></td>
                    </tr>
                <?php
                }
                ?>

            </table>
            <?php
            echo '
                        <div class="cadre_answer_post">
                                <div class="answer1">
                                    <form action="topic.php?id_topic='. $_GET['id_topic'] .'&id_cat='. $_GET['id_cat'] .'" method="post">
                                        <label for="message">Message</label><br/></br>
                                        <input type="text" name="message" class="post_message" /><br /><br/>
                                        <input type="submit" value="Poster" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>
                        ';
        }
        else {
            ?>

            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
                </div>
                <div class="forum_top_r_button">
                    <a href="sign_up.php" id="btn_new_topic">Inscrivez vous pour répondre !</a>
                </div>
            </div>


            <table class="tableau_topic">
                <tr>
                    <th>Membre</th>
                    <th>Messages</th>
                </tr>
                <?php
                $ret = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_topic=?");
                $ret -> execute(array($_GET['id_topic']));
                $premier_post = $ret -> fetch();

                $res = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                $res -> execute(array($premier_post[2]));
                $auteur = $res -> fetch();

                echo "
            <tr>
                <td>
                <img src='$auteur[10]' class='img_member'><br/>
                <p><a href='profil.php?id_logement=2&amp;id_users=$auteur[0]'>$auteur[1]</a></p>
                </td>
                <td>$premier_post[4]</td>
            </tr>
            ";

                $req = $bdd -> prepare("SELECT * FROM forum_post WHERE id_topic=?");
                $req -> execute(array($_GET['id_topic']));
                $nb = $req -> rowCount();


                for ($i=0;$i<$nb;$i++) {
                    $post = $req -> fetch();
                    $ret = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $ret -> execute(array($post[1]));
                    $membre = $ret -> fetch();
                    ?>
                    <tr>
                        <td>
                            <?php echo '<img src="'.$membre[10].'" class="img_member">';?></br>
                            <p><a href="profil.php?id_logement=2&amp;id_users=<?php echo $membre[0]; ?>"><?php echo "$membre[1]";?></a></p>
                        </td>
                        <td><?php echo $post[3];?></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        <?php
        }
        }
        ?>
    </div>
</div>
</body>
</html>