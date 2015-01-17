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
$req = $bdd -> prepare("SELECT id_ami FROM favoris WHERE friend=1 AND id_user=? GROUP BY id_ami");
$req -> execute(array($_SESSION['userid']));
$nb_friend = $req -> rowCount();

if ($nb_friend !==0) {
?>
<img src="../images_diverses/friends.png" class="friend_logo">
<div class="friend_box">
    <?php
    for ($x = 0 ; $x < $nb_friend ; $x++) {
        $user_friend = $req->fetch();
        $requst = $bdd -> prepare("SELECT * FROM users INNER JOIN favoris ON users.id_users=favoris.id_ami WHERE users.id_users=?");
        $requst -> execute(array($user_friend[0]));
        $usr_friend_name = $requst->fetch();
        ?>
        <td class="column_msg_1"><a href="discussion.php?id_friend=<?php echo $user_friend[0];?>">
                <img src='<?php echo $usr_friend_name["avatar"];?>' class='img_member_fav'><br/>
                <!-- <p><a href='discussion.php?id_friend=<?php echo $user_friend[0];?>'><?php echo $usr_friend_name[1]; ?></a></p> -->
            </a>
        </td>
    <?php
    }
    ?> </div> <?php } ?>
    </div>
    </div>
</div>