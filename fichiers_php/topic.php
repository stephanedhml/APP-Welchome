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


if (isset($_SESSION["userid"])) {

$rel = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
$rel -> execute(array($_SESSION['userid']));
$user = $rel -> fetch();

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

        
           <div class="forum_title"><h7> <?php echo $name_topic[3] ?></a></h7></div>
        
        
       

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

            header('Location: topic.php?id_topic='.$_GET['id_topic'] .' &id_cat='. $_GET['id_cat'].'');
            /* echo '<div class="msg_send">
                        <p><h7>Votre message à bien été posté !</h7><br/><br/></p>
                        <a href="topic.php?id_topic='.$_GET['id_topic'].'&id_cat='.$_GET['id_cat'].'" id="btn_see_msg">Voir votre message</a>
                  </div>'; */
        ?>


        <div class="forum_top">
            <div class="arborescence">
                <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
            </div>
            <div class="forum_top_r_button">
                <a href="new_topic.php?id_topic=<?php echo $_GET['id_cat'] ?>" id="btn_new_topic"><?php echo newsubject; ?></a>
            </div>
        </div>


        <table class="tableau_topic">
            <tr>
                <th style="width: 210px;"><?php echo member; ?></th>
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
        if(isset($_SESSION['userid']) AND $user[8]==0){
            ?>

            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
                </div>
                <div class="forum_top_r_button">
                    <a href="new_topic.php?id_topic=<?php echo $_GET['id_cat'] ?>" id="btn_new_topic"><?php echo newsubject; ?></a>
                </div>
            </div>

            <table class="tableau_forum_accueil">
                <tr>
                    <th style="width: 210px;"><?php echo member; ?></th>
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
                                        <textarea name="message" class="post_message" /></textarea><br /><br/>
                                        <input type="submit" value="'.poster.'" id="btn_connexion" /><br/><br/>
                                    </form>
                                </div>
                        </div>
                        ';
        }
        elseif (isset($_SESSION['userid']) AND $user[8]==1) {
            ?>

            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_cat[1] ?></a> -> <a href="topic.php?id_topic=<?php echo $name_topic[0] ?>&id_cat=<?php echo $name_cat[0] ?>"><?php echo $name_topic[3] ?></a>
                </div>
                <div class="forum_top_r_button">
                    <a href="new_topic.php?id_topic=<?php echo $_GET['id_cat'] ?>" id="btn_new_topic"><?php echo newsubject; ?></a>
                </div>
            </div>

            <table class="tableau_forum_accueil">
                <tr>
                    <th style="width: 210px;"><?php echo member; ?></th>
                    <th>Messages</th>
                    <th style="width: 50px;">Administration</th>
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
                        <td><a href='admin.php?id_post=<?php echo $post[0] ?>&del_msg=1&id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>'><img src='https://cdn3.iconfinder.com/data/icons/lynx/22x22/actions/dialog-close.png'></a></td>
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
                                        <textarea type="text" name="message" class="post_message" ></textarea><br /><br/>
                                        <input type="submit" value="'.poster.'" id="btn_connexion" /><br/><br/>
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
                    <a href="sign_up.php" id="btn_new_topic"><?php echo registeranswer; ?></a>
                </div>
            </div>


            <table class="tableau_topic">
                <tr>
                    <th style="width: 210px;"><?php echo member; ?></th>
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
<?php
include("footer2.php");
?>
</body>
</html>