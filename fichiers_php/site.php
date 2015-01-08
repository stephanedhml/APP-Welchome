<?php
include("config.php");
include("modeles.php");
include("../menu_responsive/javascript/menu_responsive.js");

session_start();

$ret = $bdd -> prepare("SELECT * FROM forum_forum WHERE id_cat=?");
$ret -> execute(array($_GET["id_cat"]));
$name_cat = $ret -> fetch();
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
        if(isset($_SESSION['userid'])){

            echo '
            <div class="forum_top">
                <div class="arborescence">
                    <a href="forum.php">Forum</a> -> <a href="site.php?id_cat='.$name_cat[0].'">'.$name_cat[1].'</a>
                </div>
                <div class="forum_top_r_button">
                    <a href="new_topic.php?id_topic='. $_GET['id_cat'] .'" id="btn_new_topic">Nouveau Sujet</a>
                </div>
            </div>
            ';
        }
        else {echo '<a href="sign_up.php" id="btn_new_topic2">Inscrivez vous pour lancer un sujet !</a>'; }
        ?>
        <table class="tableau_site">
            <tr>
                <th>Sujets</th>
                <th>Nb réponses</th>
                <th>Nb vus</th>
                <th>Dernier message</th>
            </tr>
            <?php
            $req = $bdd -> prepare("SELECT * FROM forum_topic WHERE id_cat=?");
            $req -> execute(array($_GET['id_cat']));
            $nb = $req -> rowCount();

            $ret = $bdd -> prepare("SELECT last_message FROM forum_forum WHERE id_cat=?");
            $ret -> execute(array($_GET['id_cat']));

            if ($nb == 0) {echo "";}
            else {
                for ($i=0;$i<$nb;$i++) {
                    $topic = $req -> fetch();
                    $last = $ret -> fetch();

                    $last2 = $bdd -> prepare("SELECT * FROM users WHERE id_users=?");
                    $last2 -> execute(array($last[0]));
                    $lastf = $last2 -> fetch();


                    ?>
                    <tr>
                        <td><a href="topic.php?id_topic=<?php echo $topic[0]; ?>&id_cat=<?php echo $_GET['id_cat']; ?>"><?php echo $topic[3];?></a></td>
                        <td><?php echo $topic[5];?></td>
                        <td><?php echo $topic[6];?></td>
                        <td><?php echo $lastf[1];?></td>
                    </tr>
                <?php
                }
            }
            ?>

        </table>

    </div>
</div>
</body>
</html>