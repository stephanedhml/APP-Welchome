<?php

include("config.php");
include("modeles.php");

session_start();


    if($_GET["del_msg"]==1) {
        ?>
        <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
        <?php

        $req = $bdd -> prepare("DELETE FROM forum_post WHERE id_post=?");
        $req -> execute(array($_GET["id_post"]));

        header('Location: topic.php?id_topic='.$_GET['id_topic'] .' &id_cat='. $_GET['id_cat'].'');
    }

    if($_GET["del_topic"]==1) {
        ?>
        <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
        <?php

        $req = $bdd -> prepare("DELETE FROM forum_topic WHERE id_topic=?");
        $req -> execute(array($_GET["id_topic"]));

        header('Location: site.php?id_cat='.$_GET['id_cat'] .'');
    }