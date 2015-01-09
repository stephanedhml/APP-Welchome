<?php

include("config.php");
include("modeles.php");

session_start();


    if($_GET["del_msg"]==1) {
        ?>
        <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
        <form>
            <label for="valider_del">Oui</label></br>
            <input type="submit" value="Envoyer" id="btn_envoyer" />
        </form>


        <?php

        $req = $bdd -> prepare("DELETE FROM forum_post WHERE id_post=?");
        $req -> execute(array($_GET["id_post"]));

        header('Location: topic.php?id_topic='.$_GET['id_topic'] .' &id_cat='. $_GET['id_cat'].'');
    }