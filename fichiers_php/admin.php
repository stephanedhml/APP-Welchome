<?php

include("config.php");
include("modeles.php");

session_start();

// Demandes de requête provenant du forum
    if(isset($_GET["del_msg"]) AND $_GET["del_msg"]==1) {
        ?>
        <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
        <?php

        $req = $bdd -> prepare("DELETE FROM forum_post WHERE id_post=?");
        $req -> execute(array($_GET["id_post"]));

        header('Location: topic.php?id_topic='.$_GET['id_topic'] .' &id_cat='. $_GET['id_cat'].'');
    }

    if(isset($_GET["del_topic"]) AND $_GET["del_topic"]==1) {
        ?>
        <!-- <META http-equiv="refresh" content="1" URL="topic.php?id_topic=<?php echo $_GET['id_topic'] ?>&id_cat=<?php echo $_GET['id_cat'] ?>"> -->
        <?php

        $req = $bdd -> prepare("DELETE FROM forum_topic WHERE id_topic=?");
        $req -> execute(array($_GET["id_topic"]));

        header('Location: site.php?id_cat='.$_GET['id_cat'] .'');
    }


// Requêtes provenant de admin.php

    if (isset($_POST['search'])) {
        $req_usr = $bdd -> prepare("SELECT * FROM users WHERE username=?");
        $req_usr -> execute(array($_POST['search']));
        $user_info_nb = $req_usr -> rowCount();

        $req_logement = $bdd -> prepare("SELECT * FROM logement WHERE nom_maison=?");
        $req_logement -> execute(array($_POST['search']));
        $logement_info_nb = $req_logement -> rowCount();


        if ($user_info_nb!=0) {
            $user_info = $req_usr -> fetch();

            $ret = $bdd -> prepare("SELECT * FROM logement WHERE id_users=?");
            $ret -> execute(array($user_info['id_users']));
        }
        if ($logement_info_nb!=0) {$logement_info = $req_logement -> fetch();}


    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="shortcut icon" href="../images_diverses/icon.png" type="image/x-icon"/>
        <link rel="icon" href="../images_diverses/icon.png" type="image/x-icon"/>
		<link rel="stylesheet" href="../style.css" />
        <?php include("../menu_responsive/javascript/menu_responsive.js"); ?>
<title>Administration</title>
</head>

<body>

<header>
    <?php include("menus.php"); ?>
</header>
<div class="superglobal">
    <div class="global">
        <div class="search_bar">
            <form action="admin.php" method="post">
                <input type="text" name="search" placeholder="Rechercher un utilisateur ou une annonce" id="recherche_simple" />
                <input type="submit" id="input" value="Rechercher">
            </form>
        </div>
    </div>
</div>