<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();


if (isset($_GET["del_friend"]) AND $_GET["del_friend"] == 1) {
    ?>
    <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
    <?php

    $req = $bdd->prepare("DELETE FROM favoris WHERE id_ami=:autre AND id_user=:utilisateur");
    $req->execute(array(
        'autre' => $_GET["id_friend"],
        'utilisateur' => $_SESSION['userid'],
    ));

    $req = $bdd->prepare("DELETE FROM favoris WHERE id_user=:autre AND id_ami=:utilisateur");
    $req->execute(array(
        'autre' => $_GET["id_friend"],
        'utilisateur' => $_SESSION['userid'],
    ));

    header('Location: friends.php');
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

    <div id="bloc_page_msg">
        <div class="new_msg"><h7>Amis</h7></div>

    <?php
    $req = $bdd -> prepare("SELECT id_ami FROM favoris WHERE friend=1 AND id_user=? GROUP BY id_ami");
    $req -> execute(array($_SESSION['userid']));
    $nb_friend = $req -> rowCount();

    if ($nb_friend !==0) {
    ?>
        <table class="tableau_forum_accueil">
        <?php
        for ($x = 0 ; $x < $nb_friend ; $x++) {
            $user_friend = $req->fetch();
            $requst = $bdd -> prepare("SELECT * FROM users INNER JOIN favoris ON users.id_users=favoris.id_ami WHERE users.id_users=?");
            $requst -> execute(array($user_friend[0]));
            $usr_friend_name = $requst->fetch();
            ?>
            <tr>
                <td class="column_msg_1">
                    <a href="discussion.php?id_friend=<?php echo $user_friend[0];?>">
                        <img src='<?php echo $usr_friend_name["avatar"];?>' class='img_member'><br/></br>
                        <p><a href='discussion.php?id_friend=<?php echo $user_friend[0];?>'><?php echo $usr_friend_name[1]; ?></a></p>
                    </a>
                </td>
                <td>
                        <p><a href='discussion.php?id_friend=<?php echo $user_friend[0];?>'>Accéder à vos conversations avec <?php echo $usr_friend_name[1]; ?></a></p>
                </td>
                <td>
                        <p><a href='friends.php?del_friend=1&id_friend=<?php echo $user_friend[0];?>'>Supprimer <?php echo $usr_friend_name[1]; ?> de vos amis</a></p>
                </td>
            </tr>
        <?php
        }
        ?> </table></div> <?php } ?>
    </div>
    </div>
</div>